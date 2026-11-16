@php
    $whatsappNumber = '919999999999';
@endphp

{{-- Final CTA Band --}}
<section class="bg-cream border-t border-cream-300 py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="border border-maroon-900/20 text-maroon-900 px-4 py-1.5 rounded-full text-[11px] font-semibold tracking-widest uppercase inline-block mb-6">READY WHEN YOU ARE</span>
        <h2 class="font-display text-3xl sm:text-4xl font-semibold text-maroon-900 mb-6">Some feelings deserve more than a message.</h2>
        <p class="text-ink-800/70 mb-10 text-[15px]">Turn your memory into a song they can keep, replay, and feel again.</p>
        
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3.5 sm:gap-4">
            <a href="{{ url('/') }}#start" class="w-full sm:w-auto inline-flex items-center justify-center bg-crimson-600 hover:bg-crimson-700 text-white font-semibold px-8 py-3.5 sm:py-4 rounded-full text-[15px] transition-all transform hover:scale-105 shadow-md">
                Start My Song Story &rarr;
            </a>
            <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Hi! I\'d like to create a Heartgram.') }}"
               target="_blank"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 sm:py-4 rounded-full font-medium text-[15px] border border-cream-300 bg-white text-ink-900 hover:border-crimson-300 transition-colors shadow-sm">
                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                Chat on WhatsApp
            </a>
        </div>
    </div>
</section>
