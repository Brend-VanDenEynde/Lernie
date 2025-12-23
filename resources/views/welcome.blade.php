@php
    use App\Models\NewsPost;
    use App\Models\FaqCategory;

    $newsPosts = NewsPost::latest()->take(3)->get();
    $generalCategory = FaqCategory::where('name', 'Algemeen')->with('questions')->first();
    $faqQuestions = $generalCategory ? $generalCategory->questions : collect();
@endphp

<x-public-layout>
    <!-- Hero Section -->
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    <polygon points="50,0 100,0 50,100 0,100" />
                </svg>

                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">Welkom bij</span>
                            <span class="block text-indigo-600 xl:inline">Lernie</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Het platform voor al je leermiddelen en informatie. Ontdek het laatste nieuws en vind antwoorden op je vragen.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="{{ route('news.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                    Bekijk Nieuws
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="{{ route('faq.index') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                                    Naar FAQ
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80" alt="Team working">
        </div>
    </div>

    <!-- News Section -->
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Laatste Nieuws
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Blijf op de hoogte van de laatste ontwikkelingen.
                </p>
            </div>
            <div class="mt-12 grid gap-5 max-w-lg mx-auto lg:grid-cols-3 lg:max-w-none">
                @forelse ($newsPosts as $post)
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <div class="flex-shrink-0">
                            @if($post->image)
                                <img class="h-48 w-full object-cover" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                            @else
                                <div class="h-48 w-full bg-gray-200 flex items-center justify-center text-gray-400">
                                    <svg class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <a href="{{ route('news.show', $post) }}" class="block mt-2">
                                    <p class="text-xl font-semibold text-gray-900">
                                        {{ $post->title }}
                                    </p>
                                    <p class="mt-3 text-base text-gray-500">
                                        {{ Str::limit($post->content, 100) }}
                                    </p>
                                </a>
                            </div>
                            <div class="mt-6 flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="sr-only">Published on</span>
                                    <p class="text-sm font-medium text-gray-900">
                                        {{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-500">
                        Geen nieuwsberichten gevonden.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto divide-y-2 divide-gray-200">
                <h2 class="text-center text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Veelgestelde Vragen (Algemeen)
                </h2>
                <dl class="mt-6 space-y-6 divide-y divide-gray-200">
                    @forelse ($faqQuestions as $question)
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
                        <div class="pt-6 text-center text-gray-500">
                            Geen algemene vragen gevonden.
                        </div>
                    @endforelse
                </dl>
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