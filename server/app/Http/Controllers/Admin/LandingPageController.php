<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LandingPage;
use Illuminate\Support\Str;

class LandingPageController extends Controller
{
    public function index()
    {
        $pages = LandingPage::latest()->get();
        return view('admin.landing-pages.index', compact('pages'));
    }

    public function create()
    {
        $page = new LandingPage();
        $content = $this->getDefaultContent();
        return view('admin.landing-pages.form', compact('page', 'content'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:landing_pages',
        ]);

        $page = new LandingPage();
        $page->name = $validated['name'];
        $page->slug = Str::slug($validated['slug']);
        $page->is_published = $request->has('is_published');
        
        $page->seo_tags = $request->input('seo_tags');
        
        $content = $request->except(['_token', 'name', 'slug', 'is_published', 'seo_tags']);
        $page->content = $content;
        
        $page->save();

        return redirect()->route('admin.landing-pages.index')->with('success', 'Landing Page created successfully.');
    }

    public function edit(LandingPage $landingPage)
    {
        $page = $landingPage;
        // Merge saved content over default content to ensure all keys exist
        $content = array_merge($this->getDefaultContent(), $page->content ?? []);
        return view('admin.landing-pages.form', compact('page', 'content'));
    }

    public function update(Request $request, LandingPage $landingPage)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:landing_pages,slug,' . $landingPage->id,
        ]);

        $landingPage->name = $validated['name'];
        $landingPage->slug = Str::slug($validated['slug']);
        $landingPage->is_published = $request->has('is_published');
        $landingPage->seo_tags = $request->input('seo_tags');
        
        $content = $request->except(['_token', '_method', 'name', 'slug', 'is_published', 'seo_tags']);
        $landingPage->content = $content;
        
        $landingPage->save();

        return redirect()->route('admin.landing-pages.index')->with('success', 'Landing Page updated successfully.');
    }

    public function destroy(LandingPage $landingPage)
    {
        $landingPage->delete();
        return redirect()->route('admin.landing-pages.index')->with('success', 'Landing Page deleted successfully.');
    }

    private function getDefaultContent()
    {
        return [
            // Hero
            'hero_small_title' => 'A PERSONALISED SONG, WRITTEN FROM YOUR STORY',
            'hero_title' => 'Say what you feel —<br>even if you\'re "bad<br>with words."',
            'hero_subtitle' => 'No writing skills needed. Our writers turn your story into lyrics for you.',
            'hero_description' => 'Tell us the memory. We compose the melody, write the lyrics, and hand you a real song made for one person — in English, Tamil, Telugu, Malayalam, or Hindi.',
            'hero_btn1_text' => 'Start My Song Story →',
            'hero_btn1_link' => '#',
            'hero_btn2_text' => 'Hear a Sample',
            'hero_btn2_link' => '#',
            'hero_warning_text' => 'Only 9 writing slots left this week',
            
            // Hero Stats
            'hero_stat1_number' => '500+',
            'hero_stat1_label' => 'Songs',
            'hero_stat2_number' => '5',
            'hero_stat2_label' => 'Languages',
            'hero_stat3_number' => '100%',
            'hero_stat3_label' => 'Personalised',
            
            // Hero Card
            'hero_card_tag' => 'NOW COMPOSING',
            'hero_card_title' => '"For Amma, on her 60th."',
            'hero_card_subtitle' => 'A birthday Heartgram · Malayalam · Tender & joyful',
            'hero_card_audio_link' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3',
            'hero_card_footer' => 'Every song starts this way — with one real story, not a fill-in-the-blank form.',

            // Reactions
            'reactions_subtitle' => 'WHAT PEOPLE SAY, AFTER THEY HIT PLAY',
            'reactions_title' => 'Real reactions to real Heartgrams.',
            'reaction_1_tag' => 'Love',
            'reaction_1_video' => '',
            'reaction_1_duration' => '0:47',
            'reaction_2_tag' => 'Birthday',
            'reaction_2_video' => '',
            'reaction_2_duration' => '0:47',
            'reaction_3_tag' => 'Parents',
            'reaction_3_video' => '',
            'reaction_3_duration' => '0:47',
            
            // Audio Sample
            'audio_subtitle' => 'BEFORE YOU WRITE A SINGLE WORD',
            'audio_title' => 'Hear what a feeling sounds like.',
            'audio_desc' => 'Pick an emotion, press play — this is the kind of song a real story becomes.',
            'audio_player_tag' => 'NOW PREVIEWING',
            
            'audio_cat_1_name' => 'Love',
            'audio_cat_1_title' => 'A Love Heartgram',
            'audio_cat_1_subtitle' => '60-second sample - original composition',
            'audio_cat_1_mp3' => '',
            
            'audio_cat_2_name' => 'Apology',
            'audio_cat_2_title' => 'An Apology Heartgram',
            'audio_cat_2_subtitle' => '60-second sample - original composition',
            'audio_cat_2_mp3' => '',
            
            'audio_cat_3_name' => 'Birthday',
            'audio_cat_3_title' => 'A Birthday Heartgram',
            'audio_cat_3_subtitle' => '60-second sample - original composition',
            'audio_cat_3_mp3' => '',
            
            'audio_cat_4_name' => 'Proposal',
            'audio_cat_4_title' => 'A Proposal Heartgram',
            'audio_cat_4_subtitle' => '60-second sample - original composition',
            'audio_cat_4_mp3' => '',
            
            // FAQs
            'faq_1_q' => 'What is Heartgram?',
            'faq_1_a' => 'Heartgram is a personalised song creation service where we take your story and turn it into a beautiful, professional song.',
            
            'faq_2_q' => 'Is the song fully personalised?',
            'faq_2_a' => 'Yes, every lyric is written specifically based on the details and story you share with us.',
            
            'faq_3_q' => 'What languages are available?',
            'faq_3_a' => 'We currently offer songs in English, Hindi, Tamil, Telugu, and Malayalam.',
            
            'faq_4_q' => 'What will I receive?',
            'faq_4_a' => 'You will receive a high-quality MP3 of your song and a beautifully designed PDF of your lyrics.',
            
            'faq_5_q' => 'How long will delivery take?',
            'faq_5_a' => 'Standard delivery takes 5-7 days. Signature tier includes priority delivery which is faster.',
            
            'faq_6_q' => 'Can I order for a wife, husband, parent, or friend?',
            'faq_6_a' => 'Absolutely! Heartgrams are perfect for any relationship and occasion.',
            
            // Pricing
            'pricing_subtitle' => 'TODAY\'S OFFER',
            'pricing_title' => 'Choose your Heartgram',
            'pricing_desc' => 'Every tier is a real song, written from scratch. The difference is depth.',
            
            // CTA
            'cta_subtitle' => 'TODAY\'S OFFER — RECAP',
            'cta_title' => 'Some feelings deserve more than a<br>message.',
            'cta_desc' => 'Turn your memory into a song they can keep, replay, and feel again.',
            'cta_btn_text' => 'Start My Song Story →',
            'cta_btn_link' => '#',
            'cta_warning_text' => 'Only 9 writing slots left this week — orders after that begin next cycle.',
        ];
    }
}
