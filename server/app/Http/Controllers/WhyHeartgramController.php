<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhyHeartgramController extends Controller
{
    public function index()
    {
        $content = [
            'seo_tags' => \App\PageContent::get('why_heartgrams_seo_tags', ''),
            'hero_subtitle' => \App\PageContent::get('why_heartgrams_hero_subtitle', ''),
            'hero_title' => \App\PageContent::get('why_heartgrams_hero_title', 'Why People Choose Us'),
            'hero_highlight' => \App\PageContent::get('why_heartgrams_hero_highlight', 'Heartgrams'),
            'hero_description' => \App\PageContent::get('why_heartgrams_hero_description', 'Flowers fade and greeting cards get tucked away. We transform your real memories, intimate stories, and unspoken emotions into original studio-crafted songs — creating a timeless musical keepsake they will cherish and replay for a lifetime.'),
            
            'everything_subtitle' => \App\PageContent::get('why_heartgrams_everything_subtitle', 'EVERYTHING INCLUDED'),
            'everything_title' => \App\PageContent::get('why_heartgrams_everything_title', 'Everything included in your Heartgram.'),
            'everything_description' => \App\PageContent::get('why_heartgrams_everything_description', 'Clear, tangible, and meaningful — here is exactly what you get.'),
            
            // Corrections Policy
            'corrections_subtitle' => \App\PageContent::get('why_heartgrams_corrections_subtitle', 'CORRECTIONS POLICY'),
            'corrections_title' => \App\PageContent::get('why_heartgrams_corrections_title', 'Clear corrections. No confusion.'),
            'corrections_description' => \App\PageContent::get('why_heartgrams_corrections_description', 'Because each song is personalized, we follow a clear correction process.'),
            'corrections_bullet_1' => \App\PageContent::get('why_heartgrams_corrections_bullet_1', 'Minor lyric corrections can be requested before final song production. Included in your package.'),
            'corrections_bullet_2' => \App\PageContent::get('why_heartgrams_corrections_bullet_2', 'Once the final song is produced, technical corrections can be reviewed, but full song remakes are not included unless separately agreed.'),
            'corrections_bullet_3' => \App\PageContent::get('why_heartgrams_corrections_bullet_3', 'All correction requests are handled through WhatsApp — our team will guide you through the process fairly.'),
            
            // Founder Story
            'founder_subtitle' => \App\PageContent::get('why_heartgrams_founder_subtitle', 'FOUNDER STORY'),
            'founder_title' => \App\PageContent::get('why_heartgrams_founder_title', 'Why Heartgrams exists.'),
            'founder_p1' => \App\PageContent::get('why_heartgrams_founder_p1', 'Heartgrams was founded by <span class="text-[#e6b04e]">Hilaary James</span> with one simple thought: many people love deeply, but they do not always say it.'),
            'founder_p2' => \App\PageContent::get('why_heartgrams_founder_p2', 'Life moves fast. Work, distance, phone screens and daily routines make people forget to express what they really feel — even when someone is close to us.'),
            'founder_p3' => \App\PageContent::get('why_heartgrams_founder_p3', 'Hilaary created Heartgrams to help people say those words in a beautiful way. A birthday, a proposal, an apology, a memory — turned into a personalized song for the person you love.'),
            'founder_p4' => \App\PageContent::get('why_heartgrams_founder_p4', 'For Hilaary, Heartgrams is about helping people say, <span class="text-[#e6b04e] italic">"You matter to me,"</span> in a way that can be heard, felt, and remembered forever.'),
            'founder_quote' => \App\PageContent::get('why_heartgrams_founder_quote', '"Some feelings are too important to remain unsaid."'),
            'founder_quote_author' => \App\PageContent::get('why_heartgrams_founder_quote_author', '— HILAARY JAMES, FOUNDER'),
            
            // Features Section
            'features_subtitle' => \App\PageContent::get('why_heartgrams_features_subtitle', 'THE HEARTGRAMS DIFFERENCE'),
            'features_title' => \App\PageContent::get('why_heartgrams_features_title', 'Crafted with heart. Built around your story.'),
            'features_description' => \App\PageContent::get('why_heartgrams_features_description', 'Every song is written from scratch, guided by real emotion, and produced to the highest musical standard.'),
            
            // CTA Section
            'cta_subtitle' => \App\PageContent::get('why_heartgrams_cta_subtitle', 'READY WHEN YOU ARE'),
            'cta_title' => \App\PageContent::get('why_heartgrams_cta_title', 'Some feelings deserve more than a message.'),
            'cta_description' => \App\PageContent::get('why_heartgrams_cta_description', 'Turn your memory into a song they can keep, replay, and feel again.'),
            'cta_button_1_text' => \App\PageContent::get('why_heartgrams_cta_button_1_text', 'Start My Song Story →'),
            'cta_button_1_link' => \App\PageContent::get('why_heartgrams_cta_button_1_link', '#'),
            'cta_button_2_text' => \App\PageContent::get('why_heartgrams_cta_button_2_text', 'Chat on WhatsApp'),
            'cta_button_2_link' => \App\PageContent::get('why_heartgrams_cta_button_2_link', '#'),
        ];

        $features = [];
        $defaultFeatures = [
            ['title' => 'Real stories, not templates', 'desc' => 'Every Heartgram is built from scratch using your specific memories, names, and emotions.', 'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>'],
            ['title' => 'Human-crafted lyrics', 'desc' => 'A real writer reads your story and writes lyrics that could only belong to you.', 'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>'],
            ['title' => 'Native-language warmth', 'desc' => 'Written in the language that feels natural — English, Tamil, Telugu, Malayalam, or Hindi.', 'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" /></svg>'],
            ['title' => 'Private story promise', 'desc' => 'Your story is used only to create your song and handled with complete confidentiality.', 'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>'],
            ['title' => 'Replay value for years', 'desc' => 'Unlike flowers or chocolate, a Heartgram can be replayed on anniversaries, birthdays and quiet moments.', 'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>'],
            ['title' => 'MP3-ready delivery', 'desc' => 'MP3 and Lyrics PDF delivered via WhatsApp — easy to share instantly or save forever.', 'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>'],
        ];

        for ($i = 1; $i <= 6; $i++) {
            $features[] = [
                'icon' => $defaultFeatures[$i-1]['icon'],
                'title' => \App\PageContent::get("why_heartgrams_feature_{$i}_title", $defaultFeatures[$i-1]['title']),
                'description' => \App\PageContent::get("why_heartgrams_feature_{$i}_desc", $defaultFeatures[$i-1]['desc']),
            ];
        }

        $included = [];
        $defaultIncluded = [
            ['title' => 'Personalized song', 'desc' => 'A complete song made from your story and emotion — not a template.', 'icon' => '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" /></svg>'],
            ['title' => 'Custom lyrics', 'desc' => 'Written around your memories, names, moments, and message by a real human writer.', 'icon' => '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>'],
            ['title' => 'MP3 delivery', 'desc' => 'Easy to share privately on WhatsApp, email or personal message. Yours to keep forever.', 'icon' => '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v12m0 0l-4-4m4 4l4-4M4 20h16" /></svg>'],
            ['title' => 'Lyrics PDF', 'desc' => 'A clean, readable keepsake version of the lyrics — for framing, printing, or saving.', 'icon' => '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>'],
            ['title' => 'Private gift page', 'desc' => 'A private page with your song, lyrics, and sender note for the recipient.', 'icon' => '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m0-13V4a2 2 0 112 2h-2zm0 0V4a2 2 0 10-2 2h2zm-8 4h16M4 12v9a2 2 0 002 2h12a2 2 0 002-2v-9M4 12h16" /></svg>'],
        ];

        for ($i = 1; $i <= count($defaultIncluded); $i++) {
            $included[] = [
                'icon' => $defaultIncluded[$i-1]['icon'],
                'title' => \App\PageContent::get("why_heartgrams_included_{$i}_title", $defaultIncluded[$i-1]['title']),
                'description' => \App\PageContent::get("why_heartgrams_included_{$i}_desc", $defaultIncluded[$i-1]['desc']),
            ];
        }

        return view('pages.why-heartgrams', compact('content', 'features', 'included'));
    }
}
