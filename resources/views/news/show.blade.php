<x-public-layout>
    <div class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
                {{ $newsPost->title }}
            </h1>
            <p class="mt-2 text-sm text-gray-500">
                Gepubliceerd op {{ $newsPost->published_at ? $newsPost->published_at->format('d M Y') : $newsPost->created_at->format('d M Y') }}
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @if($newsPost->image)
                <img class="w-full h-96 object-cover" src="{{ asset('storage/' . $newsPost->image) }}" alt="{{ $newsPost->title }}">
            @else
                <div class="w-full h-96 bg-gray-200 flex items-center justify-center text-gray-400">
                    <svg class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            @endif

            <div class="p-6 bg-white border-b border-gray-200 prose max-w-none">
                {!! nl2br(e($newsPost->content)) !!}
            </div>

            <div class="p-6 bg-gray-50 flex justify-between">
                <a href="{{ route('news.index') }}" class="text-indigo-600 hover:text-indigo-900 font-medium">
                    &larr; Terug naar overzicht
                </a>
            </div>
        </div>
    </div>
</x-public-layout>
