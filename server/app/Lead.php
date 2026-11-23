<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'source',
        'name',
        'email',
        'whatsapp_number',
        'occasion',
        'occasion_date',
        'story_or_message',
        'status',
    ];

    /**
     * Get extracted attachments from the story_or_message text.
     */
    public function getAttachmentsAttribute()
    {
        $attachments = [];
        if (empty($this->story_or_message)) {
            return $attachments;
        }

        // Matches lines formatted like: • original_file.png -> url
        if (preg_match_all('/•\s*([^\r\n]+?)\s*->\s*(https?:\/\/[^\s\r\n]+|\/storage\/[^\s\r\n]+)/u', $this->story_or_message, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $filename = trim($match[1]);
                $rawUrl = trim($match[2]);

                // Normalize to current domain's asset URL if it references storage/lead_attachments
                if (preg_match('/\/storage\/(lead_attachments\/[^\s]+)/', $rawUrl, $urlMatch)) {
                    $storagePath = $urlMatch[1];
                    $cleanUrl = asset('storage/' . $storagePath);
                } else {
                    $cleanUrl = $rawUrl;
                }

                $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                if (empty($extension)) {
                    $extension = strtolower(pathinfo(parse_url($rawUrl, PHP_URL_PATH) ?? '', PATHINFO_EXTENSION));
                }

                $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'avif']);
                $isAudio = in_array($extension, ['mp3', 'wav', 'm4a', 'aac', 'ogg', 'opus']);
                $isVideo = in_array($extension, ['mp4', 'mov', 'webm', 'avi', 'mkv']);
                $isPdf = in_array($extension, ['pdf']);

                $attachments[] = [
                    'name' => $filename,
                    'url' => $cleanUrl,
                    'extension' => $extension,
                    'is_image' => $isImage,
                    'is_audio' => $isAudio,
                    'is_video' => $isVideo,
                    'is_pdf' => $isPdf,
                ];
            }
        }

        return $attachments;
    }

    /**
     * Get the selected plan (e.g. 'Classic', 'Premium', 'Signature')
     */
    public function getPlanAttribute()
    {
        if (!empty($this->attributes['tier'])) {
            return ucfirst($this->attributes['tier']);
        }
        if (!empty($this->attributes['plan'])) {
            return ucfirst($this->attributes['plan']);
        }

        if (empty($this->story_or_message)) {
            return null;
        }

        // Matches patterns like: [Plan: Heartgram Classic] or [Plan: Classic] or [Plan: Heartgram Premium]
        if (preg_match('/\[Plan:\s*(?:Heartgram\s*)?([a-zA-Z0-9_\-\s]+?)\]/i', $this->story_or_message, $matches)) {
            return ucfirst(trim($matches[1]));
        }

        return null;
    }

    /**
     * Get the chosen song language if present (e.g. 'English', 'Tamil', 'Kannada')
     */
    public function getSongLanguageAttribute()
    {
        if (empty($this->story_or_message)) {
            return null;
        }

        if (preg_match('/\[Song Language:\s*([^\]]+)\]/i', $this->story_or_message, $matches)) {
            return trim($matches[1]);
        }

        return null;
    }

    /**
     * Get a clean text preview of the story/message, omitting decorative separator lines.
     */
    public function getSummaryTextAttribute()
    {
        if (empty($this->story_or_message)) {
            return '-';
        }

        $lines = preg_split('/\r\n|\r|\n/', $this->story_or_message);
        $cleanLines = [];

        foreach ($lines as $line) {
            $trimmed = trim($line);
            // Skip decorative separator lines and upload URLs
            if (empty($trimmed) || str_starts_with($trimmed, '═') || str_starts_with($trimmed, '• ') || str_starts_with($trimmed, 'Consent granted')) {
                continue;
            }
            $cleanLines[] = $trimmed;
        }

        $fullText = implode(' · ', $cleanLines);
        return \Illuminate\Support\Str::limit($fullText, 120);
    }
}
