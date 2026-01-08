<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <a href="{{ route('admin.users.index') }}" class="block p-6 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition">
                            <h3 class="text-lg font-semibold text-blue-700">Gebruikers Beheren</h3>
                            <p class="mt-2 text-gray-600">Bekijk alle gebruikers in het systeem.</p>
                        </a>
                        <a href="{{ route('admin.articles.index') }}" class="block p-6 bg-green-50 border border-green-200 rounded-lg hover:bg-green-100 transition">
                            <h3 class="text-lg font-semibold text-green-700">Nieuws Artikelen</h3>
                            <p class="mt-2 text-gray-600">Maak nieuwe nieuwsartikelen aan.</p>
                        </a>
                        <a href="{{ route('admin.faq.index') }}" class="block p-6 bg-purple-50 border border-purple-200 rounded-lg hover:bg-purple-100 transition">
                            <h3 class="text-lg font-semibold text-purple-700">FAQ Beheren</h3>
                            <p class="mt-2 text-gray-600">Beheer veelgestelde vragen en categorieën.</p>
                        </a>
                        <a href="{{ route('admin.contacts.index') }}" class="block p-6 bg-orange-50 border border-orange-200 rounded-lg hover:bg-orange-100 transition relative">
                            <h3 class="text-lg font-semibold text-orange-700">Contactberichten</h3>
                            <p class="mt-2 text-gray-600">Bekijk contact formulieren.</p>
                            @php
                                $unreadCount = \App\Models\Contact::where('is_read', false)->count();
                            @endphp
                            @if($unreadCount > 0)
                                <span class="absolute top-4 right-4 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-600 rounded-full animate-pulse">
                                    {{ $unreadCount }}
                                </span>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
