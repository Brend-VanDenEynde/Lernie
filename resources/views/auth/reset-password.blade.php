<x-public-layout>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="mb-4 text-center">
                 <h2 class="text-2xl font-bold text-gray-900">Wachtwoord Resetten</h2>
            </div>
            
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Wachtwoord reset token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- E-mailadres -->
                <div>
                    <x-input-label for="email" :value="__('E-mailadres')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Nieuw wachtwoord -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Nieuw wachtwoord')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Bevestig nieuw wachtwoord -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Bevestig nieuw wachtwoord')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Wachtwoord resetten') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-public-layout>
