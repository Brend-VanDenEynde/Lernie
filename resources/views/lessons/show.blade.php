<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('lessons.index') }}" class="text-gray-600 hover:text-gray-900 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Les Details
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Les Informatie -->
                <div class="lg:col-span-2">
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg mb-6">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-green-500 to-green-600 p-8 text-white">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h1 class="text-3xl font-bold mb-2">{{ $lesson->subject->name }}</h1>
                                    <p class="text-green-100">Les ID: #{{ $lesson->id }}</p>
                                </div>
                                <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold {{ $lesson->is_active ? 'bg-white text-green-600' : 'bg-gray-200 text-gray-800' }}">
                                    {{ $lesson->is_active ? 'Actief' : 'Inactief' }}
                                </span>
                            </div>
                        </div>

                        <!-- Les Details -->
                        <div class="p-8 space-y-6">
                            <!-- Datum & Tijd -->
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="flex-grow">
                                    <h3 class="text-lg font-semibold text-gray-900">Datum & Tijd</h3>
                                    <p class="text-gray-600 mt-1">{{ $lesson->start_time->isoFormat('dddd D MMMM YYYY') }}</p>
                                    <p class="text-gray-600">{{ $lesson->start_time->format('H:i') }} uur</p>
                                </div>
                            </div>

                            <!-- Duur -->
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-grow">
                                    <h3 class="text-lg font-semibold text-gray-900">Duur</h3>
                                    <p class="text-gray-600 mt-1">{{ $lesson->duration_minutes }} minuten</p>
                                </div>
                            </div>

                            <!-- Locatie -->
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-grow">
                                    <h3 class="text-lg font-semibold text-gray-900">Locatie</h3>
                                    <p class="text-gray-600 mt-1">{{ $lesson->location }}</p>
                                </div>
                            </div>

                            <!-- Prijs -->
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-grow">
                                    <h3 class="text-lg font-semibold text-gray-900">Prijs</h3>
                                    <p class="text-3xl font-bold text-green-600 mt-1">€ {{ number_format($lesson->price, 2, ',', '.') }}</p>
                                </div>
                            </div>

                            <!-- Beschrijving -->
                            @if($lesson->description)
                                <div class="border-t border-gray-200 pt-6">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Beschrijving</h3>
                                    <p class="text-gray-700 leading-relaxed">{{ $lesson->description }}</p>
                                </div>
                            @endif

                            <!-- Acties -->
                            <div class="border-t border-gray-200 pt-6 flex gap-3">
                                <a href="{{ route('lessons.edit', $lesson) }}" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition font-medium shadow-sm">
                                    Bewerk les
                                </a>
                                <form action="{{ route('lessons.destroy', $lesson) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze les wilt verwijderen?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-6 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition font-medium shadow-sm">
                                        Verwijder les
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ingeschreven Studenten -->
                <div class="lg:col-span-1">
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg sticky top-6">
                        <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-blue-100">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900">Ingeschrevenen</h3>
                                <span class="inline-block px-3 py-1 bg-blue-500 text-white rounded-full text-sm font-bold">
                                    {{ $lesson->enrolledStudents->count() }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            @if($lesson->enrolledStudents->count() > 0)
                                <div class="space-y-4">
                                    @foreach($lesson->enrolledStudents as $student)
                                        <div class="p-4 border border-gray-200 rounded-lg hover:shadow-md transition bg-gray-50">
                                            <div class="flex items-start justify-between mb-3">
                                                <div class="flex items-center space-x-3">
                                                    @if($student->avatar)
                                                        <img src="{{ asset('storage/' . $student->avatar) }}" alt="{{ $student->name }}" class="w-10 h-10 rounded-full object-cover">
                                                    @else
                                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                                                            <span class="text-lg font-bold text-white">{{ substr($student->name, 0, 1) }}</span>
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <h4 class="font-semibold text-gray-900">{{ $student->name }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <a href="mailto:{{ $student->email }}?subject=Les {{ $lesson->subject->name }} op {{ $lesson->start_time->format('d-m-Y') }}&body=Beste {{ $student->name }},%0D%0A%0D%0A" class="w-full inline-block text-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition text-sm font-medium">
                                                <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                </svg>
                                                Contact
                                            </a>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Contact alle studenten -->
                                @php
                                    $allEmails = $lesson->enrolledStudents->pluck('email')->implode(',');
                                @endphp
                                <div class="mt-4 pt-4 border-t border-gray-200">
                                    <a href="mailto:{{ $allEmails }}?subject=Les {{ $lesson->subject->name }} op {{ $lesson->start_time->format('d-m-Y') }}" class="w-full inline-block text-center px-4 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg hover:from-green-600 hover:to-green-700 transition font-semibold shadow-lg">
                                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                                        </svg>
                                        Contacteer iedereen
                                    </a>
                                </div>
                            @else
                                <div class="text-center py-8">
                                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    <p class="text-gray-600 text-sm">Nog geen inschrijvingen</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Terug knop -->
            <div class="mt-6">
                <a href="{{ route('lessons.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition font-medium shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Terug naar overzicht
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
