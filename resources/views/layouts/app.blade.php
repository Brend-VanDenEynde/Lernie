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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex flex-col">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1">
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="bg-gray-800">
                <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                    <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                        <div class="space-y-8 xl:col-span-1">
                            <span class="text-2xl font-bold text-white">Lernie</span>
                            <p class="text-gray-300 text-base">
                                Het platform voor al je leermiddelen.
                            </p>
                        </div>
                        <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                            <div class="md:grid md:grid-cols-2 md:gap-8">
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                                        Navigatie
                                    </h3>
                                    <ul class="mt-4 space-y-4">
                                        <li>
                                            <a href="{{ url('/') }}" class="text-base text-gray-300 hover:text-white">
                                                Home
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('news.index') }}" class="text-base text-gray-300 hover:text-white">
                                                Nieuws
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('faq.index') }}" class="text-base text-gray-300 hover:text-white">
                                                FAQ
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-12 border-t border-gray-700 pt-8">
                        <p class="text-base text-gray-400 xl:text-center">
                            &copy; {{ date('Y') }} Lernie. Alle rechten voorbehouden.
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
