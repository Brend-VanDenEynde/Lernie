<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Beschikbare Lessen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header met uitleg -->
            <div class="mb-6 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg shadow-lg p-6 text-white">
                <h3 class="text-2xl font-bold mb-2">Vind je perfecte bijles!</h3>
                <p class="text-blue-100">Hieronder vind je alle lessen van je tutoren in de onderwerpen die je volgt.</p>
            </div>

            @if($lessons->count() > 0)
                <!-- Filter opties -->
                <div class="mb-6 bg-white rounded-lg shadow-sm p-4">
                    <h4 class="font-semibold text-gray-700 mb-3">Filter op onderwerp:</h4>
                    <div class="flex flex-wrap gap-2">
                        <button onclick="filterLessons('all')" class="filter-btn px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition font-medium">
                            Alle onderwerpen
                        </button>
                        @foreach($subjects as $subject)
                            <button onclick="filterLessons('{{ $subject->id }}')" class="filter-btn px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-medium">
                                {{ $subject->name }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Lessen Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($lessons as $lesson)
                        <div class="lesson-card bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border-t-4 border-blue-500" data-subject-id="{{ $lesson->subject_id }}">
                            <!-- Lesson Header -->
                            <div class="bg-gradient-to-r from-blue-50 to-purple-50 p-5 border-b border-gray-200">
                                <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $lesson->subject->name }}</h3>
                                <div class="flex items-center text-sm text-gray-600">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span class="font-medium">{{ $lesson->tutor->name }}</span>
                                </div>
                            </div>

                            <!-- Lesson Details -->
                            <div class="p-5 space-y-3">
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-gray-500 font-medium">Datum & Tijd</p>
                                        <p class="text-gray-900 font-semibold">{{ $lesson->start_time->format('d-m-Y') }}</p>
                                        <p class="text-gray-700">{{ $lesson->start_time->format('H:i') }} uur</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-gray-500 font-medium">Duur</p>
                                        <p class="text-gray-900 font-semibold">{{ $lesson->duration_minutes }} minuten</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-purple-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-gray-500 font-medium">Locatie</p>
                                        <p class="text-gray-900 font-semibold">{{ $lesson->location }}</p>
                                    </div>
                                </div>

                                @if($lesson->description)
                                    <div class="pt-3 border-t border-gray-200">
                                        <p class="text-sm text-gray-600">{{ Str::limit($lesson->description, 100) }}</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Price and Action -->
                            <div class="bg-gray-50 px-5 py-4 flex items-center justify-between border-t border-gray-200">
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Prijs</p>
                                    <p class="text-2xl font-bold text-blue-600">€ {{ number_format($lesson->price, 2, ',', '.') }}</p>
                                </div>
                                <a href="{{ route('student.lessons.show', $lesson) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition font-medium shadow-sm">
                                    Meer info
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Geen lessen beschikbaar -->
                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    @if(auth()->user()->subjects->count() === 0)
                        <div class="mb-6">
                            <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Je bent nog niet ingeschreven voor onderwerpen</h3>
                        <p class="text-gray-600 mb-6">Schrijf je in voor onderwerpen om beschikbare lessen te zien.</p>
                        <a href="{{ route('profile.edit') }}" class="inline-block px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition font-medium shadow-sm">
                            Onderwerpen toevoegen
                        </a>
                    @else
                        <div class="mb-6">
                            <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Geen lessen beschikbaar</h3>
                        <p class="text-gray-600">Er zijn momenteel geen actieve lessen beschikbaar voor je onderwerpen. Kom later terug!</p>
                    @endif
                </div>
            @endif
        </div>
    </div>

    @if($lessons->count() > 0)
        <script>
            function filterLessons(subjectId) {
                const cards = document.querySelectorAll('.lesson-card');
                const buttons = document.querySelectorAll('.filter-btn');
                
                // Update button styles
                buttons.forEach(btn => {
                    btn.classList.remove('bg-blue-500', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-700');
                });
                event.target.classList.remove('bg-gray-200', 'text-gray-700');
                event.target.classList.add('bg-blue-500', 'text-white');
                
                // Filter cards
                cards.forEach(card => {
                    if (subjectId === 'all' || card.dataset.subjectId === subjectId) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }
        </script>
    @endif
</x-app-layout>
