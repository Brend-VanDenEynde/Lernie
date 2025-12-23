<x-public-layout>
    <!-- Page Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Veelgestelde Vragen
            </h1>
        </div>
    </div>

    <!-- FAQ Content -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto space-y-12">
                @forelse ($categories as $category)
                    <div class="divide-y-2 divide-gray-200">
                        <h2 class="text-2xl font-bold text-gray-900">
                            {{ $category->name }}
                        </h2>
                        <dl class="mt-6 space-y-6 divide-y divide-gray-200">
                            @forelse ($category->questions as $question)
                                <div class="pt-6">
                                    <dt class="text-lg">
                                        <button type="button" class="text-left w-full flex justify-between items-start text-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-controls="faq-{{ $question->id }}" aria-expanded="false" onclick="toggleFaq('faq-{{ $question->id }}')">
                                            <span class="font-medium text-gray-900">
                                                {{ $question->question }}
                                            </span>
                                            <span class="ml-6 h-7 flex items-center">
                                                <svg class="rotate-0 h-6 w-6 transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" id="icon-{{ $question->id }}">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </span>
                                        </button>
                                    </dt>
                                    <dd class="mt-2 pr-12 hidden" id="faq-{{ $question->id }}">
                                        <p class="text-base text-gray-500">
                                            {{ $question->answer }}
                                        </p>
                                    </dd>
                                </div>
                            @empty
                                <div class="pt-6 text-gray-500 italic">
                                    Geen vragen in deze categorie.
                                </div>
                            @endforelse
                        </dl>
                    </div>
                @empty
                    <div class="text-center text-gray-500">
                        Geen categorieën gevonden.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        function toggleFaq(id) {
            var element = document.getElementById(id);
            var icon = document.getElementById('icon-' + id.replace('faq-', ''));
            if (element.classList.contains('hidden')) {
                element.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                element.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        }
    </script>
</x-public-layout>