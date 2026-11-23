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
}
