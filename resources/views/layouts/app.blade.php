<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "Fauzil's Portfolio")</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/Picture_Profile.png') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}?v={{ time() }}">
    
    @stack('styles')
</head>
<body class="bg-[#0A1014] text-gray-300 font-sans antialiased selection:bg-[#32BAD6] selection:text-white">

    @yield('content')

    <!-- Custom JS with cache busting -->
    <script src="{{ asset('js/custom.js') }}?v={{ time() }}"></script>
    
    @stack('scripts')
</body>
</html>
