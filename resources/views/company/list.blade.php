<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Partnered Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Search --}}
                    <input type="text" class="block w-5/6 mx-auto border-0 rounded-xl bg-gray-100 mb-4" placeholder="Search">
                    
                    {{-- Subject List --}}
                    <h3 class="pb-4">{{ __('Companies Available - ') . count($companies) }}</h3>
                        
                    <div class="grid xl:grid-cols-3 grid-cols-1 mb-10 gap-6">
                        @foreach ($companies as $company)
                            <a class="transition-all hover:border rounded-xl hover:scale-105 hover:shadow-sm shadow-md p-4 flex flex-col gap-2"  href="{{ route('internship.show', $company->id) }}">
                                
                                <div class="flex justify-start items-center gap-4">
                                    {{-- Logo --}}
                                    <div class="w-14 p-2 rounded-xl border border-gray-300 flex-none"><img src="{{ asset("assets/images/berita-5.webp") }}" alt="logo SI"></div>
                                    {{-- Company --}}
                                    <div class="flex flex-col">
                                        <h2 class="text-lg font-semibold">{{ $company->name }}</h2>
                                        <div class="text-sm text-sky-700 xl:block hidden">{{ $company->website }}</div>
                                    </div>
                                </div>
                                <div class="text-sm text-sky-700 block xl:hidden">{{ $company->website }}</div>
                                <div class="text-sm text-gray-600">{{ $company->address }}</div>
                                <div class="flex items-center gap-4">

                                    @if (count($company->users) > 3)
                                        <div class="flex">
                                            @for ($i = 0; $i < 2; $i++)
                                            <div class="overflow-hidden rounded-full -mr-3 border-4 border-white bg-gray-500 w-8 h-8 flex justify-center items-center text-white"><img src="{{ asset("assets/images/Profile_avatar_placeholder_large.webp") }}" alt=""></div>
                                            @endfor
                                            <div class="overflow-hidden rounded-full -mr-3 border-4 border-white bg-gray-500 px-2 h-8 flex justify-center items-center text-white text-sm">{{ '+' . ((int)count($company->users) - 2) }}</div>
                                        </div>
                                    @elseif(count($company->users) > 0)
                                        <div class="flex">
                                            @foreach ($company->users as $user)
                                            <div class="overflow-hidden rounded-full -mr-3 border-4 border-white bg-gray-500 w-8 h-8 flex justify-center items-center text-white"><img src="{{ asset("assets/images/Profile_avatar_placeholder_large.webp") }}" alt=""></div>
                                            @endforeach
                                        </div>
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
