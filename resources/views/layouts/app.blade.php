<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name','IvysNails-Manager') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles
</head>

<body
    x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init=" 
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark bg-gray-900': darkMode === true}" class="transition-colors duration-300 ease-in-out">
    <!-- ===== Preloader Start ===== -->
    @include('components.preloader')
    <!-- ===== Preloader End ===== -->

    <div class="flex h-screen overflow-hidden">
        @if(auth()->user()->hasRole('admin'))
        <!-- ===== Sidebar Start ===== -->
        @include('components.sidebar')
        <!-- ===== Sidebar End ===== -->
        @endif

        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            <!-- Small Device Overlay Start -->
            @include('components.overlay')
            <!-- Small Device Overlay End -->

            <!-- ===== Header Start ===== -->
            @include('components.header')
            <!-- ===== Header End ===== -->

            <!-- ===== Main Content Start ===== -->
            <main id="main-content" class="z-10">
                {{ $slot }}
            </main>
            <!-- ===== Main Content End ===== -->
        </div>
    </div>


    @stack('modals')
    @livewireScripts
    @livewireCalendarScripts
</body>

</html>