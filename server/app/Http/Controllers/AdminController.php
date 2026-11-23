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

    public function destroyLead($id)
    {
        $lead = \App\Lead::findOrFail($id);

        // Clean up any uploaded attachment files from disk
        if (!empty($lead->attachments)) {
            foreach ($lead->attachments as $att) {
                if (!empty($att['url'])) {
                    $parsedPath = parse_url($att['url'], PHP_URL_PATH);
                    $rel = ltrim(str_replace('/storage/', '', $parsedPath), '/');
                    @unlink(public_path('storage/' . $rel));
                    @unlink(storage_path('app/public/' . $rel));
                }
            }
        }

        $lead->delete();

        return redirect()->route('admin.leads')->with('success', 'Lead from ' . $lead->name . ' was deleted successfully.');
    }

    public function editWhyHeartgrams()
    {
        $content = [
            'hero_subtitle' => \App\PageContent::get('why_heartgrams_hero_subtitle', ''),
            'hero_title' => \App\PageContent::get('why_heartgrams_hero_title', 'Why choose a personalised song from Heartgrams?'),
            'hero_highlight' => \App\PageContent::get('why_heartgrams_hero_highlight', 'Heartgrams'),
            'hero_description' => \App\PageContent::get('why_heartgrams_hero_description', 'The cake gets eaten. The card goes in a drawer. The song with their name in it gets played every birthday, every anniversary, every time they miss you.'),
            
            'everything_subtitle' => \App\PageContent::get('why_heartgrams_everything_subtitle', 'EVERYTHING INCLUDED'),
            'everything_title' => \App\PageContent::get('why_heartgrams_everything_title', 'Everything included in your Heartgram.'),
            'everything_description' => \App\PageContent::get('why_heartgrams_everything_description', "Here's exactly what you get with every song."),
            
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
            'features_description' => \App\PageContent::get('why_heartgrams_features_description', 'Every song is written from scratch from your real memories, and every lyric passes our quality check before you see it.'),
            
            'cta_subtitle' => \App\PageContent::get('why_heartgrams_cta_subtitle', 'READY WHEN YOU ARE'),
            'cta_title' => \App\PageContent::get('why_heartgrams_cta_title', 'Some feelings deserve more than a message.'),
            'cta_description' => \App\PageContent::get('why_heartgrams_cta_description', 'Turn your memory into a song they can keep, replay, and feel again.'),
            'cta_button_1_text' => \App\PageContent::get('why_heartgrams_cta_button_1_text', 'Start My Song Story →'),
            'cta_button_1_link' => \App\PageContent::get('why_heartgrams_cta_button_1_link', '/create-your-heartgram-song'),
            'cta_button_2_text' => \App\PageContent::get('why_heartgrams_cta_button_2_text', 'Chat on WhatsApp'),
            'cta_button_2_link' => \App\PageContent::get('why_heartgrams_cta_button_2_link', 'https://wa.me/?text=Hi%20Heartgrams%2C%20I%20would%20like%20to%20create%20a%20song'),
            'seo_tags' => \App\PageContent::get('why_heartgrams_seo_tags', ''),
        ];

        $defaultFeatures = [
            ['title' => 'Real stories, not templates', 'desc' => 'Every Heartgram is built from scratch using your specific memories, names, and emotions.'],
            ['title' => 'Human-crafted lyrics', 'desc' => 'A lyricist who writes in your language reads your story and writes lyrics that could only belong to you.'],
            ['title' => 'Native-language warmth', 'desc' => 'Written in the language that feels natural: Tamil, Malayalam, Kannada, Telugu, Hindi or English.'],
            ['title' => 'Private story promise', 'desc' => 'Your story is used only to create your song and handled with complete confidentiality.'],
            ['title' => 'Replay value for years', 'desc' => 'Unlike flowers or chocolate, a Heartgram can be replayed on anniversaries, birthdays and quiet moments.'],
            ['title' => 'MP3-ready delivery', 'desc' => 'MP3 and lyrics PDF delivered on WhatsApp and email, easy to share or keep forever.'],
        ];

        for ($i = 1; $i <= 6; $i++) {
            $t = \App\PageContent::get("why_heartgrams_feature_{$i}_title", $defaultFeatures[$i-1]['title']);
            $d = \App\PageContent::get("why_heartgrams_feature_{$i}_desc", $defaultFeatures[$i-1]['desc']);
            if ($i === 2 && str_contains($d, 'A real writer')) {
                $d = 'A lyricist who writes in your language reads your story and writes lyrics that could only belong to you.';
            }
            if ($i === 3 && str_contains($d, 'English, Tamil, Telugu, Malayalam, or Hindi')) {
                $d = 'Written in the language that feels natural: Tamil, Malayalam, Kannada, Telugu, Hindi or English.';
            }
            if ($i === 6 && str_contains($d, 'delivered via WhatsApp')) {
                $d = 'MP3 and lyrics PDF delivered on WhatsApp and email, easy to share or keep forever.';
            }
            $content["feature_{$i}_title"] = $t;
            $content["feature_{$i}_desc"] = $d;
        }
        
        $defaultIncluded = [
            ['title' => 'Personalized song', 'desc' => 'A complete song made from your story and emotion — not a template.'],
            ['title' => 'Custom lyrics', 'desc' => 'Written by a lyricist in your language, around your memories, names and message.'],
            ['title' => 'MP3 delivery', 'desc' => 'Easy to share privately on WhatsApp, email or personal message. Yours to keep forever.'],
            ['title' => 'Lyrics PDF', 'desc' => 'A clean, readable keepsake version of the lyrics — for framing, printing, or saving.'],
            ['title' => 'Lyrics you approve', 'desc' => 'Our quality team checks every lyric, then it comes to you. Ask for changes; we make the song only after you approve.'],
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
            if ($request->exists($key)) {
                \App\PageContent::updateOrCreate(
                    ['key' => $key],
                    ['value' => $request->input($key, '') ?? '']
                );
            }
        }

        return redirect()->back()->with('success', 'Page content updated successfully.');
    }
}
