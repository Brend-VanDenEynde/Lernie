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
                <h1 class="text-3xl font-bold mb-2">Hallo {{ auth()->user()->name }}! 👋</h1>
                <p class="text-blue-100">Welkom op Lernie. Ontdek nieuwe onderwerpen en volg je lessen.</p>
            </div>

            <!-- Snelle acties -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <a href="{{ route('news.index') }}" class="block p-6 bg-green-50 border border-green-200 rounded-lg hover:bg-green-100 transition">
                    <h3 class="text-lg font-semibold text-green-700">Nieuws</h3>
                    <p class="mt-2 text-gray-600">Lees de laatste updates en aankondigingen.</p>
                </a>
                <a href="{{ route('faq.index') }}" class="block p-6 bg-purple-50 border border-purple-200 rounded-lg hover:bg-purple-100 transition">
                    <h3 class="text-lg font-semibold text-purple-700">FAQ</h3>
                    <p class="mt-2 text-gray-600">Vind antwoorden op veelgestelde vragen.</p>
                </a>
                <a href="{{ route('profile.edit') }}" class="block p-6 bg-yellow-50 border border-yellow-200 rounded-lg hover:bg-yellow-100 transition">
                    <h3 class="text-lg font-semibold text-yellow-700">Profiel</h3>
                    <p class="mt-2 text-gray-600">Bekijk en bewerk je profielgegevens.</p>
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
                                    <div class="mt-4 flex flex-wrap gap-2">
                                        @foreach($subject->tutors as $tutor)
                                            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">
                                                {{ $tutor->name }}
                                            </span>
                                        @endforeach
                                    </div>
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

            <!-- Bijles in de buurt van je tutoren -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800">Bijles in de Buurt</h2>
                </div>
                <div class="p-6">
                    @php
                        $tutors = [];
                        foreach(auth()->user()->subjects as $subject) {
                            foreach($subject->tutors as $tutor) {
                                $tutors[$tutor->id] = $tutor;
                            }
                        }
                        $tutorIds = array_keys($tutors);
                        $lessons = \App\Models\Lesson::whereIn('tutor_id', $tutorIds)
                            ->where('is_active', true)
                            ->where('start_time', '>=', now())
                            ->orderBy('start_time')
                            ->limit(6)
                            ->get();
                    @endphp

                    @if($lessons->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($lessons as $lesson)
                                <div class="p-4 border border-blue-300 rounded-lg bg-blue-50 hover:shadow-md transition">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $lesson->subject->name }}</h3>
                                    <p class="text-sm text-gray-600 mt-2">
                                        <strong>Tutor:</strong> {{ $lesson->tutor->name }}
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        <strong>Locatie:</strong> {{ $lesson->location }}
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        <strong>Wanneer:</strong> {{ $lesson->start_time->format('d-m-Y H:i') }}
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        <strong>Duur:</strong> {{ $lesson->duration_minutes }} minuten
                                    </p>
                                    <p class="text-lg font-bold text-blue-600 mt-3">€ {{ number_format($lesson->price, 2, ',', '.') }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-600">Er zijn momenteel geen bijles beschikbaar van je tutoren.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Andere opties -->
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
