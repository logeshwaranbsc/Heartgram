@props(['fixedHeader' => true, 'normalHeader' => false, 'seoTags' => ''])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('partials.seo-head')
    
    {!! $seoTags !!}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;500;600;700&family=Noto+Sans+Devanagari:wght@400;500;600;700&family=Noto+Sans+Kannada:wght@400;500;600;700&family=Noto+Sans+Malayalam:wght@400;500;600;700&family=Noto+Sans+Tamil:wght@400;500;600;700&family=Noto+Sans+Telugu:wght@400;500;600;700&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Noto+Serif+Bengali:wght@400;500;600;700&family=Noto+Serif+Devanagari:wght@400;500;600;700&family=Noto+Serif+Kannada:wght@400;500;600;700&family=Noto+Serif+Malayalam:wght@400;500;600;700&family=Noto+Serif+Tamil:wght@400;500;600;700&family=Noto+Serif+Telugu:wght@400;500;600;700&family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js x-cloak: prevent flash of hidden elements on page load/refresh -->
    <style>
        [x-cloak] { display: none !important; }
    </style>

    @stack('styles')
</head>
<body class="font-body antialiased bg-cream text-ink-900">
    {{ $announce ?? '' }}
    @include('partials.header', ['fixedHeader' => $fixedHeader, 'normalHeader' => $normalHeader])

    <main>
        {{ $slot }}
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>
</html>
