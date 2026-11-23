<x-admin-layout>
    <x-slot name="header">Lead Details</x-slot>

    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('admin.leads') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
            <svg class="mr-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Back to Leads
        </a>
        <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this lead from {{ addslashes($lead->name) }}? This cannot be undone.');">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex items-center px-3 py-1.5 border border-red-200 text-xs font-semibold rounded-lg text-red-600 bg-red-50 hover:bg-red-100 hover:text-red-700 transition-colors shadow-2xs">
                <svg class="mr-1.5 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                Delete Lead
            </button>
        </form>
    </div>

    <div class="bg-white shadow-sm border border-gray-200 rounded-xl overflow-hidden max-w-4xl">
        <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Lead Information
            </h3>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                New
            </span>
        </div>
        <div class="px-6 py-5">
            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-8">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Source</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        @if($lead->source == 'song_story')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-800">Song Story</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Contact Form</span>
                        @endif
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Chosen Plan</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        @if($lead->plan)
                            @if(strtolower($lead->plan) === 'premium')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-purple-100 text-purple-800 border border-purple-200">
                                    <svg class="w-3.5 h-3.5 text-purple-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.98 2.98 0 0113 13a2.99 2.99 0 01-.88 2.12z" clip-rule="evenodd"/></svg>
                                    Heartgram Premium
                                </span>
                            @elseif(strtolower($lead->plan) === 'classic')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-200">
                                    <svg class="w-3.5 h-3.5 text-amber-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    Heartgram Classic
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-pink-100 text-pink-800 border border-pink-200">
                                    Heartgram {{ $lead->plan }}
                                </span>
                            @endif
                        @else
                            <span class="text-gray-400 font-normal">Not specified</span>
                        @endif
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Submitted On</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $lead->created_at->format('F j, Y, g:i a') }}</dd>
                </div>
                @if($lead->song_language)
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Song Language</dt>
                        <dd class="mt-1 text-sm font-semibold text-gray-900">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                {{ $lead->song_language }}
                            </span>
                        </dd>
                    </div>
                @endif
                
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Name</dt>
                    <dd class="mt-1 text-sm font-semibold text-gray-900">{{ $lead->name }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Email Address</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        @if($lead->email)
                            <a href="mailto:{{ $lead->email }}" class="text-brand-pink hover:underline">{{ $lead->email }}</a>
                        @else
                            <span class="text-gray-400">Not provided</span>
                        @endif
                    </dd>
                </div>
                
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">WhatsApp Number</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        @if($lead->whatsapp_number)
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->whatsapp_number) }}" target="_blank" class="text-green-600 hover:underline flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                                {{ $lead->whatsapp_number }}
                            </a>
                        @else
                            <span class="text-gray-400">Not provided</span>
                        @endif
                    </dd>
                </div>
                
                @if($lead->source == 'song_story')
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Occasion</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $lead->occasion ?? 'Not specified' }}</dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Occasion Date</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $lead->occasion_date ?? 'Not specified' }}</dd>
                    </div>
                @endif
                
                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">Message / Story</dt>
                    <dd class="mt-2 text-sm text-gray-900 bg-gray-50 rounded-lg p-4 whitespace-pre-wrap border border-gray-100">{{ $lead->story_or_message ?? 'No message provided.' }}</dd>
                </div>

                @if(!empty($lead->attachments) && count($lead->attachments) > 0)
                    <div class="sm:col-span-2 pt-4 border-t border-gray-200">
                        <dt class="text-sm font-semibold text-gray-900 flex items-center gap-2 mb-3">
                            <svg class="w-4 h-4 text-brand-pink" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                            <span>Uploaded Story Materials ({{ count($lead->attachments) }})</span>
                        </dt>
                        <dd class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($lead->attachments as $file)
                                <div class="bg-gray-50 border border-gray-200 rounded-xl p-3 flex flex-col justify-between hover:border-brand-pink/50 hover:shadow-xs transition">
                                    @if($file['is_image'])
                                        <div class="h-36 w-full rounded-lg overflow-hidden bg-gray-100 mb-2 relative group border border-gray-100">
                                            <img src="{{ $file['url'] }}" alt="{{ $file['name'] }}" class="w-full h-full object-cover">
                                            <a href="{{ $file['url'] }}" target="_blank" class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-xs font-semibold gap-1.5 backdrop-blur-xs">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                Open Image
                                            </a>
                                        </div>
                                    @elseif($file['is_audio'])
                                        <div class="mb-2 p-2.5 bg-pink-50/60 border border-pink-100 rounded-lg">
                                            <div class="text-xs font-semibold text-brand-pink mb-1.5 flex items-center gap-1.5">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                                </svg>
                                                Audio Recording
                                            </div>
                                            <audio controls class="w-full h-8" preload="metadata">
                                                <source src="{{ $file['url'] }}">
                                                Audio playback not supported.
                                            </audio>
                                        </div>
                                    @elseif($file['is_video'])
                                        <div class="mb-2 rounded-lg overflow-hidden bg-black max-h-40">
                                            <video controls class="w-full h-36 object-contain" preload="metadata">
                                                <source src="{{ $file['url'] }}">
                                            </video>
                                        </div>
                                    @else
                                        <div class="h-28 w-full rounded-lg bg-gray-100 flex flex-col items-center justify-center mb-2 text-gray-400 border border-gray-200">
                                            <svg class="w-8 h-8 text-gray-400 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <span class="text-[11px] uppercase font-bold text-gray-500">{{ $file['extension'] ?: 'File' }}</span>
                                        </div>
                                    @endif

                                    <div class="flex items-center justify-between text-xs mt-auto pt-2 border-t border-gray-100">
                                        <span class="truncate font-medium text-gray-700 max-w-[170px]" title="{{ $file['name'] }}">
                                            {{ $file['name'] }}
                                        </span>
                                        <a href="{{ $file['url'] }}" target="_blank" download="{{ $file['name'] }}" class="text-brand-pink hover:text-pink-700 font-semibold flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                            Download
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </dd>
                    </div>
                @endif
            </dl>
        </div>
    </div>
</x-admin-layout>
