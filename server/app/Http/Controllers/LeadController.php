<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'source' => 'required|string',
            'tier' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'whatsapp_number' => 'nullable|string|max:255',
            'language' => 'nullable|string|max:255',
            'occasion' => 'nullable|string|max:255',
            'custom_occasion' => 'nullable|string|max:255',
            'occasion_category' => 'nullable|string|max:255',
            'occasion_date' => 'nullable|string|max:255',
            'story_or_message' => 'nullable|string',
            'message' => 'nullable|string',
            'story' => 'nullable|string',
            'questions' => 'nullable|array',
            'attachments.*' => 'nullable|file|max:30720', // Up to 30MB
            'terms_privacy_accepted' => 'nullable',
            'public_share_consent' => 'nullable',
        ]);

        // Use custom occasion if provided
        if ($request->filled('custom_occasion')) {
            $validated['occasion'] = $request->input('custom_occasion');
        }

        $storyParts = [];

        // Plan Header
        if ($request->filled('tier')) {
            $planName = ucfirst($request->input('tier'));
            $storyParts[] = "[Plan: Heartgram {$planName}]";
        }

        // Song Language
        if ($request->filled('language')) {
            $storyParts[] = "[Song Language: " . $request->input('language') . "]";
        }

        // Occasion Details Header
        $occasionTitle = $validated['occasion'] ?? 'Not specified';
        $categoryTitle = $request->input('occasion_category', '');
        $occasionLine = "[Occasion: {$occasionTitle}]";
        if (!empty($categoryTitle)) {
            $occasionLine .= " [Category: " . ucfirst(str_replace('_', ' ', $categoryTitle)) . "]";
        }
        $storyParts[] = $occasionLine . "\n";

        // Questionnaire Answers
        if ($request->filled('questions') && is_array($request->input('questions'))) {
            $storyParts[] = "══════════ GUIDED STORY ANSWERS ══════════\n";
            foreach ($request->input('questions') as $questionLabel => $answer) {
                if (trim($answer) !== '') {
                    $storyParts[] = "Q: {$questionLabel}\n" . trim($answer) . "\n";
                }
            }
        }

        // Freeform Story / Message
        $messageContent = $request->input('message', $request->input('story', ''));
        if (trim($messageContent) !== '') {
            $storyParts[] = "══════════ ADDITIONAL STORY / MESSAGE ══════════\n" . trim($messageContent) . "\n";
        }

        // Uploaded Attachments
        if ($request->hasFile('attachments')) {
            $uploadedList = [];
            foreach ($request->file('attachments') as $file) {
                if ($file->isValid()) {
                    $origName = $file->getClientOriginalName();
                    $filename = time() . '_' . uniqid() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $origName);
                    $path = $file->storeAs('lead_attachments', $filename, 'public');
                    $fileUrl = asset('storage/' . $path);
                    $uploadedList[] = "• {$origName} -> {$fileUrl}";
                }
            }
            if (!empty($uploadedList)) {
                $storyParts[] = "══════════ UPLOADED STORY MATERIALS ══════════\n" . implode("\n", $uploadedList) . "\n";
            }
        }

        // Public Sharing Consent
        if ($request->filled('public_share_consent')) {
            $storyParts[] = "══════════ PUBLIC SHARING CONSENT ══════════\nConsent granted to share song or a line from message publicly.\n";
        }

        $validated['story_or_message'] = implode("\n", $storyParts);

        unset(
            $validated['tier'], 
            $validated['language'],
            $validated['message'], 
            $validated['story'], 
            $validated['questions'], 
            $validated['attachments'], 
            $validated['custom_occasion'], 
            $validated['occasion_category'],
            $validated['terms_privacy_accepted'],
            $validated['public_share_consent']
        );

        \App\Lead::create($validated);

        return redirect()->back()->with('success', 'Thank you! We have received your story and will craft your personalized song shortly.');
    }
}
