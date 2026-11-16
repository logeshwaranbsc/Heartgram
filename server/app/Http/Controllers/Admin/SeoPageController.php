<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SeoPage;
use Illuminate\Support\Str;

class SeoPageController extends Controller
{
    public function index()
    {
        $pages = SeoPage::latest()->get();
        return view('admin.seo-pages.index', compact('pages'));
    }

    public function create()
    {
        $page = new SeoPage();
        $content = $this->getDefaultContent();
        return view('admin.seo-pages.form', compact('page', 'content'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:seo_pages',
        ]);

        $page = new SeoPage();
        $page->name = $validated['name'];
        $page->slug = Str::slug($validated['slug']);
        $page->is_published = $request->has('is_published');
        
        $page->seo_tags = $request->input('seo_tags');
        
        $content = $request->except(['_token', 'name', 'slug', 'is_published', 'seo_tags']);
        $page->content = $content;
        
        $page->save();

        return redirect()->route('admin.seo-pages.index')->with('success', 'SEO Page created successfully.');
    }

    public function edit(SeoPage $seoPage)
    {
        $page = $seoPage;
        // Merge saved content over default content to ensure all keys exist
        $content = array_merge($this->getDefaultContent(), $page->content ?? []);
        return view('admin.seo-pages.form', compact('page', 'content'));
    }

