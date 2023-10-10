<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            @if (isset($show))
                <x-text-input id="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" readonly/>
            @else
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="nim" :value="__('NIM (Nomor Induk Mahasiswa)')" />
            @if (isset($show))
                <x-text-input id="nim" type="text" class="mt-1 block w-full" :value="old('nim', $user->nim)" readonly/>
            @else
                <x-text-input id="nim" name="nim" type="text" class="mt-1 block w-full" :value="old('nim', $user->nim)" required autocomplete="nim" />
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('nim')" />
        </div>

        <div>
            <x-input-label for="major" :value="__('Major')" />
            @if (isset($show))
                <x-text-input id="major" type="text" class="mt-1 block w-full" :value="old('major', $user->major)" readonly/>
            @else
                <select id="major" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" :selected="old('major', $user->major)" name="major" required autofocus autocomplete="major">
                    <option value="{{ $user->major }}" selected hidden>{{ $user->major }}</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Informatika">Informatika</option>
                </select>
            @endif
            <x-input-error :messages="$errors->get('entry_year')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="entry_year" :value="__('Entry Year')" />
            @if (isset($show))
                <x-text-input id="entry_year" type="text" class="mt-1 block w-full" :value="old('entry_year', $user->entry_year)" readonly/>
            @else
                <select id="entry_year" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" :selected="old('major', $user->major)" name="entry_year" required autofocus autocomplete="entry_year">
                    <option value="{{ $user->entry_year }}" selected hidden>{{ $user->entry_year }}</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                </select>
            @endif
            <x-input-error :messages="$errors->get('entry_year')" class="mt-2" />
        </div>
    </form>
</section>
