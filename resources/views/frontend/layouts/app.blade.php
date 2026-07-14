<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inc2 Solutions | @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $globalSetting->favicon) }}">
    {{-- FONT AWESOME --}}
    <link rel="preload" href="{{ asset('assets/frontend/css/style.min.css') }}" as="style">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600;1,700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- MAIN CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.min.css') }}">

    @stack('styles')

</head>

<body>

    {{-- HEADER --}}
    @include('frontend.partials.header')

    <main>

        @yield('content')

    </main>

    {{-- FOOTER --}}
    @include('frontend.partials.footer')

    {{-- BACK TO TOP --}}
    <button class="back-to-top" id="backToTop">

        <i class="fa-solid fa-arrow-up"></i>

    </button>

    {{-- MAIN JS --}}
    <script src="{{ asset('assets/frontend/js/script.min.js') }}" defer></script>

    @stack('scripts')

</body>

</html>
