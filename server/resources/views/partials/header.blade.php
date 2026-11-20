@php
    $whatsappNumber = '919585475959';
    $fixedHeader = $fixedHeader ?? true;
    $normalHeader = $normalHeader ?? false;
@endphp

<!-- Sticky & Smart Scroll Header -->
<header 
    x-data="{ 
        mobileMenuOpen: false,
        visible: true,
        lastScrollY: 0,
        handleScroll() {
            const currentScrollY = window.pageYOffset || document.documentElement.scrollTop;
            if (this.mobileMenuOpen) {
                this.visible = true;
                return;
            }
            if (currentScrollY <= 60) {
                this.visible = true;
            } else if (currentScrollY > this.lastScrollY + 5) {
                // Scrolling down -> hide navbar
                this.visible = false;
            } else if (currentScrollY < this.lastScrollY - 5) {
                // Scrolling up -> show navbar
                this.visible = true;
            }
            this.lastScrollY = currentScrollY <= 0 ? 0 : currentScrollY;
        }
    }"
    @scroll.window.passive="handleScroll()"
    class="{{ $fixedHeader ? 'fixed top-0' : 'relative' }} w-full z-50 {{ $normalHeader ? '' : 'pt-2.5 sm:pt-4 px-3 sm:px-6 lg:px-8' }} transition-transform duration-300 ease-in-out"
    :class="visible ? 'translate-y-0' : '-translate-y-full pointer-events-none'"
