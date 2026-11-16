<x-public-layout>
    {{-- Hero Section --}}
    <section class="relative bg-maroon-900 text-white overflow-hidden flex items-center w-full min-h-[calc(100vh-3.5rem)] min-h-[calc(100dvh-3.5rem)]" style="background-image: url('{{ asset('images/hero_background.png?v=2') }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-gradient-to-b from-[#1f070c]/95 via-[#170508]/90 to-[#120306]/95 sm:bg-gradient-to-br sm:from-maroon-900/90 sm:via-maroon-900/80 sm:to-maroon-900/40"></div>
        <div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-4 lg:pt-[76px] lg:pb-3 xl:pt-[82px] xl:pb-4 flex flex-col justify-center h-full">
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-10 xl:gap-14 items-center w-full min-w-0 my-auto">
                <div class="relative z-10 py-1 w-full max-w-full min-w-0">
                    {{-- Decorative stars left of headline (hidden on mobile to prevent left-side overflow) --}}
                    <div class="hidden sm:block absolute -left-10 sm:-left-12 top-1.5 text-brand-light/30">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l1.5 5.5L19 9l-5.5 1.5L12 16l-1.5-5.5L5 9l5.5-1.5z"/><path d="M19 15l1 3 3 1-3 1-1 3-1-3-3-1 3-1z"/><path d="M5 16l.5 2 2 .5-2 .5-.5 2-.5-2-2-.5 2-.5z"/></svg>
                    </div>

                    <h1 class="hero-main-title font-display text-3xl sm:text-4xl md:text-5xl lg:text-[2.9rem] xl:text-[3.4rem] 2xl:text-[3.75rem] font-medium text-white leading-[1.2] sm:leading-[1.22] mb-4 sm:mb-4.5 xl:mb-5">
                        Hear things that<br>
                        left them<br>
                        <span class="text-crimson-500 italic font-serif relative inline-flex items-center flex-wrap mt-0.5 sm:mt-1">
                            <span>speechless.</span>
                            <svg class="inline-block ml-2 -mt-1 w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 xl:w-9 xl:h-9 text-crimson-500 shrink-0 align-middle" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                            <svg class="absolute left-0 -bottom-1.5 w-full h-2 text-crimson-500/40" preserveAspectRatio="none" viewBox="0 0 100 10" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M0 5 Q 50 10, 100 2" stroke-linecap="round"></path></svg>
                        </span>
                    </h1>
                    
                    <p class="hero-desc-p text-[14px] sm:text-[15px] lg:text-[14.5px] xl:text-[16px] text-white/85 mb-5 sm:mb-5.5 xl:mb-6 w-full max-w-full sm:max-w-[28rem] xl:max-w-[32rem] leading-relaxed font-light mt-2.5 sm:mt-3">
                        Tell us the memory. We compose the melody, write the lyrics, and hand you a real song made for one person — in English, Tamil, Telugu, Malayalam, or Hindi.
                    </p>
                    
                    <div class="hero-cta-buttons flex flex-col sm:flex-row flex-wrap items-stretch sm:items-center gap-3 sm:gap-3.5 mb-5 sm:mb-5.5 xl:mb-6 w-full max-w-md">
                        <a href="#start" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-gradient-to-r from-brand-pink to-brand-dark hover:from-brand-pink/90 hover:to-brand-dark/90 text-white px-6 sm:px-6.5 xl:px-7.5 py-2.5 sm:py-3 xl:py-3.5 rounded-full text-sm sm:text-[15px] xl:text-base font-medium transition shadow-lg shadow-crimson-500/20 hover:scale-[1.02] active:scale-[0.98]">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                            <span class="whitespace-nowrap">Start My Song Story</span>
                            <svg class="w-4 h-4 ml-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="#samples" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 border border-white/20 hover:border-white/40 text-white px-6 sm:px-6.5 xl:px-7.5 py-2.5 sm:py-3 xl:py-3.5 rounded-full text-sm sm:text-[15px] xl:text-base font-medium transition bg-black/10 hover:bg-black/20 hover:scale-[1.02] active:scale-[0.98]">
                            <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            <span class="whitespace-nowrap">Hear a Sample</span>
                        </a>
                    </div>
                    
                    {{-- Trust Badges: 2x2 grid on mobile for 100% fit, flex row on sm+ --}}
                    <div class="hero-trust-badges grid grid-cols-2 sm:flex sm:flex-nowrap items-center gap-2.5 sm:gap-3 lg:gap-3 xl:gap-4.5 w-full max-w-full pb-1 sm:pb-0">
                        <div class="flex items-center gap-1.5 sm:gap-2 shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-crimson-500 shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            <span class="text-[11px] sm:text-xs xl:text-[12.5px] text-white/80 leading-tight">Private story<br class="hidden sm:inline"> handling</span>
                        </div>
                        <div class="hidden sm:block w-px h-5 bg-white/10 shrink-0"></div>
                        <div class="flex items-center gap-1.5 sm:gap-2 shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-crimson-500 shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                            <span class="text-[11px] sm:text-xs xl:text-[12.5px] text-white/80 leading-tight">5 Languages<br class="hidden sm:inline"> available</span>
                        </div>
                        <div class="hidden sm:block w-px h-5 bg-white/10 shrink-0"></div>
                        <div class="flex items-center gap-1.5 sm:gap-2 shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-crimson-500 shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span class="text-[11px] sm:text-xs xl:text-[12.5px] text-white/80 leading-tight">Delivered within<br class="hidden sm:inline"> 48 hours</span>
                        </div>
                        <div class="hidden sm:block w-px h-5 bg-white/10 shrink-0"></div>
                        <div class="flex items-center gap-1.5 sm:gap-2 shrink-0">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-crimson-500 shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                            <span class="text-[11px] sm:text-xs xl:text-[12.5px] text-white/80 leading-tight">Delivered<br class="hidden sm:inline"> via WhatsApp</span>
                        </div>
                    </div>
                    
                    <style>
                        @media (max-width: 639px) {
                            .hero-cta-buttons {
                                display: flex !important;
                                flex-direction: column !important;
                                width: 100% !important;
                            }
                            .hero-cta-buttons > a {
                                width: 100% !important;
                                justify-content: center !important;
                            }
                            .hero-trust-badges {
                                display: grid !important;
                                grid-template-columns: 1fr 1fr !important;
                                gap: 12px 10px !important;
                                width: 100% !important;
                            }
                        }
                    </style>

                    {{-- Small decorative heart bottom left (hidden on mobile) --}}
                    <div class="hidden sm:block absolute -bottom-2 -left-6 text-crimson-500 text-sm pointer-events-none">♥</div>
                </div>

                {{-- Music Player Card --}}
                <div class="hidden lg:flex justify-end relative w-full max-w-md xl:max-w-lg ml-auto">
                    {{-- CSS Vinyl Record --}}
                    <div id="heroVinylRecord" class="absolute top-2 right-[-1.5rem] xl:right-[-2rem] w-56 h-56 xl:w-64 xl:h-64 2xl:w-72 2xl:h-72 rounded-full shadow-2xl z-0 hidden xl:block transition-transform duration-75 ease-linear" style="background: repeating-radial-gradient( #111111, #111111 2px, #3A1930 3px, #3A1930 4px );">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-18 h-18 xl:w-22 xl:h-22 bg-crimson-800 rounded-full flex items-center justify-center border border-white/10 shadow-inner">
                                <div class="w-2.5 h-2.5 bg-black rounded-full shadow-inner relative"><div class="absolute top-0 right-0 w-0.5 h-0.5 bg-white/30 rounded-full"></div></div>
                            </div>
                        </div>
                    </div>

                    {{-- Main Player --}}
                    <div class="hero-player-card relative w-full max-w-[18.5rem] lg:max-w-[19.5rem] xl:max-w-[21.5rem] 2xl:max-w-[23rem] bg-gradient-to-br from-brand-dark to-brand-black rounded-[1.6rem] xl:rounded-[1.85rem] p-3.5 sm:p-4 xl:p-4.5 shadow-[0_20px_50px_rgba(0,0,0,0.5)] border border-white/5 z-10 backdrop-blur-md">
                        <audio id="heroAudio" src="{{ asset('audio/sample_amma.wav') }}" preload="auto"></audio>
                        
                        {{-- Album Art --}}
                        <div class="relative w-full aspect-[4/3] rounded-[1.2rem] sm:rounded-[1.3rem] xl:rounded-[1.45rem] overflow-hidden mb-3 xl:mb-3.5 shadow-inner bg-black/40">
                            <img id="heroAlbumArt" src="{{ asset('images/album_art_amma.png') }}" alt="For Amma, on her 60th" class="w-full h-full object-cover transition-opacity duration-300">
                            {{-- Gradient Overlay & Text --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-transparent flex flex-col justify-end p-2.5 sm:p-3 xl:p-3.5 text-center">
                                <h3 id="heroTitleLine1" class="font-display text-sm sm:text-base xl:text-lg font-bold text-white mb-0.5 leading-tight text-shadow-sm transition-all duration-300">For Amma,</h3>
                                <h3 id="heroTitleLine2" class="font-display text-sm sm:text-base xl:text-lg font-bold text-white italic leading-tight text-shadow-sm transition-all duration-300">on her 60th.</h3>
                            </div>
                        </div>

                        {{-- Waveform (Reactive / Click to seek) --}}
                        <div id="heroWaveformContainer" class="flex items-center justify-between h-5.5 sm:h-6 xl:h-6.5 mb-2.5 xl:mb-3 gap-[2px] cursor-pointer" title="Click to seek">
                            @for($i = 0; $i < 40; $i++)
                                <div class="flex-1 bg-crimson-500 rounded-full transition-all duration-150 ease-in-out hero-waveform-bar" style="height: {{ rand(20, 85) }}%; opacity: 0.85;"></div>
                            @endfor
                        </div>

                        {{-- Progress Bar --}}
                        <div class="mb-2.5 xl:mb-3">
                            <div id="heroProgressBar" class="w-full h-1.5 sm:h-2 bg-white/10 rounded-full relative cursor-pointer group py-1 -my-1" title="Seek">
                                <div class="w-full h-1.5 bg-white/10 rounded-full relative overflow-hidden pointer-events-none">
                                    <div id="heroProgressFill" class="absolute top-0 left-0 h-full bg-crimson-500 rounded-full w-0 transition-none"></div>
                                </div>
                                <div id="heroProgressDot" class="absolute top-1/2 left-0 w-3 h-3 xl:w-3.5 xl:h-3.5 bg-white rounded-full shadow-md shadow-crimson-500/50 transform -translate-y-1/2 -translate-x-1/2 pointer-events-none group-hover:scale-125 transition-transform"></div>
                            </div>
                            <div class="flex justify-between items-center mt-1 select-none">
                                <span id="heroCurrentTime" class="text-[9.5px] xl:text-[10.5px] text-white/50 font-medium tracking-wider tabular-nums">00:00</span>
                                <span id="heroDurationTime" class="text-[9.5px] xl:text-[10.5px] text-white/50 font-medium tracking-wider tabular-nums">00:25</span>
                            </div>
                        </div>

                        {{-- Controls --}}
                        <div class="flex items-center justify-between px-1.5">
                            {{-- Shuffle --}}
                            <button id="heroShuffleBtn" type="button" aria-label="Shuffle" title="Shuffle" class="text-white/40 hover:text-white transition p-1 cursor-pointer rounded-full hover:bg-white/5 active:scale-95">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                            </button>
                            {{-- Prev --}}
                            <button id="heroPrevBtn" type="button" aria-label="Previous track" title="Previous track" class="text-white hover:text-crimson-400 transition p-1 cursor-pointer rounded-full hover:bg-white/5 active:scale-95">
                                <svg class="w-4.5 h-4.5 xl:w-5 xl:h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 20L9 12l10-8v16zM5 19h2V5H5v14z"/></svg>
                            </button>
                            {{-- Play Button --}}
                            <button id="heroPlayBtn" type="button" aria-label="Play or Pause" title="Play / Pause" class="w-11 h-11 xl:w-13 xl:h-13 bg-gradient-to-br from-crimson-500 to-crimson-600 hover:from-crimson-400 hover:to-crimson-500 text-white rounded-full flex items-center justify-center shadow-lg shadow-crimson-500/40 transition transform hover:scale-105 active:scale-95 cursor-pointer">
                                <svg id="heroPlayIcon" class="w-4.5 h-4.5 xl:w-5 xl:h-5 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                <svg id="heroPauseIcon" class="w-4.5 h-4.5 xl:w-5 xl:h-5 hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                            </button>
                            {{-- Next --}}
                            <button id="heroNextBtn" type="button" aria-label="Next track" title="Next track" class="text-white hover:text-crimson-400 transition p-1 cursor-pointer rounded-full hover:bg-white/5 active:scale-95">
                                <svg class="w-4.5 h-4.5 xl:w-5 xl:h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M5 4l10 8-10 8V4zM19 5h-2v14h2V5z"/></svg>
                            </button>
                            {{-- Repeat --}}
                            <button id="heroRepeatBtn" type="button" aria-label="Repeat" title="Repeat" class="text-white/40 hover:text-white transition p-1 cursor-pointer rounded-full hover:bg-white/5 active:scale-95">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
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

    {{-- Combined Preview & Occasions Section --}}
    <section id="samples" class="mt-8 sm:mt-12 lg:mt-16 pt-4 pb-8 sm:pt-6 sm:pb-10 relative overflow-hidden bg-brand-light scroll-mt-24">

        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            {{-- Mobile Header (shown only on small/medium screens before the categories card) --}}
            <div class="block lg:hidden mb-6 text-center sm:text-left">
                <div class="flex items-center justify-center sm:justify-start gap-2.5 mb-1.5">
                    <span class="text-[11px] sm:text-xs font-bold tracking-[0.25em] text-maroon-900/60 uppercase">BEFORE YOU WRITE A WORD</span>
                    <div class="h-px bg-maroon-900/15 w-12 sm:w-16"></div>
                    <span class="text-crimson-500 text-[10px]">♥</span>
                </div>
                <h2 class="font-display text-3xl sm:text-4xl font-semibold text-maroon-900 mb-1.5 leading-tight flex items-center justify-center sm:justify-start gap-2">
                    Hear our <span class="text-crimson-500 italic relative">Heartgrams.<svg class="w-6 h-6 sm:w-7 sm:h-7 absolute -top-3 sm:-top-3.5 -right-6 sm:-right-7 text-crimson-400/70" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2l2 7 7 2-7 2-2 7-2-7-7-2 7-2z"/></svg></span>
                </h2>
                <p class="text-maroon-800/80 text-sm leading-relaxed font-medium max-w-xl mx-auto sm:mx-0">
                    Pick a feeling, press play, and hear what a Heartgram sounds like — before you tell us a single memory.
                </p>
            </div>

            {{-- Main Interactive Preview: Categories on Left, Contents (Heading + Preview) on Right --}}
            <div class="flex flex-col lg:flex-row gap-6 lg:gap-8 items-start mb-1">
                
                {{-- Left Column: Song Categories (Level with Header, Ending Just Above Category Chips) --}}
                <div class="w-full lg:w-[32%] xl:w-[30%] bg-brand-dark rounded-[1.75rem] pt-4.5 pb-4 px-3.5 sm:px-4 text-white shadow-xl flex flex-col justify-between shrink-0 mt-5">
                    <div class="flex items-center gap-2.5 mb-2 mt-4 px-1">
                        <div class="w-5.5 h-5.5 rounded-full bg-white/10 flex items-center justify-center">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/></svg>
                        </div>
                        <span class="text-[10px] sm:text-[10.5px] font-bold tracking-[0.15em] text-white/60 uppercase">SONG CATEGORIES</span>
                    </div>

                    <div class="flex flex-col gap-1.5 py-1.5">
                        @php
                            $previewCats = [
                                'love' => [
                                    'icon' => '<svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>', 
                                    'activeIcon' => '<svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>', 
                                    'title' => 'Love', 
                                    'desc' => 'Songs that speak from the heart'
                                ],
                                'apology' => [
                                    'icon' => '<svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>', 
                                    'activeIcon' => '<svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>', 
                                    'title' => 'Apology', 
                                    'desc' => 'Heartfelt apologies in music'
                                ],
                                'birthday' => [
                                    'icon' => '<svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M20 10V8h-4V4h-2v4h-4V4H8v4H4v2c-1.1 0-2 .9-2 2v2c0 1.1.9 2 2 2v5c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-5c1.1 0 2-.9 2-2v-2c0-1.1-.9-2-2-2zm-9 9H9v-3h2v3zm4 0h-2v-3h2v3zm2-7H5v-2h14v2z"/></svg>', 
                                    'activeIcon' => '<svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M20 10V8h-4V4h-2v4h-4V4H8v4H4v2c-1.1 0-2 .9-2 2v2c0 1.1.9 2 2 2v5c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-5c1.1 0 2-.9 2-2v-2c0-1.1-.9-2-2-2zm-9 9H9v-3h2v3zm4 0h-2v-3h2v3zm2-7H5v-2h14v2z"/></svg>', 
                                    'title' => 'Birthday', 
                                    'desc' => 'Make birthdays unforgettable'
                                ],
                                'proposal' => [
                                    'icon' => '<svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>', 
                                    'activeIcon' => '<svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>', 
                                    'title' => 'Proposal', 
                                    'desc' => 'The perfect way to propose'
                                ],
                                'anniversary' => [
                                    'icon' => '<svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l2.4 7.2L22 12l-7.6 2.8L12 22l-2.4-7.2L2 12l7.6-2.8z"/></svg>', 
                                    'activeIcon' => '<svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l2.4 7.2L22 12l-7.6 2.8L12 22l-2.4-7.2L2 12l7.6-2.8z"/></svg>', 
                                    'title' => 'Anniversary', 
                                    'desc' => 'Celebrate your journey together'
                                ],
                            ];
                        @endphp
                        
                        @foreach($previewCats as $id => $cat)
                            <div class="cat-item flex flex-col justify-center" data-category="{{ $id }}" onclick="setPreviewActive('{{ $id }}')">
                                {{-- Inactive State --}}
                                <div class="cat-inactive {{ $id === 'apology' ? 'hidden' : 'flex' }} items-center justify-between py-2 sm:py-2 px-3.5 rounded-xl hover:bg-white/5 transition cursor-pointer group">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-8.5 h-8.5 rounded-full bg-white/5 flex items-center justify-center border border-white/5 group-hover:scale-105 transition text-xs shadow-inner shrink-0 text-white/80">
                                            {!! $cat['icon'] !!}
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-white text-[13px] mb-0.5 leading-snug">{{ $cat['title'] }}</h4>
                                            <p class="text-[10.5px] text-white/50 leading-tight">{{ $cat['desc'] }}</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-[2px] opacity-20">
                                        <div class="w-1 h-2 bg-white rounded-full"></div>
                                        <div class="w-1 h-3 bg-white rounded-full"></div>
                                        <div class="w-1 h-1.5 bg-white rounded-full"></div>
                                        <div class="w-1 h-3.5 bg-white rounded-full"></div>
                                    </div>
                                </div>
                                
                                {{-- Active State --}}
                                <div class="cat-active relative {{ $id === 'apology' ? 'block' : 'hidden' }}">
                                    <div class="absolute -inset-0.5 bg-gradient-to-r from-crimson-500 to-pink-500 rounded-[1.15rem] blur opacity-60"></div>
                                    <div class="relative flex items-center justify-between py-2 sm:py-2 px-3.5 rounded-xl bg-gradient-to-r from-brand-dark/80 to-brand-dark border border-crimson-500/40 cursor-pointer shadow-lg">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-8.5 h-8.5 rounded-full bg-gradient-to-br from-pink-300 to-crimson-500 flex items-center justify-center text-xs shadow-md border border-white/20 shrink-0 text-white">
                                                {!! $cat['activeIcon'] !!}
                                            </div>
                                            <div>
                                                <h4 class="font-medium text-white text-[13px] mb-0.5 leading-snug">{{ $cat['title'] }}</h4>
                                                <p class="text-[10.5px] text-white/80 leading-tight">{{ $cat['desc'] }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-[2px]">
                                            <div class="w-1 h-2 bg-pink-300 rounded-full animate-pulse"></div>
                                            <div class="w-1 h-3.5 bg-pink-300 rounded-full animate-pulse" style="animation-delay: 0.1s"></div>
                                            <div class="w-1 h-1.5 bg-pink-300 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                            <div class="w-1 h-3 bg-pink-300 rounded-full animate-pulse" style="animation-delay: 0.3s"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Bottom button --}}
                    <button class="w-full mt-3 py-2.5 px-3.5 rounded-xl bg-black/20 hover:bg-black/30 border border-white/5 flex items-center justify-between transition group">
                        <div class="flex items-center gap-2.5">
                            <div class="grid grid-cols-2 gap-[2px] opacity-40">
                                <div class="w-1.5 h-1.5 rounded-full border border-white"></div>
                                <div class="w-1.5 h-1.5 rounded-full border border-white"></div>
                                <div class="w-1.5 h-1.5 rounded-full border border-white"></div>
                                <div class="w-1.5 h-1.5 rounded-full border border-white"></div>
                            </div>
                            <span class="text-xs font-medium text-white/90">Explore all categories</span>
                        </div>
                        <svg class="w-3.5 h-3.5 text-white/40 group-hover:text-white transition transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                </div>

                {{-- Right Column: Contents (Heading + Preview Player) --}}
                <div class="w-full lg:w-[68%] xl:w-[70%] flex flex-col justify-between">
                    {{-- Header on the Right Side (Desktop only) --}}
                    <div class="hidden lg:block text-left mb-3 sm:mb-4">
                        <div class="flex items-center gap-2.5 mb-1.5">
                            <span class="text-[11px] sm:text-xs font-bold tracking-[0.25em] text-maroon-900/60 uppercase">BEFORE YOU WRITE A WORD</span>
                            <div class="h-px bg-maroon-900/15 w-12 sm:w-16"></div>
                            <span class="text-crimson-500 text-[10px]">♥</span>
                        </div>
                        <h2 class="font-display text-3xl sm:text-4xl lg:text-[2.65rem] xl:text-[2.85rem] font-semibold text-maroon-900 mb-1.5 leading-tight flex items-center gap-2">
                            Hear our <span class="text-crimson-500 italic relative">Heartgrams.<svg class="w-7 h-7 sm:w-8 sm:h-8 absolute -top-3.5 sm:-top-4 -right-7 sm:-right-8 text-crimson-400/70" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2l2 7 7 2-7 2-2 7-2-7-7-2 7-2z"/></svg></span>
                        </h2>
                        <p class="text-maroon-800/80 text-sm sm:text-base max-w-2xl leading-relaxed font-medium">
                            Pick a feeling, press play, and hear what a Heartgram sounds like — before you tell us a single memory.
                        </p>
                    </div>

                    {{-- Preview Player Card --}}
                    <div class="w-full bg-gradient-to-br from-brand-light to-white rounded-[2rem] pt-3.5 pb-5 px-5 sm:px-6 md:px-7 shadow-[0_10px_40px_rgba(150,0,30,0.05)] border border-brand-light flex flex-col justify-between relative overflow-hidden flex-1">
                        
                        {{-- Decorative blur --}}
                        <div class="absolute -top-24 -right-24 w-64 h-64 bg-pink-200/50 rounded-full blur-3xl pointer-events-none"></div>
                        
                        <div class="relative z-10 flex flex-col">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center justify-center gap-0.5 w-7 h-7 rounded-full bg-crimson-100/70 text-crimson-600">
                                        <div class="w-[2px] h-2 bg-current rounded-full"></div>
                                        <div class="w-[2px] h-3 bg-current rounded-full"></div>
                                        <div class="w-[2px] h-2 bg-current rounded-full"></div>
                                        <div class="w-[2px] h-4 bg-current rounded-full"></div>
                                    </div>
                                    <span class="text-[11px] font-bold tracking-[0.15em] text-maroon-900/60 uppercase">NOW PREVIEWING</span>
                                </div>
                                <button class="flex items-center gap-1.5 px-3 py-1 rounded-full bg-white border border-red-100/50 shadow-sm text-maroon-900 hover:shadow transition">
                                    <svg class="w-3.5 h-3.5 text-crimson-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                    <span class="text-xs font-semibold">1.2K</span>
                                </button>
                            </div>

                            <h3 id="preview-title" class="font-display text-[2.25rem] sm:text-[2.5rem] text-maroon-900 mb-1 leading-none">An Apology Heartgram</h3>
                            <p id="preview-tags" class="text-maroon-800/60 text-xs sm:text-sm mb-3 flex items-center gap-2 sm:gap-2.5 flex-wrap font-medium">
                                Soft acoustic 
                                <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> Hindi 
                                <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> 60-second sample 
                                <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> Original composition
                            </p>

                            {{-- Player Bar with Reduced Height Music Line --}}
                            <div class="bg-white/90 backdrop-blur-md rounded-t-2xl py-2 px-3 sm:px-4 flex items-center gap-3 sm:gap-4 shadow-sm border border-white border-b-red-100/60">
                                <audio id="previewAudio" preload="auto" src="{{ asset('audio/sample_apology.wav') }}"></audio>
                                <button id="previewPlayBtn" type="button" aria-label="Play sample" class="flex-shrink-0 w-10 h-10 rounded-full bg-gradient-to-br from-crimson-500 to-maroon-700 text-white flex items-center justify-center shadow-md shadow-crimson-500/25 hover:scale-105 active:scale-95 transition cursor-pointer">
                                    <svg id="previewPlayIcon" class="w-4 h-4 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    <svg id="previewPauseIcon" class="w-4 h-4 hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                                </button>
                                <div id="previewWaveformBar" class="flex-1 flex items-center h-5 sm:h-6 gap-0.5 sm:gap-1 cursor-pointer" title="Click to seek">
                                    {{-- Waveform bars --}}
                                    @for($i = 0; $i < 50; $i++)
                                        <div class="flex-1 bg-gradient-to-t from-pink-400 to-crimson-400 rounded-full opacity-60 transition-all duration-150 preview-waveform-bar" style="height: {{ rand(15, 85) }}%"></div>
                                    @endfor
                                </div>
                                <span id="preview-time" class="text-[10px] sm:text-[11px] font-semibold text-maroon-900/50 mx-1 sm:mx-2 tabular-nums tracking-wide">0:00 / 0:25</span>
                            </div>

                            {{-- Lyrics / Quote --}}
                            <div class="bg-gradient-to-r from-white/70 to-red-50/50 backdrop-blur-sm rounded-b-2xl py-3.5 px-4 sm:py-4 sm:px-6 border border-white border-t-0 relative shadow-[0_4px_20px_rgba(200,0,50,0.02)]">
                                <span class="absolute top-3.5 left-4 sm:left-5 text-3xl sm:text-4xl font-serif text-pink-300 leading-none">"</span>
                                <div class="pl-8 sm:pl-10 pr-10 sm:pr-20">
                                    <p id="preview-quote" class="text-maroon-900/80 font-serif text-[15px] sm:text-[17px] italic leading-relaxed">
                                        <span class="font-semibold text-maroon-900">I'm sorry</span> for the times I was wrong,<br>
                                        You mean the world, and I want to make it right.
                                    </p>
                                </div>
                                {{-- Decorative drawn heart icon --}}
                                <div class="absolute right-4 bottom-3.5 sm:right-5 sm:bottom-4 opacity-50 w-11 h-11 text-pink-400 pointer-events-none">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path><path d="M16 2v4"></path><path d="M18 4h-4"></path><path d="M6 2v4"></path><path d="M8 4H4"></path></svg>
                                </div>
                            </div>
                        </div>

                        {{-- Tags --}}
                        <div class="flex flex-wrap gap-2.5 mt-3">
                            @php
                                $tags = ['love' => 'Love', 'apology' => 'Apology', 'birthday' => 'Birthday', 'proposal' => 'Proposal', 'anniversary' => 'Anniversary'];
                            @endphp
                            @foreach($tags as $id => $label)
                                <button onclick="setPreviewActive('{{ $id }}')" data-tag="{{ $id }}" class="preview-tag-btn px-4 sm:px-5 py-1.5 sm:py-2 rounded-full text-xs sm:text-[13px] font-medium transition shadow-sm {{ $id === 'apology' ? 'bg-brand-dark border border-brand-dark text-white shadow-md' : 'bg-white border border-red-100/50 text-maroon-900/60 hover:bg-maroon-900 hover:text-white' }}">{{ $label }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

            <script>
                const previewData = {
                    love: {
                        title: "A Love Heartgram",
                        tags: 'Soft acoustic <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> Tamil <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> 20-second sample <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> Original composition',
                        time: "0:20",
                        quote: '<span class="font-semibold text-maroon-900">You are my everything,</span> my today and all of my tomorrows.'
                    },
                    apology: {
                        title: "An Apology Heartgram",
                        tags: 'Soft acoustic <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> Hindi <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> 25-second sample <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> Original composition',
                        time: "0:25",
                        quote: '<span class="font-semibold text-maroon-900">I\'m sorry</span> for the times I was wrong,<br>You mean the world, and I want to make it right.'
                    },
                    birthday: {
                        title: "A Birthday Heartgram",
                        tags: 'Upbeat pop <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> English <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> 10-second sample <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> Original composition',
                        time: "0:10",
                        quote: '<span class="font-semibold text-maroon-900">Happy Birthday,</span> to the one who makes every day brighter.'
                    },
                    proposal: {
                        title: "A Proposal Heartgram",
                        tags: 'Piano & Strings <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> Malayalam <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> 19-second sample <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> Original composition',
                        time: "0:19",
                        quote: '<span class="font-semibold text-maroon-900">Will you</span> be mine forever? Let\'s write our own story.'
                    },
                    anniversary: {
                        title: "An Anniversary Heartgram",
                        tags: 'Acoustic Romance <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> Malayalam <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> 18-second sample <span class="w-1 h-1 rounded-full bg-maroon-900/20"></span> Original composition',
                        time: "0:18",
                        quote: '<span class="font-semibold text-maroon-900">Through every season,</span> I would choose you all over again.'
                    }
                };

                const categoryAudioMap = {
                    love: "{{ asset('audio/sample_love.wav') }}",
                    apology: "{{ asset('audio/sample_apology.wav') }}",
                    birthday: "{{ asset('audio/sample_birthday.wav') }}",
                    proposal: "{{ asset('audio/sample_proposal.wav') }}",
                    anniversary: "{{ asset('audio/sample_anniversary.wav') }}"
                };

                function setPreviewActive(catId) {
                    // Update content if exists
                    if(previewData[catId]) {
                        document.getElementById('preview-title').innerHTML = previewData[catId].title;
                        document.getElementById('preview-tags').innerHTML = previewData[catId].tags;
                        document.getElementById('preview-quote').innerHTML = previewData[catId].quote;
                    }

                    // Update audio track
                    const previewAudioEl = document.getElementById('previewAudio');
                    const previewTimeEl = document.getElementById('preview-time');
                    if (previewAudioEl && categoryAudioMap[catId]) {
                        const wasPlaying = !previewAudioEl.paused;
                        previewAudioEl.pause();
                        previewAudioEl.src = categoryAudioMap[catId];
                        previewAudioEl.currentTime = 0;
                        if (previewTimeEl) {
                            previewTimeEl.textContent = '0:00 / ' + (previewData[catId] ? previewData[catId].time : '0:20');
                        }
                        if (wasPlaying) {
                            previewAudioEl.play().catch(e => console.warn(e));
                        }
                    }

                    // Update left categories
                    document.querySelectorAll('.cat-item').forEach(item => {
                        const inactiveEl = item.querySelector('.cat-inactive');
                        const activeEl = item.querySelector('.cat-active');
                        if(item.dataset.category === catId) {
                            inactiveEl.classList.add('hidden');
                            inactiveEl.classList.remove('flex');
                            activeEl.classList.remove('hidden');
                            activeEl.classList.add('block');
                        } else {
                            inactiveEl.classList.remove('hidden');
                            inactiveEl.classList.add('flex');
                            activeEl.classList.add('hidden');
                            activeEl.classList.remove('block');
                        }
                    });

                    // Update right tags
                    document.querySelectorAll('.preview-tag-btn').forEach(btn => {
                        if(btn.dataset.tag === catId) {
                            btn.className = 'preview-tag-btn px-5 py-2 rounded-full text-[13px] font-medium transition shadow-sm bg-brand-dark border border-brand-dark text-white shadow-md';
                        } else {
                            btn.className = 'preview-tag-btn px-5 py-2 rounded-full text-[13px] font-medium transition shadow-sm bg-white border border-red-100/50 text-maroon-900/60 hover:bg-maroon-900 hover:text-white';
                        }
                    });
                }
            </script>


        </div>
    </section>



    {{-- Occasions Section --}}
    <section class="bg-[#0b030a] min-h-screen min-h-[100dvh] pt-7 pb-6 sm:pt-8 sm:pb-8 lg:pt-8 lg:pb-8 relative overflow-hidden flex flex-col justify-between select-none scroll-mt-20" id="occasions">
        {{-- Ambient Dark Lighting & Glow --}}
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_60%_at_50%_-10%,rgba(255,77,125,0.09),transparent_70%)] pointer-events-none"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_60%_50%_at_50%_110%,rgba(192,45,75,0.08),transparent_70%)] pointer-events-none"></div>
        <div class="absolute -top-32 left-1/4 w-96 h-96 bg-brand-pink/5 rounded-full blur-[140px] pointer-events-none"></div>
        <div class="absolute -bottom-32 right-1/4 w-96 h-96 bg-crimson-600/5 rounded-full blur-[140px] pointer-events-none"></div>

        {{-- Decorative elements for full background --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            {{-- Big heart outline --}}
            <svg class="absolute right-0 top-1/2 -translate-y-1/2 text-crimson-500/10 w-[500px] h-[500px] translate-x-1/4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.5">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
            </svg>
            {{-- Musical notes & ambient accents --}}
            <div class="absolute right-[20%] top-[15%] text-crimson-400/20 text-3xl rotate-12 blur-[1px]">🎵</div>
            <div class="absolute right-[30%] top-[35%] text-crimson-400/20 text-2xl -rotate-12">♪</div>
            <div class="absolute right-[10%] bottom-[25%] text-pink-300/20 text-xl">♥</div>

            {{-- Golden Stars Blink Effect (Count: 6) --}}
            <style>
                @keyframes goldenStarTwinkle {
                    0%, 100% {
                        opacity: 0.2;
                        transform: scale(0.6) rotate(0deg);
                        filter: drop-shadow(0 0 2px rgba(245, 158, 11, 0.5));
                    }
                    50% {
                        opacity: 1;
                        transform: scale(1.25) rotate(15deg);
                        filter: drop-shadow(0 0 6px #FDE047) drop-shadow(0 0 12px #F59E0B) drop-shadow(0 0 20px #D97706);
                    }
                }
                .golden-star-blink {
                    animation: goldenStarTwinkle ease-in-out infinite;
                    transform-origin: center;
                    will-change: transform, opacity, filter;
                }
            </style>

            {{-- Star 1: Top-Left (Subtle) --}}
            <svg width="16" height="16" class="golden-star-blink absolute top-[7%] left-[4%] pointer-events-none z-10 text-amber-300" style="width: 16px; height: 16px; animation-duration: 2.4s; animation-delay: 0s;" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/>
            </svg>

            {{-- Star 2: Top-Center (Delicate) --}}
            <svg width="18" height="18" class="golden-star-blink absolute top-[6%] left-[42%] pointer-events-none z-10 text-yellow-300" style="width: 18px; height: 18px; animation-duration: 3.1s; animation-delay: 1.1s;" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/>
            </svg>

            {{-- Star 3: Upper-Right (Delicate sparkle) --}}
            <svg width="18" height="18" class="golden-star-blink absolute top-[10%] right-[14%] pointer-events-none z-10 text-amber-300" style="width: 18px; height: 18px; animation-duration: 2.7s; animation-delay: 0.5s;" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/>
            </svg>

            {{-- Star 4: Mid-Left --}}
            <svg width="14" height="14" class="golden-star-blink absolute top-[30%] left-[22%] pointer-events-none z-10 text-yellow-200" style="width: 14px; height: 14px; animation-duration: 3.4s; animation-delay: 1.8s;" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/>
            </svg>

            {{-- Star 5: Near Musical Note --}}
            <svg width="16" height="16" class="golden-star-blink absolute top-[16%] right-[25%] pointer-events-none z-10 text-amber-200" style="width: 16px; height: 16px; animation-duration: 2.8s; animation-delay: 0.9s;" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/>
            </svg>

            {{-- Star 6: Far-Right Edge --}}
            <svg width="16" height="16" class="golden-star-blink absolute top-[24%] right-[4%] pointer-events-none z-10 text-yellow-300" style="width: 16px; height: 16px; animation-duration: 2.9s; animation-delay: 2.2s;" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/>
            </svg>
        </div>

        <div class="w-full max-w-[100rem] mx-auto px-4 sm:px-6 lg:px-12 relative z-10 flex flex-col justify-between flex-1 gap-2.5 sm:gap-3.5">
            
            {{-- Top Banner Content --}}
            <div class="flex flex-col justify-center">
                <div class="flex items-center gap-3 mb-1.5">
                    <span class="text-[10px] sm:text-[11px] font-bold tracking-[0.2em] text-pink-300 uppercase">MADE FOR EVERY OCCASION</span>
                    <div class="h-px bg-pink-300/30 w-12 sm:w-16"></div>
                    <span class="text-pink-300 text-xs">♥</span>
                </div>
                <h2 class="font-display text-3xl sm:text-4xl lg:text-[2.6rem] xl:text-[2.9rem] text-white leading-[1.08] font-semibold">
                    For anyone,<br>
                    for any <span class="text-crimson-500 italic font-normal">reason.</span>
                </h2>
            </div>

            {{-- Bottom Carousel Content --}}
            <div class="w-full flex-1 flex flex-col justify-end">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-3 sm:gap-4 mb-2 sm:mb-3">
                    <div class="flex items-start gap-3">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-pink-900/30 flex items-center justify-center shrink-0 border border-pink-500/25 text-pink-300 text-xs mt-0.5">
                            ♥
                        </div>
                        <p class="text-white/80 text-sm sm:text-base max-w-xl font-normal sm:font-medium leading-snug">
                            Everyone deserves their own song — a birthday, a wedding, an apology, or a Tuesday afternoon.
                        </p>
                    </div>
                    <a href="{{ route('occasions') }}" class="inline-flex items-center gap-2 text-pink-300 text-xs sm:text-sm font-semibold hover:text-pink-200 transition group shrink-0">
                        Explore all occasions
                        <span class="w-5 h-5 sm:w-6 sm:h-6 rounded-full border border-pink-300/40 flex items-center justify-center group-hover:border-pink-300 transition">
                            <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </span>
                    </a>
                </div>

                {{-- Occasions Section Responsive Carousel / Accordion --}}
                <div class="w-full mt-2 flex-1 flex flex-col justify-end" x-data="{ activeItem: 4 }">
                    @php
                        $carouselOccasions = [
                            ['label' => "LOVERS", 'title' => "Lovers", 'img' => 'for_a_friend.png', 'icon' => '💕'],
                            ['label' => "ANNIVERSARY", 'title' => "Anniversary", 'img' => 'anniversary.png', 'icon' => '⭐'],
                            ['label' => "WEDDING", 'title' => "Wedding", 'img' => 'wedding.png', 'icon' => '💍'],
                            ['label' => "BIRTHDAY", 'title' => "Birthday", 'img' => 'and_more.png', 'icon' => '🎂'],
                            ['label' => "MOTHER'S DAY", 'title' => "Mother's Day", 'img' => 'mothers_day.png', 'icon' => '♥'],
                            ['label' => "FATHER'S DAY", 'title' => "Father's Day", 'img' => 'fathers_day.png', 'icon' => '🎁'],
                        ];
                    @endphp

                    {{-- MOBILE VIEW: Interactive Tabbed Occasion Showcase (< md) --}}
                    <div class="block md:hidden">
                        {{-- Occasion Selector Pills --}}
                        <div class="flex items-center gap-1.5 overflow-x-auto no-scrollbar touch-pan-x pb-3 mb-1">
                            @foreach($carouselOccasions as $index => $occ)
                                <button 
                                    type="button"
                                    @click="activeItem = {{ $index }}"
                                    class="px-3.5 py-1.5 rounded-full text-xs font-semibold whitespace-nowrap transition-all duration-200 shrink-0 flex items-center gap-1.5 border"
                                    :class="activeItem === {{ $index }} 
                                        ? 'bg-crimson-500 text-white border-crimson-500 shadow-md shadow-crimson-500/30 scale-102' 
                                        : 'bg-white/10 text-white/80 border-white/10 hover:bg-white/20'"
                                >
                                    <span>{{ $occ['icon'] }}</span>
                                    <span>{{ $occ['title'] }}</span>
                                </button>
                            @endforeach
                        </div>

                        {{-- Active Occasion Card Display --}}
                        <div class="relative w-full h-[320px] rounded-2xl overflow-hidden border border-white/15 shadow-2xl">
                            @foreach($carouselOccasions as $index => $occ)
                                <div 
                                    x-show="activeItem === {{ $index }}"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    class="absolute inset-0 flex flex-col justify-between p-5"
                                >
                                    {{-- Background Image --}}
                                    <img 
                                        src="{{ asset('images/' . $occ['img']) }}" 
                                        alt="{{ $occ['title'] }}" 
                                        class="absolute inset-0 w-full h-full object-cover"
                                    >
                                    {{-- Dark Vignette Gradient --}}
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-black/50"></div>

                                    {{-- Card Top Badge --}}
                                    <div class="relative z-10 self-start px-3 py-1 rounded-full bg-white/95 text-[11px] font-bold tracking-wider text-maroon-900 flex items-center gap-1.5 shadow-md">
                                        <span class="text-crimson-500">{{ $occ['icon'] }}</span>
                                        <span>{{ $occ['label'] }}</span>
                                    </div>

                                    {{-- Card Bottom Info & CTA --}}
                                    <div class="relative z-10 flex flex-col gap-3">
                                        <h3 class="font-display text-white text-2xl font-bold drop-shadow-md">
                                            {{ $occ['title'] }}
                                        </h3>
                                        <div class="flex items-center gap-3">
                                            <a 
                                                href="#start" 
                                                class="flex-1 py-3 px-5 rounded-full bg-gradient-to-r from-crimson-500 to-maroon-700 text-white font-semibold text-sm hover:brightness-105 transition-all text-center shadow-lg shadow-crimson-500/30 flex items-center justify-center gap-2"
                                            >
                                                <span>Make your {{ $occ['title'] }} song</span>
                                                <span>&rarr;</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Pagination Dots --}}
                        <div class="flex items-center justify-center gap-1.5 mt-3">
                            @foreach($carouselOccasions as $index => $occ)
                                <button 
                                    type="button" 
                                    @click="activeItem = {{ $index }}" 
                                    aria-label="View {{ $occ['title'] }}"
                                    class="h-1.5 rounded-full transition-all duration-300"
                                    :class="activeItem === {{ $index }} ? 'w-6 bg-crimson-500' : 'w-1.5 bg-white/30'"
                                ></button>
                            @endforeach
                        </div>
                    </div>

                    {{-- DESKTOP VIEW: Sleek 6-Slice Horizontal Accordion (>= md) --}}
                    <div class="hidden md:flex gap-2 md:gap-3.5 flex-1 w-full" style="height: clamp(340px, 58vh, 580px); min-height: 340px;">
                        @foreach($carouselOccasions as $index => $occ)
                            <div 
                                @mouseenter="activeItem = {{ $index }}"
                                @click="activeItem = {{ $index }}"
                                class="relative rounded-[1.25rem] sm:rounded-[1.5rem] overflow-hidden cursor-pointer transition-all duration-700 ease-[cubic-bezier(0.25,1,0.5,1)] group border border-white/10 shadow-lg"
                                :class="activeItem === {{ $index }} ? 'flex-[5]' : 'flex-[1]'"
                            >
                                <img src="{{ asset('images/' . $occ['img']) }}" class="absolute inset-0 w-full h-full object-cover transition duration-700" :class="activeItem === {{ $index }} ? 'scale-105' : 'scale-100 opacity-80'" alt="{{ $occ['title'] }}">
                                <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/10 to-black/90 transition-all duration-300" :class="activeItem === {{ $index }} ? 'opacity-100' : 'opacity-80'"></div>
                                
                                {{-- Active Content --}}
                                <div class="absolute inset-0 p-4 sm:p-5 flex flex-col justify-between transition-opacity duration-700 delay-100" :class="activeItem === {{ $index }} ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'">
                                    <div class="self-start px-2.5 py-1 rounded-full bg-white text-[10px] font-bold tracking-wider text-maroon-900 flex items-center gap-1.5 shadow-sm">
                                        <span class="text-crimson-500">{{ $occ['icon'] }}</span>
                                        {{ $occ['label'] }}
                                    </div>
                                    <div class="flex flex-col gap-1.5 sm:gap-2.5">
                                        <div class="flex items-end justify-between gap-1.5 sm:gap-2">
                                            <h3 class="font-display text-white text-lg sm:text-2xl lg:text-3xl shadow-sm whitespace-nowrap truncate">{{ $occ['title'] }}</h3>
                                            <a href="#start" class="px-3 py-1.5 sm:px-4 sm:py-2 rounded-full bg-white flex items-center justify-center text-maroon-900 font-semibold text-xs sm:text-sm hover:bg-pink-100 transition shrink-0 shadow-md">
                                                Make your song
                                            </a>
                                        </div>
                                        <div class="h-[2px] w-full bg-pink-300/60"></div>
                                    </div>
                                </div>

                                {{-- Inactive Content --}}
                                <div class="absolute inset-0 flex flex-col items-center justify-end pb-4 sm:pb-5 transition-opacity duration-300" :class="activeItem !== {{ $index }} ? 'opacity-100 z-10 delay-200' : 'opacity-0 z-0 pointer-events-none'">
                                    <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-black/40 backdrop-blur-sm flex items-center justify-center text-xs sm:text-sm shadow-sm mb-2.5 sm:mb-3 border border-white/20">
                                        {{ $occ['icon'] }}
                                    </div>
                                    <div style="writing-mode: vertical-rl;" class="rotate-180 font-display text-white/90 text-sm sm:text-base tracking-wider whitespace-nowrap">
                                        {{ $occ['title'] }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- How It Works Section --}}
    <section class="pt-8 pb-8 sm:pt-10 sm:pb-10 lg:pt-12 lg:pb-12 relative overflow-hidden bg-brand-light select-none" id="how-it-works">
        
        <div class="max-w-[100rem] mx-auto px-4 sm:px-6 lg:px-12 relative z-10 w-full">
            {{-- Header --}}
            <div class="text-center mb-6 sm:mb-7 lg:mb-8 flex flex-col items-center">
                
                
                <h2 class="font-display text-2xl sm:text-3xl lg:text-[38px] font-semibold text-maroon-900 mb-2 leading-tight">
                    <span class="relative inline-block">
                        How <span class="text-crimson-600">Heartgrams</span> Works
                        <span class="absolute -right-7 -top-1 text-pink-300 text-2xl font-sans font-light rotate-12">♡</span>
                    </span>
                </h2>
                
                <div class="flex items-center justify-center gap-3.5 mb-2">
                    <div class="h-px bg-pink-200 w-12"></div>
                    <span class="text-pink-400 text-xs">♥</span>
                    <div class="h-px bg-pink-200 w-12"></div>
                </div>
                
                <p class="text-[13.5px] sm:text-[14.5px] text-maroon-900/80 max-w-xl mx-auto font-medium">
                    Five simple steps from your story to a song they'll never forget.
                </p>

                {{-- Mobile Interactive Step Indicator & Navigator (< xl) --}}
                <div class="flex xl:hidden items-center justify-between w-full max-w-sm sm:max-w-md mx-auto mt-4 mb-2 px-3.5 py-2 rounded-2xl bg-white/80 backdrop-blur-md border border-pink-200/90 shadow-[0_4px_16px_rgba(234,76,112,0.08)] select-none">
                    {{-- Active Step Counter --}}
                    <div class="flex items-center gap-2">
                        <span class="relative flex h-2.5 w-2.5">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-crimson-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-crimson-600"></span>
                        </span>
                        <span class="text-[12px] font-bold text-maroon-950 tracking-wide">
                            Step <span id="hiwActiveStepNum" class="text-crimson-600 font-extrabold text-[13px]">1</span> of 5
                        </span>
                    </div>

                    {{-- Step Navigation: Prev, Pills [1][2][3][4][5], Next --}}
                    <div class="flex items-center gap-1.5">
                        <button 
                            type="button" 
                            onclick="navigateHiwStep(-1)" 
                            id="hiwPrevBtn"
                            class="w-7 h-7 rounded-full bg-pink-50 hover:bg-pink-100 text-maroon-800 disabled:opacity-30 disabled:pointer-events-none flex items-center justify-center text-sm font-bold transition-all border border-pink-200/70 shadow-2xs active:scale-95 cursor-pointer"
                            aria-label="Previous step"
                        >
                            ‹
                        </button>

                        <div class="flex items-center gap-1" id="hiwStepPills">
                            <button type="button" onclick="scrollToHiwStep(0)" class="hiw-nav-pill w-7 h-7 rounded-full text-xs font-bold transition-all flex items-center justify-center bg-gradient-to-r from-[#E11D48] to-[#FF4D7D] text-white shadow-xs scale-105 cursor-pointer" data-step="0">1</button>
                            <button type="button" onclick="scrollToHiwStep(1)" class="hiw-nav-pill w-7 h-7 rounded-full text-xs font-bold transition-all flex items-center justify-center bg-white text-maroon-800 border border-pink-200/80 hover:bg-pink-50 cursor-pointer" data-step="1">2</button>
                            <button type="button" onclick="scrollToHiwStep(2)" class="hiw-nav-pill w-7 h-7 rounded-full text-xs font-bold transition-all flex items-center justify-center bg-white text-maroon-800 border border-pink-200/80 hover:bg-pink-50 cursor-pointer" data-step="2">3</button>
                            <button type="button" onclick="scrollToHiwStep(3)" class="hiw-nav-pill w-7 h-7 rounded-full text-xs font-bold transition-all flex items-center justify-center bg-white text-maroon-800 border border-pink-200/80 hover:bg-pink-50 cursor-pointer" data-step="3">4</button>
                            <button type="button" onclick="scrollToHiwStep(4)" class="hiw-nav-pill w-7 h-7 rounded-full text-xs font-bold transition-all flex items-center justify-center bg-white text-maroon-800 border border-pink-200/80 hover:bg-pink-50 cursor-pointer" data-step="4">5</button>
                        </div>

                        <button 
                            type="button" 
                            onclick="navigateHiwStep(1)" 
                            id="hiwNextBtn"
                            class="w-7 h-7 rounded-full bg-pink-50 hover:bg-pink-100 text-maroon-800 disabled:opacity-30 disabled:pointer-events-none flex items-center justify-center text-sm font-bold transition-all border border-pink-200/70 shadow-2xs active:scale-95 cursor-pointer"
                            aria-label="Next step"
                        >
                            ›
                        </button>
                    </div>
                </div>
            </div>

            <div 
                x-data="heartgramJourney()" 
                id="howItWorksScrollWrapper"
                class="relative w-full max-w-[96rem] mx-auto z-20 overflow-x-auto overflow-y-hidden xl:overflow-visible pb-4 pt-2 no-scrollbar touch-pan-x snap-x snap-mandatory scroll-smooth -mx-4 px-4 sm:-mx-6 sm:px-6 xl:mx-0 xl:px-0"
            >
                <div class="min-w-[960px] sm:min-w-[1000px] xl:min-w-0 relative px-4 sm:px-6 xl:px-0">
                    
                    {{-- Continuous Sinusoidal Wave SVG across all 5 steps --}}
                    <svg class="absolute top-0 left-0 w-full h-[230px] pointer-events-none z-0" viewBox="0 0 1000 270" preserveAspectRatio="none" fill="none">
                        <defs>
                            <filter id="wave-glow" x="-50%" y="-50%" width="200%" height="200%">
                                <feGaussianBlur in="SourceGraphic" stdDeviation="3" result="blur1" />
                                <feGaussianBlur in="SourceGraphic" stdDeviation="6" result="blur2" />
                                <feMerge>
                                    <feMergeNode in="blur2" />
                                    <feMergeNode in="blur1" />
                                    <feMergeNode in="SourceGraphic" />
                                </feMerge>
                            </filter>
                        </defs>

                        {{-- The Smooth Connecting Wave Line (Base) --}}
                        <path id="heartgram-wave-path" d="M 0,160 C 35,163 65,166 100,168 C 170,172 230,204 300,204 C 370,204 430,148 500,148 C 570,148 630,204 700,204 C 770,204 830,172 900,172 C 940,172 970,165 1000,160" stroke="#E58B9E" stroke-width="1.6" vector-effect="non-scaling-stroke" />

                        {{-- Glowing Wave Trail (Follows behind particle) --}}
                        <path id="wave-trail" d="M 0,160 C 35,163 65,166 100,168 C 170,172 230,204 300,204 C 370,204 430,148 500,148 C 570,148 630,204 700,204 C 770,204 830,172 900,172 C 940,172 970,165 1000,160" stroke="#FF4D7D" stroke-width="3" stroke-linecap="round" fill="none" opacity="0" filter="url(#wave-glow)" vector-effect="non-scaling-stroke" />

                        {{-- Floating Delicate Outline Heart between Step 1 & 2 --}}
                        <path d="M 195,146 c -2.2,-1.8 -4.8,-3.8 -4.8,-6 a 2.8,2.8 0 0 1 4.6,-2 l .2,.2 .2,-.2 a 2.8,2.8 0 0 1 4.6,2 c 0,2.2 -2.6,4.2 -4.8,6 z" stroke="#F5A3B3" stroke-width="1.3" fill="none" opacity="0.85" transform="rotate(-8 195 146)" />

                        {{-- Floating Musical Note between Step 2 & 3 --}}
                        <text x="375" y="174" font-size="15" fill="#E88299" opacity="0.8" font-family="sans-serif">♪</text>

                        {{-- Floating Musical Note between Step 4 & 5 --}}
                        <text x="780" y="186" font-size="15" fill="#E88299" opacity="0.8" font-family="sans-serif">♪</text>

                        {{-- Floating Delicate Outline Heart past Step 5 --}}
                        <path d="M 965,190 c -2.2,-1.8 -4.8,-3.8 -4.8,-6 a 2.8,2.8 0 0 1 4.6,-2 l .2,.2 .2,-.2 a 2.8,2.8 0 0 1 4.6,2 c 0,2.2 -2.6,4.2 -4.8,6 z" stroke="#F5A3B3" stroke-width="1.3" fill="none" opacity="0.85" transform="rotate(10 965 190)" />

                        {{-- Moving Glowing Particle Group --}}
                        <g id="wave-particle-group" class="pointer-events-none transition-opacity duration-300" style="opacity: 0;">
                            <circle cx="0" cy="0" r="15" fill="#FF4D7D" opacity="0.25" filter="url(#wave-glow)" />
                            <circle cx="0" cy="0" r="8" fill="#FF4D7D" opacity="0.6" />
                            <circle cx="0" cy="0" r="3.5" fill="#FFFFFF" stroke="#E11D48" stroke-width="1.5" />
                            <path d="M 0,-5.5 L 0,5.5 M -5.5,0 L 5.5,0" stroke="#FFFFFF" stroke-width="1.2" opacity="0.95" />
                        </g>
                    </svg>

                    {{-- 5 Steps Horizontal Wave Grid --}}
                    <div class="grid grid-cols-5 gap-4 lg:gap-6 relative z-10">
                        
                        {{-- Step 1 --}}
                        <div 
                            onclick="scrollToHiwStep(0)"
                            class="hiw-step-col snap-center flex flex-col items-center text-center group cursor-pointer px-1.5 transition-transform duration-300"
                            data-step="0"
                        >
                            {{-- Number --}}
                            <div class="h-[74px] sm:h-[80px] lg:h-[84px] flex items-center justify-center">
                                <span 
                                    class="font-display text-[3.8rem] sm:text-[4.5rem] lg:text-[5.2rem] font-bold leading-none tracking-tight select-none transition-all duration-700 bg-clip-text text-transparent"
                                    :class="completedSteps >= 1 
                                        ? 'bg-gradient-to-b from-[#EA4C70] via-[#F0728F] to-[#F8AAB9] opacity-100 scale-100 drop-shadow-[0_4px_16px_rgba(234,76,112,0.25)]' 
                                        : 'bg-gradient-to-b from-[#F7B6C4] via-[#FAD0D9] to-[#FDE8EE] opacity-90 scale-95'"
                                >
                                    01
                                </span>
                            </div>
                            
                            {{-- Wave Offset Wrapper --}}
                            <div class="mt-1 flex flex-col items-center">
                                {{-- Icon: Heart with radiant rays --}}
                                <div 
                                    class="h-[34px] flex items-center justify-center mb-1 text-[#9E2A4B] transition-all duration-700 group-hover:scale-110 group-hover:text-crimson-600"
                                    :class="completedSteps >= 1 ? 'scale-100 opacity-100' : 'scale-95 opacity-85'"
                                >
                                    <svg class="w-8 h-8" viewBox="0 0 44 44" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 30.5c-4.2-3.3-9-7.5-9-12a5 5 0 0 1 8.5-3.5L22 15.5l.5-.5a5 5 0 0 1 8.5 3.5c0 4.5-4.8 8.7-9 12z" />
                                        <line x1="10" y1="14" x2="7" y2="12" />
                                        <line x1="7" y1="19" x2="4" y2="19" />
                                        <line x1="10" y1="24" x2="7" y2="26" />
                                        <line x1="34" y1="14" x2="37" y2="12" />
                                        <line x1="37" y1="19" x2="40" y2="19" />
                                        <line x1="34" y1="24" x2="37" y2="26" />
                                    </svg>
                                </div>

                                {{-- Node on the Wave --}}
                                <div 
                                    class="relative z-10 w-4.5 h-4.5 rounded-full bg-white flex items-center justify-center my-1.5 transition-all duration-700"
                                    :class="activePulseNode === 1 
                                        ? 'border-2 border-[#E11D48] ring-4 ring-[#FF4D7D]/40 shadow-[0_0_15px_rgba(255,77,125,0.8)] scale-125 opacity-100' 
                                        : (completedSteps >= 1 
                                            ? 'border-2 border-[#ECA1B3] shadow-sm scale-100 opacity-100 group-hover:border-crimson-500 group-hover:scale-110' 
                                            : 'border-2 border-[#ECA1B3]/70 opacity-80 shadow-none scale-95')"
                                >
                                    <div 
                                        class="w-1.5 h-1.5 rounded-full transition-all duration-700"
                                        :class="activePulseNode === 1 ? 'bg-[#E11D48] scale-110 animate-pulse' : (completedSteps >= 1 ? 'bg-[#C83254]' : 'bg-[#C83254]/60')"
                                    ></div>
                                </div>

                                {{-- Step Badge --}}
                                <span 
                                    class="inline-flex items-center px-3 py-0.5 rounded-full text-[10px] sm:text-[10.5px] tracking-[0.14em] uppercase mb-2 transition-all duration-700 font-bold bg-[#FCE8ED] text-[#9E2A4B] border border-pink-200/60 shadow-sm group-hover:bg-pink-100"
                                    :class="completedSteps >= 1 ? 'opacity-100' : 'opacity-85'"
                                >
                                    STEP 1
                                </span>

                                {{-- Description Text --}}
                                <p 
                                    class="font-display text-[13px] sm:text-[14px] lg:text-[15px] leading-[1.3] text-center max-w-[190px] text-[#3D141E] transition-all duration-700 group-hover:text-black"
                                    :class="completedSteps >= 1 ? 'opacity-100 font-semibold' : 'opacity-85 font-medium'"
                                >
                                    Choose your<br class="hidden sm:inline"> emotion or<br class="hidden sm:inline"> occasion.
                                </p>
                            </div>
                        </div>

                        {{-- Step 2 --}}
                        <div 
                            onclick="scrollToHiwStep(1)"
                            class="hiw-step-col snap-center flex flex-col items-center text-center group cursor-pointer px-1.5 transition-transform duration-300"
                            data-step="1"
                        >
                            {{-- Number --}}
                            <div class="h-[74px] sm:h-[80px] lg:h-[84px] flex items-center justify-center">
                                <span 
                                    class="font-display text-[3.8rem] sm:text-[4.5rem] lg:text-[5.2rem] font-bold leading-none tracking-tight select-none transition-all duration-700 bg-clip-text text-transparent"
                                    :class="completedSteps >= 2 
                                        ? 'bg-gradient-to-b from-[#EA4C70] via-[#F0728F] to-[#F8AAB9] opacity-100 scale-100 drop-shadow-[0_4px_16px_rgba(234,76,112,0.25)]' 
                                        : 'bg-gradient-to-b from-[#F7B6C4] via-[#FAD0D9] to-[#FDE8EE] opacity-90 scale-95'"
                                >
                                    02
                                </span>
                            </div>

                            {{-- Wave Offset Wrapper (Dips Lower) --}}
                            <div class="mt-7 sm:mt-8 flex flex-col items-center">
                                {{-- Icon: Notepad with pen & heart --}}
                                <div 
                                    class="h-[34px] flex items-center justify-center mb-1 text-[#9E2A4B] transition-all duration-700 group-hover:scale-110 group-hover:text-crimson-600"
                                    :class="completedSteps >= 2 ? 'scale-100 opacity-100' : 'scale-95 opacity-85'"
                                >
                                    <svg class="w-8 h-8" viewBox="0 0 44 44" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="11" y="9" width="18" height="25" rx="2.5" />
                                        <line x1="15" y1="14" x2="23" y2="14" />
                                        <line x1="15" y1="18.5" x2="21" y2="18.5" />
                                        <path d="M16 27.5c-.8-.7-1.8-1.5-1.8-2.3a1.1 1.1 0 0 1 1.9-.8l.2.2.2-.2a1.1 1.1 0 0 1 1.9.8c0 .8-1 1.6-1.8 2.3z" stroke-width="1.3" />
                                        <path d="M30 10l3 3-9 9-3 1 1-3 8-10z" />
                                    </svg>
                                </div>

                                {{-- Node on the Wave --}}
                                <div 
                                    class="relative z-10 w-4.5 h-4.5 rounded-full bg-white flex items-center justify-center my-1.5 transition-all duration-700"
                                    :class="activePulseNode === 2 
                                        ? 'border-2 border-[#E11D48] ring-4 ring-[#FF4D7D]/40 shadow-[0_0_15px_rgba(255,77,125,0.8)] scale-125 opacity-100' 
                                        : (completedSteps >= 2 
                                            ? 'border-2 border-[#ECA1B3] shadow-sm scale-100 opacity-100 group-hover:border-crimson-500 group-hover:scale-110' 
                                            : 'border-2 border-[#ECA1B3]/70 opacity-80 shadow-none scale-95')"
                                >
                                    <div 
                                        class="w-1.5 h-1.5 rounded-full transition-all duration-700"
                                        :class="activePulseNode === 2 ? 'bg-[#E11D48] scale-110 animate-pulse' : (completedSteps >= 2 ? 'bg-[#C83254]' : 'bg-[#C83254]/60')"
                                    ></div>
                                </div>

                                {{-- Step Badge --}}
                                <span 
                                    class="inline-flex items-center px-3 py-0.5 rounded-full text-[10px] sm:text-[10.5px] tracking-[0.14em] uppercase mb-2 transition-all duration-700 font-bold bg-[#FCE8ED] text-[#9E2A4B] border border-pink-200/60 shadow-sm group-hover:bg-pink-100"
                                    :class="completedSteps >= 2 ? 'opacity-100' : 'opacity-85'"
                                >
                                    STEP 2
                                </span>

                                {{-- Description Text --}}
                                <p 
                                    class="font-display text-[13px] sm:text-[14px] lg:text-[15px] leading-[1.3] text-center max-w-[195px] text-[#3D141E] transition-all duration-700 group-hover:text-black"
                                    :class="completedSteps >= 2 ? 'opacity-100 font-semibold' : 'opacity-85 font-medium'"
                                >
                                    Create Your Song –<br class="hidden sm:inline"> Fill Your<br class="hidden sm:inline"> Heartgram Story.
                                </p>
                            </div>
                        </div>

                        {{-- Step 3 --}}
                        <div 
                            onclick="scrollToHiwStep(2)"
                            class="hiw-step-col snap-center flex flex-col items-center text-center group cursor-pointer px-1.5 transition-transform duration-300"
                            data-step="2"
                        >
                            {{-- Number --}}
                            <div class="h-[74px] sm:h-[80px] lg:h-[84px] flex items-center justify-center">
                                <span 
                                    class="font-display text-[3.8rem] sm:text-[4.5rem] lg:text-[5.2rem] font-bold leading-none tracking-tight select-none transition-all duration-700 bg-clip-text text-transparent"
                                    :class="completedSteps >= 3 
                                        ? 'bg-gradient-to-b from-[#EA4C70] via-[#F0728F] to-[#F8AAB9] opacity-100 scale-100 drop-shadow-[0_4px_16px_rgba(234,76,112,0.25)]' 
                                        : 'bg-gradient-to-b from-[#F7B6C4] via-[#FAD0D9] to-[#FDE8EE] opacity-90 scale-95'"
                                >
                                    03
                                </span>
                            </div>

                            {{-- Wave Offset Wrapper (Peaks Higher) --}}
                            <div class="-mt-3 flex flex-col items-center">
                                {{-- Icon: Musical eighth notes with sparkles --}}
                                <div 
                                    class="h-[34px] flex items-center justify-center mb-1 text-[#9E2A4B] transition-all duration-700 group-hover:scale-110 group-hover:text-crimson-600"
                                    :class="completedSteps >= 3 ? 'scale-100 opacity-100' : 'scale-95 opacity-85'"
                                >
                                    <svg class="w-8 h-8" viewBox="0 0 44 44" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                        <ellipse cx="18" cy="28.5" rx="3.2" ry="2.2" transform="rotate(-15 18 28.5)" fill="currentColor" stroke="none" />
                                        <ellipse cx="27" cy="24.5" rx="3.2" ry="2.2" transform="rotate(-15 27 24.5)" fill="currentColor" stroke="none" />
                                        <line x1="20.8" y1="27.5" x2="20.8" y2="14" />
                                        <line x1="29.8" y1="23.5" x2="29.8" y2="10" />
                                        <polygon points="20.8,14 29.8,10 29.8,13.5 20.8,17.5" fill="currentColor" stroke="none" />
                                        <path d="M11 16v-3m-1.5 1.5h3" stroke-width="1.5" />
                                        <path d="M33 16v-3m-1.5 1.5h3" stroke-width="1.5" />
                                        <circle cx="12" cy="25" r="0.8" fill="currentColor" stroke="none" />
                                    </svg>
                                </div>

                                {{-- Node on the Wave --}}
                                <div 
                                    class="relative z-10 w-4.5 h-4.5 rounded-full bg-white flex items-center justify-center my-1.5 transition-all duration-700"
                                    :class="activePulseNode === 3 
                                        ? 'border-2 border-[#E11D48] ring-4 ring-[#FF4D7D]/40 shadow-[0_0_15px_rgba(255,77,125,0.8)] scale-125 opacity-100' 
                                        : (completedSteps >= 3 
                                            ? 'border-2 border-[#ECA1B3] shadow-sm scale-100 opacity-100 group-hover:border-crimson-500 group-hover:scale-110' 
                                            : 'border-2 border-[#ECA1B3]/70 opacity-80 shadow-none scale-95')"
                                >
                                    <div 
                                        class="w-1.5 h-1.5 rounded-full transition-all duration-700"
                                        :class="activePulseNode === 3 ? 'bg-[#E11D48] scale-110 animate-pulse' : (completedSteps >= 3 ? 'bg-[#C83254]' : 'bg-[#C83254]/60')"
                                    ></div>
                                </div>

                                {{-- Step Badge --}}
                                <span 
                                    class="inline-flex items-center px-3 py-0.5 rounded-full text-[10px] sm:text-[10.5px] tracking-[0.14em] uppercase mb-2 transition-all duration-700 font-bold bg-[#FCE8ED] text-[#9E2A4B] border border-pink-200/60 shadow-sm group-hover:bg-pink-100"
                                    :class="completedSteps >= 3 ? 'opacity-100' : 'opacity-85'"
                                >
                                    STEP 3
                                </span>

                                {{-- Description Text --}}
                                <p 
                                    class="font-display text-[12.5px] sm:text-[13.5px] lg:text-[14.5px] leading-[1.3] text-center max-w-[200px] text-[#3D141E] transition-all duration-700 group-hover:text-black"
                                    :class="completedSteps >= 3 ? 'opacity-100 font-semibold' : 'opacity-85 font-medium'"
                                >
                                    Your personalized<br class="hidden sm:inline"> Heartgram song<br class="hidden sm:inline"> will be composed<br class="hidden sm:inline"> and delivered<br class="hidden sm:inline"> within 2 – 5 days.
                                </p>
                            </div>
                        </div>

                        {{-- Step 4 --}}
                        <div 
                            onclick="scrollToHiwStep(3)"
                            class="hiw-step-col snap-center flex flex-col items-center text-center group cursor-pointer px-1.5 transition-transform duration-300"
                            data-step="3"
                        >
                            {{-- Number --}}
                            <div class="h-[74px] sm:h-[80px] lg:h-[84px] flex items-center justify-center">
                                <span 
                                    class="font-display text-[3.8rem] sm:text-[4.5rem] lg:text-[5.2rem] font-bold leading-none tracking-tight select-none transition-all duration-700 bg-clip-text text-transparent"
                                    :class="completedSteps >= 4 
                                        ? 'bg-gradient-to-b from-[#EA4C70] via-[#F0728F] to-[#F8AAB9] opacity-100 scale-100 drop-shadow-[0_4px_16px_rgba(234,76,112,0.25)]' 
                                        : 'bg-gradient-to-b from-[#F7B6C4] via-[#FAD0D9] to-[#FDE8EE] opacity-90 scale-95'"
                                >
                                    04
                                </span>
                            </div>

                            {{-- Wave Offset Wrapper (Dips Lower) --}}
                            <div class="mt-7 sm:mt-8 flex flex-col items-center">
                                {{-- Icon: Mail delivery envelope with speed lines & heart --}}
                                <div 
                                    class="h-[34px] flex items-center justify-center mb-1 text-[#9E2A4B] transition-all duration-700 group-hover:scale-110 group-hover:text-crimson-600"
                                    :class="completedSteps >= 4 ? 'scale-100 opacity-100' : 'scale-95 opacity-85'"
                                >
                                    <svg class="w-9 h-8" viewBox="0 0 48 44" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="7" y1="17" x2="12" y2="17" />
                                        <line x1="5" y1="22" x2="11" y2="22" />
                                        <line x1="7" y1="27" x2="12" y2="27" />
                                        <rect x="14" y="14" width="24" height="17" rx="2" />
                                        <path d="M14 15.5l12 8.5 12-8.5" />
                                        <path d="M26 24.5c-1-.9-2.2-2-2.2-3a1.4 1.4 0 0 1 2.4-.9l.2.2.2-.2a1.4 1.4 0 0 1 2.4.9c0 1-1.2 2.1-2.2 3z" fill="#C83254" stroke="#C83254" stroke-width="0.5" />
                                    </svg>
                                </div>

                                {{-- Node on the Wave --}}
                                <div 
                                    class="relative z-10 w-4.5 h-4.5 rounded-full bg-white flex items-center justify-center my-1.5 transition-all duration-700"
                                    :class="activePulseNode === 4 
                                        ? 'border-2 border-[#E11D48] ring-4 ring-[#FF4D7D]/40 shadow-[0_0_15px_rgba(255,77,125,0.8)] scale-125 opacity-100' 
                                        : (completedSteps >= 4 
                                            ? 'border-2 border-[#ECA1B3] shadow-sm scale-100 opacity-100 group-hover:border-crimson-500 group-hover:scale-110' 
                                            : 'border-2 border-[#ECA1B3]/70 opacity-80 shadow-none scale-95')"
                                >
                                    <div 
                                        class="w-1.5 h-1.5 rounded-full transition-all duration-700"
                                        :class="activePulseNode === 4 ? 'bg-[#E11D48] scale-110 animate-pulse' : (completedSteps >= 4 ? 'bg-[#C83254]' : 'bg-[#C83254]/60')"
                                    ></div>
                                </div>

                                {{-- Step Badge --}}
                                <span 
                                    class="inline-flex items-center px-3 py-0.5 rounded-full text-[10px] sm:text-[10.5px] tracking-[0.14em] uppercase mb-2 transition-all duration-700 font-bold bg-[#FCE8ED] text-[#9E2A4B] border border-pink-200/60 shadow-sm group-hover:bg-pink-100"
                                    :class="completedSteps >= 4 ? 'opacity-100' : 'opacity-85'"
                                >
                                    STEP 4
                                </span>

                                {{-- Description Text --}}
                                <p 
                                    class="font-display text-[13px] sm:text-[14px] lg:text-[15px] leading-[1.3] text-center max-w-[190px] text-[#3D141E] transition-all duration-700 group-hover:text-black"
                                    :class="completedSteps >= 4 ? 'opacity-100 font-semibold' : 'opacity-85 font-medium'"
                                >
                                    Sound Delivery<br class="hidden sm:inline"> Through Mail.
                                </p>
                            </div>
                        </div>

                        {{-- Step 5 --}}
                        <div 
                            onclick="scrollToHiwStep(4)"
                            class="hiw-step-col snap-center flex flex-col items-center text-center group cursor-pointer px-1.5 transition-transform duration-300"
                            data-step="4"
                        >
                            {{-- Number --}}
                            <div class="h-[74px] sm:h-[80px] lg:h-[84px] flex items-center justify-center">
                                <span 
                                    class="font-display text-[3.8rem] sm:text-[4.5rem] lg:text-[5.2rem] font-bold leading-none tracking-tight select-none transition-all duration-700 bg-clip-text text-transparent"
                                    :class="completedSteps >= 5 
                                        ? 'bg-gradient-to-b from-[#EA4C70] via-[#F0728F] to-[#F8AAB9] opacity-100 scale-100 drop-shadow-[0_4px_16px_rgba(234,76,112,0.25)]' 
                                        : 'bg-gradient-to-b from-[#F7B6C4] via-[#FAD0D9] to-[#FDE8EE] opacity-90 scale-95'"
                                >
                                    05
                                </span>
                            </div>

                            {{-- Wave Offset Wrapper --}}
                            <div class="mt-1.5 flex flex-col items-center">
                                {{-- Icon: Party popper with celebration hearts --}}
                                <div 
                                    class="h-[34px] flex items-center justify-center mb-1 text-[#9E2A4B] transition-all duration-700 group-hover:scale-110 group-hover:text-crimson-600"
                                    :class="completedSteps >= 5 ? 'scale-100 opacity-100' : 'scale-95 opacity-85'"
                                >
                                    <svg class="w-8 h-8" viewBox="0 0 44 44" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 32l13-5.5-5.5-13-7.5 18.5z" />
                                        <line x1="17" y1="24.5" x2="21.5" y2="26.5" />
                                        <line x1="15.5" y1="28" x2="20" y2="30" />
                                        <path d="M25 12c-.7-.6-1.5-1.3-1.5-2a1 1 0 0 1 1.7-.6l.1.1.1-.1a1 1 0 0 1 1.7.6c0 .7-.8 1.4-1.5 2z" stroke-width="1.3" />
                                        <path d="M33 16.5c-.7-.6-1.5-1.3-1.5-2a1 1 0 0 1 1.7-.6l.1.1.1-.1a1 1 0 0 1 1.7.6c0 .7-.8 1.4-1.5 2z" stroke-width="1.3" />
                                        <line x1="21" y1="10" x2="22.5" y2="8" />
                                        <line x1="30" y1="21.5" x2="33" y2="22.5" />
                                        <circle cx="31" cy="9.5" r="0.75" fill="currentColor" stroke="none" />
                                    </svg>
                                </div>

                                {{-- Node on the Wave --}}
                                <div 
                                    class="relative z-10 w-4.5 h-4.5 rounded-full bg-white flex items-center justify-center my-1.5 transition-all duration-700"
                                    :class="activePulseNode === 5 
                                        ? 'border-2 border-[#E11D48] ring-4 ring-[#FF4D7D]/40 shadow-[0_0_15px_rgba(255,77,125,0.8)] scale-125 opacity-100' 
                                        : (completedSteps >= 5 
                                            ? 'border-2 border-[#ECA1B3] shadow-sm scale-100 opacity-100 group-hover:border-crimson-500 group-hover:scale-110' 
                                            : 'border-2 border-[#ECA1B3]/70 opacity-80 shadow-none scale-95')"
                                >
                                    <div 
                                        class="w-1.5 h-1.5 rounded-full transition-all duration-700"
                                        :class="activePulseNode === 5 ? 'bg-[#E11D48] scale-110 animate-pulse' : (completedSteps >= 5 ? 'bg-[#C83254]' : 'bg-[#C83254]/60')"
                                    ></div>
                                </div>

                                {{-- Step Badge --}}
                                <span 
                                    class="inline-flex items-center px-3 py-0.5 rounded-full text-[10px] sm:text-[10.5px] tracking-[0.14em] uppercase mb-2 transition-all duration-700 font-bold bg-[#FCE8ED] text-[#9E2A4B] border border-pink-200/60 shadow-sm group-hover:bg-pink-100"
                                    :class="completedSteps >= 5 ? 'opacity-100' : 'opacity-85'"
                                >
                                    STEP 5
                                </span>

                                {{-- Description Text --}}
                                <p 
                                    class="font-display text-[13px] sm:text-[14px] lg:text-[15px] leading-[1.3] text-center max-w-[190px] text-[#3D141E] transition-all duration-700 group-hover:text-black"
                                    :class="completedSteps >= 5 ? 'opacity-100 font-semibold' : 'opacity-85 font-medium'"
                                >
                                    Celebrate Your<br class="hidden sm:inline"> Heartgram<br class="hidden sm:inline"> Moment/Story.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Script for Heartgram Wave Journey Animation --}}
            <script>
                (function() {
                    function registerHeartgramJourney() {
                        if (typeof Alpine === 'undefined') return;
                        
                        Alpine.data('heartgramJourney', () => ({
                            completedSteps: 0,
                            activePulseNode: 0,
                            hasStarted: false,
                            animDone: false,
                            animFrameId: null,

                            init() {
                                // If user prefers reduced motion, show completed state immediately
                                if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                                    this.completedSteps = 5;
                                    this.animDone = true;
                                    return;
                                }

                                this.$nextTick(() => {
                                    const el = this.$el;
                                    // Trigger when section scrolls into view
                                    const observer = new IntersectionObserver((entries) => {
                                        entries.forEach(entry => {
                                            if (entry.isIntersecting && !this.hasStarted) {
                                                this.hasStarted = true;
                                                this.startWaveJourney();
                                                observer.disconnect();
                                            }
                                        });
                                    }, { threshold: 0.25 });

                                    observer.observe(el);
                                });
                            },

                            startWaveJourney() {
                                const wavePath = document.getElementById('heartgram-wave-path');
                                const particleGroup = document.getElementById('wave-particle-group');
                                const waveTrail = document.getElementById('wave-trail');
                                if (!wavePath || !particleGroup) {
                                    this.completedSteps = 5;
                                    return;
                                }

                                const totalLength = wavePath.getTotalLength();

                                // Binary search to find length along path for target X coordinate
                                const getLengthAtX = (targetX) => {
                                    let low = 0;
                                    let high = totalLength;
                                    for (let i = 0; i < 40; i++) {
                                        const mid = (low + high) / 2;
                                        const pt = wavePath.getPointAtLength(mid);
                                        if (pt.x < targetX) {
                                            low = mid;
                                        } else {
                                            high = mid;
                                        }
                                    }
                                    return (low + high) / 2;
                                };

                                const nodeX = [100, 300, 500, 700, 900];
                                const nodeLengths = nodeX.map(x => getLengthAtX(x));

                                // Continuous looping timeline:
                                // 1. Enter from x=0 to Node 1
                                // 2. Cross Node 1: Step 1 active
                                // 3. Move Node 1 -> Node 2
                                // 4. Cross Node 2: Step 2 active
                                // 5. Move Node 2 -> Node 3
                                // 6. Cross Node 3: Step 3 active
                                // 7. Move Node 3 -> Node 4
                                // 8. Cross Node 4: Step 4 active
                                // 9. Move Node 4 -> Node 5
                                // 10. Cross Node 5: Step 5 active (all 5 illuminated)
                                // 11. Exit & fade particle/trail to end of path
                                // 12. Hold for 5 seconds (5000ms) with all 5 steps illuminated
                                // 13. Smooth reset back to initial state, ready for next iteration
                                const stages = [
                                    { type: 'enter', fromL: 0, toL: nodeLengths[0], duration: 600 },
                                    { type: 'cross', step: 1, length: nodeLengths[0], duration: 450 },
                                    { type: 'move', fromL: nodeLengths[0], toL: nodeLengths[1], duration: 1050 },
                                    { type: 'cross', step: 2, length: nodeLengths[1], duration: 450 },
                                    { type: 'move', fromL: nodeLengths[1], toL: nodeLengths[2], duration: 1050 },
                                    { type: 'cross', step: 3, length: nodeLengths[2], duration: 450 },
                                    { type: 'move', fromL: nodeLengths[2], toL: nodeLengths[3], duration: 1050 },
                                    { type: 'cross', step: 4, length: nodeLengths[3], duration: 450 },
                                    { type: 'move', fromL: nodeLengths[3], toL: nodeLengths[4], duration: 1050 },
                                    { type: 'cross', step: 5, length: nodeLengths[4], duration: 600 },
                                    { type: 'exit', fromL: nodeLengths[4], toL: totalLength, duration: 600 },
                                    { type: 'hold', duration: 5000 }, // Finished: hold all 5 steps illuminated for 5 seconds
                                    { type: 'reset', duration: 400 }  // Brief smooth reset before next cycle begins
                                ];

                                const totalDuration = stages.reduce((acc, s) => acc + s.duration, 0);
                                const easeInOutCubic = (t) => t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2;

                                let startTime = null;

                                const render = (now) => {
                                    if (!startTime) startTime = now;
                                    const elapsed = (now - startTime) % totalDuration;

                                    let accumulated = 0;
                                    let currentStage = stages[0];
                                    let stageElapsed = 0;

                                    for (let i = 0; i < stages.length; i++) {
                                        if (elapsed >= accumulated && elapsed < accumulated + stages[i].duration) {
                                            currentStage = stages[i];
                                            stageElapsed = elapsed - accumulated;
                                            break;
                                        }
                                        accumulated += stages[i].duration;
                                    }

                                    const progress = easeInOutCubic(Math.min(1, Math.max(0, stageElapsed / currentStage.duration)));

                                    if (currentStage.type === 'enter') {
                                        this.completedSteps = 0;
                                        this.activePulseNode = 0;
                                        const currentL = currentStage.fromL + (currentStage.toL - currentStage.fromL) * progress;
                                        const pt = wavePath.getPointAtLength(currentL);
                                        particleGroup.setAttribute('transform', `translate(${pt.x}, ${pt.y})`);
                                        particleGroup.style.opacity = '1';

                                        if (waveTrail) {
                                            const trailLen = 50;
                                            const startL = Math.max(0, currentL - trailLen);
                                            waveTrail.style.strokeDasharray = `${currentL - startL} ${totalLength}`;
                                            waveTrail.style.strokeDashoffset = `${-startL}`;
                                            waveTrail.style.opacity = '0.85';
                                        }
                                        if (typeof updateHiwUI === 'function') updateHiwUI(0, false);
                                    } else if (currentStage.type === 'cross') {
                                        this.completedSteps = currentStage.step;
                                        this.activePulseNode = currentStage.step;

                                        const pt = wavePath.getPointAtLength(currentStage.length);
                                        particleGroup.setAttribute('transform', `translate(${pt.x}, ${pt.y})`);
                                        particleGroup.style.opacity = '1';
                                        if (waveTrail) waveTrail.style.opacity = '0';
                                        if (typeof updateHiwUI === 'function') updateHiwUI(currentStage.step - 1, false);
                                    } else if (currentStage.type === 'move') {
                                        this.activePulseNode = 0;
                                        const prevStep = stages.filter(s => s.type === 'cross' && s.length <= currentStage.fromL).pop();
                                        this.completedSteps = prevStep ? prevStep.step : 1;

                                        const currentL = currentStage.fromL + (currentStage.toL - currentStage.fromL) * progress;
                                        const pt = wavePath.getPointAtLength(currentL);
                                        particleGroup.setAttribute('transform', `translate(${pt.x}, ${pt.y})`);
                                        particleGroup.style.opacity = '1';

                                        // Glowing trail follows particle
                                        if (waveTrail) {
                                            const trailLen = 70;
                                            const startL = Math.max(0, currentL - trailLen);
                                            waveTrail.style.strokeDasharray = `${currentL - startL} ${totalLength}`;
                                            waveTrail.style.strokeDashoffset = `${-startL}`;
                                            waveTrail.style.opacity = '0.9';
                                        }
                                    } else if (currentStage.type === 'exit') {
                                        this.completedSteps = 5;
                                        this.activePulseNode = 0;
                                        const currentL = currentStage.fromL + (currentStage.toL - currentStage.fromL) * progress;
                                        const pt = wavePath.getPointAtLength(currentL);
                                        particleGroup.setAttribute('transform', `translate(${pt.x}, ${pt.y})`);

                                        const fade = 1 - progress;
                                        particleGroup.style.opacity = String(Math.max(0, fade));

                                        if (waveTrail) {
                                            const trailLen = 60 * fade;
                                            const startL = Math.max(0, currentL - trailLen);
                                            waveTrail.style.strokeDasharray = `${currentL - startL} ${totalLength}`;
                                            waveTrail.style.strokeDashoffset = `${-startL}`;
                                            waveTrail.style.opacity = String(fade * 0.85);
                                        }
                                    } else if (currentStage.type === 'hold') {
                                        // Once finished: all 5 steps remain illuminated for 5 seconds
                                        this.completedSteps = 5;
                                        this.activePulseNode = 0;
                                        particleGroup.style.opacity = '0';
                                        if (waveTrail) waveTrail.style.opacity = '0';
                                    } else if (currentStage.type === 'reset') {
                                        // Smooth reset back to initial dim state before next iteration begins
                                        this.completedSteps = 0;
                                        this.activePulseNode = 0;
                                        particleGroup.style.opacity = '0';
                                        if (waveTrail) waveTrail.style.opacity = '0';
                                        if (typeof updateHiwUI === 'function') updateHiwUI(0, false);
                                    }

                                    this.animFrameId = requestAnimationFrame(render);
                                };

                                this.animFrameId = requestAnimationFrame(render);

                                // Tab switching handling
                                document.addEventListener('visibilitychange', () => {
                                    if (document.hidden) {
                                        if (this.animFrameId) {
                                            cancelAnimationFrame(this.animFrameId);
                                            this.animFrameId = null;
                                        }
                                    } else {
                                        if (this.hasStarted && !this.animFrameId) {
                                            this.animFrameId = requestAnimationFrame(render);
                                        }
                                    }
                                });
                            }
                        }));
                    }

                    if (window.Alpine) {
                        registerHeartgramJourney();
                    } else {
                        document.addEventListener('alpine:init', registerHeartgramJourney);
                    }

                    // Mobile Step Navigator & Touch Sync
                    let currentHiwStep = 0;

                    function updateHiwUI(activeIdx, updateCompletedSteps = true) {
                        currentHiwStep = activeIdx;
                        const pills = document.querySelectorAll('.hiw-nav-pill');
                        pills.forEach((p, idx) => {
                            if (idx === activeIdx) {
                                p.className = 'hiw-nav-pill w-7 h-7 rounded-full text-xs font-bold transition-all flex items-center justify-center bg-gradient-to-r from-[#E11D48] to-[#FF4D7D] text-white shadow-xs scale-105 cursor-pointer';
                            } else {
                                p.className = 'hiw-nav-pill w-7 h-7 rounded-full text-xs font-bold transition-all flex items-center justify-center bg-white text-maroon-800 border border-pink-200/80 hover:bg-pink-50 cursor-pointer';
                            }
                        });

                        const stepNumEl = document.getElementById('hiwActiveStepNum');
                        if (stepNumEl) stepNumEl.textContent = activeIdx + 1;

                        const prevBtn = document.getElementById('hiwPrevBtn');
                        const nextBtn = document.getElementById('hiwNextBtn');
                        if (prevBtn) prevBtn.disabled = (activeIdx === 0);
                        if (nextBtn) nextBtn.disabled = (activeIdx === 4);

                        // If Alpine journey component is active, light up the steps up to activeIdx + 1
                        if (updateCompletedSteps) {
                            const journeyEl = document.getElementById('howItWorksScrollWrapper');
                            if (journeyEl && journeyEl._x_dataStack && journeyEl._x_dataStack[0]) {
                                const data = journeyEl._x_dataStack[0];
                                if (data.completedSteps < activeIdx + 1) {
                                    data.completedSteps = activeIdx + 1;
                                }
                            }
                        }
                    }

                    window.scrollToHiwStep = function(idx) {
                        const wrapper = document.getElementById('howItWorksScrollWrapper');
                        const cols = document.querySelectorAll('.hiw-step-col');
                        if (!wrapper || !cols[idx]) return;
                        const col = cols[idx];
                        const offsetLeft = col.offsetLeft - (wrapper.clientWidth - col.clientWidth) / 2;
                        wrapper.scrollTo({ left: Math.max(0, offsetLeft), behavior: 'smooth' });
                        updateHiwUI(idx);
                    };

                    window.navigateHiwStep = function(direction) {
                        const target = Math.max(0, Math.min(4, currentHiwStep + direction));
                        window.scrollToHiwStep(target);
                    };

                    // Setup scroll listener for touch swiping
                    const hiwWrapper = document.getElementById('howItWorksScrollWrapper');
                    if (hiwWrapper) {
                        let scrollDebounce = null;
                        hiwWrapper.addEventListener('scroll', function() {
                            if (scrollDebounce) clearTimeout(scrollDebounce);
                            scrollDebounce = setTimeout(() => {
                                const cols = document.querySelectorAll('.hiw-step-col');
                                if (!cols.length) return;
                                const center = hiwWrapper.scrollLeft + hiwWrapper.clientWidth / 2;
                                let closest = 0;
                                let minDist = Infinity;
                                cols.forEach((col, i) => {
                                    const cCenter = col.offsetLeft + col.clientWidth / 2;
                                    const dist = Math.abs(center - cCenter);
                                    if (dist < minDist) {
                                        minDist = dist;
                                        closest = i;
                                    }
                                });
                                updateHiwUI(closest);
                            }, 50);
                        }, { passive: true });
                    }
                })();
            </script>

            {{-- Bottom Pill --}}
            <div class="mt-6 sm:mt-8 flex justify-center z-20 relative">
                <div class="px-6 py-2 rounded-full bg-pink-100/70 text-maroon-900 font-medium text-[13px] sm:text-[13.5px] flex items-center gap-2 shadow-[0_2px_12px_rgba(200,50,100,0.06)] border border-pink-200/80 backdrop-blur-md">
                    <span class="text-crimson-500 text-sm leading-none">✨</span> 
                    <span>We make it easy. You hold on to it <span class="text-crimson-600 font-serif italic">forever.</span></span>
                </div>
            </div>
        </div>
    </section>


    {{-- Testimonials Samples Section (Matching Made for Every Occasion Dark Aesthetic - Screen Adaptable) --}}
    @php
        $sampleTestimonials = [
            // Video 1
            [
                'id' => 'v1',
                'type' => 'video',
                'badge' => 'Video Reaction 🎥',
                'name' => 'Sarah & Arjun',
                'occasion' => '5th Anniversary',
                'location' => 'Mumbai',
                'title' => 'I was literally in tears',
                'text' => "He managed to put 5 years of our relationship into a single song. When the chorus hit with the date we met at the coffee shop, I completely broke down. The best gift I've ever received.",
                'media' => 'images/anniversary.png',
                'audio' => 'audio/sample_anniversary.wav',
                'duration' => '0:48 min',
            ],
            // Video 2
            [
                'id' => 'v2',
                'type' => 'video',
                'badge' => 'Proposal Reaction 💍',
                'name' => 'Rohan & Meera',
                'occasion' => 'Sunset Proposal',
                'location' => 'Bengaluru',
                'title' => 'She said YES before the song ended',
                'text' => "I played the song through a portable speaker as the sun set in Goa. As soon as she realized the lyrics were about our Goa trips and inside jokes, she cried tears of joy and said yes!",
                'media' => 'images/wedding.png',
                'audio' => 'audio/sample_proposal.wav',
                'duration' => '1:12 min',
            ],
            // Image 1
            [
                'id' => 'i1',
                'type' => 'image',
                'badge' => 'Keepsake Plaque 🖼️',
                'name' => 'Tanvi & Rishabh',
                'occasion' => 'Wedding Gift Keepsake',
                'location' => 'Jaipur',
                'title' => 'Centerpiece of our new home',
                'text' => "We framed the custom lyrics with the scannable Spotify-style code on our bedside table. Whenever we walk past it, we scan it and smile. It's the centerpiece of our home now.",
                'media' => 'images/wedding.png',
            ],
            // Image 2
            [
                'id' => 'i2',
                'type' => 'image',
                'badge' => 'Melody Box 🎁',
                'name' => 'Simran Kaur',
                'occasion' => 'Mother’s Day Keepsake',
                'location' => 'Amritsar',
                'title' => 'Top tier luxury unboxing presentation',
                'text' => "The unboxing presentation was top-tier luxury. The ribbon, the personalized letter, and the instant play audio chip inside the card. She opened it and couldn't stop hugging me.",
                'media' => 'images/gift_box.png',
            ],
        ];
    @endphp

    <section 
        id="home-testimonials" 
        class="bg-[#140610] min-h-screen min-h-[100dvh] pt-4 pb-4 sm:pt-5 sm:pb-5 lg:pt-6 lg:pb-6 relative overflow-hidden flex flex-col justify-between select-none"
        x-data="{
            modalOpen: false,
            modalData: null,
            isPlaying: false,
            openModal(item) {
                this.modalData = item;
                this.modalOpen = true;
                this.isPlaying = false;
                document.body.style.overflow = 'hidden';
            },
            closeModal() {
                if (this.$refs.testimonialAudio) {
                    this.$refs.testimonialAudio.pause();
                    this.$refs.testimonialAudio.currentTime = 0;
                }
                this.modalOpen = false;
                this.modalData = null;
                this.isPlaying = false;
                document.body.style.overflow = '';
            },
            toggleAudio() {
                const audio = this.$refs.testimonialAudio;
                if (!audio) return;
                if (this.isPlaying) {
                    audio.pause();
                    this.isPlaying = false;
                } else {
                    audio.play();
                    this.isPlaying = true;
                }
            }
        }"
    >
        {{-- Ambient Dark Violet & Rose Glow (Rich Dark Violet Theme - Swatch #1E0913) --}}
        <div class="absolute inset-0 bg-gradient-to-b from-[#1E0914] via-[#140610] to-[#12050E] pointer-events-none"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_60%_at_50%_-10%,rgba(255,77,125,0.15),transparent_70%)] pointer-events-none"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_60%_50%_at_50%_110%,rgba(192,45,75,0.12),transparent_70%)] pointer-events-none"></div>
        <div class="absolute -top-32 left-1/4 w-96 h-96 bg-brand-pink/10 rounded-full blur-[140px] pointer-events-none"></div>
        <div class="absolute -bottom-32 right-1/4 w-96 h-96 bg-crimson-600/10 rounded-full blur-[140px] pointer-events-none"></div>

        {{-- Background Decorative Elements --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            {{-- Big heart outline --}}
            <svg class="absolute left-0 top-1/2 -translate-y-1/2 text-crimson-500/10 w-[500px] h-[500px] -translate-x-1/4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.5">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
            </svg>
            {{-- Musical notes & stars --}}
            <div class="absolute left-[12%] top-[14%] text-crimson-400/20 text-3xl -rotate-12 blur-[1px]">🎵</div>
            <div class="absolute right-[22%] top-[18%] text-crimson-400/20 text-2xl rotate-12">♪</div>
            <div class="absolute right-[12%] bottom-[16%] text-pink-300/20 text-xl">♥</div>
            <div class="absolute right-[10%] top-[10%] text-pink-200/40 text-base">✦</div>
            <div class="absolute left-[20%] top-[8%] text-amber-100/40 text-sm">✦</div>
            <div class="absolute right-[35%] bottom-[12%] text-pink-300/40 text-xs">✦</div>
        </div>

        <div class="w-full max-w-[90rem] mx-auto px-4 sm:px-6 lg:px-12 relative z-10 flex flex-col gap-3.5 sm:gap-5 lg:gap-6 my-auto">
            
            {{-- Header with Clean Spacing & Proper Typography --}}
            <div class="text-center max-w-2xl mx-auto flex flex-col items-center">
                <div class="inline-flex items-center gap-2 mb-1.5 sm:mb-2">
                    <span class="text-[10px] sm:text-[11px] font-bold tracking-[0.22em] text-pink-300 uppercase">WALL OF LOVE & REAL REVIEWS</span>
                    <span class="text-pink-300 text-xs">♥</span>
                </div>
                <h2 class="font-display text-2xl sm:text-3xl lg:text-4xl text-white font-semibold leading-tight tracking-tight">
                    Songs that made them <span class="text-crimson-400 italic font-normal font-serif">cry, laugh & remember.</span>
                </h2>
                <p class="text-white/70 text-xs sm:text-sm font-normal leading-relaxed mt-2 max-w-lg mx-auto">
                    Real unboxings, emotional reactions, and photo keepsakes from over 1,500+ custom Heartgrams.
                </p>
            </div>

            {{-- Cards Grid: 2 Videos + 2 Images (Clean & Adaptable, No Excess Clutter) --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-3.5 lg:gap-4 w-full">
                @foreach($sampleTestimonials as $item)
                    <div 
                        @click="openModal({{ json_encode($item) }})"
                        class="group relative rounded-2xl bg-white/[0.04] border border-white/10 hover:border-pink-500/50 hover:bg-white/[0.08] overflow-hidden transition-all duration-300 flex flex-col shadow-xl cursor-pointer hover:-translate-y-1"
                    >
                        {{-- Media Thumbnail --}}
                        <div class="relative overflow-hidden bg-black/40 w-full" style="height: clamp(120px, 20vh, 175px);">
                            <img 
                                src="{{ asset($item['media']) }}" 
                                alt="{{ $item['name'] }}" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0b030a]/90 via-black/20 to-transparent"></div>

                            {{-- Badge --}}
                            <div class="absolute top-2.5 left-2.5 z-10">
                                @if($item['type'] === 'video')
                                    <span class="px-2.5 py-1 rounded-full bg-crimson-600/90 text-white text-[10px] font-bold tracking-wide backdrop-blur-md flex items-center gap-1.5 shadow-md">
                                        <svg class="w-2.5 h-2.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                        {{ $item['badge'] }}
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full bg-white/20 text-white text-[10px] font-bold tracking-wide backdrop-blur-md border border-white/20 flex items-center gap-1.5 shadow-md">
                                        {{ $item['badge'] }}
                                    </span>
                                @endif
                            </div>

                            @if($item['type'] === 'video')
                                {{-- Duration pill --}}
                                <div class="absolute top-2.5 right-2.5 z-10 px-2 py-0.5 rounded-full bg-black/75 backdrop-blur-md text-white/90 text-[10px] font-medium border border-white/10">
                                    {{ $item['duration'] }}
                                </div>

                                {{-- Centered Play Button Overlay --}}
                                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                    <div class="w-11 h-11 rounded-full bg-white/95 group-hover:bg-crimson-600 group-hover:scale-110 text-crimson-600 group-hover:text-white flex items-center justify-center shadow-xl transition-all duration-300">
                                        <svg class="w-4 h-4 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </div>
                                </div>
                            @else
                                {{-- Keepsake Zoom Indicator --}}
                                <div class="absolute bottom-2.5 right-2.5 z-10 w-7 h-7 rounded-full bg-black/60 backdrop-blur-md text-white/90 flex items-center justify-center group-hover:scale-110 group-hover:bg-crimson-600 transition-all border border-white/10">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                                </div>
                            @endif
                        </div>

                        {{-- Clean Card Footer (Author Info Only - Matching Testimonials Page) --}}
                        <div class="p-2.5 sm:p-3 flex items-center justify-between gap-2 bg-white/[0.02]">
                            <div class="flex items-center gap-2 min-w-0">
                                <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-gradient-to-br {{ $item['type'] === 'video' ? 'from-crimson-500 to-maroon-800' : 'from-amber-600 to-amber-900' }} flex items-center justify-center text-white text-xs font-bold shrink-0 shadow-sm border border-white/10">
                                    {{ substr($item['name'], 0, 1) }}
                                </div>
                                <div class="min-w-0">
                                    <h4 class="text-xs sm:text-[13px] font-bold text-white group-hover:text-pink-200 transition-colors flex items-center gap-1 truncate">
                                        {{ $item['name'] }}
                                        <span class="text-crimson-400 text-xs">✓</span>
                                    </h4>
                                    <p class="text-[10px] sm:text-[11px] text-pink-200/70 truncate">{{ $item['occasion'] }} • {{ $item['location'] }}</p>
                                </div>
                            </div>
                            <span class="w-6 h-6 rounded-full bg-white/5 border border-white/10 group-hover:border-pink-400/50 group-hover:bg-pink-500/20 text-pink-300 flex items-center justify-center text-xs group-hover:translate-x-0.5 transition-all shrink-0">
                                →
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Bottom "For More" CTA Button --}}
            <div class="flex items-center justify-center text-center">
                <a 
                    href="{{ route('testimonials') }}" 
                    class="inline-flex items-center gap-2.5 px-6 py-2.5 sm:px-8 sm:py-3 rounded-full bg-gradient-to-r from-crimson-500 to-maroon-700 hover:from-crimson-600 hover:to-maroon-800 text-white font-bold text-xs sm:text-[13px] shadow-lg shadow-crimson-600/30 hover:shadow-crimson-600/50 hover:scale-102 transition-all group"
                >
                    <span>For More Testimonials & Real Stories</span>
                    <span class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center group-hover:translate-x-1 transition-transform">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </span>
                </a>
            </div>

        </div>

        {{-- Interactive Video / Keepsake Modal --}}
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
            class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 bg-black/80 backdrop-blur-md"
        >
            <div 
                @click.away="closeModal()"
                x-show="modalOpen"
                x-cloak
                style="display: none;"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                class="relative w-full max-w-2xl bg-[#160814] border border-white/15 rounded-[2rem] overflow-hidden shadow-2xl flex flex-col max-h-[90vh]"
            >
                {{-- Close Button --}}
                <button 
                    @click="closeModal()" 
                    type="button" 
                    class="absolute top-4 right-4 z-30 w-10 h-10 rounded-full bg-black/60 hover:bg-black text-white flex items-center justify-center backdrop-blur-sm transition-all"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                {{-- Modal Media --}}
                <div class="relative w-full bg-black aspect-video flex items-center justify-center overflow-hidden">
                    <template x-if="modalData">
                        <img 
                            :src="'{{ asset('') }}' + modalData.media" 
                            :alt="modalData.name"
                            class="w-full h-full object-cover"
                        >
                    </template>

                    {{-- Play / Audio Overlay for Video --}}
                    <template x-if="modalData && modalData.type === 'video'">
                        <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center gap-3">
                            <button 
                                @click="toggleAudio()"
                                type="button" 
                                class="w-16 h-16 rounded-full bg-crimson-600 hover:bg-crimson-500 text-white flex items-center justify-center shadow-2xl hover:scale-110 transition-all"
                            >
                                <svg x-show="!isPlaying" class="w-7 h-7 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                <svg x-show="isPlaying" class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                            </button>
                            <span class="px-3.5 py-1 rounded-full bg-black/70 backdrop-blur-md text-xs font-semibold text-white">
                                <span x-show="isPlaying">Playing Original Song Sample 🔊</span>
                                <span x-show="!isPlaying">Click to Play Song Sample 🎵</span>
                            </span>
                        </div>
                    </template>
                </div>

                {{-- Audio Player --}}
                <audio x-ref="testimonialAudio" :src="modalData && modalData.audio ? '{{ asset('') }}' + modalData.audio : ''" @ended="isPlaying = false"></audio>

                {{-- Modal Details --}}
                <div class="p-6 sm:p-7 overflow-y-auto text-white">
                    <template x-if="modalData">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs font-bold uppercase tracking-wider text-pink-300 bg-pink-900/40 px-3 py-1 rounded-full border border-pink-500/20" x-text="modalData.occasion"></span>
                                <span class="text-xs text-white/60" x-text="modalData.location"></span>
                            </div>

                            <h3 class="font-serif text-2xl font-bold text-white mb-2" x-text="modalData.title || modalData.name"></h3>

                            <p class="text-sm sm:text-base text-white/80 leading-relaxed italic mb-6 font-serif" x-text="'&ldquo;' + modalData.text + '&rdquo;'"></p>

                            <div class="flex items-center justify-between pt-4 border-t border-white/10">
                                <div>
                                    <h4 class="font-bold text-white text-sm" x-text="modalData.name"></h4>
                                    <p class="text-xs text-pink-300">Verified Heartgram Customer</p>
                                </div>

                                <a href="{{ route('testimonials') }}" class="px-5 py-2.5 rounded-full bg-gradient-to-r from-crimson-500 to-maroon-700 text-white text-xs font-bold shadow hover:scale-105 transition-all">
                                    More Testimonials →
                                </a>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>


    {{-- Interactive Plan Selection & Song Story Form Wrapper --}}
    <div 
        id="plan-and-form-container"
        x-data="{ 
            selectedPlan: 'classic',
            step: 1,
            selectedOccasion: 'Anniversary',
            customOccasion: '',
            isCustomOccasion: false,
            manualCategoryOverride: null,
            storyMode: 'guided',
            uploadedFilesCount: 0,

            get activeOccasionName() {
                if (this.isCustomOccasion && this.customOccasion.trim()) {
                    return this.customOccasion.trim();
                }
                return this.selectedOccasion || 'Personal Story';
            },

            get occasionCategory() {
                if (this.manualCategoryOverride) {
                    return this.manualCategoryOverride;
                }
                const occ = (this.isCustomOccasion && this.customOccasion.trim() ? this.customOccasion : (this.selectedOccasion || '')).toLowerCase();
                
                // Corporate & Team
                if (/company|corporate|team|founder|employee|office|work|retire|milestone|achievement|dedication|colleague|boss|startup|client/i.test(occ)) {
                    return 'corporate';
                }
                // Friendship & Family
                if (/friend|bestie|friendship|parent|mom|mother|dad|father|brother|sister|sibling|family|uncle|aunt|cousin|thank you|memory|memories/i.test(occ)) {
                    return 'family_friends';
                }
                // Romantic / Love by default
                return 'romantic';
            },

            selectOccasion(occ) {
                if (occ === 'Other') {
                    this.isCustomOccasion = true;
                    this.selectedOccasion = 'Other';
                    this.manualCategoryOverride = null;
                    this.$nextTick(() => {
                        const input = this.$refs.customOccasionInput;
                        if (input) input.focus();
                    });
                } else {
                    this.isCustomOccasion = false;
                    this.selectedOccasion = occ;
                    this.manualCategoryOverride = null;
                }
            },

            setCategory(cat) {
                this.manualCategoryOverride = cat;
            },

            handleFileChange(event) {
                if (event.target && event.target.files) {
                    this.uploadedFilesCount = event.target.files.length;
                }
            },

            init() {
                const parsePlan = (str) => {
                    if (!str) return null;
                    const lower = str.toLowerCase();
                    if (lower.includes('premium') || lower.includes('signature')) return 'premium';
                    if (lower.includes('classic') || lower.includes('standard')) return 'classic';
                    return null;
                };

                // Check URL query parameters
                const params = new URLSearchParams(window.location.search);
                const fromQuery = parsePlan(params.get('tier') || params.get('plan'));
                if (fromQuery) {
                    this.selectedPlan = fromQuery;
                }

                // Check hash on load
                const fromHash = parsePlan(window.location.hash);
                if (fromHash) {
                    this.selectedPlan = fromHash;
                }

                // Listen to hash changes
                window.addEventListener('hashchange', () => {
                    const hashPlan = parsePlan(window.location.hash);
                    if (hashPlan) {
                        this.selectedPlan = hashPlan;
                    }
                });

                // Listen to custom window events
                window.addEventListener('select-plan', (e) => {
                    if (e.detail && e.detail.plan) {
                        this.selectPlan(e.detail.plan);
                    }
                });
            },
            selectPlan(plan) {
                this.selectedPlan = plan;
                if (window.history && window.history.pushState) {
                    window.history.pushState(null, null, '#start?tier=' + plan);
                }
                const formSection = document.getElementById('start');
                if (formSection) {
                    formSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            },
            goToStep2() {
                const nameEl = this.$refs.nameInput;
                const phoneEl = this.$refs.phoneInput;
                if (nameEl && !nameEl.checkValidity()) {
                    nameEl.reportValidity();
                    return;
                }
                if (phoneEl && !phoneEl.checkValidity()) {
                    phoneEl.reportValidity();
                    return;
                }
                this.step = 2;
                const formContainer = document.getElementById('plan-and-form-container');
                if (formContainer) {
                    const startEl = document.getElementById('start');
                    if (startEl) startEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        }"
    >
        {{-- Pricing Section --}}
        <section class="relative overflow-hidden bg-[#FFFBF8] pt-7 pb-12 lg:pt-8 lg:pb-16 border-t border-pink-100/40 select-none scroll-mt-20" id="pricing">
            {{-- Ambient Glow --}}
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[400px] bg-rose-200/20 blur-[120px] rounded-full pointer-events-none"></div>

            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 w-full relative z-10">
                
                {{-- Header --}}
                <div class="text-center mb-5 lg:mb-6 flex flex-col items-center">
                    <span class="text-[10px] font-bold tracking-[0.2em] text-brand-pink uppercase mb-1.5">CHOOSE YOUR HEARTGRAM</span>
                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-[40px] font-normal text-brand-dark mb-1.5 leading-tight">
                        Every tier is a real song, written from scratch.
                    </h2>
                    <p class="text-brand-dark/60 max-w-lg mx-auto text-xs sm:text-[13px]">
                        The difference is the depth of the story we shape.
                    </p>
                </div>

                {{-- Cards Container --}}
                <div class="grid md:grid-cols-2 gap-5 lg:gap-8 max-w-[54rem] mx-auto w-full items-stretch">
                    
                    {{-- Left Card (Classic) --}}
                    <div 
                        @click="selectPlan('classic')"
                        class="bg-white rounded-[2rem] p-6 lg:p-7 shadow-[0_10px_35px_rgba(200,50,100,0.05)] border transition-all duration-300 flex flex-col justify-between relative group cursor-pointer"
                        :class="selectedPlan === 'classic' ? 'border-brand-pink/60 ring-2 ring-brand-pink/30 shadow-[0_20px_45px_rgba(255,77,125,0.15)] -translate-y-1' : 'border-pink-100/80 hover:border-pink-200 hover:shadow-[0_20px_45px_rgba(255,77,125,0.10)]'"
                    >
                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-[9px] font-bold tracking-[0.15em] text-brand-dark/40 uppercase block">FOR HEARTFELT PERSONAL GIFTS</span>
                                <span x-show="selectedPlan === 'classic'" class="inline-flex items-center gap-1 text-[10px] font-bold uppercase tracking-wider text-[#c02d4b] bg-pink-50 border border-pink-200/80 px-2.5 py-0.5 rounded-full">
                                    <span class="w-1.5 h-1.5 rounded-full bg-crimson-500"></span> Active Choice
                                </span>
                            </div>
                            <h3 class="font-serif text-2xl lg:text-[26px] font-medium text-brand-dark leading-tight mb-2">Heartgram Classic</h3>
                            
                            <div class="flex items-baseline gap-2 mb-2.5">
                                <span class="text-3xl lg:text-4xl font-display font-bold text-brand-dark">₹1,999</span>
                                <span class="text-[11px] text-brand-dark/50 font-medium">all-inclusive · no hidden fees</span>
                            </div>

                            <div class="bg-brand-light/80 border border-pink-100/70 rounded-full px-3 py-1 mb-3.5 inline-block text-[10px] font-semibold text-brand-dark/70 self-start">
                                Birthday · Love Song · Thank You · Apology
                            </div>

                            <ul class="space-y-2 text-[12.5px] lg:text-[13px] text-brand-dark/80 font-medium mb-4">
                                <li class="flex items-center gap-2.5"><span class="text-brand-pink font-bold text-sm">✓</span> Personalised song from your story</li>
                                <li class="flex items-center gap-2.5"><span class="text-brand-pink font-bold text-sm">✓</span> One lyric-writing option</li>
                                <li class="flex items-center gap-2.5"><span class="text-brand-pink font-bold text-sm">✓</span> Studio vocal & acoustic melody</li>
                                <li class="flex items-center gap-2.5"><span class="text-brand-pink font-bold text-sm">✓</span> High-quality MP3 format only</li>
                                <li class="flex items-center gap-2.5"><span class="text-brand-pink font-bold text-sm">✓</span> Keepsake Lyric PDF via WhatsApp</li>
                                <li class="flex items-center gap-2.5"><span class="text-brand-pink font-bold text-sm">✓</span> 3–5 days delivery time</li>
                            </ul>
                        </div>
                        
                        <button 
                            type="button"
                            @click.stop="selectPlan('classic')"
                            class="w-full py-3 rounded-full bg-gradient-to-r from-brand-pink to-[#E11D48] text-white font-semibold text-[13px] hover:brightness-105 transition-all flex items-center justify-center gap-1.5 shadow-md shadow-brand-pink/25 hover:shadow-lg hover:shadow-brand-pink/35 group-hover:scale-[1.01] cursor-pointer"
                        >
                            <span>Heartgram Classic</span> <span class="transition-transform group-hover:translate-x-1">→</span>
                        </button>
                    </div>

                    {{-- Right Card (Premium) --}}
                    <div 
                        @click="selectPlan('premium')"
                        class="bg-[#1E0913] text-white rounded-[2rem] p-6 lg:p-7 shadow-[0_20px_50px_rgba(30,9,19,0.45)] border transition-all duration-300 flex flex-col justify-between relative mt-4 md:mt-0 group cursor-pointer"
                        :class="selectedPlan === 'premium' ? 'border-[#ECC15E] ring-2 ring-[#ECC15E]/60 shadow-[0_25px_60px_rgba(236,193,94,0.25)] -translate-y-1' : 'border-[#3D142A]/60 hover:border-[#ECC15E]/50 hover:shadow-[0_25px_55px_rgba(236,193,94,0.15)]'"
                    >
                        {{-- Ambient Dark Violet Lighting (Exact Swatch #1E0913 - Rich Dark Violet, Not Black) --}}
                        <div class="absolute inset-0 rounded-[2rem] overflow-hidden pointer-events-none">
                            <div class="absolute inset-0 bg-gradient-to-b from-[#2B0E1E] via-[#1E0913] to-[#14060E]"></div>
                            <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_60%_at_50%_-10%,rgba(255,77,125,0.16),transparent_70%)]"></div>
                            <div class="absolute -top-12 -right-12 w-48 h-48 bg-pink-600/10 rounded-full blur-3xl"></div>
                            <div class="absolute top-4 right-5 text-amber-200/50 text-xs select-none">✦</div>
                        </div>
                        
                        {{-- Most Recommended Badge (Radiant Gold) --}}
                        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-gradient-to-r from-[#D99A26] via-[#FFE37E] to-[#C98B1B] text-[#241002] text-[9.5px] font-black tracking-[0.18em] px-4 py-1.5 rounded-full uppercase shadow-[0_4px_16px_rgba(217,154,38,0.45)] border border-[#FFE898]/80 z-20 whitespace-nowrap">
                            MOST RECOMMENDED
                        </div>
                        
                        <div class="relative z-10">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-[9px] font-bold tracking-[0.18em] text-amber-200/90 uppercase block">FOR DEEPER EMOTIONAL STORIES</span>
                                <span x-show="selectedPlan === 'premium'" class="inline-flex items-center gap-1 text-[10px] font-black uppercase tracking-wider text-[#241002] bg-gradient-to-r from-[#FFE37E] to-[#D99A26] px-2.5 py-0.5 rounded-full shadow-xs border border-[#FFE898]/60">
                                    ★ Active Choice
                                </span>
                            </div>
                            <h3 class="font-serif text-2xl lg:text-[26px] font-medium text-white leading-tight mb-2">Heartgram Premium</h3>
                            
                            <div class="flex items-baseline gap-2 mb-2.5">
                                <span class="text-3xl lg:text-4xl font-display font-bold text-white">₹2,999</span>
                                <span class="text-[11px] text-pink-200/70 font-medium">all-inclusive <span class="text-[#F5C247] font-bold">·</span> no hidden fees</span>
                            </div>

                            <div class="bg-white/[0.06] border border-white/10 backdrop-blur-sm rounded-full px-3 py-1 mb-3.5 inline-block text-[10px] font-semibold text-white/95 self-start">
                                Proposal <span class="text-[#F5C247] font-bold">·</span> Anniversary <span class="text-[#F5C247] font-bold">·</span> Wedding <span class="text-[#F5C247] font-bold">·</span> Parents <span class="text-[#F5C247] font-bold">·</span> Deep Love
                            </div>

                            <ul class="space-y-2.5 text-[12.5px] lg:text-[13px] text-white/95 font-medium mb-4">
                                <li class="flex items-center gap-2.5">
                                    <span class="w-2 h-2 rounded-full bg-gradient-to-br from-[#FFE37E] to-[#D99A26] shadow-[0_0_8px_rgba(255,227,126,0.85)] shrink-0"></span>
                                    <span>In-depth story shaping & emotional arc</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <span class="w-2 h-2 rounded-full bg-gradient-to-br from-[#FFE37E] to-[#D99A26] shadow-[0_0_8px_rgba(255,227,126,0.85)] shrink-0"></span>
                                    <span>Multiple lyric-writing options</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <span class="w-2 h-2 rounded-full bg-gradient-to-br from-[#FFE37E] to-[#D99A26] shadow-[0_0_8px_rgba(255,227,126,0.85)] shrink-0"></span>
                                    <span>Priority studio vocal & composition</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <span class="w-2 h-2 rounded-full bg-gradient-to-br from-[#FFE37E] to-[#D99A26] shadow-[0_0_8px_rgba(255,227,126,0.85)] shrink-0"></span>
                                    <span>High-quality formats: MP3, WAV & Dolby</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <span class="w-2 h-2 rounded-full bg-gradient-to-br from-[#FFE37E] to-[#D99A26] shadow-[0_0_8px_rgba(255,227,126,0.85)] shrink-0"></span>
                                    <span>Keepsake Lyric PDF via WhatsApp</span>
                                </li>
                                <li class="flex items-center gap-2.5">
                                    <span class="w-2 h-2 rounded-full bg-gradient-to-br from-[#FFE37E] to-[#D99A26] shadow-[0_0_8px_rgba(255,227,126,0.85)] shrink-0"></span>
                                    <span>1–2 days express delivery</span>
                                </li>
                            </ul>
                        </div>
                        
                        <button 
                            type="button"
                            @click.stop="selectPlan('premium')"
                            class="relative z-10 w-full py-3 rounded-full bg-gradient-to-r from-[#D99A26] via-[#FFE37E] to-[#C98B1B] text-[#241002] font-black text-[13.5px] hover:brightness-105 transition-all flex items-center justify-center gap-1.5 shadow-lg shadow-[#D99A26]/40 hover:shadow-xl hover:shadow-[#D99A26]/50 group-hover:scale-[1.01] border border-[#FFE898]/80 cursor-pointer"
                        >
                            <span>Heartgram Premium</span> <span class="transition-transform group-hover:translate-x-1">→</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        {{-- Start Your Song Form Section (Theme Reacts Dynamically to Selected Plan) --}}
        <section id="start" class="relative overflow-hidden bg-white flex flex-col justify-center min-h-[85vh] py-14 lg:py-20 border-t border-pink-100/40 select-none scroll-mt-20">
            
            {{-- Dynamic Ambient Background Glow --}}
            <div 
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[400px] blur-[130px] rounded-full pointer-events-none transition-all duration-700"
                :class="selectedPlan === 'premium' ? 'bg-[#0b030a]/25' : 'bg-rose-100/40'"
            ></div>
            <div 
                x-show="selectedPlan === 'premium'"
                x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                class="absolute top-1/3 left-1/2 -translate-x-1/2 w-[400px] h-[300px] bg-[#ECC15E]/15 blur-[120px] rounded-full pointer-events-none"
            ></div>

            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 w-full relative z-10 flex flex-col justify-center">
                
                {{-- Header --}}
                <div class="text-center mb-5 lg:mb-6">
                    {{-- Plan Badge --}}
                    <div class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-[10px] font-bold tracking-[0.18em] uppercase mb-2 shadow-xs transition-all duration-500"
                        :class="selectedPlan === 'premium' 
                            ? 'bg-gradient-to-r from-[#D99A26] via-[#FFE37E] to-[#C98B1B] text-[#241002] border border-[#FFE898]/80 shadow-[0_2px_12px_rgba(217,154,38,0.35)]' 
                            : 'bg-white text-[#c02d4b] border border-pink-200/80'">
                        <span x-text="selectedPlan === 'premium' ? '★ MOST RECOMMENDED · PREMIUM SONG STORY' : 'START YOUR SONG STORY · CLASSIC'"></span>
                    </div>

                    <h2 class="font-serif text-2xl sm:text-3xl lg:text-[34px] font-normal text-brand-dark mb-1 leading-tight">
                        Start your 
                        <span class="italic transition-all duration-500"
                            :class="selectedPlan === 'premium' 
                                ? 'text-transparent bg-clip-text bg-gradient-to-r from-[#D99A26] via-[#c02d4b] to-[#FFE37E] font-medium' 
                                : 'text-[#c02d4b]'">
                            Heartgram.
                        </span>
                    </h2>
                    <p class="text-xs sm:text-[13px] text-brand-dark/70 font-medium max-w-md mx-auto transition-colors duration-300">
                        <span x-show="selectedPlan === 'classic'">Personalised song from your story · Acoustic melody & lyrics · ₹1,999</span>
                        <span x-show="selectedPlan === 'premium'">Priority studio vocal · MP3, WAV & Dolby · Express 1–2 days · ₹2,999</span>
                    </p>
                </div>

                {{-- Form Container with Morphing Plan Theme --}}
                <div 
                    class="rounded-[1.75rem] p-4 sm:p-6 lg:p-7 transition-all duration-500 ease-in-out max-w-2xl mx-auto w-full relative overflow-hidden"
                    :class="selectedPlan === 'premium'
                        ? 'bg-[#1E0913] text-white border border-[#ECC15E]/40 shadow-[0_25px_60px_rgba(30,9,19,0.5)] ring-1 ring-[#ECC15E]/30'
                        : 'bg-brand-light text-brand-dark border border-pink-100/80 shadow-[0_8px_30px_rgba(200,50,100,0.05)]'"
                >
                    {{-- Decorative Subtle Watermark on Premium Theme --}}
                    <div 
                        x-show="selectedPlan === 'premium'"
                        class="absolute -bottom-10 -right-10 w-44 h-44 rounded-full bg-gradient-to-br from-[#ECC15E]/10 to-transparent pointer-events-none blur-2xl"
                    ></div>

                    @if(session('success'))
                        <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-[13px] font-medium flex items-start gap-2.5">
                            <svg class="w-4 h-4 text-green-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <div>{{ session('success') }}</div>
                        </div>
                    @endif

                    <form 
                        action="{{ route('leads.store') }}" 
                        method="POST" 
                        enctype="multipart/form-data"
                        class="space-y-4 lg:space-y-5 relative z-10"
                    >
                        @csrf
                        <input type="hidden" name="source" value="song_story">
                        <input type="hidden" name="tier" :value="selectedPlan">
                        <input type="hidden" name="occasion" :value="activeOccasionName">
                        <input type="hidden" name="occasion_category" :value="occasionCategory">
                        <input type="hidden" name="custom_occasion" :value="isCustomOccasion ? customOccasion : ''">

                        {{-- Step Indicator --}}
                        <div 
                            class="flex items-center justify-between pb-3.5 border-b transition-colors duration-300"
                            :class="selectedPlan === 'premium' ? 'border-white/10' : 'border-pink-100/80'"
                        >
                            <button type="button" @click="step = 1" class="flex items-center gap-2 sm:gap-2.5 text-left group cursor-pointer">
                                <div 
                                    class="w-6 h-6 sm:w-7 sm:h-7 rounded-full flex items-center justify-center text-xs font-bold transition-all duration-300 shrink-0"
                                    :class="step === 1 
                                        ? (selectedPlan === 'premium' ? 'bg-gradient-to-r from-[#B8841B] via-[#DCA838] to-[#A27010] text-[#241002] shadow-[0_0_10px_rgba(220,168,56,0.5)] font-bold' : 'bg-[#c02d4b] text-white shadow-xs') 
                                        : (selectedPlan === 'premium' ? 'bg-white/15 text-[#ECC15E] group-hover:bg-white/20' : 'bg-pink-100 text-[#c02d4b] group-hover:bg-pink-200')"
                                >
                                    <span x-show="step === 1">1</span>
                                    <span x-show="step === 2">✓</span>
                                </div>
                                <div>
                                    <span 
                                        class="text-[9px] uppercase tracking-wider font-bold block leading-none transition-colors duration-300" 
                                        :class="step === 1 
                                            ? (selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-[#c02d4b]') 
                                            : (selectedPlan === 'premium' ? 'text-white/50' : 'text-brand-dark/50')"
                                    >
                                        Step 1
                                    </span>
                                    <span 
                                        class="text-[11px] sm:text-[11.5px] font-medium transition-colors duration-300 leading-tight block"
                                        :class="selectedPlan === 'premium' ? 'text-white/90' : 'text-brand-dark/80'"
                                    >
                                        <span class="hidden sm:inline">Plan, </span>About You<span class="hidden xs:inline"> &amp; Occasion</span>
                                    </span>
                                </div>
                            </button>

                            <div 
                                class="flex-1 mx-2 sm:mx-5 h-0.5 transition-colors duration-300" 
                                :class="step === 2 
                                    ? (selectedPlan === 'premium' ? 'bg-gradient-to-r from-[#B8841B] to-[#DCA838]' : 'bg-[#c02d4b]') 
                                    : (selectedPlan === 'premium' ? 'bg-white/15' : 'bg-pink-100/80')"
                            ></div>

                            <div class="flex items-center gap-2 sm:gap-2.5 text-left">
                                <div 
                                    class="w-6 h-6 sm:w-7 sm:h-7 rounded-full flex items-center justify-center text-xs font-bold transition-all duration-300 shrink-0"
                                    :class="step === 2 
                                        ? (selectedPlan === 'premium' ? 'bg-gradient-to-r from-[#B8841B] via-[#DCA838] to-[#A27010] text-[#241002] shadow-[0_0_10px_rgba(220,168,56,0.5)] font-bold' : 'bg-[#c02d4b] text-white shadow-xs') 
                                        : (selectedPlan === 'premium' ? 'bg-white/15 text-white/40' : 'bg-pink-100 text-brand-dark/40')"
                                >
                                    2
                                </div>
                                <div>
                                    <span 
                                        class="text-[9px] uppercase tracking-wider font-bold block leading-none transition-colors duration-300" 
                                        :class="step === 2 
                                            ? (selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-[#c02d4b]') 
                                            : (selectedPlan === 'premium' ? 'text-white/40' : 'text-brand-dark/40')"
                                    >
                                        Step 2
                                    </span>
                                    <span 
                                        class="text-[11px] sm:text-[11.5px] font-medium transition-colors duration-300 leading-tight block" 
                                        :class="step === 2 
                                            ? (selectedPlan === 'premium' ? 'text-white/90' : 'text-brand-dark/80') 
                                            : (selectedPlan === 'premium' ? 'text-white/40' : 'text-brand-dark/40')"
                                    >
                                        Song Story
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Page 1: Details & Occasion --}}
                        <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-3" x-transition:enter-end="opacity-100 translate-x-0" class="space-y-4 lg:space-y-4.5">
                            
                            {{-- Question 1: Choose Your Plan --}}
                            <div>
                                <label 
                                    class="block text-[11px] font-semibold mb-2 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white/90' : 'text-brand-dark'"
                                >
                                    Choose your plan <span :class="selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-crimson-500'">*</span>
                                </label>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 sm:gap-3">
                                    {{-- Classic Plan Card (Pink shade) --}}
                                    <button 
                                        type="button" 
                                        @click="selectedPlan = 'classic'"
                                        class="relative w-full text-left p-3.5 rounded-2xl border transition-all duration-300 flex items-center justify-between cursor-pointer group select-none"
                                        :class="selectedPlan === 'classic'
                                            ? 'bg-gradient-to-r from-brand-pink to-[#E11D48] text-white border-[#FF4D7D] shadow-md shadow-brand-pink/30 ring-2 ring-brand-pink/40 scale-[1.01]'
                                            : (selectedPlan === 'premium' 
                                                ? 'bg-white/10 border-white/20 text-white/80 hover:bg-white/15 hover:border-pink-300/40' 
                                                : 'bg-white border-pink-100 text-brand-dark hover:border-[#FF4D7D]/40 hover:bg-pink-50/30')"
                                    >
                                        <div class="flex items-center gap-2.5 sm:gap-3">
                                            {{-- Radio Circle --}}
                                            <div 
                                                class="w-5 h-5 rounded-full flex items-center justify-center shrink-0 border transition-all duration-200"
                                                :class="selectedPlan === 'classic' 
                                                    ? 'border-white bg-white text-[#c02d4b]' 
                                                    : (selectedPlan === 'premium' ? 'border-white/30 bg-transparent' : 'border-gray-300 bg-white')"
                                            >
                                                <span x-show="selectedPlan === 'classic'" class="w-2.5 h-2.5 rounded-full bg-[#c02d4b]"></span>
                                            </div>
                                            <div>
                                                <div class="font-bold text-[13px] sm:text-[13.5px] leading-tight">Heartgram Classic</div>
                                                <div 
                                                    class="text-[11px] leading-tight mt-0.5 transition-colors"
                                                    :class="selectedPlan === 'classic' ? 'text-white/90' : (selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/60')"
                                                >
                                                    Acoustic Melody · 3–5 days
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-right shrink-0 pl-2">
                                            <span class="font-display font-bold text-base sm:text-lg block leading-tight">₹1,999</span>
                                            <span 
                                                class="text-[9px] uppercase tracking-wider font-semibold opacity-75 block"
                                                :class="selectedPlan === 'classic' ? 'text-white/90' : (selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/50')"
                                            >
                                                all-inclusive
                                            </span>
                                        </div>
                                    </button>

                                    {{-- Premium Plan Card (Gold shade) --}}
                                    <button 
                                        type="button" 
                                        @click="selectedPlan = 'premium'"
                                        class="relative w-full text-left p-3.5 rounded-2xl border transition-all duration-300 flex items-center justify-between cursor-pointer group select-none"
                                        :class="selectedPlan === 'premium'
                                            ? 'bg-gradient-to-r from-[#D99A26] via-[#FFE37E] to-[#C98B1B] text-[#241002] border-[#FFE898] shadow-md shadow-[#D99A26]/35 ring-2 ring-[#FFE898]/60 scale-[1.01] font-medium'
                                            : (selectedPlan === 'premium' 
                                                ? 'bg-white/10 border-white/20 text-white/80' 
                                                : 'bg-white border-pink-100 text-brand-dark hover:border-[#DCA838]/40 hover:bg-amber-50/30')"
                                    >
                                        <div class="flex items-center gap-2.5 sm:gap-3">
                                            {{-- Radio Circle --}}
                                            <div 
                                                class="w-5 h-5 rounded-full flex items-center justify-center shrink-0 border transition-all duration-200"
                                                :class="selectedPlan === 'premium' 
                                                    ? 'border-[#241002] bg-[#241002] text-[#FFE37E]' 
                                                    : 'border-gray-300 bg-white'"
                                            >
                                                <span x-show="selectedPlan === 'premium'" class="w-2.5 h-2.5 rounded-full bg-[#FFE37E]"></span>
                                            </div>
                                            <div>
                                                <div class="font-bold text-[13px] sm:text-[13.5px] leading-tight flex items-center gap-1.5">
                                                    <span>Heartgram Premium</span>
                                                    <span 
                                                        class="text-[8.5px] px-1.5 py-0.5 rounded-full font-extrabold uppercase tracking-wider shrink-0"
                                                        :class="selectedPlan === 'premium' ? 'bg-[#241002] text-[#ECC15E]' : 'bg-[#DCA838]/20 text-[#B8841B]'"
                                                    >
                                                        ★ Popular
                                                    </span>
                                                </div>
                                                <div 
                                                    class="text-[11px] leading-tight mt-0.5 transition-colors"
                                                    :class="selectedPlan === 'premium' ? 'text-[#241002]/85' : 'text-brand-dark/60'"
                                                >
                                                    Priority Vocal · 1–2 days express
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-right shrink-0 pl-2">
                                            <span class="font-display font-bold text-base sm:text-lg block leading-tight">₹2,999</span>
                                            <span 
                                                class="text-[9px] uppercase tracking-wider font-semibold block"
                                                :class="selectedPlan === 'premium' ? 'text-[#241002]/75' : 'text-brand-dark/50'"
                                            >
                                                all-inclusive
                                            </span>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            
                            {{-- Section 1: About You --}}
                            <div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-3.5">
                                    <div>
                                        <label 
                                            class="block text-[11px] font-semibold mb-1 transition-colors duration-300"
                                            :class="selectedPlan === 'premium' ? 'text-white/90' : 'text-brand-dark'"
                                        >
                                            Your name <span :class="selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-[#c02d4b]'">*</span>
                                        </label>
                                        <input 
                                            type="text" 
                                            x-ref="nameInput" 
                                            name="name" 
                                            required 
                                            placeholder="Your full name" 
                                            class="w-full rounded-xl px-3.5 py-2.5 text-[13px] transition-all focus:outline-none"
                                            :class="selectedPlan === 'premium' 
                                                ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                                : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/30 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                        >
                                    </div>
                                    <div>
                                        <label 
                                            class="block text-[11px] font-semibold mb-1 transition-colors duration-300"
                                            :class="selectedPlan === 'premium' ? 'text-white/90' : 'text-brand-dark'"
                                        >
                                            WhatsApp number <span :class="selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-[#c02d4b]'">*</span>
                                        </label>
                                        <input 
                                            type="tel" 
                                            x-ref="phoneInput" 
                                            name="whatsapp_number" 
                                            required 
                                            placeholder="+91 00000 00000" 
                                            class="w-full rounded-xl px-3.5 py-2.5 text-[13px] transition-all focus:outline-none"
                                            :class="selectedPlan === 'premium' 
                                                ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                                : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/30 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                        >
                                    </div>
                                    <div>
                                        <label 
                                            class="block text-[11px] font-semibold mb-1 transition-colors duration-300"
                                            :class="selectedPlan === 'premium' ? 'text-white/90' : 'text-brand-dark'"
                                        >
                                            Email (optional)
                                        </label>
                                        <input 
                                            type="email" 
                                            name="email" 
                                            placeholder="you@email.com" 
                                            class="w-full rounded-xl px-3.5 py-2.5 text-[13px] transition-all focus:outline-none"
                                            :class="selectedPlan === 'premium' 
                                                ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                                : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/30 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                        >
                                    </div>
                                    <div>
                                        <label 
                                            class="block text-[11px] font-semibold mb-1 transition-colors duration-300"
                                            :class="selectedPlan === 'premium' ? 'text-white/90' : 'text-brand-dark'"
                                        >
                                            Event / occasion date
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="text" 
                                                name="occasion_date" 
                                                placeholder="dd-mm-yyyy" 
                                                class="w-full rounded-xl px-3.5 py-2.5 text-[13px] transition-all focus:outline-none"
                                                :class="selectedPlan === 'premium' 
                                                    ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                                    : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/30 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                            >
                                            <div 
                                                class="absolute right-3.5 top-1/2 -translate-y-1/2 pointer-events-none transition-colors duration-300"
                                                :class="selectedPlan === 'premium' ? 'text-[#ECC15E]/80' : 'text-brand-dark/40'"
                                            >
                                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Section 2: Choose Occasion --}}
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span 
                                        class="block text-[11px] font-semibold transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white/90' : 'text-brand-dark'"
                                    >
                                        Choose occasion <span :class="selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-[#c02d4b]'">*</span>
                                    </span>
                                    <span 
                                        class="text-[10px] font-medium transition-colors"
                                        :class="selectedPlan === 'premium' ? 'text-amber-300/80' : 'text-brand-dark/50'"
                                        x-text="'Category: ' + (occasionCategory === 'corporate' ? 'Corporate & Team' : (occasionCategory === 'family_friends' ? 'Friends & Family' : 'Love & Partner'))"
                                    ></span>
                                </div>

                                {{-- Occasion Pills Grid --}}
                                <div class="flex flex-wrap gap-2">
                                    @php
                                        $occasions = [
                                            'Birthday', 
                                            'Anniversary', 
                                            'Proposal', 
                                            'Wedding', 
                                            'Friendship', 
                                            'Parents', 
                                            'Corporate / Team', 
                                            'Farewell', 
                                            'Apology', 
                                            'Thank You', 
                                            'Long-Distance', 
                                            'Memory Song', 
                                            'Other'
                                        ];
                                    @endphp
                                    @foreach($occasions as $occ)
                                        <button 
                                            type="button"
                                            @click="selectOccasion('{{ $occ }}')"
                                            class="px-3.5 py-1.5 rounded-full border text-[12px] font-medium transition-all shadow-xs cursor-pointer select-none"
                                            :class="selectedOccasion === '{{ $occ }}'
                                                ? (selectedPlan === 'premium'
                                                    ? 'bg-gradient-to-r from-[#B8841B] via-[#DCA838] to-[#A27010] text-[#241002] font-bold border-[#ECC15E] shadow-sm'
                                                    : 'bg-white border-[#c02d4b] text-[#c02d4b] ring-1 ring-[#c02d4b]/30 font-semibold shadow-xs')
                                                : (selectedPlan === 'premium'
                                                    ? 'bg-white/10 border-white/15 text-white/80 hover:bg-white/15'
                                                    : 'bg-white border-gray-200/80 text-gray-500 hover:border-gray-300')"
                                        >
                                            @if($occ === 'Other')
                                                + Other / Custom
                                            @else
                                                {{ $occ }}
                                            @endif
                                        </button>
                                    @endforeach
                                </div>

                                {{-- Custom Occasion Input if "+ Other" is selected --}}
                                <div x-show="isCustomOccasion" x-transition class="mt-2.5">
                                    <input 
                                        type="text" 
                                        x-ref="customOccasionInput"
                                        x-model="customOccasion" 
                                        placeholder="Type your occasion (e.g. Friendship, Company Anniversary, Retirement, Farewell)..."
                                        class="w-full rounded-xl px-3.5 py-2 text-[12.5px] transition-all focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/40 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    >
                                </div>
                            </div>

                            {{-- Step 1 Actions --}}
                            <div class="pt-1.5 flex flex-col sm:flex-row items-center gap-3">
                                <button 
                                    type="button" 
                                    @click="goToStep2()" 
                                    class="w-full sm:w-auto py-2.5 sm:py-3 px-7 rounded-full font-semibold text-[13px] transition-all flex items-center justify-center gap-2 group cursor-pointer"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-gradient-to-r from-[#B8841B] via-[#DCA838] to-[#A27010] text-[#241002] hover:brightness-105 shadow-md shadow-[#B8841B]/30 border border-[#ECC15E]/60' 
                                        : 'bg-gradient-to-r from-brand-pink to-[#E11D48] text-white hover:brightness-105 shadow-md shadow-brand-pink/25'"
                                >
                                    <span x-text="'Continue to your ' + activeOccasionName + ' story (' + (occasionCategory === 'romantic' ? '10' : '8') + ' questions)'"></span> <span class="group-hover:translate-x-1 transition-transform">→</span>
                                </button>
                                
                                <a 
                                    href="https://wa.me/?text=Hi%20Heartgrams%2C%20I%20would%20like%20to%20create%20a%20song" 
                                    target="_blank" 
                                    class="w-full sm:w-auto py-2.5 sm:py-3 px-6 rounded-full font-medium text-[13px] transition-colors flex items-center justify-center gap-1.5 shadow-xs"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white hover:bg-white/20' 
                                        : 'bg-white border border-gray-300 text-gray-600 hover:bg-gray-50 hover:text-gray-900'"
                                >
                                    <svg class="w-3.5 h-3.5" :class="selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-gray-500'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
                                    Chat on WhatsApp
                                </a>
                            </div>
                        </div>

                        {{-- Page 2: Your Story (Dynamic Occasion Questionnaire) --}}
                        <div x-show="step === 2" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-3" x-transition:enter-end="opacity-100 translate-x-0" class="space-y-4 lg:space-y-5">
                            
                            {{-- Header Banner with Occasion Badge & Quick Category Switcher --}}
                            <div 
                                class="p-4 rounded-2xl border transition-all duration-300"
                                :class="selectedPlan === 'premium' 
                                    ? 'bg-white/[0.06] border-white/15 text-white' 
                                    : 'bg-white border-pink-200/80 text-brand-dark shadow-xs'"
                            >
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2.5 pb-3 border-b"
                                    :class="selectedPlan === 'premium' ? 'border-white/10' : 'border-gray-100'"
                                >
                                    <div class="flex items-center gap-2.5">
                                        <span class="text-2xl">
                                            <template x-if="occasionCategory === 'corporate'"><span>🏢</span></template>
                                            <template x-if="occasionCategory === 'family_friends'"><span>🤝</span></template>
                                            <template x-if="occasionCategory === 'romantic'"><span>💕</span></template>
                                        </span>
                                        <div>
                                            <div class="flex items-center gap-2 flex-wrap">
                                                <h3 class="font-serif text-[17px] font-bold leading-tight" x-text="activeOccasionName + ' Song Story'"></h3>
                                                <span class="text-[9.5px] px-2 py-0.5 rounded-full font-bold uppercase tracking-wider"
                                                    :class="selectedPlan === 'premium' ? 'bg-[#ECC15E]/20 text-[#ECC15E]' : 'bg-pink-100 text-[#c02d4b]'"
                                                    x-text="occasionCategory === 'corporate' ? 'Corporate Dedication' : (occasionCategory === 'family_friends' ? 'Friendship & Family' : 'Romantic Story')"
                                                ></span>
                                            </div>
                                            <p class="text-[11px] opacity-75 mt-0.5">
                                                <template x-if="occasionCategory === 'corporate'">
                                                    <span>Company Anniversary · Team Celebration · Founder Tribute · Employee Appreciation · Farewell · Milestone</span>
                                                </template>
                                                <template x-if="occasionCategory === 'family_friends'">
                                                    <span>Friendship · Mother · Father · Birthday for friends or family · Memories · Thank You</span>
                                                </template>
                                                <template x-if="occasionCategory === 'romantic'">
                                                    <span>Proposal · Wedding · Anniversary · Valentine’s Day · Love & Partner Story</span>
                                                </template>
                                            </p>
                                        </div>
                                    </div>

                                    <button 
                                        type="button" 
                                        @click="step = 1" 
                                        class="self-start sm:self-auto text-[11px] font-semibold px-3 py-1 rounded-full border transition-colors flex items-center gap-1 cursor-pointer"
                                        :class="selectedPlan === 'premium' ? 'border-white/20 text-[#ECC15E] hover:bg-white/10' : 'border-gray-200 text-[#c02d4b] hover:bg-pink-50'"
                                    >
                                        <span>Change occasion ✏️</span>
                                    </button>
                                </div>

                                {{-- Category Switcher Tabs --}}
                                <div class="pt-3 flex flex-wrap items-center gap-1.5 text-[11px]">
                                    <span class="font-medium mr-1 text-[10px] uppercase tracking-wider opacity-60">Question Type:</span>
                                    <button 
                                        type="button" 
                                        @click="setCategory('romantic')"
                                        class="px-2.5 py-1 rounded-full border text-[11px] font-medium transition-all cursor-pointer select-none"
                                        :class="occasionCategory === 'romantic'
                                            ? (selectedPlan === 'premium' ? 'bg-[#ECC15E] text-[#241002] font-bold border-[#ECC15E] shadow-xs' : 'bg-[#c02d4b] text-white font-bold border-[#c02d4b] shadow-xs')
                                            : (selectedPlan === 'premium' ? 'bg-white/10 border-white/15 text-white/70 hover:bg-white/15' : 'bg-gray-100 border-gray-200 text-gray-600 hover:bg-gray-200/70')"
                                    >
                                        💕 Love & Partner (10 Qs)
                                    </button>

                                    <button 
                                        type="button" 
                                        @click="setCategory('family_friends')"
                                        class="px-2.5 py-1 rounded-full border text-[11px] font-medium transition-all cursor-pointer select-none"
                                        :class="occasionCategory === 'family_friends'
                                            ? (selectedPlan === 'premium' ? 'bg-[#ECC15E] text-[#241002] font-bold border-[#ECC15E] shadow-xs' : 'bg-[#c02d4b] text-white font-bold border-[#c02d4b] shadow-xs')
                                            : (selectedPlan === 'premium' ? 'bg-white/10 border-white/15 text-white/70 hover:bg-white/15' : 'bg-gray-100 border-gray-200 text-gray-600 hover:bg-gray-200/70')"
                                    >
                                        🤝 Friendship & Family (8 Qs)
                                    </button>

                                    <button 
                                        type="button" 
                                        @click="setCategory('corporate')"
                                        class="px-2.5 py-1 rounded-full border text-[11px] font-medium transition-all cursor-pointer select-none"
                                        :class="occasionCategory === 'corporate'
                                            ? (selectedPlan === 'premium' ? 'bg-[#ECC15E] text-[#241002] font-bold border-[#ECC15E] shadow-xs' : 'bg-[#c02d4b] text-white font-bold border-[#c02d4b] shadow-xs')
                                            : (selectedPlan === 'premium' ? 'bg-white/10 border-white/15 text-white/70 hover:bg-white/15' : 'bg-gray-100 border-gray-200 text-gray-600 hover:bg-gray-200/70')"
                                    >
                                        🏢 Corporate & Team (8 Qs)
                                    </button>
                                </div>

                                {{-- User Instructions Box --}}
                                <div class="mt-3 p-3 rounded-xl text-[12px] leading-relaxed transition-colors flex items-start gap-2.5"
                                    :class="selectedPlan === 'premium' ? 'bg-[#ECC15E]/10 text-amber-200/90 border border-[#ECC15E]/20' : 'bg-amber-50 text-amber-900 border border-amber-200/70'"
                                >
                                    <span class="text-base shrink-0 mt-0.5">💡</span>
                                    <div>
                                        <strong>Please answer in your own words.</strong> Do not worry about writing beautifully. Specific names, places, phrases, habits and real moments are more useful than perfect sentences.
                                    </div>
                                </div>
                            </div>

                            {{-- ==================== FORM 1: CORPORATE & TEAM (8 Questions) ==================== --}}
                            <div x-show="occasionCategory === 'corporate'" class="space-y-3.5">
                                <div class="p-1">
                                    <span class="text-[10px] font-bold tracking-wider uppercase opacity-60 block mb-1">Corporate & Team Questions</span>
                                </div>

                                {{-- Q1 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        1. Your Name & Role
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Tell us your name and your role in the company or team.
                                    </p>
                                    <input 
                                        type="text" 
                                        name="questions[1. Your Name & Role]" 
                                        placeholder="e.g. Sarah Jenkins, Head of Product / Alex, Co-founder"
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    >
                                </div>

                                {{-- Q2 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        2. Who are you dedicating this song to?
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Tell us exactly who the song is for (company, founder, employee, team, leadership, client, partner, or the whole organization. Include names if you want specific people mentioned).
                                    </p>
                                    <textarea 
                                        name="questions[2. Who are you dedicating this song to?]" 
                                        rows="2" 
                                        placeholder="e.g. Dedicated to our whole team and our founder David on our 10-year journey..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q3 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        3. What is the occasion, and why are you creating this song?
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Tell us what is happening and why this moment matters (Company anniversary, team celebration, founder tribute, employee appreciation, farewell, retirement, major achievement, milestone, or another special reason).
                                    </p>
                                    <textarea 
                                        name="questions[3. What is the occasion, and why are you creating this song?]" 
                                        rows="2" 
                                        placeholder="e.g. Celebrating our 10th Company Anniversary and honoring the hard work everyone put in..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q4 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        4. Tell us how the journey started.
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Give us the beginning of the story. When did it begin? Who started it? What was the original idea, dream, or goal?
                                    </p>
                                    <textarea 
                                        name="questions[4. Tell us how the journey started]" 
                                        rows="3" 
                                        placeholder="e.g. It began in a cramped basement room back in 2014 with just two laptops, strong coffee, and a wild dream to reinvent how..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q5 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        5. Tell us 2–4 important moments from the journey.
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Choose the moments people would be proud to remember (First big client, first launch, major project, award, important achievement, growth milestone, memorable event, or a moment everyone still talks about).
                                    </p>
                                    <textarea 
                                        name="questions[5. Tell us 2-4 important moments from the journey]" 
                                        rows="3" 
                                        placeholder="e.g. 1) Landing our first Fortune 500 client in 2017. 2) Shipping version 2.0 through an all-night pizza sprint. 3) Opening our first international branch in London..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q6 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        6. Tell us about the people and details that made this journey special.
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Bring in the human side of the story (Key people, important contributions, teamwork, funny office moments, team trips, celebrations, traditions, inside jokes, company phrases, or anything the group would instantly recognize).
                                    </p>
                                    <textarea 
                                        name="questions[6. Tell us about the people and details that made this journey special]" 
                                        rows="3" 
                                        placeholder="e.g. Ramesh always making filter coffee before sprint reviews, our ritual Friday badminton games, the phrase 'Make it sparkle', our legendary trip to Rishikesh..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q7 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        7. What would you like to say to the people being celebrated?
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Write the message you want them to hear in the song (Thank them, appreciate them, congratulate them, recognize their contribution, or tell them what you hope they remember about this journey).
                                    </p>
                                    <textarea 
                                        name="questions[7. What would you like to say to the people being celebrated?]" 
                                        rows="3" 
                                        placeholder="e.g. Thank you for giving your heart to this vision. We stood together through every storm, and we are just getting started..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q8 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        8. When everyone hears this song, what should they feel?
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Choose the feeling you want the song to leave behind (Proud, happy, emotional, inspired, grateful, nostalgic, celebrated, or another feeling).
                                    </p>
                                    <input 
                                        type="text" 
                                        name="questions[8. When everyone hears this song, what should they feel?]" 
                                        placeholder="e.g. Proud, inspired, deeply grateful, nostalgic and energized for the future"
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    >
                                </div>
                            </div>

                            {{-- ==================== FORM 2: FRIENDSHIP & FAMILY (8 Questions) ==================== --}}
                            <div x-show="occasionCategory === 'family_friends'" class="space-y-3.5">
                                <div class="p-1">
                                    <span class="text-[10px] font-bold tracking-wider uppercase opacity-60 block mb-1">Friendship & Family Story Questions</span>
                                </div>

                                {{-- Q1 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        1. Your Name
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        What should we call you?
                                    </p>
                                    <input 
                                        type="text" 
                                        name="questions[1. Your Name]" 
                                        placeholder="Your full name or what they affectionately call you"
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    >
                                </div>

                                {{-- Q2 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        2. Who is this song for?
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Tell us their name, your relationship with them, and what you usually call them (For example: Mom, Dad, brother, sister, best friend, childhood friend, uncle, aunt, or their nickname).
                                    </p>
                                    <input 
                                        type="text" 
                                        name="questions[2. Who is this song for?]" 
                                        placeholder="e.g. My best friend Arjun, Mom, Dad, my sister Sneha, my college buddy..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    >
                                </div>

                                {{-- Q3 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        3. What is the occasion, and why are you making this song?
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Tell us what is happening and why you want to give them a song now (Birthday, a thank-you, a special memory, a reunion, saying sorry, a celebration, or simply because you want them to know how much they mean to you).
                                    </p>
                                    <textarea 
                                        name="questions[3. What is the occasion, and why are you making this song?]" 
                                        rows="2" 
                                        placeholder="e.g. His 25th birthday, celebrating 10 years of unbroken friendship through college and adulthood..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q4 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        4. Tell us a little about them.
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        What are they like in everyday life? Tell us 2–4 simple things: their personality, a habit, what they love, how they talk, what they are known for in the family or among friends, or something you always notice about them.
                                    </p>
                                    <textarea 
                                        name="questions[4. Tell us a little about them]" 
                                        rows="3" 
                                        placeholder="e.g. Always cracked terrible jokes to cheer people up, always late by 15 minutes, drinks chai 5 times a day, the most reliable person in any crisis..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q5 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        5. Tell us 2–4 memories that you want us to remember for the song.
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Big or small moments are both welcome (Think of a place, a day, a trip, a celebration, a funny incident, a childhood memory, a difficult time, or a simple moment that still stays with you).
                                    </p>
                                    <textarea 
                                        name="questions[5. Tell us 2-4 memories that you want us to remember for the song]" 
                                        rows="3" 
                                        placeholder="e.g. 1) Our unplanned Goa trip on rented bikes in the rain. 2) Sitting on the college canteen stairs every afternoon. 3) The night they stayed awake in the hospital corridor with me..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q6 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        6. What are the little details that would make them instantly know this song is about them?
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Think about the things that belong to your relationship (A nickname, favorite food, phrase they always say, a place, a song, a hobby, a routine, an inside joke, something they always carry).
                                    </p>
                                    <textarea 
                                        name="questions[6. What are the little details that would make them instantly know this song is about them?]" 
                                        rows="3" 
                                        placeholder="e.g. Nickname 'Panda', always ordering extra momos, our code word 'Code Red', blasting A.R. Rahman on late-night highway drives..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q7 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        7. What is one thing you are especially thankful for, proud of, or grateful to them for?
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Tell us the reason behind that feeling (Maybe they supported you, cared for you, believed in you, stood beside you, taught you something, made a sacrifice, helped you through a hard time, or simply made your life better).
                                    </p>
                                    <textarea 
                                        name="questions[7. What is one thing you are especially thankful for, proud of, or grateful to them for?]" 
                                        rows="3" 
                                        placeholder="e.g. Even when I doubted myself completely, you were the one person who never lost faith in me. You gave me courage to start over..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q8 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        8. If they hear this song today, what do you want them to know and feel?
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Write the message in your own words (You can write “Thank you for always being there,” “I'm proud of you,” “I'm sorry,” “I miss you,” “I love you,” “Please take care of yourself,” and the feeling you want the song to leave them with).
                                    </p>
                                    <textarea 
                                        name="questions[8. If they hear this song today, what do you want them to know and feel?]" 
                                        rows="3" 
                                        placeholder="e.g. I want them to smile, get misty-eyed, and know that distance and time will never change our bond..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>
                            </div>

                            {{-- ==================== FORM 3: ROMANTIC / PARTNER / LOVE STORY (10 Questions) ==================== --}}
                            <div x-show="occasionCategory === 'romantic'" class="space-y-3.5">
                                <div class="p-1">
                                    <span class="text-[10px] font-bold tracking-wider uppercase opacity-60 block mb-1">Romantic & Love Story Questions</span>
                                </div>

                                {{-- Q1 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        1. Your Name
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        What should we call you? This helps us know who is sharing the story with us.
                                    </p>
                                    <input 
                                        type="text" 
                                        name="questions[1. Your Name]" 
                                        placeholder="Your name"
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    >
                                </div>

                                {{-- Q2 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        2. Who is this song for?
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Tell us their name and the names you call them (Their full name, nickname, pet name, or even a funny name only you use for them).
                                    </p>
                                    <input 
                                        type="text" 
                                        name="questions[2. Who is this song for?]" 
                                        placeholder="e.g. Maya (or 'Bubu', 'Sunny', 'My lady')..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    >
                                </div>

                                {{-- Q3 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        3. What is this song being made for?
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        What is happening, and why did you want to give them a song now? (Proposal, Valentine’s Day, wedding, anniversary, birthday, apology, long distance, missing them, or simply because you wanted to say something special).
                                    </p>
                                    <textarea 
                                        name="questions[3. What is this song being made for?]" 
                                        rows="2" 
                                        placeholder="e.g. Planning a surprise sunset proposal by the beach, and I want our love story in a song before I get on one knee..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q4 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        4. Take us back to the beginning.
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        How did the two of you meet, and what do you remember about those early days? (Where you met, your first conversation, first impression, how you started talking, your first date, or the moment you realized there was something between you).
                                    </p>
                                    <textarea 
                                        name="questions[4. Take us back to the beginning]" 
                                        rows="3" 
                                        placeholder="e.g. Met at a cozy bookstore café on a rainy Tuesday. She accidentally took my umbrella, and when our eyes met..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q5 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        5. Tell us about the moments you would want to live through again.
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Share 2–4 memories that still make you smile, laugh, feel emotional, or simply think of them (First date, a trip, late-night conversation, a surprise, a silly mistake, a difficult day you got through together, your wedding day, or an ordinary day that became special).
                                    </p>
                                    <textarea 
                                        name="questions[5. Tell us about the moments you would want to live through again]" 
                                        rows="3" 
                                        placeholder="e.g. 1) Dancing barefoot in the living room at 2 AM. 2) Getting lost in the streets of Manali with no cell service. 3) The way she held my hand when my father was unwell..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q6 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        6. What are the little things about them that you know better than anyone else?
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Tell us the details that belong to them — and to your relationship (The way they smile, call you, something they always say, morning habit, food they love, way they get angry, how they tease you, a song they love, an inside joke).
                                    </p>
                                    <textarea 
                                        name="questions[6. What are the little things about them that you know better than anyone else?]" 
                                        rows="3" 
                                        placeholder="e.g. How her nose scrunches when she laughs hard, her habit of stealing my oversized hoodies, ordering dessert first..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q7 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        7. Was there a moment when you realized how much they meant to you?
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Tell us about that moment, if you remember one (Maybe when they stood beside you during a difficult time, something they did for you, a time when you missed them, or simply a moment when you looked at them and thought, “This is my person”).
                                    </p>
                                    <textarea 
                                        name="questions[7. Was there a moment when you realized how much they meant to you?]" 
                                        rows="3" 
                                        placeholder="e.g. When I was sick in bed for a week, and she quietly showed up with homemade soup and read my favorite book aloud until I fell asleep..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q8 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        8. If you could tell them something without worrying about how it sounds, what would you say?
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        Write it exactly as it comes to you (It could be “I love you,” “I'm sorry,” “Thank you for staying,” “You changed my life,” “I'm proud of us,” “I'll still remember…,” or something you have never been able to say properly).
                                    </p>
                                    <textarea 
                                        name="questions[8. If you could tell them something without worrying about how it sounds, what would you say?]" 
                                        rows="3" 
                                        placeholder="e.g. You made this world feel like home to me. I would choose you in every lifetime..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q9 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        9. When you imagine the two of you years from now, what do you see?
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        What do you hope your story still looks like? (Growing old together, getting married, raising a family, travelling, building a home, sitting together with coffee when you're old, or still having the same little moments).
                                    </p>
                                    <textarea 
                                        name="questions[9. When you imagine the two of you years from now, what do you see?]" 
                                        rows="3" 
                                        placeholder="e.g. Sitting on a wooden porch with gray hair and warm tea, still laughing at the exact same jokes..."
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    ></textarea>
                                </div>

                                {{-- Q10 --}}
                                <div>
                                    <label class="block text-[12px] font-bold mb-0.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        10. When they hear this song for the first time, what do you hope stays with them?
                                    </label>
                                    <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                        What do you want them to feel or remember after the song ends? (Loved, emotional, happy, proud, appreciated, nostalgic, surprised, or simply reminded of the two of you).
                                    </p>
                                    <input 
                                        type="text" 
                                        name="questions[10. When they hear this song for the first time, what do you hope stays with them?]" 
                                        placeholder="e.g. Overwhelmed with love, happy tears, knowing they are deeply cherished"
                                        class="w-full rounded-xl p-3 text-[12.5px] transition-all focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                    >
                                </div>
                            </div>

                            {{-- ==================== SHARED: OPTIONAL UPLOAD SECTION ==================== --}}
                            <div 
                                class="p-4 rounded-2xl border transition-all duration-300"
                                :class="selectedPlan === 'premium' 
                                    ? 'bg-white/[0.05] border-white/15 text-white' 
                                    : 'bg-white border-pink-100 text-brand-dark shadow-xs'"
                            >
                                <div class="flex items-center justify-between mb-1">
                                    <label class="text-[12px] font-bold flex items-center gap-1.5"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                        <span>📎 Optional Upload</span>
                                        <span class="text-[10px] font-normal opacity-70">(Photos, letters, audio, notes)</span>
                                    </label>
                                    <span 
                                        class="text-[10.5px] font-semibold"
                                        :class="selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-[#c02d4b]'"
                                        x-show="uploadedFilesCount > 0"
                                        x-text="uploadedFilesCount + ' file(s) selected'"
                                    ></span>
                                </div>
                                <p class="text-[11px] mb-3 leading-relaxed transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    Photos, videos, screenshots, letters, old photographs, certificates, presentations, or anything else that helps us understand the story.
                                </p>

                                <label class="block border-2 border-dashed rounded-xl p-4 text-center cursor-pointer transition-all hover:opacity-90"
                                    :class="selectedPlan === 'premium' 
                                        ? 'border-white/20 bg-white/[0.04] hover:bg-white/[0.08] hover:border-[#ECC15E]/50 text-white/80' 
                                        : 'border-pink-200 bg-pink-50/40 hover:bg-pink-50 hover:border-[#c02d4b]/50 text-brand-dark/80'"
                                >
                                    <input 
                                        type="file" 
                                        name="attachments[]" 
                                        multiple 
                                        @change="handleFileChange($event)"
                                        accept="image/*,video/*,.pdf,.doc,.docx,.txt"
                                        class="hidden"
                                    >
                                    <div class="flex flex-col items-center justify-center gap-1.5 py-1">
                                        <svg class="w-6 h-6 opacity-70" :class="selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-[#c02d4b]'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                        </svg>
                                        <div class="text-[12px] font-semibold">
                                            <span x-show="uploadedFilesCount === 0">Click to upload photos, documents or videos</span>
                                            <span x-show="uploadedFilesCount > 0" class="text-emerald-500 font-bold" x-text="uploadedFilesCount + ' file(s) ready to send'"></span>
                                        </div>
                                        <span class="text-[10px] opacity-60">PNG, JPG, MP4, PDF, DOCX up to 30MB each</span>
                                    </div>
                                </label>
                            </div>

                            {{-- Optional: Freeform Story Additional Notes --}}
                            <div class="pt-1">
                                <details class="group">
                                    <summary class="text-[11.5px] font-semibold cursor-pointer select-none flex items-center gap-1.5 transition-colors opacity-80 hover:opacity-100"
                                        :class="selectedPlan === 'premium' ? 'text-amber-200' : 'text-[#c02d4b]'">
                                        <span>+ Add any extra notes or freeform story (optional)</span>
                                    </summary>
                                    <div class="mt-2.5">
                                        <textarea 
                                            name="story" 
                                            rows="3" 
                                            placeholder="Any other specific instructions, pronunciations, preferred song tempo, or details..."
                                            class="w-full rounded-xl p-3 text-[12.5px] transition-all resize-y focus:outline-none"
                                            :class="selectedPlan === 'premium' 
                                                ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                                : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                        ></textarea>
                                    </div>
                                </details>
                            </div>

                            {{-- Step 2 Actions --}}
                            <div class="pt-2 flex flex-col sm:flex-row items-center gap-3">
                                <button 
                                    type="button" 
                                    @click="step = 1" 
                                    class="w-full sm:w-auto py-2.5 sm:py-3 px-5 rounded-full font-medium text-[13px] transition-colors flex items-center justify-center gap-1.5 shadow-xs cursor-pointer"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white hover:bg-white/20' 
                                        : 'bg-white border border-gray-300 text-gray-700 hover:bg-gray-50'"
                                >
                                    <span>←</span> Back to details
                                </button>

                                <button 
                                    type="submit" 
                                    class="w-full sm:w-auto py-2.5 sm:py-3 px-7 rounded-full font-semibold text-[13px] transition-all flex items-center justify-center gap-2 group cursor-pointer"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-gradient-to-r from-[#B8841B] via-[#DCA838] to-[#A27010] text-[#241002] hover:brightness-105 shadow-md shadow-[#B8841B]/30 border border-[#ECC15E]/60' 
                                        : 'bg-gradient-to-r from-brand-pink to-[#E11D48] text-white hover:brightness-105 shadow-md shadow-brand-pink/25'"
                                >
                                    <span>Submit my song story</span> <span class="group-hover:translate-x-1 transition-transform">→</span>
                                </button>
                                
                                <a 
                                    href="https://wa.me/?text=Hi%20Heartgrams%2C%20I%20would%20like%20to%20create%20a%20song" 
                                    target="_blank" 
                                    class="w-full sm:w-auto py-2.5 sm:py-3 px-5 rounded-full font-medium text-[13px] transition-colors flex items-center justify-center gap-1.5 shadow-xs"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white hover:bg-white/20' 
                                        : 'bg-white border border-gray-300 text-gray-600 hover:bg-gray-50 hover:text-gray-900'"
                                >
                                    <svg class="w-3.5 h-3.5" :class="selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-gray-500'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
                                    Chat on WhatsApp
                                </a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </section>
    </div>



    {{-- FAQ Section --}}
    <section id="faq" class="pt-12 sm:pt-14 pb-0 relative overflow-hidden bg-brand-light">
        {{-- Subtle ambient glow --}}
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[550px] h-[350px] bg-rose-200/25 blur-[120px] rounded-full pointer-events-none"></div>

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-10 sm:mb-12 relative">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white text-crimson-600 text-[10px] font-bold tracking-[0.2em] uppercase mb-4 shadow-[0_2px_10px_rgba(200,50,80,0.04)] border border-pink-100/80">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    FREQUENTLY ASKED
                </div>
                
                <h2 class="font-display text-3xl sm:text-4xl md:text-[44px] font-semibold text-brand-dark tracking-tight leading-tight flex items-center justify-center gap-2 flex-wrap relative">
                    <span class="relative inline-block">
                        {{-- Decorative spark left --}}
                        <span class="absolute -left-6 sm:-left-7 -top-2.5 sm:-top-3 text-brand-dark/50 rotate-[-15deg]">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                <path d="M12 2v4M6 6l2.5 2.5M3 12h4" />
                            </svg>
                        </span>
                        Questions?
                    </span>
                    <span class="relative inline-block text-crimson-500 font-serif italic">
                        We have answers.
                        {{-- Decorative drawn heart right --}}
                        <span class="absolute -right-7 sm:-right-8 top-0.5 text-crimson-400">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </span>
                    </span>
                </h2>
                
                <div class="flex items-center justify-center gap-3 mt-4">
                    <div class="h-px bg-gradient-to-r from-transparent to-pink-200/80 w-16"></div>
                    <span class="text-crimson-500 text-xs">♥</span>
                    <div class="h-px bg-gradient-to-l from-transparent to-pink-200/80 w-16"></div>
                </div>
            </div>

            <div class="space-y-3 sm:space-y-3.5 max-w-2xl mx-auto" x-data="{ openFaq: null }">
                @php
                    $faqs = [
                        (object) [
                            'question' => 'How long does it take?', 
                            'answer' => 'Heartgrams Standard is delivered within 3–5 days, while Heartgrams Premium offers priority 1–2 days express delivery via email and WhatsApp.'
                        ],
                        (object) [
                            'question' => 'Can I choose the genre?', 
                            'answer' => 'Yes! You can choose from acoustic melody, romantic ballad, soulful indie, upbeat pop, classical acoustic, and more to match your story’s emotion.'
                        ],
                        (object) [
                            'question' => 'Will I own the rights to the song?', 
                            'answer' => 'Yes, you receive full personal use rights forever to play, download, keep, and share with your loved ones.'
                        ],
                        (object) [
                            'question' => 'What if I want changes?', 
                            'answer' => 'We want your Heartgram to feel just right. You receive lyric options before final production, and we accommodate revisions so every line resonates.'
                        ]
                    ];
                @endphp
                @foreach($faqs as $index => $faq)
                    <div 
                        class="rounded-[1.25rem] sm:rounded-[1.4rem] border transition-all duration-300 overflow-hidden bg-white"
                        :class="openFaq === {{ $index }} 
                            ? 'border-pink-300/90 shadow-[0_10px_28px_rgba(200,50,80,0.08)] ring-1 ring-pink-200/50' 
                            : 'border-pink-100/80 shadow-[0_2px_12px_rgba(200,50,80,0.03)] hover:border-pink-200 hover:shadow-[0_6px_22px_rgba(200,50,80,0.06)] hover:-translate-y-0.5'"
                    >
                        <button
                            @click="openFaq = openFaq === {{ $index }} ? null : {{ $index }}"
                            class="w-full flex items-center justify-between px-5 py-4 sm:px-6 sm:py-4.5 text-left group transition-colors cursor-pointer select-none"
                        >
                            <div class="flex items-center gap-3.5 sm:gap-4 pr-3">
                                <div 
                                    class="w-7 h-7 sm:w-8 sm:h-8 rounded-full flex items-center justify-center font-bold text-xs shrink-0 transition-all duration-300 border"
                                    :class="openFaq === {{ $index }} 
                                        ? 'bg-crimson-500 text-white border-crimson-500 shadow-xs' 
                                        : 'bg-pink-50 text-crimson-600 border-pink-100/80 group-hover:bg-pink-100'"
                                >
                                    ?
                                </div>
                                <span 
                                    class="font-medium text-brand-dark text-[15px] sm:text-[16px] transition-colors leading-snug"
                                    :class="openFaq === {{ $index }} ? 'text-crimson-600 font-semibold' : 'group-hover:text-crimson-600'"
                                >
                                    {{ $faq->question }}
                                </span>
                            </div>
                            
                            <div 
                                class="w-7 h-7 sm:w-8 sm:h-8 rounded-full flex items-center justify-center shrink-0 transition-all duration-300 border"
                                :class="openFaq === {{ $index }} 
                                    ? 'bg-crimson-500 text-white border-crimson-500 rotate-45' 
                                    : 'bg-pink-50 text-crimson-500 border-pink-100/70 group-hover:bg-pink-100 group-hover:border-pink-200'"
                            >
                                <svg class="w-3.5 h-3.5 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                </svg>
                            </div>
                        </button>
                        
                        <div x-show="openFaq === {{ $index }}" x-collapse>
                            <div class="px-5 pb-5 sm:px-6 sm:pb-5 pt-0.5 ml-0 sm:ml-12">
                                <div class="h-px w-full bg-gradient-to-r from-pink-200/80 via-pink-100/50 to-transparent mb-3"></div>
                                <div class="text-[14px] sm:text-[14.5px] text-brand-dark/75 leading-relaxed pr-4 font-normal">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Privacy Promise Section --}}
    <section class="pt-4 pb-16 lg:pb-20 relative overflow-hidden bg-brand-light flex justify-center">
        <div class="max-w-5xl w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-[#FFF1F2] rounded-[2rem] p-8 md:p-12 lg:p-14 flex flex-col md:flex-row gap-10 md:gap-16 items-center shadow-sm">
                
                {{-- Left Content --}}
                <div class="w-full md:w-1/2 flex flex-col items-start">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white text-[#c02d4b] text-[10px] font-bold tracking-[0.15em] uppercase mb-6 shadow-sm border border-pink-100/60">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        PRIVACY PROMISE
                    </div>
                    
                    <h2 class="font-serif text-3xl lg:text-4xl font-normal text-brand-dark mb-5 leading-tight">
                        Your story stays yours.
                    </h2>
                    
                    <p class="text-[14px] text-brand-dark/70 leading-relaxed font-medium mb-8">
                        Some stories are too personal to be public. Heartgrams uses your details only to create your song. We don't share your story, lyrics, audio, photos, or memories publicly without your permission.
                    </p>
                    
                    <a href="#start" class="py-3.5 px-7 rounded-full bg-[#c02d4b] text-white font-medium text-[14px] hover:bg-[#a62540] transition-colors flex items-center justify-center gap-2 group shadow-md">
                        Create My Private Song <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                </div>

                {{-- Right Content (Features) --}}
                <div class="w-full md:w-1/2 flex flex-col justify-center">
                    <ul class="space-y-6 text-[13px] text-brand-dark/80 font-medium">
                        <li class="flex items-start gap-4">
                            <div class="bg-[#c02d4b] text-white rounded-full w-5 h-5 flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                                <span class="text-[10px] leading-none font-bold">✓</span>
                            </div>
                            Private story handling — only our song team sees your details
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="bg-[#c02d4b] text-white rounded-full w-5 h-5 flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                                <span class="text-[10px] leading-none font-bold">✓</span>
                            </div>
                            Public samples only with your explicit permission
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="bg-[#c02d4b] text-white rounded-full w-5 h-5 flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                                <span class="text-[10px] leading-none font-bold">✓</span>
                            </div>
                            Personal details used only for your song creation
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="bg-[#c02d4b] text-white rounded-full w-5 h-5 flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                                <span class="text-[10px] leading-none font-bold">✓</span>
                            </div>
                            WhatsApp support for any sensitive instructions
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="bg-[#c02d4b] text-white rounded-full w-5 h-5 flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                                <span class="text-[10px] leading-none font-bold">✓</span>
                            </div>
                            Secure payment flow — confirmed before production starts
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    {{-- Founder Story Section --}}
    <section class="py-24 relative overflow-hidden bg-brand-black">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-16 lg:gap-24 items-center">
                
                {{-- Left Content --}}
                <div class="w-full lg:w-1/2 lg:pr-8">
                    <h4 class="text-[11px] font-bold tracking-[0.2em] text-[#D4AF37] mb-6 uppercase">
                        Founder Story
                    </h4>
                    
                    <h2 class="font-serif text-4xl md:text-5xl font-normal text-white mb-8 leading-tight">
                        Why Heartgrams exists.
                    </h2>
                    
                    <div class="space-y-6 text-[15px] text-white/70 leading-relaxed">
                        <p>
                            Heartgrams was founded by <span class="text-white font-medium">Hilaary James</span> with one simple thought: many people love deeply, but they do not always say it.
                        </p>
                        <p>
                            Life moves fast — work, distance, screens, small fights, daily routines. Even when someone is close to us, the words in our heart may stay unsaid.
                        </p>
                        <p>
                            Hilaary created Heartgrams to help people <span class="text-white font-medium">say those words</span> in a beautiful way — a birthday wish, a proposal, an apology, or a memory turned into a song for the person you love.
                        </p>
                    </div>
                </div>

                {{-- Right Content (Card) --}}
                <div class="w-full lg:w-1/2">
                    <div class="bg-[#1A1313] border border-white/5 rounded-3xl p-10 md:p-12 relative shadow-2xl">
                        {{-- Quote Icon --}}
                        <div class="text-[#D4AF37] text-6xl font-serif leading-none absolute top-10 left-10 opacity-80">
                            "
                        </div>
                        
                        <div class="pt-10 mb-10 relative z-10">
                            <h3 class="font-serif text-[22px] md:text-2xl text-white/90 italic leading-snug">
                                Some feelings are too important to remain unsaid.
                            </h3>
                        </div>
                        
                        {{-- Author --}}
                        <div class="flex items-center gap-4 mb-10">
                            <div class="w-12 h-12 rounded-full bg-[#c02d4b] flex items-center justify-center text-white font-serif text-xl shrink-0">
                                H
                            </div>
                            <div>
                                <h4 class="text-white text-[15px] font-medium">Hilaary James</h4>
                                <p class="text-white/40 text-[13px]">Founder, Heartgrams</p>
                            </div>
                        </div>
                        
                        <div class="h-px w-full bg-white/5 mb-8"></div>
                        
                        <div>
                            <h5 class="text-[10px] font-bold tracking-[0.15em] text-[#D4AF37] mb-3 uppercase">
                                The Gift That Lasts Forever
                            </h5>
                            <p class="text-[13px] text-white/60 leading-relaxed">
                                Some gifts are opened. This one is <span class="text-white/80 italic">felt forever</span> — played again at 2am, shared with a parent, cried to alone. A Heartgram outlives any moment.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Final CTA Section --}}
    <section class="relative overflow-hidden py-24 sm:py-28 md:py-32 text-center px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-[#8F162E] via-[#A81E3B] to-[#6A0E22]">
        {{-- Subtle Hairline Borders --}}
        <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-white/25 to-transparent pointer-events-none"></div>
        <div class="absolute bottom-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-black/30 to-transparent pointer-events-none"></div>

        {{-- Radial Ambient Lighting & Vignette --}}
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_75%_55%_at_50%_35%,rgba(255,200,215,0.20),transparent_75%)] pointer-events-none"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_95%_95%_at_50%_100%,rgba(35,5,12,0.45),transparent_65%)] pointer-events-none"></div>

        {{-- Glowing Ambient Light Orbs --}}
        <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[540px] h-[340px] bg-rose-400/20 rounded-full blur-[110px] pointer-events-none"></div>
        <div class="absolute -bottom-24 -left-20 w-[380px] h-[380px] bg-rose-600/30 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-20 w-[380px] h-[380px] bg-amber-400/15 rounded-full blur-[100px] pointer-events-none"></div>

        {{-- Delicate Decorative Watermarks (Heart & Musical Flourish) --}}
        <svg class="absolute -top-12 -right-16 w-80 h-80 text-white/[0.04] pointer-events-none transform rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
        <svg class="absolute -bottom-10 -left-12 w-64 h-64 text-white/[0.035] pointer-events-none transform -rotate-12" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z" />
        </svg>

        {{-- Floating Magic Sparkles --}}
        <span class="absolute top-16 left-[15%] text-rose-200/40 text-lg pointer-events-none hidden md:inline-block animate-pulse">✦</span>
        <span class="absolute bottom-20 right-[15%] text-amber-200/40 text-xl pointer-events-none hidden md:inline-block animate-pulse" style="animation-delay: 1s;">✦</span>

        <div class="max-w-3xl mx-auto relative z-10">
            {{-- Eyebrow Badge --}}
            <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/[0.10] backdrop-blur-md border border-white/20 shadow-[0_2px_12px_rgba(0,0,0,0.12)] mb-6">
                <span class="w-1.5 h-1.5 rounded-full bg-rose-300 animate-pulse"></span>
                <span class="text-[10px] sm:text-[11px] font-bold tracking-[0.25em] text-[#fdedeb] uppercase">
                    Ready when you are
                </span>
                <span class="text-rose-200/60 text-[10px]">✦</span>
            </div>

            {{-- Heading with Editorial Serif Typography --}}
            <h2 class="font-serif text-3xl sm:text-4xl md:text-5xl lg:text-[52px] font-normal text-white mb-5 leading-[1.18] tracking-tight drop-shadow-[0_2px_18px_rgba(0,0,0,0.22)]">
                Some feelings deserve <span class="italic font-light font-serif text-rose-100 drop-shadow-[0_2px_10px_rgba(255,255,255,0.15)]">more than a message.</span>
            </h2>

            {{-- Subtitle --}}
            <p class="text-[15px] sm:text-base md:text-lg text-rose-100/90 font-light max-w-xl mx-auto mb-10 leading-relaxed drop-shadow-sm">
                Turn your memory into a song they can keep, replay, and feel again.
            </p>

            {{-- Call To Action Buttons --}}
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                {{-- Primary Button --}}
                <a href="#start" class="w-full sm:w-auto py-4 px-8 rounded-full bg-white text-[#8F162E] font-semibold text-[14.5px] shadow-[0_12px_32px_rgba(0,0,0,0.25),0_1px_2px_rgba(255,255,255,0.8)_inset] hover:shadow-[0_18px_42px_rgba(0,0,0,0.35)] hover:bg-[#fff9f8] hover:-translate-y-0.5 active:translate-y-0 transition-all duration-300 flex items-center justify-center gap-2.5 group">
                    <span>Start My Song Story</span>
                    <span class="inline-block font-sans text-base transition-transform duration-300 group-hover:translate-x-1">→</span>
                </a>

                {{-- Secondary WhatsApp Button --}}
                <a href="https://wa.me/?text=Hi%20Heartgrams%2C%20I%20would%20like%20to%20create%20a%20song" target="_blank" class="w-full sm:w-auto py-4 px-8 rounded-full bg-white/[0.08] hover:bg-white/[0.18] backdrop-blur-md border border-white/30 hover:border-white/60 text-white font-medium text-[14.5px] shadow-[0_8px_25px_rgba(0,0,0,0.12)] hover:-translate-y-0.5 active:translate-y-0 transition-all duration-300 flex items-center justify-center gap-2.5 group">
                    <svg class="w-4 h-4 text-emerald-300 transition-transform duration-300 group-hover:scale-110 shrink-0" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                    </svg>
                    <span>Chat on WhatsApp</span>
                </a>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        function audioSampler() {
            return {
                activeCategory: 0,
                isPlaying: false,
                currentTitle: 'A Birthday Heartgram',
                currentMeta: '60-second sample · original composition',
                currentTime: '00:00 / 1:00',
                @php
                    $categoriesData = [
                        [
                            'name' => 'Love',
                            'samples' => [
                                ['title' => 'Sample 1', 'audio' => '#', 'language' => 'English']
                            ]
                        ]
                    ];
                @endphp
                categories: @json($categoriesData),
                selectCategory(index) {
                    this.activeCategory = index;
                    this.isPlaying = false;
                    const cat = this.categories[index];
                    if (cat && cat.samples.length > 0) {
                        const sample = cat.samples[0];
                        this.currentTitle = 'A ' + cat.name + ' Heartgram';
                        this.currentMeta = '60-second sample · original composition';
                    } else {
                        this.currentTitle = 'A ' + cat.name + ' Heartgram';
                        this.currentMeta = 'Sample coming soon';
                    }
                },
                togglePlay() {
                    this.isPlaying = !this.isPlaying;
                }
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // ==========================================
            // 1. HERO AUDIO PLAYER CONTROLLER
            // ==========================================
            const heroAudio = document.getElementById('heroAudio');
            const heroPlayBtn = document.getElementById('heroPlayBtn');
            const heroPlayIcon = document.getElementById('heroPlayIcon');
            const heroPauseIcon = document.getElementById('heroPauseIcon');
            const heroPrevBtn = document.getElementById('heroPrevBtn');
            const heroNextBtn = document.getElementById('heroNextBtn');
            const heroShuffleBtn = document.getElementById('heroShuffleBtn');
            const heroRepeatBtn = document.getElementById('heroRepeatBtn');
            const heroProgressBar = document.getElementById('heroProgressBar');
            const heroProgressFill = document.getElementById('heroProgressFill');
            const heroProgressDot = document.getElementById('heroProgressDot');
            const heroCurrentTime = document.getElementById('heroCurrentTime');
            const heroDurationTime = document.getElementById('heroDurationTime');
            const heroVinylRecord = document.getElementById('heroVinylRecord');
            const heroWaveformContainer = document.getElementById('heroWaveformContainer');
            const heroWaveformBars = document.querySelectorAll('.hero-waveform-bar');
            const heroAlbumArt = document.getElementById('heroAlbumArt');
            const heroTitleLine1 = document.getElementById('heroTitleLine1');
            const heroTitleLine2 = document.getElementById('heroTitleLine2');

            const heroTracks = [
                {
                    title1: "For Amma,",
                    title2: "on her 60th.",
                    image: "{{ asset('images/album_art_amma.png') }}",
                    audio: "{{ asset('audio/sample_amma.wav') }}",
                    alt: "For Amma, on her 60th"
                },
                {
                    title1: "25 Years of Us,",
                    title2: "Silver Jubilee.",
                    image: "{{ asset('images/anniversary.png') }}",
                    audio: "{{ asset('audio/sample_anniversary.wav') }}",
                    alt: "25 Years of Us, Anniversary Song"
                },
                {
                    title1: "Our First Dance,",
                    title2: "Wedding Day.",
                    image: "{{ asset('images/wedding.png') }}",
                    audio: "{{ asset('audio/sample_wedding.wav') }}",
                    alt: "Our First Dance, Wedding Song"
                }
            ];

            let currentTrackIndex = 0;
            let isHeroPlaying = false;
            let isShuffle = false;
            let isRepeat = false;
            let vinylRotation = 0;
            let vinylAnimFrame = null;
            let waveformAnimInterval = null;

            const formatTime = (time) => {
                if (isNaN(time) || time < 0) return '00:00';
                const minutes = Math.floor(time / 60);
                const seconds = Math.floor(time % 60);
                return `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            };

            const updateDurationDisplay = () => {
                if (heroAudio && !isNaN(heroAudio.duration) && heroAudio.duration > 0) {
                    heroDurationTime.textContent = formatTime(heroAudio.duration);
                }
            };

            const spinVinyl = () => {
                if (!isHeroPlaying) return;
                vinylRotation = (vinylRotation + 0.8) % 360;
                if (heroVinylRecord) {
                    heroVinylRecord.style.transform = `rotate(${vinylRotation}deg)`;
                }
                vinylAnimFrame = requestAnimationFrame(spinVinyl);
            };

            const startWaveformAnim = () => {
                clearInterval(waveformAnimInterval);
                waveformAnimInterval = setInterval(() => {
                    heroWaveformBars.forEach((bar, idx) => {
                        const wave = Math.sin((Date.now() / 200) + (idx * 0.3));
                        const heightPct = Math.floor(25 + (Math.abs(wave) * 60) + (Math.random() * 15));
                        bar.style.height = `${heightPct}%`;
                        bar.style.opacity = '0.95';
                    });
                }, 100);
            };

            const stopWaveformAnim = () => {
                clearInterval(waveformAnimInterval);
                heroWaveformBars.forEach((bar) => {
                    bar.style.height = `${Math.floor(Math.random() * 45 + 20)}%`;
                    bar.style.opacity = '0.7';
                });
            };

            const setHeroPlayState = (playing) => {
                isHeroPlaying = playing;
                if (heroPlayIcon && heroPauseIcon) {
                    if (playing) {
                        heroPlayIcon.classList.add('hidden');
                        heroPauseIcon.classList.remove('hidden');
                        if (!vinylAnimFrame) spinVinyl();
                        startWaveformAnim();
                    } else {
                        heroPlayIcon.classList.remove('hidden');
                        heroPauseIcon.classList.add('hidden');
                        if (vinylAnimFrame) {
                            cancelAnimationFrame(vinylAnimFrame);
                            vinylAnimFrame = null;
                        }
                        stopWaveformAnim();
                    }
                }
            };

            const loadHeroTrack = (index, autoPlay = false) => {
                currentTrackIndex = index;
                const track = heroTracks[currentTrackIndex];
                
                // Visual updates
                if (heroAlbumArt) {
                    heroAlbumArt.style.opacity = '0.3';
                    setTimeout(() => {
                        heroAlbumArt.src = track.image;
                        heroAlbumArt.alt = track.alt;
                        heroAlbumArt.style.opacity = '1';
                    }, 150);
                }
                if (heroTitleLine1) heroTitleLine1.textContent = track.title1;
                if (heroTitleLine2) heroTitleLine2.textContent = track.title2;

                // Audio source
                heroAudio.pause();
                heroAudio.src = track.audio;
                heroAudio.currentTime = 0;
                heroProgressFill.style.width = '0%';
                heroProgressDot.style.left = '0%';
                heroCurrentTime.textContent = '00:00';
                heroAudio.load();

                if (autoPlay) {
                    pausePreviewPlayer();
                    heroAudio.play()
                        .then(() => setHeroPlayState(true))
                        .catch(() => setHeroPlayState(false));
                } else {
                    setHeroPlayState(false);
                }
            };

            // Audio Events
            heroAudio.addEventListener('loadedmetadata', updateDurationDisplay);
            heroAudio.addEventListener('durationchange', updateDurationDisplay);
            heroAudio.addEventListener('canplay', updateDurationDisplay);

            // Play / Pause Toggle
            heroPlayBtn.addEventListener('click', () => {
                if (isHeroPlaying) {
                    heroAudio.pause();
                    setHeroPlayState(false);
                } else {
                    pausePreviewPlayer();
                    heroAudio.play()
                        .then(() => setHeroPlayState(true))
                        .catch((err) => {
                            console.warn("Hero audio playback error:", err);
                            setHeroPlayState(false);
                        });
                }
            });

            // Next Track Button
            heroNextBtn.addEventListener('click', () => {
                let nextIndex;
                if (isShuffle && heroTracks.length > 1) {
                    do {
                        nextIndex = Math.floor(Math.random() * heroTracks.length);
                    } while (nextIndex === currentTrackIndex);
                } else {
                    nextIndex = (currentTrackIndex + 1) % heroTracks.length;
                }
                loadHeroTrack(nextIndex, isHeroPlaying);
            });

            // Previous Track Button
            heroPrevBtn.addEventListener('click', () => {
                if (heroAudio.currentTime > 2) {
                    heroAudio.currentTime = 0;
                } else {
                    let prevIndex;
                    if (isShuffle && heroTracks.length > 1) {
                        do {
                            prevIndex = Math.floor(Math.random() * heroTracks.length);
                        } while (prevIndex === currentTrackIndex);
                    } else {
                        prevIndex = (currentTrackIndex - 1 + heroTracks.length) % heroTracks.length;
                    }
                    loadHeroTrack(prevIndex, isHeroPlaying);
                }
            });

            // Shuffle Button Toggle
            heroShuffleBtn.addEventListener('click', () => {
                isShuffle = !isShuffle;
                if (isShuffle) {
                    heroShuffleBtn.classList.add('text-pink-400', 'bg-white/10', 'ring-1', 'ring-pink-400/50');
                    heroShuffleBtn.classList.remove('text-white/40');
                } else {
                    heroShuffleBtn.classList.remove('text-pink-400', 'bg-white/10', 'ring-1', 'ring-pink-400/50');
                    heroShuffleBtn.classList.add('text-white/40');
                }
            });

            // Repeat Button Toggle
            heroRepeatBtn.addEventListener('click', () => {
                isRepeat = !isRepeat;
                if (isRepeat) {
                    heroRepeatBtn.classList.add('text-pink-400', 'bg-white/10', 'ring-1', 'ring-pink-400/50');
                    heroRepeatBtn.classList.remove('text-white/40');
                } else {
                    heroRepeatBtn.classList.remove('text-pink-400', 'bg-white/10', 'ring-1', 'ring-pink-400/50');
                    heroRepeatBtn.classList.add('text-white/40');
                }
            });

            // Timeupdate (Progress bar & time text)
            heroAudio.addEventListener('timeupdate', () => {
                if (!heroAudio.duration || isNaN(heroAudio.duration)) return;
                const percent = (heroAudio.currentTime / heroAudio.duration) * 100;
                heroProgressFill.style.width = `${percent}%`;
                heroProgressDot.style.left = `${percent}%`;
                heroCurrentTime.textContent = formatTime(heroAudio.currentTime);
            });

            // Ended Event
            heroAudio.addEventListener('ended', () => {
                if (isRepeat) {
                    heroAudio.currentTime = 0;
                    heroAudio.play()
                        .then(() => setHeroPlayState(true))
                        .catch(() => setHeroPlayState(false));
                } else {
                    heroNextBtn.click();
                }
            });

            // Progress Bar Seek
            const seekHeroAudio = (clientX) => {
                const rect = heroProgressBar.getBoundingClientRect();
                const pos = Math.max(0, Math.min(1, (clientX - rect.left) / rect.width));
                if (!isNaN(heroAudio.duration) && heroAudio.duration > 0) {
                    heroAudio.currentTime = pos * heroAudio.duration;
                    heroProgressFill.style.width = `${pos * 100}%`;
                    heroProgressDot.style.left = `${pos * 100}%`;
                    heroCurrentTime.textContent = formatTime(heroAudio.currentTime);
                }
            };

            let isDraggingHeroSeek = false;
            heroProgressBar.addEventListener('mousedown', (e) => {
                isDraggingHeroSeek = true;
                seekHeroAudio(e.clientX);
            });
            window.addEventListener('mousemove', (e) => {
                if (isDraggingHeroSeek) seekHeroAudio(e.clientX);
            });
            window.addEventListener('mouseup', () => {
                isDraggingHeroSeek = false;
            });
            heroProgressBar.addEventListener('touchstart', (e) => {
                if (e.touches.length > 0) seekHeroAudio(e.touches[0].clientX);
            }, { passive: true });
            heroProgressBar.addEventListener('touchmove', (e) => {
                if (e.touches.length > 0) seekHeroAudio(e.touches[0].clientX);
            }, { passive: true });

            // Waveform Seek
            if (heroWaveformContainer) {
                heroWaveformContainer.addEventListener('click', (e) => {
                    const rect = heroWaveformContainer.getBoundingClientRect();
                    const pos = Math.max(0, Math.min(1, (e.clientX - rect.left) / rect.width));
                    if (!isNaN(heroAudio.duration) && heroAudio.duration > 0) {
                        heroAudio.currentTime = pos * heroAudio.duration;
                    }
                });
            }

            // ==========================================
            // 2. SECTION 2: INTERACTIVE PREVIEW PLAYER
            // ==========================================
            const previewAudio = document.getElementById('previewAudio');
            const previewPlayBtn = document.getElementById('previewPlayBtn');
            const previewPlayIcon = document.getElementById('previewPlayIcon');
            const previewPauseIcon = document.getElementById('previewPauseIcon');
            const previewWaveformBar = document.getElementById('previewWaveformBar');
            const previewWaveformBars = document.querySelectorAll('.preview-waveform-bar');
            const previewTime = document.getElementById('preview-time');

            let isPreviewPlaying = false;
            let previewWaveformInterval = null;

            const setPreviewPlayState = (playing) => {
                isPreviewPlaying = playing;
                if (previewPlayIcon && previewPauseIcon) {
                    if (playing) {
                        previewPlayIcon.classList.add('hidden');
                        previewPauseIcon.classList.remove('hidden');
                        clearInterval(previewWaveformInterval);
                        previewWaveformInterval = setInterval(() => {
                            previewWaveformBars.forEach((bar, idx) => {
                                const wave = Math.sin((Date.now() / 180) + (idx * 0.25));
                                bar.style.height = `${Math.floor(20 + Math.abs(wave) * 75)}%`;
                                bar.style.opacity = '0.9';
                            });
                        }, 120);
                    } else {
                        previewPlayIcon.classList.remove('hidden');
                        previewPauseIcon.classList.add('hidden');
                        clearInterval(previewWaveformInterval);
                        previewWaveformBars.forEach((bar) => {
                            bar.style.opacity = '0.6';
                        });
                    }
                }
            };

            const pausePreviewPlayer = () => {
                if (previewAudio && !previewAudio.paused) {
                    previewAudio.pause();
                    setPreviewPlayState(false);
                }
            };

            if (previewPlayBtn && previewAudio) {
                previewPlayBtn.addEventListener('click', () => {
                    if (isPreviewPlaying) {
                        previewAudio.pause();
                        setPreviewPlayState(false);
                    } else {
                        if (isHeroPlaying) {
                            heroAudio.pause();
                            setHeroPlayState(false);
                        }
                        previewAudio.play()
                            .then(() => setPreviewPlayState(true))
                            .catch((err) => {
                                console.warn("Preview playback error:", err);
                                setPreviewPlayState(false);
                            });
                    }
                });

                const updatePreviewDuration = () => {
                    if (previewAudio && !isNaN(previewAudio.duration) && previewAudio.duration > 0 && previewTime) {
                        previewTime.textContent = `${formatTime(previewAudio.currentTime)} / ${formatTime(previewAudio.duration)}`;
                    }
                };

                previewAudio.addEventListener('loadedmetadata', updatePreviewDuration);
                previewAudio.addEventListener('durationchange', updatePreviewDuration);
                previewAudio.addEventListener('canplay', updatePreviewDuration);

                previewAudio.addEventListener('timeupdate', () => {
                    if (!previewAudio.duration || isNaN(previewAudio.duration)) return;
                    if (previewTime) {
                        previewTime.textContent = `${formatTime(previewAudio.currentTime)} / ${formatTime(previewAudio.duration)}`;
                    }
                });

                previewAudio.addEventListener('ended', () => {
                    setPreviewPlayState(false);
                    previewAudio.currentTime = 0;
                    if (previewTime && !isNaN(previewAudio.duration)) {
                        previewTime.textContent = `00:00 / ${formatTime(previewAudio.duration)}`;
                    }
                });

                if (previewWaveformBar) {
                    previewWaveformBar.addEventListener('click', (e) => {
                        const rect = previewWaveformBar.getBoundingClientRect();
                        const pos = Math.max(0, Math.min(1, (e.clientX - rect.left) / rect.width));
                        if (!isNaN(previewAudio.duration) && previewAudio.duration > 0) {
                            previewAudio.currentTime = pos * previewAudio.duration;
                        }
                    });
                }
            }

            // Initial check for hero duration
            updateDurationDisplay();
        });
    </script>
    @endpush
</x-public-layout>
