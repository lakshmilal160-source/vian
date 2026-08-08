<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Software Solutions | at an Affordable Cost</title>
    <meta name="description"
        content="Custom Software Solutions at an Affordable Cost. Watch human domain expertise and AI engineering unite to deliver enterprise software cleanly and affordably.">
          <!-- Favicon -->
       <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $globalSetting->favicon) }}">


    <!-- Google Fonts: Outfit & Inter for ultra-modern typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- FontAwesome for Heart and Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Main Style -->
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    @stack('style')
</head>

<body>
    <!-- Background Particle & Tech Grid Canvas -->
    <canvas id="bgCanvas" class="bg-canvas"></canvas>

    @include('frontend.partials.header')



    <!-- Main Scroll Container for Hero Stage -->
    <main class="contact-main-wrapper">
        @yield('contents')
    </main>

    {{-- @include('frontend.partials.footer') --}}
    @include('frontend.partials.footer')

    <!-- Scripts -->
    {{-- <script src="script.js"> --}}
        <script src="{{ asset('assets/frontend/js/script.js') }}"></script>
    {{-- </script> --}}
    @stack('script')
</body>

</html>
