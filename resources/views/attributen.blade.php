<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lernie - Attributen (Style Guide)</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 text-gray-800 font-sans" x-data="{ mobileMenuOpen: false }">

    <!-- Navigation (Consistent with other pages) -->
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
                         <a href="{{ url('/attributen') }}" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Attributen
                        </a>
                    </div>
                </div>
                <!-- Mobile menu button -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="sm:hidden" id="mobile-menu" x-show="mobileMenuOpen" style="display: none;">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ url('/') }}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Home</a>
                <a href="{{ route('news.index') }}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Nieuws</a>
                <a href="{{ route('faq.index') }}" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">FAQ</a>
                 <a href="{{ url('/attributen') }}" class="bg-indigo-50 border-indigo-500 text-indigo-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Attributen</a>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Design System & Attributen
            </h1>
            <p class="mt-2 text-sm text-gray-500">Overzicht van alle gebruikte componenten en stijlen in de applicatie.</p>
        </div>
    </div>

    <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 space-y-16">

        <!-- Typography Section -->
        <section id="typography" class="space-y-6">
            <div class="border-b border-gray-200 pb-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Typografie</h3>
            </div>
            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6 space-y-4">
                <div>
                    <h1 class="text-4xl font-extrabold text-gray-900">Heading 1 (text-4xl font-extrabold)</h1>
                    <span class="text-xs text-gray-400">Gebruikt voor hoofd titels</span>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Heading 2 (text-3xl font-bold)</h2>
                    <span class="text-xs text-gray-400">Gebruikt voor sectie titels</span>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-900">Heading 3 (text-xl font-semibold)</h3>
                    <span class="text-xs text-gray-400">Gebruikt voor kaart titels</span>
                </div>
                <div>
                    <p class="text-base text-gray-500">Body text (text-base text-gray-500). Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Small text (text-sm text-gray-500). Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div>
                     <a href="#" class="text-indigo-600 hover:text-indigo-900">Link text (text-indigo-600 hover:text-indigo-900)</a>
                </div>
            </div>
        </section>

        <!-- Buttons Section -->
        <section id="buttons" class="space-y-6">
            <div class="border-b border-gray-200 pb-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Buttons</h3>
            </div>
            <div class="bg-white shadow sm:rounded-lg p-6">
                <div class="flex flex-wrap gap-4 items-center">
                    <!-- Primary -->
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Primary Button
                    </button>

                    <!-- Secondary -->
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Secondary Button
                    </button>

                    <!-- Danger -->
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Soft Button
                    </button>

                     <!-- Danger -->
                     <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Danger Button
                    </button>

                    <!-- Sizes -->
                    <button type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        XS Button
                    </button>
                    <button type="button" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Large Button
                    </button>
                </div>
            </div>
        </section>

        <!-- Tables Section -->
        <section id="tables" class="space-y-6">
            <div class="border-b border-gray-200 pb-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Tabellen</h3>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Naam
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Rol
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Actie</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">Jane Cooper</div>
                                            <div class="text-sm text-gray-500">jane.cooper@example.com</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Actief
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Admin
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Bewerken</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">Cody Fisher</div>
                                            <div class="text-sm text-gray-500">cody.fisher@example.com</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                Offline
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Gebruiker
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Bewerken</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Notifications/Alerts Section -->
        <section id="notifications" class="space-y-6">
            <div class="border-b border-gray-200 pb-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Notificaties / Alerts</h3>
            </div>
            <div class="space-y-4">
                <!-- Success -->
                <div class="rounded-md bg-green-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800">Succesvol opgeslagen</h3>
                            <div class="mt-2 text-sm text-green-700">
                                <p>De wijzigingen zijn succesvol doorgevoerd in het systeem.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Warning -->
                <div class="rounded-md bg-yellow-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-yellow-800">Let op</h3>
                            <div class="mt-2 text-sm text-yellow-700">
                                <p>Dit account heeft nog geen profielfoto ingesteld.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Error -->
                <div class="rounded-md bg-red-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Er is iets misgegaan</h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    <li>Je wachtwoord moet minimaal 8 tekens bevatten.</li>
                                    <li>Het e-mailadres is al in gebruik.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Modals Section -->
        <section id="modals" class="space-y-6">
            <div class="border-b border-gray-200 pb-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Modals</h3>
            </div>
            <div class="bg-white shadow sm:rounded-lg p-6">
                <div x-data="{ open: false }">
                    <!-- Button to open modal -->
                    <button @click="open = true" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Open Modal
                    </button>

                    <!-- Modal Backdrop -->
                    <div x-show="open" style="display: none;" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <!-- Background overlay -->
                            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" @click="open = false"></div>

                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                            <!-- Modal Panel -->
                            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                                <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                                    <button type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" @click="open = false">
                                        <span class="sr-only">Close</span>
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="sm:flex sm:items-start">
                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <svg class="h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                            Voorbeeld Modal
                                        </h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">
                                                Dit is een voorbeeld van een modal dialoogvenster. Je kunt hier belangrijke informatie tonen of acties laten bevestigen.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false">
                                        Begrepen
                                    </button>
                                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" @click="open = false">
                                        Annuleren
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Forms Section -->
        <section id="forms" class="space-y-6">
            <div class="border-b border-gray-200 pb-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Formulieren</h3>
            </div>
            <div class="bg-white shadow sm:rounded-lg p-6 space-y-6">
                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <!-- Text Input -->
                    <div class="sm:col-span-3">
                        <label for="first-name" class="block text-sm font-medium text-gray-700">Voornaam</label>
                        <div class="mt-1">
                            <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="John">
                        </div>
                    </div>

                    <!-- Email Input -->
                    <div class="sm:col-span-3">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email adres</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email" autocomplete="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="john@example.com">
                        </div>
                        <p class="mt-2 text-sm text-gray-500">We zullen dit nooit delen met anderen.</p>
                    </div>

                    <!-- Select -->
                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm font-medium text-gray-700">Land / Regio</label>
                        <div class="mt-1">
                            <select id="country" name="country" autocomplete="country-name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option>België</option>
                                <option>Nederland</option>
                                <option>Frankrijk</option>
                            </select>
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="sm:col-span-6">
                        <label for="about" class="block text-sm font-medium text-gray-700">Over jezelf</label>
                        <div class="mt-1">
                            <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Schrijf een korte beschrijving.</p>
                    </div>

                    <!-- Input with Error -->
                    <div class="sm:col-span-6">
                        <label for="error-input" class="block text-sm font-medium text-red-700">Veld met foutmelding</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="error-input" id="error-input" class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md" placeholder="Ongeldige waarde" value="Oeps!">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <p class="mt-2 text-sm text-red-600" id="email-error">Dit veld is verplicht.</p>
                    </div>
                </div>

                <!-- Checkboxes and Radios -->
                <fieldset>
                    <legend class="text-base font-medium text-gray-900 w-full border-b border-gray-200 pb-2 mb-4">Voorkeuren</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-4">
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="comments" class="font-medium text-gray-700">Comments</label>
                                    <p class="text-gray-500">Ontvang notificaties wanneer iemand reageert.</p>
                                </div>
                            </div>
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="candidates" name="candidates" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="candidates" class="font-medium text-gray-700">Kandidaten</label>
                                    <p class="text-gray-500">Ontvang notificaties bij nieuwe kandidaten.</p>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <input id="push-everything" name="push-notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="push-everything" class="ml-3 block text-sm font-medium text-gray-700">
                                    Alles ontvangen
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="push-email" name="push-notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="push-email" class="ml-3 block text-sm font-medium text-gray-700">
                                    Alleen email
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="push-nothing" name="push-notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="push-nothing" class="ml-3 block text-sm font-medium text-gray-700">
                                    Geen push notificaties
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </section>

        <!-- Cards Section -->
        <section id="cards" class="space-y-6">
            <div class="border-b border-gray-200 pb-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Cards & Containers</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Basic Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Basic Card</h3>
                        <div class="mt-2 max-w-xl text-sm text-gray-500">
                            <p>Een simpele kaart met content en schaduw.</p>
                        </div>
                    </div>
                </div>

                <!-- Card with Header -->
                <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Card met Header</h3>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <p class="text-gray-500">De body van de kaart.</p>
                    </div>
                </div>

                <!-- Card with Footer -->
                <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                    <div class="px-4 py-5 sm:p-6">
                        <p class="text-gray-500">Kaart content...</p>
                    </div>
                    <div class="px-4 py-4 sm:px-6 bg-gray-50">
                        <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Link in footer &rarr;</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Badges Section -->
        <section id="badges" class="space-y-6">
            <div class="border-b border-gray-200 pb-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Badges & Tags</h3>
            </div>
            <div class="bg-white shadow sm:rounded-lg p-6">
                <div class="space-x-2 space-y-2">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                        Badge
                    </span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                        Alert
                    </span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                        Warning
                    </span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        Success
                    </span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        Info
                    </span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                        Indigo
                    </span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                        Purple
                    </span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-800">
                        Pink
                    </span>
                </div>
                <!-- Large Badges -->
                <div class="mt-4 space-x-2 space-y-2">
                     <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                        Large Badge
                    </span>
                    <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800">
                        Large Success
                    </span>
                </div>
            </div>
        </section>

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
                                     <li>
                                        <a href="{{ url('/attributen') }}" class="text-base text-gray-300 hover:text-white">
                                            Attributen
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

</body>
</html>
