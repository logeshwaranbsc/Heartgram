<x-admin-layout>
    <x-slot name="header">Dashboard</x-slot>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Welcome to Admin Panel</h1>
        <p class="text-gray-500 text-sm mt-1">Here is what's happening with Heartgrams today.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {{-- Stat Card 1 --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Leads</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $totalLeads ?? 0 }}</h3>
                </div>
                <div class="w-12 h-12 rounded-full bg-pink-50 flex items-center justify-center text-pink-600">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                </div>
            </div>
        </div>

        {{-- Stat Card 2 --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">New This Week</p>
                    <h3 class="text-3xl font-bold text-gray-900">{{ $recentLeads ?? 0 }}</h3>
                </div>
                <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 text-center mt-12">
        <h2 class="text-lg font-bold text-gray-900 mb-2">Ready to grow?</h2>
        <p class="text-gray-500 text-sm mb-6 max-w-lg mx-auto">This dashboard layout is ready for whatever features you want to add next—sales tracking, user management, or order processing.</p>
        <a href="{{ route('admin.leads') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-[#c02d4b] text-white font-medium text-sm rounded-lg hover:bg-[#a62540] transition-colors shadow-sm">
            View All Leads
        </a>
    </div>
</x-admin-layout>
