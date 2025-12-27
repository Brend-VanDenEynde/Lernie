<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Docent Dashboard
            </h2>
            <div class="flex gap-3 flex-shrink-0">
                <a href="{{ route('tutor.subjects.create') }}" style="display: inline-flex; align-items: center; padding: 12px 24px; background: #7c3aed; color: white; font-weight: 700; border-radius: 8px; text-decoration: none; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    <svg style="width: 20px; height: 20px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Onderwerp
                </a>
                <a href="{{ route('lessons.create') }}" style="display: inline-flex; align-items: center; padding: 12px 24px; background: #16a34a; color: white; font-weight: 700; border-radius: 8px; text-decoration: none; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    <svg style="width: 20px; height: 20px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Nieuwe Les
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistieken -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                @php
                    $lessonCount = \App\Models\Lesson::where('tutor_id', auth()->id())->count();
                    $activeLessonCount = \App\Models\Lesson::where('tutor_id', auth()->id())->where('is_active', true)->count();
                    $upcomingLessonCount = \App\Models\Lesson::where('tutor_id', auth()->id())
                        ->where('is_active', true)
                        ->where('start_time', '>=', now())
                        ->count();
                    $subjectCount = \App\Models\Subject::whereHas('tutors', function($q) {
                        $q->where('user_id', auth()->id());
                    })->count();
                @endphp
                
                <a href="#lessons-section" class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-400 hover:shadow-lg transition cursor-pointer">
                    <h3 class="text-gray-600 text-sm font-medium">Totaal Lessen</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $lessonCount }}</p>
                </a>

                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-400">
                    <h3 class="text-gray-600 text-sm font-medium">Actieve Lessen</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $activeLessonCount }}</p>
                </div>

                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-orange-400">
                    <h3 class="text-gray-600 text-sm font-medium">Komende Lessen</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $upcomingLessonCount }}</p>
                </div>

                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-purple-400">
                    <h3 class="text-gray-600 text-sm font-medium">Onderwerpen</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $subjectCount }}</p>
                </div>
            </div>

            <!-- Mijn Lessen -->
            <div id="lessons-section" class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-800">Mijn Lessen</h2>
                </div>
                <div class="p-6">
                    @php
                        $lessons = \App\Models\Lesson::where('tutor_id', auth()->id())
                            ->with('subject')
                            ->orderBy('start_time', 'desc')
                            ->get();
                    @endphp

                    @if($lessons->count() > 0)
                        <div class="space-y-3">
                            @foreach($lessons as $lesson)
                                <div class="p-4 bg-gradient-to-r from-slate-50 to-slate-100 rounded-lg border border-slate-300 hover:shadow-md transition">
                                    <div class="flex justify-between items-start gap-4">
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center gap-3 mb-2">
                                                <h3 class="font-bold text-gray-900 text-base">{{ $lesson->subject->name }}</h3>
                                                <span class="inline-block px-2 py-1 rounded text-xs font-semibold {{ $lesson->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-300 text-gray-700' }}">
                                                    {{ $lesson->is_active ? 'ACTIEF' : 'INACTIEF' }}
                                                </span>
                                                @php
                                                    $enrolledCount = $lesson->enrolledStudents()->count();
                                                @endphp
                                                @if($enrolledCount > 0)
                                                    <span class="inline-block px-2 py-1 rounded text-xs font-semibold bg-blue-100 text-blue-700">
                                                        {{ $enrolledCount }} ingeschreven
                                                    </span>
                                                @endif
                                            </div>
                                            
                                            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-2">
                                                <div class="text-sm">
                                                    <p class="text-gray-500 font-medium">Datum</p>
                                                    <p class="text-gray-900 font-semibold">{{ $lesson->start_time->format('d-m-Y H:i') }}</p>
                                                </div>
                                                <div class="text-sm">
                                                    <p class="text-gray-500 font-medium">Duur</p>
                                                    <p class="text-gray-900 font-semibold">{{ $lesson->duration_minutes }} min</p>
                                                </div>
                                                <div class="text-sm">
                                                    <p class="text-gray-500 font-medium">Locatie</p>
                                                    <p class="text-gray-900 font-semibold">{{ $lesson->location }}</p>
                                                </div>
                                                <div class="text-sm">
                                                    <p class="text-gray-500 font-medium">Prijs</p>
                                                    <p class="text-gray-900 font-bold text-base">€ {{ number_format($lesson->price, 2, ',', '.') }}</p>
                                                </div>
                                            </div>

                                            @if($lesson->description)
                                                <div class="mt-2 p-2 bg-white rounded border-l-2 border-slate-400">
                                                    <p class="text-sm text-gray-700"><strong>Beschrijving:</strong> {{ Str::limit($lesson->description, 100) }}</p>
                                                </div>
                                            @endif

                                            @if($enrolledCount > 0)
                                                <div class="mt-3 p-3 bg-blue-50 rounded border border-blue-200">
                                                    <p class="text-sm font-semibold text-blue-900 mb-2">Ingeschreven studenten:</p>
                                                    <div class="flex flex-wrap gap-2">
                                                        @foreach($lesson->enrolledStudents as $student)
                                                            <span class="inline-block px-2 py-1 bg-blue-200 text-blue-800 rounded-full text-xs font-semibold">
                                                                {{ $student->name }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="flex gap-2 flex-shrink-0">
                                            <a href="{{ route('lessons.show', $lesson) }}" class="px-3 py-2 bg-green-500 text-white rounded text-sm font-medium hover:bg-green-600 transition">
                                                Details
                                            </a>
                                            <a href="{{ route('lessons.edit', $lesson) }}" class="px-3 py-2 bg-blue-500 text-white rounded text-sm font-medium hover:bg-blue-600 transition">
                                                Bewerk
                                            </a>
                                            <form action="{{ route('lessons.destroy', $lesson) }}" method="POST" onsubmit="return confirm('Verwijderen?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded text-sm font-medium hover:bg-red-600 transition">
                                                    Verwijder
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <p class="text-gray-600 mb-6 text-lg">Je hebt nog geen lessen aangemaakt.</p>
                            <a href="{{ route('lessons.create') }}" class="inline-block px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition shadow">
                                Maak je eerste les aan
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Mijn Onderwerpen -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800">Onderwerpen waar je les in geeft</h2>
                </div>
                <div class="p-6">
                    @php
                        $subjects = \App\Models\Subject::whereHas('tutors', function($query) {
                            $query->where('user_id', auth()->id());
                        })->with('students')->get();
                    @endphp

                    @if($subjects->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($subjects as $subject)
                                <div class="p-4 border-2 border-slate-200 rounded-lg bg-gradient-to-br from-purple-50 to-slate-50 hover:border-purple-400 transition">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="font-bold text-gray-900 text-lg">{{ $subject->name }}</h3>
                                        <form action="{{ route('tutor.subjects.detach', $subject) }}" method="POST" onsubmit="return confirm('Van dit onderwerp af?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-xs px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                Verwijder
                                            </button>
                                        </form>
                                    </div>
                                    <p class="text-sm text-gray-600 font-medium">
                                         {{ $subject->students->count() }} student{{ $subject->students->count() != 1 ? 'en' : '' }} ingeschreven
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <p class="text-gray-600 mb-6 text-lg">Je geeft nog geen lessen in onderwerpen.</p>
                            <a href="{{ route('tutor.subjects.create') }}" class="inline-block px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition shadow">
                                Voeg onderwerpen toe
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
