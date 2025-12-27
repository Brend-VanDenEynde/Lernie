<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Mijn Vakken') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Selecteer de vakken waarvoor je bijles wilt vinden.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.subjects.update') }}" class="mt-6">
        @csrf
        @method('patch')

        @php
            $allSubjects = \App\Models\Subject::all();
            $userSubjectIds = $user->subjects->pluck('id')->toArray();
        @endphp

        <div class="space-y-3">
            @if($allSubjects->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    @foreach($allSubjects as $subject)
                        <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50 transition {{ in_array($subject->id, $userSubjectIds) ? 'border-blue-500 bg-blue-50' : 'border-gray-300' }}">
                            <input 
                                type="checkbox" 
                                name="subject_ids[]" 
                                value="{{ $subject->id }}"
                                {{ in_array($subject->id, $userSubjectIds) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 mr-3"
                            >
                            <span class="font-medium text-gray-900">{{ $subject->name }}</span>
                        </label>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 bg-gray-50 rounded-lg">
                    <p class="text-gray-600">Er zijn nog geen vakken beschikbaar.</p>
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 mt-6">
            <x-primary-button>{{ __('Vakken opslaan') }}</x-primary-button>

            @if (session('status') === 'subjects-updated')
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

    @if($user->subjects->count() > 0)
        <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
            <h3 class="font-semibold text-blue-900 mb-2">Jouw gekozen vakken:</h3>
            <div class="flex flex-wrap gap-2">
                @foreach($user->subjects as $subject)
                    <span class="inline-block px-3 py-1 bg-blue-200 text-blue-800 rounded-full text-sm font-medium">
                        {{ $subject->name }}
                    </span>
                @endforeach
            </div>
        </div>
    @endif
</section>
