<x-public-layout>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="mb-4 text-center">
                 <h2 class="text-2xl font-bold text-gray-900">Wachtwoord Vergeten</h2>
            </div>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Wachtwoord vergeten? Geen probleem. Geef je e-mailadres op en we sturen je een link om je wachtwoord opnieuw in te stellen zodat je een nieuw wachtwoord kunt kiezen.') }}
            </div>

            <!-- Statusbericht -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- E-mailadres -->
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('E-mailadres')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Stuur link om wachtwoord te resetten') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-public-layout>
