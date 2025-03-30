<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="modernseva">

    <title>{{ json_decode($pageData)->props->title ?? 'Default Title' }}</title>
    <meta name="description"
        content="{{ json_decode($pageData)->props->description ?? 'Default description for the page' }}">
    <meta name="keywords" content="{{ json_decode($pageData)->props->keywords ?? 'Default keywords for the page' }}">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">


    <meta property="og:title" content="{{ json_decode($pageData)->props->title ?? 'Default Title' }}" />
    <meta property="og:description"
        content="{{ json_decode($pageData)->props->description ?? 'Default Description' }}" />
    <meta property="og:image" content="{{ url('/') }}/default-image.jpg" />
    <meta property="og:url" content="{{ url()->full() }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ json_decode($pageData)->props->title ?? 'Default Title' }}" />
    <meta name="twitter:description"
        content="{{ json_decode($pageData)->props->description ?? 'Default Description' }}" />
    <meta name="twitter:image" content="{{ url('/') }}/default-image.jpg" />

    <link rel="canonical" href="{{ url()->full() }}">

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "WebPage",
          "name": "{{ json_decode($pageData)->props->title ?? 'Default Title' }}",
          "description": "{{ json_decode($pageData)->props->description ?? 'Default description for the page' }}",
          "url": "{{ url()->full() }}",
          "image": "{{url('/')}}/default-image.jpg",
          "contactPoint": [
                {
                    "@type": "ContactPoint",
                    "telephone": "+1-234-567-890",
                    "contactType": "customer service",
                    "email": "support@example.com"
                },
                {
                    "@type": "ContactPoint",
                    "telephone": "+1-111-222-333",
                    "contactType": "sales",
                    "email": "sales@example.com"
                }
            ]
        }
        </script>

    @viteReactRefresh
    @vite(['resources/js/main.jsx'])
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>



<body>
    <div id="app" data-page='{{ $pageData }}'>
        <h1 class="text-center text-2xl font-bold text-blue-600">
            {{ json_decode($pageData)->props->message }}
        </h1>
        <h2 class="text-center text-xl text-gray-700">
            {{ json_decode($pageData)->props->subtitle }}
        </h2>

    </div>
</body>

</html>
