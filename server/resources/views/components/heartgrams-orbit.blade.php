{{--
    resources/views/components/heartgrams-orbit.blade.php

    Basic use (shows dashed placeholders where your logos go):
        <x-heartgrams-orbit />

    Put your logos in with image paths:
        <x-heartgrams-orbit
            logo-src="{{ asset('images/Gemini_Generated_Image_5e5nn25e5nn25e5n-removebg-preview.png') }}"
            brand-src="{{ asset('images/heartgrams_wordmark.png') }}" />

    Or with slots (SVG, <img>, anything):
        <x-heartgrams-orbit>
            <x-slot:logo> ...your hexagon logo... </x-slot:logo>
            <x-slot:brand> ...your wordmark... </x-slot:brand>
        </x-heartgrams-orbit>

    Props:
        items   labels, clockwise from the top (6 matches the design)
        rotate  true = spinner animation, false = static exactly like the image
        speed   seconds for one revolution
--}}
@props([
    'items' => [
        'Real stories',
        'Human-crafted lyrics',
        'Native-language warmth',
        'MP3-ready delivery',
        'Replay value for years',
        'Private story promise',
    ],
    'rotate' => true,
    'speed' => 28,
    'logoSrc' => null,
    'brandSrc' => null,
])
@php $uid = 'hg' . uniqid(); @endphp

