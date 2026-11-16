@php
    $currentPath = request()->path() === '/' ? '/' : '/' . request()->path();
    $defaultTitle = config('app.name', 'Heartgrams') . ' — Personalised Songs Written From Your Story';
    $defaultDescription = 'Tell us the memory. We compose the melody, write the lyrics, and hand you a real song made for one person — in English, Tamil, Telugu, Malayalam, or Hindi.';
    $defaultOgImage = '';
@endphp

<title>{{ $defaultTitle }}</title>
<meta name="description" content="{{ $defaultDescription }}">
<link rel="canonical" href="{{ url($currentPath) }}">
<meta name="robots" content="index,follow">

<!-- Open Graph -->
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $defaultTitle }}">
<meta property="og:description" content="{{ $defaultDescription }}">
<meta property="og:url" content="{{ url($currentPath) }}">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $defaultTitle }}">
<meta name="twitter:description" content="{{ $defaultDescription }}">

<!-- JSON-LD -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Heartgrams",
    "url": "{{ config('app.url') }}",
    "logo": "{{ asset('images/logo.png') }}",
    "description": "{{ $defaultDescription }}",
    "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+919999999999",
        "contactType": "customer service"
    }
}
</script>
