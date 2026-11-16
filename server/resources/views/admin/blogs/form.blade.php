<x-admin-layout>
    <x-slot name="header">
        {{ $post->exists ? 'Edit Blog Post' : 'Create Blog Post' }}
    </x-slot>

    <div class="space-y-6 max-w-4xl">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">{{ $post->exists ? 'Edit Post' : 'New Post' }}</h2>
            <a href="{{ route('admin.blogs.index') }}" class="text-gray-500 hover:text-gray-700 font-medium text-sm flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to list
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-md mb-4">
                <ul class="list-disc pl-5 space-y-1 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ $post->exists ? route('admin.blogs.update', $post) : route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded-lg overflow-hidden">
            @csrf
            @if($post->exists)
                @method('PUT')
            @endif

            <div class="px-6 py-6 space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Blog Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                </div>
                
                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">URL Slug</label>
                    <div class="flex items-center">
                        <span class="text-gray-500 mr-2 bg-gray-100 px-3 py-2 rounded border border-gray-300">{{ url('/blog') }}/</span>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}" class="flex-1 border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">
                    </div>
                </div>
                
                <!-- Image -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Featured Image</label>
                    @if($post->image)
                        <div class="mb-3">
                            <img src="{{ Storage::url($post->image) }}" class="h-32 object-cover rounded shadow-sm border border-gray-200">
                            <div class="mt-2 flex items-center">
                                <input type="checkbox" name="remove_image" id="remove_image" value="1" class="rounded border-gray-300 text-red-600 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                <label for="remove_image" class="ml-2 text-sm text-red-600">Remove current image</label>
                            </div>
                        </div>
                    @endif
                    <input type="file" name="image" id="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-pink-50 file:text-pink-700 hover:file:bg-pink-100 border border-gray-300 rounded-md p-2">
                    <p class="text-xs text-gray-500 mt-1">Recommended size: 1200x800px. Max 5MB.</p>
                </div>
                
                <!-- Content (CKEditor) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Blog Content</label>
                    <textarea name="content" id="blog_content" rows="20" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm">{{ old('content', $post->content) }}</textarea>
                </div>
                
                <!-- SEO Tags -->
                <div>
                    <label for="seo_tags" class="block text-sm font-medium text-gray-700 mb-1">Custom SEO Tags (Raw HTML/Meta/Schema)</label>
                    <textarea id="seo_tags" name="seo_tags" rows="4" class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm font-mono" placeholder="<meta name=&quot;description&quot; content=&quot;...&quot;>">{{ old('seo_tags', $post->seo_tags) }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Add raw HTML meta tags, schema markup, or tracking scripts to the head of this page.</p>
                </div>
                
                <!-- Publish Toggle -->
                <div class="flex items-center pt-4 border-t border-gray-100">
                    <input type="checkbox" name="is_published" id="is_published" value="1" class="rounded border-gray-300 text-pink-600 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 w-5 h-5" {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
                    <label for="is_published" class="ml-3 block text-sm font-medium text-gray-900">
                        Publish this blog post
                        <span class="block text-gray-500 text-xs font-normal mt-0.5">If unchecked, it will only be visible via preview links.</span>
                    </label>
                </div>
            </div>
            
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end">
                <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-pink-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-pink-700 focus:outline-none focus:border-pink-900 focus:ring ring-pink-300 disabled:opacity-25 transition ease-in-out duration-150 shadow-sm">
                    {{ $post->exists ? 'Update Blog Post' : 'Save Blog Post' }}
                </button>
            </div>
        </form>
    </div>

    @push('scripts')
    <style>
        .ck-editor__editable_inline {
            min-height: 500px;
        }
        .ck-content h1 { font-size: 2em; font-weight: bold; margin: 0.67em 0; }
        .ck-content h2 { font-size: 1.5em; font-weight: bold; margin: 0.83em 0; }
        .ck-content h3 { font-size: 1.17em; font-weight: bold; margin: 1em 0; }
        .ck-content ul { list-style-type: disc; padding-left: 40px; margin: 1em 0; }
        .ck-content ol { list-style-type: decimal; padding-left: 40px; margin: 1em 0; }
        .ck-content a { color: #db2777; text-decoration: underline; }
        .ck-content blockquote { border-left: 4px solid #ccc; margin: 1.5em 10px; padding: 0.5em 10px; color: #555; }
    </style>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector('#blog_content'), {
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
