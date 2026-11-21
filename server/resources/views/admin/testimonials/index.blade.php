<x-admin-layout>
    <x-slot name="header">
        Testimonials & Reviews
    </x-slot>

    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Testimonials & Reviews</h2>
                <p class="text-sm text-gray-500 mt-1">Manage customer reactions, WhatsApp messages, and Cloudinary video reviews.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('testimonials') }}" target="_blank" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-xs font-semibold text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                    <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    View Live Page
                </a>
                <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center px-4 py-2 bg-[#c02d4b] border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-wider hover:bg-[#9f253e] transition-colors shadow-sm">
                    + Add New Testimonial
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border border-green-300 text-green-800 px-4 py-3 rounded-xl flex items-center justify-between" role="alert">
                <span class="text-sm font-medium">{{ session('success') }}</span>
                <span class="text-green-600 font-bold">✓</span>
            </div>
        @endif

        @if(session('warning'))
            <div class="bg-amber-50 border border-amber-300 text-amber-900 p-4 rounded-xl flex items-start gap-3" role="alert">
                <span class="text-xl">⚠️</span>
                <div class="text-sm">
                    <p class="font-bold mb-1">Database Table Missing</p>
                    <p>{{ session('warning') }}</p>
                </div>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50/80">
                        <tr>
                            <th scope="col" class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Type / Media</th>
                            <th scope="col" class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Client & Occasion</th>
                            <th scope="col" class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Cloudinary Video / Content</th>
                            <th scope="col" class="px-6 py-3.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Rating</th>
                            <th scope="col" class="px-6 py-3.5 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Order</th>
                            <th scope="col" class="px-6 py-3.5 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3.5 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($testimonials as $item)
                            <tr class="hover:bg-gray-50/60 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="relative h-12 w-12 rounded-xl bg-gray-100 border border-gray-200 overflow-hidden shrink-0 flex items-center justify-center">
                                            @if($item->media)
                                                <img src="{{ $item->media_url }}" alt="{{ $item->name }}" class="h-full w-full object-cover">
                                            @else
                                                <div class="text-xl">
                                                    @if($item->type === 'video') 🎥 @elseif($item->type === 'image') 📸 @else 💬 @endif
                                                </div>
                                            @endif
                                            @if($item->type === 'video')
                                                <div class="absolute inset-0 bg-black/20 flex items-center justify-center">
                                                    <svg class="w-4 h-4 text-white drop-shadow" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider 
                                                @if($item->type === 'video') bg-red-50 text-red-700 border border-red-200
                                                @elseif($item->type === 'text') bg-emerald-50 text-emerald-700 border border-emerald-200
                                                @else bg-amber-50 text-amber-700 border border-amber-200 @endif">
                                                {{ ucfirst($item->type) }}
                                            </span>
                                            @if($item->tag)
                                                <div class="text-[11px] text-gray-500 mt-0.5 truncate max-w-[100px]">{{ $item->tag }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-sm font-bold text-gray-900">{{ $item->name }}</div>
                                    <div class="text-xs text-[#c02d4b] font-medium">{{ $item->occasion ?? 'Personalized Song' }}</div>
                                    @if($item->location)
                                        <div class="text-[11px] text-gray-400 mt-0.5">📍 {{ $item->location }}</div>
                                    @endif
                                </td>

                                <td class="px-6 py-4 max-w-xs">
                                    @if($item->video_url)
                                        <div class="flex items-center gap-1.5 mb-1">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded bg-blue-50 text-blue-700 text-[11px] font-medium border border-blue-200">
                                                ☁️ Cloudinary Video
                                            </span>
                                            <a href="{{ $item->video_url }}" target="_blank" class="text-xs text-blue-600 hover:text-blue-800 underline truncate max-w-[140px]" title="{{ $item->video_url }}">
                                                {{ $item->video_url }}
                                            </a>
                                        </div>
                                    @endif
                                    @if($item->title)
                                        <div class="text-xs font-semibold text-gray-800 truncate">{{ $item->title }}</div>
                                    @endif
                                    @if($item->text)
                                        <div class="text-xs text-gray-500 line-clamp-2 mt-0.5">{{ $item->text }}</div>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex text-amber-400 text-xs">
                                        @for($i = 1; $i <= 5; $i++)
                                            <span>{{ $i <= ($item->rating ?? 5) ? '★' : '☆' }}</span>
                                        @endfor
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center text-xs font-semibold text-gray-600">
                                    {{ $item->sort_order }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($item->is_published)
                                        <span class="px-2.5 py-1 inline-flex text-xs leading-4 font-semibold rounded-full bg-green-100 text-green-800 border border-green-200">
                                            Published
                                        </span>
                                    @else
                                        <span class="px-2.5 py-1 inline-flex text-xs leading-4 font-semibold rounded-full bg-gray-100 text-gray-600 border border-gray-200">
                                            Draft
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.testimonials.edit', $item->id) }}" class="p-1.5 text-gray-500 hover:text-[#c02d4b] hover:bg-pink-50 rounded-lg transition-colors" title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        </a>
                                        <form action="{{ route('admin.testimonials.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this testimonial?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Delete">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                    <div class="max-w-sm mx-auto">
                                        <div class="text-4xl mb-3">💬</div>
                                        <h3 class="text-base font-bold text-gray-800">No Testimonials Yet</h3>
                                        <p class="text-xs text-gray-500 mt-1 mb-4">Add your first video reaction with a Cloudinary URL or a WhatsApp text review.</p>
                                        <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center px-4 py-2 bg-[#c02d4b] text-white rounded-lg text-xs font-semibold hover:bg-[#9f253e]">
                                            + Add Testimonial
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
