<x-admin-layout>
    <x-slot name="header">Edit Page: Home Page</x-slot>

    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Home Page CMS</h1>
            <p class="text-sm text-gray-500 mt-1">Update all headings, descriptions, steps, FAQs, and local image uploads for the home page.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-semibold text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition shadow-2xs">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                View Live Site
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg shadow-2xs flex items-center justify-between">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <p class="text-sm text-green-800 font-medium">{{ session('success') }}</p>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800 text-xs font-bold">✕</button>
        </div>
    @endif

    {{-- Main Editor with Alpine Tabs --}}
    <div class="bg-white shadow-sm border border-gray-200 rounded-xl overflow-hidden" x-data="{ activeTab: 'hero' }">
        
        {{-- Tabs Navigation Bar --}}
        <div class="border-b border-gray-200 bg-gray-50 flex flex-wrap gap-1 p-2">
            <button type="button" @click="activeTab = 'hero'" 
                    :class="activeTab === 'hero' ? 'bg-white text-[#c02d4b] font-bold shadow-2xs' : 'text-gray-600 hover:bg-gray-100'"
                    class="px-3.5 py-2 rounded-lg text-xs font-medium transition">
                1. Hero Section
            </button>
            <button type="button" @click="activeTab = 'preview'" 
                    :class="activeTab === 'preview' ? 'bg-white text-[#c02d4b] font-bold shadow-2xs' : 'text-gray-600 hover:bg-gray-100'"
                    class="px-3.5 py-2 rounded-lg text-xs font-medium transition">
                2. Audio Preview
            </button>
            <button type="button" @click="activeTab = 'occasions'" 
                    :class="activeTab === 'occasions' ? 'bg-white text-[#c02d4b] font-bold shadow-2xs' : 'text-gray-600 hover:bg-gray-100'"
                    class="px-3.5 py-2 rounded-lg text-xs font-medium transition">
                3. Occasions Banner
            </button>
            <button type="button" @click="activeTab = 'howitworks'" 
                    :class="activeTab === 'howitworks' ? 'bg-white text-[#c02d4b] font-bold shadow-2xs' : 'text-gray-600 hover:bg-gray-100'"
                    class="px-3.5 py-2 rounded-lg text-xs font-medium transition">
                4. How It Works (5 Steps)
            </button>
            <button type="button" @click="activeTab = 'testimonials'" 
                    :class="activeTab === 'testimonials' ? 'bg-white text-[#c02d4b] font-bold shadow-2xs' : 'text-gray-600 hover:bg-gray-100'"
                    class="px-3.5 py-2 rounded-lg text-xs font-medium transition">
                5. Wall of Love Intro
            </button>
            <button type="button" @click="activeTab = 'pricing'" 
                    :class="activeTab === 'pricing' ? 'bg-white text-[#c02d4b] font-bold shadow-2xs' : 'text-gray-600 hover:bg-gray-100'"
                    class="px-3.5 py-2 rounded-lg text-xs font-medium transition">
                6. Pricing & Plans
            </button>
            <button type="button" @click="activeTab = 'faq'" 
                    :class="activeTab === 'faq' ? 'bg-white text-[#c02d4b] font-bold shadow-2xs' : 'text-gray-600 hover:bg-gray-100'"
                    class="px-3.5 py-2 rounded-lg text-xs font-medium transition">
                7. FAQs (7 Q&A)
            </button>
            <button type="button" @click="activeTab = 'privacy'" 
                    :class="activeTab === 'privacy' ? 'bg-white text-[#c02d4b] font-bold shadow-2xs' : 'text-gray-600 hover:bg-gray-100'"
                    class="px-3.5 py-2 rounded-lg text-xs font-medium transition">
                8. Privacy Promise
            </button>
            <button type="button" @click="activeTab = 'founder'" 
                    :class="activeTab === 'founder' ? 'bg-white text-[#c02d4b] font-bold shadow-2xs' : 'text-gray-600 hover:bg-gray-100'"
                    class="px-3.5 py-2 rounded-lg text-xs font-medium transition">
                9. Founder Story
            </button>
            <button type="button" @click="activeTab = 'cta'" 
                    :class="activeTab === 'cta' ? 'bg-white text-[#c02d4b] font-bold shadow-2xs' : 'text-gray-600 hover:bg-gray-100'"
                    class="px-3.5 py-2 rounded-lg text-xs font-medium transition">
                10. Bottom CTA & Footer
            </button>
        </div>

        <form action="{{ route('admin.pages.home.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- 1. HERO SECTION TAB --}}
            <div x-show="activeTab === 'hero'" class="p-6 space-y-6">
                <div class="border-b border-gray-100 pb-3">
                    <h2 class="text-base font-bold text-gray-900">Hero Section Content & Media</h2>
                    <p class="text-xs text-gray-500">Configure text, headlines, CTA links, and local image uploads.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Hero Eyebrow Badge</label>
                        <input type="text" name="home_hero_badge" value="{{ $content['home_hero_badge'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs focus:ring-[#c02d4b] focus:border-[#c02d4b]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Headline Highlight (Italic Pink)</label>
                        <input type="text" name="home_hero_title_highlight" value="{{ $content['home_hero_title_highlight'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs focus:ring-[#c02d4b] focus:border-[#c02d4b]">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Headline Line 1</label>
                        <input type="text" name="home_hero_title_line_1" value="{{ $content['home_hero_title_line_1'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs focus:ring-[#c02d4b] focus:border-[#c02d4b]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Headline Line 2</label>
                        <input type="text" name="home_hero_title_line_2" value="{{ $content['home_hero_title_line_2'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs focus:ring-[#c02d4b] focus:border-[#c02d4b]">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Hero Description Paragraph</label>
                    <textarea name="home_hero_description" rows="3" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs focus:ring-[#c02d4b] focus:border-[#c02d4b]">{{ $content['home_hero_description'] }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="p-3.5 bg-gray-50 border border-gray-200 rounded-lg space-y-3">
                        <span class="text-xs font-bold text-gray-800 uppercase block">Primary CTA Button</span>
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 mb-1">Button Text</label>
                            <input type="text" name="home_hero_cta_1_text" value="{{ $content['home_hero_cta_1_text'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 mb-1">Button Link / Anchor</label>
                            <input type="text" name="home_hero_cta_1_link" value="{{ $content['home_hero_cta_1_link'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                        </div>
                    </div>
                    <div class="p-3.5 bg-gray-50 border border-gray-200 rounded-lg space-y-3">
                        <span class="text-xs font-bold text-gray-800 uppercase block">Secondary CTA Button</span>
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 mb-1">Button Text</label>
                            <input type="text" name="home_hero_cta_2_text" value="{{ $content['home_hero_cta_2_text'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 mb-1">Button Link / Anchor</label>
                            <input type="text" name="home_hero_cta_2_link" value="{{ $content['home_hero_cta_2_link'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                        </div>
                    </div>
                </div>

                {{-- Trust Badges --}}
                <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                    <span class="text-xs font-bold text-gray-800 uppercase block mb-3">Hero Trust Badges (4 Points)</span>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                        <div>
                            <label class="block text-[10.5px] font-medium text-gray-500 mb-1">Badge 1</label>
                            <input type="text" name="home_hero_badge_1" value="{{ $content['home_hero_badge_1'] }}" class="w-full text-xs border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-[10.5px] font-medium text-gray-500 mb-1">Badge 2</label>
                            <input type="text" name="home_hero_badge_2" value="{{ $content['home_hero_badge_2'] }}" class="w-full text-xs border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-[10.5px] font-medium text-gray-500 mb-1">Badge 3</label>
                            <input type="text" name="home_hero_badge_3" value="{{ $content['home_hero_badge_3'] }}" class="w-full text-xs border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-[10.5px] font-medium text-gray-500 mb-1">Badge 4</label>
                            <input type="text" name="home_hero_badge_4" value="{{ $content['home_hero_badge_4'] }}" class="w-full text-xs border-gray-300 rounded-lg">
                        </div>
                    </div>
                </div>

                {{-- Image Uploads (Local File Storage) --}}
                <div class="border-t border-gray-200 pt-5">
                    <h3 class="text-sm font-bold text-gray-900 mb-1 flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#c02d4b]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Local Image Storage (Saved directly in /public/uploads/home/)
                    </h3>
                    <p class="text-xs text-gray-500 mb-4">Upload new images from your computer. Files are stored on your local server.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Hero Background Image --}}
                        <div class="p-4 border border-gray-200 rounded-xl bg-gray-50">
                            <label class="block text-xs font-bold text-gray-800 uppercase mb-2">Hero Background Image</label>
                            <div class="flex items-center gap-4 mb-3">
                                @if(!empty($content['home_hero_bg_image']))
                                    <img src="{{ asset($content['home_hero_bg_image']) }}" alt="Hero Background" class="w-20 h-14 object-cover rounded-lg border border-gray-300 shadow-2xs">
                                @else
                                    <div class="w-20 h-14 bg-gray-200 rounded-lg flex items-center justify-center text-xs text-gray-500">None</div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <p class="text-[11px] text-gray-500 truncate">Current: {{ $content['home_hero_bg_image'] }}</p>
                                    <input type="file" name="home_hero_bg_image" accept="image/*" class="mt-1 block w-full text-xs text-gray-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-pink-50 file:text-[#c02d4b] hover:file:bg-pink-100 cursor-pointer">
                                </div>
                            </div>
                            <input type="text" name="home_hero_bg_image_text" placeholder="Or enter image URL / relative path" value="{{ $content['home_hero_bg_image'] }}" class="w-full text-xs border-gray-300 rounded-lg">
                        </div>

                        {{-- Hero Vinyl / Album Art Image --}}
                        <div class="p-4 border border-gray-200 rounded-xl bg-gray-50">
                            <label class="block text-xs font-bold text-gray-800 uppercase mb-2">Hero Floating Card Album Art</label>
                            <div class="flex items-center gap-4 mb-3">
                                @if(!empty($content['home_hero_album_art']))
                                    <img src="{{ asset($content['home_hero_album_art']) }}" alt="Album Art" class="w-16 h-16 object-cover rounded-lg border border-gray-300 shadow-2xs">
                                @else
                                    <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center text-xs text-gray-500">None</div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <p class="text-[11px] text-gray-500 truncate">Current: {{ $content['home_hero_album_art'] }}</p>
                                    <input type="file" name="home_hero_album_art" accept="image/*" class="mt-1 block w-full text-xs text-gray-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-pink-50 file:text-[#c02d4b] hover:file:bg-pink-100 cursor-pointer">
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-2 mt-2">
                                <div>
                                    <label class="block text-[10px] text-gray-500">Player Sub-title 1</label>
                                    <input type="text" name="home_hero_player_title_1" value="{{ $content['home_hero_player_title_1'] }}" class="w-full text-xs border-gray-300 rounded-lg">
                                </div>
                                <div>
                                    <label class="block text-[10px] text-gray-500">Player Sub-title 2</label>
                                    <input type="text" name="home_hero_player_title_2" value="{{ $content['home_hero_player_title_2'] }}" class="w-full text-xs border-gray-300 rounded-lg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2. AUDIO PREVIEW TAB --}}
            <div x-show="activeTab === 'preview'" class="p-6 space-y-6">
                <div class="border-b border-gray-100 pb-3">
                    <h2 class="text-base font-bold text-gray-900">Interactive Preview Section ("Hear our Heartgrams.")</h2>
                    <p class="text-xs text-gray-500">Update section headline, description, and preview settings.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Eyebrow Badge</label>
                        <input type="text" name="home_preview_badge" value="{{ $content['home_preview_badge'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Section Title</label>
                        <input type="text" name="home_preview_title" value="{{ $content['home_preview_title'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Section Description</label>
                    <textarea name="home_preview_description" rows="2" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">{{ $content['home_preview_description'] }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Explore Button Text</label>
                    <input type="text" name="home_preview_btn_text" value="{{ $content['home_preview_btn_text'] }}" class="w-full max-w-sm text-sm border-gray-300 rounded-lg shadow-2xs">
                </div>

                <div class="p-4 bg-pink-50/60 border border-pink-200 rounded-xl">
                    <div class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-pink-100 text-[#c02d4b] flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">♪</div>
                        <div>
                            <h4 class="text-xs font-bold text-gray-900">Audio Songs & Cloudinary Audio URLs</h4>
                            <p class="text-xs text-gray-600 mt-0.5">The audio tracks and lyrics for each occasion (Love, Birthday, Apology, Proposal, Anniversary) can be customized anytime under <a href="{{ route('admin.occasion-songs.index') }}" class="text-[#c02d4b] font-bold underline">Occasion Songs (Audio)</a>.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 3. OCCASIONS BANNER TAB --}}
            <div x-show="activeTab === 'occasions'" class="p-6 space-y-6">
                <div class="border-b border-gray-100 pb-3">
                    <h2 class="text-base font-bold text-gray-900">Occasions Banner ("For anyone, for any reason.")</h2>
                    <p class="text-xs text-gray-500">Edit the top banner and buttons in the dark occasions section.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Eyebrow Badge</label>
                        <input type="text" name="home_occasions_badge" value="{{ $content['home_occasions_badge'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Heading Highlight (Italic)</label>
                        <input type="text" name="home_occasions_title_highlight" value="{{ $content['home_occasions_title_highlight'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Main Heading (Line 1)</label>
                    <input type="text" name="home_occasions_title_line_1" value="{{ $content['home_occasions_title_line_1'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Subtitle / Paragraph</label>
                    <textarea name="home_occasions_description" rows="2" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">{{ $content['home_occasions_description'] }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Explore Button Text</label>
                        <input type="text" name="home_occasions_btn_text" value="{{ $content['home_occasions_btn_text'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Explore Button Link</label>
                        <input type="text" name="home_occasions_btn_link" value="{{ $content['home_occasions_btn_link'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                </div>
            </div>

            {{-- 4. HOW IT WORKS TAB --}}
            <div x-show="activeTab === 'howitworks'" class="p-6 space-y-6">
                <div class="border-b border-gray-100 pb-3">
                    <h2 class="text-base font-bold text-gray-900">How Heartgrams Works (5 Steps)</h2>
                    <p class="text-xs text-gray-500">Edit section headline, subtitle, and each of the five journey steps.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Section Title</label>
                        <input type="text" name="home_hiw_title" value="{{ $content['home_hiw_title'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Section Subtitle</label>
                        <input type="text" name="home_hiw_description" value="{{ $content['home_hiw_description'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                </div>

                {{-- 5 Steps --}}
                <div class="space-y-4 pt-2">
                    @for($i = 1; $i <= 5; $i++)
                        <div class="p-4 border border-gray-200 rounded-xl bg-gray-50 flex flex-col md:flex-row gap-4 items-start">
                            <div class="w-10 h-10 rounded-full bg-[#c02d4b] text-white flex items-center justify-center font-bold text-sm shrink-0">
                                0{{ $i }}
                            </div>
                            <div class="flex-1 w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 uppercase mb-1">Step {{ $i }} Title</label>
                                    <input type="text" name="home_hiw_step_{{ $i }}_title" value="{{ $content['home_hiw_step_' . $i . '_title'] }}" class="w-full text-xs font-medium border-gray-300 rounded-lg shadow-2xs">
                                </div>
                                <div>
                                    <label class="block text-[11px] font-bold text-gray-700 uppercase mb-1">Step {{ $i }} Description</label>
                                    <input type="text" name="home_hiw_step_{{ $i }}_desc" value="{{ $content['home_hiw_step_' . $i . '_desc'] }}" class="w-full text-xs border-gray-300 rounded-lg shadow-2xs">
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            {{-- 5. TESTIMONIALS TAB --}}
            <div x-show="activeTab === 'testimonials'" class="p-6 space-y-6">
                <div class="border-b border-gray-100 pb-3">
                    <h2 class="text-base font-bold text-gray-900">Wall of Love / Testimonials Header</h2>
                    <p class="text-xs text-gray-500">Edit the intro headline and buttons. The cards themselves are loaded from the Testimonials & Reviews manager.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Eyebrow Badge</label>
                        <input type="text" name="home_testimonials_badge" value="{{ $content['home_testimonials_badge'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Main Heading</label>
                        <input type="text" name="home_testimonials_title" value="{{ $content['home_testimonials_title'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Subtitle</label>
                    <textarea name="home_testimonials_subtitle" rows="2" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">{{ $content['home_testimonials_subtitle'] }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">CTA Button Text</label>
                        <input type="text" name="home_testimonials_btn_text" value="{{ $content['home_testimonials_btn_text'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">CTA Button Link</label>
                        <input type="text" name="home_testimonials_btn_link" value="{{ $content['home_testimonials_btn_link'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                </div>

                <div class="p-4 bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-between">
                    <span class="text-xs text-gray-600">Want to add or reorder individual family audio reaction cards?</span>
                    <a href="{{ route('admin.testimonials.index') }}" class="text-xs font-bold text-[#c02d4b] hover:underline">Manage Reviews & Audio &rarr;</a>
                </div>
            </div>

            {{-- 6. PRICING TAB --}}
            <div x-show="activeTab === 'pricing'" class="p-6 space-y-6">
                <div class="border-b border-gray-100 pb-3">
                    <h2 class="text-base font-bold text-gray-900">Pricing Section Header</h2>
                    <p class="text-xs text-gray-500">Edit the pricing title and subtitle. To modify prices and features in detail, visit <a href="{{ route('admin.plans.index') }}" class="text-[#c02d4b] font-bold underline">Plans & Pricing</a>.</p>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Eyebrow Badge</label>
                    <input type="text" name="home_pricing_badge" value="{{ $content['home_pricing_badge'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Main Heading</label>
                    <input type="text" name="home_pricing_title" value="{{ $content['home_pricing_title'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Subtitle</label>
                    <textarea name="home_pricing_subtitle" rows="2" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">{{ $content['home_pricing_subtitle'] }}</textarea>
                </div>
            </div>

            {{-- 7. FAQ TAB --}}
            <div x-show="activeTab === 'faq'" class="p-6 space-y-6">
                <div class="border-b border-gray-100 pb-3">
                    <h2 class="text-base font-bold text-gray-900">FAQ Section (7 Questions & Answers)</h2>
                    <p class="text-xs text-gray-500">Update questions and detailed answers shown on the home page.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Eyebrow Badge</label>
                        <input type="text" name="home_faq_badge" value="{{ $content['home_faq_badge'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Section Heading</label>
                        <input type="text" name="home_faq_title" value="{{ $content['home_faq_title'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                </div>

                <div class="space-y-4 pt-2">
                    @for($i = 1; $i <= 7; $i++)
                        <div class="p-4 border border-gray-200 rounded-xl bg-gray-50 space-y-2">
                            <label class="block text-xs font-bold text-gray-800 uppercase">Question {{ $i }}</label>
                            <input type="text" name="home_faq_{{ $i }}_q" value="{{ $content['home_faq_' . $i . '_q'] }}" class="w-full text-xs font-semibold border-gray-300 rounded-lg shadow-2xs">
                            
                            <label class="block text-[11px] font-semibold text-gray-600 uppercase mt-2">Answer {{ $i }}</label>
                            <textarea name="home_faq_{{ $i }}_a" rows="3" class="w-full text-xs border-gray-300 rounded-lg shadow-2xs">{{ $content['home_faq_' . $i . '_a'] }}</textarea>
                        </div>
                    @endfor
                </div>
            </div>

            {{-- 8. PRIVACY PROMISE TAB --}}
            <div x-show="activeTab === 'privacy'" class="p-6 space-y-6">
                <div class="border-b border-gray-100 pb-3">
                    <h2 class="text-base font-bold text-gray-900">Privacy Promise ("Your story stays yours.")</h2>
                    <p class="text-xs text-gray-500">Manage headline, privacy descriptions, and guarantees.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Badge</label>
                        <input type="text" name="home_privacy_badge" value="{{ $content['home_privacy_badge'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Main Title</label>
                        <input type="text" name="home_privacy_title" value="{{ $content['home_privacy_title'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Description Paragraph</label>
                    <textarea name="home_privacy_description" rows="3" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">{{ $content['home_privacy_description'] }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">CTA Button Text</label>
                    <input type="text" name="home_privacy_btn_text" value="{{ $content['home_privacy_btn_text'] }}" class="w-full max-w-sm text-sm border-gray-300 rounded-lg shadow-2xs">
                </div>

                <div class="space-y-3 pt-2">
                    <span class="text-xs font-bold text-gray-800 uppercase block">Privacy Checkpoints (5 Points)</span>
                    @for($i = 1; $i <= 5; $i++)
                        <div>
                            <label class="block text-[11px] font-medium text-gray-500 mb-1">Point {{ $i }}</label>
                            <input type="text" name="home_privacy_point_{{ $i }}" value="{{ $content['home_privacy_point_' . $i] }}" class="w-full text-xs border-gray-300 rounded-lg shadow-2xs">
                        </div>
                    @endfor
                </div>
            </div>

            {{-- 9. FOUNDER STORY TAB --}}
            <div x-show="activeTab === 'founder'" class="p-6 space-y-6">
                <div class="border-b border-gray-100 pb-3">
                    <h2 class="text-base font-bold text-gray-900">Founder Story Section</h2>
                    <p class="text-xs text-gray-500">Edit the story, founder quote, role, and local image upload.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Badge</label>
                        <input type="text" name="home_founder_badge" value="{{ $content['home_founder_badge'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Section Title</label>
                        <input type="text" name="home_founder_title" value="{{ $content['home_founder_title'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Paragraph 1</label>
                    <textarea name="home_founder_p1" rows="2" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">{{ $content['home_founder_p1'] }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Paragraph 2</label>
                    <textarea name="home_founder_p2" rows="2" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">{{ $content['home_founder_p2'] }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Paragraph 3</label>
                    <textarea name="home_founder_p3" rows="2" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">{{ $content['home_founder_p3'] }}</textarea>
                </div>

                <div class="p-4 bg-gray-50 border border-gray-200 rounded-xl space-y-4">
                    <span class="text-xs font-bold text-gray-800 uppercase block">Founder Quote Card</span>
                    <div>
                        <label class="block text-[11px] font-semibold text-gray-600 mb-1">Quote Text</label>
                        <input type="text" name="home_founder_quote" value="{{ $content['home_founder_quote'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 mb-1">Founder Name</label>
                            <input type="text" name="home_founder_name" value="{{ $content['home_founder_name'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 mb-1">Founder Role</label>
                            <input type="text" name="home_founder_role" value="{{ $content['home_founder_role'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 mb-1">Sub-card Heading</label>
                            <input type="text" name="home_founder_card_title" value="{{ $content['home_founder_card_title'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-gray-600 mb-1">Sub-card Description</label>
                            <textarea name="home_founder_card_desc" rows="2" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">{{ $content['home_founder_card_desc'] }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Founder Image Upload --}}
                <div class="p-4 border border-gray-200 rounded-xl bg-gray-50">
                    <label class="block text-xs font-bold text-gray-800 uppercase mb-2">Founder Image / Portrait (Local Storage)</label>
                    <div class="flex items-center gap-4">
                        @if(!empty($content['home_founder_image']))
                            <img src="{{ asset($content['home_founder_image']) }}" alt="Founder" class="w-16 h-16 object-cover rounded-full border border-gray-300 shadow-2xs">
                        @else
                            <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center text-xs text-gray-500">None</div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <input type="file" name="home_founder_image" accept="image/*" class="block w-full text-xs text-gray-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-pink-50 file:text-[#c02d4b] hover:file:bg-pink-100 cursor-pointer">
                            <input type="text" name="home_founder_image_text" placeholder="Or image path / URL" value="{{ $content['home_founder_image'] }}" class="mt-2 w-full text-xs border-gray-300 rounded-lg">
                        </div>
                    </div>
                </div>
            </div>

            {{-- 10. FINAL CTA & FOOTER TAB --}}
            <div x-show="activeTab === 'cta'" class="p-6 space-y-6">
                <div class="border-b border-gray-100 pb-3">
                    <h2 class="text-base font-bold text-gray-900">Bottom CTA & Footer Settings</h2>
                    <p class="text-xs text-gray-500">Edit bottom red gradient banner and footer links / contacts.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">CTA Eyebrow Badge</label>
                        <input type="text" name="home_cta_badge" value="{{ $content['home_cta_badge'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">CTA Main Heading</label>
                        <input type="text" name="home_cta_title" value="{{ $content['home_cta_title'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-1">CTA Subtitle</label>
                    <textarea name="home_cta_subtitle" rows="2" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">{{ $content['home_cta_subtitle'] }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="p-3.5 bg-gray-50 border border-gray-200 rounded-lg space-y-2">
                        <span class="text-xs font-bold text-gray-800 uppercase block">CTA Button 1 (Start Song)</span>
                        <input type="text" name="home_cta_btn_1_text" placeholder="Text" value="{{ $content['home_cta_btn_1_text'] }}" class="w-full text-xs border-gray-300 rounded-lg">
                        <input type="text" name="home_cta_btn_1_link" placeholder="Link" value="{{ $content['home_cta_btn_1_link'] }}" class="w-full text-xs border-gray-300 rounded-lg">
                    </div>
                    <div class="p-3.5 bg-gray-50 border border-gray-200 rounded-lg space-y-2">
                        <span class="text-xs font-bold text-gray-800 uppercase block">CTA Button 2 (WhatsApp)</span>
                        <input type="text" name="home_cta_btn_2_text" placeholder="Text" value="{{ $content['home_cta_btn_2_text'] }}" class="w-full text-xs border-gray-300 rounded-lg">
                        <input type="text" name="home_cta_btn_2_link" placeholder="Link" value="{{ $content['home_cta_btn_2_link'] }}" class="w-full text-xs border-gray-300 rounded-lg">
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-5 space-y-4">
                    <h3 class="text-sm font-bold text-gray-900">Footer Details</h3>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Footer Tagline</label>
                        <textarea name="home_footer_tagline" rows="2" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">{{ $content['home_footer_tagline'] }}</textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-1">WhatsApp Contact</label>
                            <input type="text" name="home_footer_whatsapp" value="{{ $content['home_footer_whatsapp'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Support Email</label>
                            <input type="text" name="home_footer_email" value="{{ $content['home_footer_email'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Copyright Line</label>
                        <input type="text" name="home_footer_copyright" value="{{ $content['home_footer_copyright'] }}" class="w-full text-sm border-gray-300 rounded-lg shadow-2xs">
                    </div>
                </div>
            </div>

            {{-- Sticky Action Bar at the Bottom --}}
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-between sticky bottom-0 z-30">
                <span class="text-xs text-gray-500">Images uploaded here will be stored in <code class="bg-gray-200 px-1 py-0.5 rounded text-[11px]">/public/uploads/home/</code>.</span>
                <button type="submit" class="px-6 py-2.5 bg-[#c02d4b] hover:bg-[#a62540] text-white font-bold text-sm rounded-lg shadow-md hover:shadow-lg transition flex items-center gap-2 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Save All Changes
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
