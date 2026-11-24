<x-admin-layout>
    <x-slot name="header">
        Occasion Showcase Songs (Cloudinary Audio)
    </x-slot>

    <div class="space-y-6">
        {{-- Header Section --}}
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Occasion Showcase Songs</h2>
                <p class="text-sm text-gray-500 mt-1">Manage Cloudinary audio streams and card details for the 14 interactive occasions on the Occasions page.</p>
            </div>
            <div class="flex flex-wrap items-center gap-2.5">
                <a href="{{ route('occasions') }}" target="_blank" class="inline-flex items-center px-3.5 py-2 border border-gray-300 rounded-lg text-xs font-semibold text-gray-700 bg-white hover:bg-gray-50 transition-colors shadow-sm">
                    <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    View Occasions Page ↗
                </a>

                @if($hasTable && $songs->count() < 14)
                    <form action="{{ route('admin.occasion-songs.seed') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="inline-flex items-center px-3.5 py-2 bg-pink-50 border border-pink-200 text-[#c02d4b] font-semibold text-xs rounded-lg hover:bg-pink-100 transition-colors">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                            Auto-Populate 14 Categories
                        </button>
                    </form>
                @endif

                <a href="{{ route('admin.occasion-songs.create') }}" class="inline-flex items-center px-4 py-2 bg-[#c02d4b] border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-wider hover:bg-[#9f253e] transition-colors shadow-sm">
                    + Add New Occasion
                </a>
            </div>
        </div>

        {{-- Alerts --}}
        @if(session('success'))
            <div class="bg-green-50 border border-green-300 text-green-800 px-4 py-3 rounded-xl flex items-center justify-between" role="alert">
                <div class="flex items-center gap-2">
                    <span class="text-green-600 font-bold text-lg">✓</span>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border border-red-300 text-red-800 px-4 py-3 rounded-xl text-sm font-medium" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @if(!$hasTable || session('warning'))
            <div class="bg-amber-50 border-2 border-amber-300 text-amber-950 p-5 rounded-2xl shadow-sm space-y-4" role="alert">
                <div class="flex items-start gap-3">
                    <span class="text-2xl shrink-0">⚠️</span>
                    <div class="space-y-1">
                        <h3 class="font-bold text-base text-amber-900">Database Table Required: `occasion_songs`</h3>
                        <p class="text-sm text-amber-800">
                            The table is not yet created in your MySQL database. You can create it in seconds by running the SQL query below in your phpMyAdmin:
                        </p>
                    </div>
                </div>

                <div class="relative bg-gray-900 text-gray-100 rounded-xl p-4 font-mono text-xs overflow-x-auto shadow-inner">
                    <button 
                        type="button" 
                        onclick="copySqlQuery()" 
                        id="copySqlBtn"
                        class="absolute top-3 right-3 px-3 py-1 bg-white/20 hover:bg-white/30 text-white rounded text-xs font-sans font-medium transition-colors"
                    >
                        📋 Copy SQL Query
                    </button>
                    <pre id="sqlQueryBlock" class="whitespace-pre">CREATE TABLE IF NOT EXISTS `occasion_songs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `occasion_id` varchar(100) NOT NULL UNIQUE,
  `title` varchar(255) NOT NULL,
  `uppercase` varchar(255) NULL,
  `subtitle` varchar(255) NULL,
  `category` varchar(100) DEFAULT 'milestones',
  `language` varchar(100) DEFAULT 'English',
  `image` text NULL,
  `audio` text NULL COMMENT 'Cloudinary audio URL or audio asset URL',
  `sort_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX (`category`),
  INDEX (`sort_order`),
  INDEX (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;</pre>
                </div>
            </div>
        @endif

        {{-- Occasion Categories Table --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-4 sm:p-5 border-b border-gray-100 bg-gray-50/50 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                <div>
                    <h3 class="font-bold text-gray-800 text-sm">All 14 Interactive Occasions</h3>
                    <p class="text-xs text-gray-500">Paste your Cloudinary audio URL (e.g. <code class="bg-gray-100 px-1 py-0.5 rounded text-[11px]">https://res.cloudinary.com/.../audio.mp3</code>) directly into any category and click <strong>Save</strong>.</p>
                </div>
                <div class="text-xs font-semibold px-2.5 py-1 bg-pink-100 text-[#c02d4b] rounded-full">
                    {{ $songs->count() }} Occasions Configured
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50/80">
                        <tr>
                            <th scope="col" class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Occasion</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Category</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Language</th>
                            <th scope="col" class="px-5 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[340px]">Cloudinary Audio Stream</th>
                            <th scope="col" class="px-3 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-4 py-3 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($songs as $song)
                            <tr class="hover:bg-gray-50/70 transition-colors">
                                {{-- Occasion Info --}}
                                <td class="px-5 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3">
                                        <div class="relative h-12 w-12 rounded-xl bg-gray-100 border border-gray-200 overflow-hidden shrink-0">
                                            @if($song->image)
                                                <img src="{{ $song->image }}" alt="{{ $song->title }}" class="h-full w-full object-cover">
                                            @else
                                                <div class="h-full w-full flex items-center justify-center text-gray-400">🎵</div>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="font-bold text-gray-900 flex items-center gap-1.5 flex-wrap">
                                                <span>{{ $song->title }}</span>
                                                <code class="text-[10px] bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded font-mono">{{ $song->occasion_id }}</code>
                                                @if(in_array($song->occasion_id, ['love', 'love-and-romance', 'apology', 'birthday', 'proposal', 'anniversary']))
                                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-pink-100 text-[#c02d4b] border border-pink-200" title="This song also plays in the 'Hear our Heartgrams' section on the Homepage">
                                                        ⭐ Homepage Preview
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="text-xs text-gray-500 max-w-xs truncate">{{ $song->subtitle }}</div>
                                        </div>
                                    </div>
                                </td>

                                {{-- Category --}}
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 capitalize">
                                        {{ $song->category ?? 'milestones' }}
                                    </span>
                                </td>

                                {{-- Language --}}
                                <td class="px-4 py-4 whitespace-nowrap text-xs text-gray-600 font-medium">
                                    {{ $song->language ?? 'English' }}
                                </td>

                                {{-- Cloudinary Audio Input & Player Preview --}}
                                <td class="px-5 py-4">
                                    <form action="{{ route('admin.occasion-songs.quick-audio', $song->id) }}" method="POST" class="space-y-2">
                                        @csrf
                                        <div class="flex items-center gap-2">
                                            <div class="relative flex-1">
                                                <input 
                                                    type="url" 
                                                    name="audio" 
                                                    value="{{ $song->audio }}" 
                                                    placeholder="https://res.cloudinary.com/.../audio.mp3"
                                                    class="w-full text-xs rounded-lg border-gray-300 focus:border-[#c02d4b] focus:ring focus:ring-[#c02d4b]/20 px-3 py-1.5 font-mono"
                                                >
                                            </div>
                                            <button 
                                                type="submit" 
                                                class="px-3 py-1.5 bg-[#c02d4b] text-white text-xs font-semibold rounded-lg hover:bg-[#9f253e] transition-colors shrink-0 shadow-sm"
                                            >
                                                Save
                                            </button>
                                        </div>

                                        {{-- Audio Status & Player Preview --}}
                                        <div class="flex items-center gap-3">
                                            @if($song->audio)
                                                <div class="flex items-center gap-2">
                                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[11px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                                        Cloudinary Audio Active
                                                    </span>
                                                    <audio controls preload="none" class="h-7 max-w-[220px]" src="{{ $song->audio }}">
                                                        Your browser does not support audio playback.
                                                    </audio>
                                                </div>
                                            @else
                                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[11px] font-medium bg-gray-100 text-gray-600">
                                                    <span>⚪</span> Using default sample audio
                                                </span>
                                            @endif
                                        </div>
                                    </form>
                                </td>

                                {{-- Status --}}
                                <td class="px-3 py-4 whitespace-nowrap text-center">
                                    @if($song->is_active)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-600">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                {{-- Actions --}}
                                <td class="px-4 py-4 whitespace-nowrap text-right text-xs font-medium">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.occasion-songs.edit', $song->id) }}" class="px-2.5 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-md transition-colors">
                                            Edit Details
                                        </a>
                                        <form action="{{ route('admin.occasion-songs.destroy', $song->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this occasion?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-2 py-1 text-red-500 hover:text-red-700 hover:bg-red-50 rounded transition-colors">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                    <div class="max-w-md mx-auto space-y-3">
                                        <div class="text-4xl">🎵</div>
                                        <div class="text-base font-semibold text-gray-800">No occasion songs found in database</div>
                                        <p class="text-xs text-gray-500">
                                            Click the button below to automatically populate all 14 standard categories with default images, subtitles, and languages.
                                        </p>
                                        <div class="pt-2">
                                            <form action="{{ route('admin.occasion-songs.seed') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="px-5 py-2.5 bg-[#c02d4b] text-white text-xs font-bold uppercase tracking-wider rounded-xl hover:bg-[#9f253e] transition-colors shadow">
                                                    ✨ Seed All 14 Default Occasions Now
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- SQL Reference Accordion Card --}}
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="font-bold text-gray-900 text-sm">Manual SQL Installation Reference</h4>
                    <p class="text-xs text-gray-500">Use this complete SQL script if you want to create and insert all 14 rows directly into MySQL / phpMyAdmin.</p>
                </div>
                <button 
                    type="button" 
                    onclick="copyCompleteSql()" 
                    class="px-3.5 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-xs font-semibold transition-colors"
                >
                    Copy Complete SQL (Table + 14 Rows)
                </button>
            </div>

            <textarea id="completeSqlScript" readonly rows="8" class="w-full text-xs font-mono bg-gray-50 border border-gray-200 rounded-xl p-3.5 text-gray-700 focus:outline-none">CREATE TABLE IF NOT EXISTS `occasion_songs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `occasion_id` varchar(100) NOT NULL UNIQUE,
  `title` varchar(255) NOT NULL,
  `uppercase` varchar(255) NULL,
  `subtitle` varchar(255) NULL,
  `category` varchar(100) DEFAULT 'milestones',
  `language` varchar(100) DEFAULT 'English',
  `image` text NULL,
  `audio` text NULL COMMENT 'Cloudinary audio URL',
  `sort_order` int(11) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX (`category`),
  INDEX (`sort_order`),
  INDEX (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT IGNORE INTO `occasion_songs` (`occasion_id`, `title`, `uppercase`, `subtitle`, `category`, `language`, `image`, `audio`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
('birthday', 'Birthday', 'BIRTHDAY', 'Make their day truly unforgettable', 'milestones', 'English', 'https://images.unsplash.com/photo-1558636508-e0db3814bd1d?q=80&w=400&auto=format&fit=crop', NULL, 1, 1, NOW(), NOW()),
('proposal', 'Proposal', 'PROPOSAL', 'The question of forever and always', 'love', 'Tamil', 'https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?q=80&w=400&auto=format&fit=crop', NULL, 2, 1, NOW(), NOW()),
('valentines-day', 'Valentine’s Day', 'VALENTINE’S DAY', 'Whispered straight from the heart', 'love', 'Hindi', 'https://images.unsplash.com/photo-1518199266791-5375a83190b7?q=80&w=400&auto=format&fit=crop', NULL, 3, 1, NOW(), NOW()),
('wedding', 'Wedding', 'WEDDING', 'The soundtrack to your sacred vows', 'love', 'Telugu', 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=400&auto=format&fit=crop', NULL, 4, 1, NOW(), NOW()),
('love-and-romance', 'Love & Romance', 'LOVE & ROMANCE', 'Every beat written just for you', 'love', 'English', 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?q=80&w=400&auto=format&fit=crop', NULL, 5, 1, NOW(), NOW()),
('friends', 'Friends', 'FRIENDS', 'Laughter, chai & memories we hold', 'milestones', 'Tamil', 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?q=80&w=400&auto=format&fit=crop', NULL, 6, 1, NOW(), NOW()),
('just-for-you', 'Just for You', 'JUST FOR YOU', 'Because you deserve something timeless', 'heartfelt', 'Hindi', 'https://images.unsplash.com/photo-1549465220-1a8b9238cd48?q=80&w=400&auto=format&fit=crop', NULL, 7, 1, NOW(), NOW()),
('anniversary', 'Anniversary', 'ANNIVERSARY', 'Every year a new favorite chapter', 'love', 'Malayalam', 'https://images.unsplash.com/photo-1494774157365-9e04c6720e47?q=80&w=400&auto=format&fit=crop', NULL, 8, 1, NOW(), NOW()),
('memories', 'Memories', 'MEMORIES', 'Preserved forever in sweet melody', 'heartfelt', 'Tamil', 'https://images.unsplash.com/photo-1534447677768-be436bb09401?q=80&w=400&auto=format&fit=crop', NULL, 9, 1, NOW(), NOW()),
('mothers-day', 'Mother’s Day', 'MOTHER’S DAY', 'For the heart that held you first', 'family', 'Tamil', 'https://images.unsplash.com/photo-1544717305-2782549b5136?q=80&w=400&auto=format&fit=crop', NULL, 10, 1, NOW(), NOW()),
('corporate', 'Corporate', 'CORPORATE', 'Honoring dedication & milestones', 'corporate', 'English', 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=400&auto=format&fit=crop', NULL, 11, 1, NOW(), NOW()),
('missing-you', 'Missing You', 'MISSING YOU', 'Counting sunsets until we meet again', 'heartfelt', 'Hindi', 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?q=80&w=400&auto=format&fit=crop', NULL, 12, 1, NOW(), NOW()),
('long-distance', 'Long Distance', 'LONG DISTANCE', 'Two hearts under the same starry sky', 'love', 'English', 'https://images.unsplash.com/photo-1506863530036-1efeddceb993?q=80&w=400&auto=format&fit=crop', NULL, 13, 1, NOW(), NOW()),
('apology', 'Apology', 'APOLOGY', 'For the sorry you couldn\'t say out loud', 'heartfelt', 'Hindi', 'https://images.unsplash.com/photo-1513201099705-a9746e1e201f?q=80&w=400&auto=format&fit=crop', NULL, 14, 1, NOW(), NOW());</textarea>
        </div>
    </div>

    @push('scripts')
    <script>
        function copySqlQuery() {
            const sqlText = document.getElementById('sqlQueryBlock').innerText;
            navigator.clipboard.writeText(sqlText).then(() => {
                const btn = document.getElementById('copySqlBtn');
                btn.innerText = '✓ Copied!';
                setTimeout(() => { btn.innerText = '📋 Copy SQL Query'; }, 2000);
            });
        }

        function copyCompleteSql() {
            const sqlText = document.getElementById('completeSqlScript');
            sqlText.select();
            navigator.clipboard.writeText(sqlText.value).then(() => {
                alert('Complete SQL script copied to clipboard!');
            });
        }
    </script>
    @endpush
</x-admin-layout>
