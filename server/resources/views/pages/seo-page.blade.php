<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {!! $page->seo_tags ?? '' !!}
    
    <title>{{ $page->name }} - Heartgrams</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-serif { font-family: 'Playfair Display', serif; }
        .seo-gradient-text {
            background: linear-gradient(90deg, #f3a8b4 0%, #c77a8b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }
        .article-content h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #fff;
        }
        .article-content p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
            color: #d1d5db;
        }
    </style>
</head>
<body class="antialiased bg-[#130811] text-white flex flex-col min-h-screen">
    
    {{-- Header --}}
    <header class="w-full top-0 z-50 bg-transparent border-b border-white/10 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Heartgrams" class="h-6 sm:h-8">
                </a>
                <nav class="hidden md:flex space-x-8">
                    <a href="#how-it-works" class="text-sm font-medium text-gray-300 hover:text-white transition">How It Works</a>
                    <a href="#pricing" class="text-sm font-medium text-gray-300 hover:text-white transition">Pricing</a>
                    <a href="#faq" class="text-sm font-medium text-gray-300 hover:text-white transition">FAQ</a>
                </nav>
                <a href="{{ $content['hero_btn1_link'] ?? '#order-form' }}" class="bg-[#d86a77] text-white px-5 py-2.5 rounded-full text-sm font-medium hover:bg-[#c75966] transition shadow-md">
                    Start My Song
                </a>
            </div>
        </div>
    </header>

    <main class="flex-grow">
        
        {{-- Hero Section --}}
        <section id="hero" class="flex items-center py-16 md:py-24 relative overflow-hidden">
            <!-- Glow effect -->
            <div class="absolute top-1/2 right-1/4 -translate-y-1/2 w-96 h-96 bg-[#d86a77]/20 rounded-full blur-[100px] pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row items-center gap-16 w-full relative z-10">
                {{-- Left Content --}}
                <div class="flex-1 space-y-6">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 border border-white/20 rounded-full">
                        <svg class="w-3 h-3 text-[#d86a77]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                        <span class="text-[10px] font-bold tracking-[0.2em] text-gray-300 uppercase">{{ $content['hero_tag'] ?? '' }}</span>
                    </div>
                    
                    <h1 class="font-serif text-4xl sm:text-5xl lg:text-7xl leading-[1.1] text-white">
                        {!! str_replace(['<i>', '</i>'], ['<span class="seo-gradient-text italic">', '</span>'], $content['hero_title'] ?? '') !!}
                    </h1>
                    
                    <p class="text-[17px] text-gray-300 leading-relaxed max-w-xl">
                        {{ $content['hero_desc'] ?? '' }}
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-3.5 sm:gap-4 pt-4 sm:pt-6 items-stretch sm:items-center">
                        <a href="{{ $content['hero_btn1_link'] ?? '#order-form' }}" class="w-full sm:w-auto inline-flex items-center justify-center bg-[#d86a77] text-white px-8 py-3.5 rounded-full font-medium hover:bg-[#c75966] transition shadow-[0_0_20px_rgba(216,106,119,0.3)] text-center">
                            {{ $content['hero_btn1'] ?? '' }}
                        </a>
                        <a href="{{ $content['hero_btn2_link'] ?? '#audio-samples' }}" class="w-full sm:w-auto inline-flex items-center justify-center bg-transparent border border-white/30 text-white px-8 py-3.5 rounded-full font-medium hover:bg-white/10 transition text-center">
                            {{ $content['hero_btn2'] ?? '' }}
                        </a>
                    </div>
                </div>

                {{-- Right Content (Audio Card) --}}
                <div class="flex-1 w-full max-w-md mx-auto lg:mx-0">
                    <div class="bg-[#1f111c] border border-white/10 rounded-3xl p-8 shadow-2xl relative">
                        <div class="flex justify-between items-center mb-8">
                            <span class="text-[10px] font-bold tracking-[0.2em] text-[#d86a77] uppercase px-3 py-1 bg-[#d86a77]/10 rounded-full">{{ $content['hero_audio_tag'] ?? '' }}</span>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
                        </div>
                        
                        <h3 class="font-serif text-2xl mb-4">{{ $content['hero_audio_title'] ?? '' }}</h3>
                        
                        <p class="text-sm text-gray-400 italic mb-10 pb-6 border-b border-white/10">
                            {{ $content['hero_audio_quote'] ?? '' }}
                        </p>
                        
                        {{-- Audio Player --}}
                        <div class="flex items-center gap-4 bg-black/20 rounded-2xl p-2 pr-4 border border-white/5">
                            <button class="w-10 h-10 shrink-0 bg-[#d86a77] hover:bg-[#c75966] rounded-full flex items-center justify-center text-white transition focus:outline-none">
                                <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </button>
                            <div class="flex items-center justify-between h-8 flex-1 opacity-80 gap-0.5">
                                @for($i = 0; $i < 40; $i++)
                                    <div class="w-1 bg-[#d86a77] rounded-full" style="height: {{ rand(20, 100) }}%"></div>
                                @endfor
                            </div>
                            <span class="text-xs text-gray-400 font-medium">3:12</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Why Different Section --}}
        <section class="py-20 border-t border-white/5">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                    <div>
                        <div class="inline-flex items-center px-4 py-1.5 border border-white/20 rounded-full mb-8">
                            <span class="text-[10px] font-bold tracking-[0.2em] text-[#d86a77] uppercase">{{ $content['diff_tag'] ?? '' }}</span>
                        </div>
                        <h2 class="font-serif text-4xl sm:text-5xl leading-tight mb-8">
                            {!! $content['diff_title'] ?? '' !!}
                        </h2>
                        <p class="text-lg text-gray-300 leading-relaxed">
                            {{ $content['diff_left_p'] ?? '' }}
                        </p>
                    </div>
                    <div class="flex flex-col justify-center space-y-8 pt-4 lg:pt-24 text-gray-300 text-lg leading-relaxed">
                        <p>{!! $content['diff_right_p1'] ?? '' !!}</p>
                        <p>{!! $content['diff_right_p2'] ?? '' !!}</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Reaches Places (Features) --}}
        <section class="py-24 border-t border-white/5 bg-[#170914]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="inline-flex items-center px-4 py-1.5 border border-white/20 rounded-full mb-8">
                    <span class="text-[10px] font-bold tracking-[0.2em] text-[#d86a77] uppercase">{{ $content['reach_tag'] ?? '' }}</span>
                </div>
                <h2 class="font-serif text-4xl sm:text-5xl max-w-3xl mx-auto mb-6">
                    {{ $content['reach_title'] ?? '' }}
                </h2>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto mb-20 leading-relaxed">
                    {{ $content['reach_desc'] ?? '' }}
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-left">
                    @for($i = 1; $i <= 3; $i++)
                    <div class="relative pl-6 border-l border-white/10 hover:border-[#d86a77] transition duration-300">
                        <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-[#d86a77] mb-6 border border-white/10">
                            @if($i == 1)
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            @elseif($i == 2)
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                            @else
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                            @endif
                        </div>
                        <h3 class="font-serif text-2xl mb-4 text-white">{{ $content['reach_feat'.$i.'_title'] ?? '' }}</h3>
                        <p class="text-gray-400 leading-relaxed">{{ $content['reach_feat'.$i.'_desc'] ?? '' }}</p>
                    </div>
                    @endfor
                </div>
            </div>
        </section>

        {{-- How It Works (Process) --}}
        <section id="how-it-works" class="py-24 border-t border-white/5">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="inline-flex items-center px-4 py-1.5 border border-white/20 rounded-full mb-8">
                    <span class="text-[10px] font-bold tracking-[0.2em] text-[#d86a77] uppercase">{{ $content['process_tag'] ?? '' }}</span>
                </div>
                <h2 class="font-serif text-4xl sm:text-5xl mb-20">
                    {{ $content['process_title'] ?? '' }}
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-left">
                    @for($i = 1; $i <= 4; $i++)
                    <div class="relative pl-6 border-l border-white/10">
                        <div class="font-serif text-5xl italic text-white/20 mb-6 font-light -ml-1 hover:text-[#d86a77] transition cursor-default">0{{ $i }}</div>
                        <h3 class="font-serif text-xl mb-3 text-white">{{ $content['process_'.$i.'_title'] ?? '' }}</h3>
                        <p class="text-sm text-gray-400 leading-relaxed">{{ $content['process_'.$i.'_desc'] ?? '' }}</p>
                    </div>
                    @endfor
                </div>
            </div>
        </section>

        {{-- Pricing --}}
        <section id="pricing" class="py-24 bg-[#faf6f0] text-gray-900 rounded-[3rem] mx-4 sm:mx-8 mb-24">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="inline-flex items-center px-3 py-1 bg-pink-100 text-pink-800 rounded-full text-xs font-semibold uppercase tracking-wider mb-6">
                    Pricing
                </div>
                <h2 class="font-serif text-4xl md:text-5xl mb-4">{{ $content['pricing_title'] ?? '' }}</h2>
                <p class="text-gray-500 max-w-2xl mx-auto mb-16">{{ $content['pricing_desc'] ?? '' }}</p>

                {{-- We can reuse the pricing grid and table from landing page --}}
                <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto text-left">
                    <!-- Classic Card -->
                    <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-gray-100">
                        <div class="text-xs font-bold text-gray-400 tracking-wider mb-2 uppercase">FOR HEARTFELT PERSONAL GIFTS</div>
                        <h3 class="font-serif text-2xl text-[#500c19] mb-4">Heartgrams Classic</h3>
                        <div class="flex items-end gap-2 mb-2">
                            <span class="text-4xl font-bold text-[#d86a77]">₹{{ \App\PageContent::get('plan_classic_price', '1,999') }}</span>
                        </div>
                        <p class="text-sm text-gray-500 mb-6">all-inclusive · no hidden fees</p>
                        
                        <div class="bg-pink-50 text-pink-800 text-sm px-4 py-2 rounded-lg mb-8">
                            Birthday · Love Song · Thank You · Apology
                        </div>

                        <ul class="space-y-4 mb-8">
                            <li class="flex items-start gap-3"><svg class="w-5 h-5 text-[#d86a77]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm">Personalized song from your story</span></li>
                            <li class="flex items-start gap-3"><svg class="w-5 h-5 text-[#d86a77]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm">Human-crafted lyrics</span></li>
                            <li class="flex items-start gap-3"><svg class="w-5 h-5 text-[#d86a77]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm">One selected language</span></li>
                            <li class="flex items-start gap-3"><svg class="w-5 h-5 text-[#d86a77]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm">MP3 delivery via WhatsApp</span></li>
                            <li class="flex items-start gap-3"><svg class="w-5 h-5 text-[#d86a77]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm">5-7 day delivery</span></li>
                        </ul>
                        <a href="#order-form" class="block w-full text-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-3 rounded-full transition">Order Classic</a>
                    </div>

                    <!-- Signature Card -->
                    <div class="bg-white rounded-[2rem] shadow-xl border border-pink-200 relative transform md:-translate-y-4">
                        <div class="absolute top-0 inset-x-0 bg-[#c75966] text-white text-xs font-bold text-center py-2 rounded-t-[2rem] uppercase tracking-wider">Most Recommended</div>
                        <div class="p-8 pt-12">
                            <div class="text-xs font-bold text-gray-400 tracking-wider mb-2 uppercase">FOR DEEPER EMOTIONAL STORIES</div>
                            <h3 class="font-serif text-2xl text-[#500c19] mb-4">Heartgrams Signature</h3>
                            <div class="flex items-end gap-2 mb-2">
                                <span class="text-4xl font-bold text-[#d86a77]">₹{{ \App\PageContent::get('plan_premium_price', '2,999') }}</span>
                            </div>
                            <p class="text-sm text-gray-500 mb-6">all-inclusive · no hidden fees</p>
                            
                            <div class="bg-pink-50 text-pink-800 text-sm px-4 py-2 rounded-lg mb-8">
                                Proposal · Anniversary · Wedding · Parents · Deep Love
                            </div>

                            <ul class="space-y-4 mb-8">
                                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-[#d86a77]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm font-medium">More detailed story shaping</span></li>
                                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-[#d86a77]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm font-medium">Priority song creation</span></li>
                                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-[#d86a77]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm">Human-crafted emotional lyrics</span></li>
                                <li class="flex items-start gap-3"><svg class="w-5 h-5 text-[#d86a77]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-gray-700 text-sm">MP3 delivery via WhatsApp</span></li>
                            </ul>
                            <a href="#order-form" class="block w-full text-center bg-[#d86a77] hover:bg-[#c75966] text-white font-medium py-3 rounded-full transition shadow-lg">Order Signature</a>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <p class="text-sm text-gray-500">Not sure which to choose? <a href="#" class="text-[#d86a77] font-medium hover:underline">Chat with us on WhatsApp &rarr;</a></p>
                </div>
            </div>
        </section>

        {{-- Dark FAQ Section --}}
        <section id="faq" class="py-24 bg-[#1b0e1a] border-t border-white/5">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <div class="inline-flex items-center px-4 py-1.5 border border-white/20 rounded-full mb-8">
                        <span class="text-[10px] font-bold tracking-[0.2em] text-[#d86a77] uppercase">{{ $content['faq_tag'] ?? '' }}</span>
                    </div>
                    <h2 class="font-serif text-3xl md:text-5xl text-white">{{ $content['faq_title'] ?? '' }}</h2>
                </div>

                <div class="space-y-4" x-data="{ activeAccordion: null }">
                    @for($i = 1; $i <= 6; $i++)
                        @php 
                            $q = $content['faq_'.$i.'_q'] ?? '';
                            $a = $content['faq_'.$i.'_a'] ?? '';
                        @endphp
                        @if($q && $a)
                            <div class="border-b border-white/10 pb-4">
                                <button class="flex justify-between items-center w-full text-left font-medium text-lg py-4 text-white hover:text-[#d86a77] transition-colors focus:outline-none" 
                                        @click="activeAccordion = activeAccordion === {{ $i }} ? null : {{ $i }}">
                                    <span>{{ $q }}</span>
                                    <span class="ml-6 flex-shrink-0">
                                        <svg class="h-6 w-6 transform transition-transform duration-200" :class="{ 'rotate-45': activeAccordion === {{ $i }} }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </span>
                                </button>
                                <div x-show="activeAccordion === {{ $i }}" 
                                     x-transition:enter="transition ease-out duration-200" 
                                     x-transition:enter-start="opacity-0 transform -translate-y-2" 
                                     x-transition:enter-end="opacity-100 transform translate-y-0"
                                     x-transition:leave="transition ease-in duration-150" 
                                     x-transition:leave-start="opacity-100 transform translate-y-0" 
                                     x-transition:leave-end="opacity-0 transform -translate-y-2"
                                     style="display: none;" 
                                     class="pb-6 text-gray-400 leading-relaxed">
                                    {{ $a }}
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </section>

        {{-- SEO Article Block --}}
        <section class="py-24 border-t border-white/5 bg-[#130811]">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="inline-flex items-center px-4 py-1.5 border border-white/20 rounded-full mb-8">
                    <span class="text-[10px] font-bold tracking-[0.2em] text-[#d86a77] uppercase">{{ $content['seo_article_tag'] ?? '' }}</span>
                </div>
                <h2 class="font-serif text-3xl md:text-4xl text-white mb-10 leading-tight">
                    {{ $content['seo_article_title'] ?? '' }}
                </h2>
                
                <div class="article-content prose prose-invert prose-lg max-w-none text-gray-300">
                    {!! $content['seo_article_html'] ?? '' !!}
                </div>
            </div>
        </section>

        {{-- Order Form Section --}}
        <section id="order-form" class="py-24 bg-[#faf6f0] rounded-t-[3rem] text-gray-900 mt-12">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="font-serif text-4xl sm:text-5xl text-[#500c19] mb-4">Start Your <span class="italic text-[#d86a77]">Heartgram.</span></h2>
                    <p class="text-gray-500">The more personal your story, the more personal your song will feel.</p>
                </div>

                {{-- Using the same order form partial from landing page if possible, but creating here for simplicity --}}
                <div class="bg-white p-8 md:p-10 rounded-2xl shadow-sm border border-gray-100">
                    <form action="{{ route('leads.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="source_page" value="{{ request()->path() }}">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Your Name *</label>
                                <input type="text" name="name" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-pink-500 focus:ring-pink-500 py-3">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">WhatsApp Number *</label>
                                <input type="tel" name="whatsapp_number" required class="w-full border-gray-300 rounded-lg shadow-sm focus:border-pink-500 focus:ring-pink-500 py-3" placeholder="+91">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email (optional)</label>
                                <input type="email" name="email" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-pink-500 focus:ring-pink-500 py-3">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Occasion Date</label>
                                <input type="date" name="occasion_date" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-pink-500 focus:ring-pink-500 py-3">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Choose Occasion</label>
                            <div class="flex flex-wrap gap-2">
                                @foreach(['Birthday', 'Anniversary', 'Proposal', 'Wedding', 'Parents', 'Apology'] as $occasion)
                                <label class="cursor-pointer">
                                    <input type="radio" name="occasion" value="{{ $occasion }}" class="peer sr-only">
                                    <div class="px-4 py-2 border border-gray-200 rounded-full text-sm text-gray-600 peer-checked:bg-pink-50 peer-checked:text-pink-700 peer-checked:border-pink-200 transition">
                                        {{ $occasion }}
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="pt-6">
                            <button type="submit" class="w-full bg-[#d86a77] text-white font-medium py-4 rounded-xl shadow-lg hover:bg-[#c75966] transition">
                                Submit Details &rarr;
                            </button>
                            <p class="text-xs text-center text-gray-400 mt-4">Our team will contact you on WhatsApp to confirm details before payment.</p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        
    </main>

    @include('partials.footer')
    
</body>
</html>
