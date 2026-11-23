<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PageContent;

class WhyHeartgramController extends Controller
{
    public function index()
    {
        $heroTitle = PageContent::get('why_heartgrams_hero_title', 'Why choose a personalised song from Heartgrams?');
        $heroDescription = PageContent::get('why_heartgrams_hero_description', 'The cake gets eaten. The card goes in a drawer. The song with their name in it gets played every birthday, every anniversary, every time they miss you.');
        $everythingDesc = PageContent::get('why_heartgrams_everything_description', "Here's exactly what you get with every song.");
        $featuresDesc = PageContent::get('why_heartgrams_features_description', 'Every song is written from scratch from your real memories, and every lyric passes our quality check before you see it.');
        $ctaButton1Link = PageContent::get('why_heartgrams_cta_button_1_link', '/create-your-heartgram-song');
        $ctaButton2Link = PageContent::get('why_heartgrams_cta_button_2_link', 'https://wa.me/?text=Hi%20Heartgrams%2C%20I%20would%20like%20to%20create%20a%20song');

        $content = [
            'seo_tags' => PageContent::get('why_heartgrams_seo_tags', ''),
            'hero_subtitle' => PageContent::get('why_heartgrams_hero_subtitle', ''),
            'hero_title' => $heroTitle,
            'hero_highlight' => PageContent::get('why_heartgrams_hero_highlight', 'Heartgrams'),
            'hero_description' => $heroDescription,
            
            'everything_subtitle' => PageContent::get('why_heartgrams_everything_subtitle', 'EVERYTHING INCLUDED'),
            'everything_title' => PageContent::get('why_heartgrams_everything_title', 'Everything included in your Heartgram.'),
            'everything_description' => $everythingDesc,
            
            // Corrections Policy
            'corrections_subtitle' => PageContent::get('why_heartgrams_corrections_subtitle', 'CORRECTIONS POLICY'),
            'corrections_title' => PageContent::get('why_heartgrams_corrections_title', 'Clear corrections. No confusion.'),
            'corrections_description' => PageContent::get('why_heartgrams_corrections_description', 'Because each song is personalized, we follow a clear correction process.'),
            'corrections_bullet_1' => PageContent::get('why_heartgrams_corrections_bullet_1', 'Minor lyric corrections can be requested before final song production. Included in your package.'),
            'corrections_bullet_2' => PageContent::get('why_heartgrams_corrections_bullet_2', 'Once the final song is produced, technical corrections can be reviewed, but full song remakes are not included unless separately agreed.'),
            'corrections_bullet_3' => PageContent::get('why_heartgrams_corrections_bullet_3', 'All correction requests are handled through WhatsApp — our team will guide you through the process fairly.'),
            
            // Founder Story
            'founder_subtitle' => PageContent::get('why_heartgrams_founder_subtitle', 'FOUNDER STORY'),
            'founder_title' => PageContent::get('why_heartgrams_founder_title', 'Why Heartgrams exists.'),
            'founder_p1' => PageContent::get('why_heartgrams_founder_p1', 'Heartgrams was founded by <span class="text-[#e6b04e]">Hilaary James</span> with one simple thought: many people love deeply, but they do not always say it.'),
            'founder_p2' => PageContent::get('why_heartgrams_founder_p2', 'Life moves fast. Work, distance, phone screens and daily routines make people forget to express what they really feel — even when someone is close to us.'),
            'founder_p3' => PageContent::get('why_heartgrams_founder_p3', 'Hilaary created Heartgrams to help people say those words in a beautiful way. A birthday, a proposal, an apology, a memory — turned into a personalized song for the person you love.'),
            'founder_p4' => PageContent::get('why_heartgrams_founder_p4', 'For Hilaary, Heartgrams is about helping people say, <span class="text-[#e6b04e] italic">"You matter to me,"</span> in a way that can be heard, felt, and remembered forever.'),
            'founder_quote' => PageContent::get('why_heartgrams_founder_quote', '"Some feelings are too important to remain unsaid."'),
            'founder_quote_author' => PageContent::get('why_heartgrams_founder_quote_author', '— HILAARY JAMES, FOUNDER'),
            
            // Features Section
            'features_subtitle' => PageContent::get('why_heartgrams_features_subtitle', 'THE HEARTGRAMS DIFFERENCE'),
            'features_title' => PageContent::get('why_heartgrams_features_title', 'Crafted with heart. Built around your story.'),
            'features_description' => $featuresDesc,
            
            // CTA Section
            'cta_subtitle' => PageContent::get('why_heartgrams_cta_subtitle', 'READY WHEN YOU ARE'),
            'cta_title' => PageContent::get('why_heartgrams_cta_title', 'Some feelings deserve more than a message.'),
            'cta_description' => PageContent::get('why_heartgrams_cta_description', 'Turn your memory into a song they can keep, replay, and feel again.'),
            'cta_button_1_text' => PageContent::get('why_heartgrams_cta_button_1_text', 'Start My Song Story →'),
            'cta_button_1_link' => $ctaButton1Link,
            'cta_button_2_text' => PageContent::get('why_heartgrams_cta_button_2_text', 'Chat on WhatsApp'),
            'cta_button_2_link' => $ctaButton2Link,
        ];

        $defaultFeatures = [
            ['title' => 'Real stories, not templates', 'desc' => 'Every Heartgram is built from scratch using your specific memories, names, and emotions.', 'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>'],
            ['title' => 'Human-crafted lyrics', 'desc' => 'A lyricist who writes in your language reads your story and writes lyrics that could only belong to you.', 'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>'],
            ['title' => 'Native-language warmth', 'desc' => 'Written in the language that feels natural: Tamil, Malayalam, Kannada, Telugu, Hindi or English.', 'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" /></svg>'],
            ['title' => 'Private story promise', 'desc' => 'Your story is used only to create your song and handled with complete confidentiality.', 'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>'],
            ['title' => 'Replay value for years', 'desc' => 'Unlike flowers or chocolate, a Heartgram can be replayed on anniversaries, birthdays and quiet moments.', 'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>'],
            ['title' => 'MP3-ready delivery', 'desc' => 'MP3 and lyrics PDF delivered on WhatsApp and email, easy to share or keep forever.', 'icon' => '<svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>'],
        ];

        $features = [];
        for ($i = 1; $i <= 6; $i++) {
            $fTitle = PageContent::get("why_heartgrams_feature_{$i}_title", $defaultFeatures[$i-1]['title']);
            $fDesc = PageContent::get("why_heartgrams_feature_{$i}_desc", $defaultFeatures[$i-1]['desc']);

            $features[] = [
                'icon' => $defaultFeatures[$i-1]['icon'],
                'title' => $fTitle,
                'description' => $fDesc,
            ];
        }

        $defaultIncluded = [
            ['title' => 'Personalized song', 'desc' => 'A complete song made from your story and emotion — not a template.', 'icon' => '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" /></svg>'],
            ['title' => 'Custom lyrics', 'desc' => 'Written by a lyricist in your language, around your memories, names and message.', 'icon' => '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>'],
            ['title' => 'MP3 delivery', 'desc' => 'Easy to share privately on WhatsApp, email or personal message. Yours to keep forever.', 'icon' => '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v12m0 0l-4-4m4 4l4-4M4 20h16" /></svg>'],
            ['title' => 'Lyrics PDF', 'desc' => 'A clean, readable keepsake version of the lyrics — for framing, printing, or saving.', 'icon' => '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>'],
            ['title' => 'Lyrics you approve', 'desc' => 'Our quality team checks every lyric, then it comes to you. Ask for changes; we make the song only after you approve.', 'icon' => '<svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'],
        ];

        $included = [];
        for ($i = 1; $i <= count($defaultIncluded); $i++) {
            $t = PageContent::get("why_heartgrams_included_{$i}_title", $defaultIncluded[$i-1]['title']);
            $d = PageContent::get("why_heartgrams_included_{$i}_desc", $defaultIncluded[$i-1]['desc']);

            $included[] = [
                'icon' => $defaultIncluded[$i-1]['icon'],
                'title' => $t,
                'description' => $d,
            ];
        }

        return view('pages.why-heartgrams', compact('content', 'features', 'included'));
    }
}
