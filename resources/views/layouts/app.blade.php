<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('Dashboard')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="bg-gray-100">

    {{-- HEADER --}}
    @include('layouts.partials.header')

    <div class="flex">

        {{-- SIDEBAR --}}
        @include('layouts.partials.sidebar')

        <div class="flex-1">

            {{-- NAVBAR --}}
            @include('layouts.partials.navbar')

            {{-- CONTENT --}}
            <main class="p-6">
                @yield('content')
            </main>

        </div>
    </div>

    {{-- FOOTER --}}
    @include('layouts.partials.footer')

    @stack('scripts')

</body>
</html>
