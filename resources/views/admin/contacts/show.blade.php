<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contactbericht Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">{{ $contact->subject }}</h3>
                            <p class="text-sm text-gray-500 mt-1">
                                Ontvangen op {{ $contact->created_at->format('d F Y \o\m H:i') }}
                            </p>
                        </div>
                        <a href="{{ route('admin.contacts.index') }}" class="text-indigo-600 hover:text-indigo-900">
                            ← Terug naar overzicht
                        </a>
                    </div>

                    <!-- Contact Information -->
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <h4 class="text-sm font-semibold text-gray-700 uppercase tracking-wide mb-4">Afzender Informatie</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Naam</p>
                                <p class="font-medium text-gray-900">{{ $contact->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Email</p>
                                <a href="mailto:{{ $contact->email }}" class="font-medium text-indigo-600 hover:text-indigo-900">
                                    {{ $contact->email }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Message Content -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-700 uppercase tracking-wide mb-3">Bericht</h4>
                        <div class="bg-white border border-gray-200 rounded-lg p-6">
                            <p class="text-gray-800 whitespace-pre-wrap leading-relaxed">{{ $contact->message }}</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-between items-center pt-4 border-t border-gray-200">
                        <div>
                            <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" 
                               class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                Beantwoord via email
                            </a>
                        </div>
                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" 
                              onsubmit="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Verwijder
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
