<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            
            {{-- This is the navigation bar added by Breeze. It's important! --}}
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                {{-- 
                    This is the main fix. We are replacing the component's '$slot' 
                    with the traditional '@yield' directive to make it compatible
                    with all the views we have already created (home, products, cart, etc.)
                --}}
                @yield('content')
            </main>

        </div>
    </body>
</html>

