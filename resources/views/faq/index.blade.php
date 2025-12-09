<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lernie FAQ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased">

    <nav class="bg-white shadow p-4 mb-8">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-6">
                <a href="/" class="text-xl font-bold text-blue-600">Lernie</a>
                <a href="{{ route('news.index') }}" class="text-gray-600 hover:text-blue-600">Nieuws</a>
                <a href="{{ route('faq.index') }}" class="font-bold text-blue-600">FAQ</a>
            </div>
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-blue-600 font-semibold">Mijn Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 px-3">Log in</a>
                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-blue-600 px-3">Registreer</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4 pb-20">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-2">Veelgestelde Vragen</h1>
        <p class="text-center text-gray-500 mb-10">Hier vind je antwoorden op de meest voorkomende vragen.</p>

        @foreach($categories as $category)
            
            <div class="mb-8">
                <h2 class="text-xl font-bold text-blue-800 mb-4 border-b border-blue-100 pb-2">
                    {{ $category->name }}
                </h2>

                <div class="space-y-4">
                    @foreach($category->questions as $question)
                        
                        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                            <details class="group">
                                <summary class="flex justify-between items-center font-medium cursor-pointer list-none p-4 bg-white hover:bg-gray-50 text-gray-800">
                                    <span>{{ $question->question }}</span>
                                    <span class="transition group-open:rotate-180">
                                        <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                                    </span>
                                </summary>
                                <div class="text-gray-600 p-4 border-t border-gray-100 bg-gray-50">
                                    {{ $question->answer }}
                                </div>
                            </details>
                        </div>

                    @endforeach
                </div>
            </div>

        @endforeach

        @if($categories->isEmpty())
            <p class="text-center text-gray-500">Er zijn nog geen vragen gevonden.</p>
        @endif
    </div>

</body>
</html>