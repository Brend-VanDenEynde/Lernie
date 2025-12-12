<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profiel Informatie') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Werk je accountprofielinformatie, e-mailadres en profieldetails bij.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Huidige Avatar -->
        @if($user->avatar)
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Huidige profielfoto</label>
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="w-20 h-20 rounded-full object-cover mt-2 border">
            </div>
        @endif

        <!-- Avatar Upload -->
        <div>
            <x-input-label for="avatar" :value="__('Profielfoto')" />
            <input id="avatar" name="avatar" type="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <!-- Bio Alleen voor tutors -->
        @if($user->role === 'tutor')
            <div>
                <x-input-label for="about_me" :value="__('Over mij (Bio)')" />
                <textarea id="about_me" name="about_me" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Vertel studenten wie je bent en wat je geeft...">{{ old('about_me', $user->about_me) }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('about_me')" />
            </div>
        @endif

        <!-- Naam -->
        <div>
            <x-input-label for="name" :value="__('Naam')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('E-mailadres')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Je e-mailadres is niet geverifieerd.') }}
                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Klik hier om de verificatie-e-mail opnieuw te verzenden.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Er is een nieuwe verificatielink verzonden naar je e-mailadres.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- City -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('Stad / Gemeente')" />
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $user->city)" required />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>

        <!-- Birthday -->
        <div class="mt-4">
            <x-input-label for="birthday" :value="__('Geboortedatum')" />
            <x-text-input id="birthday" name="birthday" type="date" class="mt-1 block w-full" :value="old('birthday', $user->birthday)" />
            <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
        </div>

        <!-- Submit -->
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Opslaan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Opgeslagen.') }}</p>
            @endif
        </div>
    </form>
</section>
