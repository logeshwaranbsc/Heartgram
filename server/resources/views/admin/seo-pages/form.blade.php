<x-admin-layout>
    <x-slot name="header">
        {{ $page->exists ? 'Edit SEO Page: ' . $page->name : 'Create New SEO Page' }}
    </x-slot>

    <div class="max-w-5xl mx-auto space-y-6">
        <div class="flex justify-between items-center">
            <a href="{{ route('admin.seo-pages.index') }}" class="text-gray-500 hover:text-gray-700 font-medium text-sm flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to SEO Pages
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

        <form action="{{ $page->exists ? route('admin.seo-pages.update', $page) : route('admin.seo-pages.store') }}" method="POST" class="bg-white shadow rounded-lg overflow-hidden">
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
                            Hero & Audio
                        </button>
                        <button type="button" @click="activeTab = 'diff'" 
                                :class="activeTab === 'diff' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                                class="whitespace-nowrap pb-3 pt-2 px-4 text-sm font-medium rounded-t-lg transition-colors">
                            Why Different
                        </button>
                        <button type="button" @click="activeTab = 'features'" 
                                :class="activeTab === 'features' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                                class="whitespace-nowrap pb-3 pt-2 px-4 text-sm font-medium rounded-t-lg transition-colors">
                            Features & Process
                        </button>
                        <button type="button" @click="activeTab = 'pricing_faq'" 
                                :class="activeTab === 'pricing_faq' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                                class="whitespace-nowrap pb-3 pt-2 px-4 text-sm font-medium rounded-t-lg transition-colors">
                            Pricing & FAQ
                        </button>
                        <button type="button" @click="activeTab = 'seo_article'" 
                                :class="activeTab === 'seo_article' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                                class="whitespace-nowrap pb-3 pt-2 px-4 text-sm font-medium rounded-t-lg transition-colors">
                            SEO Article
                        </button>
                        <button type="button" @click="activeTab = 'seo'" 
                                :class="activeTab === 'seo' ? 'border-b-2 border-pink-500 text-pink-600 bg-white' : 'border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:bg-gray-100'"
                                class="whitespace-nowrap pb-3 pt-2 px-4 text-sm font-medium rounded-t-lg transition-colors">
                            SEO Tags
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
                            <span class="text-gray-500 mr-2 bg-gray-100 px-3 py-2 rounded border border-gray-300">{{ url('/') }}/</span>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $page->slug) }}" class="flex-1 border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="flex items-center mt-4">
                        <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $page->is_published) ? 'checked' : '' }} class="h-4 w-4 text-pink-600 focus:ring-pink-500 border-gray-300 rounded">
                        <label for="is_published" class="ml-2 block text-sm text-gray-900">Publish this page</label>
                    </div>
                </div>

                {{-- SEO Tags Tab --}}
                <div x-show="activeTab === 'seo'" x-cloak style="display: none;" class="px-6 py-6 space-y-6">
                    <p class="text-sm text-gray-500 mb-6">Add raw HTML meta tags, schema markup, or tracking scripts to the head of this page.</p>
                    
                    <div>
                        <label for="seo_tags" class="block text-sm font-medium text-gray-700 mb-1">Custom SEO Tags (Raw HTML/Meta/Schema)</label>
                        <textarea id="seo_tags" name="seo_tags" rows="6" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm font-mono" placeholder="<meta name=&quot;description&quot; content=&quot;...&quot;>">{{ old('seo_tags', $page->seo_tags) }}</textarea>
                    </div>
                </div>

                {{-- Hero & Audio Tab --}}
                <div x-show="activeTab === 'hero'" class="px-6 py-6 space-y-6" style="display: none;">
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Hero Tag</label>
                            <input type="text" name="hero_tag" value="{{ old('hero_tag', $content['hero_tag'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Hero Title (Use HTML for italics/breaks)</label>
                            <input type="text" name="hero_title" value="{{ old('hero_title', $content['hero_title'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Hero Description</label>
                            <textarea name="hero_desc" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">{{ old('hero_desc', $content['hero_desc'] ?? '') }}</textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Button 1 Text</label>
                            <input type="text" name="hero_btn1" value="{{ old('hero_btn1', $content['hero_btn1'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Button 2 Text</label>
                            <input type="text" name="hero_btn2" value="{{ old('hero_btn2', $content['hero_btn2'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                        </div>

                        <div class="sm:col-span-2 pt-4 border-t border-gray-200 mt-4">
                            <h4 class="text-sm font-semibold text-gray-900 mb-4">Hero Audio Card</h4>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Audio Tag</label>
                            <input type="text" name="hero_audio_tag" value="{{ old('hero_audio_tag', $content['hero_audio_tag'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Audio Title</label>
                            <input type="text" name="hero_audio_title" value="{{ old('hero_audio_title', $content['hero_audio_title'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Audio Quote</label>
                            <input type="text" name="hero_audio_quote" value="{{ old('hero_audio_quote', $content['hero_audio_quote'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">MP3 Link</label>
                            <input type="text" name="hero_audio_mp3" value="{{ old('hero_audio_mp3', $content['hero_audio_mp3'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                        </div>
                    </div>
                </div>

                {{-- Why Different Tab --}}
                <div x-show="activeTab === 'diff'" class="px-6 py-6 space-y-6" style="display: none;">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Section Tag</label>
                        <input type="text" name="diff_tag" value="{{ old('diff_tag', $content['diff_tag'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="diff_title" value="{{ old('diff_title', $content['diff_title'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Left Paragraph</label>
                        <textarea name="diff_left_p" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">{{ old('diff_left_p', $content['diff_left_p'] ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Right Paragraph 1 (Use HTML for bolding)</label>
                        <textarea name="diff_right_p1" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">{{ old('diff_right_p1', $content['diff_right_p1'] ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Right Paragraph 2 (Use HTML for bolding)</label>
                        <textarea name="diff_right_p2" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">{{ old('diff_right_p2', $content['diff_right_p2'] ?? '') }}</textarea>
                    </div>
                </div>

                {{-- Features & Process Tab --}}
                <div x-show="activeTab === 'features'" class="px-6 py-6 space-y-6" style="display: none;">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Features Section Tag</label>
                        <input type="text" name="reach_tag" value="{{ old('reach_tag', $content['reach_tag'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Features Title</label>
                        <input type="text" name="reach_title" value="{{ old('reach_title', $content['reach_title'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Features Description</label>
                        <textarea name="reach_desc" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">{{ old('reach_desc', $content['reach_desc'] ?? '') }}</textarea>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-3 pt-4">
                        @for($i=1; $i<=3; $i++)
                        <div class="p-4 bg-gray-50 border rounded-lg">
                            <label class="block text-xs font-bold text-gray-700 mb-2">Feature {{ $i }}</label>
                            <input type="text" name="reach_feat{{ $i }}_title" placeholder="Title" value="{{ old('reach_feat'.$i.'_title', $content['reach_feat'.$i.'_title'] ?? '') }}" class="mb-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                            <textarea name="reach_feat{{ $i }}_desc" placeholder="Description" rows="3" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">{{ old('reach_feat'.$i.'_desc', $content['reach_feat'.$i.'_desc'] ?? '') }}</textarea>
                        </div>
                        @endfor
                    </div>

                    <div class="border-t pt-6 mt-6">
                        <h4 class="font-bold text-gray-900 mb-4">Process Section</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Process Tag</label>
                                <input type="text" name="process_tag" value="{{ old('process_tag', $content['process_tag'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Process Title</label>
                                <input type="text" name="process_title" value="{{ old('process_title', $content['process_title'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2 lg:grid-cols-4 pt-4 mt-4">
                            @for($i=1; $i<=4; $i++)
                            <div class="p-4 bg-gray-50 border rounded-lg">
                                <label class="block text-xs font-bold text-gray-700 mb-2">Step {{ $i }}</label>
                                <input type="text" name="process_{{ $i }}_title" placeholder="Title" value="{{ old('process_'.$i.'_title', $content['process_'.$i.'_title'] ?? '') }}" class="mb-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                                <textarea name="process_{{ $i }}_desc" placeholder="Description" rows="3" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">{{ old('process_'.$i.'_desc', $content['process_'.$i.'_desc'] ?? '') }}</textarea>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>

                {{-- Pricing & FAQ Tab --}}
                <div x-show="activeTab === 'pricing_faq'" class="px-6 py-6 space-y-6" style="display: none;">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Pricing Title</label>
                        <input type="text" name="pricing_title" value="{{ old('pricing_title', $content['pricing_title'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Pricing Description</label>
                        <input type="text" name="pricing_desc" value="{{ old('pricing_desc', $content['pricing_desc'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                    </div>

                    <div class="border-t pt-6 mt-6">
                        <h4 class="font-bold text-gray-900 mb-4">FAQ Section</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">FAQ Tag</label>
                                <input type="text" name="faq_tag" value="{{ old('faq_tag', $content['faq_tag'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">FAQ Title</label>
                                <input type="text" name="faq_title" value="{{ old('faq_title', $content['faq_title'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-y-6 mt-4">
                            @for($i=1; $i<=6; $i++)
                            <div class="p-4 bg-gray-50 border rounded-lg">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Question {{ $i }}</label>
                                <input type="text" name="faq_{{ $i }}_q" value="{{ old('faq_'.$i.'_q', $content['faq_'.$i.'_q'] ?? '') }}" class="mb-3 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                                
                                <label class="block text-sm font-medium text-gray-700 mb-1">Answer {{ $i }}</label>
                                <textarea name="faq_{{ $i }}_a" rows="2" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">{{ old('faq_'.$i.'_a', $content['faq_'.$i.'_a'] ?? '') }}</textarea>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>

                {{-- SEO Article Tab --}}
                <div x-show="activeTab === 'seo_article'" class="px-6 py-6 space-y-6" style="display: none;">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Article Tag</label>
                        <input type="text" name="seo_article_tag" value="{{ old('seo_article_tag', $content['seo_article_tag'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Article Title</label>
                        <input type="text" name="seo_article_title" value="{{ old('seo_article_title', $content['seo_article_title'] ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Article Content (HTML)</label>
                        <p class="text-xs text-gray-500 mb-2">Use &lt;h3&gt; for subheadings, &lt;p&gt; for paragraphs, and &lt;strong&gt; for bold text.</p>
                        <textarea name="seo_article_html" id="seo_article_html" rows="20" class="mt-1 block w-full font-mono border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">{{ old('seo_article_html', $content['seo_article_html'] ?? '') }}</textarea>
                    </div>
                </div>

            </div>

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-pink-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-700 focus:outline-none focus:border-pink-900 focus:ring ring-pink-300 disabled:opacity-25 transition ease-in-out duration-150">
                    {{ $page->exists ? 'Update SEO Page' : 'Create SEO Page' }}
                </button>
            </div>
        </form>
    </div>
@push('scripts')
<style>
    .ck-editor__editable_inline {
        min-height: 400px;
    }
    /* Override Tailwind resets inside the editor */
    .ck-content h1 {
        font-size: 2em;
        font-weight: bold;
        margin: 0.67em 0;
    }
    .ck-content h2 {
        font-size: 1.5em;
        font-weight: bold;
        margin: 0.83em 0;
    }
    .ck-content h3 {
        font-size: 1.17em;
        font-weight: bold;
        margin: 1em 0;
    }
    .ck-content ul {
        list-style-type: disc;
        padding-left: 40px;
        margin: 1em 0;
    }
    .ck-content ol {
        list-style-type: decimal;
        padding-left: 40px;
        margin: 1em 0;
    }
    .ck-content a {
        color: #db2777;
        text-decoration: underline;
    }
    .ck-content blockquote {
        border-left: 4px solid #ccc;
        margin: 1.5em 10px;
        padding: 0.5em 10px;
        color: #555;
    }
</style>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create(document.querySelector('#seo_article_html'), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                    ]
                }
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endpush
</x-admin-layout>
