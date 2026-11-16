<x-admin-layout>
    <x-slot name="header">Edit Page: Why Heartgrams</x-slot>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Why Heartgrams</h1>
        <p class="text-sm text-gray-500 mt-1">Update the text and images on the Why Heartgrams public page.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg">
            <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-white shadow-sm border border-gray-200 rounded-xl overflow-hidden max-w-4xl" x-data="{ activeTab: 'hero' }">
        
        {{-- Tab Navigation --}}
        <div class="border-b border-gray-200 bg-gray-50 flex">
            <button @click="activeTab = 'hero'" 
                    :class="activeTab === 'hero' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                    class="px-6 py-4 font-medium text-sm transition-colors focus:outline-none -mb-px">
                Hero Section
            </button>
            <button @click="activeTab = 'founder'" 
                    :class="activeTab === 'founder' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                    class="px-6 py-4 font-medium text-sm transition-colors focus:outline-none -mb-px">
                Founder Story
            </button>
            <button @click="activeTab = 'included'" 
                    :class="activeTab === 'included' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                    class="px-6 py-4 font-medium text-sm transition-colors focus:outline-none -mb-px">
                Everything Included
            </button>
            <button @click="activeTab = 'features'" 
                    :class="activeTab === 'features' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                    class="px-6 py-4 font-medium text-sm transition-colors focus:outline-none -mb-px">
                Features Grid
            </button>
            <button @click="activeTab = 'corrections'" 
                    :class="activeTab === 'corrections' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                    class="px-6 py-4 font-medium text-sm transition-colors focus:outline-none -mb-px">
                Corrections Policy
            </button>
            <button @click="activeTab = 'cta'" 
                    :class="activeTab === 'cta' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                    class="px-6 py-4 font-medium text-sm transition-colors focus:outline-none -mb-px">
                Call to Action
            </button>
            <button @click="activeTab = 'seo'" 
                    :class="activeTab === 'seo' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                    class="px-6 py-4 font-medium text-sm transition-colors focus:outline-none -mb-px">
                SEO Settings
            </button>
        </div>

        <form action="{{ route('admin.pages.why-heartgrams.update') }}" method="POST">
            @csrf
            
            {{-- Hero Section Tab --}}
            <div x-show="activeTab === 'hero'" class="px-6 py-6 space-y-6">
                <p class="text-sm text-gray-500 mb-6">This is the first section users see at the top of the page.</p>
                
                {{-- Subtitle --}}
                <div>
                    <label for="hero_subtitle" class="block text-sm font-medium text-gray-700 mb-1">Small Subtitle</label>
                    <input type="text" name="why_heartgrams_hero_subtitle" id="hero_subtitle" 
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                        value="{{ old('why_heartgrams_hero_subtitle', $content['hero_subtitle']) }}">
                    <p class="mt-1 text-xs text-gray-500">E.g., "WHY PEOPLE CHOOSE US"</p>
                </div>

                {{-- Title --}}
                <div>
                    <label for="hero_title" class="block text-sm font-medium text-gray-700 mb-1">Main Heading</label>
                    <input type="text" name="why_heartgrams_hero_title" id="hero_title" 
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                        value="{{ old('why_heartgrams_hero_title', $content['hero_title']) }}">
                    <p class="mt-1 text-xs text-gray-500">E.g., "Why People Choose"</p>
                </div>

                {{-- Highlight --}}
                <div>
                    <label for="hero_highlight" class="block text-sm font-medium text-gray-700 mb-1">Yellow Italic Highlight Text</label>
                    <input type="text" name="why_heartgrams_hero_highlight" id="hero_highlight" 
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                        value="{{ old('why_heartgrams_hero_highlight', $content['hero_highlight']) }}">
                    <p class="mt-1 text-xs text-gray-500">E.g., "Heartgrams"</p>
                </div>

                {{-- Description --}}
                <div>
                    <label for="hero_description" class="block text-sm font-medium text-gray-700 mb-1">Subtext / Description</label>
                    <textarea name="why_heartgrams_hero_description" id="hero_description" rows="3" 
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm">{{ old('why_heartgrams_hero_description', $content['hero_description']) }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">E.g., "Flowers fade and greeting cards get tucked away..."</p>
                </div>
            </div>

            {{-- Features Grid Tab --}}
            <div x-show="activeTab === 'features'" style="display: none;" class="px-6 py-6 space-y-8 bg-gray-50/50">
                <p class="text-sm text-gray-500 mb-2">The 6 feature cards displayed below the hero section.</p>
                
                <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm space-y-4 mb-6">
                    <h4 class="font-medium text-gray-900 mb-2 border-b pb-2">Section Header</h4>
                    <div>
                        <label for="features_subtitle" class="block text-sm font-medium text-gray-700 mb-1">Small Subtitle</label>
                        <input type="text" name="why_heartgrams_features_subtitle" id="features_subtitle" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                            value="{{ old('why_heartgrams_features_subtitle', $content['features_subtitle']) }}">
                    </div>
                    <div>
                        <label for="features_title" class="block text-sm font-medium text-gray-700 mb-1">Main Heading</label>
                        <input type="text" name="why_heartgrams_features_title" id="features_title" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                            value="{{ old('why_heartgrams_features_title', $content['features_title']) }}">
                    </div>
                    <div>
                        <label for="features_description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="why_heartgrams_features_description" id="features_description" rows="2" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm">{{ old('why_heartgrams_features_description', $content['features_description']) }}</textarea>
                    </div>
                </div>

                @for($i = 1; $i <= 6; $i++)
                    <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm">
                        <h4 class="font-medium text-gray-900 mb-4 flex items-center gap-2">
                            <span class="w-6 h-6 rounded-full bg-pink-100 text-pink-700 flex items-center justify-center text-xs font-bold">{{ $i }}</span>
                            Feature {{ $i }}
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="feature_{{ $i }}_title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                                <input type="text" name="why_heartgrams_feature_{{ $i }}_title" id="feature_{{ $i }}_title" 
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                                    value="{{ old('why_heartgrams_feature_'.$i.'_title', $content["feature_{$i}_title"]) }}">
                            </div>
                            <div>
                                <label for="feature_{{ $i }}_desc" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <textarea name="why_heartgrams_feature_{{ $i }}_desc" id="feature_{{ $i }}_desc" rows="2" 
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm">{{ old('why_heartgrams_feature_'.$i.'_desc', $content["feature_{$i}_desc"]) }}</textarea>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            {{-- Everything Included Tab --}}
            <div x-show="activeTab === 'included'" style="display: none;" class="px-6 py-6 space-y-8 bg-gray-50/50">
                <p class="text-sm text-gray-500 mb-2">The "Everything included in your Heartgram" section.</p>
                
                <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm space-y-4">
                    <h4 class="font-medium text-gray-900 mb-2 border-b pb-2">Section Header</h4>
                    <div>
                        <label for="everything_subtitle" class="block text-sm font-medium text-gray-700 mb-1">Small Subtitle</label>
                        <input type="text" name="why_heartgrams_everything_subtitle" id="everything_subtitle" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                            value="{{ old('why_heartgrams_everything_subtitle', $content['everything_subtitle']) }}">
                    </div>
                    <div>
                        <label for="everything_title" class="block text-sm font-medium text-gray-700 mb-1">Main Heading</label>
                        <input type="text" name="why_heartgrams_everything_title" id="everything_title" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                            value="{{ old('why_heartgrams_everything_title', $content['everything_title']) }}">
                    </div>
                    <div>
                        <label for="everything_description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="why_heartgrams_everything_description" id="everything_description" rows="2" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm">{{ old('why_heartgrams_everything_description', $content['everything_description']) }}</textarea>
                    </div>
                </div>

                @for($i = 1; $i <= 5; $i++)
                    <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm">
                        <h4 class="font-medium text-gray-900 mb-4 flex items-center gap-2">
                            <span class="w-6 h-6 rounded-full bg-pink-100 text-pink-700 flex items-center justify-center text-xs font-bold">{{ $i }}</span>
                            Item {{ $i }}
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="included_{{ $i }}_title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                                <input type="text" name="why_heartgrams_included_{{ $i }}_title" id="included_{{ $i }}_title" 
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                                    value="{{ old('why_heartgrams_included_'.$i.'_title', $content["included_{$i}_title"]) }}">
                            </div>
                            <div>
                                <label for="included_{{ $i }}_desc" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <textarea name="why_heartgrams_included_{{ $i }}_desc" id="included_{{ $i }}_desc" rows="2" 
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm">{{ old('why_heartgrams_included_'.$i.'_desc', $content["included_{$i}_desc"]) }}</textarea>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            {{-- Corrections Policy Tab --}}
            <div x-show="activeTab === 'corrections'" style="display: none;" class="px-6 py-6 space-y-8 bg-gray-50/50">
                <p class="text-sm text-gray-500 mb-2">The white card section detailing your corrections policy.</p>
                
                <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm space-y-4">
                    <div>
                        <label for="corrections_subtitle" class="block text-sm font-medium text-gray-700 mb-1">Small Subtitle</label>
                        <input type="text" name="why_heartgrams_corrections_subtitle" id="corrections_subtitle" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                            value="{{ old('why_heartgrams_corrections_subtitle', $content['corrections_subtitle']) }}">
                    </div>
                    <div>
                        <label for="corrections_title" class="block text-sm font-medium text-gray-700 mb-1">Main Heading</label>
                        <input type="text" name="why_heartgrams_corrections_title" id="corrections_title" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                            value="{{ old('why_heartgrams_corrections_title', $content['corrections_title']) }}">
                    </div>
                    <div>
                        <label for="corrections_description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="why_heartgrams_corrections_description" id="corrections_description" rows="2" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm">{{ old('why_heartgrams_corrections_description', $content['corrections_description']) }}</textarea>
                    </div>
                    
                    <h4 class="font-medium text-gray-900 mt-6 mb-2 border-b pb-2">Bullet Points</h4>
                    @for($i = 1; $i <= 3; $i++)
                        <div>
                            <label for="corrections_bullet_{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">Bullet Point {{ $i }}</label>
                            <input type="text" name="why_heartgrams_corrections_bullet_{{ $i }}" id="corrections_bullet_{{ $i }}" 
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                                value="{{ old('why_heartgrams_corrections_bullet_'.$i, $content['corrections_bullet_'.$i]) }}">
                        </div>
                    @endfor
                </div>
            </div>

            {{-- Founder Story Tab --}}
            <div x-show="activeTab === 'founder'" style="display: none;" class="px-6 py-6 space-y-8 bg-gray-50/50">
                <p class="text-sm text-gray-500 mb-2">The dark maroon section at the bottom of the page.</p>
                <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded text-sm text-blue-700">
                    <p><strong>Note:</strong> You can use standard HTML in the paragraphs below. For example, use <code>&lt;span class="text-[#e6b04e]"&gt;Highlighted Text&lt;/span&gt;</code> to make text gold.</p>
                </div>
                
                <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm space-y-4">
                    <h4 class="font-medium text-gray-900 mb-2 border-b pb-2">Header</h4>
                    <div>
                        <label for="founder_subtitle" class="block text-sm font-medium text-gray-700 mb-1">Small Subtitle</label>
                        <input type="text" name="why_heartgrams_founder_subtitle" id="founder_subtitle" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                            value="{{ old('why_heartgrams_founder_subtitle', $content['founder_subtitle']) }}">
                    </div>
                    <div>
                        <label for="founder_title" class="block text-sm font-medium text-gray-700 mb-1">Main Heading</label>
                        <input type="text" name="why_heartgrams_founder_title" id="founder_title" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                            value="{{ old('why_heartgrams_founder_title', $content['founder_title']) }}">
                    </div>
                    
                    <h4 class="font-medium text-gray-900 mt-8 mb-2 border-b pb-2">Story Paragraphs</h4>
                    @for($i = 1; $i <= 4; $i++)
                        <div>
                            <label for="founder_p{{ $i }}" class="block text-sm font-medium text-gray-700 mb-1">Paragraph {{ $i }}</label>
                            <textarea name="why_heartgrams_founder_p{{ $i }}" id="founder_p{{ $i }}" rows="3" 
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm font-mono">{{ old('why_heartgrams_founder_p'.$i, $content['founder_p'.$i]) }}</textarea>
                        </div>
                    @endfor

                    <h4 class="font-medium text-gray-900 mt-8 mb-2 border-b pb-2">Quote Block</h4>
                    <div>
                        <label for="founder_quote" class="block text-sm font-medium text-gray-700 mb-1">Quote Text</label>
                        <textarea name="why_heartgrams_founder_quote" id="founder_quote" rows="2" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm">{{ old('why_heartgrams_founder_quote', $content['founder_quote']) }}</textarea>
                    </div>
                    <div>
                        <label for="founder_quote_author" class="block text-sm font-medium text-gray-700 mb-1">Quote Author</label>
                        <input type="text" name="why_heartgrams_founder_quote_author" id="founder_quote_author" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                            value="{{ old('why_heartgrams_founder_quote_author', $content['founder_quote_author']) }}">
                    </div>
                </div>
            </div>

            {{-- SEO Settings Tab --}}
            <div x-show="activeTab === 'seo'" class="px-6 py-6 space-y-6" style="display: none;">
                <p class="text-sm text-gray-500 mb-6">Add raw HTML meta tags, schema markup, or tracking scripts to the head of this page.</p>
                
                <div>
                    <label for="seo_tags" class="block text-sm font-medium text-gray-700 mb-1">Custom SEO Tags (Raw HTML/Meta/Schema)</label>
                    <textarea id="seo_tags" name="why_heartgrams_seo_tags" rows="6" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm font-mono" placeholder="<meta name=&quot;description&quot; content=&quot;...&quot;>">{{ old('why_heartgrams_seo_tags', $content['seo_tags'] ?? '') }}</textarea>
                </div>
            </div>

            {{-- CTA Tab --}}
            <div x-show="activeTab === 'cta'" style="display: none;" class="px-6 py-6 space-y-8 bg-gray-50/50">
                <p class="text-sm text-gray-500 mb-2">The final call to action section at the bottom of the page.</p>
                
                <div class="bg-white border border-gray-200 rounded-lg p-5 shadow-sm space-y-4">
                    <h4 class="font-medium text-gray-900 mb-2 border-b pb-2">Header</h4>
                    <div>
                        <label for="cta_subtitle" class="block text-sm font-medium text-gray-700 mb-1">Small Subtitle</label>
                        <input type="text" name="why_heartgrams_cta_subtitle" id="cta_subtitle" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                            value="{{ old('why_heartgrams_cta_subtitle', $content['cta_subtitle']) }}">
                    </div>
                    <div>
                        <label for="cta_title" class="block text-sm font-medium text-gray-700 mb-1">Main Heading</label>
                        <input type="text" name="why_heartgrams_cta_title" id="cta_title" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                            value="{{ old('why_heartgrams_cta_title', $content['cta_title']) }}">
                    </div>
                    <div>
                        <label for="cta_description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="why_heartgrams_cta_description" id="cta_description" rows="2" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm">{{ old('why_heartgrams_cta_description', $content['cta_description']) }}</textarea>
                    </div>

                    <h4 class="font-medium text-gray-900 mt-8 mb-2 border-b pb-2">Primary Button</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="cta_button_1_text" class="block text-sm font-medium text-gray-700 mb-1">Button Text</label>
                            <input type="text" name="why_heartgrams_cta_button_1_text" id="cta_button_1_text" 
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                                value="{{ old('why_heartgrams_cta_button_1_text', $content['cta_button_1_text']) }}">
                        </div>
                        <div>
                            <label for="cta_button_1_link" class="block text-sm font-medium text-gray-700 mb-1">Button Link</label>
                            <input type="text" name="why_heartgrams_cta_button_1_link" id="cta_button_1_link" 
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                                value="{{ old('why_heartgrams_cta_button_1_link', $content['cta_button_1_link']) }}">
                        </div>
                    </div>

                    <h4 class="font-medium text-gray-900 mt-8 mb-2 border-b pb-2">Secondary Button (WhatsApp)</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="cta_button_2_text" class="block text-sm font-medium text-gray-700 mb-1">Button Text</label>
                            <input type="text" name="why_heartgrams_cta_button_2_text" id="cta_button_2_text" 
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                                value="{{ old('why_heartgrams_cta_button_2_text', $content['cta_button_2_text']) }}">
                        </div>
                        <div>
                            <label for="cta_button_2_link" class="block text-sm font-medium text-gray-700 mb-1">Button Link</label>
                            <input type="text" name="why_heartgrams_cta_button_2_link" id="cta_button_2_link" 
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm"
                                value="{{ old('why_heartgrams_cta_button_2_link', $content['cta_button_2_link']) }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end">
                <button type="submit" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-[#c02d4b] hover:bg-[#a62540] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition-colors">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
