<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lernie - Registreren</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 text-gray-800 font-sans">

    <!-- Navigation -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ url('/') }}" class="text-2xl font-bold text-indigo-600">Lernie</a>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ url('/') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Home
                        </a>
                        <a href="{{ route('news.index') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Nieuws
                        </a>
                        <a href="{{ route('faq.index') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            FAQ
                        </a>
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <div class="space-x-4">
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                    </div>
                </div>
                <!-- Mobile menu button -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ url('/') }}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Home</a>
                <a href="{{ route('news.index') }}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Nieuws</a>
                <a href="{{ route('faq.index') }}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">FAQ</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 pb-12">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="mb-4 text-center">
                 <h2 class="text-2xl font-bold text-gray-900">Registreren</h2>
                 <p class="text-sm text-gray-600">Maak een nieuw account aan</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Type user -->
                <div class="mb-4">
                    <x-input-label for="role" :value="__('Ik wil me registreren als')" />
                    <div class="flex gap-4 mt-1">
                        <label class="flex-1 flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50 has-[:checked]:border-indigo-500 has-[:checked]:bg-indigo-50">
                            <input type="radio" name="role" value="student" class="mr-2 text-indigo-600 focus:ring-indigo-500" checked>
                            <span class="font-semibold text-sm">Student</span>
                        </label>
                        <label class="flex-1 flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50 has-[:checked]:border-indigo-500 has-[:checked]:bg-indigo-50">
                            <input type="radio" name="role" value="tutor" class="mr-2 text-indigo-600 focus:ring-indigo-500">
                            <span class="font-semibold text-sm">Bijlesgever</span>
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Naam')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Stad / Gemeente -->
                <div class="mt-4">
                    <x-input-label for="city" :value="__('Stad / Gemeente')" />
                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>

                <!-- Geboortedatum -->
                <div class="mt-4">
                    <x-input-label for="birthday" :value="__('Geboortedatum')" />
                    <x-text-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" :value="old('birthday')" />
                    <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('E-mailadres')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Bio / Over mij -->
                <div id="bio-section" class="mt-4 hidden">
                    <x-input-label for="about_me" :value="__('Over mij (verplicht voor bijlesgevers)')" />
                    <textarea id="about_me" name="about_me" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3">{{ old('about_me') }}</textarea>
                    <x-input-error :messages="$errors->get('about_me')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Wachtwoord')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Bevestig Wachtwoord')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Heeft u al een account?') }}
                    </a>

                    <x-primary-button class="ms-4">
                        {{ __('Registreer') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

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

    <script>
        // Toggle Bio Visibility based on Role
        document.addEventListener('DOMContentLoaded', function () {
            const roleInputs = document.querySelectorAll('input[name="role"]');
            const bioSection = document.getElementById('bio-section');

            function updateBioVisibility() {
                const selectedRole = document.querySelector('input[name="role"]:checked').value;
                if (selectedRole === 'tutor') {
                    bioSection.classList.remove('hidden');
                } else {
                    bioSection.classList.add('hidden');
                }
            }

            // Run on page load
            if(document.querySelector('input[name="role"]:checked')) {
                updateBioVisibility();
            }

            // Run on change
            roleInputs.forEach(input => {
                input.addEventListener('change', updateBioVisibility);
            });
        });

        // Mobile menu toggle
        const btn = document.querySelector("button[aria-controls='mobile-menu']");
        const menu = document.querySelector("#mobile-menu");

        if(btn && menu) {
            btn.addEventListener("click", () => {
                menu.classList.toggle("hidden");
            });
        }
    </script>
</body>
</html>
