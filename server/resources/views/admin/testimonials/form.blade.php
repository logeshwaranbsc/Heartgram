<x-admin-layout>
    <x-slot name="header">
        {{ $testimonial->exists ? 'Edit Testimonial' : 'Create Testimonial' }}
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center text-xs font-semibold text-gray-500 hover:text-gray-800 transition-colors mb-2">
                    ← Back to Testimonials List
                </a>
                <h2 class="text-2xl font-bold text-gray-800">
                    {{ $testimonial->exists ? 'Edit Testimonial: ' . $testimonial->name : 'New Testimonial & Review' }}
                </h2>
            </div>
            @if($testimonial->exists && $testimonial->video_url)
                <a href="{{ $testimonial->video_url }}" target="_blank" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-blue-50 text-blue-700 text-xs font-semibold hover:bg-blue-100 transition-colors">
                    <span>Preview Cloudinary Video ↗</span>
                </a>
            @endif
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-300 text-red-800 px-4 py-3 rounded-xl text-sm font-medium">
                <p class="font-bold mb-1">Please fix the following errors:</p>
                <ul class="list-disc list-inside text-xs space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form 
            action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial->id) : route('admin.testimonials.store') }}" 
            method="POST" 
            enctype="multipart/form-data" 
            x-data="{ 
                type: '{{ old('type', $testimonial->type ?? 'video') }}',
                videoUrl: '{{ old('video_url', $testimonial->video_url ?? '') }}'
            }"
            class="space-y-6">
            @csrf
            @if($testimonial->exists)
                @method('PUT')
            @endif

            {{-- 1. TYPE SELECTOR (PRIMARY CLASSIFICATION) --}}
            <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm space-y-4">
                <h3 class="font-bold text-gray-900 text-sm uppercase tracking-wider flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#c02d4b]"></span>
                    1. Review Category & Type
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <label 
                        @click="type = 'video'"
                        :class="type === 'video' ? 'border-[#c02d4b] bg-pink-50/40 ring-2 ring-[#c02d4b]/20 text-[#c02d4b]' : 'border-gray-200 hover:border-gray-300 text-gray-700'"
                        class="relative flex flex-col p-4 border rounded-xl cursor-pointer transition-all">
                        <input type="radio" name="type" value="video" x-model="type" class="sr-only">
                        <span class="text-2xl mb-1">🎥</span>
                        <span class="font-bold text-sm">Video Reaction</span>
                        <span class="text-xs text-gray-500 mt-0.5">Cloudinary video link with instant player</span>
                    </label>

                    <label 
                        @click="type = 'text'"
                        :class="type === 'text' ? 'border-emerald-600 bg-emerald-50/40 ring-2 ring-emerald-600/20 text-emerald-700' : 'border-gray-200 hover:border-gray-300 text-gray-700'"
                        class="relative flex flex-col p-4 border rounded-xl cursor-pointer transition-all">
                        <input type="radio" name="type" value="text" x-model="type" class="sr-only">
                        <span class="text-2xl mb-1">💬</span>
                        <span class="font-bold text-sm">Text / WhatsApp</span>
                        <span class="text-xs text-gray-500 mt-0.5">Chat bubble review with time & verification</span>
                    </label>

                    <label 
                        @click="type = 'image'"
                        :class="type === 'image' ? 'border-amber-600 bg-amber-50/40 ring-2 ring-amber-600/20 text-amber-700' : 'border-gray-200 hover:border-gray-300 text-gray-700'"
                        class="relative flex flex-col p-4 border rounded-xl cursor-pointer transition-all">
                        <input type="radio" name="type" value="image" x-model="type" class="sr-only">
                        <span class="text-2xl mb-1">📸</span>
                        <span class="font-bold text-sm">Photo Keepsake</span>
                        <span class="text-xs text-gray-500 mt-0.5">Framed plaque, vinyl or unboxing moment</span>
                    </label>
                </div>
            </div>

            {{-- 2. VIDEO SETTINGS (CLOUDINARY) --}}
            <div 
                x-show="type === 'video'" 
                x-transition 
                class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm space-y-4">
                <div class="flex items-center justify-between border-b pb-3">
                    <h3 class="font-bold text-gray-900 text-sm uppercase tracking-wider flex items-center gap-2">
                        <span class="text-blue-600">☁️</span>
                        2. Cloudinary Video URL
                    </h3>
                    <span class="text-xs text-gray-400">Renders HTML5 Video Player</span>
                </div>

                <div>
                    <label for="video_url" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                        Cloudinary Video URL (MP4 / WebM / HLS)
                    </label>
                    <input 
                        type="url" 
                        name="video_url" 
                        id="video_url" 
                        x-model="videoUrl"
                        placeholder="https://res.cloudinary.com/your-cloud-name/video/upload/v123456789/reaction.mp4" 
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#c02d4b] focus:ring-[#c02d4b] text-sm py-2.5 px-3">
                    <p class="text-xs text-gray-500 mt-1.5 leading-relaxed">
                        Paste the direct Cloudinary video link (e.g., <code class="bg-gray-100 px-1 py-0.5 rounded text-pink-700">https://res.cloudinary.com/.../video/upload/....mp4</code>). When visitors click this review, it will render and play directly in the interactive modal.
                    </p>
                </div>

                {{-- Live preview hint if URL is entered --}}
                <div x-show="videoUrl && videoUrl.length > 10" class="p-3 bg-blue-50/70 rounded-xl border border-blue-200 text-xs text-blue-900 flex items-center justify-between">
                    <span class="truncate mr-2">Link added: <strong x-text="videoUrl"></strong></span>
                    <a :href="videoUrl" target="_blank" class="shrink-0 font-bold underline hover:text-blue-700">Test Video Link ↗</a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div>
                        <label for="duration" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                            Video Duration (Optional)
                        </label>
                        <input 
                            type="text" 
                            name="duration" 
                            id="duration" 
                            value="{{ old('duration', $testimonial->duration ?? '0:48 min') }}" 
                            placeholder="e.g. 0:48 min" 
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#c02d4b] focus:ring-[#c02d4b] text-sm py-2.5 px-3">
                    </div>

                    <div>
                        <label for="tag" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                            Reaction Tag (Optional)
                        </label>
                        <input 
                            type="text" 
                            name="tag" 
                            id="tag" 
                            value="{{ old('tag', $testimonial->tag ?? 'Happy Tears 😭') }}" 
                            placeholder="e.g. Happy Tears 😭, Proposal 💍" 
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#c02d4b] focus:ring-[#c02d4b] text-sm py-2.5 px-3">
                    </div>
                </div>
            </div>

            {{-- 3. CLIENT DETAILS & REVIEW CONTENT --}}
            <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm space-y-4">
                <h3 class="font-bold text-gray-900 text-sm uppercase tracking-wider border-b pb-3 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#c02d4b]"></span>
                    3. Client Details & Reaction Story
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                            Client Name(s) *
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            required 
                            value="{{ old('name', $testimonial->name) }}" 
                            placeholder="e.g. Sarah & Arjun" 
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#c02d4b] focus:ring-[#c02d4b] text-sm py-2.5 px-3">
                    </div>

                    <div>
                        <label for="occasion" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                            Occasion / Event
                        </label>
                        <input 
                            type="text" 
                            name="occasion" 
                            id="occasion" 
                            value="{{ old('occasion', $testimonial->occasion) }}" 
                            placeholder="e.g. 5th Anniversary, Mom's 50th Birthday" 
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#c02d4b] focus:ring-[#c02d4b] text-sm py-2.5 px-3">
                    </div>

                    <div>
                        <label for="title" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                            Catchy Headline / Quote
                        </label>
                        <input 
                            type="text" 
                            name="title" 
                            id="title" 
                            value="{{ old('title', $testimonial->title) }}" 
                            placeholder="e.g. I was literally in tears" 
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#c02d4b] focus:ring-[#c02d4b] text-sm py-2.5 px-3">
                    </div>

                    <div>
                        <label for="location" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                            City / Location
                        </label>
                        <input 
                            type="text" 
                            name="location" 
                            id="location" 
                            value="{{ old('location', $testimonial->location) }}" 
                            placeholder="e.g. Mumbai, Bengaluru, Goa" 
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#c02d4b] focus:ring-[#c02d4b] text-sm py-2.5 px-3">
                    </div>
                </div>

                {{-- Full Text / Review Body --}}
                <div>
                    <label for="text" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                        Review / Story Message *
                    </label>
                    <textarea 
                        name="text" 
                        id="text" 
                        rows="4" 
                        placeholder="Write the heartfelt reaction or what they said about their personalized song..." 
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#c02d4b] focus:ring-[#c02d4b] text-sm py-2.5 px-3 leading-relaxed">{{ old('text', $testimonial->text) }}</textarea>
                </div>

                {{-- Type-specific conditional fields --}}
                <div x-show="type === 'text'" class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 border-t">
                    <div>
                        <label for="channel" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                            Messaging Channel
                        </label>
                        <input 
                            type="text" 
                            name="channel" 
                            id="channel" 
                            value="{{ old('channel', $testimonial->channel ?? 'WhatsApp Message') }}" 
                            placeholder="e.g. WhatsApp Message, iMessage, Instagram DM" 
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#c02d4b] focus:ring-[#c02d4b] text-sm py-2.5 px-3">
                    </div>

                    <div>
                        <label for="time" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                            Timestamp Display
                        </label>
                        <input 
                            type="text" 
                            name="time" 
                            id="time" 
                            value="{{ old('time', $testimonial->time ?? 'Yesterday at 11:42 PM') }}" 
                            placeholder="e.g. Yesterday at 11:42 PM, 3 days ago" 
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#c02d4b] focus:ring-[#c02d4b] text-sm py-2.5 px-3">
                    </div>
                </div>

                <div x-show="type === 'image'" class="pt-2 border-t">
                    <label for="keepsake" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                        Keepsake Item Title
                    </label>
                    <input 
                        type="text" 
                        name="keepsake" 
                        id="keepsake" 
                        value="{{ old('keepsake', $testimonial->keepsake ?? 'Framed Acrylic Plaque + QR Code') }}" 
                        placeholder="e.g. Framed Acrylic Plaque + QR Code, Custom Vinyl Record Sleeve" 
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#c02d4b] focus:ring-[#c02d4b] text-sm py-2.5 px-3">
                </div>
            </div>

            {{-- 4. MEDIA & THUMBNAIL (CLOUDINARY IMAGE OR FILE UPLOAD) --}}
            <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm space-y-4">
                <h3 class="font-bold text-gray-900 text-sm uppercase tracking-wider border-b pb-3 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#c02d4b]"></span>
                    4. Cover Image / Card Thumbnail
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-start">
                    <div>
                        <label for="media" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                            Option A: Cloudinary / External Image URL
                        </label>
                        <input 
                            type="text" 
                            name="media" 
                            id="media" 
                            value="{{ old('media', $testimonial->media) }}" 
                            placeholder="https://res.cloudinary.com/.../image/upload/thumbnail.jpg" 
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#c02d4b] focus:ring-[#c02d4b] text-sm py-2.5 px-3">
                        <p class="text-xs text-gray-400 mt-1">Or a local path like <code class="text-gray-600">images/anniversary.png</code></p>
                        
                        <div class="my-4 text-center text-xs font-bold text-gray-400 uppercase tracking-widest">— OR —</div>

                        <label for="media_file" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                            Option B: Upload Image File (PNG, JPG, WEBP)
                        </label>
                        <input 
                            type="file" 
                            name="media_file" 
                            id="media_file" 
                            accept="image/*" 
                            class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-pink-50 file:text-[#c02d4b] hover:file:bg-pink-100 cursor-pointer">
                    </div>

                    {{-- Current Media Preview --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                            Current Preview
                        </label>
                        <div class="h-40 w-full rounded-xl border border-gray-200 bg-gray-50 overflow-hidden flex items-center justify-center">
                            @if($testimonial->media)
                                <img src="{{ $testimonial->media_url }}" alt="Preview" class="h-full w-full object-cover">
                            @else
                                <div class="text-center text-gray-400 p-4">
                                    <svg class="w-8 h-8 mx-auto mb-1 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span class="text-xs">No thumbnail specified yet</span>
                                </div>
                            @endif
                        </div>
                        @if($testimonial->exists && $testimonial->media)
                            <label class="mt-2 inline-flex items-center text-xs text-red-600 hover:text-red-800 cursor-pointer">
                                <input type="checkbox" name="remove_media" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500 mr-1.5">
                                Remove existing image
                            </label>
                        @endif
                    </div>
                </div>

                {{-- Audio sample (Optional preview) --}}
                <div class="pt-4 border-t">
                    <label for="audio" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                        Song Audio Sample (Optional URL or Path)
                    </label>
                    <input 
                        type="text" 
                        name="audio" 
                        id="audio" 
                        value="{{ old('audio', $testimonial->audio) }}" 
                        placeholder="e.g. audio/sample_anniversary.wav or https://..." 
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#c02d4b] focus:ring-[#c02d4b] text-sm py-2.5 px-3">
                </div>
            </div>

            {{-- 5. SETTINGS & PUBLISHING --}}
            <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm space-y-4">
                <h3 class="font-bold text-gray-900 text-sm uppercase tracking-wider border-b pb-3 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#c02d4b]"></span>
                    5. Ranking & Status
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                    <div>
                        <label for="rating" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                            Star Rating (1-5)
                        </label>
                        <select name="rating" id="rating" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#c02d4b] focus:ring-[#c02d4b] text-sm py-2.5 px-3">
                            @for($i = 5; $i >= 1; $i--)
                                <option value="{{ $i }}" {{ old('rating', $testimonial->rating ?? 5) == $i ? 'selected' : '' }}>
                                    {{ $i }} Stars ({{ str_repeat('★', $i) }})
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div>
                        <label for="sort_order" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">
                            Sort Display Order
                        </label>
                        <input 
                            type="number" 
                            name="sort_order" 
                            id="sort_order" 
                            value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}" 
                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#c02d4b] focus:ring-[#c02d4b] text-sm py-2.5 px-3">
                        <span class="text-[11px] text-gray-400">Lowest numbers appear first (0, 1, 2...)</span>
                    </div>

                    <div class="sm:pt-5">
                        <label class="relative flex items-center cursor-pointer select-none">
                            <input 
                                type="checkbox" 
                                name="is_published" 
                                value="1" 
                                {{ old('is_published', $testimonial->is_published ?? true) ? 'checked' : '' }}
                                class="w-5 h-5 text-[#c02d4b] border-gray-300 rounded focus:ring-[#c02d4b]">
                            <span class="ml-2.5 text-sm font-bold text-gray-800">
                                Visible on Live Website
                            </span>
                        </label>
                    </div>
                </div>
            </div>

            {{-- FORM ACTION BUTTONS --}}
            <div class="flex items-center justify-end gap-3 pt-4">
                <a href="{{ route('admin.testimonials.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-300 text-xs font-bold text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-7 py-2.5 rounded-xl bg-[#c02d4b] hover:bg-[#9f253e] text-white text-xs font-bold shadow-lg shadow-pink-500/20 hover:scale-102 transition-all">
                    {{ $testimonial->exists ? 'Save Changes' : 'Create Testimonial' }}
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