>
    <div class="{{ $normalHeader ? 'w-full bg-white shadow-sm px-4 sm:px-6 lg:px-12 py-2' : 'relative w-full max-w-7xl mx-auto bg-white/80 backdrop-blur-xl border border-white/50 shadow-[0_8px_30px_rgba(0,0,0,0.06)] rounded-full px-3.5 sm:px-6' }}">
        <div class="flex items-center justify-between h-14 sm:h-16">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center group">
                <img src="{{ asset('images/logo.png') }}" alt="Heartgrams" class="h-7 sm:h-8 md:h-10 w-auto group-hover:scale-105 transition-transform duration-300">
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden lg:flex items-center gap-1 xl:gap-2">
                <a href="{{ route('occasions') }}" class="px-3 xl:px-3.5 py-2 text-[13.5px] xl:text-[14px] font-medium text-maroon-900/80 hover:text-maroon-900 hover:bg-white/60 rounded-full transition-all duration-300 {{ Request::routeIs('occasions') ? 'text-maroon-900 font-semibold bg-white/60' : '' }}">Occasions</a>
                <a href="{{ route('why-heartgrams') }}" class="px-3 xl:px-3.5 py-2 text-[13.5px] xl:text-[14px] font-medium text-maroon-900/80 hover:text-maroon-900 hover:bg-white/60 rounded-full transition-all duration-300 {{ Request::routeIs('why-heartgrams') ? 'text-maroon-900 font-semibold bg-white/60' : '' }}">Why Heartgrams</a>
                <a href="{{ route('testimonials') }}" class="px-3 xl:px-3.5 py-2 text-[13.5px] xl:text-[14px] font-medium text-maroon-900/80 hover:text-maroon-900 hover:bg-white/60 rounded-full transition-all duration-300 {{ Request::routeIs('testimonials') ? 'text-maroon-900 font-semibold bg-white/60' : '' }}">Testimonials</a>
                <a href="{{ Request::routeIs('home') ? '#pricing' : url('/#pricing') }}" class="px-3 xl:px-3.5 py-2 text-[13.5px] xl:text-[14px] font-medium text-maroon-900/80 hover:text-maroon-900 hover:bg-white/60 rounded-full transition-all duration-300">Pricing</a>
                <a href="{{ route('blog') }}" class="px-3 xl:px-3.5 py-2 text-[13.5px] xl:text-[14px] font-medium text-maroon-900/80 hover:text-maroon-900 hover:bg-white/60 rounded-full transition-all duration-300 {{ Request::routeIs('blog') ? 'text-maroon-900 font-semibold bg-white/60' : '' }}">Blog</a>
                <a href="{{ Route::has('create-song') ? route('create-song') : url('/create-your-heartgram-song') }}" class="px-3 xl:px-3.5 py-2 text-[13.5px] xl:text-[14px] font-medium text-maroon-900/80 hover:text-maroon-900 hover:bg-white/60 rounded-full transition-all duration-300 {{ Request::routeIs('create-song') ? 'text-crimson-600 font-semibold bg-pink-50' : '' }}">Create Your Heartgram Song</a>
            </nav>

            <!-- CTA + Mobile Toggle -->
            <div class="flex items-center gap-2 sm:gap-4">
                <a href="{{ route('contact') }}" class="hidden md:inline-flex items-center px-5 sm:px-6 py-2.5 bg-gradient-to-r from-crimson-500 to-maroon-700 text-white text-[13.5px] sm:text-[14px] font-semibold rounded-full shadow-lg shadow-crimson-500/20 hover:shadow-crimson-500/40 hover:-translate-y-0.5 transition-all duration-300">
                    Contact
                </a>
                <!-- Click to call (mobile) -->
                <a href="tel:+919585475959" aria-label="Call Heartgrams" class="md:hidden w-9 h-9 sm:w-10 sm:h-10 flex items-center justify-center rounded-full bg-white/60 text-maroon-900 hover:bg-white/90 shadow-xs transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </a>
                <!-- Mobile menu button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" aria-label="Open Navigation Menu" class="lg:hidden w-9 h-9 sm:w-10 sm:h-10 flex items-center justify-center rounded-full bg-white/60 text-maroon-900 hover:bg-white/90 shadow-xs transition-colors focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="mobileMenuOpen" style="display: none;" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div x-show="mobileMenuOpen" 
             @click.away="mobileMenuOpen = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 -translate-y-2 scale-95"
             class="lg:hidden absolute top-full left-0 right-0 mt-2 bg-white/95 backdrop-blur-2xl border border-white/60 shadow-2xl rounded-2xl overflow-hidden z-50 origin-top max-h-[85vh] overflow-y-auto"
             style="display: none;">
            <nav class="p-3 sm:p-4 flex flex-col gap-1">
                <a href="{{ route('occasions') }}" @click="mobileMenuOpen = false" class="block px-4 py-3 text-[15px] font-medium text-maroon-900 hover:bg-maroon-50 rounded-xl transition-colors">Occasions</a>
                <a href="{{ route('why-heartgrams') }}" @click="mobileMenuOpen = false" class="block px-4 py-3 text-[15px] font-medium text-maroon-900 hover:bg-maroon-50 rounded-xl transition-colors">Why Heartgrams</a>
                <a href="{{ route('testimonials') }}" @click="mobileMenuOpen = false" class="block px-4 py-3 text-[15px] font-medium text-maroon-900 hover:bg-maroon-50 rounded-xl transition-colors">Testimonials</a>
                <a href="{{ Request::routeIs('home') ? '#pricing' : url('/#pricing') }}" @click="mobileMenuOpen = false" class="block px-4 py-3 text-[15px] font-medium text-maroon-900 hover:bg-maroon-50 rounded-xl transition-colors">Pricing</a>
                <a href="{{ route('blog') }}" @click="mobileMenuOpen = false" class="block px-4 py-3 text-[15px] font-medium text-maroon-900 hover:bg-maroon-50 rounded-xl transition-colors">Blog</a>
                <a href="{{ Route::has('create-song') ? route('create-song') : url('/create-your-heartgram-song') }}" @click="mobileMenuOpen = false" class="block px-4 py-3 text-[15px] font-semibold text-crimson-600 bg-pink-50 hover:bg-pink-100/70 rounded-xl transition-colors">Create Your Heartgram Song</a>
                <a href="{{ route('contact') }}" @click="mobileMenuOpen = false" class="block px-4 py-3 text-[15px] font-medium text-maroon-900 hover:bg-maroon-50 rounded-xl transition-colors">Contact</a>
                <div class="h-px bg-maroon-100/60 my-2"></div>
                <a href="{{ Route::has('create-song') ? route('create-song') : url('/create-your-heartgram-song') }}" @click="mobileMenuOpen = false" class="flex items-center justify-center gap-2 px-5 py-3.5 bg-gradient-to-r from-crimson-500 to-maroon-700 text-white text-[15px] font-semibold rounded-xl shadow-md">
                    <span>Create a Song</span>
                    <span>&rarr;</span>
                </a>
            </nav>
        </div>
    </div>
</header>
