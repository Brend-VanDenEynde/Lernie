<footer class="bg-gray-800 text-white border-t border-gray-700">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="xl:grid xl:grid-cols-3 xl:gap-8">
            <!-- Branding -->
            <div class="space-y-8 xl:col-span-1">
                <span class="text-2xl font-bold">Lernie</span>
                <p class="text-gray-400 text-base">
                    Het platform voor al je leermiddelen.
                </p>
            </div>
            
            <!-- Links -->
            <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                            Navigatie
                        </h3>
                        <ul class="mt-4 space-y-4">
                            <li>
                                <a href="{{ url('/') }}" class="text-base text-gray-300 hover:text-white transition">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('news.index') }}" class="text-base text-gray-300 hover:text-white transition">
                                    Nieuws
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('faq.index') }}" class="text-base text-gray-300 hover:text-white transition">
                                    FAQ
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-12 border-t border-gray-700 pt-8 text-center sm:text-left">
            <p class="text-base text-gray-400">
                &copy; {{ date('Y') }} Lernie. Alle rechten voorbehouden.
            </p>
        </div>
    </div>
</footer>
