<x-public-layout>
    <div class="py-12 bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg mb-6">
                <div class="p-8">
                    <div class="flex flex-col md:flex-row gap-6 items-start">
                        <!-- Avatar -->
                        <div class="flex-shrink-0">
                            @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" 
                                     class="w-32 h-32 rounded-full object-cover border-4 border-indigo-100 shadow-md">
                            @else
                                <div class="w-32 h-32 rounded-full bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center border-4 border-indigo-100 shadow-md">
                                    <span class="text-4xl font-bold text-white">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <!-- Profile Info -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-3 mb-3">
                                <h1 class="text-3xl font-bold text-gray-900">{{ $user->name }}</h1>
                                
                                @if($user->role === 'admin')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        Admin
                                    </span>
                                @elseif($user->role === 'tutor')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                                        </svg>
                                        Docent
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                                        </svg>
                                        Student
                                    </span>
                                @endif
                            </div>

                            @if($user->city)
                                <div class="flex items-center text-gray-600 mb-2">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span class="text-sm font-medium">{{ $user->city }}</span>
                                </div>
                            @endif

                            @if($user->birthday)
                                <div class="flex items-center text-gray-600 mb-4">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="text-sm font-medium">{{ \Carbon\Carbon::parse($user->birthday)->format('d F Y') }}</span>
                                </div>
                            @endif

                            @if($user->about_me)
                                <div class="mt-4">
                                    <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide mb-2">Over mij</h3>
                                    <p class="text-gray-700 leading-relaxed">{{ $user->about_me }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Subjects for Tutors -->
            @if($user->role === 'tutor' && $user->subjects->count() > 0)
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg mb-6">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                            </svg>
                            Onderwerpen
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach($user->subjects as $subject)
                                <div class="p-4 bg-gradient-to-br from-indigo-50 to-purple-50 border-2 border-indigo-200 rounded-lg hover:shadow-md transition">
                                    <div class="flex items-center justify-center">
                                        <h3 class="font-bold text-indigo-900 text-lg">{{ $subject->name }}</h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Subjects for Students -->
            @if($user->role === 'student' && $user->subjects->count() > 0)
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg mb-6">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                            </svg>
                            Interesse in
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-wrap gap-3">
                            @foreach($user->subjects as $subject)
                                <span class="inline-block px-4 py-2 bg-gray-100 text-gray-800 rounded-full text-sm font-semibold border border-gray-300">
                                    {{ $subject->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Lessons for Tutors -->
            @if($user->role === 'tutor' && $user->lessons->count() > 0)
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            Aankomende Lessen
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            @foreach($user->lessons->where('is_active', true)->where('start_time', '>=', now())->take(5) as $lesson)
                                <div class="p-5 bg-gradient-to-r from-green-50 to-blue-50 border-l-4 border-green-500 rounded-lg hover:shadow-md transition">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1">
                                            <h3 class="font-bold text-gray-900 text-lg mb-2">{{ $lesson->subject->name }}</h3>
                                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 text-sm">
                                                <div>
                                                    <p class="text-gray-500 font-medium">Datum</p>
                                                    <p class="text-gray-900 font-semibold">{{ $lesson->start_time->format('d-m-Y') }}</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 font-medium">Tijd</p>
                                                    <p class="text-gray-900 font-semibold">{{ $lesson->start_time->format('H:i') }}</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 font-medium">Duur</p>
                                                    <p class="text-gray-900 font-semibold">{{ $lesson->duration_minutes }} min</p>
                                                </div>
                                                <div>
                                                    <p class="text-gray-500 font-medium">Prijs</p>
                                                    <p class="text-green-700 font-bold">€ {{ number_format($lesson->price, 2, ',', '.') }}</p>
                                                </div>
                                            </div>
                                            @if($lesson->description)
                                                <p class="text-gray-600 text-sm mt-3">{{ Str::limit($lesson->description, 150) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if($user->lessons->where('is_active', true)->where('start_time', '>=', now())->count() === 0)
                                <div class="text-center py-8">
                                    <p class="text-gray-500">Geen aankomende lessen op dit moment.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <!-- Back Button -->
            <div class="mt-6 text-center">
                <a href="{{ url()->previous() }}" class="inline-flex items-center px-6 py-3 bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 transition shadow">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Terug
                </a>
            </div>
        </div>
    </div>
</x-public-layout>
