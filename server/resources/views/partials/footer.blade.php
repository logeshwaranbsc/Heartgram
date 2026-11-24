@php
    $email = \App\PageContent::get('home_footer_email', 'hello@heartgrams.in');
    $whatsappNum = \App\PageContent::get('home_footer_whatsapp', '+91 95854 75959');
    $whatsappDigits = preg_replace('/[^0-9]/', '', $whatsappNum) ?: '919585475959';
    $whatsappUrl = 'https://wa.me/' . $whatsappDigits . '?text=Hi%20Heartgrams%2C%20I%20would%20like%20to%20create%20a%20song';
    $tagline = \App\PageContent::get('home_footer_tagline', 'Turning your emotions into personalized songs that last a lifetime. Written by real lyricists, composed from your story.');
@endphp

<footer 
    x-data="{ 
        openGroup: null,
        toggle(name) {
            this.openGroup = this.openGroup === name ? null : name;
        }
    }"
    class="bg-[#120a0d] text-white pt-8 lg:pt-14 pb-8 relative overflow-hidden border-t border-white/5"
>
    {{-- Ambient top glow --}}
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[150px] bg-rose-500/5 blur-[120px] pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        {{-- ========================================================
             MOBILE VIEW (MINIMIZED ACCORDIONS MATCHING REFERENCE)
             ======================================================== --}}
        <div class="block lg:hidden">
            {{-- Brand info --}}
            <div class="mb-5">
                <a href="{{ route('home') }}" class="mb-3.5 inline-block bg-white px-3.5 py-1.5 rounded-2xl shadow-sm hover:opacity-95 transition-opacity">
                    <img src="{{ asset('images/logo.png') }}" alt="Heartgrams" class="h-7 w-auto">
                </a>
                <p class="text-white/60 text-[13px] leading-relaxed max-w-[320px] mb-4">
                    {{ $tagline }}
                </p>
                <div>
                    <a href="{{ route('home') }}#start" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-crimson-600/15 hover:bg-crimson-600/25 text-pink-200 border border-crimson-500/30 text-[12px] font-medium transition-all group">
                        <span>Create Your Heartgram</span>
                        <span class="group-hover:translate-x-1 transition-transform text-crimson-400">→</span>
                    </a>
                </div>
            </div>

            {{-- Minimized Accordion List (Clean dividers matching reference) --}}
            <div class="border-t border-b border-white/10 divide-y divide-white/10 mb-6">
                
                {{-- 1. Explore Accordion --}}
                <div>
                    <button 
                        type="button" 
                        @click="toggle('explore')" 
                        class="w-full flex items-center justify-between py-3.5 text-left cursor-pointer select-none group"
                    >
                        <span class="text-[14.5px] font-medium text-white/90 group-hover:text-white transition-colors">Explore</span>
                        <svg 
                            class="w-4 h-4 text-white/50 transition-transform duration-300"
                            :class="openGroup === 'explore' ? 'rotate-180 text-pink-300' : ''" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <div x-show="openGroup === 'explore'" x-collapse class="overflow-hidden">
                        <nav class="space-y-2.5 pb-4 pt-1">
                            <a href="{{ route('occasions') }}" class="flex items-center gap-3 text-[13.5px] text-white/70 hover:text-pink-300 transition-colors">
                                <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                                Occasions
                            </a>
                            <a href="{{ route('why-heartgrams') }}" class="flex items-center gap-3 text-[13.5px] text-white/70 hover:text-pink-300 transition-colors">
                                <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                Why Heartgrams
                            </a>
                            <a href="{{ route('home') }}#pricing" class="flex items-center gap-3 text-[13.5px] text-white/70 hover:text-pink-300 transition-colors">
                                <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                Pricing Plans
                            </a>
                            <a href="{{ route('home') }}#how-it-works" class="flex items-center gap-3 text-[13.5px] text-white/70 hover:text-pink-300 transition-colors">
                                <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                How It Works
                            </a>
                            <a href="{{ route('blog') }}" class="flex items-center gap-3 text-[13.5px] text-white/70 hover:text-pink-300 transition-colors">
                                <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-.586-1.414l-4.5-4.5A2 2 0 0012.586 3H12"/></svg>
                                Stories &amp; Blog
                            </a>
                            <a href="{{ route('home') }}#faq" class="flex items-center gap-3 text-[13.5px] text-white/70 hover:text-pink-300 transition-colors">
                                <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Frequently Asked Questions
                            </a>
                        </nav>
                    </div>
                </div>

                {{-- 2. Quick Links Accordion --}}
                <div>
                    <button 
                        type="button" 
                        @click="toggle('quicklinks')" 
                        class="w-full flex items-center justify-between py-3.5 text-left cursor-pointer select-none group"
                    >
                        <span class="text-[14.5px] font-medium text-white/90 group-hover:text-white transition-colors">Quick Links</span>
                        <svg 
                            class="w-4 h-4 text-white/50 transition-transform duration-300"
                            :class="openGroup === 'quicklinks' ? 'rotate-180 text-pink-300' : ''" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <div x-show="openGroup === 'quicklinks'" x-collapse class="overflow-hidden">
                        <nav class="space-y-2.5 pb-4 pt-1">
                            <a href="{{ route('contact') }}" class="flex items-center gap-3 text-[13.5px] text-white/70 hover:text-pink-300 transition-colors">
                                <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                Contact Us
                            </a>
                            <a href="{{ route('testimonials') }}" class="flex items-center gap-3 text-[13.5px] text-white/70 hover:text-pink-300 transition-colors">
                                <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                                Testimonials &amp; Reviews
                            </a>
                            <a href="{{ route('occasions') }}" class="flex items-center gap-3 text-[13.5px] text-white/70 hover:text-pink-300 transition-colors">
                                <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V4a2 2 0 10-2 2h2"/></svg>
                                Gift for Any Occasion
                            </a>
                        </nav>
                    </div>
                </div>

                {{-- 3. Policy Accordion (Matching reference Policy ˅) --}}
                <div>
                    <button 
                        type="button" 
                        @click="toggle('policy')" 
                        class="w-full flex items-center justify-between py-3.5 text-left cursor-pointer select-none group"
                    >
                        <span class="text-[14.5px] font-medium text-white/90 group-hover:text-white transition-colors">Policy</span>
                        <svg 
                            class="w-4 h-4 text-white/50 transition-transform duration-300"
                            :class="openGroup === 'policy' ? 'rotate-180 text-pink-300' : ''" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <div x-show="openGroup === 'policy'" x-collapse class="overflow-hidden">
                        <nav class="space-y-2.5 pb-4 pt-1">
                            <a href="{{ route('privacy') }}" class="flex items-center gap-3 text-[13.5px] text-white/70 hover:text-pink-300 transition-colors">
                                <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                Privacy Policy
                            </a>
                            <a href="{{ route('terms') }}" class="flex items-center gap-3 text-[13.5px] text-white/70 hover:text-pink-300 transition-colors">
                                <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                Terms of Service
                            </a>
                            <a href="{{ route('refund') }}" class="flex items-center gap-3 text-[13.5px] text-white/70 hover:text-pink-300 transition-colors">
                                <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z"/></svg>
                                Refund Policy
                            </a>
                        </nav>
                    </div>
                </div>

            </div>

            {{-- 4. Reach Us Section (Matching reference Reach Us) --}}
            <div class="mb-6">
                <h4 class="text-[14.5px] font-medium text-white mb-3">Reach Us</h4>
                <div class="space-y-2.5">
                    {{-- WhatsApp Link --}}
                    <a href="{{ $whatsappUrl }}" target="_blank" class="flex items-center gap-3.5 p-3 rounded-2xl bg-white/[0.03] border border-white/5 hover:border-pink-300/30 hover:bg-white/[0.06] transition-all group">
                        <div class="w-8 h-8 rounded-full bg-[#25D366]/15 border border-[#25D366]/30 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                        </div>
                        <div>
                            <p class="text-[13px] font-medium text-white group-hover:text-pink-300 transition-colors">WhatsApp Chat</p>
                            <p class="text-white/50 text-[11px]">Talk to our team directly</p>
                        </div>
                    </a>

                    {{-- Email Link --}}
                    <a href="mailto:{{ $email }}" class="flex items-center gap-3.5 p-3 rounded-2xl bg-white/[0.03] border border-white/5 hover:border-pink-300/30 hover:bg-white/[0.06] transition-all group">
                        <div class="w-8 h-8 rounded-full bg-pink-500/15 border border-pink-500/30 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-pink-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-[13px] font-medium text-white group-hover:text-pink-300 transition-colors">{{ $email }}</p>
                            <p class="text-white/50 text-[11px]">We reply within [reply time]</p>
                        </div>
                    </a>

                    {{-- Private & Confidential Trust Indicator --}}
                    <div class="flex items-center gap-3.5 p-3 rounded-2xl bg-white/[0.015] border border-white/5">
                        <div class="w-8 h-8 rounded-full bg-white/5 border border-white/10 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <div>
                            <p class="text-[12.5px] font-medium text-white/85">Private &amp; confidential</p>
                            <p class="text-white/40 text-[10.5px]">Your stories and audio are private</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ========================================================
             DESKTOP VIEW (SPACIOUS 4-COLUMN RICH GRID)
             ======================================================== --}}
        <div class="hidden lg:grid lg:grid-cols-12 gap-8 lg:gap-10 mb-12">
            
            {{-- Col 1: Brand & Mission --}}
            <div class="lg:col-span-4 pr-6 border-r border-white/5">
                <a href="{{ route('home') }}" class="mb-4 inline-block bg-white px-4 py-2 rounded-2xl shadow-sm hover:opacity-95 transition-opacity">
                    <img src="{{ asset('images/logo.png') }}" alt="Heartgrams" class="h-8 md:h-9 w-auto">
                </a>
                <p class="text-white/60 text-[13px] leading-relaxed max-w-[280px] mb-5">
                    {{ $tagline }}
                </p>
                <div>
                    <a href="{{ route('home') }}#start" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-crimson-600/15 hover:bg-crimson-600/25 text-pink-200 border border-crimson-500/30 text-[12px] font-medium transition-all group">
                        <span>Create Your Heartgram</span>
                        <span class="group-hover:translate-x-1 transition-transform text-crimson-400">→</span>
                    </a>
                </div>
            </div>

            {{-- Col 2: Explore --}}
            <div class="lg:col-span-3 border-r border-white/5 px-4">
                <h4 class="text-[11px] font-bold tracking-[0.18em] text-[#E07A94] mb-4 uppercase">Explore</h4>
                <nav class="space-y-2.5">
                    <a href="{{ route('occasions') }}" class="flex items-center gap-3 text-[13px] text-white/70 hover:text-pink-300 hover:translate-x-1 transition-all">
                        <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                        Occasions
                    </a>
                    <a href="{{ route('why-heartgrams') }}" class="flex items-center gap-3 text-[13px] text-white/70 hover:text-pink-300 hover:translate-x-1 transition-all">
                        <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        Why Heartgrams
                    </a>
                    <a href="{{ route('home') }}#pricing" class="flex items-center gap-3 text-[13px] text-white/70 hover:text-pink-300 hover:translate-x-1 transition-all">
                        <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                        Pricing Plans
                    </a>
                    <a href="{{ route('home') }}#how-it-works" class="flex items-center gap-3 text-[13px] text-white/70 hover:text-pink-300 hover:translate-x-1 transition-all">
                        <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        How It Works
                    </a>
                    <a href="{{ route('blog') }}" class="flex items-center gap-3 text-[13px] text-white/70 hover:text-pink-300 hover:translate-x-1 transition-all">
                        <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-.586-1.414l-4.5-4.5A2 2 0 0012.586 3H12"/></svg>
                        Stories &amp; Blog
                    </a>
                    <a href="{{ route('home') }}#faq" class="flex items-center gap-3 text-[13px] text-white/70 hover:text-pink-300 hover:translate-x-1 transition-all">
                        <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Frequently Asked Questions
                    </a>
                </nav>
            </div>

            {{-- Col 3: Information --}}
            <div class="lg:col-span-2 border-r border-white/5 px-4">
                <h4 class="text-[11px] font-bold tracking-[0.18em] text-[#E07A94] mb-4 uppercase">Information</h4>
                <nav class="space-y-2.5">
                    <a href="{{ route('contact') }}" class="flex items-center gap-3 text-[13px] text-white/70 hover:text-pink-300 hover:translate-x-1 transition-all">
                        <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Contact Us
                    </a>
                    <a href="{{ route('testimonials') }}" class="flex items-center gap-3 text-[13px] text-white/70 hover:text-pink-300 hover:translate-x-1 transition-all">
                        <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                        Testimonials
                    </a>
                    <a href="{{ route('privacy') }}" class="flex items-center gap-3 text-[13px] text-white/70 hover:text-pink-300 hover:translate-x-1 transition-all">
                        <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        Privacy Policy
                    </a>
                    <a href="{{ route('terms') }}" class="flex items-center gap-3 text-[13px] text-white/70 hover:text-pink-300 hover:translate-x-1 transition-all">
                        <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Terms of Service
                    </a>
                    <a href="{{ route('refund') }}" class="flex items-center gap-3 text-[13px] text-white/70 hover:text-pink-300 hover:translate-x-1 transition-all">
                        <svg class="w-3.5 h-3.5 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z"/></svg>
                        Refund Policy
                    </a>
                </nav>
            </div>

            {{-- Col 4: Direct Contact --}}
            <div class="lg:col-span-3 pl-4">
                <h4 class="text-[11px] font-bold tracking-[0.18em] text-[#E07A94] mb-4 uppercase">Direct Contact</h4>
                <div class="space-y-3">
                    {{-- WhatsApp Support Link --}}
                    <a href="{{ $whatsappUrl }}" target="_blank" class="flex items-center gap-3.5 p-3 rounded-2xl bg-white/[0.03] border border-white/5 hover:border-pink-300/30 hover:bg-white/[0.06] transition-all group">
                        <div class="w-9 h-9 rounded-full bg-white/5 group-hover:bg-[#25D366]/20 border border-white/10 group-hover:border-[#25D366]/40 flex items-center justify-center shrink-0 transition-colors">
                            <svg class="w-4 h-4 text-white/70 group-hover:text-[#25D366] transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                        </div>
                        <div>
                            <h5 class="text-[13px] font-semibold group-hover:text-pink-300 transition-colors">WhatsApp Chat</h5>
                            <p class="text-white/50 text-[11px] mt-0.5">Talk to our team</p>
                        </div>
                    </a>
                    
                    {{-- Email Link --}}
                    <a href="mailto:{{ $email }}" class="flex items-center gap-3.5 p-3 rounded-2xl bg-white/[0.03] border border-white/5 hover:border-pink-300/30 hover:bg-white/[0.06] transition-all group">
                        <div class="w-9 h-9 rounded-full bg-white/5 group-hover:bg-pink-500/20 border border-white/10 group-hover:border-pink-500/40 flex items-center justify-center shrink-0 transition-colors">
                            <svg class="w-4 h-4 text-white/70 group-hover:text-pink-300 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <h5 class="text-[13px] font-semibold group-hover:text-pink-300 transition-colors">{{ $email }}</h5>
                            <p class="text-white/50 text-[11px] mt-0.5">We reply within [reply time]</p>
                        </div>
                    </a>
                    
                    {{-- Private & Confidential Trust Indicator --}}
                    <div class="flex items-center gap-3.5 p-3 rounded-2xl bg-white/[0.015] border border-white/5">
                        <div class="w-9 h-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center shrink-0">
                            <svg class="w-4 h-4 text-white/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <div>
                            <h5 class="text-[13px] font-semibold text-white/90">Private &amp; confidential</h5>
                            <p class="text-white/40 text-[11px] mt-0.5">Your memories remain confidential</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        {{-- Divider --}}
        <div class="relative flex justify-center mb-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-white/5"></div>
            </div>
            <div class="relative bg-[#120a0d] px-3 text-brand-pink">
                <svg class="w-3.5 h-3.5 text-crimson-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
            </div>
        </div>

        {{-- Footer Bottom --}}
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 text-[12px]">
            <p class="text-white/40 text-center sm:text-left">
                {!! \App\PageContent::get('home_footer_copyright', '&copy; ' . date('Y') . ' Heartgrams. <span class="text-brand-pink font-medium">Made with love</span>, one story at a time.') !!}
            </p>
            <div class="flex items-center gap-3 sm:gap-4 text-white/40 text-[11.5px] sm:text-[12px] flex-wrap justify-center">
                <a href="{{ route('privacy') }}" class="hover:text-pink-300 transition-colors">Privacy Policy</a>
                <span class="text-white/20">·</span>
                <a href="{{ route('terms') }}" class="hover:text-pink-300 transition-colors">Terms of Service</a>
                <span class="text-white/20">·</span>
                <a href="{{ route('refund') }}" class="hover:text-pink-300 transition-colors">Refund Policy</a>
            </div>
        </div>
        
    </div>
</footer>
