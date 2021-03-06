<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') . ' | ' . (isset($header) ? $header : 'Admin') }}</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/dashboard.js') }}" defer></script>
</head>

<body class="font-sans antialiased bg-gray-100">
    {{-- <x--banner /> --}}
    <div class="md:flex flex-col md:flex-row md:min-h-screen w-full">

        <x-sidebar />
        <div class="w-full bg-gray-100">

            @include('navigation-menu')
            <x-notification />

            <div class="max-w-7xl mx-auto">
                <!-- Page Heading -->
                @if (isset($header))
                    <header>
                        <div class="py-6">
                            <h2 class="font-bold text-xl text-gray-800 leading-tight">
                                {{ $header }}
                            </h2>
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main class="mx-auto">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    @stack('modals')

    @livewireScripts

</body>

</html>
