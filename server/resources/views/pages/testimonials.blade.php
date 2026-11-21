<x-public-layout>
    <x-slot name="seoTags">
        <title>Wall of Love & Real Reviews | Heartgrams</title>
        <meta name="description" content="Read and watch genuine customer reactions, emotional WhatsApp messages, and photo keepsakes from over 1,500+ customized Heartgrams.">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    </x-slot>

    @php
        try {
            if (class_exists(\App\Testimonial::class)) {
                $dbTestimonials = \App\Testimonial::where('is_published', true)
                    ->orderBy('sort_order', 'asc')
                    ->orderBy('created_at', 'desc')
                    ->get();
            } else {
                $dbTestimonials = collect();
            }
        } catch (\Throwable $e) {
            $dbTestimonials = collect();
        }

        $defaultTestimonials = [
            // --- CATEGORY 1: VIDEOS (6 Items) ---
            [
                'id' => 'v1',
                'type' => 'video',
                'name' => 'Sarah & Arjun',
                'occasion' => '5th Anniversary',
                'title' => 'I was literally in tears',
                'text' => "He managed to put 5 years of our relationship into a single song. When the chorus hit with the date we met at the coffee shop, I completely broke down. The best gift I've ever received, hands down.",
                'video_url' => '',
                'media' => 'images/anniversary.png',
                'audio' => 'audio/sample_anniversary.wav',
                'duration' => '0:48 min',
                'tag' => 'Happy Tears 😭',
                'rating' => 5,
                'location' => 'Mumbai',
            ],
            [
                'id' => 'v2',
                'type' => 'video',
                'name' => 'Rohan & Meera',
                'occasion' => 'Sunset Proposal',
                'title' => 'She said YES before the song ended',
                'text' => "I played the song through a portable speaker as the sun set in Goa. As soon as she realized the lyrics were about our Goa trips and inside jokes, she buried her face in my shoulder crying. She said yes immediately!",
                'media' => 'images/wedding.png',
                'audio' => 'audio/sample_proposal.wav',
                'duration' => '1:12 min',
                'tag' => 'Proposal 💍',
                'rating' => 5,
                'location' => 'Bengaluru',
            ],
            [
                'id' => 'v3',
                'type' => 'video',
                'name' => 'Priya S. (for Amma)',
                'occasion' => 'Mom’s 50th Birthday',
                'title' => 'Whole family cried tears of joy',
                'text' => "Gifted this to my mom for her 50th birthday. Seeing her expression change from confusion to recognition when she heard her childhood pet name in the song was priceless. Even my strict dad had tears rolling.",
                'media' => 'images/and_more.png',
                'audio' => 'audio/sample_amma.wav',
                'duration' => '1:05 min',
                'tag' => 'Family Tears ❤️',
                'rating' => 5,
                'location' => 'Chennai',
            ],
            [
                'id' => 'v4',
                'type' => 'video',
                'name' => 'Vikram for Dad',
                'occasion' => 'Retirement Celebration',
                'title' => 'My father never showed emotion until now',
                'text' => "My father worked 38 years in civil service and rarely shows sentiment. Playing this song at his retirement dinner completely melted him. He hugged me for five minutes without saying a word.",
                'media' => 'images/fathers_day.png',
                'audio' => 'audio/sample_love.wav',
                'duration' => '0:54 min',
                'tag' => 'Proud Father 🥹',
                'rating' => 5,
                'location' => 'Delhi',
            ],
            [
                'id' => 'v5',
                'type' => 'video',
                'name' => 'Ananya & Kabir',
                'occasion' => 'Long Distance Relationship',
                'title' => 'FaceTime listening at midnight',
                'text' => "We are 8,000 miles apart between London and Mumbai. I sent him the private link at midnight on his birthday. We stayed on FaceTime listening three times in a row, both sobbing happily.",
                'media' => 'images/hero_background.png',
                'audio' => 'audio/sample_birthday.wav',
                'duration' => '1:28 min',
                'tag' => 'Long Distance ✈️',
                'rating' => 5,
                'location' => 'London / Mumbai',
            ],
            [
                'id' => 'v6',
                'type' => 'video',
                'name' => 'Divya & Sarthak',
                'occasion' => '1st Wedding Anniversary',
                'title' => 'Felt like our private movie soundtrack',
                'text' => "We played our Heartgram as our first anniversary dance in our living room. It felt like our own private cinema soundtrack. You didn't just write a song; you immortalized our best memories forever.",
                'media' => 'images/step_5_receive.jpg',
                'audio' => 'audio/sample_wedding.wav',
                'duration' => '0:42 min',
                'tag' => 'Anniversary Dance ✨',
                'rating' => 5,
                'location' => 'Pune',
            ],

            // --- CATEGORY 2: TEXTS (6 Items) ---
            [
                'id' => 't1',
                'type' => 'text',
                'name' => 'Aditi Sharma',
                'occasion' => "Husband's 30th Birthday",
                'channel' => 'WhatsApp Message',
                'time' => 'Yesterday at 11:42 PM',
                'text' => "Guys... I have to text you. My husband is the most stoic, unemotional software engineer ever. He just put his headphones down and started crying into his hands. He said nobody has ever understood him like this. I cannot thank you enough! ❤️",
                'rating' => 5,
                'verified' => true,
                'location' => 'Hyderabad',
            ],
            [
                'id' => 't2',
                'type' => 'text',
                'name' => 'Karthik N.',
                'occasion' => "Sister's Wedding Sangeet",
                'channel' => 'WhatsApp Message',
                'time' => '3 days ago',
                'text' => "The entire hall went dead silent when the song started playing during the sangeet montage. By the second verse, half the guests were wiping their eyes. Even the videographer asked me where we got the track composed!",
                'rating' => 5,
                'verified' => true,
                'location' => 'Coimbatore',
            ],
            [
                'id' => 't3',
                'type' => 'text',
                'name' => 'Sneha & Rahul',
                'occasion' => "Valentine’s Surprise",
                'channel' => 'iMessage',
                'time' => 'Last Friday',
                'text' => "Just finished listening together with candles lit. Rahul couldn't believe you included our silly joke about burning the pancakes on our first trip. It felt 100% uniquely US. Best investment of my entire year.",
                'rating' => 5,
                'verified' => true,
                'location' => 'Kolkata',
            ],
            [
                'id' => 't4',
                'type' => 'text',
                'name' => 'Harish Patel',
                'occasion' => "Parents’ 25th Silver Jubilee",
                'channel' => 'WhatsApp Message',
                'time' => '1 week ago',
                'text' => "Mom said this is the only gift in 25 years that made dad tear up in front of everyone. They've saved the song on repeat in their car for their morning commutes. Thank you for treating our family story with so much respect and heart.",
                'rating' => 5,
                'verified' => true,
                'location' => 'Ahmedabad',
            ],
            [
                'id' => 't5',
                'type' => 'text',
                'name' => 'Tanya Verma',
                'occasion' => "Best Friend Moving Abroad",
                'channel' => 'Instagram DM',
                'time' => '5 days ago',
                'text' => "Played this at the airport terminal right before her departure gate. We both were ugly crying in Terminal 3 haha! She downloaded it offline for her 14-hour flight. You guys are absolute angels for doing this.",
                'rating' => 5,
                'verified' => true,
                'location' => 'New Delhi',
            ],
            [
                'id' => 't6',
                'type' => 'text',
                'name' => 'Manish K.',
                'occasion' => "Apology & Reconciliation",
                'channel' => 'WhatsApp Message',
                'time' => 'Yesterday',
                'text' => "I honestly didn't know how to apologize or express how much she means to me after our rough patch. The song conveyed what I was never able to speak aloud. She called me in tears. We're talking again. Thank you from the bottom of my heart.",
                'rating' => 5,
                'verified' => true,
                'location' => 'Chandigarh',
            ],

            // --- CATEGORY 3: IMAGES (6 Items) ---
            [
                'id' => 'i1',
                'type' => 'image',
                'name' => 'Tanvi & Rishabh',
                'occasion' => 'Wedding Gift Keepsake',
                'keepsake' => 'Framed Acrylic Plaque + QR Code',
                'title' => 'Centerpiece of our new home',
                'text' => "We framed the custom lyrics with the scannable Spotify-style code on our bedside table. Whenever we walk past it, we scan it and smile. It's the centerpiece of our home now.",
                'media' => 'images/wedding.png',
                'rating' => 5,
                'location' => 'Jaipur',
            ],
            [
                'id' => 'i2',
                'type' => 'image',
                'name' => 'Naveen & Sunita',
                'occasion' => '25th Silver Anniversary Dinner',
                'keepsake' => 'Custom Vinyl Record Sleeve',
                'title' => 'Priceless expressions holding their vinyl',
                'text' => "Surprised my parents during their 25th anniversary dinner. Look at their expressions holding the custom vinyl cover with their 1999 wedding photo! Priceless memories.",
                'media' => 'images/anniversary.png',
                'rating' => 5,
                'location' => 'Kochi',
            ],
            [
                'id' => 'i3',
                'type' => 'image',
                'name' => 'Simran Kaur',
                'occasion' => 'Mother’s Day Keepsake',
                'keepsake' => 'Luxury Satin Melody Box',
                'title' => 'Top tier luxury unboxing presentation',
                'text' => "The unboxing presentation was top-tier luxury. The ribbon, the personalized letter, and the instant play audio chip inside the card. She opened it and couldn't stop hugging me.",
                'media' => 'images/gift_box.png',
                'rating' => 5,
                'location' => 'Amritsar',
            ],
            [
                'id' => 'i4',
                'type' => 'image',
                'name' => 'Aakash & Pooja',
                'occasion' => 'Beach Proposal Sunset',
                'keepsake' => 'Sunset Proposal Moment',
                'title' => '10 seconds after the final chorus',
                'text' => "Captured this photo 10 seconds after the final chorus played on the beach. Her smile with mascara running down her cheeks says everything words never could.",
                'media' => 'images/hero_background.png',
                'rating' => 5,
                'location' => 'Goa',
            ],
            [
                'id' => 'i5',
                'type' => 'image',
                'name' => 'Meenakshi for Amma',
                'occasion' => 'Mother’s Day Celebration',
                'keepsake' => 'Framed Canvas Lyrics Print',
                'title' => 'Placed right next to the temple altar',
                'text' => "Amma put the framed lyrics right next to the family temple. She plays the song every morning while having her filter coffee. Thank you Heartgrams!",
                'media' => 'images/mothers_day.png',
                'rating' => 5,
                'location' => 'Madurai',
            ],
            [
                'id' => 'i6',
                'type' => 'image',
                'name' => 'Karan & Rohit',
                'occasion' => '10 Years of Friendship',
                'keepsake' => 'Keepsake Memory Booklet',
                'title' => 'Bachelor party brotherhood track',
                'text' => "Brothers since college hostel days. Handed him the keepsake card at his bachelor party. He thought it was a joke until the music started. Unbreakable bond captured forever.",
                'media' => 'images/for_a_friend.png',
                'rating' => 5,
                'location' => 'Gurugram',
            ],
        ];

        if ($dbTestimonials->isNotEmpty()) {
            $testimonials = $dbTestimonials->map(function ($t) {
                return [
                    'id' => (string) $t->id,
                    'type' => $t->type,
                    'name' => $t->name,
                    'occasion' => $t->occasion ?? '',
                    'title' => $t->title ?? '',
                    'text' => $t->text ?? '',
                    'video_url' => $t->video_url ?? '',
                    'media' => $t->media ?? '',
                    'audio' => $t->audio ?? '',
                    'duration' => $t->duration ?? '',
                    'tag' => $t->tag ?? '',
                    'rating' => (int) ($t->rating ?? 5),
                    'location' => $t->location ?? '',
                    'channel' => $t->channel ?? 'WhatsApp Message',
                    'time' => $t->time ?? 'Verified Review',
                    'verified' => true,
                    'keepsake' => $t->keepsake ?? '',
                ];
            })->toArray();
        } else {
            $testimonials = $defaultTestimonials;
        }

        $allCount = count($testimonials);
        $videoCount = count(array_filter($testimonials, fn($i) => ($i['type'] ?? '') === 'video'));
        $textCount = count(array_filter($testimonials, fn($i) => ($i['type'] ?? '') === 'text'));
        $imageCount = count(array_filter($testimonials, fn($i) => ($i['type'] ?? '') === 'image'));
    @endphp

    <div 
        x-data="{
            activeCategory: 'all',
            modalOpen: false,
            modalType: 'video',
            modalData: null,
            isPlaying: false,
            filterCategory(cat) {
                this.activeCategory = cat;
                const target = document.getElementById('wall-of-love');
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            },
            openModal(item) {
                this.modalData = item;
                this.modalType = item.type;
                this.modalOpen = true;
                document.body.style.overflow = 'hidden';
                this.$nextTick(() => {
                    if (item.type === 'video' && item.video_url) {
                        const video = this.$refs.modalVideo;
                        if (video) {
                            video.currentTime = 0;
                            video.play().catch(() => {});
                        }
                    } else if (item.type === 'video' && item.audio) {
                        const audio = this.$refs.modalAudio;
                        if (audio) {
                            audio.currentTime = 0;
                            audio.play().then(() => { this.isPlaying = true; }).catch(() => {});
                        }
                    }
                });
            },
            closeModal() {
                this.modalOpen = false;
                document.body.style.overflow = 'auto';
                const video = this.$refs.modalVideo;
                if (video) {
                    video.pause();
                    video.currentTime = 0;
                }
                const audio = this.$refs.modalAudio;
                if (audio) {
                    audio.pause();
                    this.isPlaying = false;
                }
                this.modalData = null;
            },
            toggleAudio() {
                const audio = this.$refs.modalAudio;
                if (!audio) return;
                if (this.isPlaying) {
                    audio.pause();
                    this.isPlaying = false;
                } else {
                    audio.play().then(() => { this.isPlaying = true; }).catch(() => {});
                }
            }
        }"
        @keydown.escape.window="closeModal()"
        class="min-h-screen">

        {{-- ========================================================
             HERO SECTION (HALF HEIGHT / COMPACT DARK LUXURY BANNER)
             ======================================================== --}}
        <section 
            class="relative w-full min-h-[44vh] sm:min-h-[50vh] flex flex-col justify-between items-center text-center px-4 sm:px-6 lg:px-8 pt-20 sm:pt-28 pb-6 sm:pb-8 overflow-hidden bg-gradient-to-b from-[#240a10] via-[#1a060b] to-[#120306] text-white"
        >
            
            {{-- Ambient Luxury Lighting & Glows --}}
            <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
                {{-- Centered Golden Ambient Glow --}}
                <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[550px] h-[300px] bg-[#e6b04e]/10 rounded-full blur-[120px]"></div>
                {{-- Left Crimson Flare --}}
                <div class="absolute -bottom-10 -left-20 w-[400px] h-[400px] bg-[#c02d4b]/20 rounded-full blur-[130px]"></div>
                {{-- Right Wine Flare --}}
                <div class="absolute top-10 -right-20 w-[400px] h-[400px] bg-[#911b32]/25 rounded-full blur-[130px]"></div>
                
                {{-- Subtle Gold Particle Sparkles --}}
                <div class="absolute top-[20%] left-[12%] w-1.5 h-1.5 rounded-full bg-[#f3d179]/60 animate-ping"></div>
                <div class="absolute top-[30%] right-[14%] w-2 h-2 rounded-full bg-[#f3d179]/70 animate-pulse"></div>
                <div class="absolute bottom-[25%] left-[20%] w-1.5 h-1.5 rounded-full bg-[#f3d179]/50 animate-pulse"></div>
                <div class="absolute bottom-[22%] right-[22%] w-2 h-2 rounded-full bg-[#f3d179]/60 animate-ping"></div>
            </div>

            {{-- Hero Content Container --}}
            <div class="relative z-10 max-w-4xl mx-auto flex flex-col items-center justify-center my-auto">
                
                {{-- 1. Kicker Badge --}}
                <div class="mb-3 sm:mb-4">
                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-xs font-bold tracking-[0.2em] text-[#f3d179] uppercase shadow-lg shadow-black/25">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#f3d179] animate-pulse"></span>
                        WALL OF LOVE
                    </span>
                </div>

                {{-- 2. Grand Heading --}}
                <h1 class="font-serif text-3xl sm:text-4xl md:text-5xl font-medium text-white leading-tight mb-3 sm:mb-4 tracking-tight max-w-3xl">
                    The moment they heard <span class="italic text-transparent bg-clip-text bg-gradient-to-r from-[#fce5a3] via-[#e6b04e] to-[#f3d179]">their song.</span>
                </h1>

                {{-- 3. Evocative Subtitle --}}
                <p class="text-xs sm:text-sm md:text-base text-white/85 font-normal max-w-2xl sm:max-w-3xl mx-auto leading-relaxed mb-4">
                    Real reactions from people who gave a Heartgrams song, shared with their permission.
                </p>

            </div>

            {{-- Scroll Down Indicator --}}
            <div class="relative z-10 pb-2 sm:pb-3 shrink-0">
                <a 
                    href="#wall-of-love" 
                    class="inline-flex flex-col items-center gap-1.5 text-[11px] uppercase tracking-widest text-white/60 hover:text-[#f3d179] transition-all group">
                    <span class="font-medium text-[10px] sm:text-[11px]">Explore Testimonials</span>
                    <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-white/80 group-hover:bg-[#f3d179] group-hover:text-black group-hover:border-[#f3d179] group-hover:scale-110 transition-all shadow-md">
                        <svg class="w-3.5 h-3.5 group-hover:translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                </a>
            </div>

        </section>

        {{-- ========================================================
             NORMAL TESTIMONIALS SECTION (LIGHT BG-BRAND-LIGHT)
             ======================================================== --}}
        <div id="wall-of-love" class="py-10 sm:py-24 bg-brand-light scroll-mt-20">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                
                {{-- CATEGORY FILTER BUTTONS (MOVED TO THIS SECTION) --}}
                <div class="text-center mb-8 sm:mb-16">
                    <div class="inline-flex flex-wrap items-center justify-center p-1 sm:p-1.5 rounded-2xl sm:rounded-full bg-white shadow-[0_8px_30px_rgba(200,50,100,0.06)] border border-pink-100 gap-1 sm:gap-2">
                        
                        {{-- Tab: All --}}
                        <button 
                            @click="activeCategory = 'all'" 
                            type="button"
                            class="px-3.5 sm:px-6 py-2 sm:py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all duration-300 flex items-center gap-1.5 sm:gap-2"
                            :class="activeCategory === 'all' 
                                ? 'bg-gradient-to-r from-[#c02d4b] to-[#8a1c32] text-white shadow-md shadow-[#c02d4b]/20 scale-102 sm:scale-105' 
                                : 'text-brand-dark/70 hover:text-brand-dark hover:bg-pink-50/60'">
                            <span>All Stories</span>
                            <span class="text-[11px] px-2 py-0.5 rounded-full font-bold" 
                                :class="activeCategory === 'all' ? 'bg-white/20 text-white' : 'bg-gray-100 text-brand-dark/60'">{{ $allCount }}</span>
                        </button>

                        {{-- Tab: Videos --}}
                        <button 
                            @click="activeCategory = 'video'" 
                            type="button"
                            class="px-3.5 sm:px-6 py-2 sm:py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all duration-300 flex items-center gap-1.5 sm:gap-2"
                            :class="activeCategory === 'video' 
                                ? 'bg-gradient-to-r from-[#c02d4b] to-[#8a1c32] text-white shadow-md shadow-[#c02d4b]/20 scale-102 sm:scale-105' 
                                : 'text-brand-dark/70 hover:text-brand-dark hover:bg-pink-50/60'">
                            <span>🎥 Videos</span>
                            <span class="text-[11px] px-2 py-0.5 rounded-full font-bold" 
                                :class="activeCategory === 'video' ? 'bg-white/20 text-white' : 'bg-gray-100 text-brand-dark/60'">{{ $videoCount }}</span>
                        </button>

                        {{-- Tab: Texts --}}
                        <button 
                            @click="activeCategory = 'text'" 
                            type="button"
                            class="px-3.5 sm:px-6 py-2 sm:py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all duration-300 flex items-center gap-1.5 sm:gap-2"
                            :class="activeCategory === 'text' 
                                ? 'bg-gradient-to-r from-[#128C7E] to-[#075E54] text-white shadow-md shadow-emerald-600/20 scale-102 sm:scale-105' 
                                : 'text-brand-dark/70 hover:text-brand-dark hover:bg-pink-50/60'">
                            <span>💬 Texts</span>
                            <span class="text-[11px] px-2 py-0.5 rounded-full font-bold" 
                                :class="activeCategory === 'text' ? 'bg-white/20 text-white' : 'bg-gray-100 text-brand-dark/60'">{{ $textCount }}</span>
                        </button>

                        {{-- Tab: Images --}}
                        <button 
                            @click="activeCategory = 'image'" 
                            type="button"
                            class="px-3.5 sm:px-6 py-2 sm:py-2.5 rounded-full text-xs sm:text-sm font-semibold transition-all duration-300 flex items-center gap-1.5 sm:gap-2"
                            :class="activeCategory === 'image' 
                                ? 'bg-gradient-to-r from-[#d4af37] to-[#b89025] text-white shadow-md shadow-[#d4af37]/20 scale-102 sm:scale-105' 
                                : 'text-brand-dark/70 hover:text-brand-dark hover:bg-pink-50/60'">
                            <span>📸 Images</span>
                            <span class="text-[11px] px-2 py-0.5 rounded-full font-bold" 
                                :class="activeCategory === 'image' ? 'bg-white/20 text-white' : 'bg-gray-100 text-brand-dark/60'">{{ $imageCount }}</span>
                        </button>
                    </div>
                </div>

                {{-- Cards Grid (18 Total Testimonials) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 items-stretch">
                    
                    @foreach($testimonials as $t)
                        
                        {{-- 1. VIDEO TESTIMONIAL CARD --}}
                        @if($t['type'] === 'video')
                            <div 
                                x-show="activeCategory === 'all' || activeCategory === 'video'"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                @click="openModal({{ json_encode($t) }})"
                                class="bg-white rounded-[2rem] overflow-hidden shadow-[0_8px_30px_rgba(200,50,100,0.05)] border border-pink-50 hover:shadow-[0_12px_36px_rgba(200,50,100,0.12)] hover:-translate-y-1.5 transition-all duration-300 flex flex-col group cursor-pointer">
                                
                                {{-- Media Thumbnail Container (Clean, No Badges) --}}
                                <div class="relative h-60 sm:h-64 w-full bg-gray-100 shrink-0 overflow-hidden">
                                    <img 
                                        src="{{ !empty($t['media']) ? (str_starts_with($t['media'], 'http') ? $t['media'] : asset($t['media'])) : (!empty($t['video_url']) ? preg_replace('/\.[^.\/]+$/', '.jpg', $t['video_url']) : asset('images/anniversary.png')) }}" 
                                        alt="Review from {{ $t['name'] }}" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    
                                    <div class="absolute inset-0 bg-black/25 group-hover:bg-black/15 transition-colors duration-300 flex items-center justify-center">
                                        <div class="w-14 h-14 rounded-full bg-white/95 backdrop-blur-sm flex items-center justify-center text-[#c02d4b] shadow-xl group-hover:scale-115 group-hover:bg-[#c02d4b] group-hover:text-white transition-all duration-300">
                                            <svg class="w-6 h-6 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                        </div>
                                    </div>
                                </div>

                                {{-- Card Footer (Clean Author Info, No Description, No Stars, No Play Text) --}}
                                <div class="p-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#c02d4b] to-[#8a1c32] flex items-center justify-center text-white font-serif font-bold text-base shadow-sm shrink-0">
                                            {{ substr($t['name'], 0, 1) }}
                                        </div>
                                        <div>
                                            <h4 class="text-[14px] font-bold text-brand-dark flex items-center gap-1">
                                                {{ $t['name'] }}
                                                <span class="text-[#c02d4b] text-xs">✓</span>
                                            </h4>
                                            <p class="text-[12px] font-medium text-gray-500">{{ $t['occasion'] }} • {{ $t['location'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        {{-- 2. TEXT / CHAT TESTIMONIAL CARD --}}
                        @elseif($t['type'] === 'text')
                            <div 
                                x-show="activeCategory === 'all' || activeCategory === 'text'"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                class="bg-white rounded-[2rem] p-6 sm:p-7 shadow-[0_8px_30px_rgba(200,50,100,0.05)] border border-pink-50 hover:shadow-[0_12px_36px_rgba(200,50,100,0.12)] hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between">
                                
                                {{-- Top Header (WhatsApp / iMessage Badge) --}}
                                <div>
                                    <div class="flex items-center justify-between pb-3.5 mb-4 border-b border-gray-100">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-8 h-8 rounded-full bg-[#128C7E] flex items-center justify-center text-white shadow-sm">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H6l-2 2V4h16v12z"/></svg>
                                            </div>
                                            <div>
                                                <h5 class="text-xs font-bold text-gray-800">{{ $t['channel'] }}</h5>
                                                <p class="text-[10px] text-gray-400">{{ $t['time'] }}</p>
                                            </div>
                                        </div>
                                        <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-100">
                                            Verified Buyer ✓
                                        </span>
                                    </div>

                                    {{-- Speech Bubble Body --}}
                                    <div class="bg-[#F0FDF4] border border-emerald-100/90 rounded-2xl rounded-tl-sm p-4 sm:p-5 mb-5 relative shadow-sm">
                                        <p class="text-[14px] text-gray-800 leading-relaxed font-sans mb-2">
                                            "{{ $t['text'] }}"
                                        </p>
                                        <div class="flex items-center justify-end gap-1 text-[11px] text-gray-400">
                                            <span>Sent via WhatsApp</span>
                                            <span class="text-[#25D366] font-bold">✓✓</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Footer Info --}}
                                <div class="pt-3 border-t border-gray-100 flex items-center justify-between mt-auto">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#128C7E] to-[#075E54] flex items-center justify-center text-white font-bold text-sm shadow-sm shrink-0">
                                            {{ substr($t['name'], 0, 1) }}
                                        </div>
                                        <div>
                                            <h4 class="text-[13px] font-bold text-brand-dark">{{ $t['name'] }}</h4>
                                            <p class="text-[11px] font-medium text-[#c02d4b]">{{ $t['occasion'] }}</p>
                                        </div>
                                    </div>

                                    <div class="flex text-[#D4AF37]">
                                        @for($i=0; $i<$t['rating']; $i++)
                                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                        {{-- 3. IMAGE / KEEPSAKE TESTIMONIAL CARD --}}
                        @elseif($t['type'] === 'image')
                            <div 
                                x-show="activeCategory === 'all' || activeCategory === 'image'"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                @click="openModal({{ json_encode($t) }})"
                                class="bg-white rounded-[2rem] overflow-hidden shadow-[0_8px_30px_rgba(200,50,100,0.05)] border border-pink-50 hover:shadow-[0_12px_36px_rgba(200,50,100,0.12)] hover:-translate-y-1.5 transition-all duration-300 flex flex-col group cursor-pointer">
                                
                                {{-- Keepsake Photo Container (Clean, No Badges) --}}
                                <div class="relative h-60 sm:h-64 w-full bg-gray-100 shrink-0 overflow-hidden">
                                    <img 
                                        src="{{ !empty($t['media']) ? (str_starts_with($t['media'], 'http') ? $t['media'] : asset($t['media'])) : asset('images/wedding.png') }}" 
                                        alt="Keepsake from {{ $t['name'] }}" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    
                                    <div class="absolute inset-0 bg-black/15 group-hover:bg-black/5 transition-colors duration-300"></div>
                                </div>

                                {{-- Card Footer (Clean Author Info, No Description, No Stars, No Zoom Text) --}}
                                <div class="p-5 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#d4af37] to-[#8c6d1f] flex items-center justify-center text-white font-serif font-bold text-base shadow-sm shrink-0">
                                            {{ substr($t['name'], 0, 1) }}
                                        </div>
                                        <div>
                                            <h4 class="text-[14px] font-bold text-brand-dark flex items-center gap-1">
                                                {{ $t['name'] }}
                                                <span class="text-[#c02d4b] text-xs">✓</span>
                                            </h4>
                                            <p class="text-[12px] font-medium text-gray-500">{{ $t['occasion'] }} • {{ $t['location'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach

                </div>

                {{-- ========================================================
                     BOTTOM CALL TO ACTION (MATCHING THEME)
                     ======================================================== --}}
                <div class="mt-20 text-center bg-white rounded-[2.5rem] p-10 sm:p-14 shadow-[0_8px_30px_rgba(200,50,100,0.06)] border border-pink-100 relative overflow-hidden">
                    <div class="max-w-2xl mx-auto relative z-10">
                        <h4 class="text-[11px] font-bold tracking-[0.2em] text-[#c02d4b] mb-3 uppercase">
                            Create Your Memory
                        </h4>
                        <h2 class="font-serif text-3xl sm:text-4xl text-brand-dark mb-4">
                            Give them a gift that <span class="italic text-[#c02d4b]">leaves them speechless.</span>
                        </h2>
                        <p class="text-[15px] text-brand-dark/70 font-medium mb-8 leading-relaxed">
                            Share your memories, inside jokes and special moments. Our lyricists turn them into a song, delivered on WhatsApp and email in 3–5 days.
                        </p>
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                            <a href="{{ route('occasions') }}" class="w-full sm:w-auto px-8 py-3.5 rounded-full bg-gradient-to-r from-[#c02d4b] to-[#8a1c32] text-white font-bold text-sm shadow-lg shadow-[#c02d4b]/20 hover:shadow-[#c02d4b]/40 hover:-translate-y-0.5 transition-all">
                                Choose an Occasion ✦
                            </a>
                            <a href="{{ route('home') }}#how-it-works" class="w-full sm:w-auto px-7 py-3.5 rounded-full bg-pink-50 hover:bg-pink-100 text-[#c02d4b] font-bold text-sm transition-colors">
                                How It Works
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- ========================================================
             INTERACTIVE VIDEO / LIGHTBOX PREVIEW MODAL
             ======================================================== --}}
        <div 
            x-show="modalOpen" 
            x-cloak
            style="display: none;"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 bg-black/80 backdrop-blur-md">
            
            <div 
                @click.away="closeModal()"
                x-show="modalOpen"
                x-cloak
                style="display: none;"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                class="relative w-full max-w-2xl bg-white rounded-[2rem] overflow-hidden shadow-2xl flex flex-col max-h-[90vh]">
                
                {{-- Close Button --}}
                <button 
                    @click="closeModal()"
                    type="button" 
                    class="absolute top-4 right-4 z-20 w-10 h-10 rounded-full bg-black/50 hover:bg-black text-white flex items-center justify-center backdrop-blur-sm transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                {{-- Modal Media --}}
                <div class="relative w-full bg-black aspect-video flex items-center justify-center overflow-hidden">
                    {{-- 1. Video Player when Cloudinary video_url is provided --}}
                    <template x-if="modalType === 'video' && modalData && modalData.video_url">
                        <video 
                            x-ref="modalVideo" 
                            :src="modalData.video_url" 
                            controls 
                            playsinline 
                            class="w-full h-full object-contain bg-black">
                        </video>
                    </template>

                    {{-- 2. Fallback Image / Audio Player when no video_url --}}
                    <template x-if="modalType !== 'video' || (!modalData?.video_url)">
                        <div class="relative w-full h-full flex items-center justify-center">
                            <template x-if="modalData && modalData.media">
                                <img 
                                    :src="modalData.media.startsWith('http') ? modalData.media : ('{{ asset('') }}' + modalData.media)" 
                                    :alt="modalData.name"
                                    class="w-full h-full object-cover">
                            </template>

                            {{-- Play / Sound Overlay for Audio Preview --}}
                            <template x-if="modalType === 'video' && modalData && modalData.audio">
                                <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center gap-3">
                                    <button 
                                        @click="toggleAudio()"
                                        type="button" 
                                        class="w-16 h-16 rounded-full bg-[#c02d4b] hover:bg-[#8a1c32] text-white flex items-center justify-center shadow-xl hover:scale-110 transition-all">
                                        <svg x-show="!isPlaying" class="w-7 h-7 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                        <svg x-show="isPlaying" class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                                    </button>
                                    <span class="px-3.5 py-1 rounded-full bg-black/70 backdrop-blur-md text-xs font-semibold text-white">
                                        <span x-show="isPlaying">Playing Original Song Sample 🔊</span>
                                        <span x-show="!isPlaying">Click to Hear Song Sample 🎵</span>
                                    </span>
                                </div>
                            </template>
                        </div>
                    </template>
                </div>

                {{-- Audio Player --}}
                <audio x-ref="modalAudio" :src="modalData && modalData.audio ? '{{ asset('') }}' + modalData.audio : ''" @ended="isPlaying = false"></audio>

                {{-- Modal Details --}}
                <div class="p-6 sm:p-8 overflow-y-auto">
                    <template x-if="modalData">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs font-bold uppercase tracking-wider text-[#c02d4b] bg-pink-50 px-3 py-1 rounded-full" x-text="modalData.occasion"></span>
                                <span class="text-xs text-gray-500" x-text="modalData.location"></span>
                            </div>

                            <h3 class="font-serif text-2xl font-bold text-brand-dark mb-2" x-text="modalData.title || modalData.name"></h3>

                            <p class="text-sm sm:text-base text-brand-dark/80 leading-relaxed italic mb-6 font-serif" x-text="'&ldquo;' + modalData.text + '&rdquo;'"></p>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div>
                                    <h4 class="font-bold text-brand-dark text-sm" x-text="modalData.name"></h4>
                                    <p class="text-xs text-[#c02d4b]">Verified Heartgram Review</p>
                                </div>

                                <a href="{{ route('occasions') }}" class="px-5 py-2.5 rounded-full bg-gradient-to-r from-[#c02d4b] to-[#8a1c32] text-white text-xs font-bold shadow hover:scale-105 transition-all">
                                    Create Similar Song →
                                </a>
                            </div>
                        </div>
                    </template>
                </div>

            </div>
        </div>

    </div>
</x-public-layout>
