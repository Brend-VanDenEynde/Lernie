<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mijn Lessen
            </h2>
            <a href="{{ route('lessons.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                + Les Aanmaken
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if($lessons->count() > 0)
                <div class="space-y-4">
                    @foreach($lessons as $lesson)
                        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden border-l-4 {{ $lesson->is_active ? 'border-green-500' : 'border-gray-400' }}">
                            <div class="p-6">
                                <div class="flex justify-between items-start gap-4">
                                    <!-- Hoofdinformatie -->
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center gap-3 mb-3">
                                            <h3 class="text-xl font-bold text-gray-900">{{ $lesson->subject->name }}</h3>
                                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold {{ $lesson->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-300 text-gray-700' }}">
                                                {{ $lesson->is_active ? 'ACTIEF' : 'INACTIEF' }}
                                            </span>
                                            @php
                                                $enrolledCount = $lesson->enrolledStudents()->count();
                                            @endphp
                                            @if($enrolledCount > 0)
                                                <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                                    {{ $enrolledCount }} ingeschreven
                                                </span>
                                            @endif
                                        </div>
                                        
                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-3">
                                            <div>
                                                <p class="text-xs text-gray-500 font-medium mb-1">Datum</p>
                                                <p class="text-sm text-gray-900 font-semibold">{{ $lesson->start_time->format('d-m-Y') }}</p>
                                                <p class="text-sm text-gray-700">{{ $lesson->start_time->format('H:i') }} uur</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-gray-500 font-medium mb-1">Duur</p>
                                                <p class="text-sm text-gray-900 font-semibold">{{ $lesson->duration_minutes }} minuten</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-gray-500 font-medium mb-1">Locatie</p>
                                                <p class="text-sm text-gray-900 font-semibold truncate" title="{{ $lesson->location }}">{{ $lesson->location }}</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-gray-500 font-medium mb-1">Prijs</p>
                                                <p class="text-lg text-green-600 font-bold">€ {{ number_format($lesson->price, 2, ',', '.') }}</p>
                                            </div>
                                        </div>

                                        @if($lesson->description)
                                            <div class="mt-3 p-3 bg-gray-50 rounded border-l-2 border-gray-300">
                                                <p class="text-sm text-gray-700">
                                                    <strong>Beschrijving:</strong> {{ Str::limit($lesson->description, 150) }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Acties -->
                                    <div class="flex flex-col gap-2 flex-shrink-0">
                                        <a href="{{ route('lessons.show', $lesson) }}" class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg hover:from-green-600 hover:to-green-700 transition font-medium shadow-sm text-center text-sm whitespace-nowrap">
                                            Meer info
                                        </a>
                                        <a href="{{ route('lessons.edit', $lesson) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition font-medium shadow-sm text-center text-sm">
                                            Bewerk
                                        </a>
                                        <form action="{{ route('lessons.destroy', $lesson) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze les wilt verwijderen?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-full px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition font-medium shadow-sm text-sm">
                                                Verwijder
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-12 text-center">
                    <p class="text-gray-600 text-lg mb-6">Je hebt nog geen lessen aangemaakt.</p>
                    <a href="{{ route('lessons.create') }}" class="inline-block px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                        Maak je eerste les aan
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
