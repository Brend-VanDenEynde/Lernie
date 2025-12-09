<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Type user -->
        <div class="mb-4">
            <x-input-label for="role" :value="__('Ik wil me registreren als')" />
            <div class="flex gap-4">
                <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50 has-[:checked]:border-blue-500 has-[:checked]:bg-blue-50">
                    <input type="radio" name="role" value="student" class="mr-2 text-blue-600 focus:ring-blue-500" checked>
                    <span class="font-semibold">Student</span>
                </label>
                <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50 has-[:checked]:border-blue-500 has-[:checked]:bg-blue-50">
                    <input type="radio" name="role" value="tutor" class="mr-2 text-blue-600 focus:ring-blue-500">
                    <span class="font-semibold">Bijlesgever</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Naam')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Stad / Gemeente -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('Stad / Gemeente')" />
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <!-- Geboortedatum (nieuw) -->
        <div class="mt-4">
            <x-input-label for="birthday" :value="__('Geboortedatum')" />
            <x-text-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" :value="old('birthday')" />
            <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Bio / Over mij (alleen voor tutors zichtbaar) -->
        <div id="bio-section" class="mt-4 hidden">
            <x-input-label for="about_me" :value="__('Over mij (verplicht voor bijlesgevers)')" />
            <textarea id="about_me" name="about_me" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md">{{ old('about_me') }}</textarea>
            <x-input-error :messages="$errors->get('about_me')" class="mt-2" />
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Wachtwoord')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Bevestig Wachtwoord')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Heeft u al een account?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registreer') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleInputs = document.querySelectorAll('input[name="role"]');
        const bioSection = document.getElementById('bio-section');

        function updateBioVisibility() {
            const selectedRole = document.querySelector('input[name="role"]:checked').value;
            if (selectedRole === 'tutor') {
                bioSection.classList.remove('hidden');
            } else {
                bioSection.classList.add('hidden');
            }
        }

        // Run on page load
        updateBioVisibility();

        // Run on change
        roleInputs.forEach(input => {
            input.addEventListener('change', updateBioVisibility);
        });
    });
</script>
