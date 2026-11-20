<x-public-layout>
    <x-slot name="seoTags">
        <title>Heartgrams Blog | Song Gift Ideas and Stories of Love & Music</title>
        <meta name="description" content="Gift guides for birthdays, proposals and weddings, plus the stories behind songs we've made.">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    </x-slot>

    <div class="bg-brand-light min-h-screen">

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
                
                {{-- Rich Gold Sparks & Sparkles Constellation --}}
                {{-- Left Flank Sparks --}}
                <div class="blog-spark top-[12%] left-[6%] w-2 h-2 rounded-full bg-[#f3d179] shadow-[0_0_8px_rgba(243,209,121,0.85)]" style="--twinkle-dur: 2.7s; --twinkle-del: 0.2s;"></div>
                <div class="blog-spark top-[20%] left-[15%] w-1.5 h-1.5 rounded-full bg-[#fce5a3]" style="--twinkle-dur: 3.4s; --twinkle-del: 1.1s;"></div>
                <div class="blog-spark top-[32%] left-[4%] w-2.5 h-2.5 rounded-full bg-[#f3d179] shadow-[0_0_10px_rgba(243,209,121,0.8)]" style="--twinkle-dur: 2.5s; --twinkle-del: 0.6s;"></div>
                <div class="blog-spark top-[45%] left-[12%] w-1.5 h-1.5 rounded-full bg-[#e6b04e]" style="--twinkle-dur: 3.8s; --twinkle-del: 1.8s;"></div>
                <div class="blog-spark top-[58%] left-[7%] w-2 h-2 rounded-full bg-[#f3d179] shadow-[0_0_8px_rgba(243,209,121,0.7)]" style="--twinkle-dur: 3.1s; --twinkle-del: 0.4s;"></div>
                <div class="blog-spark top-[70%] left-[16%] w-1.5 h-1.5 rounded-full bg-[#fce5a3]" style="--twinkle-dur: 3.6s; --twinkle-del: 1.5s;"></div>
                <div class="blog-spark top-[82%] left-[8%] w-2 h-2 rounded-full bg-[#f3d179]" style="--twinkle-dur: 2.9s; --twinkle-del: 0.9s;"></div>
                
                {{-- Center-Left Sparks --}}
                <div class="blog-spark top-[16%] left-[24%] w-1.5 h-1.5 rounded-full bg-[#ffffff] shadow-[0_0_6px_rgba(255,255,255,0.8)]" style="--twinkle-dur: 2.2s; --twinkle-del: 1.3s;"></div>
                <div class="blog-spark top-[28%] left-[28%] w-2 h-2 rounded-full bg-[#e6b04e]" style="--twinkle-dur: 3.3s; --twinkle-del: 0.5s;"></div>
                <div class="blog-spark top-[48%] left-[22%] w-2 h-2 rounded-full bg-[#f3d179] shadow-[0_0_8px_rgba(243,209,121,0.8)]" style="--twinkle-dur: 2.8s; --twinkle-del: 2.0s;"></div>
                <div class="blog-spark top-[66%] left-[26%] w-1.5 h-1.5 rounded-full bg-[#fce5a3]" style="--twinkle-dur: 3.5s; --twinkle-del: 0.8s;"></div>
                <div class="blog-spark top-[85%] left-[21%] w-2 h-2 rounded-full bg-[#f3d179]" style="--twinkle-dur: 3.0s; --twinkle-del: 1.7s;"></div>

                {{-- Center Sparks (High & Low of Text) --}}
                <div class="blog-spark top-[10%] left-[45%] w-1.5 h-1.5 rounded-full bg-[#f3d179]" style="--twinkle-dur: 3.2s; --twinkle-del: 1.4s;"></div>
                <div class="blog-spark top-[14%] left-[55%] w-2 h-2 rounded-full bg-[#fce5a3] shadow-[0_0_8px_rgba(243,209,121,0.7)]" style="--twinkle-dur: 2.6s; --twinkle-del: 0.3s;"></div>
                <div class="blog-spark top-[86%] left-[48%] w-2 h-2 rounded-full bg-[#f3d179] shadow-[0_0_8px_rgba(243,209,121,0.8)]" style="--twinkle-dur: 3.4s; --twinkle-del: 2.2s;"></div>

                {{-- Center-Right Sparks --}}
                <div class="blog-spark top-[15%] right-[25%] w-1.5 h-1.5 rounded-full bg-[#ffffff] shadow-[0_0_6px_rgba(255,255,255,0.8)]" style="--twinkle-dur: 2.4s; --twinkle-del: 0.7s;"></div>
                <div class="blog-spark top-[26%] right-[28%] w-2 h-2 rounded-full bg-[#f3d179] shadow-[0_0_8px_rgba(243,209,121,0.8)]" style="--twinkle-dur: 3.1s; --twinkle-del: 1.6s;"></div>
                <div class="blog-spark top-[44%] right-[22%] w-1.5 h-1.5 rounded-full bg-[#e6b04e]" style="--twinkle-dur: 3.7s; --twinkle-del: 2.4s;"></div>
                <div class="blog-spark top-[64%] right-[27%] w-2 h-2 rounded-full bg-[#fce5a3]" style="--twinkle-dur: 2.9s; --twinkle-del: 0.4s;"></div>
                <div class="blog-spark top-[84%] right-[22%] w-2 h-2 rounded-full bg-[#f3d179]" style="--twinkle-dur: 3.3s; --twinkle-del: 1.2s;"></div>

                {{-- Right Flank Sparks --}}
                <div class="blog-spark top-[12%] right-[14%] w-2 h-2 rounded-full bg-[#f3d179] shadow-[0_0_8px_rgba(243,209,121,0.85)]" style="--twinkle-dur: 2.6s; --twinkle-del: 1.0s;"></div>
                <div class="blog-spark top-[24%] right-[8%] w-2.5 h-2.5 rounded-full bg-[#fce5a3] shadow-[0_0_12px_rgba(243,209,121,0.9)]" style="--twinkle-dur: 3.2s; --twinkle-del: 0.5s;"></div>
                <div class="blog-spark top-[36%] right-[16%] w-1.5 h-1.5 rounded-full bg-[#e6b04e]" style="--twinkle-dur: 3.5s; --twinkle-del: 1.9s;"></div>
                <div class="blog-spark top-[50%] right-[6%] w-2 h-2 rounded-full bg-[#f3d179] shadow-[0_0_8px_rgba(243,209,121,0.8)]" style="--twinkle-dur: 2.8s; --twinkle-del: 0.8s;"></div>
                <div class="blog-spark top-[66%] right-[12%] w-1.5 h-1.5 rounded-full bg-[#fce5a3]" style="--twinkle-dur: 3.6s; --twinkle-del: 2.1s;"></div>
                <div class="blog-spark top-[78%] right-[5%] w-2 h-2 rounded-full bg-[#f3d179]" style="--twinkle-dur: 2.9s; --twinkle-del: 0.3s;"></div>
                <div class="blog-spark top-[88%] right-[14%] w-1.5 h-1.5 rounded-full bg-[#e6b04e]" style="--twinkle-dur: 3.4s; --twinkle-del: 1.5s;"></div>

                {{-- Starlight 4-Point Diamonds (✦) --}}
                <div class="blog-spark top-[22%] left-[10%] text-[#f3d179] text-sm select-none" style="--twinkle-dur: 3.0s; --twinkle-del: 0.9s;">✦</div>
                <div class="blog-spark top-[62%] left-[18%] text-[#fce5a3] text-xs select-none" style="--twinkle-dur: 3.8s; --twinkle-del: 1.7s;">✦</div>
                <div class="blog-spark top-[18%] right-[11%] text-[#f3d179] text-base select-none" style="--twinkle-dur: 2.7s; --twinkle-del: 0.4s;">✦</div>
                <div class="blog-spark top-[54%] right-[18%] text-[#fce5a3] text-xs select-none" style="--twinkle-dur: 3.5s; --twinkle-del: 2.2s;">✦</div>
                <div class="blog-spark top-[72%] right-[9%] text-[#f3d179] text-sm select-none" style="--twinkle-dur: 3.2s; --twinkle-del: 1.1s;">✦</div>

                {{-- Organic Burst Pulsing Sparks --}}
                <div class="absolute top-[28%] left-[13%] w-2 h-2 rounded-full bg-[#f3d179]/70 animate-ping" style="animation-duration: 3.5s;"></div>
                <div class="absolute top-[40%] right-[10%] w-2 h-2 rounded-full bg-[#f3d179]/70 animate-ping" style="animation-duration: 4.2s; animation-delay: 1.5s;"></div>
                <div class="absolute bottom-[24%] left-[24%] w-1.5 h-1.5 rounded-full bg-[#fce5a3]/60 animate-ping" style="animation-duration: 3.8s; animation-delay: 0.8s;"></div>
            </div>

            {{-- Hero Content Container --}}
            <div class="relative z-10 max-w-4xl mx-auto flex flex-col items-center justify-center my-auto">
                
                {{-- 1. Kicker Badge --}}
                <div class="mb-3 sm:mb-4">
                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-xs font-bold tracking-[0.2em] text-[#f3d179] uppercase shadow-lg shadow-black/25">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#f3d179] animate-pulse"></span>
                        HEARTGRAMS BLOG
                    </span>
                </div>

                {{-- 2. Grand Heading --}}
                <h1 class="font-serif text-3xl sm:text-4xl md:text-5xl font-medium text-white leading-tight mb-3 sm:mb-4 tracking-tight max-w-3xl">
                    Song gift ideas and stories of <span class="italic text-transparent bg-clip-text bg-gradient-to-r from-[#fce5a3] via-[#e6b04e] to-[#f3d179]">love & music.</span>
                </h1>

                {{-- 3. Evocative Subtitle --}}
                <p class="text-xs sm:text-sm md:text-base text-white/85 font-normal max-w-2xl sm:max-w-3xl mx-auto leading-relaxed mb-4">
                    Gift guides for birthdays, proposals and weddings, plus the stories behind songs we've made.
                </p>

            </div>

            {{-- 4. Scroll Down Indicator --}}
            <div class="relative z-10 pb-2 sm:pb-3 shrink-0">
                <a 
                    href="#articles-grid" 
                    class="inline-flex flex-col items-center gap-1.5 text-[11px] uppercase tracking-widest text-white/60 hover:text-[#f3d179] transition-all group">
                    <span class="font-medium text-[10px] sm:text-[11px]">Explore Articles</span>
                    <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-white/80 group-hover:bg-[#f3d179] group-hover:text-black group-hover:border-[#f3d179] group-hover:scale-110 transition-all shadow-md">
                        <svg class="w-3.5 h-3.5 group-hover:translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                </a>
            </div>

        </section>

        {{-- ========================================================
             ARTICLES GRID SECTION (REAL DATABASE POSTS ONLY)
             ======================================================== --}}
        <div id="articles-grid" class="py-10 sm:py-16 md:py-24 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 scroll-mt-24">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @forelse($posts as $post)
                    <a href="{{ route('blog.show', $post->slug) }}" class="group cursor-pointer block bg-white rounded-3xl sm:rounded-[2rem] overflow-hidden shadow-[0_8px_30px_rgba(200,50,100,0.05)] border border-pink-50 hover:shadow-[0_16px_40px_rgba(200,50,100,0.12)] hover:-translate-y-1.5 transition-all duration-300 flex flex-col">
                        
                        {{-- Thumbnail Container --}}
                        <div class="relative w-full aspect-[16/10] overflow-hidden bg-gray-100">
                            @if($post->image)
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                                <img src="{{ asset('images/wedding.png') }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @endif
                            
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black/20 backdrop-blur-xs">
                                <span class="px-5 py-2.5 bg-white text-[#c02d4b] text-[13px] font-bold rounded-full shadow-md">
                                    Read Article →
                                </span>
                            </div>
                        </div>

                        {{-- Card Body --}}
                        <div class="p-5 sm:p-7 flex flex-col flex-grow">
                            <div class="flex items-center justify-between mb-3">
                                <p class="text-[11px] font-bold text-[#c02d4b] uppercase tracking-[0.15em]">{{ $post->created_at->format('F d, Y') }}</p>
                                <span class="text-[11px] text-gray-400 font-medium">Heartgrams</span>
                            </div>

                            <h3 class="font-serif text-[18px] sm:text-[22px] text-brand-dark leading-snug group-hover:text-[#c02d4b] transition-colors font-bold mb-3 sm:mb-4 flex-grow">
                                {{ $post->title }}
                            </h3>

                            <div class="pt-4 border-t border-gray-100 flex items-center justify-between text-xs font-bold text-[#c02d4b] mt-auto">
                                <span>Read Full Story</span>
                                <span class="group-hover:translate-x-1 transition-transform">→</span>
                            </div>
                        </div>

                    </a>
                @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16">
                        <p class="text-gray-500 text-base">Check back soon for our first blog post!</p>
                    </div>
                @endforelse
            </div>

        </div>

    </div>

    <style>
        @keyframes blogSparkTwinkle {
            0%, 100% {
                opacity: 0.25;
                transform: scale(0.75);
            }
            50% {
                opacity: 1;
                transform: scale(1.3);
                filter: drop-shadow(0 0 6px rgba(243, 209, 121, 0.95));
            }
        }
        .blog-spark {
            position: absolute;
            pointer-events: none;
            animation: blogSparkTwinkle var(--twinkle-dur, 3s) ease-in-out infinite var(--twinkle-del, 0s);
        }
    </style>
</x-public-layout>