    public function update(Request $request, SeoPage $seoPage)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:seo_pages,slug,' . $seoPage->id,
        ]);

        $seoPage->name = $validated['name'];
        $seoPage->slug = Str::slug($validated['slug']);
        $seoPage->is_published = $request->has('is_published');
        $seoPage->seo_tags = $request->input('seo_tags');
        
        $content = $request->except(['_token', '_method', 'name', 'slug', 'is_published', 'seo_tags']);
        $seoPage->content = $content;
        
        $seoPage->save();

        return redirect()->route('admin.seo-pages.index')->with('success', 'SEO Page updated successfully.');
    }

    public function destroy(SeoPage $seoPage)
    {
        $seoPage->delete();
        return redirect()->route('admin.seo-pages.index')->with('success', 'SEO Page deleted successfully.');
    }

    private function getDefaultContent()
    {
        return [
            // Hero
            'hero_tag' => 'A GIFT ONLY YOUR DAD COULD OWN',
            'hero_title' => 'The Most Emotional <br><i>Father\'s Day Song</i><br> You Will Ever Gift Him',
            'hero_desc' => 'Every Father\'s Day song deserves to be a gift he plays on repeat. Heartgrams turns your real memories, inside jokes, and the words you\'ve never said out loud into a personalized Father\'s Day song — written for one man only: your dad.',
            'hero_btn1' => 'Create His Father\'s Day Song',
            'hero_btn1_link' => '#order-form',
            'hero_btn2' => 'Listen to Samples',
            'hero_btn2_link' => '#audio-samples',
            
            // Hero Audio Card
            'hero_audio_tag' => 'FATHER\'S DAY SONG',
            'hero_audio_title' => 'For Appa, With Love',
            'hero_audio_quote' => '"You carried our whole family on your shoulders and never once put us down..."',
            'hero_audio_mp3' => '',
            
            // Why Different
            'diff_tag' => 'WHY THIS GIFT IS DIFFERENT',
            'diff_title' => 'A Father\'s Day Song Says What Cards Never Could',
            'diff_left_p' => 'Ties get worn once a year. Mugs sit in a cupboard. But a Father\'s Day song becomes part of his life — played in the car, replayed on WhatsApp status, sung at family dinners for years after the day itself is gone.',
            'diff_right_p1' => 'That\'s the real reason a <strong>personalized Father\'s Day song</strong> has become one of the most searched, most gifted ideas for the day: it\'s not a product, it\'s proof. Proof that you noticed the small things — the 5 a.m. drop-offs, the quiet sacrifices, the jokes only your family understands.',
            'diff_right_p2' => 'A <strong>unique Father\'s Day gift</strong> like this doesn\'t need explaining when he receives it. He\'ll hear his own life, his own name, his own story — set to music that\'s his, and only his.',
            
            // Features Section (Reaches Places)
            'reach_tag' => 'DEEP DOWN, HE WANTS TO FEEL REMEMBERED',
            'reach_title' => 'Why a Father\'s Day Song Reaches Places Gifts Can\'t',
            'reach_desc' => 'Fathers rarely ask for anything. They give, and give, and quietly hope someone noticed. A Father\'s Day song is how you finally say it out loud — set to melody so it lands the way words on their own sometimes can\'t.',
            'reach_feat1_title' => 'Emotion Over Effort',
            'reach_feat1_desc' => 'A best Father\'s Day song doesn\'t need a big production budget of memories — it needs one true story. We help you find that story, then build the whole song around it.',
            'reach_feat2_title' => 'Words He\'ll Finally Hear',
            'reach_feat2_desc' => 'Many families never say "thank you" or "I\'m proud of you" directly. An emotional song for father becomes the safe, beautiful way to finally say it.',
            'reach_feat3_title' => 'A Keepsake, Not a Consumable',
            'reach_feat3_desc' => 'Unlike flowers or festive hampers, a Father\'s Day song for dad lives forever on a phone, replayed on anniversaries, birthdays, and quiet evenings for years to come.',
            
            // Process Section
            'process_tag' => 'SIMPLE, GUIDED, PERSONAL',
            'process_title' => 'How Your Father\'s Day Song Comes To Life',
            
            'process_1_title' => 'Share Your Story',
            'process_1_desc' => 'Answer a few guided questions about your dad — memories, nicknames, quirks, and the moments that matter.',
            
            'process_2_title' => 'We Write The Lyrics',
            'process_2_desc' => 'Our songwriters turn your story into original, emotional lyrics — never templated.',
            
            'process_3_title' => 'Studio Production',
            'process_3_desc' => 'Your Father\'s Day song is composed and produced in the language and style you chose.',
            
            'process_4_title' => 'Delivered To You',
            'process_4_desc' => 'Receive your MP3, lyrics PDF, and keepsake — ready to gift on Father\'s Day.',
            
            // Pricing
            'pricing_title' => 'Choose the Heartgrams That Fits Your Moment',
            'pricing_desc' => 'Simple packages for real emotions. No confusing options. Payment confirmed on WhatsApp after we review your story.',
            
            // FAQ
            'faq_tag' => 'QUESTIONS BEFORE YOU ORDER',
            'faq_title' => 'Father\'s Day Song — Frequently Asked Questions',
            
            'faq_1_q' => 'What exactly is a personalized Father\'s Day song?',
            'faq_1_a' => 'A personalized Father\'s Day song is an original song written and produced around your real memories, inside jokes, and feelings about your dad, instead of a generic track. Heartgrams turns your story into lyrics and a fully produced song you can gift on Father\'s Day.',
            
            'faq_2_q' => 'How long does it take to receive my Father\'s Day song?',
            'faq_2_a' => 'Standard delivery takes 5-7 days. Signature tier includes priority delivery which is faster.',
            
            'faq_3_q' => 'Can I choose the language for the Father\'s Day song?',
            'faq_3_a' => 'We currently offer songs in English, Hindi, Tamil, Telugu, and Malayalam.',
            
            'faq_4_q' => 'What do I receive with my custom song for dad?',
            'faq_4_a' => 'You will receive a high-quality MP3 of your song and a beautifully designed PDF of your lyrics.',
            
            'faq_5_q' => 'Is every Father\'s Day song really unique?',
            'faq_5_a' => 'Yes, every lyric is written specifically based on the details and story you share with us.',
            
            'faq_6_q' => 'Can I order for a husband, parent, or friend instead?',
            'faq_6_a' => 'Absolutely! Heartgrams are perfect for any relationship and occasion.',
            
            // SEO Content Block
            'seo_article_tag' => 'THE COMPLETE GUIDE',
            'seo_article_title' => 'Finding The Best Father\'s Day Song For Your Dad',
            'seo_article_html' => '<p>Choosing the best Father\'s Day song for your father starts with one question: what do you actually remember about him? Not the polished, Instagram version of fatherhood, but the real one — the way he hums while driving, the way he still calls you by a childhood nickname, the way he never once complained about working overtime. A great Father\'s Day song is built entirely from those specifics. At Heartgrams, we\'ve learned that the more personal the detail, the more powerful the personalized Father\'s Day song becomes.</p>
            
            <h3>Why Generic Gifts Fall Short On Father\'s Day</h3>
            <p>Every year, the same aisle of wallets, watches, and mugs gets picked clean before Father\'s Day even arrives. These gifts are thoughtful, but they rarely feel personal. A Father\'s Day song for dad, on the other hand, cannot be duplicated or returned — because it\'s assembled entirely from your family\'s own history. That\'s why more people each year are searching for a unique Father\'s Day gift that goes beyond the store shelf, and landing on the idea of a custom song for dad instead.</p>
            
            <h3>What Makes A Father\'s Day Song Truly Emotional</h3>
            <p>An emotional song for father works because it mirrors real speech patterns — the way your dad actually talks, the advice he gives, the way he laughs. When we write a personalized Father\'s Day song, we aren\'t just rhyming words; we are scoring your family\'s memories.</p>',
        ];
    }
}
