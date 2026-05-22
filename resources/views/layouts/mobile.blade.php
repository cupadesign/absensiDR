<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- LEAFLET --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    {{-- LUCIDE --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-gray-100 to-gray-200 min-h-screen">

    <div class="max-w-md mx-auto min-h-screen relative">

        {{-- HEADER --}}
        @include('layouts.partials.mobile-header')

        {{-- CONTENT --}}
        <main class="pb-24">
            @yield('content')
        </main>

        {{-- NAVBAR --}}
        @include('layouts.partials.mobile-navbar')

    </div>

    {{-- STACK --}}
    @stack('scripts')

    <script>
        lucide.createIcons();
    </script>

</body>
</html>
