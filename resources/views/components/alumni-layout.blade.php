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
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
    @livewireScripts
    @stack('scripts')
</head>

<body class="font-sans antialiased bg-green-800">
    <x-dialog z-index="z-50" blur="md" align="center" />
    <div class="fixed top-0 right-0 left-0 bottom-0">
        <img src="{{ asset('images/school_bg.jpg') }}" class="h-full w-full opacity-20 object-cover" alt="">
    </div>
    <div class="w-full border-b border-white ">
        <div x-data="{ open: false }"
            class="relative 2xl:max-w-7xl flex flex-col w-full pt-5 pb-3 mx-auto  md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="flex flex-row items-center justify-between lg:justify-start">
                <a class="text-lg tracking-tight flex space-x-2 items-center font-black text-white uppercase focus:outline-none focus:ring lg:text-2xl"
                    href="/">
                    <img src="{{ asset('images/kabuling_logo.png') }}" class="h-10 w-10" alt="">
                    <span class="lg:text-xl uppecase focus:ring-0">
                        KLCI ALUMNI TRACER SYSTEM
                    </span>
                </a>
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-black focus:outline-none focus:text-black md:hidden">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{ 'flex': open, 'hidden': !open }"
                class="flex-col items-center flex-grow hidden md:pb-0 md:flex md:justify-end md:flex-row">
                <a class="px-2 py-2 text-white lg:px-6 md:px-3 font-medium hover:text-gray-400 lg:ml-auto"
                    href="{{ route('alumni.dashboard') }}">
                    Home
                </a>
                <a class="px-2 py-2 text-white lg:px-6 md:px-3 font-medium hover:text-gray-400"
                    href="{{ route('alumni.list') }}">
                    Alumni
                </a>
                <a class="px-2 py-2 text-white lg:px-6 md:px-3 font-medium hover:text-gray-400"
                    href="{{ route('alumni.gallery') }}">
                    Gallery
                </a>
                <a class="px-2 py-2 text-white lg:px-6 md:px-3 font-medium hover:text-gray-400"
                    href="{{ route('alumni.about') }}">
                    About
                </a>

                <div class="inline-flex items-center gap-2 list-none lg:ml-auto">
                    {{-- <div class="relative flex-shrink-0 ml-5" @click.away="open = false" x-data="{ open: false }">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                class="block px-4 py-2 text-white" role="menuitem" tabindex="-1" id="user-menu-item-2">
                                Sign out
                            </a>
                        </form>
                    </div> --}}
                    <div class="relative flex-shrink-0 ml-5" @click.away="open = false" x-data="{ open: false }">
                        <div class="flex space-x-3 items-start text-right">
                            <div>
                                <h1 class="font-bold uppercase text-white">{{ auth()->user()->name }}</h1>
                                <h1 class="text-gray-100 border-t leading-3 text-sm">{{ auth()->user()->email }}</h1>
                            </div>
                            <button @click="open = !open" type="button"
                                class="flex bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">
                                    Open user menu
                                </span>
                                @if (\App\Models\AlumniInformation::where('user_id', auth()->user()->id)->count() > 0)
                                    <img class="object-cover w-12 h-12 rounded-full"
                                        src="{{ Storage::url(\App\Models\AlumniInformation::where('user_id', auth()->user()->id)->first()->attachment) }}"
                                        alt="">
                                @else
                                    <img class="object-cover w-12 h-12 rounded-full"
                                        src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80"
                                        alt="">
                                @endif
                            </button>
                        </div>

                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                            style="display: none;">
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-500 hover:text-green-500 hover:font-bold"
                                role="menuitem" tabindex="-1" id="user-menu-item-0">
                                Your Profile
                            </a>

                            <a href="{{ route('alumni.edit-record') }}"
                                class="block px-4 py-2 text-sm text-gray-500 hover:text-green-500 hover:font-bold"
                                role="menuitem" tabindex="-1" id="user-menu-item-1">
                                Update Record
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                    class="block px-4 py-2 text-sm text-gray-500 hover:text-red-500 hover:font-bold"
                                    role="menuitem" tabindex="-1" id="user-menu-item-2">
                                    Sign out
                                </a>
                            </form>
                        </div>
                    </div>
            </nav>
        </div>
    </div>
    <div class="relative mt-10 2xl:max-w-7xl  w-full pt-5 pb-3 mx-auto  ">
        <div>
            {{ $slot }}
        </div>
    </div>
</body>

</html>
