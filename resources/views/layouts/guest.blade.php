<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Planner') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="/site.webmanifest">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div>
                <a href="/">
                    <img class="w-16 lg:w-24" src="{{ asset('images/planner-logo.png') }}">
                </a>
            </div>
            @if(request()->routeIs('login'))
                <div class="mt-4 text-center">
                    <h1 class="text-2xl md:text-4xl font-bold mb-4">Bem-vindo de volta</h1>
                    <p class="text-xs md:text-sm lg:text-lg">Abra seu caderninho e continue de onde parou.</p>
                </div>
            @endif

            @if(request()->routeIs('register'))
                <div class="mt-4 text-center">
                    <h1 class="text-2xl md:text-4xl font-bold mb-4">É novo por aqui?</h1>
                    <p class="text-xs md:text-sm lg:text-lg">Crie sua conta e comece a planejar seu caderninho.</p>
                </div>
            @endif

            <div class="w-full lg:w-8/12 md:w-4/5 mt-6 flex justify-center">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
