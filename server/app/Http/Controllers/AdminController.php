<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalLeads = \App\Lead::count();
        $recentLeads = \App\Lead::where('created_at', '>=', now()->subDays(7))->count();
        
        return view('admin.dashboard', compact('totalLeads', 'recentLeads'));
    }

    public function leads()
    {
        $leads = \App\Lead::orderBy('created_at', 'desc')->get();
        return view('admin.leads', compact('leads'));
    }

    public function showLead($id)
    {
        $lead = \App\Lead::findOrFail($id);
        return view('admin.show-lead', compact('lead'));
    }

    public function editWhyHeartgrams()
    {
        $content = [
            'hero_subtitle' => \App\PageContent::get('why_heartgrams_hero_subtitle', 'WHY PEOPLE CHOOSE US'),
            'hero_title' => \App\PageContent::get('why_heartgrams_hero_title', 'Why People Choose'),
            'hero_highlight' => \App\PageContent::get('why_heartgrams_hero_highlight', 'Heartgrams'),
            'hero_description' => \App\PageContent::get('why_heartgrams_hero_description', 'Most gifts are opened once. A Heartgrams song can be replayed for years.'),
            
            'everything_subtitle' => \App\PageContent::get('why_heartgrams_everything_subtitle', 'EVERYTHING INCLUDED'),
            'everything_title' => \App\PageContent::get('why_heartgrams_everything_title', 'Everything included in your Heartgram.'),
            'everything_description' => \App\PageContent::get('why_heartgrams_everything_description', 'Clear, tangible, and meaningful — here is exactly what you get.'),
            
            'corrections_subtitle' => \App\PageContent::get('why_heartgrams_corrections_subtitle', 'CORRECTIONS POLICY'),
            'corrections_title' => \App\PageContent::get('why_heartgrams_corrections_title', 'Clear corrections. No confusion.'),
            'corrections_description' => \App\PageContent::get('why_heartgrams_corrections_description', 'Because each song is personalized, we follow a clear correction process.'),
            'corrections_bullet_1' => \App\PageContent::get('why_heartgrams_corrections_bullet_1', 'Minor lyric corrections can be requested before final song production. Included in your package.'),
            'corrections_bullet_2' => \App\PageContent::get('why_heartgrams_corrections_bullet_2', 'Once the final song is produced, technical corrections can be reviewed, but full song remakes are not included unless separately agreed.'),
            'corrections_bullet_3' => \App\PageContent::get('why_heartgrams_corrections_bullet_3', 'All correction requests are handled through WhatsApp — our team will guide you through the process fairly.'),
            
            'founder_subtitle' => \App\PageContent::get('why_heartgrams_founder_subtitle', 'FOUNDER STORY'),
            'founder_title' => \App\PageContent::get('why_heartgrams_founder_title', 'Why Heartgrams exists.'),
            'founder_p1' => \App\PageContent::get('why_heartgrams_founder_p1', 'Heartgrams was founded by <span class="text-[#e6b04e]">Hilaary James</span> with one simple thought: many people love deeply, but they do not always say it.'),
            'founder_p2' => \App\PageContent::get('why_heartgrams_founder_p2', 'Life moves fast. Work, distance, phone screens and daily routines make people forget to express what they really feel — even when someone is close to us.'),
            'founder_p3' => \App\PageContent::get('why_heartgrams_founder_p3', 'Hilaary created Heartgrams to help people say those words in a beautiful way. A birthday, a proposal, an apology, a memory — turned into a personalized song for the person you love.'),
            'founder_p4' => \App\PageContent::get('why_heartgrams_founder_p4', 'For Hilaary, Heartgrams is about helping people say, <span class="text-[#e6b04e] italic">"You matter to me,"</span> in a way that can be heard, felt, and remembered forever.'),
            'founder_quote' => \App\PageContent::get('why_heartgrams_founder_quote', '"Some feelings are too important to remain unsaid."'),
            'founder_quote_author' => \App\PageContent::get('why_heartgrams_founder_quote_author', '— HILAARY JAMES, FOUNDER'),
            
            'features_subtitle' => \App\PageContent::get('why_heartgrams_features_subtitle', 'THE HEARTGRAMS DIFFERENCE'),
            'features_title' => \App\PageContent::get('why_heartgrams_features_title', 'Crafted with heart. Built around your story.'),
            'features_description' => \App\PageContent::get('why_heartgrams_features_description', 'Every song is written from scratch, guided by real emotion, and produced to the highest musical standard.'),
            
            'cta_subtitle' => \App\PageContent::get('why_heartgrams_cta_subtitle', 'READY WHEN YOU ARE'),
            'cta_title' => \App\PageContent::get('why_heartgrams_cta_title', 'Some feelings deserve more than a message.'),
            'cta_description' => \App\PageContent::get('why_heartgrams_cta_description', 'Turn your memory into a song they can keep, replay, and feel again.'),
            'cta_button_1_text' => \App\PageContent::get('why_heartgrams_cta_button_1_text', 'Start My Song Story →'),
            'cta_button_1_link' => \App\PageContent::get('why_heartgrams_cta_button_1_link', '#'),
            'cta_button_2_text' => \App\PageContent::get('why_heartgrams_cta_button_2_text', 'Chat on WhatsApp'),
            'cta_button_2_link' => \App\PageContent::get('why_heartgrams_cta_button_2_link', '#'),
            'seo_tags' => \App\PageContent::get('why_heartgrams_seo_tags', ''),
        ];

        $defaultFeatures = [
            ['title' => 'Real stories, not templates', 'desc' => 'Every Heartgram is built from scratch using your specific memories, names, and emotions.'],
            ['title' => 'Human-crafted lyrics', 'desc' => 'A real writer reads your story and writes lyrics that could only belong to you.'],
            ['title' => 'Native-language warmth', 'desc' => 'Written in the language that feels natural — English, Tamil, Telugu, Malayalam, or Hindi.'],
            ['title' => 'Private story promise', 'desc' => 'Your story is used only to create your song and handled with complete confidentiality.'],
            ['title' => 'Replay value for years', 'desc' => 'Unlike flowers or chocolate, a Heartgram can be replayed on anniversaries, birthdays and quiet moments.'],
            ['title' => 'MP3-ready delivery', 'desc' => 'MP3 and Lyrics PDF delivered via WhatsApp — easy to share instantly or save forever.'],
        ];

        for ($i = 1; $i <= 6; $i++) {
            $content["feature_{$i}_title"] = \App\PageContent::get("why_heartgrams_feature_{$i}_title", $defaultFeatures[$i-1]['title']);
            $content["feature_{$i}_desc"] = \App\PageContent::get("why_heartgrams_feature_{$i}_desc", $defaultFeatures[$i-1]['desc']);
        }
        
        $defaultIncluded = [
            ['title' => 'Personalized song', 'desc' => 'A complete song made from your story and emotion — not a template.'],
            ['title' => 'Custom lyrics', 'desc' => 'Written around your memories, names, moments, and message by a real human writer.'],
            ['title' => 'MP3 delivery', 'desc' => 'Easy to share privately on WhatsApp, email or personal message. Yours to keep forever.'],
            ['title' => 'Lyrics PDF', 'desc' => 'A clean, readable keepsake version of the lyrics — for framing, printing, or saving.'],
            ['title' => 'Private gift page', 'desc' => 'A private page with your song, lyrics, and sender note for the recipient.'],
        ];

        for ($i = 1; $i <= count($defaultIncluded); $i++) {
            $content["included_{$i}_title"] = \App\PageContent::get("why_heartgrams_included_{$i}_title", $defaultIncluded[$i-1]['title']);
            $content["included_{$i}_desc"] = \App\PageContent::get("why_heartgrams_included_{$i}_desc", $defaultIncluded[$i-1]['desc']);
        }

        return view('admin.pages.why-heartgrams', compact('content'));
    }

    public function updateWhyHeartgrams(\Illuminate\Http\Request $request)
    {
        $keys = [
            'why_heartgrams_hero_subtitle',
            'why_heartgrams_hero_title',
            'why_heartgrams_hero_highlight',
            'why_heartgrams_hero_description',
            
            'why_heartgrams_everything_subtitle',
            'why_heartgrams_everything_title',
            'why_heartgrams_everything_description',
            
            'why_heartgrams_corrections_subtitle',
            'why_heartgrams_corrections_title',
            'why_heartgrams_corrections_description',
            'why_heartgrams_corrections_bullet_1',
            'why_heartgrams_corrections_bullet_2',
            'why_heartgrams_corrections_bullet_3',
            
            'why_heartgrams_founder_subtitle',
            'why_heartgrams_founder_title',
            'why_heartgrams_founder_p1',
            'why_heartgrams_founder_p2',
            'why_heartgrams_founder_p3',
            'why_heartgrams_founder_p4',
            'why_heartgrams_founder_quote',
            'why_heartgrams_founder_quote_author',
            
            'why_heartgrams_features_subtitle',
            'why_heartgrams_features_title',
            'why_heartgrams_features_description',
            
            'why_heartgrams_cta_subtitle',
            'why_heartgrams_cta_title',
            'why_heartgrams_cta_description',
            'why_heartgrams_cta_button_1_text',
            'why_heartgrams_cta_button_1_link',
            'why_heartgrams_cta_button_2_text',
            'why_heartgrams_cta_button_2_link',
            'why_heartgrams_seo_tags',
        ];

        for ($i = 1; $i <= 6; $i++) {
            $keys[] = "why_heartgrams_feature_{$i}_title";
            $keys[] = "why_heartgrams_feature_{$i}_desc";
            
            $keys[] = "why_heartgrams_included_{$i}_title";
            $keys[] = "why_heartgrams_included_{$i}_desc";
        }

        foreach ($keys as $key) {
            if ($request->has($key)) {
                \App\PageContent::updateOrCreate(
                    ['key' => $key],
                    ['value' => $request->input($key)]
                );
            }
        }

        return redirect()->back()->with('success', 'Page content updated successfully.');
    }
}
