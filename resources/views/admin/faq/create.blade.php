<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nieuwe FAQ Vraag') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.faq.store') }}">
                        @csrf

                        <!-- Category -->
                        <div class="mb-4">
                            <x-input-label for="faq_category_id" :value="__('Categorie')" />
                            <select id="faq_category_id" name="faq_category_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('faq_category_id')" class="mt-2" />
                        </div>

                        <!-- Question -->
                        <div>
                            <x-input-label for="question" :value="__('Vraag')" />
                            <x-text-input id="question" class="block mt-1 w-full" type="text" name="question" :value="old('question')" required autofocus />
                            <x-input-error :messages="$errors->get('question')" class="mt-2" />
                        </div>

                        <!-- Answer -->
                        <div class="mt-4">
                            <x-input-label for="answer" :value="__('Antwoord')" />
                            <textarea id="answer" name="answer" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="5" required>{{ old('answer') }}</textarea>
                            <x-input-error :messages="$errors->get('answer')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Aanmaken') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