@once
    @push('styles')
        <style>
            .hg {
                position: relative; isolation: isolate; overflow: hidden;
                background: linear-gradient(180deg, #ffffff 0%, #fff7fa 100%);
                padding: clamp(0.5rem, 1.5vw, 1.25rem) clamp(1rem, 3vw, 2.5rem);
                border-radius: clamp(1.25rem, 2.5vw, 2rem);
            }
            .hg__bg { position: absolute; inset: 0; width: 100%; height: 100%; z-index: -1; pointer-events: none; }

            .hg__wrap {
                display: grid; grid-template-columns: 1040fr 560fr; align-items: center;
                max-width: 1600px; margin-inline: auto; container-type: inline-size;
                gap: clamp(1rem, 2.5vw, 2.5rem);
            }

            /* ---------- orbit area ---------- */
            .hg__orbit {
                position: relative; aspect-ratio: 1030 / 630;
                container-type: inline-size; width: 100%; margin: 0 auto;
            }

            .hg__pill {
                position: absolute; left: 50%; top: 50%;
                padding: clamp(0.7rem, 1.25cqw, 1.05rem) clamp(1.2rem, 2.2cqw, 2rem);
                min-height: clamp(44px, 5.8cqw, 62px);
                display: flex; align-items: center; justify-content: center; text-align: center;
                white-space: nowrap;
                font-family: "Playfair Display", Georgia, serif; font-weight: 700;
                font-size: clamp(14px, 1.95cqw, 20px); line-height: 1.1;
                color: #540d25;
                background: linear-gradient(180deg, #ffffff 0%, #fff7fa 100%);
                border: 1.5px solid rgba(238, 165, 186, 0.55);
                border-radius: 9999px;
                box-shadow: 0 8px 24px rgba(230, 120, 150, 0.18),
                            inset 0 1px 0 #ffffff, inset 0 -4px 10px rgba(255, 205, 220, 0.22);
                will-change: transform; user-select: none; z-index: 2;
                transition: border-color 0.25s ease, box-shadow 0.25s ease;
            }
            .hg__pill:hover {
                border-color: rgba(220, 38, 76, 0.7);
                box-shadow: 0 12px 30px rgba(230, 120, 150, 0.28), inset 0 1px 0 #ffffff;
            }

            /* LOGO SPACE: large and prominent matching reference design */
            .hg__core {
                position: absolute; left: 50%; top: 50%;
                width: clamp(235px, 35cqw, 375px); aspect-ratio: 330 / 365;
                transform: translate(-50%, -50%); z-index: 3;
                display: flex; align-items: center; justify-content: center;
                filter: drop-shadow(0 12px 32px rgba(255, 40, 100, 0.32)) drop-shadow(0 0 24px rgba(255, 140, 40, 0.18));
            }
            .hg__core > img, .hg__core > svg {
                width: 100%; height: 100%; object-fit: contain; display: block;
            }
            .hg__core--empty { filter: none; }
            .hg__core--empty text { font: 600 15px system-ui, sans-serif; fill: #c0527a; }

            /* thin connector ticks seen in static design */
            .hg__tick {
                position: absolute; left: 50%; width: 1.5px;
                background: #e6a3b6; z-index: 1; transform: translateX(-50%);
            }
            .hg__tick--top { top: 15%; height: 8%; }
            .hg__tick--bottom { top: 77%; height: 8%; }
            .hg[data-rotate="true"] .hg__tick { display: none; }

            /* ---------- brand area ---------- */
            .hg__brand { display: flex; align-items: center; gap: clamp(1.2rem, 2.5cqw, 2.5rem); padding-left: 0.5rem; }
            .hg__divider { width: 1.5px; height: clamp(55px, 11cqw, 95px); background: #e6a3b6; flex: none; }
            .hg__brand-text {
                font-family: "Playfair Display", Georgia, serif; font-weight: 700;
                font-size: clamp(2.4rem, 6cqw, 4.8rem); line-height: 1; color: #6b0f2f; letter-spacing: -.01em; margin: 0;
            }
            .hg__brand-img {
                max-width: 100%; height: auto; max-height: clamp(50px, 9.5cqw, 95px);
                object-fit: contain; display: block;
            }
            .hg__brand-slot { min-width: clamp(150px, 26cqw, 330px); }
            .hg__brand-empty {
                display: grid; place-items: center; min-height: 11cqw; padding: 1rem;
                border: 2px dashed #e08aa8; border-radius: 12px; color: #c0527a; font: 600 .9rem system-ui, sans-serif;
            }

            @media (max-width: 992px) {
                .hg__wrap { grid-template-columns: 1fr; gap: 1.5rem; justify-items: center; }
                .hg__orbit { max-width: 600px; aspect-ratio: 1030 / 680; }
                .hg__brand { justify-content: center; padding: 0; }
                .hg__divider { display: none; }
                .hg__brand-text { font-size: clamp(2.4rem, 8vw, 3.6rem); }
            }
            @media (max-width: 640px) {
                .hg { padding: 0.75rem 0.5rem; }
                .hg__orbit { aspect-ratio: 1 / 0.95; }
                .hg__pill {
                    font-size: clamp(12px, 3.2cqw, 15px);
                    padding: 0.45rem 0.95rem;
                    min-height: 42px;
                }
                .hg__core { width: clamp(160px, 36cqw, 240px); }
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('.hg').forEach((root) => {
                    const box     = root.querySelector('.hg__orbit');
                    const pills   = [...root.querySelectorAll('.hg__pill')];
                    const period  = parseFloat(root.dataset.speed) || 28;
                    const reduced = matchMedia('(prefers-reduced-motion: reduce)').matches;
                    const spin    = root.dataset.rotate === 'true' && !reduced;
                    const step    = Math.PI * 2 / pills.length;

                    let angle = 0, last = performance.now(), paused = false, visible = true, rx = 0, ry = 0;

                    const measure = () => {
                        const r = box.getBoundingClientRect();
                        // Snug radii tailored to frame the enlarged central logo closely, exactly like the design
                        rx = r.width * 0.33;      // horizontal radius
                        ry = r.height * 0.36;     // vertical radius
                    };
                    const place = () => pills.forEach((el, i) => {
                        const a = angle + i * step - Math.PI / 2;   // pill 0 sits at the top
                        el.style.transform =
                            `translate(-50%, -50%) translate(${Math.cos(a) * rx}px, ${Math.sin(a) * ry}px)`;
                    });
                    const tick = (now) => {
                        const dt = (now - last) / 1000; last = now;
                        if (spin && !paused && visible) angle += (Math.PI * 2 / period) * dt;
                        place();
                        if (spin) requestAnimationFrame(tick);
                    };

                    measure(); place();
                    new ResizeObserver(() => { measure(); place(); }).observe(box);
                    if (spin) {
                        new IntersectionObserver(([e]) => visible = e.isIntersecting).observe(root);
                        box.addEventListener('pointerenter', () => paused = true);
                        box.addEventListener('pointerleave', () => paused = false);
                        requestAnimationFrame(tick);
                    }
                });
            });
        </script>
    @endpush
@endonce

<section class="hg" data-rotate="{{ $rotate ? 'true' : 'false' }}" data-speed="{{ $speed }}" {{ $attributes }}>

    {{-- soft pink swooshes --}}
    <svg class="hg__bg" viewBox="0 0 1600 900" preserveAspectRatio="none" aria-hidden="true">
        <defs>
            <linearGradient id="{{ $uid }}" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0" stop-color="#ffc9db" stop-opacity=".55"/>
                <stop offset="1" stop-color="#ffffff" stop-opacity="0"/>
            </linearGradient>
        </defs>
        <path d="M1180 320 C1300 160 1450 60 1600 40 L1600 0 L1420 0 C1380 130 1280 240 1180 320Z" fill="url(#{{ $uid }})"/>
        <path d="M1000 340 C1180 200 1400 120 1600 130 L1600 250 C1450 230 1250 300 1000 340Z" fill="url(#{{ $uid }})" opacity=".6"/>
        <path d="M1100 900 C1250 760 1450 660 1600 640 L1600 900Z" fill="url(#{{ $uid }})"/>
        <path d="M0 700 C150 760 300 840 460 900 L0 900Z" fill="url(#{{ $uid }})"/>
    </svg>

    <div class="hg__wrap">

        {{-- LEFT: logo + orbiting pills --}}
        <div class="hg__orbit">
            <span class="hg__tick hg__tick--top"></span>
            <span class="hg__tick hg__tick--bottom"></span>

            @if (isset($logo) && $logo->isNotEmpty())
                <div class="hg__core">{{ $logo }}</div>
            @elseif ($logoSrc)
                <div class="hg__core">
                    <img src="{{ $logoSrc }}" alt="Heartgrams Logo" loading="eager" decoding="async">
                </div>
            @else
                {{-- ===== PLACE YOUR HEXAGON LOGO HERE (330 x 365) ===== --}}
                <div class="hg__core hg__core--empty">
                    <svg viewBox="0 0 330 365" aria-label="Logo placeholder">
                        <path d="M165 6 L322 96 L322 269 L165 359 L8 269 L8 96 Z"
                              fill="rgba(255,230,238,.55)" stroke="#e08aa8" stroke-width="3"
                              stroke-dasharray="10 8" stroke-linejoin="round"/>
                        <text x="165" y="178" text-anchor="middle">Your logo here</text>
                        <text x="165" y="202" text-anchor="middle" style="font-weight:400">330 × 365</text>
                    </svg>
                </div>
            @endif

            @foreach ($items as $label)
                <div class="hg__pill">{{ $label }}</div>
            @endforeach
        </div>

        {{-- RIGHT: divider + wordmark --}}
        <div class="hg__brand">
            <span class="hg__divider" aria-hidden="true"></span>

            @if (isset($brand) && $brand->isNotEmpty())
                <div class="hg__brand-slot">{{ $brand }}</div>
            @elseif ($brandSrc)
                <div class="hg__brand-slot">
                    <img src="{{ $brandSrc }}" alt="Heartgrams" class="hg__brand-img"
                         onerror="this.style.display='none'; if(this.nextElementSibling) this.nextElementSibling.style.display='block';">
                    <h2 class="hg__brand-text" style="display: none;">Heartgrams</h2>
                </div>
            @else
                {{-- ===== PLACE YOUR WORDMARK HERE (or keep this text) ===== --}}
                <h2 class="hg__brand-text">Heartgrams</h2>
            @endif
        </div>

    </div>
</section>
