<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lernie Nieuws</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

    <nav class="bg-white shadow p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-blue-600">Lernie</a>
            <div>
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 px-3">Log in</a>
                <a href="{{ route('register') }}" class="text-gray-600 hover:text-blue-600 px-3">Registreer</a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-10 px-4">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Laatste Nieuws</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            @foreach($newsPosts as $post)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-48 bg-blue-100 flex items-center justify-center text-blue-400">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </div>
                    
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">
                            {{ $post->published_at->format('d-m-Y') }}
                        </div>
                        
                        <h2 class="text-xl font-bold mb-2 text-gray-800">
                            {{ $post->title }}
                        </h2>
                        
                        <p class="text-gray-600 mb-4">
                            {{ Str::limit($post->content, 100) }}
                        </p>
                        
                        <a href="#" class="text-blue-600 font-semibold hover:text-blue-800">
                            Lees meer &rarr;
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

</body>
</html>