<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welkom, ' . auth()->user()->name . '!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welkomstbericht -->
            <div class="mb-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg shadow-lg p-8 text-white">
                <h1 class="text-3xl font-bold mb-2">Hallo {{ auth()->user()->name }}!</h1>
                <p class="text-blue-100">Welkom op Lernie. Ontdek nieuwe onderwerpen en volg je lessen.</p>
            </div>

            <!-- Snelle acties -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <a href="{{ route('student.lessons.index') }}" class="block p-6 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                    <div class="flex items-center mb-2">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <h3 class="text-lg font-semibold">Alle Lessen</h3>
                    </div>
                    <p class="text-blue-100 text-sm">Bekijk alle beschikbare bijlessen van je tutoren.</p>
                </a>
                <a href="{{ route('student.enrollments.index') }}" class="block p-6 bg-gradient-to-br from-purple-500 to-purple-600 text-white rounded-lg hover:from-purple-600 hover:to-purple-700 shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                    <div class="flex items-center mb-2">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h3 class="text-lg font-semibold">Mijn Inschrijvingen</h3>
                    </div>
                    <p class="text-purple-100 text-sm">Bekijk de lessen waarvoor je bent ingeschreven.</p>
                </a>
                <a href="{{ route('news.index') }}" class="block p-6 bg-green-50 border border-green-200 rounded-lg hover:bg-green-100 transition">
                    <div class="flex items-center mb-2">
                        <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                        <h3 class="text-lg font-semibold text-green-700">Nieuws</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Lees de laatste updates en aankondigingen.</p>
                </a>
                <a href="{{ route('faq.index') }}" class="block p-6 bg-yellow-50 border border-yellow-200 rounded-lg hover:bg-yellow-100 transition">
                    <div class="flex items-center mb-2">
                        <svg class="w-6 h-6 text-yellow-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-lg font-semibold text-yellow-700">FAQ</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Vind antwoorden op veelgestelde vragen.</p>
                </a>
            </div>

            <!-- Je Onderwerpen -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800">Jouw Onderwerpen</h2>
                </div>
                <div class="p-6">
                    @if(auth()->user()->subjects->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach(auth()->user()->subjects as $subject)
                                <div class="p-4 border border-gray-300 rounded-lg hover:shadow-md transition">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $subject->name }}</h3>
                                    <p class="text-sm text-gray-600 mt-2">{{ $subject->tutors->count() }} tutor(en)</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-600 mb-4">Je bent nog niet ingeschreven voor onderwerpen.</p>
                            <a href="{{ route('profile.edit') }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                                Onderwerpen toevoegen
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Meer Informatie -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800">Meer Informatie</h2>
                </div>
                <div class="p-6">
                    <p class="text-gray-700 mb-4">
                        Op deze pagina kun je je onderwerpen beheren, het laatste nieuws lezen, en veelgestelde vragen vinden. 
                        Klik op de knoppen hierboven om meer informatie te ontdekken.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
