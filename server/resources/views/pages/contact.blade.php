<x-public-layout>
    <div class="pt-20 sm:pt-28 pb-12 sm:pb-24 bg-brand-light min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 sm:mb-14">
                <h4 class="text-[11px] font-bold tracking-[0.2em] text-[#c02d4b] mb-3 sm:mb-4 uppercase">
                    Get in touch
                </h4>
                <h1 class="font-serif text-3xl sm:text-4xl md:text-5xl text-brand-dark mb-3 sm:mb-4">
                    Let's create something <span class="italic text-[#c02d4b]">beautiful.</span>
                </h1>
                <p class="text-[14px] sm:text-[15px] text-brand-dark/70 font-medium">
                    Have a question? We'd love to hear from you.
                </p>
            </div>

            <div class="bg-white rounded-3xl sm:rounded-[2rem] p-5 sm:p-8 md:p-12 shadow-[0_8px_30px_rgba(200,50,100,0.05)] border border-pink-50 flex flex-col md:flex-row gap-8 md:gap-12">
                <div class="w-full md:w-1/2">
                    <h3 class="font-serif text-2xl text-brand-dark mb-8 font-bold">Contact Information</h3>
                    <div class="space-y-8">
                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 rounded-full bg-[#FFF9F5] border border-pink-50 flex items-center justify-center text-[#c02d4b] shrink-0 shadow-sm">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <h4 class="text-[11px] font-bold text-[#c02d4b] uppercase tracking-[0.15em] mb-1.5">Email Us</h4>
                                <a href="mailto:hello@heartgrams.in" class="text-[15px] text-brand-dark/80 hover:text-[#c02d4b] transition-colors font-medium">hello@heartgrams.in</a>
                            </div>
                        </div>
                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 rounded-full bg-[#FFF9F5] border border-pink-50 flex items-center justify-center text-[#c02d4b] shrink-0 shadow-sm">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <h4 class="text-[11px] font-bold text-[#c02d4b] uppercase tracking-[0.15em] mb-1.5">WhatsApp</h4>
                                <a href="tel:+919999999999" class="text-[15px] text-brand-dark/80 hover:text-[#c02d4b] transition-colors font-medium">+91 99999 99999</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl text-[14px] font-medium flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <div>{{ session('success') }}</div>
                        </div>
                    @endif
                    <form action="{{ route('leads.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <input type="hidden" name="source" value="contact">
                        <div>
                            <label class="block text-[12px] font-medium text-brand-dark mb-2">Your name</label>
                            <input type="text" name="name" required placeholder="Full name" class="w-full bg-[#FFF9F5] border border-[#f5e6de] rounded-xl px-4 py-3 text-[14px] text-brand-dark focus:outline-none focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40 transition-all placeholder:text-brand-dark/30">
                        </div>
                        <div>
                            <label class="block text-[12px] font-medium text-brand-dark mb-2">Email address</label>
                            <input type="email" name="email" required placeholder="you@email.com" class="w-full bg-[#FFF9F5] border border-[#f5e6de] rounded-xl px-4 py-3 text-[14px] text-brand-dark focus:outline-none focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40 transition-all placeholder:text-brand-dark/30">
                        </div>
                        <div>
                            <label class="block text-[12px] font-medium text-brand-dark mb-2">Message</label>
                            <textarea name="message" rows="4" required placeholder="How can we help?" class="w-full bg-[#FFF9F5] border border-[#f5e6de] rounded-xl px-4 py-3 text-[14px] text-brand-dark focus:outline-none focus:ring-2 focus:ring-[#c02d4b]/20 focus:border-[#c02d4b]/40 transition-all resize-y placeholder:text-brand-dark/30"></textarea>
                        </div>
                        <button type="submit" class="w-full py-3.5 rounded-xl bg-[#c02d4b] text-white font-medium text-[14px] hover:bg-[#a62540] transition-colors shadow-md flex items-center justify-center gap-2 group">
                            Send Message
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
