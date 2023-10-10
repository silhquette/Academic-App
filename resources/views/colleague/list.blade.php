<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Colleague') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Search --}}
                    <input type="text" class="block w-5/6 mx-auto border-0 rounded-xl bg-gray-100 mb-4" placeholder="Search">
                    
                    {{-- Colleague List --}}
                    <h3 class="mb-4">{{ __('Collague Available - ') . count($users) }}</h3>
                    <div class="flex flex-col">
                        @foreach ($users as $user)
                            <a class="w-full xl:p-4 py-4 flex justify-between items-center border-t hover:bg-gray-50 transition-all" href="{{ route('colleague.show', $user->id) }}">
                                {{-- User Data --}}
                                <div class="flex flex-col">
                                    <div class="font-semibold">{{ $user->name }}</div>
                                    <span class="text-gray-500">{{ $user->major . ' ' . $user->entry_year }}</span>
                                </div>

                                {{-- Subject Info --}}
                                <div class="gap-4 xl:flex hidden">
                                    @foreach($user->subjects as $subject)
                                    <div class="rounded-xl bg-gray-100 py-1 px-3 h-fit text-sm text-gray-800 {{ $subject->name }}">{{ $subject->name }}</div>
                                    @endforeach
                                </div>
                                <div class="gap-4 xl:hidden flex">
                                    @if (count($user->subjects) > 1)
                                    <div class="rounded-xl bg-gray-100 py-1 px-3 h-fit text-sm text-gray-800 {{ $subject->name }}">{{ $subject->name }}</div>
                                    <div class="rounded-xl bg-gray-100 py-1 px-3 h-fit text-sm text-gray-800">{{ '+' . (int)count($user->subjects) - 1 }}</div>
                                    @elseif (count($user->subjects) > 0)
                                    <div class="rounded-xl bg-gray-100 py-1 px-3 h-fit text-sm text-gray-800 {{ $subject->name }}">{{ $subject->name }}</div>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
