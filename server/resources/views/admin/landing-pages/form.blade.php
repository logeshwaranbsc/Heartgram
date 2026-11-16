<x-admin-layout>
    <x-slot name="header">
        {{ $page->exists ? 'Edit Landing Page: ' . $page->name : 'Create New Landing Page' }}
    </x-slot>

    <div class="max-w-5xl mx-auto space-y-6">
        <div class="flex justify-between items-center">
            <a href="{{ route('admin.landing-pages.index') }}" class="text-gray-500 hover:text-gray-700 font-medium text-sm flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Pages
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">There were {{ $errors->count() }} errors with your submission</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ $page->exists ? route('admin.landing-pages.update', $page) : route('admin.landing-pages.store') }}" method="POST" class="bg-white shadow rounded-lg overflow-hidden">
            @csrf
            @if($page->exists)
                @method('PUT')
            @endif

            <div x-data="{ activeTab: 'general' }">
                {{-- Tabs Navigation --}}
                <div class="border-b border-gray-200 bg-gray-50 px-6 pt-4">
                    <nav class="-mb-px flex space-x-6 overflow-x-auto">
                        <button type="button" @click="activeTab = 'general'" 
                                :class="activeTab === 'general' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                                class="whitespace-nowrap pb-3 pt-2 px-4 text-sm font-medium rounded-t-lg transition-colors">
                            General
                        </button>
                        <button type="button" @click="activeTab = 'hero'" 
                                :class="activeTab === 'hero' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                                class="whitespace-nowrap pb-3 pt-2 px-4 text-sm font-medium rounded-t-lg transition-colors">
                            Hero Section
                        </button>
                        <button type="button" @click="activeTab = 'reactions'" 
                                :class="activeTab === 'reactions' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                                class="whitespace-nowrap pb-3 pt-2 px-4 text-sm font-medium rounded-t-lg transition-colors">
                            Reactions
                        </button>
                        <button type="button" @click="activeTab = 'audio'" 
                                :class="activeTab === 'audio' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                                class="whitespace-nowrap pb-3 pt-2 px-4 text-sm font-medium rounded-t-lg transition-colors">
                            Audio Sample
                        </button>
                        <button type="button" @click="activeTab = 'pricing'" 
                                :class="activeTab === 'pricing' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                                class="whitespace-nowrap pb-3 pt-2 px-4 text-sm font-medium rounded-t-lg transition-colors">
                            Pricing
                        </button>
                        <button type="button" @click="activeTab = 'cta'" 
                                :class="activeTab === 'cta' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                                class="whitespace-nowrap pb-3 pt-2 px-4 text-sm font-medium rounded-t-lg transition-colors">
                            Call to Action
                        </button>
                        <button type="button" @click="activeTab = 'faq'" 
                                :class="activeTab === 'faq' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                                class="whitespace-nowrap pb-3 pt-2 px-4 text-sm font-medium rounded-t-lg transition-colors">
                            FAQ
                        </button>
                        <button type="button" @click="activeTab = 'seo'" 
                                :class="activeTab === 'seo' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                                class="whitespace-nowrap pb-3 pt-2 px-4 text-sm font-medium rounded-t-lg transition-colors">
                            SEO
                        </button>
                    </nav>
                </div>

                {{-- General Settings Tab --}}
                <div x-show="activeTab === 'general'" class="px-6 py-6 space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Page Name (Internal)</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $page->name) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">URL Slug</label>
                        <div class="flex items-center">
                            <span class="text-gray-500 mr-2 bg-gray-100 px-3 py-2 rounded border border-gray-300">{{ url('/l') }}/</span>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $page->slug) }}" class="flex-1 border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex items-center mt-4">
                        <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $page->is_published) ? 'checked' : '' }} class="h-4 w-4 text-pink-600 focus:ring-pink-500 border-gray-300 rounded">
                        <label for="is_published" class="ml-2 block text-sm text-gray-900">Publish this page</label>
                    </div>
                </div>

                {{-- Hero Section Tab --}}
                <div x-show="activeTab === 'hero'" x-cloak class="px-6 py-6 space-y-6 bg-gray-50/50">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <h4 class="font-medium text-gray-900">Left Column Content</h4>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Small Top Title</label>
                                <input type="text" name="hero_small_title" value="{{ old('hero_small_title', $content['hero_small_title']) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Main Title (HTML allowed)</label>
                                <textarea name="hero_title" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">{{ old('hero_title', $content['hero_title']) }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Subtitle</label>
                                <input type="text" name="hero_subtitle" value="{{ old('hero_subtitle', $content['hero_subtitle']) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <textarea name="hero_description" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">{{ old('hero_description', $content['hero_description']) }}</textarea>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Primary Button Text</label>
                                    <input type="text" name="hero_btn1_text" value="{{ old('hero_btn1_text', $content['hero_btn1_text']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Primary Button Link</label>
                                    <input type="text" name="hero_btn1_link" value="{{ old('hero_btn1_link', $content['hero_btn1_link']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Secondary Button Text</label>
                                    <input type="text" name="hero_btn2_text" value="{{ old('hero_btn2_text', $content['hero_btn2_text']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Secondary Button Link</label>
                                    <input type="text" name="hero_btn2_link" value="{{ old('hero_btn2_link', $content['hero_btn2_link']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Warning/Slot Text</label>
                                <input type="text" name="hero_warning_text" value="{{ old('hero_warning_text', $content['hero_warning_text']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h4 class="font-medium text-gray-900">Right Column (Sample Card)</h4>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tag (e.g. NOW COMPOSING)</label>
                                <input type="text" name="hero_card_tag" value="{{ old('hero_card_tag', $content['hero_card_tag']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Card Title</label>
                                <input type="text" name="hero_card_title" value="{{ old('hero_card_title', $content['hero_card_title']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Card Subtitle (Details)</label>
                                <input type="text" name="hero_card_subtitle" value="{{ old('hero_card_subtitle', $content['hero_card_subtitle']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Audio/MP3 Link</label>
                                <input type="url" name="hero_card_audio_link" value="{{ old('hero_card_audio_link', $content['hero_card_audio_link'] ?? '') }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm" placeholder="https://...">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Card Footer Text</label>
                                <input type="text" name="hero_card_footer" value="{{ old('hero_card_footer', $content['hero_card_footer']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                            </div>
                            
                            <hr class="my-4">
                            <h4 class="font-medium text-gray-900">Stats Section (Bottom Left)</h4>
                            <div class="grid grid-cols-3 gap-2">
                                <div>
                                    <input type="text" name="hero_stat1_number" value="{{ old('hero_stat1_number', $content['hero_stat1_number']) }}" placeholder="Number" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm mb-1">
                                    <input type="text" name="hero_stat1_label" value="{{ old('hero_stat1_label', $content['hero_stat1_label']) }}" placeholder="Label" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                </div>
                                <div>
                                    <input type="text" name="hero_stat2_number" value="{{ old('hero_stat2_number', $content['hero_stat2_number']) }}" placeholder="Number" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm mb-1">
                                    <input type="text" name="hero_stat2_label" value="{{ old('hero_stat2_label', $content['hero_stat2_label']) }}" placeholder="Label" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                </div>
                                <div>
                                    <input type="text" name="hero_stat3_number" value="{{ old('hero_stat3_number', $content['hero_stat3_number']) }}" placeholder="Number" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm mb-1">
                                    <input type="text" name="hero_stat3_label" value="{{ old('hero_stat3_label', $content['hero_stat3_label']) }}" placeholder="Label" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Reactions Tab --}}
                <div x-show="activeTab === 'reactions'" x-cloak class="px-6 py-6 space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Small Subtitle</label>
                        <input type="text" name="reactions_subtitle" value="{{ old('reactions_subtitle', $content['reactions_subtitle']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Main Title</label>
                        <input type="text" name="reactions_title" value="{{ old('reactions_title', $content['reactions_title']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    
                    <hr class="my-6 border-gray-200">
                    <h4 class="font-medium text-gray-900 mb-4">Reaction Videos</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @for($i = 1; $i <= 3; $i++)
                        <div class="space-y-3 bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <h5 class="font-medium text-gray-700 text-sm">Video {{ $i }}</h5>
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Tag (e.g. Love)</label>
                                <input type="text" name="reaction_{{ $i }}_tag" value="{{ old('reaction_'.$i.'_tag', $content['reaction_'.$i.'_tag'] ?? '') }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-xs">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Video URL (MP4)</label>
                                <input type="url" name="reaction_{{ $i }}_video" value="{{ old('reaction_'.$i.'_video', $content['reaction_'.$i.'_video'] ?? '') }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-xs" placeholder="https://...">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Duration (e.g. 0:47)</label>
                                <input type="text" name="reaction_{{ $i }}_duration" value="{{ old('reaction_'.$i.'_duration', $content['reaction_'.$i.'_duration'] ?? '0:47') }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-xs">
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>

                {{-- Audio Sample Tab --}}
                <div x-show="activeTab === 'audio'" x-cloak class="px-6 py-6 space-y-6 bg-gray-50/50">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Small Subtitle</label>
                        <input type="text" name="audio_subtitle" value="{{ old('audio_subtitle', $content['audio_subtitle']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Main Title</label>
                        <input type="text" name="audio_title" value="{{ old('audio_title', $content['audio_title']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <input type="text" name="audio_desc" value="{{ old('audio_desc', $content['audio_desc']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    <hr class="my-6 border-gray-200">
                    <h4 class="font-medium text-gray-900 mb-4">Player Details & Categories</h4>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tag (e.g. NOW PREVIEWING)</label>
                        <input type="text" name="audio_player_tag" value="{{ old('audio_player_tag', $content['audio_player_tag']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        @for($i = 1; $i <= 4; $i++)
                        <div class="space-y-3 bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <h5 class="font-medium text-gray-700 text-sm">Category {{ $i }}</h5>
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Name (e.g. Love)</label>
                                <input type="text" name="audio_cat_{{ $i }}_name" value="{{ old('audio_cat_'.$i.'_name', $content['audio_cat_'.$i.'_name'] ?? '') }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-xs">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Title</label>
                                <input type="text" name="audio_cat_{{ $i }}_title" value="{{ old('audio_cat_'.$i.'_title', $content['audio_cat_'.$i.'_title'] ?? '') }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-xs">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Subtitle</label>
                                <input type="text" name="audio_cat_{{ $i }}_subtitle" value="{{ old('audio_cat_'.$i.'_subtitle', $content['audio_cat_'.$i.'_subtitle'] ?? '') }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-xs">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Audio URL (MP3)</label>
                                <input type="url" name="audio_cat_{{ $i }}_mp3" value="{{ old('audio_cat_'.$i.'_mp3', $content['audio_cat_'.$i.'_mp3'] ?? '') }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-xs" placeholder="https://...">
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>

                {{-- Pricing Tab --}}
                <div x-show="activeTab === 'pricing'" x-cloak class="px-6 py-6 space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Small Subtitle</label>
                        <input type="text" name="pricing_subtitle" value="{{ old('pricing_subtitle', $content['pricing_subtitle']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Main Title</label>
                        <input type="text" name="pricing_title" value="{{ old('pricing_title', $content['pricing_title']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <input type="text" name="pricing_desc" value="{{ old('pricing_desc', $content['pricing_desc']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                </div>

                {{-- CTA Tab --}}
                <div x-show="activeTab === 'cta'" x-cloak class="px-6 py-6 space-y-6 bg-gray-50/50">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Small Subtitle</label>
                        <input type="text" name="cta_subtitle" value="{{ old('cta_subtitle', $content['cta_subtitle']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Main Title (HTML allowed)</label>
                        <textarea name="cta_title" rows="2" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">{{ old('cta_title', $content['cta_title']) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <input type="text" name="cta_desc" value="{{ old('cta_desc', $content['cta_desc']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Button Text</label>
                            <input type="text" name="cta_btn_text" value="{{ old('cta_btn_text', $content['cta_btn_text']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Button Link</label>
                            <input type="text" name="cta_btn_link" value="{{ old('cta_btn_link', $content['cta_btn_link']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Warning/Slot Text</label>
                        <input type="text" name="cta_warning_text" value="{{ old('cta_warning_text', $content['cta_warning_text']) }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                    </div>
                </div>

                {{-- FAQ Tab --}}
                <div x-show="activeTab === 'faq'" x-cloak class="px-6 py-6 space-y-6 bg-gray-50/50">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @for($i = 1; $i <= 6; $i++)
                        <div class="space-y-3 bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                            <h5 class="font-medium text-gray-700 text-sm">FAQ {{ $i }}</h5>
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Question</label>
                                <input type="text" name="faq_{{ $i }}_q" value="{{ old('faq_'.$i.'_q', $content['faq_'.$i.'_q'] ?? '') }}" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-600 mb-1">Answer</label>
                                <textarea name="faq_{{ $i }}_a" rows="2" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">{{ old('faq_'.$i.'_a', $content['faq_'.$i.'_a'] ?? '') }}</textarea>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>

                {{-- SEO Tab --}}
                <div x-show="activeTab === 'seo'" x-cloak style="display: none;" class="px-6 py-6 space-y-6">
                    <p class="text-sm text-gray-500 mb-6">Add raw HTML meta tags, schema markup, or tracking scripts to the head of this page.</p>
                    
                    <div>
                        <label for="seo_tags" class="block text-sm font-medium text-gray-700 mb-1">Custom SEO Tags (Raw HTML/Meta/Schema)</label>
                        <textarea id="seo_tags" name="seo_tags" rows="6" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm font-mono" placeholder="<meta name=&quot;description&quot; content=&quot;...&quot;>">{{ old('seo_tags', $page->seo_tags) }}</textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
                    <div>
                        @if($page->exists)
                            <a href="{{ route('landing.show', ['slug' => $page->slug, 'preview' => 1]) }}" target="_blank" class="text-sm font-medium text-pink-600 hover:text-pink-800 transition">
                                ↗ Preview Page
                            </a>
                        @endif
                    </div>
                    <button type="submit" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                        Save Landing Page
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
