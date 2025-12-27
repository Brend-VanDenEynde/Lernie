<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('student.lessons.index') }}" class="text-gray-600 hover:text-gray-900 transition">
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
                <!-- Hoofdinformatie Les -->
                <div class="lg:col-span-2">
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-8 text-white">
                            <h1 class="text-3xl font-bold mb-2">{{ $lesson->subject->name }}</h1>
                            <p class="text-blue-100">Les door {{ $lesson->tutor->name }}</p>
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
                                    <p class="text-3xl font-bold text-blue-600 mt-1">€ {{ number_format($lesson->price, 2, ',', '.') }}</p>
                                </div>
                            </div>

                            <!-- Beschrijving -->
                            @if($lesson->description)
                                <div class="border-t border-gray-200 pt-6">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Beschrijving</h3>
                                    <p class="text-gray-700 leading-relaxed">{{ $lesson->description }}</p>
                                </div>
                            @endif

                            <!-- Status -->
                            <div class="border-t border-gray-200 pt-6">
                                <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold {{ $lesson->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $lesson->is_active ? 'Actief' : 'Inactief' }}
                                </span>
                            </div>

                            <!-- Success/Info Messages -->
                            @if(session('success'))
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('info'))
                                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative">
                                    {{ session('info') }}
                                </div>
                            @endif

                            <!-- Enrollment Button -->
                            @if($lesson->is_active)
                                <div class="border-t border-gray-200 pt-6">
                                    @if($isEnrolled)
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span class="text-green-600 font-semibold">Je bent ingeschreven!</span>
                                            </div>
                                            <form action="{{ route('student.lessons.unenroll', $lesson) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-6 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 transition font-medium shadow">
                                                    Uitschrijven
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <form action="{{ route('student.lessons.enroll', $lesson) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="w-full px-6 py-4 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg hover:from-green-600 hover:to-green-700 transition font-bold shadow-lg text-lg">
                                                Inschrijven voor deze les
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Docent Informatie -->
                <div class="lg:col-span-1">
                    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg sticky top-6">
                        <div class="p-6 border-b border-gray-200 bg-gray-50">
                            <h3 class="text-lg font-semibold text-gray-900">Over de docent</h3>
                        </div>
                        
                        <div class="p-6 space-y-4">
                            <!-- Avatar -->
                            <div class="flex justify-center">
                                @if($lesson->tutor->avatar)
                                    <img src="{{ asset('storage/' . $lesson->tutor->avatar) }}" alt="{{ $lesson->tutor->name }}" class="w-32 h-32 rounded-full object-cover border-4 border-blue-500 shadow-lg">
                                @else
                                    <div class="w-32 h-32 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center border-4 border-blue-500 shadow-lg">
                                        <span class="text-4xl font-bold text-white">{{ substr($lesson->tutor->name, 0, 1) }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Naam -->
                            <div class="text-center">
                                <h4 class="text-xl font-bold text-gray-900">{{ $lesson->tutor->name }}</h4>
                                <p class="text-sm text-gray-500 mt-1">Docent</p>
                            </div>

                            <!-- Email -->
                            <div class="flex items-center space-x-3 text-sm">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-gray-600">{{ $lesson->tutor->email }}</span>
                            </div>

                            <!-- Contact Button -->
                            <div class="pt-4">
                                <a href="mailto:{{ $lesson->tutor->email }}?subject=Vraag over les {{ $lesson->subject->name }} op {{ $lesson->start_time->format('d-m-Y') }}&body=Beste {{ $lesson->tutor->name }},%0D%0A%0D%0AIk heb een vraag over de les {{ $lesson->subject->name }}.%0D%0A%0D%0A" class="w-full inline-block text-center px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 transition font-semibold shadow-lg">
                                    <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Contact docent
                                </a>
                            </div>

                            <!-- Stad -->
                            @if($lesson->tutor->city)
                                <div class="flex items-center space-x-3 text-sm">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="text-gray-600">{{ $lesson->tutor->city }}</span>
                                </div>
                            @endif

                            <!-- Bio -->
                            @if($lesson->tutor->about_me)
                                <div class="border-t border-gray-200 pt-4">
                                    <h5 class="font-semibold text-gray-900 mb-2">Over mij</h5>
                                    <p class="text-sm text-gray-700 leading-relaxed">{{ $lesson->tutor->about_me }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Terug knop onderaan -->
            <div class="mt-6">
                <a href="{{ route('student.lessons.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition font-medium shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Terug naar alle lessen
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
