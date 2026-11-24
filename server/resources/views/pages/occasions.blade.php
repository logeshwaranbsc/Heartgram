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
            width: 32px !important;
            height: 32px !important;
            min-width: 32px !important;
            min-height: 32px !important;
            max-width: 32px !important;
            max-height: 32px !important;
            border-radius: 9px !important;
            padding: 1.5px !important;
            background: linear-gradient(135deg, #FF2A6D, #FF758C) !important;
            box-shadow: 0 2px 8px rgba(255, 42, 109, 0.28) !important;
            z-index: 25;
            flex-shrink: 0;
            overflow: hidden;
            display: block;
        }
        @media (min-width: 640px) {
            .occ-thumb-wrapper {
                width: 44px !important;
                height: 44px !important;
                min-width: 44px !important;
                min-height: 44px !important;
                max-width: 44px !important;
                max-height: 44px !important;
                border-radius: 12px !important;
                padding: 2px !important;
            }
        }
        @media (min-width: 1024px) {
            .occ-thumb-wrapper {
                width: 58px !important;
                height: 58px !important;
                min-width: 58px !important;
                min-height: 58px !important;
                max-width: 58px !important;
                max-height: 58px !important;
                border-radius: 14px !important;
                padding: 2.5px !important;
            }
        }

        .occ-thumb-img {
            width: 100% !important;
            height: 100% !important;
            max-width: 100% !important;
            max-height: 100% !important;
            border-radius: 7px !important;
            object-fit: cover !important;
            display: block !important;
        }
        @media (min-width: 640px) {
            .occ-thumb-img {
                border-radius: 10px !important;
            }
        }
        @media (min-width: 1024px) {
            .occ-thumb-img {
                border-radius: 12px !important;
            }
        }

        /* Play Button (Squircle / Rounded Box badge) */
        .occ-play-btn {
            position: absolute;
            width: 16px !important;
            height: 16px !important;
            min-width: 16px !important;
            min-height: 16px !important;
            border-radius: 5px !important;
            background: linear-gradient(135deg, #FF206E, #E11D48) !important;
            color: #ffffff !important;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 35;
            box-shadow: 0 2px 6px rgba(225, 29, 72, 0.45) !important;
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
        @media (min-width: 640px) {
            .occ-play-btn {
                width: 22px !important;
                height: 22px !important;
                min-width: 22px !important;
                min-height: 22px !important;
                border-radius: 7px !important;
            }
        }
        @media (min-width: 1024px) {
            .occ-play-btn {
                width: 28px !important;
                height: 28px !important;
                min-width: 28px !important;
                min-height: 28px !important;
                border-radius: 9px !important;
            }
        }

        /* Left and Right box offsets - Mobile (<640px) */
        .occ-card-left .occ-play-btn {
            left: 24px;
            right: auto;
        }
        .occ-card-left .occ-box {
            margin-left: -11px;
            margin-right: 0;
            padding-left: 17px;
            padding-right: 5px;
        }
        .occ-card-right .occ-play-btn {
            right: 24px;
            left: auto;
        }
        .occ-card-right .occ-box {
            margin-right: -11px;
            margin-left: 0;
            padding-right: 17px;
            padding-left: 5px;
        }

        /* Tablet offsets (640px - 1023px) */
        @media (min-width: 640px) {
            .occ-card-left .occ-play-btn {
                left: 34px;
            }
            .occ-card-left .occ-box {
                margin-left: -16px;
                padding-left: 28px;
                padding-right: 10px;
            }
            .occ-card-right .occ-play-btn {
                right: 34px;
            }
            .occ-card-right .occ-box {
                margin-right: -16px;
                padding-right: 28px;
                padding-left: 10px;
            }
        }

        /* Desktop offsets (>= 1024px) */
        @media (min-width: 1024px) {
            .occ-card-left .occ-play-btn {
                left: 44px;
            }
            .occ-card-left .occ-box {
                margin-left: -20px;
                padding-left: 44px;
                padding-right: 18px;
            }
            .occ-card-right .occ-play-btn {
                right: 44px;
            }
            .occ-card-right .occ-box {
                margin-right: -20px;
                padding-right: 44px;
                padding-left: 18px;
            }
        }

        /* Card Box Body (Rounded rectangle box, not pill) */
        .occ-box {
            flex: 1;
            min-height: 32px;
            background: #FFFFFF !important;
            border: 1px solid #FFD1DC !important;
            border-radius: 9px !important;
            box-shadow: 0 2px 8px rgba(255, 77, 125, 0.08) !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.25s ease;
            z-index: 15;
            padding-top: 2px;
            padding-bottom: 2px;
            overflow: hidden;
        }
        .occ-card:hover .occ-box {
            border-color: #FF8EAA !important;
            box-shadow: 0 4px 14px rgba(255, 77, 125, 0.18) !important;
        }
        @media (min-width: 640px) {
            .occ-box {
                min-height: 44px;
                border-width: 1.25px !important;
                border-radius: 13px !important;
                padding-top: 5px;
                padding-bottom: 5px;
            }
        }
        @media (min-width: 1024px) {
            .occ-box {
                min-height: 54px;
                border-width: 1.5px !important;
                border-radius: 16px !important;
                padding-top: 8px;
                padding-bottom: 8px;
            }
        }

        /* Card Pop-Up States & Animation */
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
            transform: scale(1.08) !important;
            margin-top: 3px !important;
            margin-bottom: 3px !important;
        }
        @media (min-width: 640px) {
            .occ-card.is-active {
                transform: scale(1.14) !important;
                margin-top: 6px !important;
                margin-bottom: 6px !important;
            }
        }
        @media (min-width: 1024px) {
            .occ-card.is-active {
                transform: scale(1.22) !important;
                margin-top: 10px !important;
                margin-bottom: 10px !important;
            }
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

        /* Typography inside Boxes */
        .occ-label-upper {
            font-family: 'Cinzel', 'Noto Serif', serif !important;
            font-size: 6.5px !important;
            font-weight: 700 !important;
            letter-spacing: 0.08em !important;
            color: #8F183E !important;
            text-transform: uppercase !important;
            line-height: 1 !important;
            margin-bottom: 1px !important;
        }
        @media (min-width: 640px) {
            .occ-label-upper {
                font-size: 8.5px !important;
                letter-spacing: 0.12em !important;
                margin-bottom: 2px !important;
            }
        }
        @media (min-width: 1024px) {
            .occ-label-upper {
                font-size: 10px !important;
                letter-spacing: 0.16em !important;
                margin-bottom: 3px !important;
            }
        }

        .occ-label-script {
            font-family: 'Noto Sans', sans-serif !important;
            font-style: normal !important;
            font-size: 7.5px !important;
            font-weight: 500 !important;
            color: #9C1844 !important;
            line-height: 1.15 !important;
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            letter-spacing: 0.01em !important;
        }
        @media (min-width: 640px) {
            .occ-label-script {
                font-size: 10px !important;
                line-height: 1.25 !important;
            }
        }
        @media (min-width: 1024px) {
            .occ-label-script {
                font-size: 12.5px !important;
            }
        }

        /* Heart Toggle Icon */
        .occ-heart-btn {
            background: none !important;
            border: none !important;
            cursor: pointer;
            padding: 1.5px;
            color: #C2185B !important;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s ease, color 0.2s ease;
            flex-shrink: 0;
        }
        @media (min-width: 640px) {
            .occ-heart-btn {
                padding: 2.5px;
            }
        }
        @media (min-width: 1024px) {
            .occ-heart-btn {
                padding: 4px;
            }
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
                'subtitle' => "For the sorry you couldn't say out loud",
                'category' => 'heartfelt',
                'language' => 'Hindi',
                'image' => 'https://images.unsplash.com/photo-1513201099705-a9746e1e201f?q=80&w=400&auto=format&fit=crop',
                'audio' => asset('audio/sample_apology.wav'),
            ],
        ];

        // Safely merge dynamic database occasion songs (e.g. Cloudinary audio URLs) if table exists
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('occasion_songs')) {
                $dbSongs = \App\OccasionSong::where('is_active', true)->get()->keyBy('occasion_id');
                if ($dbSongs->isNotEmpty()) {
                    foreach ($leftOccasions as &$occ) {
                        if (isset($dbSongs[$occ['id']])) {
                            $dbItem = $dbSongs[$occ['id']];
                            if (!empty($dbItem->audio)) {
                                $occ['audio'] = $dbItem->audio;
                            }
                            if (!empty($dbItem->title)) {
                                $occ['title'] = $dbItem->title;
                            }
                            if (!empty($dbItem->subtitle)) {
                                $occ['subtitle'] = $dbItem->subtitle;
                            }
                            if (!empty($dbItem->image)) {
                                $occ['image'] = $dbItem->image;
                            }
                            if (!empty($dbItem->language)) {
                                $occ['language'] = $dbItem->language;
                            }
                        }
                    }
                    unset($occ);

                    foreach ($rightOccasions as &$occ) {
                        if (isset($dbSongs[$occ['id']])) {
                            $dbItem = $dbSongs[$occ['id']];
                            if (!empty($dbItem->audio)) {
                                $occ['audio'] = $dbItem->audio;
                            }
                            if (!empty($dbItem->title)) {
                                $occ['title'] = $dbItem->title;
                            }
                            if (!empty($dbItem->subtitle)) {
                                $occ['subtitle'] = $dbItem->subtitle;
                            }
                            if (!empty($dbItem->image)) {
                                $occ['image'] = $dbItem->image;
                            }
                            if (!empty($dbItem->language)) {
                                $occ['language'] = $dbItem->language;
                            }
                        }
                    }
                    unset($occ);
                }
            }
        } catch (\Throwable $e) {
            // Silently fallback to static defaults if database or table is not ready
        }

        $allOccasions = array_values(array_merge($leftOccasions, $rightOccasions));
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
                    <span>Personalised songs for 14 occasions</span>
                </div>

                {{-- Headline --}}
                <h1 class="font-display text-2xl sm:text-3xl lg:text-4xl font-medium tracking-tight max-w-3xl mx-auto leading-[1.2] mb-3">
                    A personalised song for every <span class="italic font-serif text-brand-pink relative inline-block">occasion.</span>
                </h1>

                {{-- Description --}}
                <p class="text-white/80 text-xs sm:text-sm max-w-2xl mx-auto font-light leading-relaxed mb-4">
                    A first birthday. A long-overdue sorry. Forty years together. Scroll down, find your moment, and press play to hear how it could sound.
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
                        All (14)
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

        {{-- Language Marquee --}}
        <section class="bg-gradient-to-r from-cream-100/90 via-white to-cream-100/90 border-y border-cream-300/80 shadow-[inset_0_1px_3px_rgba(0,0,0,0.02)] h-14 overflow-hidden flex items-center relative z-20" style="height: 3.5rem;">
            @php
                $langs = [
                    ['name' => 'தமிழ்', 'badge' => 'த', 'badgeBg' => 'bg-red-50 border border-crimson-200', 'badgeText' => 'text-crimson-600'],
                    ['name' => 'English', 'badge' => 'EN', 'badgeBg' => 'bg-maroon-900', 'badgeText' => 'text-white'],
                    ['name' => 'తెలుగు', 'badge' => 'తె', 'badgeBg' => 'bg-amber-100/80 border border-amber-200', 'badgeText' => 'text-amber-800'],
                    ['name' => 'ಕನ್ನಡ', 'badge' => 'ಕ', 'badgeBg' => 'bg-yellow-100/80 border border-yellow-200', 'badgeText' => 'text-yellow-800'],
                    ['name' => 'മലയാളം', 'badge' => 'മ', 'badgeBg' => 'bg-pink-100/80 border border-pink-200', 'badgeText' => 'text-pink-800'],
                    ['name' => 'हिन्दी', 'badge' => 'हि', 'badgeBg' => 'bg-rose-100/80 border border-rose-200', 'badgeText' => 'text-rose-800'],
                ];
            @endphp
            
            <div class="relative w-full overflow-hidden flex items-center">
                <div class="flex animate-marquee whitespace-nowrap items-center">
                    @for($i = 0; $i < 4; $i++)
                        @foreach($langs as $lang)
                            <div class="flex items-center">
                                {{-- Pill --}}
                                <div class="flex items-center gap-2.5 sm:gap-3 bg-white border border-stone-200/80 rounded-full py-1 pl-1 pr-4 sm:pr-4.5 shadow-[0_2px_8px_-2px_rgba(0,0,0,0.06)] mx-3 hover:border-crimson-300 transition-colors">
                                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm {{ $lang['badgeBg'] }} {{ $lang['badgeText'] }} shrink-0">
                                        {{ $lang['badge'] }}
                                    </div>
                                    <span class="text-maroon-900 font-medium text-sm sm:text-[15px] tracking-tight">{{ $lang['name'] }}</span>
                                </div>
                                
                                {{-- Separator Star --}}
                                <svg class="w-3.5 h-3.5 text-crimson-400/50 mx-2 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0l2 10 10 2-10 2-2 10-2-10-10-2 10-2z"/></svg>
                            </div>
                        @endforeach
                    @endfor
                </div>
            </div>
        </section>

        {{-- Flowers Showcase Section --}}
        <div class="flowers-bg pt-5 sm:pt-10 lg:pt-14 pb-12 sm:pb-16 lg:pb-20">
            <div class="max-w-[1360px] mx-auto px-1 sm:px-4 lg:px-8">

            {{-- Main Showcase: 3 Columns Responsive (Left 7 Cards | Center Logo & Wave | Right 7 Cards) --}}
            <div class="w-full relative py-2 sm:py-3 lg:py-4" id="occasionsMainArea">
                {{-- SVG Wave Connection Layer (Clean, graceful, matching the Home Screen aesthetic) --}}
                <svg 
                    id="waveSvgOverlay" 
                    class="block absolute inset-0 w-full h-full pointer-events-none z-10 overflow-visible"
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

                {{-- ============================================================ --}}
                {{-- MOBILE VIEW: Overlapping Stacked Cards Carousel (< lg) --}}
                {{-- ============================================================ --}}
                <div class="block lg:hidden w-full relative z-20 py-2">
                    {{-- 1. Mobile Branding Header (Logo & Dynamic Title) --}}
                    <div class="flex flex-col items-center justify-center text-center relative py-1 mb-3 select-none">
                        <div class="relative flex items-center justify-center mb-1">
                            <span class="absolute -top-2 -left-6 text-[#FF4D7D] text-xs -rotate-12 animate-pulse-slow pointer-events-none">♥</span>
                            <span class="absolute top-1/2 -left-8 -translate-y-1/2 text-[#FF758C] text-xs animate-spin-slow pointer-events-none">✦</span>
                            <span class="absolute top-1/2 -right-8 -translate-y-1/2 text-[#FF758C] text-xs animate-spin-slow pointer-events-none">✦</span>
                            <span class="absolute -top-2 -right-6 text-[#FF4D7D] text-xs rotate-12 animate-pulse-slow pointer-events-none">♥</span>

                            <div 
                                class="relative z-30 w-[54px] h-[54px] flex items-center justify-center drop-shadow-[0_4px_14px_rgba(255,42,109,0.32)] transition-transform duration-300 cursor-pointer"
                                :class="isPlaying ? 'scale-105' : ''"
                                @click="toggleGlobalPlay()"
                                title="Click to play / pause active song"
                            >
                                <img 
                                    src="{{ asset('images/logo_badge.png') }}" 
                                    alt="Heartgrams Logo" 
                                    class="w-full h-full object-contain"
                                >
                            </div>
                        </div>

                        <div class="relative z-20 w-[110px] mb-1 cursor-pointer" @click="window.location.href = '{{ url('/') }}'">
                            <img 
                                src="{{ asset('images/logo_text.png') }}" 
                                alt="Heartgrams" 
                                class="w-full h-auto object-contain mx-auto"
                            >
                        </div>

                    </div>

                    {{-- 2. Fast Category Jump Pills Strip --}}
                    <div class="flex items-center gap-1.5 overflow-x-auto no-scrollbar touch-pan-x px-2 pb-2 mb-3 max-w-[380px] mx-auto">
                        <button 
                            type="button" 
                            @click="activeCategory = 'all'" 
                            :class="activeCategory === 'all' ? 'bg-[#FF206E] text-white shadow-sm' : 'bg-white/80 text-gray-600 border border-pink-100'"
                            class="px-3 py-1 rounded-full text-[11px] font-bold whitespace-nowrap shrink-0 transition-colors"
                        >
                            All (14)
                        </button>
                        <button 
                            type="button" 
                            @click="jumpToOccasion('birthday')" 
                            :class="currentAudioId === 'birthday' ? 'bg-[#FF206E] text-white shadow-sm' : 'bg-white/80 text-gray-600 border border-pink-100'"
                            class="px-3 py-1 rounded-full text-[11px] font-bold whitespace-nowrap shrink-0 transition-colors"
                        >
                            Birthday
                        </button>
                        <button 
                            type="button" 
                            @click="jumpToOccasion('proposal')" 
                            :class="currentAudioId === 'proposal' ? 'bg-[#FF206E] text-white shadow-sm' : 'bg-white/80 text-gray-600 border border-pink-100'"
                            class="px-3 py-1 rounded-full text-[11px] font-bold whitespace-nowrap shrink-0 transition-colors"
                        >
                            Proposal
                        </button>
                        <button 
                            type="button" 
                            @click="jumpToOccasion('anniversary')" 
                            :class="currentAudioId === 'anniversary' ? 'bg-[#FF206E] text-white shadow-sm' : 'bg-white/80 text-gray-600 border border-pink-100'"
                            class="px-3 py-1 rounded-full text-[11px] font-bold whitespace-nowrap shrink-0 transition-colors"
                        >
                            Anniversary
                        </button>
                        <button 
                            type="button" 
                            @click="jumpToOccasion('love-and-romance')" 
                            :class="currentAudioId === 'love-and-romance' ? 'bg-[#FF206E] text-white shadow-sm' : 'bg-white/80 text-gray-600 border border-pink-100'"
                            class="px-3 py-1 rounded-full text-[11px] font-bold whitespace-nowrap shrink-0 transition-colors"
                        >
                            Love &amp; Romance
                        </button>
                        <button 
                            type="button" 
                            @click="jumpToOccasion('wedding')" 
                            :class="currentAudioId === 'wedding' ? 'bg-[#FF206E] text-white shadow-sm' : 'bg-white/80 text-gray-600 border border-pink-100'"
                            class="px-3 py-1 rounded-full text-[11px] font-bold whitespace-nowrap shrink-0 transition-colors"
                        >
                            Wedding
                        </button>
                        <button 
                            type="button" 
                            @click="jumpToOccasion('apology')" 
                            :class="currentAudioId === 'apology' ? 'bg-[#FF206E] text-white shadow-sm' : 'bg-white/80 text-gray-600 border border-pink-100'"
                            class="px-3 py-1 rounded-full text-[11px] font-bold whitespace-nowrap shrink-0 transition-colors"
                        >
                            Apology
                        </button>
                    </div>

                    {{-- 3. THE OVERLAPPING STACKED CARDS CONTAINER --}}
                    {{-- Exactly matching the user's reference design with 3D stacked cards deck at bottom --}}
                    <div 
                        class="relative w-full max-w-[340px] xs:max-w-[360px] mx-auto min-h-[460px] pb-10 select-none"
                        @touchstart="handleTouchStart($event)"
                        @touchend="handleTouchEnd($event)"
                    >
                        {{-- 3D Stack Peek Visual Layers beneath (for depth effect matching screenshot) --}}
                        <div class="absolute inset-x-3 bottom-5 h-20 rounded-3xl bg-pink-100/70 border border-pink-200/60 shadow-sm transform translate-y-6 scale-[0.91] pointer-events-none z-0"></div>
                        <div class="absolute inset-x-2 bottom-6 h-20 rounded-3xl bg-white/80 border border-pink-200/80 shadow-md transform translate-y-3 scale-[0.96] pointer-events-none z-10"></div>

                        @foreach($allOccasions as $i => $occ)
                            <div 
                                id="mobile-stack-card-{{ $occ['id'] }}"
                                x-show="Math.abs(currentStackIndex - {{ $i }}) <= 2 || (currentStackIndex === {{ count($allOccasions) - 1 }} && {{ $i }} === 0) || (currentStackIndex === 0 && {{ $i }} === {{ count($allOccasions) - 1 }})"
                                class="absolute inset-0 bg-white rounded-3xl p-5 sm:p-6 border border-pink-200/80 shadow-[0_14px_40px_rgba(255,42,109,0.12)] flex flex-col justify-between overflow-hidden transition-all duration-300 ease-out"
                                :style="getStackCardStyle({{ $i }})"
                            >
                                {{-- Giant Faint Watermark Number in Background (e.g. 01, 02) --}}
                                <span class="absolute top-1 right-3 text-7xl sm:text-8xl font-serif font-black text-pink-900/[0.04] select-none pointer-events-none">
                                    {{ sprintf('%02d', $i + 1) }}
                                </span>

                                <div>
                                    {{-- Card Top Row: Squircle Thumbnail & Golden/Pink Pill Badge --}}
                                    <div class="flex items-center justify-between gap-3 relative z-10 mb-3">
                                        {{-- Squircle Icon / Photo in Light Background (Matching reference icon) --}}
                                        <div class="w-12 h-12 rounded-2xl bg-pink-50 border border-pink-200/80 p-0.5 shadow-sm flex items-center justify-center overflow-hidden shrink-0">
                                            <img src="{{ $occ['image'] }}" alt="{{ $occ['title'] }}" class="w-full h-full object-cover rounded-[14px]">
                                        </div>

                                        {{-- Pill Badge matching reference (PILLAR 01 • STEP 1) --}}
                                        <div class="px-3.5 py-1 rounded-full bg-amber-50/90 border border-amber-200/90 text-amber-800 text-[10px] sm:text-[11px] font-bold tracking-wider uppercase shadow-sm">
                                            <span>OCCASION {{ sprintf('%02d', $i + 1) }} • {{ strtoupper($occ['language'] ?? 'ENGLISH') }}</span>
                                        </div>
                                    </div>

                                    {{-- Occasion Title & Subtitle --}}
                                    <div class="relative z-10">
                                        <h3 class="font-serif text-2xl sm:text-[1.7rem] font-bold text-gray-900 mb-1 tracking-tight">
                                            {{ $occ['title'] }}
                                        </h3>
                                        <p class="text-xs sm:text-[13px] text-gray-500 font-medium mb-3.5 leading-snug">
                                            {{ $occ['subtitle'] }}
                                        </p>
                                    </div>

                                    {{-- Highlight Callout Box with Amber Left Accent Border (Exact Match to Reference Box!) --}}
                                    <div class="relative z-10 bg-gray-50/90 border-l-[3.5px] border-amber-500 rounded-r-xl p-3 mb-3.5 text-xs text-gray-700 leading-relaxed shadow-sm">
                                        <strong class="text-gray-900 font-bold block mb-0.5">Personalized Story Song:</strong>
                                        Written by real lyricists around your memories in {{ $occ['language'] ?? 'your language' }}, composed from your story.
                                    </div>

                                    {{-- Key Deliverables / Features Pills (Matching Reference Pills) --}}
                                    <div class="relative z-10 mb-3">
                                        <div class="text-[9.5px] font-bold text-gray-400 uppercase tracking-wider mb-1.5">Key Focus &amp; Deliverables</div>
                                        <div class="flex flex-wrap gap-1.5">
                                            <span class="px-2.5 py-1 rounded-full bg-white border border-gray-200/90 text-gray-700 text-[10.5px] font-medium shadow-sm">Custom Lyrics</span>
                                            <span class="px-2.5 py-1 rounded-full bg-white border border-gray-200/90 text-gray-700 text-[10.5px] font-medium shadow-sm">Studio Mastered MP3</span>
                                            <span class="px-2.5 py-1 rounded-full bg-white border border-gray-200/90 text-gray-700 text-[10.5px] font-medium shadow-sm">Lyrics Keepsake PDF</span>
                                            <span class="px-2.5 py-1 rounded-full bg-white border border-gray-200/90 text-gray-700 text-[10.5px] font-medium shadow-sm">WhatsApp Delivery</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Card Bottom: Audio Player Row & Primary CTA Button --}}
                                <div class="relative z-10 pt-2 border-t border-gray-100 flex flex-col gap-2.5">
                                    {{-- Interactive Audio Player Strip --}}
                                    <div class="bg-pink-50/70 rounded-xl px-3 py-2 border border-pink-200/70 flex items-center justify-between gap-3">
                                        <div class="flex items-center gap-2.5 min-w-0">
                                            {{-- Play / Pause Button with Pulsing Glow --}}
                                            <button 
                                                type="button" 
                                                @click.stop="togglePlay('{{ $occ['id'] }}', '{{ $occ['title'] }}', '{{ $occ['language'] }}', '{{ $occ['image'] }}', '{{ $occ['audio'] }}', '{{ addslashes($occ['subtitle']) }}', '{{ addslashes($occ['uppercase']) }}')"
                                                class="w-8 h-8 rounded-full bg-gradient-to-r from-[#FF206E] to-[#E11D48] text-white flex items-center justify-center shadow-md shadow-[#FF206E]/30 shrink-0 active:scale-95 transition-transform"
                                                aria-label="Play sample song"
                                            >
                                                <template x-if="!(currentAudioId === '{{ $occ['id'] }}' && isPlaying)">
                                                    <svg class="w-3 h-3 ml-0.5 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                                </template>
                                                <template x-if="currentAudioId === '{{ $occ['id'] }}' && isPlaying">
                                                    <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                                                </template>
                                            </button>
                                            <div class="min-w-0">
                                                <div class="text-[10px] font-bold text-gray-800 uppercase tracking-wider flex items-center gap-1.5">
                                                    <span>Sample Track</span>
                                                    <span x-show="currentAudioId === '{{ $occ['id'] }}' && isPlaying" class="w-1.5 h-1.5 rounded-full bg-[#FF206E] animate-ping"></span>
                                                </div>
                                                <div class="text-[10.5px] text-gray-500 tabular-nums" x-text="currentAudioId === '{{ $occ['id'] }}' ? (currentTimeFormatted + ' / ' + durationFormatted) : 'Tap play to listen'"></div>
                                            </div>
                                        </div>

                                        {{-- Mini Equalizer Bars when Playing --}}
                                        <div x-show="currentAudioId === '{{ $occ['id'] }}' && isPlaying" class="flex items-center gap-0.5 h-3 shrink-0 pr-1">
                                            <span class="w-0.5 bg-[#FF2A6D] rounded-full animate-bounce h-2"></span>
                                            <span class="w-0.5 bg-[#FF2A6D] rounded-full animate-bounce h-3.5" style="animation-delay: 0.15s"></span>
                                            <span class="w-0.5 bg-[#FF2A6D] rounded-full animate-bounce h-2" style="animation-delay: 0.3s"></span>
                                        </div>
                                    </div>

                                    {{-- Primary Action Button --}}
                                    <a 
                                        :href="'{{ Route::has('create-song') ? route('create-song') : url('/create-your-heartgram-song') }}?occasion=' + encodeURIComponent('{{ $occ['title'] }}')"
                                        class="w-full py-2.5 rounded-full bg-gradient-to-r from-[#FF206E] to-[#E11D48] hover:from-[#E11D48] hover:to-[#B81D4C] text-white font-bold text-xs uppercase tracking-wider flex items-center justify-center gap-1.5 shadow-md shadow-[#FF206E]/30 active:scale-95 transition-all select-none"
                                    >
                                        <span>Create {{ $occ['title'] }} Song</span>
                                        <span class="text-sm">→</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- 4. Bottom Stack Navigation Controls (Swipe & Arrows) --}}
                    <div class="flex items-center justify-between max-w-[340px] xs:max-w-[360px] mx-auto px-3 mt-2 select-none">
                        <button 
                            type="button" 
                            @click="goToPrevCard()" 
                            class="w-10 h-10 rounded-full bg-white border border-pink-200/80 shadow-sm flex items-center justify-center text-gray-700 hover:bg-pink-50 active:scale-95 transition-all cursor-pointer"
                            aria-label="Previous occasion"
                        >
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                        </button>

                        <div class="flex flex-col items-center">
                            <div class="flex items-center gap-1.5">
                                <span class="text-xs font-bold text-gray-800 font-mono tracking-wider" x-text="String(currentStackIndex + 1).padStart(2, '0')"></span>
                                <span class="text-xs text-gray-400">/</span>
                                <span class="text-xs font-semibold text-gray-500 font-mono" x-text="String(allOccasions.length).padStart(2, '0')"></span>
                            </div>
                            <span class="text-[10px] text-pink-600 font-medium">← Swipe to slide →</span>
                        </div>

                        <button 
                            type="button" 
                            @click="goToNextCard()" 
                            class="w-10 h-10 rounded-full bg-white border border-pink-200/80 shadow-sm flex items-center justify-center text-gray-700 hover:bg-pink-50 active:scale-95 transition-all cursor-pointer"
                            aria-label="Next occasion"
                        >
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>

                {{-- ============================================================ --}}
                {{-- DESKTOP VIEW: 3 Columns Grid with Interactive SVG Wave (>= lg) --}}
                {{-- ============================================================ --}}
                <div class="hidden lg:grid grid-cols-12 gap-4 items-center relative z-20">
                    {{-- LEFT COLUMN: 7 Occasions --}}
                    <div class="col-span-4 flex flex-col gap-1.5 sm:gap-2.5 lg:gap-3.5 justify-between order-1 w-full py-1 sm:py-3 lg:py-5">
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
                                    :class="currentAudioId === '{{ $occ['id'] }}' && isPlaying ? 'ring-2 sm:ring-4 ring-[#FF4D7D]/30' : ''"
                                >
                                    <img 
                                        src="{{ $occ['image'] }}" 
                                        alt="{{ $occ['title'] }}" 
                                        class="occ-thumb-img"
                                        loading="lazy"
                                    >
                                </div>

                                {{-- Overlapping Magenta Rounded Play Button --}}
                                <button 
                                    type="button"
                                    id="playbtn-{{ $occ['id'] }}"
                                    @click.stop="togglePlay('{{ $occ['id'] }}', '{{ $occ['title'] }}', '{{ $occ['language'] }}', '{{ $occ['image'] }}', '{{ $occ['audio'] }}', '{{ addslashes($occ['subtitle']) }}', '{{ addslashes($occ['uppercase']) }}')"
                                    class="occ-play-btn"
                                    :class="currentAudioId === '{{ $occ['id'] }}' && isPlaying ? 'ring-1 sm:ring-2 ring-white ring-offset-1 sm:ring-offset-2 ring-offset-[#FF206E]' : ''"
                                    aria-label="Play sample for {{ $occ['title'] }}"
                                >
                                    <template x-if="!(currentAudioId === '{{ $occ['id'] }}' && isPlaying)">
                                        <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5 lg:w-3.5 lg:h-3.5 ml-0.5 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </template>
                                    <template x-if="currentAudioId === '{{ $occ['id'] }}' && isPlaying">
                                        <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5 lg:w-3.5 lg:h-3.5 fill-current" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                                    </template>
                                </button>

                                {{-- Card Box Container (Rounded rectangle, not pill) --}}
                                <div class="occ-box pill-container">
                                    {{-- Occasion Text Block --}}
                                    <div class="min-w-0 pr-1 sm:pr-2">
                                        <p class="occ-label-upper">
                                            {{ $occ['uppercase'] }}
                                        </p>
                                        <div class="flex items-center gap-1 sm:gap-2">
                                            <p class="occ-label-script" title="{{ $occ['subtitle'] }}">
                                                {{ $occ['subtitle'] }}
                                            </p>
                                            {{-- Mini Equalizer Bars when Playing --}}
                                            <div 
                                                x-show="currentAudioId === '{{ $occ['id'] }}' && isPlaying" 
                                                class="flex items-center gap-0.5 h-2 sm:h-2.5 lg:h-3.5 pb-0.5 shrink-0"
                                            >
                                                <span class="w-0.5 bg-[#FF2A6D] rounded-full animate-bounce h-1.5 sm:h-2"></span>
                                                <span class="w-0.5 bg-[#FF2A6D] rounded-full animate-bounce h-2.5 sm:h-3.5" style="animation-delay: 0.15s"></span>
                                                <span class="w-0.5 bg-[#FF2A6D] rounded-full animate-bounce h-2 sm:h-2.5" style="animation-delay: 0.3s"></span>
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
                                            <svg class="w-2.5 h-2.5 sm:w-3.5 sm:h-3.5 lg:w-4 lg:h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                        </template>
                                        <template x-if="liked['{{ $occ['id'] }}']">
                                            <svg class="w-2.5 h-2.5 sm:w-3.5 sm:h-3.5 lg:w-4 lg:h-4 fill-[#E11D48] text-[#E11D48] animate-pulse" viewBox="0 0 24 24">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                            </svg>
                                        </template>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- CENTER COLUMN: Heartgrams Logo, Sparkles, Wordmark & Heart Line --}}
                    <div class="col-span-4 flex flex-col items-center justify-center text-center relative py-1 sm:py-3 lg:py-6 order-2 select-none" id="centerPieceSection">
                        {{-- Center Logo Badge with Sparkles --}}
                        <div class="relative flex items-center justify-center mb-1">
                            {{-- Sparkles & Decorative Hearts around the Badge --}}
                            {{-- Top-Left Small Tilted Heart --}}
                            <span class="absolute -top-1.5 sm:-top-3.5 -left-3 sm:-left-8 text-[#FF4D7D] text-[8px] sm:text-base lg:text-xl -rotate-12 animate-pulse-slow pointer-events-none">♥</span>
                            
                            {{-- Mid-Left 8-Point Sparkle --}}
                            <span class="absolute top-1/2 -left-4 sm:-left-12 -translate-y-1/2 text-[#FF758C] text-[8px] sm:text-base lg:text-xl animate-spin-slow pointer-events-none">✦</span>
                            
                            {{-- Mid-Right 8-Point Sparkle --}}
                            <span class="absolute top-1/2 -right-4 sm:-right-12 -translate-y-1/2 text-[#FF758C] text-[8px] sm:text-base lg:text-xl animate-spin-slow pointer-events-none">✦</span>
                            
                            {{-- Top-Right Small Tilted Heart --}}
                            <span class="absolute -top-1.5 sm:-top-3 -right-3 sm:-right-8 text-[#FF4D7D] text-[8px] sm:text-base lg:text-xl rotate-12 animate-pulse-slow pointer-events-none">♥</span>

                            {{-- Sound Waves Animated Ripple Rings when Playing --}}
                            <div 
                                x-show="isPlaying" 
                                class="absolute inset-0 -m-3 sm:-m-5 lg:-m-7 rounded-full border-2 border-[#FF4D7D]/35 animate-ping pointer-events-none" 
                                style="animation-duration: 2.2s;"
                            ></div>
                            <div 
                                x-show="isPlaying" 
                                class="absolute inset-0 -m-6 sm:-m-10 lg:-m-14 rounded-full border border-[#FF4D7D]/25 animate-ping pointer-events-none" 
                                style="animation-duration: 3.2s; animation-delay: 0.6s;"
                            ></div>

                            {{-- The Central Hexagon Logo Badge --}}
                            <div 
                                id="centerHeartgramLogo" 
                                class="relative z-30 w-[42px] h-[42px] sm:w-[70px] sm:h-[70px] lg:w-[110px] lg:h-[110px] flex items-center justify-center drop-shadow-[0_4px_14px_rgba(255,42,109,0.32)] transition-transform duration-500 hover:scale-105 cursor-pointer"
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
                        <div class="relative z-20 w-[78px] sm:w-[140px] lg:w-[230px] mb-1 sm:mb-3 lg:mb-6 transition-transform duration-300 hover:scale-105 cursor-pointer" @click="window.location.href = '{{ url('/') }}'">
                            <img 
                                src="{{ asset('images/logo_text.png') }}" 
                                alt="Heartgrams" 
                                style="width: 100%; height: auto; object-fit: contain;"
                            >
                        </div>

                        {{-- Create Song Quick Action (Linked to Active Occasion) --}}
                        <div class="mt-0.5 sm:mt-1 relative flex flex-col items-center">
                            <a 
                                id="createOccasionSongBtn"
                                :href="'{{ Route::has('create-song') ? route('create-song') : url('/create-your-heartgram-song') }}?occasion=' + encodeURIComponent(currentOccasionName || 'Birthday')"
                                class="relative inline-flex items-center gap-1 sm:gap-1.5 lg:gap-2 px-2 py-0.5 sm:px-4 sm:py-2 lg:px-7 lg:py-3 rounded-full bg-gradient-to-r from-[#FF206E] to-[#E11D48] hover:from-[#E11D48] hover:to-[#B81D4C] text-white text-[7.5px] sm:text-xs lg:text-[13.5px] font-semibold tracking-wide shadow-sm lg:shadow-md shadow-[#FF206E]/30 hover:shadow-xl hover:shadow-[#FF206E]/45 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-300 select-none group"
                                :class="[
                                    isPopping ? 'animate-cta-pop ring-2 lg:ring-4 ring-[#FF206E]/40' : '',
                                    isPlaying ? 'cta-pulse-playing' : ''
                                ]"
                            >
                                {{-- Outward expanding ripple ring on popup --}}
                                <span 
                                    x-show="isPopping" 
                                    class="absolute inset-0 rounded-full bg-[#FF206E] animate-ping opacity-60 pointer-events-none"
                                ></span>

                                <span class="relative z-10 flex items-center gap-0.5 sm:gap-1">
                                    <span>Create</span>
                                    <span class="transition-all duration-300 font-bold" x-text="currentOccasionName || 'Your'"></span>
                                    <span>Song</span>
                                </span>
                                <svg class="relative z-10 w-2 h-2 sm:w-2.5 sm:h-2.5 lg:w-3.5 lg:h-3.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    {{-- RIGHT COLUMN: 7 Occasions (Symmetrically Mirrored!) --}}
                    <div class="col-span-4 flex flex-col gap-1.5 sm:gap-2.5 lg:gap-3.5 justify-between order-3 w-full py-1 sm:py-3 lg:py-5">
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
                                            <svg class="w-2.5 h-2.5 sm:w-3.5 sm:h-3.5 lg:w-4 lg:h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                        </template>
                                        <template x-if="liked['{{ $occ['id'] }}']">
                                            <svg class="w-2.5 h-2.5 sm:w-3.5 sm:h-3.5 lg:w-4 lg:h-4 fill-[#E11D48] text-[#E11D48] animate-pulse" viewBox="0 0 24 24">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                            </svg>
                                        </template>
                                    </button>

                                    {{-- Occasion Text Block --}}
                                    <div class="min-w-0 pl-1 sm:pl-2 text-left">
                                        <p class="occ-label-upper">
                                             {{ $occ['uppercase'] }}
                                        </p>
                                        <div class="flex items-center gap-1 sm:gap-2">
                                            <p class="occ-label-script" title="{{ $occ['subtitle'] }}">
                                                {{ $occ['subtitle'] }}
                                            </p>
                                            {{-- Mini Equalizer Bars when Playing --}}
                                            <div 
                                                x-show="currentAudioId === '{{ $occ['id'] }}' && isPlaying" 
                                                class="flex items-center gap-0.5 h-2 sm:h-2.5 lg:h-3.5 pb-0.5 shrink-0"
                                            >
                                                <span class="w-0.5 bg-[#FF2A6D] rounded-full animate-bounce h-1.5 sm:h-2"></span>
                                                <span class="w-0.5 bg-[#FF2A6D] rounded-full animate-bounce h-2.5 sm:h-3.5" style="animation-delay: 0.15s"></span>
                                                <span class="w-0.5 bg-[#FF2A6D] rounded-full animate-bounce h-2 sm:h-2.5" style="animation-delay: 0.3s"></span>
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
                                    :class="currentAudioId === '{{ $occ['id'] }}' && isPlaying ? 'ring-1 sm:ring-2 ring-white ring-offset-1 sm:ring-offset-2 ring-offset-[#FF206E]' : ''"
                                    aria-label="Play sample for {{ $occ['title'] }}"
                                >
                                    <template x-if="!(currentAudioId === '{{ $occ['id'] }}' && isPlaying)">
                                        <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5 lg:w-3.5 lg:h-3.5 ml-0.5 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </template>
                                    <template x-if="currentAudioId === '{{ $occ['id'] }}' && isPlaying">
                                        <svg class="w-2 h-2 sm:w-2.5 sm:h-2.5 lg:w-3.5 lg:h-3.5 fill-current" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                                    </template>
                                </button>

                                {{-- Box Photo Thumbnail on Far Right --}}
                                <div 
                                    class="occ-thumb-wrapper"
                                    :class="currentAudioId === '{{ $occ['id'] }}' && isPlaying ? 'ring-2 sm:ring-4 ring-[#FF4D7D]/30' : ''"
                                >
                                    <img 
                                        src="{{ $occ['image'] }}" 
                                        alt="{{ $occ['title'] }}" 
                                        class="occ-thumb-img"
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
                        <h4 class="font-flowers-title text-xs sm:text-sm font-bold tracking-wider text-pink-100 uppercase mb-1">On WhatsApp &amp; Email in 3–5 Days</h4>
                        <p class="text-white/70 text-[11px] sm:text-xs leading-relaxed">
                            Your MP3 and lyrics PDF arrive on WhatsApp and email in 3–5 days, or 1–2 days with Premium.
                        </p>
                    </div>

                    <div class="pt-3 md:pt-0 md:px-5">
                        <h4 class="font-flowers-title text-xs sm:text-sm font-bold tracking-wider text-pink-100 uppercase mb-1">6 Languages</h4>
                        <p class="text-white/70 text-[11px] sm:text-xs leading-relaxed">
                            Lyrics written in Tamil, Malayalam, Kannada, Telugu, Hindi or English, not translated from English.
                        </p>
                    </div>

                    <div class="pt-3 md:pt-0 md:pl-5">
                        <h4 class="font-flowers-title text-xs sm:text-sm font-bold tracking-wider text-pink-100 uppercase mb-1">Your Story Stays Private</h4>
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
                allOccasions: @json($allOccasions),
                currentStackIndex: 0,
                touchStartX: 0,
                touchStartY: 0,
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

                getStackCardStyle(i) {
                    const total = this.allOccasions.length;
                    const diff = (i - this.currentStackIndex + total) % total;

                    if (diff === 0) {
                        return 'z-index: 30; transform: translateY(0px) scale(1); opacity: 1; pointer-events: auto;';
                    } else if (diff === 1) {
                        return 'z-index: 20; transform: translateY(12px) scale(0.96); opacity: 0.90; pointer-events: none;';
                    } else if (diff === 2) {
                        return 'z-index: 10; transform: translateY(24px) scale(0.92); opacity: 0.65; pointer-events: none;';
                    } else {
                        return 'z-index: 0; transform: translateY(36px) scale(0.88); opacity: 0; pointer-events: none;';
                    }
                },

                goToNextCard() {
                    const next = (this.currentStackIndex + 1) % this.allOccasions.length;
                    this.setCardIndex(next);
                },

                goToPrevCard() {
                    const prev = (this.currentStackIndex - 1 + this.allOccasions.length) % this.allOccasions.length;
                    this.setCardIndex(prev);
                },

                jumpToOccasion(id) {
                    const idx = this.allOccasions.findIndex(o => o.id === id);
                    if (idx !== -1) {
                        this.setCardIndex(idx);
                    }
                },

                setCardIndex(idx) {
                    this.currentStackIndex = idx;
                    const occ = this.allOccasions[idx];
                    if (occ) {
                        this.currentAudioId = occ.id;
                        this.currentOccasionName = occ.title;
                        this.currentOccasionSubtitle = occ.subtitle;
                        this.currentOccasionUpper = occ.uppercase || occ.title.toUpperCase();
                        this.currentTrackLanguage = occ.language || 'English';
                        this.currentTrackImg = occ.image;
                        this.currentTrackAudio = occ.audio;

                        if (this.audioEl) {
                            this.audioEl.src = occ.audio;
                            this.audioEl.load();
                            this.audioEl.play().catch(e => console.log('Playback gesture:', e));
                        }
                        this.triggerCardPop(occ.id);
                    }
                },

                handleTouchStart(e) {
                    if (!e.changedTouches || !e.changedTouches[0]) return;
                    this.touchStartX = e.changedTouches[0].screenX;
                    this.touchStartY = e.changedTouches[0].screenY;
                },

                handleTouchEnd(e) {
                    if (!e.changedTouches || !e.changedTouches[0]) return;
                    const endX = e.changedTouches[0].screenX;
                    const endY = e.changedTouches[0].screenY;
                    const diffX = this.touchStartX - endX;
                    const diffY = this.touchStartY - endY;
                    if (Math.abs(diffX) > 35 && Math.abs(diffX) > Math.abs(diffY)) {
                        if (diffX > 0) {
                            this.goToNextCard();
                        } else {
                            this.goToPrevCard();
                        }
                    }
                },

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
