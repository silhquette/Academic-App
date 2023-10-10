<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Internship Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("This is your internship's information and company profiles.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    @forelse ($user->companies as $company)
        <form method="post" action="{{ route('internship.update', $company->id) }}" class="mt-6 grid xl:grid-cols-2 grid-cols-1 gap-6">
            @csrf
            @method('patch')

            <div class="xl:col-span-2">
                <x-input-label for="company" :value="__('Company')" />
                @if (isset($show))
                    <x-text-input id="company" type="text" class="mt-1 block w-full" :value="old('company', $company->name)" readonly/>
                @else
                    <x-text-input id="company" name="company" type="text" class="mt-1 block w-full" :value="old('company', $company->name)" required autofocus autocomplete="company" />
                @endif
                <x-input-error class="mt-2" :messages="$errors->get('company')" />
            </div>
            
            <div>
                <x-input-label for="started_at" :value="__('Started')" />
                @if (isset($show))
                    <x-text-input id="started_at" type="text" class="mt-1 block w-full" :value="old('started_at', $company->pivot->started_at)" readonly/>
                @else
                    <x-text-input id="started_at" name="started_at" type="date" class="mt-1 block w-full" value="{{ old('started_at', date_format(date_create($company->pivot->started_at), 'Y-m-d')) }}" required autofocus autocomplete="started_at" />
                @endif
                <x-input-error class="mt-2" :messages="$errors->get('started_at')" />
            </div>

            <div>
                <x-input-label for="ended_at" :value="__('Graduate')" />
                @if (isset($show))
                    <x-text-input id="ended_at" type="text" class="mt-1 block w-full" :value="old('ended_at', $company->pivot->ended_at)" readonly/>
                @else
                    <x-text-input id="ended_at" name="ended_at" type="date" class="mt-1 block w-full" value="{{ old('ended_at', date_format(date_create($company->pivot->ended_at), 'Y-m-d')) }}" required autofocus autocomplete="ended_at" />
                @endif
                <x-input-error class="mt-2" :messages="$errors->get('ended_at')" />
            </div>

            <div class="xl:col-span-2">
                <x-input-label for="type" :value="__('Intern Type')" />
                @if (isset($show))
                    <x-text-input id="type" type="text" class="mt-1 block w-full" :value="old('type', $company->pivot->type)" readonly/>
                @else
                    <select id="type" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" :selected="old('type', $company->pivot->type)" name="type" required autofocus autocomplete="type">
                        <option value="{{ $company->pivot->type }}" selected hidden>{{ $company->pivot->type }}</option>
                        <option value="Reguler">Reguler</option>
                        <option value="Konversi">Konversi</option>
                        <option value="Mandiri">Mandiri</option>
                    </select>
                @endif
                <x-input-error :messages="$errors->get('entry_year')" class="mt-2" />
            </div>

            <div class="flex flex-col gap-2">
                <x-input-label for="laporan" :value="__('Laporan KP')" />
                @if (is_null($company->pivot->laporan))
                    <div class="flex flex-col items-center justify-center gap-2 border border-gray-300 aspect-square rounded-xl cursor-not-allowed p-6 w-32 self-center">
                        <img src="{{ asset('assets/images/pdf.webp') }}" class="drop-shadow-sm" alt="pdf-icon">
                        <p class="text-xs text-red-500">Kosong</p>
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center gap-2 border border-gray-300 aspect-square rounded-xl hover:bg-gray-100 p-6 w-32 self-center">
                        <img src="{{ asset('assets/images/pdf.webp') }}" class="drop-shadow-sm" alt="pdf-icon">
                        <p class="text-xs">{{ $company->pivot->laporan }}</p>
                    </div>
                @endif

                @if (!isset($show))
                    <x-text-input id="laporan" name="laporan" type="file" class="mt-1 block w-full" value="{{ old('laporan', $company->pivot->laporan) }}" required autofocus autocomplete="laporan" />
                @endif
                <x-input-error class="mt-2" :messages="$errors->get('laporan')" />
            </div>

            <div class="flex flex-col gap-2">
                <x-input-label for="proposal" :value="__('Proposal KP')" />
                @if (is_null($company->pivot->proposal))
                    <div class="flex flex-col items-center justify-center gap-2 border border-gray-300 aspect-square rounded-xl cursor-not-allowed p-6 w-32 self-center">
                        <img src="{{ asset('assets/images/pdf.webp') }}" class="drop-shadow-sm" alt="pdf-icon">
                        <p class="text-xs text-red-500">Kosong</p>
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center gap-2 border border-gray-300 aspect-square rounded-xl hover:bg-gray-100 p-6 w-32 self-center">
                        <img src="{{ asset('assets/images/pdf.webp') }}" class="drop-shadow-sm" alt="pdf-icon">
                        <p class="text-xs">{{ $company->pivot->proposal }}</p>
                    </div>
                @endif

                @if (!isset($show))
                    <x-text-input id="proposal" name="proposal" type="file" class="mt-1 block w-full" value="{{ old('proposal', $company->pivot->proposal) }}" required autofocus autocomplete="proposal" />
                @endif
                <x-input-error class="mt-2" :messages="$errors->get('proposal')" />
            </div>
        </form>
    @empty
        
    @endforelse
</section>
