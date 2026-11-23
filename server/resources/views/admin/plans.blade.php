<x-admin-layout>
    <x-slot name="header">Plans & Pricing</x-slot>

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
            <h1 class="text-2xl font-bold text-gray-900">Plans & Pricing Management</h1>
            <p class="text-sm text-gray-500 mt-1">Set the amounts, names, and badges for Heartgram song tiers displayed across the website.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ url('/') }}#plan-and-form-container" target="_blank" class="inline-flex items-center px-3.5 py-2 border border-gray-300 shadow-2xs text-xs font-semibold rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
                View on Site
            </a>
        </div>
    </div>

    <form action="{{ route('admin.plans.update') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- CLASSIC PLAN CARD --}}
            <div class="bg-white rounded-2xl border-2 border-pink-100 shadow-xs overflow-hidden flex flex-col justify-between">
                <div class="p-6 border-b border-pink-50 bg-gradient-to-r from-pink-50/50 to-white">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-[11px] font-bold tracking-widest text-[#c02d4b] uppercase">Standard Tier</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-pink-100 text-[#c02d4b] font-semibold">Classic</span>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">Heartgram Classic</h2>
                    <p class="text-xs text-gray-500 mt-0.5">Settings for the standard personal gift plan.</p>
                </div>

                <div class="p-6 space-y-4 flex-1">
                    {{-- Price Amount --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Plan Price Amount <span class="text-red-500">*</span>
                        </label>
                        <div class="relative rounded-lg shadow-2xs">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                                <span class="text-lg font-bold text-gray-700">₹</span>
                            </div>
                            <input 
                                type="text" 
                                name="classic_price" 
                                value="{{ old('classic_price', $plans['classic_price']) }}" 
                                required
                                placeholder="1,999" 
                                class="block w-full rounded-lg border-gray-300 pl-8 pr-3 py-2.5 text-lg font-bold text-gray-900 focus:border-[#c02d4b] focus:ring-[#c02d4b] sm:text-lg"
                            >
                        </div>
                        <p class="text-[11px] text-gray-400 mt-1">E.g., 1,999 or 2499. The ₹ symbol is added automatically.</p>
                    </div>

                    {{-- Plan Name --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Display Title / Name</label>
                        <input 
                            type="text" 
                            name="classic_name" 
                            value="{{ old('classic_name', $plans['classic_name']) }}" 
                            required
                            class="block w-full rounded-lg border-gray-300 py-2 px-3 text-sm text-gray-900 focus:border-[#c02d4b] focus:ring-[#c02d4b]"
                        >
                    </div>

                    {{-- Subtitle --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Top Subtitle (Uppercase)</label>
                        <input 
                            type="text" 
                            name="classic_subtitle" 
                            value="{{ old('classic_subtitle', $plans['classic_subtitle']) }}" 
                            class="block w-full rounded-lg border-gray-300 py-2 px-3 text-sm text-gray-900 focus:border-[#c02d4b] focus:ring-[#c02d4b]"
                            placeholder="FOR HEARTFELT PERSONAL GIFTS"
                        >
                    </div>

                    {{-- Delivery Description --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Delivery Timeline</label>
                        <input 
                            type="text" 
                            name="classic_delivery" 
                            value="{{ old('classic_delivery', $plans['classic_delivery']) }}" 
                            class="block w-full rounded-lg border-gray-300 py-2 px-3 text-sm text-gray-900 focus:border-[#c02d4b] focus:ring-[#c02d4b]"
                            placeholder="3–5 days delivery time"
                        >
                    </div>

                    {{-- Tagline / Fee Note --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Price Note / Fee Clarification</label>
                        <input 
                            type="text" 
                            name="classic_tagline" 
                            value="{{ old('classic_tagline', $plans['classic_tagline']) }}" 
                            class="block w-full rounded-lg border-gray-300 py-2 px-3 text-sm text-gray-900 focus:border-[#c02d4b] focus:ring-[#c02d4b]"
                            placeholder="all-inclusive · no hidden fees"
                        >
                    </div>
                </div>
            </div>

            {{-- PREMIUM PLAN CARD --}}
            <div class="bg-white rounded-2xl border-2 border-amber-200/80 shadow-xs overflow-hidden flex flex-col justify-between">
                <div class="p-6 border-b border-amber-100 bg-gradient-to-r from-amber-50/70 via-pink-50/30 to-white">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-[11px] font-bold tracking-widest text-[#B45309] uppercase">Express / Deeper Tier</span>
                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-gradient-to-r from-amber-200 to-amber-300 text-amber-950 font-bold border border-amber-300/80">Most Recommended</span>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">Heartgram Premium</h2>
                    <p class="text-xs text-gray-500 mt-0.5">Settings for the express emotional arc plan.</p>
                </div>

                <div class="p-6 space-y-4 flex-1">
                    {{-- Price Amount --}}
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Plan Price Amount <span class="text-red-500">*</span>
                        </label>
                        <div class="relative rounded-lg shadow-2xs">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                                <span class="text-lg font-bold text-[#B45309]">₹</span>
                            </div>
                            <input 
                                type="text" 
                                name="premium_price" 
                                value="{{ old('premium_price', $plans['premium_price']) }}" 
                                required
                                placeholder="2,999" 
                                class="block w-full rounded-lg border-gray-300 pl-8 pr-3 py-2.5 text-lg font-bold text-gray-900 focus:border-amber-500 focus:ring-amber-500 sm:text-lg"
                            >
                        </div>
                        <p class="text-[11px] text-gray-400 mt-1">E.g., 2,999 or 3499. The ₹ symbol is added automatically.</p>
                    </div>

                    {{-- Plan Name --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Display Title / Name</label>
                        <input 
                            type="text" 
                            name="premium_name" 
                            value="{{ old('premium_name', $plans['premium_name']) }}" 
                            required
                            class="block w-full rounded-lg border-gray-300 py-2 px-3 text-sm text-gray-900 focus:border-amber-500 focus:ring-amber-500"
                        >
                    </div>

                    {{-- Top Badge --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Gold Badge Banner</label>
                        <input 
                            type="text" 
                            name="premium_badge" 
                            value="{{ old('premium_badge', $plans['premium_badge']) }}" 
                            class="block w-full rounded-lg border-gray-300 py-2 px-3 text-sm text-gray-900 focus:border-amber-500 focus:ring-amber-500"
                            placeholder="MOST RECOMMENDED"
                        >
                    </div>

                    {{-- Subtitle --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Top Subtitle (Uppercase)</label>
                        <input 
                            type="text" 
                            name="premium_subtitle" 
                            value="{{ old('premium_subtitle', $plans['premium_subtitle']) }}" 
                            class="block w-full rounded-lg border-gray-300 py-2 px-3 text-sm text-gray-900 focus:border-amber-500 focus:ring-amber-500"
                            placeholder="FOR DEEPER EMOTIONAL STORIES"
                        >
                    </div>

                    {{-- Delivery Description --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Delivery Timeline</label>
                        <input 
                            type="text" 
                            name="premium_delivery" 
                            value="{{ old('premium_delivery', $plans['premium_delivery']) }}" 
                            class="block w-full rounded-lg border-gray-300 py-2 px-3 text-sm text-gray-900 focus:border-amber-500 focus:ring-amber-500"
                            placeholder="1–2 days express delivery"
                        >
                    </div>

                    {{-- Tagline / Fee Note --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Price Note / Fee Clarification</label>
                        <input 
                            type="text" 
                            name="premium_tagline" 
                            value="{{ old('premium_tagline', $plans['premium_tagline']) }}" 
                            class="block w-full rounded-lg border-gray-300 py-2 px-3 text-sm text-gray-900 focus:border-amber-500 focus:ring-amber-500"
                            placeholder="all-inclusive · no hidden fees"
                        >
                    </div>
                </div>
            </div>
        </div>

        {{-- SAVE BUTTON BAR --}}
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-xs flex items-center justify-between">
            <p class="text-xs text-gray-500">
                All changes take effect immediately across all website booking sections.
            </p>
            <button 
                type="submit" 
                class="inline-flex items-center px-6 py-2.5 bg-[#c02d4b] text-white text-sm font-semibold rounded-lg hover:bg-[#a62540] transition-colors shadow-sm cursor-pointer"
            >
                <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                Save Pricing Changes
            </button>
        </div>
    </form>
</x-admin-layout>
