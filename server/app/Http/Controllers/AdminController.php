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

    /**
     * Show the Home Page CMS editor.
     */
    public function editHome()
    {
        $content = [
            // 1. Hero Section
            'home_hero_badge' => \App\PageContent::get('home_hero_badge', 'PERSONALIZED SONGS IN TAMIL & ENGLISH'),
            'home_hero_title_line_1' => \App\PageContent::get('home_hero_title_line_1', 'A personalised song'),
            'home_hero_title_line_2' => \App\PageContent::get('home_hero_title_line_2', 'that leaves them'),
            'home_hero_title_highlight' => \App\PageContent::get('home_hero_title_highlight', 'speechless.'),
            'home_hero_description' => \App\PageContent::get('home_hero_description', 'Tell us the memories only the two of you share. Our lyricists write them into a song made for that one person.'),
            'home_hero_cta_1_text' => \App\PageContent::get('home_hero_cta_1_text', 'Start My Song Story'),
            'home_hero_cta_1_link' => \App\PageContent::get('home_hero_cta_1_link', '#start'),
            'home_hero_cta_2_text' => \App\PageContent::get('home_hero_cta_2_text', 'Hear a Sample'),
            'home_hero_cta_2_link' => \App\PageContent::get('home_hero_cta_2_link', '#samples'),
            'home_hero_badge_1' => \App\PageContent::get('home_hero_badge_1', 'Private story handling'),
            'home_hero_badge_2' => \App\PageContent::get('home_hero_badge_2', '6 Languages available'),
            'home_hero_badge_3' => \App\PageContent::get('home_hero_badge_3', 'Ready in 3-5 days'),
            'home_hero_badge_4' => \App\PageContent::get('home_hero_badge_4', 'Delivered on WhatsApp & email'),
            'home_hero_bg_image' => \App\PageContent::get('home_hero_bg_image', '/images/hero_background.png?v=2'),
            'home_hero_album_art' => \App\PageContent::get('home_hero_album_art', '/images/album_art_amma.png'),
            'home_hero_player_title_1' => \App\PageContent::get('home_hero_player_title_1', 'For Amma,'),
            'home_hero_player_title_2' => \App\PageContent::get('home_hero_player_title_2', 'on her 60th.'),

            // 2. Interactive Preview Section
            'home_preview_badge' => \App\PageContent::get('home_preview_badge', 'BEFORE YOU WRITE A WORD'),
            'home_preview_title' => \App\PageContent::get('home_preview_title', 'Hear our Heartgrams.'),
            'home_preview_description' => \App\PageContent::get('home_preview_description', 'Pick a feeling, press play, and hear what a Heartgram sounds like — before you tell us a single memory.'),
            'home_preview_btn_text' => \App\PageContent::get('home_preview_btn_text', 'Explore all categories'),

            // 3. Occasions Section Banner
            'home_occasions_badge' => \App\PageContent::get('home_occasions_badge', 'MADE FOR EVERY OCCASION'),
            'home_occasions_title_line_1' => \App\PageContent::get('home_occasions_title_line_1', 'For anyone,'),
            'home_occasions_title_highlight' => \App\PageContent::get('home_occasions_title_highlight', 'for any reason.'),
            'home_occasions_description' => \App\PageContent::get('home_occasions_description', 'Everyone deserves their own song — a birthday, a wedding, an apology, or a Tuesday afternoon.'),
            'home_occasions_btn_text' => \App\PageContent::get('home_occasions_btn_text', 'Explore all occasions'),
            'home_occasions_btn_link' => \App\PageContent::get('home_occasions_btn_link', '/occasions'),

            // 4. How Heartgrams Works
            'home_hiw_title' => \App\PageContent::get('home_hiw_title', 'How Heartgrams Works'),
            'home_hiw_description' => \App\PageContent::get('home_hiw_description', "Five simple steps from your story to a song they'll never forget."),
            'home_hiw_step_1_title' => \App\PageContent::get('home_hiw_step_1_title', 'Share your story and select occasion'),
            'home_hiw_step_1_desc' => \App\PageContent::get('home_hiw_step_1_desc', 'Tell us names, memories, inside jokes, and how you want them to feel.'),
            'home_hiw_step_2_title' => \App\PageContent::get('home_hiw_step_2_title', 'Our lyricist crafts your personalized verse'),
            'home_hiw_step_2_desc' => \App\PageContent::get('home_hiw_step_2_desc', 'A dedicated lyricist writes real lyrics around your story in your selected language.'),
            'home_hiw_step_3_title' => \App\PageContent::get('home_hiw_step_3_title', 'Melody & music recorded by real artists'),
            'home_hiw_step_3_desc' => \App\PageContent::get('home_hiw_step_3_desc', 'Composed and recorded in studio quality with live instruments and vocals.'),
            'home_hiw_step_4_title' => \App\PageContent::get('home_hiw_step_4_title', 'Hear sample and approve lyrics'),
            'home_hiw_step_4_desc' => \App\PageContent::get('home_hiw_step_4_desc', 'Review your lyrics and request tweaks before final master production.'),
            'home_hiw_step_5_title' => \App\PageContent::get('home_hiw_step_5_title', 'Final master song delivered via WhatsApp & email'),
            'home_hiw_step_5_desc' => \App\PageContent::get('home_hiw_step_5_desc', 'Receive your high quality MP3 and printable keepsake Lyric PDF.'),

            // 5. Wall of Love / Testimonials Intro
            'home_testimonials_badge' => \App\PageContent::get('home_testimonials_badge', 'WALL OF LOVE'),
            'home_testimonials_title' => \App\PageContent::get('home_testimonials_title', 'Songs that made them cry, laugh & remember.'),
            'home_testimonials_subtitle' => \App\PageContent::get('home_testimonials_subtitle', 'Real reactions from real families, shared with their permission.'),
            'home_testimonials_btn_text' => \App\PageContent::get('home_testimonials_btn_text', 'See more reactions'),
            'home_testimonials_btn_link' => \App\PageContent::get('home_testimonials_btn_link', '#start'),

            // 6. Pricing Section
            'home_pricing_badge' => \App\PageContent::get('home_pricing_badge', 'CHOOSE YOUR HEARTGRAM'),
            'home_pricing_title' => \App\PageContent::get('home_pricing_title', 'Every tier is a real song, written from scratch.'),
            'home_pricing_subtitle' => \App\PageContent::get('home_pricing_subtitle', 'The difference is the depth of the story we shape.'),

            // 7. Song Creation Form Header
            'home_form_title' => \App\PageContent::get('home_form_title', 'Start your Heartgram'),
            'home_form_subtitle' => \App\PageContent::get('home_form_subtitle', "Tell us your story. We'll craft the melody."),

            // 8. FAQ Section
            'home_faq_badge' => \App\PageContent::get('home_faq_badge', 'FREQUENTLY ASKED'),
            'home_faq_title' => \App\PageContent::get('home_faq_title', 'Questions? We have answers.'),
            'home_faq_1_q' => \App\PageContent::get('home_faq_1_q', 'How long does a personalised song take?'),
            'home_faq_1_a' => \App\PageContent::get('home_faq_1_a', "Classic songs arrive on WhatsApp and email in 3-5 days. Premium songs arrive in 1-2 days. The clock starts once your story is complete and payment is confirmed, and the time you take to review your lyrics isn't counted. Need it by a certain date? Tell us when you order."),
            'home_faq_2_q' => \App\PageContent::get('home_faq_2_q', 'Which languages and styles can I choose?'),
            'home_faq_2_a' => \App\PageContent::get('home_faq_2_a', "Tamil, Malayalam, Kannada, Telugu, Hindi or English. Each language has its own lyricist. For style, pick acoustic, romantic ballad, soulful indie, upbeat pop or classical acoustic. Not sure? Tell us the mood and we'll choose."),
            'home_faq_3_q' => \App\PageContent::get('home_faq_3_q', 'Who owns the song, and where can I share it?'),
            'home_faq_3_a' => \App\PageContent::get('home_faq_3_a', "You can play, download, keep and share your song anywhere personal: WhatsApp, Instagram, a wedding screen, a family video. Using it in ads, for a business or on a monetised channel needs a separate licence. Just ask us."),
            'home_faq_4_q' => \App\PageContent::get('home_faq_4_q', 'Can I change the lyrics before the song is made?'),
            'home_faq_4_a' => \App\PageContent::get('home_faq_4_a', "Yes. After our quality team checks your lyrics, we send them to you. Ask for changes and we'll send the corrected version back. We make the song only once you approve. Classic comes with one lyric option; Premium gives you more than one to choose from."),
            'home_faq_5_q' => \App\PageContent::get('home_faq_5_q', 'How much does a personalised song cost?'),
            'home_faq_5_a' => \App\PageContent::get('home_faq_5_a', "Heartgram Classic is ₹1,999 and Heartgram Premium is ₹2,999. Both prices include everything, with no extra fees. Premium adds deeper story shaping, more lyric options, WAV files and 1-2 day delivery."),
            'home_faq_6_q' => \App\PageContent::get('home_faq_6_q', 'Is a real person writing my song?'),
            'home_faq_6_a' => \App\PageContent::get('home_faq_6_a', "Yes. Each language has its own lyricist, from that language's music industry. Your lyricist reads your story and writes the lyrics, our quality team checks them, and you approve them before the song is made."),
            'home_faq_7_q' => \App\PageContent::get('home_faq_7_q', 'How do I pay?'),
            'home_faq_7_a' => \App\PageContent::get('home_faq_7_a', "After you send your story, we message you on WhatsApp with a payment link. We start once payment is confirmed."),

            // 9. Privacy Promise Section
            'home_privacy_badge' => \App\PageContent::get('home_privacy_badge', 'PRIVACY PROMISE'),
            'home_privacy_title' => \App\PageContent::get('home_privacy_title', 'Your story stays yours.'),
            'home_privacy_description' => \App\PageContent::get('home_privacy_description', "Some stories are too personal to be public. Heartgrams uses your details only to create your song. We don't share your story, lyrics, audio, photos, or memories publicly without your permission."),
            'home_privacy_btn_text' => \App\PageContent::get('home_privacy_btn_text', 'Create My Private Song'),
            'home_privacy_point_1' => \App\PageContent::get('home_privacy_point_1', 'Private story handling — only our song team sees your details'),
            'home_privacy_point_2' => \App\PageContent::get('home_privacy_point_2', 'Public samples only with your explicit permission'),
            'home_privacy_point_3' => \App\PageContent::get('home_privacy_point_3', 'Personal details used only for your song creation'),
            'home_privacy_point_4' => \App\PageContent::get('home_privacy_point_4', 'WhatsApp support for any sensitive instructions'),
            'home_privacy_point_5' => \App\PageContent::get('home_privacy_point_5', 'Secure payment flow — confirmed before production starts'),

            // 10. Founder Story Section
            'home_founder_badge' => \App\PageContent::get('home_founder_badge', 'FOUNDER STORY'),
            'home_founder_title' => \App\PageContent::get('home_founder_title', 'Why Heartgrams exists.'),
            'home_founder_p1' => \App\PageContent::get('home_founder_p1', 'Heartgrams was founded by Hilaary James with one simple thought: many people love deeply, but they do not always say it.'),
            'home_founder_p2' => \App\PageContent::get('home_founder_p2', 'Life moves fast — work, distance, screens, small fights, daily routines. Even when someone is close to us, the words in our heart may stay unsaid.'),
            'home_founder_p3' => \App\PageContent::get('home_founder_p3', 'Hilaary created Heartgrams to help people say those words in a beautiful way — a birthday wish, a proposal, an apology, or a memory turned into a song for the person you love.'),
            'home_founder_quote' => \App\PageContent::get('home_founder_quote', 'Some feelings are too important to remain unsaid.'),
            'home_founder_name' => \App\PageContent::get('home_founder_name', 'Hilaary James'),
            'home_founder_role' => \App\PageContent::get('home_founder_role', 'Founder, Heartgrams'),
            'home_founder_card_title' => \App\PageContent::get('home_founder_card_title', 'The Gift That Lasts Forever'),
            'home_founder_card_desc' => \App\PageContent::get('home_founder_card_desc', 'Some gifts are opened. This one is felt forever — played again at 2am, shared with a parent, cried to alone. A Heartgram outlives any moment.'),
            'home_founder_image' => \App\PageContent::get('home_founder_image', ''),

            // 11. Final CTA Section
            'home_cta_badge' => \App\PageContent::get('home_cta_badge', 'Ready when you are'),
            'home_cta_title' => \App\PageContent::get('home_cta_title', 'Some feelings deserve more than a message.'),
            'home_cta_subtitle' => \App\PageContent::get('home_cta_subtitle', 'Turn your memory into a song they can keep, replay, and feel again.'),
            'home_cta_btn_1_text' => \App\PageContent::get('home_cta_btn_1_text', 'Start My Song Story'),
            'home_cta_btn_1_link' => \App\PageContent::get('home_cta_btn_1_link', '#start'),
            'home_cta_btn_2_text' => \App\PageContent::get('home_cta_btn_2_text', 'Chat on WhatsApp'),
            'home_cta_btn_2_link' => \App\PageContent::get('home_cta_btn_2_link', 'https://wa.me/919585475959?text=Hi%20Heartgrams%2C%20I%20would%20like%20to%20create%20a%20song'),

            // 12. Footer
            'home_footer_tagline' => \App\PageContent::get('home_footer_tagline', 'Turning your emotions into personalised songs that last a lifetime. Written by real lyricists, composed from your story.'),
            'home_footer_whatsapp' => \App\PageContent::get('home_footer_whatsapp', '+91 95854 75959'),
            'home_footer_email' => \App\PageContent::get('home_footer_email', 'hello@heartgrams.in'),
            'home_footer_copyright' => \App\PageContent::get('home_footer_copyright', '© 2026 Heartgrams. Made with love, one story at a time.'),
        ];

        return view('admin.pages.home', compact('content'));
    }

    /**
     * Update Home Page CMS Content and handle local image file uploads.
     */
    public function updateHome(\Illuminate\Http\Request $request)
    {
        // 1. Text Fields to save
        $textKeys = [
            // Hero
            'home_hero_badge',
            'home_hero_title_line_1',
            'home_hero_title_line_2',
            'home_hero_title_highlight',
            'home_hero_description',
            'home_hero_cta_1_text',
            'home_hero_cta_1_link',
            'home_hero_cta_2_text',
            'home_hero_cta_2_link',
            'home_hero_badge_1',
            'home_hero_badge_2',
            'home_hero_badge_3',
            'home_hero_badge_4',
            'home_hero_player_title_1',
            'home_hero_player_title_2',

            // Preview
            'home_preview_badge',
            'home_preview_title',
            'home_preview_description',
            'home_preview_btn_text',

            // Occasions Banner
            'home_occasions_badge',
            'home_occasions_title_line_1',
            'home_occasions_title_highlight',
            'home_occasions_description',
            'home_occasions_btn_text',
            'home_occasions_btn_link',

            // How It Works
            'home_hiw_title',
            'home_hiw_description',
            'home_hiw_step_1_title',
            'home_hiw_step_1_desc',
            'home_hiw_step_2_title',
            'home_hiw_step_2_desc',
            'home_hiw_step_3_title',
            'home_hiw_step_3_desc',
            'home_hiw_step_4_title',
            'home_hiw_step_4_desc',
            'home_hiw_step_5_title',
            'home_hiw_step_5_desc',

            // Testimonials
            'home_testimonials_badge',
            'home_testimonials_title',
            'home_testimonials_subtitle',
            'home_testimonials_btn_text',
            'home_testimonials_btn_link',

            // Pricing
            'home_pricing_badge',
            'home_pricing_title',
            'home_pricing_subtitle',

            // Song Form
            'home_form_title',
            'home_form_subtitle',

            // FAQ
            'home_faq_badge',
            'home_faq_title',
            'home_faq_1_q', 'home_faq_1_a',
            'home_faq_2_q', 'home_faq_2_a',
            'home_faq_3_q', 'home_faq_3_a',
            'home_faq_4_q', 'home_faq_4_a',
            'home_faq_5_q', 'home_faq_5_a',
            'home_faq_6_q', 'home_faq_6_a',
            'home_faq_7_q', 'home_faq_7_a',

            // Privacy
            'home_privacy_badge',
            'home_privacy_title',
            'home_privacy_description',
            'home_privacy_btn_text',
            'home_privacy_point_1',
            'home_privacy_point_2',
            'home_privacy_point_3',
            'home_privacy_point_4',
            'home_privacy_point_5',

            // Founder
            'home_founder_badge',
            'home_founder_title',
            'home_founder_p1',
            'home_founder_p2',
            'home_founder_p3',
            'home_founder_quote',
            'home_founder_name',
            'home_founder_role',
            'home_founder_card_title',
            'home_founder_card_desc',

            // Final CTA
            'home_cta_badge',
            'home_cta_title',
            'home_cta_subtitle',
            'home_cta_btn_1_text',
            'home_cta_btn_1_link',
            'home_cta_btn_2_text',
            'home_cta_btn_2_link',

            // Footer
            'home_footer_tagline',
            'home_footer_whatsapp',
            'home_footer_email',
            'home_footer_copyright',
        ];

        foreach ($textKeys as $key) {
            if ($request->exists($key)) {
                \App\PageContent::updateOrCreate(
                    ['key' => $key],
                    ['value' => $request->input($key, '') ?? '']
                );
            }
        }

        // 2. Local Image Storage Handling (stored locally in public/uploads/home/)
        $imageFields = [
            'home_hero_bg_image',
            'home_hero_album_art',
            'home_founder_image',
        ];

        $uploadDirectory = public_path('uploads/home');
        if (!file_exists($uploadDirectory)) {
            @mkdir($uploadDirectory, 0755, true);
        }

        foreach ($imageFields as $imgKey) {
            // Check if user uploaded a file
            if ($request->hasFile($imgKey)) {
                $file = $request->file($imgKey);
                $ext = $file->getClientOriginalExtension();
                $cleanFilename = time() . '_' . uniqid() . '.' . $ext;
                $file->move($uploadDirectory, $cleanFilename);

                \App\PageContent::updateOrCreate(
                    ['key' => $imgKey],
                    ['value' => '/uploads/home/' . $cleanFilename]
                );
            } elseif ($request->filled($imgKey . '_text')) {
                // If text/URL provided directly
                \App\PageContent::updateOrCreate(
                    ['key' => $imgKey],
                    ['value' => trim($request->input($imgKey . '_text'))]
                );
            } elseif ($request->has('remove_' . $imgKey) && $request->input('remove_' . $imgKey) == '1') {
                // If reset/removed
                \App\PageContent::updateOrCreate(
                    ['key' => $imgKey],
                    ['value' => '']
                );
            }
        }

        return redirect()->back()->with('success', 'Home page content and images updated successfully!');
    }
}
