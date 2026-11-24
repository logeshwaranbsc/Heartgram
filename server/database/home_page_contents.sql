-- ==============================================================
-- Heartgram - Home Page CMS Database Setup & Seed Query
-- Table: page_contents
-- Run this SQL in phpMyAdmin or MySQL CLI
-- ==============================================================

CREATE TABLE IF NOT EXISTS `page_contents` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) NOT NULL,
  `value` longtext NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_contents_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed Home Page Default Content
INSERT INTO `page_contents` (`key`, `value`, `created_at`, `updated_at`) VALUES
-- 1. Hero Section
('home_hero_badge', 'PERSONALIZED SONGS IN TAMIL & ENGLISH', NOW(), NOW()),
('home_hero_title_line_1', 'A personalised song', NOW(), NOW()),
('home_hero_title_line_2', 'that leaves them', NOW(), NOW()),
('home_hero_title_highlight', 'speechless.', NOW(), NOW()),
('home_hero_description', 'Tell us the memories only the two of you share. Our lyricists write them into a song made for that one person.', NOW(), NOW()),
('home_hero_cta_1_text', 'Start My Song Story', NOW(), NOW()),
('home_hero_cta_1_link', '#start', NOW(), NOW()),
('home_hero_cta_2_text', 'Hear a Sample', NOW(), NOW()),
('home_hero_cta_2_link', '#samples', NOW(), NOW()),
('home_hero_badge_1', 'Private story handling', NOW(), NOW()),
('home_hero_badge_2', '6 Languages available', NOW(), NOW()),
('home_hero_badge_3', 'Ready in 3-5 days', NOW(), NOW()),
('home_hero_badge_4', 'Delivered on WhatsApp & email', NOW(), NOW()),
('home_hero_bg_image', '/images/hero_background.png?v=2', NOW(), NOW()),
('home_hero_album_art', '/images/album_art_amma.png', NOW(), NOW()),
('home_hero_audio', '/audio/sample_amma.wav', NOW(), NOW()),
('home_hero_player_title_1', 'For Amma,', NOW(), NOW()),
('home_hero_player_title_2', 'on her 60th.', NOW(), NOW()),

-- 2. Interactive Preview
('home_preview_badge', 'BEFORE YOU WRITE A WORD', NOW(), NOW()),
('home_preview_title', 'Hear our Heartgrams.', NOW(), NOW()),
('home_preview_description', 'Pick a feeling, press play, and hear what a Heartgram sounds like — before you tell us a single memory.', NOW(), NOW()),
('home_preview_btn_text', 'Explore all categories', NOW(), NOW()),
('home_preview_btn_link', '/occasions', NOW(), NOW()),

-- 3. Occasions Section Banner
('home_occasions_badge', 'MADE FOR EVERY OCCASION', NOW(), NOW()),
('home_occasions_title_line_1', 'For anyone,', NOW(), NOW()),
('home_occasions_title_highlight', 'for any reason.', NOW(), NOW()),
('home_occasions_description', 'Everyone deserves their own song — a birthday, a wedding, an apology, or a Tuesday afternoon.', NOW(), NOW()),
('home_occasions_btn_text', 'Explore all occasions', NOW(), NOW()),
('home_occasions_btn_link', '/occasions', NOW(), NOW()),

-- 4. How It Works
('home_hiw_title', 'How Heartgrams Works', NOW(), NOW()),
('home_hiw_description', 'Five simple steps from your story to a song they\'ll never forget.', NOW(), NOW()),
('home_hiw_step_1_title', 'Share your story and select occasion', NOW(), NOW()),
('home_hiw_step_1_desc', 'Tell us names, memories, inside jokes, and how you want them to feel.', NOW(), NOW()),
('home_hiw_step_2_title', 'Our lyricist crafts your personalized verse', NOW(), NOW()),
('home_hiw_step_2_desc', 'A dedicated lyricist writes real lyrics around your story in your selected language.', NOW(), NOW()),
('home_hiw_step_3_title', 'Melody & music recorded by real artists', NOW(), NOW()),
('home_hiw_step_3_desc', 'Composed and recorded in studio quality with live instruments and vocals.', NOW(), NOW()),
('home_hiw_step_4_title', 'Hear sample and approve lyrics', NOW(), NOW()),
('home_hiw_step_4_desc', 'Review your lyrics and request tweaks before final master production.', NOW(), NOW()),
('home_hiw_step_5_title', 'Final master song delivered via WhatsApp & email', NOW(), NOW()),
('home_hiw_step_5_desc', 'Receive your high quality MP3 and printable keepsake Lyric PDF.', NOW(), NOW()),

