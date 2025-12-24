<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuwe Les Aanmaken
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <form action="{{ route('lessons.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Onderwerp -->
                    <div>
                        <label for="subject_id" class="block text-sm font-medium text-gray-700">
                            Onderwerp
                        </label>
                        <select id="subject_id" name="subject_id" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 border @error('subject_id') border-red-500 @enderror" required>
                            <option value="">Selecteer een onderwerp</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" @selected(old('subject_id') == $subject->id)>
                                    {{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('subject_id')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Beschrijving -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            Beschrijving
                        </label>
                        <textarea id="description" name="description" rows="4" placeholder="Beschrijf wat je gaat onderwijzen..." class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 border @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-sm text-gray-500">Optioneel, maximaal 1000 tekens</p>
                    </div>

                    <!-- Startdatum en -tijd -->
                    <div>
                        <label for="start_time" class="block text-sm font-medium text-gray-700">
                            Startdatum en -tijd
                        </label>
                        <input type="datetime-local" id="start_time" name="start_time" value="{{ old('start_time') }}" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 border @error('start_time') border-red-500 @enderror" required>
                        @error('start_time')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Duur (minuten) -->
                    <div>
                        <label for="duration_minutes" class="block text-sm font-medium text-gray-700">
                            Duur (in minuten)
                        </label>
                        <input type="number" id="duration_minutes" name="duration_minutes" value="{{ old('duration_minutes', 60) }}" min="15" max="480" step="15" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 border @error('duration_minutes') border-red-500 @enderror" required>
                        @error('duration_minutes')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-sm text-gray-500">Minimaal 15 minuten, maximaal 480 minuten</p>
                    </div>

                    <!-- Locatie -->
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700">
                            Locatie
                        </label>
                        <input type="text" id="location" name="location" value="{{ old('location') }}" placeholder="Bijv. Amsterdam, Bibliotheek, Online" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 border @error('location') border-red-500 @enderror" required>
                        @error('location')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Prijs -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">
                            Prijs (in Euro's)
                        </label>
                        <div class="relative mt-1">
                            <span class="absolute left-3 top-2 text-gray-600">€</span>
                            <input type="number" id="price" name="price" value="{{ old('price') }}" min="0" max="9999.99" step="0.01" placeholder="25.00" class="mt-1 block w-full pl-7 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2 border @error('price') border-red-500 @enderror" required>
                        </div>
                        @error('price')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Actief -->
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', true)) class="rounded border-gray-300 text-blue-500 shadow-sm focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-700">Deze les is actief</span>
                        </label>
                    </div>

                    <!-- Knoppen -->
                    <div class="flex gap-4 pt-6">
                        <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                            Les Aanmaken
                        </button>
                        <a href="{{ route('lessons.index') }}" class="px-6 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">
                            Annuleren
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
