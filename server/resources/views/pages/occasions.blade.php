<x-public-layout>
    @push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800;900&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,500;1,600;1,700&display=swap" rel="stylesheet">
    @endpush

    <style>
        .font-flowers-title {
            font-family: 'Cinzel', 'Noto Serif', serif !important;
        }
        .font-flowers-script {
            font-family: 'Noto Sans', sans-serif !important;
            font-style: normal !important;
        }
        .font-flowers-note {
            font-family: 'Noto Sans', sans-serif !important;
            font-style: normal !important;
        }

        /* Scoped Occasion Component Styles */
        .flowers-bg {
            background-color: #FAF5EE !important;
            background-image: radial-gradient(circle at 50% 40%, #FFF2EC 0%, #FAF5EE 75%) !important;
        }

        .occ-card {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
            cursor: pointer;
            user-select: none;
            transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1), margin 0.25s ease;
        }
        .occ-card:hover {
            transform: translateY(-2px);
        }
        .occ-card-left {
            transform-origin: left center;
        }
        .occ-card-right {
            transform-origin: right center;
        }

        /* Box Thumbnail Styling */
        .occ-thumb-wrapper {
            position: relative;
            width: 58px !important;
            height: 58px !important;
            min-width: 58px !important;
            min-height: 58px !important;
            max-width: 58px !important;
            max-height: 58px !important;
            border-radius: 14px !important;
            padding: 2.5px !important;
            background: linear-gradient(135deg, #FF2A6D, #FF758C) !important;
            box-shadow: 0 4px 14px rgba(255, 42, 109, 0.28) !important;
            z-index: 25;
            flex-shrink: 0;
            overflow: hidden;
            display: block;
        }
        .occ-thumb-img {
            width: 100% !important;
            height: 100% !important;
            max-width: 100% !important;
            max-height: 100% !important;
            border-radius: 12px !important;
            object-fit: cover !important;
            display: block !important;
        }

        /* Play Button (Squircle / Rounded Box badge) */
        .occ-play-btn {
            position: absolute;
            width: 28px !important;
            height: 28px !important;
            min-width: 28px !important;
            min-height: 28px !important;
            border-radius: 9px !important;
            background: linear-gradient(135deg, #FF206E, #E11D48) !important;
            color: #ffffff !important;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 35;
            box-shadow: 0 4px 14px rgba(225, 29, 72, 0.45) !important;
            border: none;
            cursor: pointer;
            transition: transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
            padding: 0;
        }
        .occ-play-btn:hover {
            transform: scale(1.15);
        }
        .occ-play-btn:active {
            transform: scale(0.95);
        }

        /* Left box layout */
        .occ-card-left .occ-play-btn {
            left: 44px;
        }
        .occ-card-left .occ-box {
            margin-left: -20px;
            padding-left: 44px;
            padding-right: 18px;
        }

        /* Right box layout */
        .occ-card-right .occ-play-btn {
            right: 44px;
        }
        .occ-card-right .occ-box {
            margin-right: -20px;
            padding-right: 44px;
            padding-left: 18px;
        }

        /* Card Box Body (Rounded rectangle box, not pill) */
        .occ-box {
            flex: 1;
            min-height: 54px;
            background: #FFFFFF !important;
            border: 1.5px solid #FFD1DC !important;
            border-radius: 16px !important;
            box-shadow: 0 4px 18px rgba(255, 77, 125, 0.08) !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.25s ease;
            z-index: 15;
            padding-top: 8px;
            padding-bottom: 8px;
        }
        .occ-card:hover .occ-box {
            border-color: #FF8EAA !important;
            box-shadow: 0 6px 22px rgba(255, 77, 125, 0.18) !important;
        }

        /* Card Pop-Up States & Animation (Optimized to never clip or hide neighboring cards) */
        @keyframes occ-card-initial-pop {
            0% { transform: scale(1); }
            45% { transform: scale(1.28); }
            75% { transform: scale(1.19); }
            100% { transform: scale(1.22); }
        }
        @keyframes occ-card-playing-float {
            0%, 100% {
                transform: scale(1.22);
            }
            50% {
                transform: scale(1.25);
            }
        }
        @keyframes occ-box-playing-glow {
            0%, 100% {
                box-shadow: 0 14px 34px rgba(255, 32, 110, 0.40), 0 0 0 3.5px #FF206E;
                border-color: #FF206E;
            }
            50% {
                box-shadow: 0 18px 44px rgba(255, 32, 110, 0.60), 0 0 0 4.5px #FF4D7D;
                border-color: #FF4D7D;
            }
        }
        @keyframes occ-thumb-playing-pulse {
            0%, 100% {
                transform: scale(1.05);
                box-shadow: 0 6px 20px rgba(255, 32, 110, 0.5);
            }
            50% {
                transform: scale(1.10);
                box-shadow: 0 10px 28px rgba(255, 32, 110, 0.75);
            }
        }
        .animate-occ-pop {
            animation: occ-card-initial-pop 0.2s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }

        .occ-card.is-active {
            z-index: 40 !important;
            transform: scale(1.22) !important;
            margin-top: 10px !important;
            margin-bottom: 10px !important;
        }
        .occ-card.is-active.is-playing {
            animation: occ-card-playing-float 1.0s ease-in-out infinite;
        }
        .occ-card.is-active .occ-box {
            border-color: #FF206E !important;
            background: #FFFFFF !important;
            box-shadow: 0 14px 34px rgba(255, 32, 110, 0.40), 0 0 0 3.5px #FF206E !important;
        }
        .occ-card.is-active.is-playing .occ-box {
            animation: occ-box-playing-glow 1.0s ease-in-out infinite;
        }
        .occ-card.is-active .occ-thumb-wrapper {
            box-shadow: 0 8px 24px rgba(255, 32, 110, 0.55) !important;
            border-color: #FF206E !important;
            transform: scale(1.06);
            transition: transform 0.2s ease;
        }
        .occ-card.is-active.is-playing .occ-thumb-wrapper {
            animation: occ-thumb-playing-pulse 1.0s ease-in-out infinite;
        }
        .occ-card.is-active .occ-label-upper {
            color: #E11D48 !important;
            font-weight: 800 !important;
            letter-spacing: 0.18em !important;
        }
        .occ-card.is-active .occ-label-script {
            color: #881337 !important;
            font-weight: 600 !important;
        }

        @media (max-width: 640px) {
            .occ-card-left, .occ-card-right {
                transform-origin: center center;
            }
            .occ-card.is-active {
                transform: scale(1.12) !important;
                margin-top: 6px !important;
                margin-bottom: 6px !important;
            }
            @keyframes occ-card-playing-float {
                0%, 100% { transform: scale(1.12); }
                50% { transform: scale(1.15); }
            }
            @keyframes occ-card-initial-pop {
                0% { transform: scale(1); }
                45% { transform: scale(1.18); }
                75% { transform: scale(1.10); }
                100% { transform: scale(1.12); }
            }
        }

        /* Typography inside Boxes */
        .occ-label-upper {
            font-family: 'Cinzel', 'Noto Serif', serif !important;
            font-size: 10px !important;
            font-weight: 700 !important;
            letter-spacing: 0.16em !important;
            color: #8F183E !important;
            text-transform: uppercase !important;
            line-height: 1 !important;
            margin-bottom: 3px !important;
        }
        .occ-label-script {
            font-family: 'Noto Sans', sans-serif !important;
            font-style: normal !important;
            font-size: 12.5px !important;
            font-weight: 500 !important;
            color: #9C1844 !important;
            line-height: 1.25 !important;
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            letter-spacing: 0.01em !important;
        }

        /* Heart Toggle Icon */
        .occ-heart-btn {
            background: none !important;
            border: none !important;
            cursor: pointer;
            padding: 4px;
            color: #C2185B !important;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s ease, color 0.2s ease;
        }
        .occ-heart-btn:hover {
            transform: scale(1.25);
            color: #E11D48 !important;
        }

        @keyframes pulse-slow {
            0%, 100% { transform: scale(1); opacity: 0.9; }
            50% { transform: scale(1.08); opacity: 1; }
        }
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .animate-spin-slow {
            animation: spin-slow 12s linear infinite;
        }
        .animate-pulse-slow {
            animation: pulse-slow 3s ease-in-out infinite;
        }

        /* Mobile Responsive Adjustments for Occasion Cards */
        @media (max-width: 639px) {
            .occ-thumb-wrapper {
                width: 52px !important;
                height: 52px !important;
                min-width: 52px !important;
                min-height: 52px !important;
                border-radius: 13px !important;
            }
            .occ-play-btn {
                width: 26px !important;
                height: 26px !important;
                min-width: 26px !important;
                min-height: 26px !important;
                border-radius: 8px !important;
            }
            .occ-card-left .occ-play-btn {
                left: 40px !important;
            }
            .occ-card-left .occ-box {
                margin-left: -18px !important;
                padding-left: 36px !important;
                padding-right: 12px !important;
            }
            .occ-card-right .occ-play-btn {
                right: 40px !important;
            }
            .occ-card-right .occ-box {
                margin-right: -18px !important;
                padding-right: 36px !important;
                padding-left: 12px !important;
            }
            .occ-box {
                min-height: 50px !important;
                padding-top: 6px !important;
                padding-bottom: 6px !important;
                border-radius: 14px !important;
            }
            .occ-label-upper {
                font-size: 9px !important;
                letter-spacing: 0.12em !important;
            }
            .occ-label-script {
                font-size: 12px !important;
            }
        }

        /* Create Song Button Popup & Pulse Animation */
        @keyframes ctaPop {
            0% {
                transform: scale(0.9);
            }
            30% {
                transform: scale(1.18) translateY(-2px);
                box-shadow: 0 12px 35px rgba(255, 32, 110, 0.55), 0 0 0 10px rgba(255, 32, 110, 0.18);
            }
            60% {
                transform: scale(0.96) translateY(0);
            }
            85% {
                transform: scale(1.04);
            }
            100% {
                transform: scale(1);
            }
        }

        .animate-cta-pop {
            animation: ctaPop 0.65s cubic-bezier(0.34, 1.56, 0.64, 1) both !important;
        }

        @keyframes ctaPulseGlow {
            0%, 100% {
                box-shadow: 0 8px 25px rgba(255, 32, 110, 0.35);
            }
            50% {
                box-shadow: 0 12px 32px rgba(255, 32, 110, 0.6), 0 0 0 6px rgba(255, 32, 110, 0.15);
            }
        }

        .cta-pulse-playing {
            animation: ctaPulseGlow 2s ease-in-out infinite;
        }
    </style>

    @php
        $leftOccasions = [
            [
                'id' => 'birthday',
                'title' => 'Birthday',
                'uppercase' => 'BIRTHDAY',
                'subtitle' => 'Make their day truly unforgettable',
                'category' => 'milestones',
                'language' => 'English',
                'image' => 'https://images.unsplash.com/photo-1558636508-e0db3814bd1d?q=80&w=400&auto=format&fit=crop',
                'audio' => asset('audio/sample_birthday.wav'),
            ],
            [
                'id' => 'proposal',
                'title' => 'Proposal',
                'uppercase' => 'PROPOSAL',
                'subtitle' => 'The question of forever and always',
                'category' => 'love',
                'language' => 'Tamil',
                'image' => 'https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?q=80&w=400&auto=format&fit=crop',
                'audio' => asset('audio/sample_proposal.wav'),
            ],
            [
                'id' => 'valentines-day',
                'title' => 'Valentine’s Day',
                'uppercase' => 'VALENTINE’S DAY',
                'subtitle' => 'Whispered straight from the heart',
                'category' => 'love',
                'language' => 'Hindi',
                'image' => 'https://images.unsplash.com/photo-1518199266791-5375a83190b7?q=80&w=400&auto=format&fit=crop',
                'audio' => asset('audio/sample_love.wav'),
            ],
            [
                'id' => 'wedding',
                'title' => 'Wedding',
                'uppercase' => 'WEDDING',
                'subtitle' => 'The soundtrack to your sacred vows',
                'category' => 'love',
                'language' => 'Telugu',
                'image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=400&auto=format&fit=crop',
                'audio' => asset('audio/sample_wedding.wav'),
            ],
            [
                'id' => 'love-and-romance',
                'title' => 'Love & Romance',
                'uppercase' => 'LOVE & ROMANCE',
                'subtitle' => 'Every beat written just for you',
                'category' => 'love',
                'language' => 'English',
                'image' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?q=80&w=400&auto=format&fit=crop',
                'audio' => asset('audio/sample_love.wav'),
            ],
            [
                'id' => 'friends',
                'title' => 'Friends',
                'uppercase' => 'FRIENDS',
                'subtitle' => 'Laughter, chai & memories we hold',
                'category' => 'milestones',
                'language' => 'Tamil',
                'image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?q=80&w=400&auto=format&fit=crop',
                'audio' => asset('audio/sample_friendship.wav'),
            ],
            [
                'id' => 'just-for-you',
                'title' => 'Just for You',
                'uppercase' => 'JUST FOR YOU',
                'subtitle' => 'Because you deserve something timeless',
                'category' => 'heartfelt',
                'language' => 'Hindi',
                'image' => 'https://images.unsplash.com/photo-1549465220-1a8b9238cd48?q=80&w=400&auto=format&fit=crop',
                'audio' => asset('audio/sample_birthday.wav'),
            ],
        ];

        $rightOccasions = [
            [
                'id' => 'anniversary',
                'title' => 'Anniversary',
                'uppercase' => 'ANNIVERSARY',
                'subtitle' => 'Every year a new favorite chapter',
                'category' => 'love',
                'language' => 'Malayalam',
                'image' => 'https://images.unsplash.com/photo-1494774157365-9e04c6720e47?q=80&w=400&auto=format&fit=crop',
                'audio' => asset('audio/sample_anniversary.wav'),
            ],
            [
                'id' => 'memories',
                'title' => 'Memories',
                'uppercase' => 'MEMORIES',
                'subtitle' => 'Preserved forever in sweet melody',
                'category' => 'heartfelt',
                'language' => 'Tamil',
                'image' => 'https://images.unsplash.com/photo-1534447677768-be436bb09401?q=80&w=400&auto=format&fit=crop',
                'audio' => asset('audio/sample_friendship.wav'),
            ],
            [
                'id' => 'mothers-day',
                'title' => 'Mother’s Day',
                'uppercase' => 'MOTHER’S DAY',
                'subtitle' => 'For the heart that held you first',
                'category' => 'family',
                'language' => 'Tamil',
                'image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?q=80&w=400&auto=format&fit=crop',
                'audio' => asset('audio/sample_amma.wav'),
            ],
            [
                'id' => 'corporate',
                'title' => 'Corporate',
                'uppercase' => 'CORPORATE',
                'subtitle' => 'Honoring dedication & milestones',
                'category' => 'corporate',
                'language' => 'English',
                'image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=400&auto=format&fit=crop',
                'audio' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-3.mp3',
            ],
            [
                'id' => 'missing-you',
                'title' => 'Missing You',
                'uppercase' => 'MISSING YOU',
                'subtitle' => 'Counting sunsets until we meet again',
                'category' => 'heartfelt',
                'language' => 'Hindi',
                'image' => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?q=80&w=400&auto=format&fit=crop',
                'audio' => asset('audio/sample_apology.wav'),
            ],
            [
                'id' => 'long-distance',
                'title' => 'Long Distance',
                'uppercase' => 'LONG DISTANCE',
                'subtitle' => 'Two hearts under the same starry sky',
                'category' => 'love',
                'language' => 'English',
                'image' => 'https://images.unsplash.com/photo-1506863530036-1efeddceb993?q=80&w=400&auto=format&fit=crop',
                'audio' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3',
            ],
            [
                'id' => 'apology',
                'title' => 'Apology',
                'uppercase' => 'APOLOGY',
                'subtitle' => 'When sorry is more than just a word',
                'category' => 'heartfelt',
                'language' => 'Hindi',
                'image' => 'https://images.unsplash.com/photo-1513201099705-a9746e1e201f?q=80&w=400&auto=format&fit=crop',
                'audio' => asset('audio/sample_apology.wav'),
            ],
        ];
    @endphp

    <div x-data="occasionsPage()" class="min-h-screen text-ink-900 overflow-x-hidden relative selection:bg-brand-pink/20 selection:text-brand-dark">
        {{-- Hero Section --}}
        <section class="relative bg-maroon-900 text-white pt-24 pb-8 sm:pt-28 sm:pb-10 overflow-hidden" style="background-image: url('{{ asset('images/hero_background.png') }}'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-gradient-to-b from-maroon-900/95 via-maroon-900/90 to-brand-dark/95"></div>
            
            {{-- Decorative Ambient Glows --}}
            <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[180px] bg-crimson-500/15 blur-[100px] rounded-full pointer-events-none"></div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
                {{-- Breadcrumb & Badge --}}
                <div class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-white/10 border border-white/15 text-pink-200 text-xs font-medium mb-3 backdrop-blur-md">
                    <span>♥</span>
                    <span>13 Dedicated Occasion Collections</span>
                </div>

                {{-- Headline --}}
                <h1 class="font-display text-2xl sm:text-3xl lg:text-4xl font-medium tracking-tight max-w-3xl mx-auto leading-[1.2] mb-3">
                    A song for every moment that leaves them <span class="italic font-serif text-brand-pink relative inline-block">speechless.</span>
                </h1>

                {{-- Description --}}
                <p class="text-white/80 text-xs sm:text-sm max-w-2xl mx-auto font-light leading-relaxed mb-4">
                    Choose from our curated occasions below. Click play on any card to preview how real memories become timeless songs — crafted in <strong>English, Tamil, Telugu, Malayalam, or Hindi</strong>.
                </p>

                {{-- Fast Search & Filter Tabs --}}
                <div class="max-w-xl mx-auto flex flex-col sm:flex-row items-center gap-2 mb-4">
                    <div class="relative w-full">
                        <input 
                            type="text" 
                            x-model="searchQuery" 
                            placeholder="Search by occasion (e.g. Birthday, Proposal, Apology)..." 
                            class="w-full bg-white/10 backdrop-blur-md border border-white/20 rounded-full py-2.5 pl-10 pr-4 text-xs sm:text-sm text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-brand-pink/50 transition shadow-inner"
                        >
                        <svg class="w-4 h-4 text-white/50 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <button x-show="searchQuery" @click="searchQuery = ''" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-white/60 hover:text-white text-xs">Clear</button>
                    </div>
                </div>

                {{-- Filter Pills --}}
                <div class="flex items-center justify-start sm:justify-center gap-1.5 sm:gap-2 overflow-x-auto no-scrollbar sm:flex-wrap pb-1.5 sm:pb-0 px-2 sm:px-0">
                    <button 
                        @click="activeCategory = 'all'" 
                        :class="activeCategory === 'all' ? 'bg-brand-pink text-white shadow-lg shadow-crimson-500/30' : 'bg-white/10 text-white/80 hover:bg-white/20'"
                        class="px-3.5 sm:px-4 py-1.5 rounded-full text-xs font-medium transition-all duration-200 backdrop-blur-sm whitespace-nowrap shrink-0"
                    >
                        All (13)
                    </button>
                    <button 
                        @click="activeCategory = 'love'" 
                        :class="activeCategory === 'love' ? 'bg-brand-pink text-white shadow-lg shadow-crimson-500/30' : 'bg-white/10 text-white/80 hover:bg-white/20'"
                        class="px-3.5 sm:px-4 py-1.5 rounded-full text-xs font-medium transition-all duration-200 backdrop-blur-sm whitespace-nowrap shrink-0"
                    >
                        Love & Romance
                    </button>
                    <button 
                        @click="activeCategory = 'family'" 
                        :class="activeCategory === 'family' ? 'bg-brand-pink text-white shadow-lg shadow-crimson-500/30' : 'bg-white/10 text-white/80 hover:bg-white/20'"
                        class="px-3.5 sm:px-4 py-1.5 rounded-full text-xs font-medium transition-all duration-200 backdrop-blur-sm whitespace-nowrap shrink-0"
                    >
                        Parents & Family
                    </button>
                    <button 
                        @click="activeCategory = 'milestones'" 
                        :class="activeCategory === 'milestones' ? 'bg-brand-pink text-white shadow-lg shadow-crimson-500/30' : 'bg-white/10 text-white/80 hover:bg-white/20'"
                        class="px-3.5 sm:px-4 py-1.5 rounded-full text-xs font-medium transition-all duration-200 backdrop-blur-sm whitespace-nowrap shrink-0"
                    >
                        Birthdays & Friends
                    </button>
                    <button 
                        @click="activeCategory = 'heartfelt'" 
                        :class="activeCategory === 'heartfelt' ? 'bg-brand-pink text-white shadow-lg shadow-crimson-500/30' : 'bg-white/10 text-white/80 hover:bg-white/20'"
                        class="px-3.5 sm:px-4 py-1.5 rounded-full text-xs font-medium transition-all duration-200 backdrop-blur-sm whitespace-nowrap shrink-0"
                    >
                        Apology & Memories
                    </button>
                    <button 
                        @click="activeCategory = 'corporate'" 
                        :class="activeCategory === 'corporate' ? 'bg-brand-pink text-white shadow-lg shadow-crimson-500/30' : 'bg-white/10 text-white/80 hover:bg-white/20'"
                        class="px-3.5 sm:px-4 py-1.5 rounded-full text-xs font-medium transition-all duration-200 backdrop-blur-sm whitespace-nowrap shrink-0"
                    >
                        Corporate
                    </button>
                </div>
            </div>
        </section>

        {{-- Flowers Showcase Section --}}
        <div class="flowers-bg pt-10 sm:pt-14 pb-20">
            <div class="max-w-[1360px] mx-auto px-4 sm:px-6 lg:px-8">


            {{-- Main Showcase: 3 Columns (Left 7 Boxes | Center Logo & Wave | Right 7 Boxes) --}}
            <div class="relative py-2 sm:py-4" id="occasionsMainArea">
                {{-- SVG Wave Connection Layer (Clean, graceful, matching the Home Screen aesthetic) --}}
                <svg 
                    id="waveSvgOverlay" 
                    class="hidden lg:block absolute inset-0 w-full h-full pointer-events-none z-10 overflow-visible"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <defs>
                        {{-- Home Screen Matching Wave Glow Filter --}}
                        <filter id="homeWaveGlow" x="-50%" y="-50%" width="200%" height="200%">
                            <feGaussianBlur in="SourceGraphic" stdDeviation="3" result="blur1" />
                            <feGaussianBlur in="SourceGraphic" stdDeviation="6" result="blur2" />
                            <feMerge>
                                <feMergeNode in="blur2" />
                                <feMergeNode in="blur1" />
                                <feMergeNode in="SourceGraphic" />
                            </feMerge>
                        </filter>
                    </defs>

                    {{-- The Smooth Connecting Wave Line (Base) - Identical to Home Screen stroke and width --}}
                    <path 
                        id="occasionsWaveBase" 
                        d="" 
                        stroke="#E58B9E" 
                        stroke-width="1.8" 
                        stroke-linecap="round" 
                        fill="none" 
                        vector-effect="non-scaling-stroke"
                    />

                    {{-- Glowing Wave Trail (Follows behind particle) --}}
                    <path 
                        id="occasionsWaveTrail" 
                        d="" 
                        stroke="#FF4D7D" 
                        stroke-width="2.6" 
                        stroke-linecap="round" 
                        fill="none" 
                        opacity="0.35" 
                        filter="url(#homeWaveGlow)" 
                        vector-effect="non-scaling-stroke"
                    />

                    {{-- Floating Outline Heart on the Wave --}}
                    <path 
                        id="waveFloatingHeart" 
                        d="M 0,0 c -2.2,-1.8 -4.8,-3.8 -4.8,-6 a 2.8,2.8 0 0 1 4.6,-2 l .2,.2 .2,-.2 a 2.8,2.8 0 0 1 4.6,2 c 0,2.2 -2.6,4.2 -4.8,6 z" 
                        stroke="#F5A3B3" 
                        stroke-width="1.3" 
                        fill="none" 
                        opacity="0.85" 
                        transform="translate(-100,-100)"
                    />

                    {{-- Floating Musical Note on the Wave --}}
                    <text 
                        id="waveFloatingNote" 
                        x="-100" 
                        y="-100" 
                        font-size="14" 
                        fill="#E88299" 
                        opacity="0.8" 
                        font-family="sans-serif"
                    >♪</text>

                    {{-- Moving Glowing Particle Group (Exact Match to Home Screen) --}}
                    <g id="waveParticleGroup" class="pointer-events-none transition-opacity duration-300" transform="translate(-100,-100)">
                        <circle cx="0" cy="0" r="14" fill="#FF4D7D" opacity="0.25" filter="url(#homeWaveGlow)" />
                        <circle cx="0" cy="0" r="7" fill="#FF4D7D" opacity="0.6" />
                        <circle cx="0" cy="0" r="3" fill="#FFFFFF" stroke="#E11D48" stroke-width="1.5" />
                        <path d="M 0,-4.5 L 0,4.5 M -4.5,0 L 4.5,0" stroke="#FFFFFF" stroke-width="1.2" opacity="0.95" />
                    </g>

                    {{-- Destination Node Circle at Selected Song Card --}}
                    <circle id="waveTargetNode" cx="-100" cy="-100" r="4.5" fill="#E11D48" stroke="#FFFFFF" stroke-width="1.5" filter="url(#homeWaveGlow)" />
                </svg>

                {{-- Grid Container for Left / Center / Right --}}
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 lg:gap-4 items-center relative z-20">
                    {{-- LEFT COLUMN: 7 Occasions --}}
                    <div class="lg:col-span-4 flex flex-col gap-2.5 sm:gap-3.5 justify-between order-2 lg:order-1 max-w-[360px] mx-auto w-full px-1 sm:px-0 py-3 sm:py-5">
                        @foreach($leftOccasions as $occ)
                            <div 
                                id="card-{{ $occ['id'] }}" 
                                @click="handleCardClick('{{ $occ['id'] }}', '{{ $occ['title'] }}', '{{ $occ['language'] }}', '{{ $occ['image'] }}', '{{ $occ['audio'] }}', '{{ addslashes($occ['subtitle']) }}', '{{ addslashes($occ['uppercase']) }}')"
                                class="occ-card occ-card-left transition-all duration-300 cursor-pointer"
                                :class="[
                                    currentAudioId === '{{ $occ['id'] }}' ? 'is-active' : 'hover:scale-[1.02]',
                                    currentAudioId === '{{ $occ['id'] }}' && isPlaying ? 'is-playing' : '',
                                    activePoppingCardId === '{{ $occ['id'] }}' ? 'animate-occ-pop' : '',
                                    matchesFilter('{{ $occ['id'] }}', '{{ $occ['title'] }}', '{{ $occ['category'] }}') ? 'opacity-100' : 'opacity-25 hover:opacity-75'
                                ]"
                            >
                                {{-- Box Photo Thumbnail with Vivid Pink Outer Border Ring --}}
                                <div 
                                    class="occ-thumb-wrapper"
                                    style="width: 58px; height: 58px; min-width: 58px; min-height: 58px; max-width: 58px; max-height: 58px; border-radius: 14px; overflow: hidden;"
                                    :class="currentAudioId === '{{ $occ['id'] }}' && isPlaying ? 'ring-4 ring-[#FF4D7D]/30' : ''"
                                >
                                    <img 
                                        src="{{ $occ['image'] }}" 
                                        alt="{{ $occ['title'] }}" 
                                        class="occ-thumb-img"
                                        style="width: 100%; height: 100%; border-radius: 12px; object-fit: cover;"
                                        loading="lazy"
                                    >
                                </div>

                                {{-- Overlapping Magenta Rounded Play Button --}}
                                <button 
                                    type="button"
                                    id="playbtn-{{ $occ['id'] }}"
                                    @click.stop="togglePlay('{{ $occ['id'] }}', '{{ $occ['title'] }}', '{{ $occ['language'] }}', '{{ $occ['image'] }}', '{{ $occ['audio'] }}', '{{ addslashes($occ['subtitle']) }}', '{{ addslashes($occ['uppercase']) }}')"
                                    class="occ-play-btn"
                                    style="width: 28px; height: 28px; border-radius: 9px;"
                                    :class="currentAudioId === '{{ $occ['id'] }}' && isPlaying ? 'ring-2 ring-white ring-offset-2 ring-offset-[#FF206E]' : ''"
                                    aria-label="Play sample for {{ $occ['title'] }}"
                                >
                                    <template x-if="!(currentAudioId === '{{ $occ['id'] }}' && isPlaying)">
                                        <svg class="w-3.5 h-3.5 ml-0.5 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </template>
                                    <template x-if="currentAudioId === '{{ $occ['id'] }}' && isPlaying">
                                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                                    </template>
                                </button>

                                {{-- Card Box Container (Rounded rectangle, not pill) --}}
                                <div class="occ-box pill-container">
                                    {{-- Occasion Text Block --}}
                                    <div class="min-w-0 pr-2">
                                        <p class="occ-label-upper">
                                            {{ $occ['uppercase'] }}
                                        </p>
                                        <div class="flex items-center gap-2">
                                            <p class="occ-label-script" title="{{ $occ['subtitle'] }}">
                                                {{ $occ['subtitle'] }}
                                            </p>
                                            {{-- Mini Equalizer Bars when Playing --}}
                                            <div 
                                                x-show="currentAudioId === '{{ $occ['id'] }}' && isPlaying" 
                                                class="flex items-center gap-0.5 h-3.5 pb-0.5 shrink-0"
                                            >
                                                <span class="w-0.5 bg-[#FF2A6D] rounded-full animate-bounce h-2"></span>
                                                <span class="w-0.5 bg-[#FF2A6D] rounded-full animate-bounce h-3.5" style="animation-delay: 0.15s"></span>
                                                <span class="w-0.5 bg-[#FF2A6D] rounded-full animate-bounce h-2.5" style="animation-delay: 0.3s"></span>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Outline Heart Icon on Far Right --}}
                                    <button 
                                        type="button" 
                                        @click.stop="toggleLike('{{ $occ['id'] }}')" 
                                        class="occ-heart-btn"
                                        title="Add to favorites"
                                    >
                                        <template x-if="!liked['{{ $occ['id'] }}']">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                        </template>
                                        <template x-if="liked['{{ $occ['id'] }}']">
                                            <svg class="w-4 h-4 fill-[#E11D48] text-[#E11D48] animate-pulse" viewBox="0 0 24 24">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                            </svg>
                                        </template>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- CENTER COLUMN: Heartgrams Logo, Sparkles, Wordmark & Heart Line --}}
                    <div class="lg:col-span-4 flex flex-col items-center justify-center text-center relative py-3 sm:py-6 order-1 lg:order-2 select-none" id="centerPieceSection">
                        {{-- Center Logo Badge with Sparkles --}}
                        <div class="relative flex items-center justify-center mb-1">
                            {{-- Sparkles & Decorative Hearts around the Badge --}}
                            {{-- Top-Left Small Tilted Heart --}}
                            <span class="absolute -top-3.5 -left-8 text-[#FF4D7D] text-lg sm:text-xl -rotate-12 animate-pulse-slow pointer-events-none">♥</span>
                            
                            {{-- Mid-Left 8-Point Sparkle --}}
                            <span class="absolute top-1/2 -left-12 -translate-y-1/2 text-[#FF758C] text-lg sm:text-xl animate-spin-slow pointer-events-none">✦</span>
                            
                            {{-- Mid-Right 8-Point Sparkle --}}
                            <span class="absolute top-1/2 -right-12 -translate-y-1/2 text-[#FF758C] text-lg sm:text-xl animate-spin-slow pointer-events-none">✦</span>
                            
                            {{-- Top-Right Small Tilted Heart --}}
                            <span class="absolute -top-3 -right-8 text-[#FF4D7D] text-lg sm:text-xl rotate-12 animate-pulse-slow pointer-events-none">♥</span>

                            {{-- Sound Waves Animated Ripple Rings when Playing --}}
                            <div 
                                x-show="isPlaying" 
                                class="absolute inset-0 -m-5 sm:-m-7 rounded-full border-2 border-[#FF4D7D]/35 animate-ping pointer-events-none" 
                                style="animation-duration: 2.2s;"
                            ></div>
                            <div 
                                x-show="isPlaying" 
                                class="absolute inset-0 -m-10 sm:-m-14 rounded-full border border-[#FF4D7D]/25 animate-ping pointer-events-none" 
                                style="animation-duration: 3.2s; animation-delay: 0.6s;"
                            ></div>

                            {{-- The Central Hexagon Logo Badge --}}
                            <div 
                                id="centerHeartgramLogo" 
                                class="relative z-30 w-[105px] sm:w-[120px] h-[105px] sm:h-[120px] flex items-center justify-center drop-shadow-[0_10px_25px_rgba(255,42,109,0.32)] transition-transform duration-500 hover:scale-105 cursor-pointer"
                                style="width: 110px; height: 110px;"
                                :class="isPlaying ? 'scale-105' : ''"
                                @click="toggleGlobalPlay()"
                                title="Click to play / pause active song"
                            >
                                <img 
                                    src="{{ asset('images/logo_badge.png') }}" 
                                    alt="Heartgrams Logo" 
                                    style="width: 100%; height: 100%; object-fit: contain;"
                                    id="centerBadgeImg"
                                >
                            </div>
                        </div>

                        {{-- Center Wordmark: "Heartgrams" Script Typography --}}
                        <div class="relative z-20 w-[210px] sm:w-[250px] mb-6 sm:mb-7 transition-transform duration-300 hover:scale-105 cursor-pointer" style="width: 230px;" @click="window.location.href = '{{ url('/') }}'">
                            <img 
                                src="{{ asset('images/logo_text.png') }}" 
                                alt="Heartgrams" 
                                style="width: 100%; height: auto; object-fit: contain;"
                            >
                        </div>

                     

                        {{-- Create Song Quick Action (Linked to Active Occasion) --}}
                        <div class="mt-1 relative flex flex-col items-center">
                            <a 
                                id="createOccasionSongBtn"
                                :href="'{{ Route::has('create-song') ? route('create-song') : url('/create-your-heartgram-song') }}?occasion=' + encodeURIComponent(currentOccasionName || 'Birthday')"
                                class="relative inline-flex items-center gap-2 px-6 py-2.5 sm:px-7 sm:py-3 rounded-full bg-gradient-to-r from-[#FF206E] to-[#E11D48] hover:from-[#E11D48] hover:to-[#B81D4C] text-white text-xs sm:text-[13.5px] font-semibold tracking-wide shadow-md shadow-[#FF206E]/30 hover:shadow-xl hover:shadow-[#FF206E]/45 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-300 select-none group"
                                :class="[
                                    isPopping ? 'animate-cta-pop ring-4 ring-[#FF206E]/40' : '',
                                    isPlaying ? 'cta-pulse-playing' : ''
                                ]"
                            >
                                {{-- Outward expanding ripple ring on popup --}}
                                <span 
                                    x-show="isPopping" 
                                    class="absolute inset-0 rounded-full bg-[#FF206E] animate-ping opacity-60 pointer-events-none"
                                ></span>

                                <span class="relative z-10 flex items-center gap-1.5">
                                    <span>Create</span>
                                    <span class="transition-all duration-300 font-bold" x-text="currentOccasionName || 'Your'"></span>
                                    <span>Song</span>
                                </span>
                                <svg class="relative z-10 w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    {{-- RIGHT COLUMN: 7 Occasions (Symmetrically Mirrored!) --}}
                    <div class="lg:col-span-4 flex flex-col gap-2.5 sm:gap-3.5 justify-between order-3 max-w-[360px] mx-auto w-full px-1 sm:px-0 py-3 sm:py-5">
                        @foreach($rightOccasions as $occ)
                            <div 
                                id="card-{{ $occ['id'] }}" 
                                @click="handleCardClick('{{ $occ['id'] }}', '{{ $occ['title'] }}', '{{ $occ['language'] }}', '{{ $occ['image'] }}', '{{ $occ['audio'] }}', '{{ addslashes($occ['subtitle']) }}', '{{ addslashes($occ['uppercase']) }}')"
                                class="occ-card occ-card-right transition-all duration-300 cursor-pointer"
                                :class="[
                                    currentAudioId === '{{ $occ['id'] }}' ? 'is-active' : 'hover:scale-[1.02]',
                                    currentAudioId === '{{ $occ['id'] }}' && isPlaying ? 'is-playing' : '',
                                    activePoppingCardId === '{{ $occ['id'] }}' ? 'animate-occ-pop' : '',
                                    matchesFilter('{{ $occ['id'] }}', '{{ $occ['title'] }}', '{{ $occ['category'] }}') ? 'opacity-100' : 'opacity-25 hover:opacity-75'
                                ]"
                            >
                                {{-- Card Box Container (Starts on Left) --}}
                                <div class="occ-box pill-container">
                                    {{-- Outline Heart Icon on Far Left --}}
                                    <button 
                                        type="button" 
                                        @click.stop="toggleLike('{{ $occ['id'] }}')" 
                                        class="occ-heart-btn"
                                        title="Add to favorites"
                                    >
                                        <template x-if="!liked['{{ $occ['id'] }}']">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                        </template>
                                        <template x-if="liked['{{ $occ['id'] }}']">
                                            <svg class="w-4 h-4 fill-[#E11D48] text-[#E11D48] animate-pulse" viewBox="0 0 24 24">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                            </svg>
                                        </template>
                                    </button>

                                    {{-- Occasion Text Block --}}
                                    <div class="min-w-0 pl-2 text-left">
                                        <p class="occ-label-upper">
                                             {{ $occ['uppercase'] }}
                                        </p>
                                        <div class="flex items-center gap-2">
                                            <p class="occ-label-script" title="{{ $occ['subtitle'] }}">
                                                {{ $occ['subtitle'] }}
                                            </p>
                                            {{-- Mini Equalizer Bars when Playing --}}
                                            <div 
                                                x-show="currentAudioId === '{{ $occ['id'] }}' && isPlaying" 
                                                class="flex items-center gap-0.5 h-3.5 pb-0.5 shrink-0"
                                            >
                                                <span class="w-0.5 bg-[#FF2A6D] rounded-full animate-bounce h-2"></span>
                                                <span class="w-0.5 bg-[#FF2A6D] rounded-full animate-bounce h-3.5" style="animation-delay: 0.15s"></span>
                                                <span class="w-0.5 bg-[#FF2A6D] rounded-full animate-bounce h-2.5" style="animation-delay: 0.3s"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Overlapping Magenta Rounded Play Button --}}
                                <button 
                                    type="button"
                                    id="playbtn-{{ $occ['id'] }}"
                                    @click.stop="togglePlay('{{ $occ['id'] }}', '{{ $occ['title'] }}', '{{ $occ['language'] }}', '{{ $occ['image'] }}', '{{ $occ['audio'] }}', '{{ addslashes($occ['subtitle']) }}', '{{ addslashes($occ['uppercase']) }}')"
                                    class="occ-play-btn"
                                    style="width: 28px; height: 28px; border-radius: 9px;"
                                    :class="currentAudioId === '{{ $occ['id'] }}' && isPlaying ? 'ring-2 ring-white ring-offset-2 ring-offset-[#FF206E]' : ''"
                                    aria-label="Play sample for {{ $occ['title'] }}"
                                >
                                    <template x-if="!(currentAudioId === '{{ $occ['id'] }}' && isPlaying)">
                                        <svg class="w-3.5 h-3.5 ml-0.5 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </template>
                                    <template x-if="currentAudioId === '{{ $occ['id'] }}' && isPlaying">
                                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                                    </template>
                                </button>

                                {{-- Box Photo Thumbnail on Far Right --}}
                                <div 
                                    class="occ-thumb-wrapper"
                                    style="width: 58px; height: 58px; min-width: 58px; min-height: 58px; max-width: 58px; max-height: 58px; border-radius: 14px; overflow: hidden;"
                                    :class="currentAudioId === '{{ $occ['id'] }}' && isPlaying ? 'ring-4 ring-[#FF4D7D]/30' : ''"
                                >
                                    <img 
                                        src="{{ $occ['image'] }}" 
                                        alt="{{ $occ['title'] }}" 
                                        class="occ-thumb-img"
                                        style="width: 100%; height: 100%; border-radius: 12px; object-fit: cover;"
                                        loading="lazy"
                                    >
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- Process & Trust Badges Strip --}}
            <div class="mt-8 sm:mt-10 bg-gradient-to-br from-brand-dark to-maroon-900 rounded-2xl sm:rounded-3xl px-6 py-5 sm:px-8 sm:py-6 text-white shadow-lg relative overflow-hidden border border-white/10">
                <div class="absolute -right-16 -top-16 w-48 h-48 bg-brand-pink/15 rounded-full blur-3xl pointer-events-none"></div>
                
                <div class="relative z-10 grid md:grid-cols-3 gap-4 sm:gap-6 text-center md:text-left divide-y md:divide-y-0 md:divide-x divide-white/10">
                    <div class="pt-3 md:pt-0 md:pr-5">
                        <h4 class="font-flowers-title text-xs sm:text-sm font-bold tracking-wider text-pink-100 uppercase mb-1">48-Hour Delivery</h4>
                        <p class="text-white/70 text-[11px] sm:text-xs leading-relaxed">
                            Need a song in a hurry? Master audio MP3 and lyric PDF arrive straight in your WhatsApp within 48 hours.
                        </p>
                    </div>

                    <div class="pt-3 md:pt-0 md:px-5">
                        <h4 class="font-flowers-title text-xs sm:text-sm font-bold tracking-wider text-pink-100 uppercase mb-1">5 Languages Supported</h4>
                        <p class="text-white/70 text-[11px] sm:text-xs leading-relaxed">
                            Authentic lyrics written natively in <strong>English, Tamil, Telugu, Malayalam, or Hindi</strong>.
                        </p>
                    </div>

                    <div class="pt-3 md:pt-0 md:pl-5">
                        <h4 class="font-flowers-title text-xs sm:text-sm font-bold tracking-wider text-pink-100 uppercase mb-1">100% Confidential Story</h4>
                        <p class="text-white/70 text-[11px] sm:text-xs leading-relaxed">
                            Your personal details, inside jokes, and memories stay strictly between you and your creative team.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>

        {{-- Hidden Master Audio Player Element --}}
        <audio id="globalOccasionsAudio" preload="none"></audio>


    </div>

    @push('scripts')
    <script>
        function occasionsPage() {
            return {
                searchQuery: '',
                activeCategory: 'all',
                currentAudioId: 'birthday', // Default selected track
                currentOccasionName: 'Birthday',
                currentOccasionSubtitle: 'Make their day truly unforgettable',
                currentOccasionUpper: 'BIRTHDAY',
                currentTrackLanguage: 'English',
                currentTrackImg: 'https://images.unsplash.com/photo-1558636508-e0db3814bd1d?q=80&w=400&auto=format&fit=crop',
                currentTrackAudio: '{{ asset("audio/sample_birthday.wav") }}',
                isPlaying: false,
                audioEl: null,
                liked: {},
                animFrameId: null,
                particleProgress: 0,
                particleDirection: 1,
                isPopping: false,
                _popTimer: null,
                activePoppingCardId: null,
                _cardPopTimer: null,
                audioProgress: 0,
                currentTimeFormatted: '0:00',
                durationFormatted: '0:00',

                triggerCardPop(id) {
                    this.activePoppingCardId = null;
                    this.$nextTick(() => {
                        this.activePoppingCardId = id;
                        if (this._cardPopTimer) clearTimeout(this._cardPopTimer);
                        this._cardPopTimer = setTimeout(() => {
                            this.activePoppingCardId = null;
                        }, 220);
                    });
                    this.triggerButtonPop();
                },

                triggerButtonPop() {
                    this.isPopping = false;
                    this.$nextTick(() => {
                        this.isPopping = true;
                        if (this._popTimer) clearTimeout(this._popTimer);
                        this._popTimer = setTimeout(() => {
                            this.isPopping = false;
                        }, 300);
                    });
                },

                formatTime(sec) {
                    if (!sec || isNaN(sec)) return '0:00';
                    const m = Math.floor(sec / 60);
                    const s = Math.floor(sec % 60);
                    return `${m}:${s < 10 ? '0' : ''}${s}`;
                },

                seekAudio(event) {
                    if (!this.audioEl || !this.audioEl.duration) return;
                    const rect = event.currentTarget.getBoundingClientRect();
                    const pos = Math.max(0, Math.min(1, (event.clientX - rect.left) / rect.width));
                    this.audioEl.currentTime = pos * this.audioEl.duration;
                },

                matchesFilter(id, title, category) {
                    const q = this.searchQuery.trim().toLowerCase();
                    const matchesSearch = !q || title.toLowerCase().includes(q) || id.toLowerCase().includes(q);
                    const matchesCat = this.activeCategory === 'all' || category === this.activeCategory;
                    return matchesSearch && matchesCat;
                },

                init() {
                    this.audioEl = document.getElementById('globalOccasionsAudio');
                    if(this.audioEl) {
                        this.audioEl.src = this.currentTrackAudio;
                        this.audioEl.addEventListener('ended', () => {
                            this.isPlaying = false;
                            this.audioProgress = 0;
                            this.currentTimeFormatted = '0:00';
                        });
                        this.audioEl.addEventListener('pause', () => {
                            this.isPlaying = false;
                        });
                        this.audioEl.addEventListener('play', () => {
                            this.isPlaying = true;
                        });
                        this.audioEl.addEventListener('timeupdate', () => {
                            if (this.audioEl && this.audioEl.duration) {
                                this.audioProgress = (this.audioEl.currentTime / this.audioEl.duration) * 100;
                                this.currentTimeFormatted = this.formatTime(this.audioEl.currentTime);
                                this.durationFormatted = this.formatTime(this.audioEl.duration);
                            }
                        });
                        this.audioEl.addEventListener('loadedmetadata', () => {
                            if (this.audioEl && this.audioEl.duration) {
                                this.durationFormatted = this.formatTime(this.audioEl.duration);
                            }
                        });
                    }

                    // Start the real-time Home-Screen Wave Connection Engine
                    this.$nextTick(() => {
                        this.startWaveAnimation();
                    });
                },

                toggleLike(id) {
                    this.liked[id] = !this.liked[id];
                },

                handleCardClick(id, occName, language, img, audioSrc, subtitle, uppercase) {
                    this.triggerCardPop(id);
                    if (subtitle) this.currentOccasionSubtitle = subtitle;
                    if (uppercase) this.currentOccasionUpper = uppercase;

                    if (this.currentAudioId === id) {
                        if (this.isPlaying) {
                            this.audioEl.pause();
                        } else {
                            this.audioEl.play().catch(e => console.log('Playback gesture:', e));
                        }
                    } else {
                        this.currentAudioId = id;
                        this.currentOccasionName = occName;
                        this.currentTrackLanguage = language;
                        this.currentTrackImg = img;
                        this.currentTrackAudio = audioSrc;

                        if (this.audioEl) {
                            this.audioEl.src = audioSrc;
                            this.audioEl.load();
                            this.audioEl.play().catch(e => {
                                console.log('Playback requires user gesture:', e);
                            });
                        }
                    }
                },

                togglePlay(id, occName, language, img, audioSrc, subtitle, uppercase) {
                    this.triggerCardPop(id);
                    if (subtitle) this.currentOccasionSubtitle = subtitle;
                    if (uppercase) this.currentOccasionUpper = uppercase;

                    if (this.currentAudioId === id) {
                        if (this.isPlaying) {
                            this.audioEl.pause();
                        } else {
                            this.audioEl.play().catch(e => console.log('Playback gesture:', e));
                        }
                    } else {
                        this.currentAudioId = id;
                        this.currentOccasionName = occName;
                        this.currentTrackLanguage = language;
                        this.currentTrackImg = img;
                        this.currentTrackAudio = audioSrc;

                        this.audioEl.src = audioSrc;
                        this.audioEl.load();
                        this.audioEl.play().catch(e => console.log('Playback gesture:', e));
                    }
                },

                toggleGlobalPlay() {
                    this.triggerButtonPop();
                    if(!this.audioEl) return;
                    if(this.isPlaying) {
                        this.audioEl.pause();
                    } else {
                        this.audioEl.play().catch(e => console.log(e));
                    }
                },

                stopAudio() {
                    if(this.audioEl) {
                        this.audioEl.pause();
                        this.audioEl.currentTime = 0;
                    }
                    this.isPlaying = false;
                },

                // Home-Screen Matching Wave Line Animation Engine
                startWaveAnimation() {
                    const waveBase = document.getElementById('occasionsWaveBase');
                    const waveTrail = document.getElementById('occasionsWaveTrail');
                    const floatingHeart = document.getElementById('waveFloatingHeart');
                    const floatingNote = document.getElementById('waveFloatingNote');
                    const particleGroup = document.getElementById('waveParticleGroup');
                    const targetNode = document.getElementById('waveTargetNode');
                    const mainArea = document.getElementById('occasionsMainArea');
                    const logoBadge = document.getElementById('centerHeartgramLogo');

                    if (!waveBase || !mainArea || !logoBadge) return;

                    const renderFrame = () => {
                        if (window.innerWidth < 1024) {
                            if (waveBase && waveBase.getAttribute('d')) {
                                waveBase.setAttribute('d', '');
                                if (waveTrail) waveTrail.setAttribute('d', '');
                                if (particleGroup) particleGroup.style.opacity = '0';
                                if (targetNode) targetNode.setAttribute('opacity', '0');
                            }
                            this.animFrameId = requestAnimationFrame(renderFrame);
                            return;
                        }

                        // Smooth particle movement along the path
                        const speed = this.isPlaying ? 0.007 : 0.0035;
                        this.particleProgress += speed * this.particleDirection;
                        if (this.particleProgress >= 1) {
                            this.particleProgress = 1;
                            this.particleDirection = -1;
                        } else if (this.particleProgress <= 0) {
                            this.particleProgress = 0;
                            this.particleDirection = 1;
                        }

                        if (this.currentAudioId) {
                            const activeCard = document.getElementById('card-' + this.currentAudioId);
                            if (activeCard && mainArea && logoBadge) {
                                const areaRect = mainArea.getBoundingClientRect();
                                const logoRect = logoBadge.getBoundingClientRect();
                                const cardRect = activeCard.getBoundingClientRect();
                                
                                const isLeftColumn = (cardRect.left + cardRect.width / 2) < (logoRect.left + logoRect.width / 2);
                                
                                // Origin: Left or Right ribbon tip of Heartgrams Logo Badge
                                let originX, originY;
                                if (isLeftColumn) {
                                    originX = (logoRect.left - areaRect.left) + 4;
                                    originY = (logoRect.top - areaRect.top) + (logoRect.height * 0.50);
                                } else {
                                    originX = (logoRect.right - areaRect.left) - 4;
                                    originY = (logoRect.top - areaRect.top) + (logoRect.height * 0.50);
                                }

                                // Target: Inner tip of the card's box
                                const boxEl = activeCard.querySelector('.pill-container') || activeCard;
                                const boxRect = boxEl.getBoundingClientRect();
                                let targetX, targetY;

                                if (isLeftColumn) {
                                    targetX = (boxRect.right - areaRect.left) - 2;
                                    targetY = (boxRect.top - areaRect.top) + (boxRect.height * 0.5);
                                } else {
                                    targetX = (boxRect.left - areaRect.left) + 2;
                                    targetY = (boxRect.top - areaRect.top) + (boxRect.height * 0.5);
                                }

                                // Generate Smooth, Elegant Cubic Bezier Curve (Matching the Home Screen reference!)
                                const dx = targetX - originX;
                                const dy = targetY - originY;

                                // Graceful natural S-curve control points
                                const c1x = originX + dx * 0.45;
                                const c1y = originY - (dy * 0.15) - 20; // gentle arch
                                const c2x = targetX - dx * 0.45;
                                const c2y = targetY + (dy * 0.10) + 15;

                                const pathD = `M ${originX.toFixed(1)},${originY.toFixed(1)} C ${c1x.toFixed(1)},${c1y.toFixed(1)} ${c2x.toFixed(1)},${c2y.toFixed(1)} ${targetX.toFixed(1)},${targetY.toFixed(1)}`;

                                waveBase.setAttribute('d', pathD);
                                waveTrail.setAttribute('d', pathD);

                                // Compute point on cubic bezier at parameter t
                                const getCubicBezierPoint = (t, p0, c1, c2, p1) => {
                                    const mt = 1 - t;
                                    const mt2 = mt * mt;
                                    const mt3 = mt2 * mt;
                                    const t2 = t * t;
                                    const t3 = t2 * t;

                                    const x = mt3 * p0.x + 3 * mt2 * t * c1.x + 3 * mt * t2 * c2.x + t3 * p1.x;
                                    const y = mt3 * p0.y + 3 * mt2 * t * c1.y + 3 * mt * t2 * c2.y + t3 * p1.y;
                                    return { x, y };
                                };

                                const p0 = { x: originX, y: originY };
                                const cp1 = { x: c1x, y: c1y };
                                const cp2 = { x: c2x, y: c2y };
                                const p1 = { x: targetX, y: targetY };

                                // Moving particle position
                                const pt = getCubicBezierPoint(this.particleProgress, p0, cp1, cp2, p1);
                                if (particleGroup) {
                                    particleGroup.setAttribute('transform', `translate(${pt.x.toFixed(1)}, ${pt.y.toFixed(1)})`);
                                    particleGroup.style.opacity = '1';
                                }

                                // Floating Heart position (placed at t = 0.35, slightly offset upward)
                                const heartPt = getCubicBezierPoint(0.35, p0, cp1, cp2, p1);
                                if (floatingHeart) {
                                    floatingHeart.setAttribute('transform', `translate(${heartPt.x.toFixed(1)}, ${(heartPt.y - 12).toFixed(1)}) rotate(-8)`);
                                }

                                // Floating Musical Note (placed at t = 0.70, slightly offset upward)
                                const notePt = getCubicBezierPoint(0.70, p0, cp1, cp2, p1);
                                if (floatingNote) {
                                    floatingNote.setAttribute('x', notePt.x.toFixed(1));
                                    floatingNote.setAttribute('y', (notePt.y - 10).toFixed(1));
                                }

                                // Target Node Circle at Box Destination
                                if (targetNode) {
                                    targetNode.setAttribute('cx', targetX.toFixed(1));
                                    targetNode.setAttribute('cy', targetY.toFixed(1));
                                    targetNode.setAttribute('opacity', '1');
                                }
                            }
                        } else {
                            waveBase.setAttribute('d', '');
                            waveTrail.setAttribute('d', '');
                            if (particleGroup) particleGroup.style.opacity = '0';
                            if (targetNode) targetNode.setAttribute('opacity', '0');
                        }

                        this.animFrameId = requestAnimationFrame(renderFrame);
                    };

                    this.animFrameId = requestAnimationFrame(renderFrame);
                }
            }
        }
    </script>
    @endpush
</x-public-layout>
