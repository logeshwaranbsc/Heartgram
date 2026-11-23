<x-admin-layout>
    <x-slot name="header">Leads Management</x-slot>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-xl flex items-center justify-between shadow-xs">
            <div class="flex items-center gap-2.5">
                <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-sm font-medium text-green-800">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Collected Leads</h1>
            <p class="text-sm text-gray-500 mt-1">View and manage submissions from the Start Your Song and Contact forms.</p>
        </div>
        <div class="bg-white px-4 py-2 rounded-lg border border-gray-200 shadow-xs text-sm font-medium text-gray-600 flex items-center gap-2 self-start sm:self-auto">
            <span class="w-2 h-2 rounded-full bg-green-500"></span>
            Total Leads: {{ $leads->count() }}
        </div>
    </div>

    <div class="bg-white shadow-xs border border-gray-200 rounded-xl overflow-hidden">
        <div class="overflow-x-auto w-full max-w-full">
            <table class="w-full min-w-[950px] divide-y divide-gray-200 table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="w-[130px] px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                        <th scope="col" class="w-[100px] px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Source</th>
                        <th scope="col" class="w-[110px] px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Plan</th>
                        <th scope="col" class="w-[180px] px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Contact Details</th>
                        <th scope="col" class="w-[130px] px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Occasion</th>
                        <th scope="col" class="min-w-[190px] max-w-[250px] px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Message/Story</th>
                        <th scope="col" class="w-[80px] px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="w-[140px] px-4 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider sticky right-0 bg-gray-50 shadow-[-4px_0_6px_-2px_rgba(0,0,0,0.06)]">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($leads as $lead)
                        <tr class="hover:bg-gray-50/70 transition-colors group">
                            <td class="px-4 py-3.5 whitespace-nowrap text-xs text-gray-500">
                                <div>{{ $lead->created_at->format('M d, Y') }}</div>
                                <div class="text-[11px] text-gray-400 mt-0.5">{{ $lead->created_at->format('h:i A') }}</div>
                            </td>
                            <td class="px-4 py-3.5 whitespace-nowrap">
                                @if($lead->source == 'song_story')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-800">
                                        Song Story
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Contact Form
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3.5 whitespace-nowrap">
                                @if($lead->plan)
                                    @if(strtolower($lead->plan) === 'premium')
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-purple-50 text-purple-800 border border-purple-200" title="Heartgram Premium">
                                            <svg class="w-3 h-3 text-purple-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.98 2.98 0 0113 13a2.99 2.99 0 01-.88 2.12z" clip-rule="evenodd"/></svg>
                                            Premium
                                        </span>
                                    @elseif(strtolower($lead->plan) === 'classic')
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-50 text-amber-800 border border-amber-200" title="Heartgram Classic">
                                            <svg class="w-3 h-3 text-amber-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                            Classic
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-pink-50 text-pink-800 border border-pink-200">
                                            {{ $lead->plan }}
                                        </span>
                                    @endif
                                @else
                                    <span class="text-xs text-gray-400 font-normal">-</span>
                                @endif
                            </td>
                            <td class="px-4 py-3.5 text-xs">
                                <div class="font-semibold text-gray-900 truncate max-w-[190px]">{{ $lead->name }}</div>
                                @if($lead->email)
                                    <div class="text-gray-500 truncate max-w-[190px] mt-0.5">
                                        <a href="mailto:{{ $lead->email }}" class="hover:underline text-gray-600 hover:text-brand-pink">{{ $lead->email }}</a>
                                    </div>
                                @endif
                                @if($lead->whatsapp_number)
                                    <div class="mt-0.5">
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->whatsapp_number) }}" target="_blank" class="text-green-600 hover:underline inline-flex items-center gap-1 font-medium">
                                            <svg class="w-3 h-3 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                                            {{ $lead->whatsapp_number }}
                                        </a>
                                    </div>
                                @endif
                            </td>
                            <td class="px-4 py-3.5 whitespace-nowrap text-xs">
                                @if($lead->occasion)
                                    <div class="font-medium text-gray-900">{{ $lead->occasion }}</div>
                                @endif
                                @if($lead->occasion_date)
                                    <div class="text-gray-500 text-[11px] mt-0.5">Date: {{ $lead->occasion_date }}</div>
                                @endif
                                @if(!$lead->occasion && !$lead->occasion_date)
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-4 py-3.5">
                                <div class="max-w-[260px] space-y-1">
                                    @if(!empty($lead->attachments) && count($lead->attachments) > 0)
                                        <div>
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[10.5px] font-semibold bg-pink-50 text-brand-pink border border-pink-100">
                                                <svg class="w-3 h-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg>
                                                {{ count($lead->attachments) }} file(s)
                                            </span>
                                        </div>
                                    @endif
                                    <p class="text-xs text-gray-600 line-clamp-2 break-words leading-relaxed" title="{{ $lead->story_or_message }}">
                                        {{ $lead->summary_text }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-4 py-3.5 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-green-100 text-green-800">
                                    New
                                </span>
                            </td>
                            <td class="px-4 py-3.5 whitespace-nowrap text-right text-xs font-medium sticky right-0 bg-white group-hover:bg-gray-50/70 transition-colors shadow-[-4px_0_6px_-2px_rgba(0,0,0,0.06)]">
                                <div class="flex items-center justify-end gap-1.5">
                                    <a href="{{ route('admin.leads.show', $lead->id) }}" class="inline-flex items-center px-2.5 py-1.5 border border-pink-200 text-xs font-semibold rounded-lg text-brand-pink bg-pink-50 hover:bg-pink-100 transition-colors" title="View details">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                        View
                                    </a>
                                    <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('Permanently delete lead from {{ addslashes($lead->name) }}? This cannot be undone.');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-2 py-1.5 border border-red-200 text-xs font-semibold rounded-lg text-red-600 bg-red-50 hover:bg-red-100 hover:text-red-700 transition-colors" title="Delete lead">
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center text-gray-500 text-sm">
                                No leads collected yet. Submit a form on the website to see it here!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
