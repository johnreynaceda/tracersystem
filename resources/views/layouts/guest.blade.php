<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    @stack('scripts')
</head>

<body class="font-sans text-gray-900 antialiased relative">
    <div class="absolute top-0 right-0 left-0 bottom-0">
        <img src="{{ asset('images/school_bg.jpg') }}" class="h-full w-full opacity-20 object-cover" alt="">
    </div>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-green-800">


        <div class="w-full sm:max-w-md mt-6 px-6 py-4 relative bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex flex-col space-y-3 justify-center items-center">
                <a href="/">
                    <img src="{{ asset('images/kabuling_logo.png') }}" class="h-20" alt="">
                </a>
                <p class="text-xl  text-center text-gray-700 font-black">KABULING LEARNING CENTER INC. TRACER SYSTEM</p>
            </div>
            <div class="mt-5">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
