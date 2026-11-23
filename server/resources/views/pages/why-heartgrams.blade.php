<x-public-layout>
    <x-slot name="seoTags">
        <title>Why Heartgrams - Heartgrams</title>
        {!! $content['seo_tags'] ?? '' !!}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    </x-slot>

        {{-- Hero Section (Enhanced height) --}}
        <section class="relative bg-[#1a060b] min-h-[420px] sm:min-h-[425px] lg:min-h-[430px] flex items-center justify-center text-center px-4 sm:px-6 lg:px-8 overflow-hidden pt-24 pb-12 sm:pt-28 sm:pb-14 bg-gradient-to-b from-[#240a0e] via-[#1a060b] to-[#120306]">
            
            {{-- Floating Background Images Collage (Scaled for compact hero) --}}
            <div class="absolute inset-0 z-0 overflow-hidden opacity-30 sm:opacity-75">
                <img src="https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?q=80&w=600&auto=format&fit=crop" class="absolute top-[8%] left-[4%] w-36 sm:w-44 h-48 sm:h-56 object-cover rounded-2xl -rotate-6 shadow-2xl blur-[1px]">
                <img src="https://images.unsplash.com/photo-1510915361894-db8b60106cb1?q=80&w=600&auto=format&fit=crop" class="absolute top-[12%] right-[6%] w-40 sm:w-48 h-52 sm:h-60 object-cover rounded-2xl rotate-12 shadow-2xl">
                <img src="https://images.unsplash.com/photo-1529634806980-85c3dd6d34ac?q=80&w=600&auto=format&fit=crop" class="absolute bottom-[5%] left-[12%] w-36 sm:w-44 h-36 sm:h-44 object-cover rounded-full rotate-3 shadow-2xl">
                <img src="https://images.unsplash.com/photo-1517673132405-a56a62b18caf?q=80&w=600&auto=format&fit=crop" class="absolute bottom-[5%] right-[15%] w-48 sm:w-56 h-36 sm:h-40 object-cover rounded-2xl -rotate-12 shadow-2xl blur-[2px]">
                <img src="https://images.unsplash.com/photo-1537633552985-df8429e8048b?q=80&w=600&auto=format&fit=crop" class="absolute top-[50%] left-[50%] -translate-x-1/2 -translate-y-1/2 w-[700px] h-[500px] object-cover opacity-40 mask-image:radial-gradient(ellipse_at_center,black_0%,transparent_70%)">
            </div>

            {{-- Dark wine/maroon gradient overlay matching user image --}}
            <div class="absolute inset-0 bg-gradient-to-b from-[#240a0e]/80 via-[#1a060b]/85 to-[#120306]/95 z-10 pointer-events-none"></div>

            <div class="relative z-20 max-w-4xl mx-auto flex flex-col items-center">
                {{-- Subtitle badge if set --}}
                @if(!empty($content['hero_subtitle']))
                    <div class="mb-3 sm:mb-4">
                        <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-xs font-bold tracking-[0.2em] text-[#e6b04e] uppercase shadow-sm">
                            {{ $content['hero_subtitle'] }}
                        </span>
                    </div>
                @endif

                {{-- Dynamic Title: Gold text & Brand Logo or Yellow Italic Highlight --}}
                <h1 class="font-serif text-3xl sm:text-4xl md:text-5xl font-medium leading-tight mb-4 sm:mb-5 drop-shadow-lg max-w-3xl flex flex-col items-center justify-center gap-2.5 sm:gap-3.5">
                    <span class="bg-gradient-to-r from-[#B8841B] via-[#DCA838] to-[#A27010] bg-clip-text text-transparent">
                        {{ $content['hero_title'] ?? 'Why choose a personalised song from Heartgrams?' }}
                    </span>
                    
                    @if(!empty($content['hero_highlight']))
                        @if(strtolower(trim($content['hero_highlight'])) === 'heartgrams' || strtolower(trim($content['hero_highlight'])) === 'heartgram')
                            {{-- Logo replacing heartgram text --}}
                            <div class="inline-flex items-center justify-center bg-white/95 backdrop-blur-md px-5 sm:px-7 py-2 sm:py-2.5 rounded-full shadow-[0_8px_30px_rgba(0,0,0,0.3)] border border-white/60 hover:scale-105 transition-all duration-300">
                                <img src="{{ asset('images/logo.png') }}" alt="Heartgrams" class="h-6 sm:h-7 md:h-8 w-auto drop-shadow-sm">
                            </div>
                        @else
                            <span class="text-[#e6b04e] italic font-serif text-2xl sm:text-3xl md:text-4xl">
                                {{ $content['hero_highlight'] }}
                            </span>
                        @endif
                    @endif
                </h1>
                
                {{-- Dynamic Description --}}
                <p class="text-sm sm:text-base text-white/90 font-normal max-w-2xl sm:max-w-3xl mx-auto drop-shadow-md leading-relaxed">
                    {{ $content['hero_description'] }}
                </p>
            </div>
        </section>

        {{-- Section Break Divider --}}
        <div class="relative z-30 w-full overflow-hidden border-t border-white/10 bg-[#120306]">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="h-px w-full bg-gradient-to-r from-transparent via-[#e6b04e]/60 to-transparent shadow-[0_0_12px_rgba(230,176,78,0.35)]"></div>
            </div>
        </div>

        {{-- Founder Story Section (Two-Column Layout) --}}
        <section class="pt-4 sm:pt-6 lg:pt-8 pb-3 sm:pb-4 lg:pb-5 bg-gradient-to-b from-[#220910] via-[#2b0d16] to-[#1c060d] relative overflow-hidden" style="background: linear-gradient(180deg, #220910 0%, #2b0d16 50%, #1c060d 100%);">
            {{-- Ambient background light --}}
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#e6b04e]/5 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-pink-600/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
                    
                    {{-- Left Column: Story & Quote --}}
                    <div class="lg:col-span-7 text-left">
                        <div class="mb-4">
                            <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-xs font-bold tracking-[0.2em] text-[#e6b04e] uppercase shadow-sm">
                                {{ $content['founder_subtitle'] }}
                            </span>
                        </div>

                        <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-medium text-white mb-8 leading-[1.15] drop-shadow-md">
                            {{ $content['founder_title'] }}
                        </h2>

                        <div class="space-y-4 sm:space-y-5 text-white/85 text-[15px] sm:text-base leading-relaxed font-normal">
                            <p>{!! $content['founder_p1'] !!}</p>
                            <p>{!! $content['founder_p2'] !!}</p>
                            <p>{!! $content['founder_p3'] !!}</p>
                            <p>{!! $content['founder_p4'] !!}</p>
                        </div>

                        {{-- Founder Pull-Quote --}}
                        <div class="mt-8 pt-6 border-t border-white/10 pl-5 border-l-2 border-l-[#e6b04e]">
                            <p class="font-serif text-xl sm:text-2xl text-white italic mb-2 leading-snug">
                                {{ $content['founder_quote'] }}
                            </p>
                            <p class="text-xs font-bold tracking-[0.15em] text-[#e6b04e] uppercase">
                                {{ $content['founder_quote_author'] }}
                            </p>
                        </div>
                    </div>

                    {{-- Right Column: Founder Image Showcase --}}
                    <div class="lg:col-span-5 flex justify-center">
                        <div class="relative w-full max-w-md lg:max-w-none">
                            {{-- Decorative gold aura backdrop --}}
                            <div class="absolute -inset-2 sm:-inset-3 rounded-[2.5rem] bg-gradient-to-tr from-[#e6b04e]/20 via-pink-500/10 to-[#e6b04e]/30 blur-sm -rotate-1"></div>

                            {{-- Main Image Card --}}
                            <div class="relative rounded-[2rem] overflow-hidden border-2 border-[#e6b04e]/40 shadow-2xl bg-[#1f0a0e]">
                                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1000&auto=format&fit=crop" 
                                     alt="Hilaary James - Founder" 
                                     class="w-full aspect-[4/5] object-cover object-top hover:scale-105 transition-transform duration-700">
                                
                                {{-- Bottom Name & Title Overlay --}}
                                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-[#1b070b]/95 via-[#1b070b]/60 to-transparent pt-12 pb-6 px-6">
                                    <h3 class="text-white font-serif text-xl sm:text-2xl font-bold leading-tight drop-shadow-sm">
                                        Hilaary James
                                    </h3>
                                    <p class="text-[#e6b04e] text-xs font-semibold tracking-wider uppercase mt-1">
                                        Founder, Heartgrams
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- Everything Included Section (Wavy Timeline Redesign matching given design) --}}
        <section class="pt-8 sm:pt-10 lg:pt-12 pb-4 sm:pb-6 lg:pb-8 bg-[#faf4ef] relative overflow-hidden px-4 sm:px-6 lg:px-8">
            {{-- Soft Pink/Peach Atmospheric Waves at Bottom --}}
            <div class="absolute -bottom-24 -left-20 w-[420px] h-[350px] bg-gradient-to-tr from-pink-300/25 to-rose-200/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -right-20 w-[450px] h-[380px] bg-gradient-to-tl from-rose-300/20 to-pink-200/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="w-full max-w-7xl mx-auto relative z-10">
                {{-- Section Header --}}
                <div class="max-w-3xl mb-8 sm:mb-12">
                    <span class="text-xs sm:text-[13px] font-bold tracking-[0.2em] text-[#e83e6a] uppercase mb-2 block">
                        {{ $content['everything_subtitle'] }}
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-[42px] font-medium text-gray-900 leading-tight mb-2.5">
                        {{ $content['everything_title'] }}
                    </h2>
                    <p class="text-[14px] sm:text-[15px] lg:text-base text-gray-600 font-normal">
                        {{ $content['everything_description'] }}
                    </p>
                </div>

                {{-- Mobile Timeline Navigation Header --}}
                <div class="flex items-center justify-between lg:hidden mb-4 px-1 select-none">
                    <span class="text-xs font-semibold text-[#e83e6a] flex items-center gap-1.5">
                        <span class="inline-block animate-pulse">👉</span> Swipe 1 to 5
                    </span>
                    <div class="flex items-center gap-1.5" id="timelineStepPills">
                        @foreach($included as $i => $item)
                            <button 
                                type="button" 
                                onclick="scrollToTimelineStep({{ $i }})"
                                class="timeline-nav-pill w-7 h-7 rounded-full text-xs font-bold transition-all flex items-center justify-center {{ $i === 0 ? 'bg-[#e83e6a] text-white shadow-xs' : 'bg-white text-gray-600 border border-pink-200' }}"
                                data-step="{{ $i }}"
                            >
                                {{ $i + 1 }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <style>
                    /* Timeline Wavy Animation & Highlights */
                    .timeline-step-num {
                        color: rgba(244, 114, 182, 0.45);
                        transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
                        display: inline-block;
                    }
                    .timeline-step-num.is-active,
                    .timeline-step-num.is-completed {
                        background: linear-gradient(180deg, #EA4C70 0%, #F0728F 50%, #F8AAB9 100%);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        filter: drop-shadow(0 4px 16px rgba(234, 76, 112, 0.35));
                        opacity: 1;
                    }
                    .timeline-step-num.is-active {
                        transform: scale(1.08);
                    }

                    .timeline-outer-disc {
                        transition: transform 0.45s cubic-bezier(0.16, 1, 0.3, 1), 
                                    box-shadow 0.45s cubic-bezier(0.16, 1, 0.3, 1), 
                                    border-color 0.45s ease, 
                                    background-color 0.45s ease;
                    }
                    .timeline-outer-disc.is-active {
                        border-color: #FF206E !important;
                        background-color: #ffeef3 !important;
                        box-shadow: 0 0 28px rgba(255, 32, 110, 0.75), 0 0 0 4px rgba(255, 77, 125, 0.35) !important;
                        transform: scale(1.12);
                    }
                    .timeline-outer-disc.is-completed {
                        border-color: #f472b6 !important;
                        background-color: #fdeef2 !important;
                        box-shadow: 0 6px 20px rgba(244, 114, 182, 0.32) !important;
                        transform: scale(1.02);
                    }

                    .timeline-inner-disc {
                        transition: transform 0.45s cubic-bezier(0.16, 1, 0.3, 1);
                    }
                    .timeline-outer-disc.is-active .timeline-inner-disc {
                        transform: scale(1.06);
                    }

                    .timeline-step-badge {
                        transition: all 0.45s cubic-bezier(0.16, 1, 0.3, 1);
                    }
                    .timeline-step-badge.is-active {
                        background-color: #e83e6a !important;
                        color: #ffffff !important;
                        border-color: #e83e6a !important;
                        box-shadow: 0 3px 12px rgba(232, 62, 106, 0.4) !important;
                        transform: scale(1.06);
                    }
                    .timeline-step-badge.is-completed {
                        background-color: #FCE8ED !important;
                        color: #9E2A4B !important;
                        border-color: #f472b6 !important;
                    }
                </style>

                {{-- Wavy Timeline Track (Horizontally scrollable on mobile/tablet, full-width on desktop) --}}
                <div id="wavy-scroll-wrapper" class="overflow-x-auto no-scrollbar touch-pan-x snap-x snap-mandatory -mx-4 px-4 sm:-mx-6 sm:px-6 lg:mx-0 lg:px-0 scroll-smooth pb-4">
                    <div id="wavy-timeline-container" class="relative min-w-[850px] lg:min-w-0 lg:w-full pt-4 pb-4">
                        {{-- Base SVG curve (behind nodes, z-0) --}}
                        <svg id="wavy-timeline-svg" class="absolute inset-0 w-full h-full pointer-events-none z-0 overflow-visible" xmlns="http://www.w3.org/2000/svg">
                            {{-- The smooth dashed curve --}}
                            <path id="wavy-dashed-line" d="" stroke="#f4a5b9" stroke-width="2" stroke-dasharray="4 6" stroke-linecap="round" fill="none" opacity="0.85" />
                            
                            {{-- Midpoint dots on curve --}}
                            <g id="wavy-curve-dots"></g>
                            
                            {{-- Floating musical notes and heart --}}
                            <g id="wavy-curve-decorations"></g>
                        </svg>

                        {{-- Animated journey overlay SVG (in front of nodes, z-20, pointer-events-none) --}}
                        <svg id="wavy-timeline-overlay-svg" class="absolute inset-0 w-full h-full pointer-events-none z-20 overflow-visible" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <filter id="why-trail-glow" x="-50%" y="-50%" width="200%" height="200%">
                                    <feGaussianBlur in="SourceGraphic" stdDeviation="3" result="blur1" />
                                    <feGaussianBlur in="SourceGraphic" stdDeviation="6" result="blur2" />
                                    <feMerge>
                                        <feMergeNode in="blur2" />
                                        <feMergeNode in="blur1" />
                                        <feMergeNode in="SourceGraphic" />
                                    </feMerge>
                                </filter>
                            </defs>

                            {{-- Glowing Wave Trail (Follows behind particle) --}}
                            <path id="wavy-trail" d="" stroke="#FF206E" stroke-width="3.5" stroke-linecap="round" fill="none" opacity="0" filter="url(#why-trail-glow)" vector-effect="non-scaling-stroke" />

                            {{-- Moving Glowing Particle Group (Matching Home Page design) --}}
                            <g id="wavy-particle-group" class="pointer-events-none transition-opacity duration-300" style="opacity: 0;">
                                <circle cx="0" cy="0" r="16" fill="#FF4D7D" opacity="0.35" filter="url(#why-trail-glow)" />
                                <circle cx="0" cy="0" r="8" fill="#FF4D7D" opacity="0.75" />
                                <circle cx="0" cy="0" r="3.5" fill="#FFFFFF" stroke="#E11D48" stroke-width="1.5" />
                                <path d="M 0,-6 L 0,6 M -6,0 L 6,0" stroke="#FFFFFF" stroke-width="1.4" opacity="0.95" />
                            </g>
                        </svg>

                        {{-- The 5 Steps Grid --}}
                        <div class="grid grid-cols-5 gap-4 lg:gap-5 items-start relative z-10 max-w-6xl mx-auto">
                            @foreach($included as $index => $item)
                                @php
                                    $offsets = [
                                        0 => 'mt-0',
                                        1 => 'mt-20',
                                        2 => 'mt-3',
                                        3 => 'mt-24',
                                        4 => 'mt-4',
                                    ];
                                    $offsetClass = $offsets[$index] ?? 'mt-0';
                                @endphp
                                <div 
                                    class="timeline-step-column flex flex-col items-center text-center group {{ $offsetClass }} snap-center cursor-pointer" 
                                    data-index="{{ $index }}"
                                    onclick="scrollToTimelineStep({{ $index }})"
                                >
                                    {{-- Large Watermark Number (matching reference design) --}}
                                    <span class="timeline-step-num font-serif text-3xl sm:text-4xl lg:text-5xl font-bold leading-none select-none block mb-1">
                                        0{{ $loop->iteration }}
                                    </span>

                                    {{-- Circular Node with Concentric Halo (OPAQUE to completely hide dashed line behind it) --}}
                                    <div class="timeline-circle-node relative flex items-center justify-center mb-3.5 z-10">
                                        {{-- Outer Opaque Pink Halo Disc --}}
                                        <div class="timeline-outer-disc w-18 h-18 sm:w-20 sm:h-20 rounded-full bg-[#fdeef2] border-2 border-[#f7ccd7] p-2 flex items-center justify-center shadow-[0_4px_16px_rgba(244,114,182,0.18)] group-hover:scale-105 group-hover:shadow-[0_8px_24px_rgba(244,114,182,0.3)]" style="background-color: #fdeef2; border-color: #f7ccd7;">
                                             {{-- Inner Dark Luxury Maroon Disc --}}
                                             <div class="timeline-inner-disc w-13 h-13 sm:w-14 sm:h-14 rounded-full bg-gradient-to-br from-[#4a101d] via-[#350712] to-[#20030a] flex items-center justify-center text-white shadow-md shadow-maroon-950/30 [&>svg]:w-5 [&>svg]:h-5 sm:[&>svg]:w-6 sm:[&>svg]:h-6" style="background: linear-gradient(135deg, #4a101d 0%, #350712 50%, #20030a 100%); color: #ffffff;">
                                                 {!! $item['icon'] !!}
                                             </div>
                                         </div>
                                    </div>

                                    {{-- Step Title --}}
                                    <h3 class="font-serif text-[15px] sm:text-[16px] lg:text-[17px] font-bold text-gray-900 leading-snug mb-1.5 group-hover:text-maroon-900 transition-colors duration-200">
                                        {{ $item['title'] }}
                                    </h3>

                                    {{-- Step Description --}}
                                    <p class="text-[12px] lg:text-[12.5px] text-gray-600 leading-relaxed font-normal max-w-[170px] mx-auto">
                                        {{ $item['description'] }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Script for Heartgram Wave Journey Animation & Sinusoidal Curve --}}
            <script>
                (function() {
                    let totalLength = 0;
                    let nodeLengths = [];
                    let stages = [];
                    let totalLoopDuration = 0;
                    let animFrameId = null;
                    let animStartTime = null;
                    let isRunning = false;

                    function buildStages() {
                        if (nodeLengths.length < 5) return;
                        stages = [
                            { type: 'enter', fromL: 0, toL: nodeLengths[0], duration: 600 },
                            { type: 'cross', step: 0, length: nodeLengths[0], duration: 450 },
                            { type: 'move', fromL: nodeLengths[0], toL: nodeLengths[1], duration: 950 },
                            { type: 'cross', step: 1, length: nodeLengths[1], duration: 450 },
                            { type: 'move', fromL: nodeLengths[1], toL: nodeLengths[2], duration: 950 },
                            { type: 'cross', step: 2, length: nodeLengths[2], duration: 450 },
                            { type: 'move', fromL: nodeLengths[2], toL: nodeLengths[3], duration: 950 },
                            { type: 'cross', step: 3, length: nodeLengths[3], duration: 450 },
                            { type: 'move', fromL: nodeLengths[3], toL: nodeLengths[4], duration: 950 },
                            { type: 'cross', step: 4, length: nodeLengths[4], duration: 550 },
                            { type: 'exit', fromL: nodeLengths[4], toL: totalLength, duration: 600 },
                            { type: 'hold', duration: 5000 }, // Finished: hold all steps illuminated for 5 seconds before next iteration
                            { type: 'reset', duration: 350 }
                        ];
                        totalLoopDuration = stages.reduce((acc, s) => acc + s.duration, 0);
                    }

                    function updateWavyTimeline() {
                        const container = document.getElementById('wavy-timeline-container');
                        const dashedPath = document.getElementById('wavy-dashed-line');
                        const trailPath = document.getElementById('wavy-trail');
                        const dotsGroup = document.getElementById('wavy-curve-dots');
                        const decorGroup = document.getElementById('wavy-curve-decorations');
                        if (!container || !dashedPath || !trailPath) return;

                        const nodes = container.querySelectorAll('.timeline-circle-node');
                        if (nodes.length < 2) return;

                        const cRect = container.getBoundingClientRect();
                        const pts = Array.from(nodes).map(node => {
                            const r = node.getBoundingClientRect();
                            return {
                                x: r.left - cRect.left + r.width / 2,
                                y: r.top - cRect.top + r.height / 2
                            };
                        });

                        // Lead-in from left and lead-out to right
                        const startX = Math.max(8, pts[0].x - 85);
                        const startY = pts[0].y;
                        const endX = Math.min(container.scrollWidth - 8, pts[pts.length - 1].x + 85);
                        const endY = pts[pts.length - 1].y;

                        const dxIn = pts[0].x - startX;
                        let d = `M ${startX} ${startY} C ${startX + dxIn * 0.45} ${startY}, ${pts[0].x - dxIn * 0.45} ${pts[0].y}, ${pts[0].x} ${pts[0].y}`;
                        let dotsHtml = '';

                        for (let i = 0; i < pts.length - 1; i++) {
                            const p0 = pts[i];
                            const p1 = pts[i + 1];
                            const dx = p1.x - p0.x;
                            const cp1x = p0.x + dx * 0.48;
                            const cp1y = p0.y;
                            const cp2x = p0.x + dx * 0.52;
                            const cp2y = p1.y;
                            d += ` C ${cp1x} ${cp1y}, ${cp2x} ${cp2y}, ${p1.x} ${p1.y}`;

                            // Exact midpoint on cubic bezier curve at t = 0.5
                            const midX = (p0.x + p1.x) / 2;
                            const midY = (p0.y + p1.y) / 2;
                            dotsHtml += `<circle cx="${midX}" cy="${midY}" r="3" fill="#f472b6" opacity="0.85" />`;
                        }

                        const dxOut = endX - pts[pts.length - 1].x;
                        d += ` C ${pts[pts.length - 1].x + dxOut * 0.45} ${pts[pts.length - 1].y}, ${endX - dxOut * 0.45} ${endY}, ${endX} ${endY}`;

                        dashedPath.setAttribute('d', d);
                        trailPath.setAttribute('d', d);
                        if (dotsGroup) dotsGroup.innerHTML = dotsHtml;

                        // Position floating notes and heart relative to the curve
                        if (decorGroup && pts.length >= 4) {
                            const n12x = pts[1].x + (pts[2].x - pts[1].x) * 0.45;
                            const n12y = Math.min(pts[1].y, pts[2].y) - 30;

                            const h23x = pts[2].x + (pts[3].x - pts[2].x) * 0.55;
                            const h23y = Math.min(pts[2].y, pts[3].y) - 32;

                            let lastDecor = '';
                            if (pts.length >= 5) {
                                const n34x = pts[3].x + (pts[4].x - pts[3].x) * 0.55;
                                const n34y = Math.min(pts[3].y, pts[4].y) - 30;
                                lastDecor = `
                                    <g transform="translate(${n34x - 8}, ${n34y - 10})" stroke="#f472b6" fill="none" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M6 14V2l6 2v4" />
                                        <circle cx="6" cy="14" r="2.5" fill="#f472b6" />
                                    </g>
                                `;
                            }

                            decorGroup.innerHTML = `
                                <g transform="translate(${n12x - 10}, ${n12y - 10})" stroke="#f472b6" fill="none" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 14V4l10-2v10M4 8l10-2" />
                                    <circle cx="4" cy="14" r="2.5" fill="#f472b6" />
                                    <circle cx="14" cy="12" r="2.5" fill="#f472b6" />
                                </g>
                                <g transform="translate(${h23x - 11}, ${h23y - 10}) scale(0.7)">
                                    <path d="M12,6 C12,3 9,0 5,0 C0,0 -2,4 -2,7 C-2,12 5,18 12,24 C19,18 26,12 26,7 C26,4 24,0 19,0 C15,0 12,3 12,6 Z" 
                                          fill="none" stroke="#f472b6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                                ${lastDecor}
                            `;
                        }

                        // Calculate total length and node positions along path
                        totalLength = trailPath.getTotalLength();
                        const getLengthAtX = (targetX) => {
                            let low = 0;
                            let high = totalLength;
                            for (let j = 0; j < 35; j++) {
                                const mid = (low + high) / 2;
                                const pt = trailPath.getPointAtLength(mid);
                                if (pt.x < targetX) {
                                    low = mid;
                                } else {
                                    high = mid;
                                }
                            }
                            return (low + high) / 2;
                        };
                        nodeLengths = pts.map(p => getLengthAtX(p.x));

                        buildStages();

                        if (!isRunning) {
                            startAnimation();
                        }
                    }

                    // Update UI states for steps
                    function updateStepState(activeStepIndex, maxCompletedIndex) {
                        const container = document.getElementById('wavy-timeline-container');
                        if (!container) return;
                        const columns = container.querySelectorAll('.timeline-step-column');

                        columns.forEach((col, idx) => {
                            const num = col.querySelector('.timeline-step-num');
                            const disc = col.querySelector('.timeline-outer-disc');
                            const badge = col.querySelector('.timeline-step-badge');

                            if (idx === activeStepIndex) {
                                num && num.classList.add('is-active');
                                num && num.classList.remove('is-completed');
                                disc && disc.classList.add('is-active');
                                disc && disc.classList.remove('is-completed');
                                badge && badge.classList.add('is-active');
                                badge && badge.classList.remove('is-completed');
                            } else if (idx <= maxCompletedIndex) {
                                num && num.classList.remove('is-active');
                                num && num.classList.add('is-completed');
                                disc && disc.classList.remove('is-active');
                                disc && disc.classList.add('is-completed');
                                badge && badge.classList.remove('is-active');
                                badge && badge.classList.add('is-completed');
                            } else {
                                num && num.classList.remove('is-active', 'is-completed');
                                disc && disc.classList.remove('is-active', 'is-completed');
                                badge && badge.classList.remove('is-active', 'is-completed');
                            }
                        });
                    }

                    const easeInOutCubic = (t) => t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2;

                    function animate(now) {
                        if (!isRunning) return;
                        if (!animStartTime) animStartTime = now;
                        if (!totalLoopDuration || !stages.length) {
                            animFrameId = requestAnimationFrame(animate);
                            return;
                        }

                        const particleGroup = document.getElementById('wavy-particle-group');
                        const trailPath = document.getElementById('wavy-trail');

                        if (!particleGroup || !trailPath) {
                            animFrameId = requestAnimationFrame(animate);
                            return;
                        }

                        // Infinite continuous loop via modulo
                        const elapsed = (now - animStartTime) % totalLoopDuration;

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
                            updateStepState(-1, -1);
                            updatePills(0);
                            const currentL = currentStage.fromL + (currentStage.toL - currentStage.fromL) * progress;
                            const pt = trailPath.getPointAtLength(currentL);
                            particleGroup.setAttribute('transform', `translate(${pt.x}, ${pt.y})`);
                            particleGroup.style.opacity = '1';

                            const trailLen = 65;
                            const startL = Math.max(0, currentL - trailLen);
                            trailPath.style.strokeDasharray = `${currentL - startL} ${totalLength}`;
                            trailPath.style.strokeDashoffset = `${-startL}`;
                            trailPath.style.opacity = '0.95';
                        } else if (currentStage.type === 'cross') {
                            updateStepState(currentStage.step, currentStage.step);
                            updatePills(currentStage.step);

                            const pt = trailPath.getPointAtLength(currentStage.length);
                            particleGroup.setAttribute('transform', `translate(${pt.x}, ${pt.y})`);
                            particleGroup.style.opacity = '1';
                            trailPath.style.opacity = '0';
                        } else if (currentStage.type === 'move') {
                            const prevStep = stages.filter(s => s.type === 'cross' && s.length <= currentStage.fromL).pop();
                            const completedIdx = prevStep ? prevStep.step : 0;
                            updateStepState(-1, completedIdx);

                            const currentL = currentStage.fromL + (currentStage.toL - currentStage.fromL) * progress;
                            const pt = trailPath.getPointAtLength(currentL);
                            particleGroup.setAttribute('transform', `translate(${pt.x}, ${pt.y})`);
                            particleGroup.style.opacity = '1';

                            const trailLen = 70;
                            const startL = Math.max(0, currentL - trailLen);
                            trailPath.style.strokeDasharray = `${currentL - startL} ${totalLength}`;
                            trailPath.style.strokeDashoffset = `${-startL}`;
                            trailPath.style.opacity = '0.95';
                        } else if (currentStage.type === 'exit') {
                            updateStepState(-1, 4); // All 5 steps completed
                            const currentL = currentStage.fromL + (currentStage.toL - currentStage.fromL) * progress;
                            const pt = trailPath.getPointAtLength(currentL);
                            particleGroup.setAttribute('transform', `translate(${pt.x}, ${pt.y})`);

                            const fade = 1 - progress;
                            particleGroup.style.opacity = String(Math.max(0, fade));

                            const trailLen = 60 * fade;
                            const startL = Math.max(0, currentL - trailLen);
                            trailPath.style.strokeDasharray = `${currentL - startL} ${totalLength}`;
                            trailPath.style.strokeDashoffset = `${-startL}`;
                            trailPath.style.opacity = String(fade * 0.85);
                        } else if (currentStage.type === 'hold') {
                            updateStepState(-1, 4); // All 5 steps remain beautifully illuminated
                            particleGroup.style.opacity = '0';
                            trailPath.style.opacity = '0';
                        } else if (currentStage.type === 'reset') {
                            updateStepState(-1, -1); // Smoothly reset steps before next cycle
                            particleGroup.style.opacity = '0';
                            trailPath.style.opacity = '0';
                        }

                        animFrameId = requestAnimationFrame(animate);
                    }

                    function startAnimation() {
                        if (isRunning) return;
                        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                            updateStepState(-1, 4);
                            return;
                        }
                        isRunning = true;
                        animStartTime = performance.now();
                        animFrameId = requestAnimationFrame(animate);
                    }

                    // Mobile Step Navigation
                    function updatePills(activeIdx) {
                        const pills = document.querySelectorAll('.timeline-nav-pill');
                        pills.forEach((p, idx) => {
                            if (idx === activeIdx) {
                                p.className = 'timeline-nav-pill w-7 h-7 rounded-full text-xs font-bold transition-all flex items-center justify-center bg-[#e83e6a] text-white shadow-xs';
                            } else {
                                p.className = 'timeline-nav-pill w-7 h-7 rounded-full text-xs font-bold transition-all flex items-center justify-center bg-white text-gray-600 border border-pink-200';
                            }
                        });
                    }

                    window.scrollToTimelineStep = function(idx) {
                        const wrapper = document.getElementById('wavy-scroll-wrapper');
                        const cols = document.querySelectorAll('.timeline-step-column');
                        if (!wrapper || !cols[idx]) return;
                        const col = cols[idx];
                        const offsetLeft = col.offsetLeft - (wrapper.clientWidth - col.clientWidth) / 2;
                        wrapper.scrollTo({ left: offsetLeft, behavior: 'smooth' });
                        updatePills(idx);
                    };

                    const wrapper = document.getElementById('wavy-scroll-wrapper');
                    if (wrapper) {
                        wrapper.addEventListener('scroll', function() {
                            const cols = document.querySelectorAll('.timeline-step-column');
                            const center = wrapper.scrollLeft + wrapper.clientWidth / 2;
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
                            updatePills(closest);
                        }, { passive: true });
                    }

                    // Handle tab switching gracefully
                    document.addEventListener('visibilitychange', () => {
                        if (document.hidden) {
                            if (animFrameId) {
                                cancelAnimationFrame(animFrameId);
                                animFrameId = null;
                            }
                        } else {
                            if (isRunning && !animFrameId) {
                                animFrameId = requestAnimationFrame(animate);
                            }
                        }
                    });

                    // Run immediately, on resize, and with ResizeObserver
                    window.addEventListener('DOMContentLoaded', updateWavyTimeline);
                    window.addEventListener('load', updateWavyTimeline);
                    window.addEventListener('resize', updateWavyTimeline);
                    
                    const container = document.getElementById('wavy-timeline-container');
                    if (container && window.ResizeObserver) {
                        new ResizeObserver(updateWavyTimeline).observe(container);
                    }
                    setTimeout(updateWavyTimeline, 50);
                    setTimeout(updateWavyTimeline, 150);
                    setTimeout(updateWavyTimeline, 300);
                })();
            </script>
        </section>

        {{-- Features / Orbit Section --}}
        <section class="pt-4 sm:pt-6 pb-1 sm:pb-2 bg-gradient-to-b from-[#faf6f0] via-white to-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                {{-- Section Heading --}}
                <div class="text-center max-w-3xl mx-auto mb-2 sm:mb-3">
                    <div class="mb-3.5">
                        <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white border border-pink-200/80 text-xs sm:text-sm font-bold tracking-[0.2em] text-[#a84457] uppercase shadow-sm">
                            {{ $content['features_subtitle'] ?? 'THE HEARTGRAMS DIFFERENCE' }}
                        </span>
                    </div>
                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-medium text-gray-900 leading-tight mb-4 drop-shadow-sm">
                        {{ $content['features_title'] ?? 'Crafted with heart. Built around your story.' }}
                    </h2>
                    <p class="text-base sm:text-lg text-gray-600 font-normal max-w-2xl mx-auto leading-relaxed">
                        {{ $content['features_description'] ?? 'Every song is written from scratch from your real memories, and every lyric passes our quality check before you see it.' }}
                    </p>
                </div>
            </div>

            {{-- Orbit Animation Showcase --}}
            <x-heartgrams-orbit 
                logo-src="{{ asset('images/Gemini_Generated_Image_5e5nn25e5nn25e5n-removebg-preview.png') }}"
                brand-src="{{ asset('images/heartgrams_wordmark.png') }}"
                :items="array_column($features, 'title')"
            />
        </section>

        {{-- Corrections Policy Section --}}
        <section class="py-3 sm:py-4 lg:py-5 bg-[#f9ece6]">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-[2rem] p-6 sm:p-12 lg:p-16 shadow-[0_8px_30px_-4px_rgba(0,0,0,0.05)]">
                    <h4 class="text-xs sm:text-sm font-bold tracking-[0.2em] text-pink-400 uppercase mb-4">
                        {{ $content['corrections_subtitle'] }}
                    </h4>
                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                        {{ $content['corrections_title'] }}
                    </h2>
                    <p class="text-[15px] sm:text-base text-gray-600 font-medium mb-8">
                        {{ $content['corrections_description'] }}
                    </p>
                    
                    <ul class="space-y-4">
                        @foreach([1, 2, 3] as $i)
                            @if(!empty($content['corrections_bullet_'.$i]))
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-pink-400 mt-0.5 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-[14px] sm:text-[15px] text-gray-600 font-medium leading-relaxed">
                                        {{ $content['corrections_bullet_'.$i] }}
                                    </span>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        {{-- CTA Section --}}
        <section class="pt-4 sm:pt-6 lg:pt-8 pb-14 sm:pb-20 lg:pb-24 bg-[#faf6f0]">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h4 class="text-xs sm:text-sm font-bold tracking-[0.2em] text-[#f26e7e] uppercase mb-6">
                    {{ $content['cta_subtitle'] }}
                </h4>
                <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-medium text-gray-900 leading-[1.1] mb-6">
                    {{ $content['cta_title'] }}
                </h2>
                <p class="text-[17px] sm:text-[19px] text-gray-600 font-medium mb-12 max-w-2xl mx-auto">
                    {{ $content['cta_description'] }}
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ (!empty($content['cta_button_1_link']) && $content['cta_button_1_link'] !== '#') ? $content['cta_button_1_link'] : url('/create-your-heartgram-song') }}" class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-3.5 border border-transparent text-base font-bold rounded-full shadow-[0_4px_14px_0_rgba(242,110,126,0.39)] text-white bg-[#f26e7e] hover:bg-[#e45a6a] hover:shadow-[0_6px_20px_rgba(242,110,126,0.23)] transition-all duration-300">
                        {{ $content['cta_button_1_text'] }}
                    </a>
                    <a href="{{ (!empty($content['cta_button_2_link']) && $content['cta_button_2_link'] !== '#') ? $content['cta_button_2_link'] : 'https://wa.me/919585475959?text=Hi%20Heartgrams%2C%20I%20would%20like%20to%20create%20a%20song' }}" target="_blank" rel="noopener noreferrer" class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-3.5 border border-gray-300 text-base font-bold rounded-full text-gray-700 bg-transparent hover:bg-gray-50 transition-colors">
                        <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        {{ $content['cta_button_2_text'] }}
                    </a>
                </div>
            </div>
        </section>
</x-public-layout>
