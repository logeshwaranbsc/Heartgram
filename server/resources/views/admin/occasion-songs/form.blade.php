<x-admin-layout>
    <x-slot name="header">
        {{ $song->exists ? 'Edit Occasion: ' . $song->title : 'Add New Occasion Song' }}
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <a href="{{ route('admin.occasion-songs.index') }}" class="inline-flex items-center text-xs font-semibold text-gray-500 hover:text-gray-800 transition-colors mb-2">
                    ← Back to Occasion Songs List
                </a>
                <h2 class="text-2xl font-bold text-gray-800">
                    {{ $song->exists ? 'Edit Occasion: ' . $song->title : 'New Occasion Song' }}
                </h2>
            </div>
            @if($song->exists && $song->audio)
                <a href="{{ $song->audio }}" target="_blank" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-pink-50 text-[#c02d4b] text-xs font-semibold hover:bg-pink-100 transition-colors">
                    <span>Listen Audio ↗</span>
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
            action="{{ $song->exists ? route('admin.occasion-songs.update', $song->id) : route('admin.occasion-songs.store') }}" 
            method="POST" 
            x-data="{ 
                audioUrl: '{{ old('audio', $song->audio ?? '') }}',
                imageUrl: '{{ old('image', $song->image ?? '') }}'
            }"
            class="space-y-6">
            @csrf
            @if($song->exists)
                @method('PUT')
            @endif

            {{-- 1. Occasion Identifiers --}}
            <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm space-y-4">
                <h3 class="font-bold text-gray-900 text-sm uppercase tracking-wider flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#c02d4b]"></span>
                    Occasion Identification
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Occasion ID (Slug) *</label>
                        <input 
                            type="text" 
                            name="occasion_id" 
                            value="{{ old('occasion_id', $song->occasion_id) }}" 
                            required 
                            placeholder="e.g. birthday, proposal, wedding"
                            class="w-full text-sm rounded-xl border-gray-300 focus:border-[#c02d4b] focus:ring focus:ring-[#c02d4b]/20 px-4 py-2.5 font-mono"
                        >
                        <p class="text-[11px] text-gray-500 mt-1">Unique identifier matching the frontend card ID.</p>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Display Title *</label>
                        <input 
                            type="text" 
                            name="title" 
                            value="{{ old('title', $song->title) }}" 
                            required 
                            placeholder="e.g. Birthday, Proposal, Valentine's Day"
                            class="w-full text-sm rounded-xl border-gray-300 focus:border-[#c02d4b] focus:ring focus:ring-[#c02d4b]/20 px-4 py-2.5"
                        >
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Uppercase Tag</label>
                        <input 
                            type="text" 
                            name="uppercase" 
                            value="{{ old('uppercase', $song->uppercase) }}" 
                            placeholder="e.g. BIRTHDAY (leave blank to auto-generate)"
                            class="w-full text-sm rounded-xl border-gray-300 focus:border-[#c02d4b] focus:ring focus:ring-[#c02d4b]/20 px-4 py-2.5"
                        >
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Subtitle / Tagline</label>
                        <input 
                            type="text" 
                            name="subtitle" 
                            value="{{ old('subtitle', $song->subtitle) }}" 
                            placeholder="e.g. Make their day truly unforgettable"
                            class="w-full text-sm rounded-xl border-gray-300 focus:border-[#c02d4b] focus:ring focus:ring-[#c02d4b]/20 px-4 py-2.5"
                        >
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Category Filter</label>
                        <select 
                            name="category" 
                            class="w-full text-sm rounded-xl border-gray-300 focus:border-[#c02d4b] focus:ring focus:ring-[#c02d4b]/20 px-4 py-2.5"
                        >
                            <option value="milestones" {{ old('category', $song->category) === 'milestones' ? 'selected' : '' }}>Milestones / Birthdays & Friends</option>
                            <option value="love" {{ old('category', $song->category) === 'love' ? 'selected' : '' }}>Love & Romance</option>
                            <option value="family" {{ old('category', $song->category) === 'family' ? 'selected' : '' }}>Parents & Family</option>
                            <option value="heartfelt" {{ old('category', $song->category) === 'heartfelt' ? 'selected' : '' }}>Heartfelt / Apology & Memories</option>
                            <option value="corporate" {{ old('category', $song->category) === 'corporate' ? 'selected' : '' }}>Corporate</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Language Badge</label>
                        <input 
                            type="text" 
                            name="language" 
                            value="{{ old('language', $song->language ?? 'English') }}" 
                            placeholder="e.g. English, Tamil, Hindi, Telugu, Malayalam"
                            class="w-full text-sm rounded-xl border-gray-300 focus:border-[#c02d4b] focus:ring focus:ring-[#c02d4b]/20 px-4 py-2.5"
                        >
                    </div>
                </div>
            </div>

            {{-- 2. Cloudinary Audio URL Stream --}}
            <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm space-y-4">
                <h3 class="font-bold text-gray-900 text-sm uppercase tracking-wider flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    Cloudinary Audio Stream
                </h3>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Cloudinary Audio URL</label>
                    <input 
                        type="url" 
                        name="audio" 
                        x-model="audioUrl"
                        value="{{ old('audio', $song->audio) }}" 
                        placeholder="https://res.cloudinary.com/your-cloud/video/upload/v1234567/sample.mp3"
                        class="w-full text-sm rounded-xl border-gray-300 focus:border-[#c02d4b] focus:ring focus:ring-[#c02d4b]/20 px-4 py-2.5 font-mono"
                    >
                    <p class="text-[11px] text-gray-500 mt-1">Upload your audio file to Cloudinary and paste the Direct Delivery URL here (.mp3, .wav, .m4a, etc.). Leave blank to use the site's default audio.</p>
                </div>

                {{-- Live Audio Preview --}}
                <div x-show="audioUrl" class="p-4 bg-gray-50 rounded-xl border border-gray-200 space-y-2">
                    <div class="text-xs font-semibold text-gray-700 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Live Audio Player Preview:
                    </div>
                    <audio x-bind:src="audioUrl" controls class="w-full h-9"></audio>
                </div>
            </div>

            {{-- 3. Thumbnail Image & Visuals --}}
            <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm space-y-4">
                <h3 class="font-bold text-gray-900 text-sm uppercase tracking-wider flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                    Card Thumbnail & Sorting
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Image URL</label>
                        <input 
                            type="url" 
                            name="image" 
                            x-model="imageUrl"
                            value="{{ old('image', $song->image) }}" 
                            placeholder="https://images.unsplash.com/..."
                            class="w-full text-sm rounded-xl border-gray-300 focus:border-[#c02d4b] focus:ring focus:ring-[#c02d4b]/20 px-4 py-2.5 font-mono"
                        >
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="h-16 w-16 rounded-xl bg-gray-100 border border-gray-200 overflow-hidden shrink-0 flex items-center justify-center">
                            <template x-if="imageUrl">
                                <img :src="imageUrl" alt="Preview" class="h-full w-full object-cover">
                            </template>
                            <template x-if="!imageUrl">
                                <span class="text-gray-400 text-xs">No img</span>
                            </template>
                        </div>
                        <div class="text-[11px] text-gray-500">Thumbnail Preview</div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Sort Order</label>
                        <input 
                            type="number" 
                            name="sort_order" 
                            value="{{ old('sort_order', $song->sort_order ?? 0) }}" 
                            class="w-full text-sm rounded-xl border-gray-300 focus:border-[#c02d4b] focus:ring focus:ring-[#c02d4b]/20 px-4 py-2.5"
                        >
                    </div>

                    <div class="flex items-center pt-6">
                        <label class="inline-flex items-center cursor-pointer">
                            <input 
                                type="checkbox" 
                                name="is_active" 
                                value="1" 
                                {{ old('is_active', $song->is_active ?? true) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-[#c02d4b] shadow-sm focus:border-[#c02d4b] focus:ring focus:ring-[#c02d4b]/20 h-5 w-5"
                            >
                            <span class="ml-2.5 text-sm font-semibold text-gray-800">Card is Active & Visible</span>
                        </label>
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center justify-end gap-3 pt-4">
                <a href="{{ route('admin.occasion-songs.index') }}" class="px-5 py-2.5 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-7 py-2.5 bg-[#c02d4b] hover:bg-[#9f253e] text-white rounded-xl text-sm font-semibold transition-colors shadow-sm">
                    {{ $song->exists ? 'Update Occasion Song' : 'Create Occasion Song' }}
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
