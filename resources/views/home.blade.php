<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Title -->
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>

        @else

            <title>{{ config('app.name') }}</title>

        @endif

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/e94e51d377.js" crossorigin="anonymous"></script>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts
        @livewireChartsScripts

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>

    <body class="antialiased bg-gray-200 w-full min-h-screen">

        <div class="header w-full px-32 py-4 bg-white shadow grid grid-cols-3 gap-4">

            <div class="cerit-logo flex justify-start items-center">

                <img src="{{ asset('assets/CERIT-logo.png') }}" alt="CERIT Logo" class="h-24">

            </div>

            <div class="first-logo flex justify-center items-center">

                <img src="{{ asset('assets/FIRST-logo.png') }}" alt="FIRST Global Logo" class="h-24">

            </div>

            <div class="bosnia-flag flex flex-col justify-center items-end">

                <img src="{{ asset('assets/Bosnia Flag.webp') }}" alt="CERIT Logo" class="h-16">

                <p class="text-lg font-bold text-gray-700">Team Bosnia and Herzegovina</p>

            </div>

        </div>

        @livewire('home')

    </body>

</html>
