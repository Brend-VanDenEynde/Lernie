<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Onderwerp Toevoegen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <form action="{{ route('tutor.subjects.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Alle beschikbare onderwerpen -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-4">
                            Selecteer onderwerpen
                        </label>
                        <div class="space-y-3">
                            @php
                                $allSubjects = \App\Models\Subject::all();
                                $mySubjectIds = auth()->user()->subjects->pluck('id')->toArray();
                            @endphp
                            
                            @forelse($allSubjects as $subject)
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-purple-400 hover:bg-purple-50 cursor-pointer transition">
                                    <input type="checkbox" name="subject_ids[]" value="{{ $subject->id }}" 
                                        @if(in_array($subject->id, $mySubjectIds)) checked @endif
                                        class="w-5 h-5 text-purple-600 rounded">
                                    <span class="ml-4 text-gray-800 font-semibold text-lg">{{ $subject->name }}</span>
                                </label>
                            @empty
                                <div class="text-center py-8">
                                    <p class="text-gray-500 text-lg">Geen onderwerpen beschikbaar</p>
                                </div>
                            @endforelse
                        </div>
                        @error('subject_ids')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Knoppen -->
                    <div class="flex gap-4 pt-6">
                        <a href="{{ route('tutor.dashboard') }}" class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition text-center">
                            Annuleren
                        </a>
                        <button type="submit" class="flex-1 px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 font-medium transition">
                            Onderwerpen Opslaan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