-- 5. Wall of Love / Testimonials Intro
('home_testimonials_badge', 'WALL OF LOVE', NOW(), NOW()),
('home_testimonials_title', 'Songs that made them cry, laugh & remember.', NOW(), NOW()),
('home_testimonials_subtitle', 'Real reactions from real families, shared with their permission.', NOW(), NOW()),
('home_testimonials_btn_text', 'See more reactions', NOW(), NOW()),
('home_testimonials_btn_link', '#start', NOW(), NOW()),

-- 6. Pricing Section
('home_pricing_badge', 'CHOOSE YOUR HEARTGRAM', NOW(), NOW()),
('home_pricing_title', 'Every tier is a real song, written from scratch.', NOW(), NOW()),
('home_pricing_subtitle', 'The difference is the depth of the story we shape.', NOW(), NOW()),

-- 7. Song Creation Form Header
('home_form_title', 'Start your Heartgram', NOW(), NOW()),
('home_form_subtitle', 'Tell us your story. We\'ll craft the melody.', NOW(), NOW()),

-- 8. FAQ Section
('home_faq_badge', 'FREQUENTLY ASKED', NOW(), NOW()),
('home_faq_title', 'Questions? We have answers.', NOW(), NOW()),
('home_faq_1_q', 'How long does a personalised song take?', NOW(), NOW()),
('home_faq_1_a', 'Classic songs arrive on WhatsApp and email in 3-5 days. Premium songs arrive in 1-2 days. The clock starts once your story is complete and payment is confirmed, and the time you take to review your lyrics isn\'t counted. Need it by a certain date? Tell us when you order.', NOW(), NOW()),
('home_faq_2_q', 'Which languages and styles can I choose?', NOW(), NOW()),
('home_faq_2_a', 'Tamil, Malayalam, Kannada, Telugu, Hindi or English. Each language has its own lyricist. For style, pick acoustic, romantic ballad, soulful indie, upbeat pop or classical acoustic. Not sure? Tell us the mood and we\'ll choose.', NOW(), NOW()),
('home_faq_3_q', 'Who owns the song, and where can I share it?', NOW(), NOW()),
('home_faq_3_a', 'You can play, download, keep and share your song anywhere personal: WhatsApp, Instagram, a wedding screen, a family video. Using it in ads, for a business or on a monetised channel needs a separate licence. Just ask us.', NOW(), NOW()),
('home_faq_4_q', 'Can I change the lyrics before the song is made?', NOW(), NOW()),
('home_faq_4_a', 'Yes. After our quality team checks your lyrics, we send them to you. Ask for changes and we\'ll send the corrected version back. We make the song only once you approve. Classic comes with one lyric option; Premium gives you more than one to choose from.', NOW(), NOW()),
('home_faq_5_q', 'How much does a personalised song cost?', NOW(), NOW()),
('home_faq_5_a', 'Heartgram Classic is ₹1,999 and Heartgram Premium is ₹2,999. Both prices include everything, with no extra fees. Premium adds deeper story shaping, more lyric options, WAV files and 1-2 day delivery.', NOW(), NOW()),
('home_faq_6_q', 'Is a real person writing my song?', NOW(), NOW()),
('home_faq_6_a', 'Yes. Each language has its own lyricist, from that language\'s music industry. Your lyricist reads your story and writes the lyrics, our quality team checks them, and you approve them before the song is made.', NOW(), NOW()),
('home_faq_7_q', 'How do I pay?', NOW(), NOW()),
('home_faq_7_a', 'After you send your story, we message you on WhatsApp with a payment link. We start once payment is confirmed.', NOW(), NOW()),

