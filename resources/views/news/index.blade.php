<x-public-layout>
    <!-- Page Header -->
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Nieuws
            </h1>
        </div>
    </div>

    <!-- News Content -->
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid gap-5 max-w-lg mx-auto lg:grid-cols-3 lg:max-w-none">
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
                                    {{ Str::limit($post->content, 150) }}
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
</x-public-layout>