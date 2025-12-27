<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mijn Inschrijvingen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-6 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg shadow-lg p-6 text-white">
                <h3 class="text-2xl font-bold mb-2">Jouw Ingeschreven Lessen</h3>
                <p class="text-purple-100">Hier vind je alle lessen waarvoor je bent ingeschreven.</p>
            </div>

            @if($enrolledLessons->count() > 0)
                <!-- Lessen Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($enrolledLessons as $lesson)
                        <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border-t-4 border-purple-500">
                            <!-- Lesson Header -->
                            <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-5 border-b border-gray-200">
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
                                    <svg class="w-5 h-5 text-purple-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                    <svg class="w-5 h-5 text-blue-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm text-gray-500 font-medium">Locatie</p>
                                        <p class="text-gray-900 font-semibold">{{ $lesson->location }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="bg-gray-50 px-5 py-4 border-t border-gray-200">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-2xl font-bold text-purple-600">€ {{ number_format($lesson->price, 2, ',', '.') }}</span>
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                        Ingeschreven
                                    </span>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <a href="{{ route('student.lessons.show', $lesson) }}" class="px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600 transition font-medium shadow-sm text-center text-sm">
                                        Details
                                    </a>
                                    <a href="mailto:{{ $lesson->tutor->email }}?subject=Vraag over les {{ $lesson->subject->name }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition font-medium shadow-sm text-center text-sm">
                                        Contact
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Geen inschrijvingen -->
                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    <div class="mb-6">
                        <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Je bent nog niet ingeschreven voor lessen</h3>
                    <p class="text-gray-600 mb-6">Bekijk beschikbare lessen en schrijf je in voor een les.</p>
                    <a href="{{ route('student.lessons.index') }}" class="inline-block px-6 py-3 bg-purple-500 text-white rounded-lg hover:bg-purple-600 transition font-medium shadow-sm">
                        Bekijk beschikbare lessen
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
