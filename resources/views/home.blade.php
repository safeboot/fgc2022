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

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts

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

        <div class="welcome w-full h-screen flex justify-center items-center px-32 py-16">

            <div class="welcome-container w-full h-full p-16 bg-gradient-to-r from-cyan-500 to-blue-500 flex flex-col justify-center items-center gap-4 rounded-xl">

                <h1 class="text-white text-4xl font-bold text-center">Lorem ipsum!</h1>

                <p class="text-white text-lg text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            </div>

        </div>

        <div class="table w-full px-32 py-16">

            <table class="min-w-full">

                <thead class="bg-gray-100 rounded-lg">

                    <tr>

                        <th scope="col" class="text-gray-500 font-medium pl-2">MQ</th>

                        <th scope="col" class="text-gray-500 font-medium">Date</th>

                        <th scope="col" class="text-gray-500 font-medium">Time</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($measurements as $measurement)

                        <tr class="bg-white h-10">

                            <td class="text-center pl-2">{{ $measurement->mq }}</td>

                            <td class="text-center">{{ date('jS \o\f F, Y', strtotime($measurement->created_at)) }}</td>

                            <td class="text-center">{{ date('H:i:s', strtotime($measurement->created_at)) }}</td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </body>

</html>