-- 9. Privacy Promise Section
('home_privacy_badge', 'PRIVACY PROMISE', NOW(), NOW()),
('home_privacy_title', 'Your story stays yours.', NOW(), NOW()),
('home_privacy_description', 'Some stories are too personal to be public. Heartgrams uses your details only to create your song. We don\'t share your story, lyrics, audio, photos, or memories publicly without your permission.', NOW(), NOW()),
('home_privacy_btn_text', 'Create My Private Song', NOW(), NOW()),
('home_privacy_point_1', 'Private story handling — only our song team sees your details', NOW(), NOW()),
('home_privacy_point_2', 'Public samples only with your explicit permission', NOW(), NOW()),
('home_privacy_point_3', 'Personal details used only for your song creation', NOW(), NOW()),
('home_privacy_point_4', 'WhatsApp support for any sensitive instructions', NOW(), NOW()),
('home_privacy_point_5', 'Secure payment flow — confirmed before production starts', NOW(), NOW()),

-- 10. Founder Story Section
('home_founder_badge', 'FOUNDER STORY', NOW(), NOW()),
('home_founder_title', 'Why Heartgrams exists.', NOW(), NOW()),
('home_founder_p1', 'Heartgrams was founded by Hilaary James with one simple thought: many people love deeply, but they do not always say it.', NOW(), NOW()),
('home_founder_p2', 'Life moves fast — work, distance, screens, small fights, daily routines. Even when someone is close to us, the words in our heart may stay unsaid.', NOW(), NOW()),
('home_founder_p3', 'Hilaary created Heartgrams to help people say those words in a beautiful way — a birthday wish, a proposal, an apology, or a memory turned into a song for the person you love.', NOW(), NOW()),
('home_founder_quote', 'Some feelings are too important to remain unsaid.', NOW(), NOW()),
('home_founder_name', 'Hilaary James', NOW(), NOW()),
('home_founder_role', 'Founder, Heartgrams', NOW(), NOW()),
('home_founder_card_title', 'The Gift That Lasts Forever', NOW(), NOW()),
('home_founder_card_desc', 'Some gifts are opened. This one is felt forever — played again at 2am, shared with a parent, cried to alone. A Heartgram outlives any moment.', NOW(), NOW()),
('home_founder_image', '', NOW(), NOW()),

-- 11. Final CTA Section
('home_cta_badge', 'Ready when you are', NOW(), NOW()),
('home_cta_title', 'Some feelings deserve more than a message.', NOW(), NOW()),
('home_cta_subtitle', 'Turn your memory into a song they can keep, replay, and feel again.', NOW(), NOW()),
('home_cta_btn_1_text', 'Start My Song Story', NOW(), NOW()),
('home_cta_btn_1_link', '#start', NOW(), NOW()),
('home_cta_btn_2_text', 'Chat on WhatsApp', NOW(), NOW()),
('home_cta_btn_2_link', 'https://wa.me/919585475959?text=Hi%20Heartgrams%2C%20I%20would%20like%20to%20create%20a%20song', NOW(), NOW()),

-- 12. Footer
('home_footer_tagline', 'Turning your emotions into personalised songs that last a lifetime. Written by real lyricists, composed from your story.', NOW(), NOW()),
('home_footer_whatsapp', '+91 95854 75959', NOW(), NOW()),
('home_footer_email', 'hello@heartgrams.in', NOW(), NOW()),
('home_footer_copyright', '© 2026 Heartgrams. Made with love, one story at a time.', NOW(), NOW())

ON DUPLICATE KEY UPDATE
  `value` = VALUES(`value`),
  `updated_at` = VALUES(`updated_at`);
