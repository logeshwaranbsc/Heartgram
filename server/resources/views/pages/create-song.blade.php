<x-public-layout>
    @php
        $occasions = [
            'Birthday', 
            'Anniversary', 
            'Proposal', 
            'Wedding', 
            'Valentine’s Day',
            'Love & Romance',
            'Friends', 
            'Parents', 
            'Mother’s Day',
            'Father’s Day',
            'Just for You',
            'Memories',
            'Missing You',
            'Long Distance',
            'Corporate', 
            'Apology', 
            'Thank You', 
            'Farewell', 
            'Other'
        ];
    @endphp

    <div 
        id="create-song-page"
        x-data="{ 
            selectedPlan: 'classic',
            selectedOccasion: 'Birthday',
            customOccasion: '',
            isCustomOccasion: false,
            manualCategoryOverride: null,
            uploadedFilesCount: 0,
            isDragging: false,
            uploadedFileNames: [],
            occasionsList: @js($occasions),

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
                    this.uploadedFileNames = Array.from(event.target.files).map(f => f.name);
                }
            },

            handleFileDrop(event) {
                this.isDragging = false;
                if (event.dataTransfer && event.dataTransfer.files && event.dataTransfer.files.length) {
                    const input = this.$refs.attachmentInput;
                    if (input) {
                        input.files = event.dataTransfer.files;
                        this.uploadedFilesCount = event.dataTransfer.files.length;
                        this.uploadedFileNames = Array.from(event.dataTransfer.files).map(f => f.name);
                    }
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

                const params = new URLSearchParams(window.location.search);
                const fromQuery = parsePlan(params.get('tier') || params.get('plan'));
                if (fromQuery) {
                    this.selectedPlan = fromQuery;
                }

                const occParam = params.get('occasion');
                if (occParam) {
                    const decoded = decodeURIComponent(occParam).trim();
                    const clean = (s) => (s || '').toLowerCase().replace(/[^a-z0-9]/g, '');
                    const cleanDecoded = clean(decoded);
                    let matched = this.occasionsList.find(o => clean(o) === cleanDecoded);
                    if (!matched) {
                        matched = this.occasionsList.find(o => {
                            const c = clean(o);
                            return c.length > 3 && (c.includes(cleanDecoded) || cleanDecoded.includes(c));
                        });
                    }
                    if (matched && matched !== 'Other') {
                        this.selectOccasion(matched);
                    } else {
                        this.isCustomOccasion = true;
                        this.customOccasion = decoded;
                        this.selectedOccasion = 'Other';
                    }
                }

                const catParam = params.get('category');
                if (catParam && ['romantic', 'family_friends', 'corporate'].includes(catParam.toLowerCase())) {
                    this.manualCategoryOverride = catParam.toLowerCase();
                }
            }
        }"
        class="min-h-screen pt-24 sm:pt-28 pb-16 lg:pb-24 relative overflow-hidden transition-colors duration-700"
        :class="selectedPlan === 'premium' ? 'bg-[#12040b]' : 'bg-brand-light'"
    >
        {{-- Ambient Background Glows --}}
        <div 
            class="absolute top-10 left-1/2 -translate-x-1/2 w-[700px] h-[450px] blur-[150px] rounded-full pointer-events-none transition-all duration-700"
            :class="selectedPlan === 'premium' ? 'bg-[#ECC15E]/10' : 'bg-rose-200/40'"
        ></div>
        <div 
            class="absolute top-96 right-10 w-[400px] h-[400px] blur-[130px] rounded-full pointer-events-none transition-all duration-700"
            :class="selectedPlan === 'premium' ? 'bg-[#3A1930]/40' : 'bg-pink-100/50'"
        ></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            {{-- Page Header --}}
            <div class="text-center mb-8 sm:mb-10">
                {{-- Plan Badge Pill --}}
                <div 
                    class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-[10.5px] font-bold tracking-[0.18em] uppercase mb-3 shadow-xs transition-all duration-500"
                    :class="selectedPlan === 'premium' 
                        ? 'bg-gradient-to-r from-[#D99A26] via-[#FFE37E] to-[#C98B1B] text-[#241002] border border-[#FFE898]/80 shadow-[0_2px_14px_rgba(217,154,38,0.35)]' 
                        : 'bg-white text-[#c02d4b] border border-pink-200/80'"
                >
                    <span x-text="selectedPlan === 'premium' ? '★ HEARTGRAM PREMIUM · COMPLETE STORY FORM' : 'ORDER YOUR PERSONALISED SONG'"></span>
                </div>

                <h1 
                    class="font-display text-3xl sm:text-4xl lg:text-[44px] font-bold mb-3 tracking-tight leading-tight transition-colors duration-500"
                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'"
                >
                    Create your 
                    <span 
                        class="italic transition-all duration-500"
                        :class="selectedPlan === 'premium' 
                            ? 'text-transparent bg-clip-text bg-gradient-to-r from-[#FFE37E] via-[#ECC15E] to-[#D99A26]' 
                            : 'text-[#c02d4b]'"
                    >
                        Heartgram song.
                    </span>
                </h1>

                <p 
                    class="text-xs sm:text-[14.5px] max-w-xl mx-auto leading-relaxed transition-colors duration-300 font-medium"
                    :class="selectedPlan === 'premium' ? 'text-white/75' : 'text-brand-dark/75'"
                >
                    Share your story below. A lyricist who writes in your language turns it into lyrics, our team checks them, and you approve them before we make the song.
                </p>

                {{-- Trust Highlights --}}
                <div class="mt-4 flex flex-wrap items-center justify-center gap-2 sm:gap-3 text-[11px] sm:text-[12px] font-medium">
                    <span 
                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full border transition-colors duration-300"
                        :class="selectedPlan === 'premium' ? 'bg-white/5 border-white/10 text-white/80' : 'bg-white/80 border-pink-100 text-brand-dark/80'"
                    >
                        <svg class="w-3.5 h-3.5 shrink-0" :class="selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-[#c02d4b]'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        Written by real lyricists
                    </span>
                    <span 
                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full border transition-colors duration-300"
                        :class="selectedPlan === 'premium' ? 'bg-white/5 border-white/10 text-white/80' : 'bg-white/80 border-pink-100 text-brand-dark/80'"
                    >
                        <svg class="w-3.5 h-3.5 shrink-0" :class="selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-[#c02d4b]'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        You approve the lyrics first
                    </span>
                    <span 
                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full border transition-colors duration-300"
                        :class="selectedPlan === 'premium' ? 'bg-white/5 border-white/10 text-white/80' : 'bg-white/80 border-pink-100 text-brand-dark/80'"
                    >
                        <svg class="w-3.5 h-3.5 shrink-0" :class="selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-[#c02d4b]'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        3–5 days · 1–2 with Premium
                    </span>
                </div>
            </div>

            {{-- Main Fully Visible Form Container --}}
            <div 
                class="rounded-[2rem] p-5 sm:p-8 lg:p-10 transition-all duration-500 ease-in-out w-full relative overflow-hidden shadow-2xl"
                :class="selectedPlan === 'premium'
                    ? 'bg-[#1E0913] text-white border border-[#ECC15E]/40 shadow-[0_25px_60px_rgba(30,9,19,0.7)] ring-1 ring-[#ECC15E]/30'
                    : 'bg-white text-brand-dark border border-pink-100 shadow-[0_12px_40px_rgba(200,50,100,0.06)]'"
            >
                {{-- Decorative Watermark Glow for Premium --}}
                <div 
                    x-show="selectedPlan === 'premium'"
                    class="absolute -top-16 -right-16 w-60 h-60 rounded-full bg-gradient-to-br from-[#ECC15E]/15 to-transparent pointer-events-none blur-3xl"
                ></div>

                {{-- Success Flash Alert --}}
                @if(session('success'))
                    <div class="mb-6 p-4 sm:p-5 bg-emerald-500/10 border border-emerald-500/30 text-emerald-800 dark:text-emerald-200 rounded-2xl text-[13.5px] font-medium flex items-start gap-3 shadow-sm">
                        <svg class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <div class="space-y-1">
                            <div class="font-bold text-[14px]">Story Successfully Received!</div>
                            <div>{{ session('success') }}</div>
                        </div>
                    </div>
                @endif

                <form 
                    action="{{ route('leads.store') }}" 
                    method="POST" 
                    enctype="multipart/form-data"
                    class="space-y-8 lg:space-y-10 relative z-10"
                >
                    @csrf
                    <input type="hidden" name="source" value="song_story">
                    <input type="hidden" name="tier" :value="selectedPlan">
                    <input type="hidden" name="occasion" :value="activeOccasionName">
                    <input type="hidden" name="occasion_category" :value="occasionCategory">
                    <input type="hidden" name="custom_occasion" :value="isCustomOccasion ? customOccasion : ''">

                    {{-- SECTION 1: CHOOSE YOUR PLAN --}}
                    <div>
                        <div class="flex items-center gap-2 mb-3">
                            <span 
                                class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold shrink-0"
                                :class="selectedPlan === 'premium' ? 'bg-[#ECC15E] text-[#241002]' : 'bg-[#c02d4b] text-white'"
                            >1</span>
                            <h2 
                                class="font-display text-lg sm:text-xl font-bold transition-colors duration-300"
                                :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'"
                            >
                                Choose Your Plan
                            </h2>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                            {{-- Classic Plan Card --}}
                            <button 
                                type="button" 
                                @click="selectedPlan = 'classic'"
                                class="relative w-full text-left p-4 sm:p-5 rounded-2xl border transition-all duration-300 flex items-center justify-between cursor-pointer group select-none"
                                :class="selectedPlan === 'classic'
                                    ? 'bg-gradient-to-r from-brand-pink to-[#E11D48] text-white border-[#FF4D7D] shadow-lg shadow-brand-pink/30 ring-2 ring-brand-pink/40 scale-[1.01]'
                                    : (selectedPlan === 'premium' 
                                        ? 'bg-white/10 border-white/20 text-white/80 hover:bg-white/15 hover:border-pink-300/40' 
                                        : 'bg-white border-pink-100 text-brand-dark hover:border-[#FF4D7D]/40 hover:bg-pink-50/30')"
                            >
                                <div class="flex items-center gap-3">
                                    <div 
                                        class="w-5 h-5 rounded-full flex items-center justify-center shrink-0 border transition-all duration-200"
                                        :class="selectedPlan === 'classic' 
                                            ? 'border-white bg-white text-[#c02d4b]' 
                                            : (selectedPlan === 'premium' ? 'border-white/30 bg-transparent' : 'border-gray-300 bg-white')"
                                    >
                                        <span x-show="selectedPlan === 'classic'" class="w-2.5 h-2.5 rounded-full bg-[#c02d4b]"></span>
                                    </div>
                                    <div>
                                        <div class="font-display font-bold text-[15px] leading-tight">Heartgram Classic</div>
                                        <div 
                                            class="text-[11.5px] leading-tight mt-1 transition-colors"
                                            :class="selectedPlan === 'classic' ? 'text-white/90' : (selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/60')"
                                        >
                                            Acoustic Melody · 3–5 days
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right shrink-0 pl-2">
                                    <span class="font-display font-bold text-lg sm:text-xl block leading-tight">₹1,999</span>
                                    <span 
                                        class="text-[9.5px] uppercase tracking-wider font-semibold opacity-75 block"
                                        :class="selectedPlan === 'classic' ? 'text-white/90' : (selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/50')"
                                    >
                                        all-inclusive
                                    </span>
                                </div>
                            </button>

                            {{-- Premium Plan Card --}}
                            <button 
                                type="button" 
                                @click="selectedPlan = 'premium'"
                                class="relative w-full text-left p-4 sm:p-5 rounded-2xl border transition-all duration-300 flex items-center justify-between cursor-pointer group select-none"
                                :class="selectedPlan === 'premium'
                                    ? 'bg-gradient-to-r from-[#D99A26] via-[#FFE37E] to-[#C98B1B] text-[#241002] border-[#FFE898] shadow-lg shadow-[#D99A26]/35 ring-2 ring-[#FFE898]/60 scale-[1.01] font-medium'
                                    : (selectedPlan === 'premium' 
                                        ? 'bg-white/10 border-white/20 text-white/80' 
                                        : 'bg-white border-pink-100 text-brand-dark hover:border-[#DCA838]/40 hover:bg-amber-50/30')"
                            >
                                <div class="flex items-center gap-3">
                                    <div 
                                        class="w-5 h-5 rounded-full flex items-center justify-center shrink-0 border transition-all duration-200"
                                        :class="selectedPlan === 'premium' 
                                            ? 'border-[#241002] bg-[#241002] text-[#FFE37E]' 
                                            : 'border-gray-300 bg-white'"
                                    >
                                        <span x-show="selectedPlan === 'premium'" class="w-2.5 h-2.5 rounded-full bg-[#FFE37E]"></span>
                                    </div>
                                    <div>
                                        <div class="font-display font-bold text-[15px] leading-tight flex items-center gap-2">
                                            <span>Heartgram Premium</span>
                                            <span 
                                                class="text-[9px] px-2 py-0.5 rounded-full font-extrabold uppercase tracking-wider shrink-0"
                                                :class="selectedPlan === 'premium' ? 'bg-[#241002] text-[#ECC15E]' : 'bg-[#DCA838]/20 text-[#B8841B]'"
                                            >
                                                ★ RECOMMENDED
                                            </span>
                                        </div>
                                        <div 
                                            class="text-[11.5px] leading-tight mt-1 transition-colors"
                                            :class="selectedPlan === 'premium' ? 'text-[#241002]/85' : 'text-brand-dark/60'"
                                        >
                                            Priority queue · 1–2 days express
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right shrink-0 pl-2">
                                    <span class="font-display font-bold text-lg sm:text-xl block leading-tight">₹2,999</span>
                                    <span 
                                        class="text-[9.5px] uppercase tracking-wider font-semibold block"
                                        :class="selectedPlan === 'premium' ? 'text-[#241002]/75' : 'text-brand-dark/50'"
                                    >
                                        all-inclusive
                                    </span>
                                </div>
                            </button>
                        </div>
                    </div>

                    {{-- SECTION 2: ABOUT YOU & CONTACT DETAILS --}}
                    <div>
                        <div class="flex items-center gap-2 mb-3">
                            <span 
                                class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold shrink-0"
                                :class="selectedPlan === 'premium' ? 'bg-[#ECC15E] text-[#241002]' : 'bg-[#c02d4b] text-white'"
                            >2</span>
                            <h2 
                                class="font-display text-lg sm:text-xl font-bold transition-colors duration-300"
                                :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'"
                            >
                                Your Contact Details
                            </h2>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                            <div>
                                <label 
                                    class="block text-[11.5px] font-semibold mb-1 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white/90' : 'text-brand-dark'"
                                >
                                    Your name <span :class="selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-[#c02d4b]'">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    required 
                                    placeholder="Your full name" 
                                    class="w-full rounded-xl px-4 py-3 text-[13px] sm:text-[13.5px] transition-all focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-cream-100 border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/35 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40 bg-white'"
                                >
                            </div>

                            <div>
                                <label 
                                    class="block text-[11.5px] font-semibold mb-1 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white/90' : 'text-brand-dark'"
                                >
                                    WhatsApp number <span :class="selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-[#c02d4b]'">*</span>
                                </label>
                                <input 
                                    type="tel" 
                                    name="whatsapp_number" 
                                    required 
                                    placeholder="+91 00000 00000" 
                                    class="w-full rounded-xl px-4 py-3 text-[13px] sm:text-[13.5px] transition-all focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-cream-100 border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/35 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40 bg-white'"
                                >
                            </div>

                            <div>
                                <label 
                                    class="block text-[11.5px] font-semibold mb-1 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white/90' : 'text-brand-dark'"
                                >
                                    Email address (optional)
                                </label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    placeholder="you@email.com" 
                                    class="w-full rounded-xl px-4 py-3 text-[13px] sm:text-[13.5px] transition-all focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-cream-100 border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/35 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40 bg-white'"
                                >
                            </div>

                            <div>
                                <label 
                                    class="block text-[11.5px] font-semibold mb-1 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white/90' : 'text-brand-dark'"
                                >
                                    Event / occasion date (optional)
                                </label>
                                <div class="relative">
                                    <input 
                                        type="text" 
                                        name="occasion_date" 
                                        placeholder="dd-mm-yyyy" 
                                        class="w-full rounded-xl px-4 py-3 text-[13px] sm:text-[13.5px] transition-all focus:outline-none"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                            : 'bg-cream-100 border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/35 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40 bg-white'"
                                    >
                                    <div 
                                        class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-[#ECC15E]/80' : 'text-brand-dark/40'"
                                    >
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label 
                                    class="block text-[11.5px] font-semibold mb-1 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white/90' : 'text-brand-dark'"
                                >
                                    Song language <span :class="selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-[#c02d4b]'">*</span>
                                </label>
                                <div class="relative">
                                    <select 
                                        name="language" 
                                        required 
                                        class="w-full rounded-xl px-4 py-3 text-[13px] sm:text-[13.5px] transition-all focus:outline-none appearance-none cursor-pointer pr-10"
                                        :class="selectedPlan === 'premium' 
                                            ? 'bg-white/10 border border-white/20 text-white focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-[#1E0913]' 
                                            : 'bg-cream-100 border border-[#e6d8d0] text-brand-dark focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40 bg-white'"
                                    >
                                        <option value="" disabled selected class="text-gray-400">Select song language</option>
                                        <option value="Tamil" class="text-brand-dark">Tamil</option>
                                        <option value="Malayalam" class="text-brand-dark">Malayalam</option>
                                        <option value="Kannada" class="text-brand-dark">Kannada</option>
                                        <option value="Telugu" class="text-brand-dark">Telugu</option>
                                        <option value="Hindi" class="text-brand-dark">Hindi</option>
                                        <option value="English" class="text-brand-dark">English</option>
                                        <option value="Mix of two" class="text-brand-dark">Mix of two</option>
                                    </select>
                                    <div 
                                        class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-[#ECC15E]/80' : 'text-brand-dark/40'"
                                    >
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- SECTION 3: CHOOSE OCCASION --}}
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2">
                                <span 
                                    class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold shrink-0"
                                    :class="selectedPlan === 'premium' ? 'bg-[#ECC15E] text-[#241002]' : 'bg-[#c02d4b] text-white'"
                                >3</span>
                                <h2 
                                    class="font-display text-lg sm:text-xl font-bold transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'"
                                >
                                    Select Occasion
                                </h2>
                            </div>
                            <span 
                                class="text-[11px] font-semibold px-3 py-1 rounded-full transition-colors"
                                :class="selectedPlan === 'premium' ? 'bg-[#ECC15E]/20 text-[#ECC15E]' : 'bg-pink-100 text-[#c02d4b]'"
                                x-text="'Questions for: ' + (occasionCategory === 'corporate' ? 'Corporate' : (occasionCategory === 'family_friends' ? 'Friends & Family' : 'Love & Partner'))"
                            ></span>
                        </div>

                        {{-- Occasion Pills Grid --}}
                        <div class="flex flex-wrap gap-2 sm:gap-2.5">
                            @foreach($occasions as $occ)
                                <button 
                                    type="button"
                                    @click="selectOccasion('{{ $occ }}')"
                                    class="px-4 py-2 rounded-full border text-[12.5px] font-medium transition-all shadow-xs cursor-pointer select-none"
                                    :class="selectedOccasion === '{{ $occ }}'
                                        ? (selectedPlan === 'premium'
                                            ? 'bg-gradient-to-r from-[#B8841B] via-[#DCA838] to-[#A27010] text-[#241002] font-bold border-[#ECC15E] shadow-md scale-105'
                                            : 'bg-gradient-to-r from-brand-pink to-[#E11D48] text-white border-brand-pink font-semibold shadow-sm scale-105')
                                        : (selectedPlan === 'premium'
                                            ? 'bg-white/10 border-white/15 text-white/80 hover:bg-white/20'
                                            : 'bg-white border-gray-200 text-gray-700 hover:border-gray-300 hover:bg-gray-50')"
                                >
                                    @if($occ === 'Other')
                                        + Other / Custom Occasion
                                    @else
                                        {{ $occ }}
                                    @endif
                                </button>
                            @endforeach
                        </div>

                        {{-- Custom Occasion Input --}}
                        <div x-show="isCustomOccasion" x-transition class="mt-3">
                            <input 
                                type="text" 
                                x-ref="customOccasionInput"
                                x-model="customOccasion" 
                                placeholder="Type your occasion (e.g. Retirement, Housewarming, Reunion, Sibling Dedication)..."
                                class="w-full rounded-xl px-4 py-3 text-[13px] sm:text-[13.5px] transition-all focus:outline-none"
                                :class="selectedPlan === 'premium' 
                                    ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/40 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E]' 
                                    : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                            >
                        </div>
                    </div>

                    {{-- SECTION 4: YOUR SONG STORY (FULLY VISIBLE QUESTIONNAIRE) --}}
                    <div class="pt-2">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2.5 mb-4 pb-3 border-b"
                            :class="selectedPlan === 'premium' ? 'border-white/10' : 'border-gray-100'"
                        >
                            <div class="flex items-center gap-2">
                                <span 
                                    class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold shrink-0"
                                    :class="selectedPlan === 'premium' ? 'bg-[#ECC15E] text-[#241002]' : 'bg-[#c02d4b] text-white'"
                                >4</span>
                                <div>
                                    <h2 
                                        class="font-display text-lg sm:text-xl font-bold leading-tight transition-colors duration-300"
                                        :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'"
                                    >
                                        Your Song Story Questionnaire
                                    </h2>
                                    <p class="text-[11.5px] opacity-75 mt-0.5">
                                        Answer the questions below in your own words. Real names, memories, and habits make the best lyrics!
                                    </p>
                                </div>
                            </div>

                            {{-- Questionnaire Switcher Tabs --}}
                            <div class="flex flex-wrap items-center gap-1.5 text-[11px] self-start sm:self-auto">
                                <button 
                                    type="button" 
                                    @click="setCategory('romantic')"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-[11px] font-medium transition-all cursor-pointer select-none"
                                    :class="occasionCategory === 'romantic'
                                        ? (selectedPlan === 'premium' ? 'bg-[#ECC15E] text-[#241002] font-bold border-[#ECC15E] shadow-xs' : 'bg-[#c02d4b] text-white font-bold border-[#c02d4b] shadow-xs')
                                        : (selectedPlan === 'premium' ? 'bg-white/10 border-white/15 text-white/70 hover:bg-white/15' : 'bg-gray-100 border-gray-200 text-gray-600 hover:bg-gray-200/70')"
                                >
                                    <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                    <span>Love & Partner (10 questions)</span>
                                </button>

                                <button 
                                    type="button" 
                                    @click="setCategory('family_friends')"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-[11px] font-medium transition-all cursor-pointer select-none"
                                    :class="occasionCategory === 'family_friends'
                                        ? (selectedPlan === 'premium' ? 'bg-[#ECC15E] text-[#241002] font-bold border-[#ECC15E] shadow-xs' : 'bg-[#c02d4b] text-white font-bold border-[#c02d4b] shadow-xs')
                                        : (selectedPlan === 'premium' ? 'bg-white/10 border-white/15 text-white/70 hover:bg-white/15' : 'bg-gray-100 border-gray-200 text-gray-600 hover:bg-gray-200/70')"
                                >
                                    <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                    <span>Friends & Family (8 questions)</span>
                                </button>

                                <button 
                                    type="button" 
                                    @click="setCategory('corporate')"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-[11px] font-medium transition-all cursor-pointer select-none"
                                    :class="occasionCategory === 'corporate'
                                        ? (selectedPlan === 'premium' ? 'bg-[#ECC15E] text-[#241002] font-bold border-[#ECC15E] shadow-xs' : 'bg-[#c02d4b] text-white font-bold border-[#c02d4b] shadow-xs')
                                        : (selectedPlan === 'premium' ? 'bg-white/10 border-white/15 text-white/70 hover:bg-white/15' : 'bg-gray-100 border-gray-200 text-gray-600 hover:bg-gray-200/70')"
                                >
                                    <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                    <span>Corporate & Team (8 questions)</span>
                                </button>
                            </div>
                        </div>

                        {{-- Friendly Tip Banner --}}
                        <div 
                            class="mb-6 p-3.5 sm:p-4 rounded-2xl text-[12px] leading-relaxed transition-colors flex items-start gap-3"
                            :class="selectedPlan === 'premium' ? 'bg-[#ECC15E]/10 text-amber-200/90 border border-[#ECC15E]/20' : 'bg-amber-50 text-amber-900 border border-amber-200/70'"
                        >
                            <svg class="w-5 h-5 shrink-0 mt-0.5" :class="selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-amber-600'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            <div>
                                <strong>Tip from Heartgrams:</strong> Don't worry about rhyming or poetic phrases. Simply write what actually happened—inside jokes, little habits, places you visited, and emotions. We weave those authentic details directly into your song!
                            </div>
                        </div>

                        {{-- ==================== FORM 1: CORPORATE & TEAM (8 Questions) ==================== --}}
                        <div x-show="occasionCategory === 'corporate'" class="space-y-4 sm:space-y-5">
                            <div class="p-1">
                                <span class="text-[11px] font-bold tracking-wider uppercase opacity-65 block">Corporate & Team Questionnaire</span>
                            </div>

                            {{-- Q1 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
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
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                >
                            </div>

                            {{-- Q2 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    2. Who are you dedicating this song to?
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    Tell us exactly who the song is for (company, founder, employee, team, leadership, client, partner, or the whole organization).
                                </p>
                                <textarea 
                                    name="questions[2. Who are you dedicating this song to?]" 
                                    rows="2" 
                                    placeholder="e.g. Dedicated to our whole team and our founder David on our 10-year journey..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q3 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    3. What is the occasion, and why are you creating this song?
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    Tell us what is happening and why this moment matters (Anniversary, team celebration, founder tribute, employee appreciation, retirement, milestone).
                                </p>
                                <textarea 
                                    name="questions[3. What is the occasion, and why are you creating this song?]" 
                                    rows="2" 
                                    placeholder="e.g. Celebrating our 10th Company Anniversary and honoring the hard work everyone put in..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q4 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    4. Tell us how the journey started.
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    Give us the beginning of the story. When did it begin? Who started it? What was the original dream or goal?
                                </p>
                                <textarea 
                                    name="questions[4. Tell us how the journey started]" 
                                    rows="3" 
                                    placeholder="e.g. It began in a cramped room back in 2014 with just two laptops, strong coffee, and a wild dream to reinvent how..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q5 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    5. Tell us 2–4 important moments from the journey.
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    Choose the moments people would be proud to remember (First big client, major project, awards, memorable events).
                                </p>
                                <textarea 
                                    name="questions[5. Tell us 2-4 important moments from the journey]" 
                                    rows="3" 
                                    placeholder="e.g. 1) Landing our first big client in 2017. 2) Shipping version 2.0 through an all-night pizza sprint. 3) Opening our international branch..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q6 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    6. Tell us about the people and details that made this journey special.
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    Bring in the human side: Key team members, funny office rituals, team trips, celebrations, traditions, inside jokes.
                                </p>
                                <textarea 
                                    name="questions[6. Tell us about the people and details that made this journey special]" 
                                    rows="3" 
                                    placeholder="e.g. Ramesh always brewing filter coffee before meetings, ritual Friday games, the phrase 'Make it sparkle'..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q7 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    7. What would you like to say to the people being celebrated?
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    Write the message you want them to hear in the song (Thank them, appreciate them, congratulate them).
                                </p>
                                <textarea 
                                    name="questions[7. What would you like to say to the people being celebrated?]" 
                                    rows="3" 
                                    placeholder="e.g. Thank you for giving your heart to this vision. We stood together through every storm, and we are just getting started..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q8 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    8. When everyone hears this song, what should they feel?
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    Choose the feeling you want the song to leave behind (Proud, happy, emotional, inspired, grateful, nostalgic).
                                </p>
                                <input 
                                    type="text" 
                                    name="questions[8. When everyone hears this song, what should they feel?]" 
                                    placeholder="e.g. Proud, inspired, deeply grateful, and excited for the future"
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                >
                            </div>
                        </div>

                        {{-- ==================== FORM 2: FRIENDSHIP & FAMILY (8 Questions) ==================== --}}
                        <div x-show="occasionCategory === 'family_friends'" class="space-y-4 sm:space-y-5">
                            <div class="p-1">
                                <span class="text-[11px] font-bold tracking-wider uppercase opacity-65 block">Friendship & Family Questionnaire</span>
                            </div>

                            {{-- Q1 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
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
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                >
                            </div>

                            {{-- Q2 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    2. Who is this song for?
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    Tell us their name, your relationship, and nicknames (e.g., Mom, Dad, brother, sister, best friend, childhood buddy).
                                </p>
                                <input 
                                    type="text" 
                                    name="questions[2. Who is this song for?]" 
                                    placeholder="e.g. My best friend Arjun, Mom, Dad, my sister Sneha, my college buddy..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                >
                            </div>

                            {{-- Q3 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    3. What is the occasion, and why are you making this song?
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    Tell us what is happening and why you want to give them a song now (Birthday, thank-you, reunion, celebration, or pure love).
                                </p>
                                <textarea 
                                    name="questions[3. What is the occasion, and why are you making this song?]" 
                                    rows="2" 
                                    placeholder="e.g. His 25th birthday, celebrating 10 years of unbroken friendship through college and adulthood..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q4 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    4. Tell us a little about them.
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    What are they like in everyday life? 2–4 simple things: personality, habits, what they love, funny traits.
                                </p>
                                <textarea 
                                    name="questions[4. Tell us a little about them]" 
                                    rows="3" 
                                    placeholder="e.g. Always cracked terrible jokes to cheer people up, always late by 15 minutes, drinks chai 5 times a day..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q5 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    5. Tell us 2–4 memories that you want us to remember for the song.
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    Big or small moments: a trip, college days, rainy afternoon, childhood memory, difficult time you supported each other.
                                </p>
                                <textarea 
                                    name="questions[5. Tell us 2-4 memories that you want us to remember for the song]" 
                                    rows="3" 
                                    placeholder="e.g. 1) Our unplanned Goa trip on rented bikes in the rain. 2) Sitting on the canteen stairs every afternoon..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q6 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    6. What are the little details that would make them instantly know this song is about them?
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    A nickname, favorite food, catchphrase, routine, inside joke, favorite music artist.
                                </p>
                                <textarea 
                                    name="questions[6. What are the little details that would make them instantly know this song is about them?]" 
                                    rows="3" 
                                    placeholder="e.g. Nickname 'Panda', always ordering extra momos, our code word 'Code Red', blasting 90s hits..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q7 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    7. What is one thing you are especially thankful for, proud of, or grateful to them for?
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    Tell us the reason behind that feeling (stood beside you, believed in you, sacrificed, gave you comfort).
                                </p>
                                <textarea 
                                    name="questions[7. What is one thing you are especially thankful for, proud of, or grateful to them for?]" 
                                    rows="3" 
                                    placeholder="e.g. Even when I doubted myself completely, you were the one person who never lost faith in me..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q8 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    8. If they hear this song today, what do you want them to know and feel?
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    Write the message in your own words (Happy tears, smiling, knowing how much they mean).
                                </p>
                                <textarea 
                                    name="questions[8. If they hear this song today, what do you want them to know and feel?]" 
                                    rows="3" 
                                    placeholder="e.g. I want them to smile, get misty-eyed, and know that distance and time will never change our bond..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>
                        </div>

                        {{-- ==================== FORM 3: ROMANTIC / PARTNER / LOVE STORY (10 Questions) ==================== --}}
                        <div x-show="occasionCategory === 'romantic'" class="space-y-4 sm:space-y-5">
                            <div class="p-1">
                                <span class="text-[11px] font-bold tracking-wider uppercase opacity-65 block">Romantic & Love Story Questionnaire</span>
                            </div>

                            {{-- Q1 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    1. Your Name
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    What should we call you? This helps us know who is sharing the story.
                                </p>
                                <input 
                                    type="text" 
                                    name="questions[1. Your Name]" 
                                    placeholder="Your name"
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                >
                            </div>

                            {{-- Q2 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    2. Who is this song for?
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    Tell us their name and the names you call them (Full name, nickname, pet names).
                                </p>
                                <input 
                                    type="text" 
                                    name="questions[2. Who is this song for?]" 
                                    placeholder="e.g. Maya (or 'Bubu', 'Sunny', 'My lady')..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                >
                            </div>

                            {{-- Q3 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    3. What is this song being made for?
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    What is happening and why now? (Proposal, wedding, anniversary, birthday, apology, long distance, missing them).
                                </p>
                                <textarea 
                                    name="questions[3. What is this song being made for?]" 
                                    rows="2" 
                                    placeholder="e.g. Planning a surprise sunset proposal by the beach, and I want our love story in a song before I get on one knee..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q4 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    4. Take us back to the beginning.
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    How did the two of you meet, and what do you remember about those early days?
                                </p>
                                <textarea 
                                    name="questions[4. Take us back to the beginning]" 
                                    rows="3" 
                                    placeholder="e.g. Met at a cozy bookstore café on a rainy Tuesday. She accidentally took my umbrella, and when our eyes met..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q5 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    5. Tell us about the moments you would want to live through again.
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    Share 2–4 memories that still make you smile (First date, a special trip, late-night talks, getting through a tough time).
                                </p>
                                <textarea 
                                    name="questions[5. Tell us about the moments you would want to live through again]" 
                                    rows="3" 
                                    placeholder="e.g. 1) Dancing barefoot in the living room at 2 AM. 2) Getting lost in the streets of Manali. 3) The way she held my hand when my father was unwell..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q6 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    6. What are the little things about them that you know better than anyone else?
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    The way they smile, call you, morning habits, favorite comfort food, how they tease you, inside jokes.
                                </p>
                                <textarea 
                                    name="questions[6. What are the little things about them that you know better than anyone else?]" 
                                    rows="3" 
                                    placeholder="e.g. How her nose scrunches when she laughs hard, her habit of stealing my oversized hoodies, ordering dessert first..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q7 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    7. Was there a moment when you realized how much they meant to you?
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    Tell us about that moment when you looked at them and thought, “This is my person.”
                                </p>
                                <textarea 
                                    name="questions[7. Was there a moment when you realized how much they meant to you?]" 
                                    rows="3" 
                                    placeholder="e.g. When I was sick in bed for a week, and she quietly showed up with homemade soup and read my favorite book aloud until I fell asleep..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q8 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    8. If you could tell them something without worrying about how it sounds, what would you say?
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    Write it exactly as it comes to you (e.g. “I love you,” “Thank you for staying,” “You changed my life”).
                                </p>
                                <textarea 
                                    name="questions[8. If you could tell them something without worrying about how it sounds, what would you say?]" 
                                    rows="3" 
                                    placeholder="e.g. You made this world feel like home to me. I would choose you in every lifetime..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q9 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    9. When you imagine the two of you years from now, what do you see?
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    What do you hope your story still looks like? (Growing old together, travelling, quiet mornings with coffee).
                                </p>
                                <textarea 
                                    name="questions[9. When you imagine the two of you years from now, what do you see?]" 
                                    rows="3" 
                                    placeholder="e.g. Sitting on a wooden porch with gray hair and warm tea, still laughing at the exact same jokes..."
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                ></textarea>
                            </div>

                            {{-- Q10 --}}
                            <div>
                                <label class="block text-[12.5px] font-bold mb-0.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'">
                                    10. When they hear this song for the first time, what do you hope stays with them?
                                </label>
                                <p class="text-[11px] mb-1.5 transition-colors duration-300"
                                    :class="selectedPlan === 'premium' ? 'text-pink-200/70' : 'text-brand-dark/70'">
                                    What feeling do you want to leave behind? (Loved, happy tears, deeply cherished, surprised).
                                </p>
                                <input 
                                    type="text" 
                                    name="questions[10. When they hear this song for the first time, what do you hope stays with them?]" 
                                    placeholder="e.g. Overwhelmed with love, happy tears, knowing they are deeply cherished"
                                    class="w-full rounded-xl p-3.5 text-[13px] transition-all focus:outline-none"
                                    :class="selectedPlan === 'premium' 
                                        ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                        : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                                >
                            </div>
                        </div>
                    </div>

                    {{-- SECTION 5: OPTIONAL ATTACHMENTS --}}
                    <div>
                        <div class="flex items-center gap-2 mb-3">
                            <span 
                                class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold shrink-0"
                                :class="selectedPlan === 'premium' ? 'bg-[#ECC15E] text-[#241002]' : 'bg-[#c02d4b] text-white'"
                            >5</span>
                            <h2 
                                class="font-display text-lg sm:text-xl font-bold transition-colors duration-300"
                                :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'"
                            >
                                Optional Attachments
                            </h2>
                        </div>

                        <div 
                            class="p-5 rounded-2xl border transition-all duration-300"
                            :class="selectedPlan === 'premium' 
                                ? 'bg-white/[0.05] border-white/15 text-white' 
                                : 'bg-pink-50/30 border-pink-100 text-brand-dark shadow-xs'"
                        >
                            <div class="flex items-center justify-between mb-1.5">
                                <label class="text-[12.5px] font-bold flex items-center gap-2">
                                    <svg class="w-4 h-4 opacity-75 inline-block shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                    </svg>
                                    <span>Photos, audio, letters or notes</span>
                                    <span class="text-[11px] font-normal opacity-70">(Optional)</span>
                                </label>
                                <span 
                                    class="text-[11px] font-semibold"
                                    :class="selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-[#c02d4b]'"
                                    x-show="uploadedFilesCount > 0"
                                    x-text="uploadedFilesCount + ' file(s) selected'"
                                ></span>
                            </div>
                            <p class="text-[11.5px] mb-3 leading-relaxed transition-colors duration-300 opacity-75">
                                Upload photos, videos, screenshots, handwritten letters, voice memos, or presentations to help us immerse in your story.
                            </p>

                            <label class="block border-2 border-dashed rounded-xl p-5 text-center cursor-pointer transition-all hover:opacity-90"
                                :class="selectedPlan === 'premium' 
                                    ? (isDragging ? 'border-[#ECC15E] bg-white/[0.12] text-white' : 'border-white/20 bg-white/[0.04] hover:bg-white/[0.08] hover:border-[#ECC15E]/50 text-white/80')
                                    : (isDragging ? 'border-[#c02d4b] bg-pink-100/60 text-brand-dark' : 'border-pink-200 bg-white hover:bg-pink-50 hover:border-[#c02d4b]/50 text-brand-dark/80')"
                                @dragover.prevent="isDragging = true"
                                @dragleave.prevent="isDragging = false"
                                @drop.prevent="handleFileDrop($event)"
                            >
                                <input 
                                    type="file" 
                                    name="attachments[]" 
                                    x-ref="attachmentInput"
                                    multiple 
                                    @change="handleFileChange($event)"
                                    accept="image/*,video/*,audio/*,.mp3,.m4a,.opus,.ogg,.wav,.pdf,.doc,.docx,.txt"
                                    class="hidden"
                                >
                                <div class="flex flex-col items-center justify-center gap-2 py-2">
                                    <svg class="w-7 h-7 opacity-75" :class="selectedPlan === 'premium' ? 'text-[#ECC15E]' : 'text-[#c02d4b]'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                    <div class="text-[13px] font-semibold">
                                        <span x-show="uploadedFilesCount === 0">Click or drag files here to upload</span>
                                        <span x-show="uploadedFilesCount > 0" class="text-emerald-500 font-bold" x-text="uploadedFilesCount + ' file(s) selected'"></span>
                                    </div>
                                    <span class="text-[10.5px] opacity-60">Photos, videos, voice notes (MP3, M4A, OPUS), PDF or Word · up to 30 MB each</span>
                                    <template x-if="uploadedFileNames && uploadedFileNames.length > 0">
                                        <div class="mt-2 flex flex-wrap justify-center gap-1.5 max-w-md mx-auto">
                                            <template x-for="(fname, i) in uploadedFileNames.slice(0, 3)" :key="i">
                                                <span class="inline-flex items-center text-[10.5px] px-2.5 py-0.5 rounded-full border truncate max-w-[150px]"
                                                    :class="selectedPlan === 'premium' ? 'bg-white/10 border-white/20 text-white' : 'bg-gray-100 border-gray-200 text-brand-dark'"
                                                    x-text="fname"></span>
                                            </template>
                                            <span x-show="uploadedFileNames.length > 3" class="text-[10.5px] px-1.5 py-0.5 opacity-70" x-text="'+' + (uploadedFileNames.length - 3) + ' more'"></span>
                                        </div>
                                    </template>
                                </div>
                            </label>
                        </div>
                    </div>

                    {{-- SECTION 6: ADDITIONAL INSTRUCTIONS --}}
                    <div>
                        <div class="flex items-center gap-2 mb-3">
                            <span 
                                class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold shrink-0"
                                :class="selectedPlan === 'premium' ? 'bg-[#ECC15E] text-[#241002]' : 'bg-[#c02d4b] text-white'"
                            >6</span>
                            <h2 
                                class="font-display text-lg sm:text-xl font-bold transition-colors duration-300"
                                :class="selectedPlan === 'premium' ? 'text-white' : 'text-brand-dark'"
                            >
                                Additional Notes or Specific Instructions (Optional)
                            </h2>
                        </div>

                        <div>
                            <textarea 
                                name="story" 
                                rows="3" 
                                placeholder="Any specific pronunciation tips, preferred music style/mood (e.g. upbeat acoustic, slow and soulful, grand cinematic), or special phrases you definitely want included..."
                                class="w-full rounded-xl p-3.5 text-[13px] transition-all resize-y focus:outline-none"
                                :class="selectedPlan === 'premium' 
                                    ? 'bg-white/10 border border-white/20 text-white placeholder:text-white/35 focus:ring-2 focus:ring-[#DCA838]/30 focus:border-[#ECC15E] focus:bg-white/[0.14]' 
                                    : 'bg-white border border-[#e6d8d0] text-brand-dark placeholder:text-brand-dark/40 focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40'"
                            ></textarea>
                        </div>
                    </div>

                    {{-- SECTION 7: SUBMISSION & ACTION BAR --}}
                    <div class="pt-4 border-t" :class="selectedPlan === 'premium' ? 'border-white/15' : 'border-pink-100'">
                        {{-- Legal Checkboxes --}}
                        <div class="mb-5 space-y-2.5 text-[12px] sm:text-[12.5px] transition-colors"
                            :class="selectedPlan === 'premium' ? 'text-white/90' : 'text-brand-dark/90'">
                            <label class="flex items-start gap-2.5 cursor-pointer select-none">
                                <input 
                                    type="checkbox" 
                                    name="terms_privacy_accepted" 
                                    required
                                    class="mt-0.5 rounded border-gray-300 text-[#c02d4b] focus:ring-[#c02d4b] cursor-pointer"
                                    :class="selectedPlan === 'premium' ? 'bg-white/10 border-white/30 checked:bg-[#DCA838]' : ''"
                                >
                                <span class="leading-snug">
                                    I’ve read the <a href="{{ route('privacy') }}" target="_blank" class="underline hover:text-[#c02d4b] transition-colors" :class="selectedPlan === 'premium' ? 'hover:text-[#ECC15E]' : ''">Privacy Policy</a> and <a href="{{ route('refund') }}" target="_blank" class="underline hover:text-[#c02d4b] transition-colors" :class="selectedPlan === 'premium' ? 'hover:text-[#ECC15E]' : ''">Refund Policy</a> <span class="text-rose-500 font-bold">(required)</span>
                                </span>
                            </label>
                            <label class="flex items-start gap-2.5 cursor-pointer select-none">
                                <input 
                                    type="checkbox" 
                                    name="public_share_consent" 
                                    value="1"
                                    class="mt-0.5 rounded border-gray-300 text-[#c02d4b] focus:ring-[#c02d4b] cursor-pointer"
                                    :class="selectedPlan === 'premium' ? 'bg-white/10 border-white/30 checked:bg-[#DCA838]' : ''"
                                >
                                <span class="leading-snug">
                                    You may share my song or a line from my message publicly. I can change my mind anytime. <span class="opacity-70">(optional)</span>
                                </span>
                            </label>
                        </div>

                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                            <button 
                                type="submit" 
                                class="w-full sm:w-auto py-3.5 px-8 sm:px-10 rounded-full font-bold text-[14px] sm:text-[15px] transition-all flex items-center justify-center gap-2.5 group cursor-pointer shadow-lg"
                                :class="selectedPlan === 'premium' 
                                    ? 'bg-gradient-to-r from-[#B8841B] via-[#DCA838] to-[#A27010] text-[#241002] hover:brightness-105 shadow-[#B8841B]/35 border border-[#ECC15E]/70 hover:scale-[1.02]' 
                                    : 'bg-gradient-to-r from-brand-pink to-[#E11D48] text-white hover:brightness-105 shadow-brand-pink/30 hover:scale-[1.02]'"
                            >
                                <span>Submit My Song Story</span>
                                <span class="group-hover:translate-x-1.5 transition-transform duration-300">→</span>
                            </button>

                            <a 
                                href="https://wa.me/919585475959?text=Hi%20Heartgrams%2C%20I%20have%20a%20question%20about%20creating%20my%20song" 
                                target="_blank" 
                                class="w-full sm:w-auto py-3 px-6 rounded-full font-medium text-[13px] transition-colors flex items-center justify-center gap-2 shadow-xs"
                                :class="selectedPlan === 'premium' 
                                    ? 'bg-white/10 border border-white/20 text-white hover:bg-white/20' 
                                    : 'bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 hover:text-gray-900'"
                            >
                                <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.275.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.099.824zm-3.423-14.416c-6.627 0-12 5.373-12 12 0 2.164.577 4.195 1.583 5.952l-1.683 6.147 6.29-1.65c1.7 1.011 3.69 1.59 5.81 1.59 6.627 0 12-5.373 12-12s-5.373-12-12-12z"/></svg>
                                <span>Need help? Chat on WhatsApp</span>
                            </a>
                        </div>

                        {{-- Privacy & Guarantee footnote --}}
                        <div class="mt-6 flex flex-wrap items-center justify-center gap-x-6 gap-y-2 text-[11px] opacity-70">
                            <span class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                <span>Private &amp; confidential</span>
                            </span>
                            <span class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>Every lyric quality-checked</span>
                            </span>
                            <span class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                <span>Crafted with love by Heartgrams</span>
                            </span>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-public-layout>
