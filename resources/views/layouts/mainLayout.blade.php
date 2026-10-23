<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Styles and Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        @yield('styles')

    </head>

    <body class="antialiased bg-mesh text-slate-100 min-h-screen overflow-x-hidden" x-data="{ sidebarOpen: true, mobileOpen: false }">
        <div class="app-layout">
            <!-- Sidebar -->
            @include('layouts.sidebar')

            <!-- Mobile Overlay -->
            <div x-show="mobileOpen" @click="mobileOpen = false" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-30 lg:hidden"
                x-transition:enter="transition opacity-0 duration-300" x-transition:enter-end="opacity-100"
                x-transition:leave="transition opacity-100 duration-300" x-transition:leave-end="opacity-0"></div>

            <!-- Main Wrapper -->
            <div class="app-main">
                <!-- Content Area -->
                <main class="app-content">
                    <div class="app-content-inner">
                        @yield('content')
                    </div>

                    <!-- Footer -->
                    <footer class="mt-20 py-8 border-t border-white/5 text-center text-slate-500 text-sm">
                        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                    </footer>
                </main>
            </div>
        </div>
        @yield('scripts')
    </body>
</html>
