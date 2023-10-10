<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Elective Subject') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form action="{{ route('colleague.store') }}" class="mt-6" method="POST">
        @csrf
        <div class="grid xl:grid-cols-5 grid-cols-2 gap-4">
            @foreach($subjects as $subject)
            <div class="w-full flex items-center justify-center">
                @if (array_search($subject->name, $takenSubjects) > -1)
                <label for="{{ $subject->name }}" class="text-center w-full rounded-xl bg-gray-100 py-1 px-3 h-fit text-gray-800 {{ $subject->name }} active:ring-2 ring-offset-2">{{ $subject->name }}</label>
                    @if (!isset($show))
                    <input name="elective_subject[{{ $loop->index }}]" type="checkbox" id="{{ $subject->name }}" class="hidden" value="{{ $subject->id }}" checked>
                    @endif
                @else
                <label for="{{ $subject->name }}" class="text-center w-full rounded-xl bg-gray-100 py-1 px-3 h-fit text-gray-800 active:ring-2 ring-offset-2">{{ $subject->name }}</label>
                    @if (!isset($show))
                    <input name="elective_subject[{{ $loop->index }}]" type="checkbox" id="{{ $subject->name }}" class="hidden" value="{{ $subject->id }}">
                    @endif
                @endif
            </div>
            @endforeach
        </div>

        @if (!isset($show))
        <div class="flex items-center gap-4 mt-6">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'subject-sync')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
        @endif
    </form>
</section>
