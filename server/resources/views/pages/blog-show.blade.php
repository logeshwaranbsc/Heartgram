<x-public-layout :seoTags="$post->seo_tags ?? ''">
    <div class="pt-20 sm:pt-28 pb-12 sm:pb-24 bg-brand-light min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <a href="{{ route('blog') }}" class="inline-flex items-center text-sm font-medium text-brand-dark/60 hover:text-[#c02d4b] transition-colors mb-6 sm:mb-8">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Blog
            </a>
            
            <div class="text-center mb-8 sm:mb-12">
                <p class="text-[12px] font-bold text-[#c02d4b] uppercase tracking-[0.15em] mb-3 sm:mb-4">{{ $post->created_at->format('F d, Y') }}</p>
                <h1 class="font-serif text-2xl sm:text-4xl md:text-5xl lg:text-6xl text-brand-dark mb-4 sm:mb-6 leading-tight">
                    {{ $post->title }}
                </h1>
            </div>

            @if($post->image)
                <div class="w-full aspect-[16/9] sm:aspect-[21/9] rounded-2xl sm:rounded-3xl overflow-hidden mb-8 sm:mb-12 shadow-xl">
                    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                </div>
            @else
                <div class="w-full aspect-[16/9] sm:aspect-[21/9] rounded-2xl sm:rounded-3xl overflow-hidden mb-8 sm:mb-12 shadow-xl bg-gradient-to-br from-pink-100 to-rose-200 flex items-center justify-center relative">
                    <svg class="w-24 h-24 text-[#c02d4b] opacity-10 absolute" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                </div>
            @endif

            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-[0_8px_30px_rgba(200,50,100,0.06)] p-5 sm:p-8 md:p-12">
                <div class="prose prose-lg prose-pink max-w-none mx-auto ck-content">
                    {!! $post->content !!}
                </div>
            </div>

        </div>
    </div>
    
    <style>
        .ck-content h1 { font-size: 2.25em; font-family: 'Playfair Display', serif; color: #1f111c; font-weight: 700; margin-top: 1.5em; margin-bottom: 0.5em; }
        .ck-content h2 { font-size: 1.75em; font-family: 'Playfair Display', serif; color: #1f111c; font-weight: 700; margin-top: 1.5em; margin-bottom: 0.5em; }
        .ck-content h3 { font-size: 1.25em; font-weight: bold; color: #1f111c; margin-top: 1.5em; margin-bottom: 0.5em; }
        .ck-content p { color: #4b5563; margin-bottom: 1.25em; line-height: 1.8; }
        .ck-content ul { list-style-type: disc; padding-left: 1.5em; margin-bottom: 1.25em; color: #4b5563; }
        .ck-content ol { list-style-type: decimal; padding-left: 1.5em; margin-bottom: 1.25em; color: #4b5563; }
        .ck-content li { margin-bottom: 0.5em; }
        .ck-content a { color: #c02d4b; text-decoration: underline; }
        .ck-content a:hover { color: #9f253e; }
        .ck-content blockquote { border-left: 4px solid #c02d4b; margin: 1.5em 0; padding: 0.5em 1.5em; font-style: italic; color: #6b7280; background: #fdf2f8; border-radius: 0 0.5rem 0.5rem 0; }
        .ck-content strong { font-weight: 600; color: #1f111c; }
    </style>
</x-public-layout>
