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
    </style>
</head>
<body class="antialiased bg-[#faf6f0] text-gray-800 flex flex-col min-h-screen">
    
    {{-- Header --}}
    <header class="fixed w-full top-0 z-50 bg-[#faf6f0]/90 backdrop-blur-md border-b border-[#e8dfd3]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Heartgrams" class="h-6 sm:h-8">
                </a>
                <nav class="hidden md:flex space-x-8">
                    <a href="#reactions" class="text-sm font-medium text-gray-600 hover:text-[#500c19] transition">Reactions</a>
                    <a href="#pricing" class="text-sm font-medium text-gray-600 hover:text-[#500c19] transition">Pricing</a>
                    <a href="#samples" class="text-sm font-medium text-gray-600 hover:text-[#500c19] transition">What's included</a>
                </nav>
                <a href="{{ $content['hero_btn1_link'] ?? '#' }}" class="bg-[#500c19] text-white px-5 py-2.5 rounded-full text-sm font-medium hover:bg-[#3a0812] transition shadow-md">
                    Start My Song
                </a>
            </div>
        </div>
    </header>

    <main class="flex-grow pt-20">
        
        {{-- Hero Section --}}
        <section id="hero" class="min-h-[calc(100vh-80px)] flex items-center py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row items-center gap-12 lg:gap-16 w-full">
                
                {{-- Left Content --}}
                <div class="flex-1 space-y-6">
                    <div class="inline-flex items-center gap-2">
                        <span class="text-[10px] font-bold tracking-[0.2em] text-[#d48c8c] uppercase">{{ $content['hero_tagline'] ?? '' }}</span>
                    </div>
                    <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl leading-[1.1] text-[#500c19]">
                        {!! $content['hero_title'] ?? '' !!}
                    </h1>
                    
                    <div class="flex items-start gap-2 pt-2">
                        <svg class="w-5 h-5 text-[#500c19] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <p class="font-medium text-[#500c19]">No writing skills needed. Our writers turn your story into lyrics for you.</p>
                    </div>

                    <p class="text-[16px] text-gray-600 leading-relaxed max-w-xl">
                        {{ $content['hero_description'] ?? '' }}
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-3.5 sm:gap-4 pt-4 items-stretch sm:items-center">
                        <a href="{{ $content['hero_btn1_link'] ?? '#' }}" class="w-full sm:w-auto inline-flex items-center justify-center bg-[#500c19] text-white px-6 py-3 rounded-full font-medium hover:bg-[#3a0812] transition shadow-lg gap-2 text-center">
                            {{ $content['hero_btn1_text'] ?? '' }}
                        </a>
                        <a href="{{ $content['hero_btn2_link'] ?? '#' }}" class="w-full sm:w-auto inline-flex items-center justify-center bg-transparent border border-gray-300 text-gray-700 px-6 py-3 rounded-full font-medium hover:bg-gray-100 transition text-center">
                            {{ $content['hero_btn2_text'] ?? '' }}
                        </a>
                    </div>
                    <div class="flex items-center gap-2 text-xs text-[#d86a77] font-medium">
                        <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                        {{ $content['hero_warning_text'] ?? '' }}
                    </div>

                    <div class="grid grid-cols-3 gap-4 sm:gap-8 pt-8 sm:pt-10 border-t border-gray-200 mt-8 sm:mt-10">
                        <div>
                            <div class="font-serif text-2xl sm:text-3xl text-[#500c19]">{{ $content['hero_stat1_number'] ?? '' }}</div>
                            <div class="text-[11px] sm:text-xs text-gray-500 mt-1">{{ $content['hero_stat1_label'] ?? '' }}</div>
                        </div>
                        <div>
                            <div class="font-serif text-2xl sm:text-3xl text-[#500c19]">{{ $content['hero_stat2_number'] ?? '' }}</div>
                            <div class="text-[11px] sm:text-xs text-gray-500 mt-1">{{ $content['hero_stat2_label'] ?? '' }}</div>
                        </div>
                        <div>
                            <div class="font-serif text-2xl sm:text-3xl text-[#500c19]">{{ $content['hero_stat3_number'] ?? '' }}</div>
                            <div class="text-[11px] sm:text-xs text-gray-500 mt-1">{{ $content['hero_stat3_label'] ?? '' }}</div>
                        </div>
                    </div>
                </div>

                {{-- Right Content (Card) --}}
                <div class="flex-1 w-full relative">
                    {{-- Decorative shadow --}}
                    <div class="absolute inset-0 bg-[#e8dfd3] rounded-[2rem] transform translate-x-2 sm:translate-x-4 translate-y-2 sm:translate-y-4"></div>
                    <div class="relative bg-[#500c19] rounded-[2rem] p-6 sm:p-8 md:p-12 text-white shadow-2xl">
                        <div class="text-xs font-bold tracking-[0.2em] text-[#d86a77] uppercase mb-6">{{ $content['hero_card_tag'] ?? '' }}</div>
                        <h3 class="font-serif text-3xl md:text-4xl italic mb-3">{{ $content['hero_card_title'] ?? '' }}</h3>
                        <p class="text-[#d86a77] text-sm md:text-base mb-10">{{ $content['hero_card_subtitle'] ?? '' }}</p>
                        
                        {{-- Audio Player / Waveform --}}
                        <audio id="heroCardAudio" src="{{ $content['hero_card_audio_link'] ?? '' }}" preload="none"></audio>
                        <div class="flex items-center gap-4 mb-8">
                            <button id="heroCardPlayBtn" class="w-12 h-12 shrink-0 bg-[#d86a77] hover:bg-[#c75966] rounded-full flex items-center justify-center text-white transition shadow-lg focus:outline-none">
                                <svg id="heroCardPlayIcon" class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                <svg id="heroCardPauseIcon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>
                            </button>
                            <div class="flex items-center justify-between h-12 flex-1 opacity-80 gap-1">
                                @for($i = 0; $i < 30; $i++)
                                    <div class="hero-card-waveform-bar w-1.5 bg-[#d86a77] rounded-full transition-all duration-150" style="height: {{ rand(20, 100) }}%"></div>
                                @endfor
                            </div>
                        </div>

                        <p class="text-sm text-gray-300 pt-6 border-t border-white/20">{{ $content['hero_card_footer'] ?? '' }}</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Reactions Section --}}
        <section id="reactions" class="py-24 bg-[#500c19] text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h4 class="text-xs font-bold tracking-[0.2em] text-[#d86a77] uppercase mb-4">{{ $content['reactions_subtitle'] ?? '' }}</h4>
                <h2 class="font-serif text-4xl md:text-5xl mb-16">{{ $content['reactions_title'] ?? '' }}</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @for($i = 1; $i <= 3; $i++)
                    @php 
                        $tag = $content["reaction_{$i}_tag"] ?? ($i === 1 ? 'Love' : ($i === 2 ? 'Birthday' : 'Parents')); 
                        $video = $content["reaction_{$i}_video"] ?? '';
                        $duration = $content["reaction_{$i}_duration"] ?? '0:47';
                    @endphp
                    <div class="relative bg-[#681825] rounded-3xl aspect-[4/3] flex items-center justify-center overflow-hidden group shadow-xl border border-white/5 hover:border-white/20 transition">
                        @if($video)
                            <video src="{{ $video }}" class="reaction-video absolute inset-0 w-full h-full object-cover z-0 hidden" controls playsinline preload="none"></video>
                        @endif
                        
                        <div class="reaction-controls absolute inset-0 flex items-center justify-center pointer-events-none z-10 transition-opacity">
                            <div class="absolute top-4 left-4 bg-[#d86a77] text-[#500c19] text-xs font-bold px-3 py-1 rounded-full pointer-events-auto">{{ $tag }}</div>
                            
                            <div class="reaction-play-btn w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition cursor-pointer pointer-events-auto">
                                <svg class="w-6 h-6 text-[#500c19] ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"/></svg>
                            </div>
                            
                            <div class="absolute bottom-4 right-4 bg-black/50 backdrop-blur text-xs px-2 py-1 rounded">{{ $duration }}</div>
                        </div>

                        @if(!$video)
                        <div class="absolute inset-0 flex items-center justify-center opacity-10 pointer-events-none z-0">
                            <div class="font-serif text-9xl">{{ substr($tag, 0, 1) }}</div>
                        </div>
                        @endif
                    </div>
                    @endfor
                </div>
            </div>
        </section>

        {{-- Audio Sample Section --}}
        <section id="samples" class="py-24 bg-[#500c19] text-white border-t border-white/10 relative overflow-hidden">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <h4 class="text-xs font-bold tracking-[0.2em] text-[#d86a77] uppercase mb-4">{{ $content['audio_subtitle'] ?? '' }}</h4>
                    <h2 class="font-serif text-4xl md:text-5xl mb-4">{{ $content['audio_title'] ?? '' }}</h2>
                    <p class="text-gray-300">{{ $content['audio_desc'] ?? '' }}</p>
                </div>

                <div class="flex flex-col md:flex-row gap-8">
                    {{-- Sidebar --}}
                    <div class="w-full md:w-64 space-y-2 bg-[#3a0812] p-4 rounded-3xl" id="audioCategoriesContainer">
                        @php
                            $defaultAudio = [
                                1 => ['name' => 'Anniversary', 'title' => 'The "10 Years Later" Song', 'subtitle' => 'Acoustic Pop · English'],
                                2 => ['name' => 'Proposal', 'title' => 'The "Will You?" Song', 'subtitle' => 'Romantic Ballad · Hindi'],
                                3 => ['name' => 'Birthday', 'title' => 'The "To My Best Friend" Song', 'subtitle' => 'Upbeat Pop · Tamil'],
                                4 => ['name' => 'Apology', 'title' => 'The "I\'m Sorry" Song', 'subtitle' => '60-second sample - original composition']
                            ];
                        @endphp
                        @for($i = 1; $i <= 4; $i++)
                        @php 
                            $catName = $content["audio_cat_{$i}_name"] ?? $defaultAudio[$i]['name'];
                            if (!$catName) continue;
                        @endphp
                            <div class="audio-cat-btn flex items-center justify-between px-6 py-4 rounded-2xl cursor-pointer transition {{ $i === 1 ? 'bg-[#d86a77] text-[#500c19] font-medium shadow-md active' : 'hover:bg-white/10 text-gray-300' }}" data-index="{{ $i }}">
                                <span>{{ $catName }}</span>
                                <svg class="w-4 h-4 {{ $i === 1 ? 'text-[#500c19]' : 'text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.236l8-1.6V11.114A4.369 4.369 0 0015 11c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"/></svg>
                            </div>
                        @endfor
                    </div>

                    {{-- Player Card --}}
                    <div class="flex-1 bg-[#faf6f0] text-[#500c19] rounded-3xl p-8 md:p-12 shadow-2xl flex flex-col justify-center relative overflow-hidden" id="audioPlayerCard">
                        <div class="text-xs font-bold tracking-[0.2em] text-[#d86a77] uppercase mb-4">{{ $content['audio_player_tag'] ?? '' }}</div>
                        <h3 class="font-serif text-3xl mb-1" id="audioPlayerTitle">{{ $content['audio_cat_1_title'] ?? $defaultAudio[1]['title'] }}</h3>
                        <p class="text-gray-500 text-sm mb-12" id="audioPlayerSubtitle">{{ $content['audio_cat_1_subtitle'] ?? $defaultAudio[1]['subtitle'] }}</p>
                        
                        <div class="flex items-center gap-6 relative">
                            <audio id="audioSamplesPlayer" src="{{ $content['audio_cat_1_mp3'] ?? '' }}" preload="none"></audio>
                            <button id="audioSamplesPlayBtn" class="w-12 h-12 shrink-0 bg-white shadow-md rounded-full flex items-center justify-center hover:scale-105 transition focus:outline-none">
                                <svg id="audioSamplesPlayIcon" class="w-5 h-5 text-[#d86a77] ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4l12 6-12 6z"/></svg>
                                <svg id="audioSamplesPauseIcon" class="w-5 h-5 text-[#d86a77] hidden" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM7 8a1 1 0 012 0v4a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v4a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            </button>
                            <div class="flex-1 flex items-center gap-1 opacity-50" id="audioSamplesWaveform">
                                @for($i = 0; $i < 30; $i++)
                                    <div class="audio-samples-waveform-bar w-1.5 bg-[#500c19] rounded-full transition-all duration-150" style="height: {{ rand(10, 30) }}px"></div>
                                @endfor
                            </div>
                            <div class="text-sm font-medium text-gray-500 tabular-nums"><span id="audioSamplesCurrentTime">00:00</span> / <span id="audioSamplesDurationTime">0:00</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Pricing Section --}}
        <section id="pricing" class="py-24 bg-[#faf6f0] relative z-20">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h4 class="text-xs font-bold tracking-[0.2em] text-[#d86a77] uppercase mb-4">{{ $content['pricing_subtitle'] ?? '' }}</h4>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#500c19] mb-4">{{ $content['pricing_title'] ?? '' }}</h2>
                    <p class="text-gray-600">{{ $content['pricing_desc'] ?? '' }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 lg:px-12 items-end">
                    
                    {{-- Classic Tier --}}
                    <div class="bg-white rounded-[2rem] p-8 border border-gray-200 shadow-xl relative">
                        <div class="text-xs font-bold tracking-wider text-gray-500 uppercase mb-4">FOR HEARTFELT PERSONAL GIFTS</div>
                        <h3 class="font-serif text-3xl text-[#500c19] mb-4">Heartgrams Classic</h3>
                        <div class="flex items-baseline gap-2 mb-1">
                            <span class="text-5xl font-serif text-[#500c19]">₹{{ \App\PageContent::get('plan_classic_price', '1,999') }}</span>
                        </div>
                        <p class="text-sm text-gray-500 mb-6 pb-6 border-b border-gray-100">all-inclusive · no hidden fees</p>
                        
                        <p class="text-sm text-gray-600 mb-8 italic">Birthday · Love song · Thank you · Apology</p>

                        <ul class="space-y-4 mb-10">
                            @foreach(['Personalised song from your story', 'Human-crafted lyrics', 'One selected language', 'MP3 delivery via WhatsApp', 'Lyrics PDF included', '5-7 day delivery'] as $feature)
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span class="text-gray-700 text-sm">{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <a href="#" class="block text-center w-full bg-white border border-gray-300 text-gray-800 py-3 rounded-full font-medium hover:bg-gray-50 transition">
                            Choose Classic →
                        </a>
                    </div>

                    {{-- Signature Tier --}}
                    <div class="bg-[#500c19] rounded-[2rem] p-8 md:p-10 shadow-2xl relative transform md:-translate-y-4">
                        <div class="absolute -top-4 right-8 bg-[#d86a77] text-[#500c19] text-xs font-bold px-4 py-1.5 rounded-full shadow-lg">Most Loved</div>
                        <div class="text-xs font-bold tracking-wider text-[#d86a77] uppercase mb-4">FOR DEEPER EMOTIONAL STORIES</div>
                        <h3 class="font-serif text-3xl text-white mb-4">Heartgrams Signature</h3>
                        <div class="flex items-baseline gap-2 mb-1">
                            <span class="text-5xl font-serif text-white">₹{{ \App\PageContent::get('plan_premium_price', '2,999') }}</span>
                        </div>
                        <p class="text-sm text-gray-300 mb-6 pb-6 border-b border-white/10">all-inclusive · no hidden fees</p>
                        
                        <p class="text-sm text-[#d86a77] mb-8 italic">Proposal · Anniversary · Wedding · Parents · Deep love</p>

                        <ul class="space-y-4 mb-10">
                            @foreach(['More detailed story shaping', 'Priority song creation', 'Human-crafted emotional lyrics', 'MP3 + Lyrics PDF', 'Priority delivery'] as $feature)
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-white shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span class="text-white text-sm">{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <a href="#" class="block text-center w-full bg-[#faf6f0] text-[#500c19] py-3 rounded-full font-medium hover:bg-white transition shadow-lg">
                            Choose Signature →
                        </a>
                    </div>
                </div>

                {{-- Comparison Table --}}
                <div class="mt-20 overflow-hidden rounded-2xl border border-gray-200 shadow-sm bg-white">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#500c19] text-white">
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider w-1/3">Feature</th>
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-center">Classic · ₹1,999</th>
                                <th class="py-4 px-6 text-xs font-bold uppercase tracking-wider text-center">Signature · ₹2,999</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="border-b border-gray-100">
                                <td class="py-4 px-6 font-medium text-gray-900 bg-gray-50/50">Best for</td>
                                <td class="py-4 px-6 text-gray-600 text-center">Birthdays, love songs, thank-yous</td>
                                <td class="py-4 px-6 text-[#500c19] font-medium text-center">Anniversary, proposal, wedding, apology</td>
                            </tr>
                            <tr class="border-b border-gray-100">
                                <td class="py-4 px-6 font-medium text-gray-900 bg-gray-50/50">Emotional depth</td>
                                <td class="py-4 px-6 text-gray-600 text-center">Heartfelt & personal</td>
                                <td class="py-4 px-6 text-[#500c19] font-medium text-center">Deeply detailed & layered</td>
                            </tr>
                            <tr class="border-b border-gray-100">
                                <td class="py-4 px-6 font-medium text-gray-900 bg-gray-50/50">Story detailing</td>
                                <td class="py-4 px-6 text-gray-600 text-center">Standard</td>
                                <td class="py-4 px-6 text-[#500c19] font-medium text-center">In-depth story shaping</td>
                            </tr>
                            <tr class="border-b border-gray-100">
                                <td class="py-4 px-6 font-medium text-gray-900 bg-gray-50/50">Delivery time</td>
                                <td class="py-4 px-6 text-gray-600 text-center">5-7 days</td>
                                <td class="py-4 px-6 text-[#500c19] font-medium text-center">Priority</td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6 font-medium text-gray-900 bg-gray-50/50">Corrections</td>
                                <td class="py-4 px-6 text-gray-600 text-center">✓ 1 minor</td>
                                <td class="py-4 px-6 text-[#500c19] font-medium text-center">✓ 1 minor</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        {{-- CTA Section --}}
        <section class="py-24 md:py-32 bg-[#500c19] relative overflow-hidden">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative z-10">
                <h4 class="text-xs font-bold tracking-[0.2em] text-[#d86a77] uppercase mb-6">{{ $content['cta_subtitle'] ?? '' }}</h4>
                <h2 class="font-serif text-4xl md:text-5xl mb-4">{!! $content['cta_title'] ?? '' !!}</h2>
                <p class="text-gray-300 mb-10">{{ $content['cta_desc'] ?? '' }}</p>
                
                <div class="flex justify-center items-center gap-8 mb-10">
                    <div class="text-center">
                        <div class="font-serif text-3xl line-through text-white/50">₹1,999</div>
                        <div class="text-xs text-[#d86a77] uppercase tracking-wider font-bold mt-1">Classic</div>
                    </div>
                    <div class="text-center">
                        <div class="font-serif text-3xl line-through text-white/50">₹2,999</div>
                        <div class="text-xs text-[#d86a77] uppercase tracking-wider font-bold mt-1">Signature</div>
                    </div>
                    <div class="text-center">
                        <div class="font-serif text-4xl text-white">FREE</div>
                        <div class="text-xs text-[#d86a77] uppercase tracking-wider font-bold mt-1">₹1,197 in bonuses</div>
                    </div>
                </div>

                <a href="{{ $content['cta_btn_link'] ?? '#' }}" class="inline-block bg-[#faf6f0] text-[#500c19] px-8 py-4 rounded-full font-bold text-lg hover:bg-white transition shadow-xl">
                    {{ $content['cta_btn_text'] ?? '' }}
                </a>

                <div class="flex items-center justify-center gap-2 mt-8 text-xs text-[#d86a77] font-medium">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $content['cta_warning_text'] ?? '' }}
                </div>
            </div>
        </section>

        {{-- Order Form Section --}}
        <section id="order-form" class="py-16 bg-[#faf6f0]">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-[0_8px_30px_rgba(0,0,0,0.06)] border border-gray-100">
                    <form action="#" method="POST" class="space-y-10">
                        {{-- About You --}}
                        <div>
                            <h3 class="text-[#500c19] text-sm font-bold tracking-wider mb-6">1. ABOUT YOU</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-bold text-[#500c19] tracking-wider mb-2 uppercase">Your Name *</label>
                                    <input type="text" placeholder="Your full name" class="w-full bg-[#faf6f0] border border-[#f0e8dc] rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#d86a77] focus:outline-none">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-[#500c19] tracking-wider mb-2 uppercase">WhatsApp Number *</label>
                                    <input type="tel" placeholder="+91 00000 00000" class="w-full bg-[#faf6f0] border border-[#f0e8dc] rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#d86a77] focus:outline-none">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-[#500c19] tracking-wider mb-2 uppercase">Email (Optional)</label>
                                    <input type="email" placeholder="you@email.com" class="w-full bg-[#faf6f0] border border-[#f0e8dc] rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#d86a77] focus:outline-none">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-[#500c19] tracking-wider mb-2 uppercase">Event / Occasion Date</label>
                                    <input type="date" class="w-full bg-[#faf6f0] border border-[#f0e8dc] rounded-xl px-4 py-3 text-sm text-gray-500 focus:ring-2 focus:ring-[#d86a77] focus:outline-none">
                                </div>
                            </div>
                        </div>

                        {{-- Occasion --}}
                        <div>
                            <h3 class="text-[#500c19] text-sm font-bold tracking-wider mb-6">2. CHOOSE OCCASION</h3>
                            <div class="flex flex-wrap gap-3">
                                @foreach(['Birthday', 'Anniversary', 'Proposal', 'Wedding', 'Parents', 'Apology', 'Thank You', 'Long-Distance'] as $occasion)
                                <label class="cursor-pointer">
                                    <input type="radio" name="occasion" value="{{ $occasion }}" class="peer sr-only">
                                    <div class="px-5 py-2.5 rounded-full border border-[#e8dfd3] text-sm font-medium text-[#500c19] bg-white peer-checked:bg-[#500c19] peer-checked:text-white peer-checked:border-[#500c19] hover:bg-[#faf6f0] hover:border-[#d86a77] transition-all">
                                        {{ $occasion }}
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="pt-4">
                            <button type="button" class="w-full bg-[#500c19] text-white rounded-full py-4 font-bold text-[15px] hover:bg-[#3a0812] transition-colors shadow-lg">
                                Continue to Your Story →
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        {{-- Privacy Promise Section --}}
        <section class="py-12 bg-[#faf6f0]">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-[2rem] p-8 md:p-12 shadow-[0_8px_30px_rgba(0,0,0,0.06)] border border-gray-100">
                    <h4 class="text-[10px] font-bold tracking-[0.2em] text-[#500c19] uppercase mb-4">A PRIVACY PROMISE</h4>
                    <h2 class="font-serif text-3xl md:text-4xl text-[#500c19] mb-4">Your story stays yours.</h2>
                    <p class="text-gray-600 mb-8 text-sm md:text-base leading-relaxed">We use your details only to write your song. Nothing is shared publicly without your permission, and every request is handled privately over WhatsApp.</p>
                    <a href="#order-form" class="inline-block px-6 py-3 rounded-full border border-gray-200 text-sm font-medium text-gray-800 hover:bg-gray-50 transition">
                        Create My Private Song &rarr;
                    </a>
                </div>
            </div>
        </section>

        {{-- FAQ Section --}}
        <section id="faq" class="py-24 bg-[#faf6f0]">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h4 class="text-[10px] font-bold tracking-[0.2em] text-[#500c19] uppercase mb-4">FREQUENTLY ASKED QUESTIONS</h4>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#500c19]">Questions? We have answers.</h2>
                </div>

                <div class="space-y-4">
                    @php
                        $faqs = [];
                        for($i = 1; $i <= 6; $i++) {
                            $q = $content['faq_'.$i.'_q'] ?? '';
                            $a = $content['faq_'.$i.'_a'] ?? '';
                            if(!empty($q)) {
                                $faqs[] = ['q' => $q, 'a' => $a];
                            }
                        }
                    @endphp

                    @foreach($faqs as $index => $faq)
                    <div class="bg-white rounded-2xl border border-[#f0e8dc] shadow-sm overflow-hidden faq-item transition-all duration-200 hover:shadow-md">
                        <button class="faq-btn w-full px-6 py-5 text-left flex justify-between items-center focus:outline-none">
                            <span class="font-medium text-gray-800 text-sm md:text-[15px]">{{ $faq['q'] }}</span>
                            <span class="faq-icon text-[#500c19] text-2xl leading-none font-light transition-transform duration-300 origin-center inline-flex items-center justify-center">+</span>
                        </button>
                        <div class="faq-content hidden px-6 pb-6 text-gray-600 text-sm leading-relaxed border-t border-gray-50 pt-4">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        </section>

    </main>
    
    @include('partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const audio = document.getElementById('heroCardAudio');
            const playBtn = document.getElementById('heroCardPlayBtn');
            const playIcon = document.getElementById('heroCardPlayIcon');
            const pauseIcon = document.getElementById('heroCardPauseIcon');
            const bars = document.querySelectorAll('.hero-card-waveform-bar');
            let isPlaying = false;
            let animationInterval;

            if (playBtn && audio) {
                playBtn.addEventListener('click', () => {
                    if (!audio.src || audio.src.endsWith(window.location.pathname) || audio.src.endsWith('#')) {
                        alert('No audio uploaded for this player yet. Please add an MP3 link in the admin panel.');
                        return;
                    }
                    if (isPlaying) {
                        audio.pause();
                        playIcon.classList.remove('hidden');
                        pauseIcon.classList.add('hidden');
                        clearInterval(animationInterval);
                    } else {
                        audio.play();
                        playIcon.classList.add('hidden');
                        pauseIcon.classList.remove('hidden');
                        animationInterval = setInterval(() => {
                            bars.forEach(bar => {
                                bar.style.height = `${Math.random() * 80 + 20}%`;
                            });
                        }, 150);
                    }
                    isPlaying = !isPlaying;
                });

                audio.addEventListener('ended', () => {
                    isPlaying = false;
                    playIcon.classList.remove('hidden');
                    pauseIcon.classList.add('hidden');
                    clearInterval(animationInterval);
                    bars.forEach((bar) => {
                        bar.style.height = `${Math.random() * 80 + 20}%`;
                    });
                });
            }
        });

        // Reaction Videos
        document.querySelectorAll('.reaction-play-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const container = this.closest('.relative');
                const video = container.querySelector('.reaction-video');
                const controls = container.querySelector('.reaction-controls');
                
                if (video) {
                    controls.classList.add('hidden');
                    video.classList.remove('hidden');
                    video.play();
                } else {
                    alert('No video uploaded for this reaction yet. Please add a video link in the admin panel.');
                }
            });
        });

        // FAQ Accordion
        document.querySelectorAll('.faq-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const item = btn.closest('.faq-item');
                const content = item.querySelector('.faq-content');
                const icon = item.querySelector('.faq-icon');
                
                const isOpen = !content.classList.contains('hidden');
                
                // Close all others
                document.querySelectorAll('.faq-item').forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.querySelector('.faq-content').classList.add('hidden');
                        const otherIcon = otherItem.querySelector('.faq-icon');
                        otherIcon.classList.remove('rotate-45');
                    }
                });
                
                // Toggle current
                if (isOpen) {
                    content.classList.add('hidden');
                    icon.classList.remove('rotate-45');
                } else {
                    content.classList.remove('hidden');
                    icon.classList.add('rotate-45');
                }
            });
        });

        // Audio Samples Player
        const categories = {
            @for($i = 1; $i <= 4; $i++)
            @php $catName = $content["audio_cat_{$i}_name"] ?? $defaultAudio[$i]['name']; @endphp
            @if($catName)
            "{{ $i }}": {
                title: @json($content["audio_cat_{$i}_title"] ?? $defaultAudio[$i]['title']),
                subtitle: @json($content["audio_cat_{$i}_subtitle"] ?? $defaultAudio[$i]['subtitle']),
                mp3: @json($content["audio_cat_{$i}_mp3"] ?? '')
            },
            @endif
            @endfor
        };

        const catBtns = document.querySelectorAll('.audio-cat-btn');
        const audioSamplesPlayer = document.getElementById('audioSamplesPlayer');
        const audioSamplesTitle = document.getElementById('audioPlayerTitle');
        const audioSamplesSubtitle = document.getElementById('audioPlayerSubtitle');
        const audioSamplesPlayBtn = document.getElementById('audioSamplesPlayBtn');
        const audioSamplesPlayIcon = document.getElementById('audioSamplesPlayIcon');
        const audioSamplesPauseIcon = document.getElementById('audioSamplesPauseIcon');
        const audioSamplesBars = document.querySelectorAll('.audio-samples-waveform-bar');
        const audioSamplesCurrentTime = document.getElementById('audioSamplesCurrentTime');
        const audioSamplesDurationTime = document.getElementById('audioSamplesDurationTime');

        let isSamplesPlaying = false;
        let samplesAnimationInterval;

        const formatTime = (time) => {
            if (isNaN(time)) return '00:00';
            const minutes = Math.floor(time / 60);
            const seconds = Math.floor(time % 60);
            return `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        };

        if (audioSamplesPlayer) {
            audioSamplesPlayer.addEventListener('loadedmetadata', () => {
                audioSamplesDurationTime.textContent = formatTime(audioSamplesPlayer.duration);
            });

            audioSamplesPlayer.addEventListener('timeupdate', () => {
                audioSamplesCurrentTime.textContent = formatTime(audioSamplesPlayer.currentTime);
            });
        }

        catBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active styling from all
                catBtns.forEach(b => {
                    b.classList.remove('bg-[#d86a77]', 'text-[#500c19]', 'font-medium', 'shadow-md', 'active');
                    b.classList.add('hover:bg-white/10', 'text-gray-300');
                    b.querySelector('svg').classList.remove('text-[#500c19]');
                    b.querySelector('svg').classList.add('text-gray-500');
                });

                // Add active styling to clicked
                this.classList.add('bg-[#d86a77]', 'text-[#500c19]', 'font-medium', 'shadow-md', 'active');
                this.classList.remove('hover:bg-white/10', 'text-gray-300');
                this.querySelector('svg').classList.remove('text-gray-500');
                this.querySelector('svg').classList.add('text-[#500c19]');

                // Update content
                const index = this.getAttribute('data-index');
                const cat = categories[index];
                if (cat) {
                    audioSamplesTitle.textContent = cat.title;
                    audioSamplesSubtitle.textContent = cat.subtitle;
                    audioSamplesPlayer.src = cat.mp3;
                    
                    // Reset player
                    audioSamplesPlayer.pause();
                    isSamplesPlaying = false;
                    audioSamplesPlayIcon.classList.remove('hidden');
                    audioSamplesPauseIcon.classList.add('hidden');
                    clearInterval(samplesAnimationInterval);
                    audioSamplesCurrentTime.textContent = '00:00';
                    audioSamplesDurationTime.textContent = '0:00';
                    audioSamplesBars.forEach(bar => {
                        bar.style.height = `${Math.random() * 20 + 10}px`;
                    });
                }
            });
        });

        if (audioSamplesPlayBtn) {
            audioSamplesPlayBtn.addEventListener('click', () => {
                if (!audioSamplesPlayer.src || audioSamplesPlayer.src.endsWith(window.location.pathname) || audioSamplesPlayer.src.endsWith('#')) {
                    alert('No audio uploaded for this category yet. Please add an MP3 link in the admin panel.');
                    return;
                }
                if (isSamplesPlaying) {
                    audioSamplesPlayer.pause();
                    audioSamplesPlayIcon.classList.remove('hidden');
                    audioSamplesPauseIcon.classList.add('hidden');
                    clearInterval(samplesAnimationInterval);
                } else {
                    audioSamplesPlayer.play();
                    audioSamplesPlayIcon.classList.add('hidden');
                    audioSamplesPauseIcon.classList.remove('hidden');
                    samplesAnimationInterval = setInterval(() => {
                        audioSamplesBars.forEach(bar => {
                            bar.style.height = `${Math.random() * 20 + 10}px`;
                        });
                    }, 150);
                }
                isSamplesPlaying = !isSamplesPlaying;
            });

            audioSamplesPlayer.addEventListener('ended', () => {
                isSamplesPlaying = false;
                audioSamplesPlayIcon.classList.remove('hidden');
                audioSamplesPauseIcon.classList.add('hidden');
                clearInterval(samplesAnimationInterval);
                audioSamplesBars.forEach(bar => {
                    bar.style.height = `${Math.random() * 20 + 10}px`;
                });
            });
        }
    </script>
</body>
</html>
