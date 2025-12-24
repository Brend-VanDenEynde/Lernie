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
                <div class="grid grid-cols-1 gap-6">
                    @foreach($lessons as $lesson)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h3 class="text-2xl font-bold text-gray-800">{{ $lesson->subject->name }}</h3>
                                    
                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                                        <div>
                                            <p class="text-sm text-gray-600">Datum & Tijd</p>
                                            <p class="text-gray-900 font-semibold">{{ $lesson->start_time->format('d-m-Y H:i') }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600">Duur</p>
                                            <p class="text-gray-900 font-semibold">{{ $lesson->duration_minutes }} minuten</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600">Locatie</p>
                                            <p class="text-gray-900 font-semibold">{{ $lesson->location }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600">Prijs</p>
                                            <p class="text-gray-900 font-semibold">€ {{ number_format($lesson->price, 2, ',', '.') }}</p>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <span class="inline-block px-3 py-1 rounded-full text-sm font-medium {{ $lesson->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                            {{ $lesson->is_active ? 'Actief' : 'Inactief' }}
                                        </span>
                                    </div>
                                </div>

                                <div class="flex gap-2">
                                    <a href="{{ route('lessons.edit', $lesson) }}" class="px-3 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">
                                        Bewerk
                                    </a>
                                    <form action="{{ route('lessons.destroy', $lesson) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze les wilt verwijderen?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                            Verwijder
                                        </button>
                                    </form>
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
