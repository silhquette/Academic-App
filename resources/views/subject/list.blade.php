<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Elective Subject') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Search --}}
                    <input type="text" class="block w-5/6 mx-auto border-0 rounded-xl bg-gray-100 mb-4" placeholder="Search">
                    
                    {{-- Subject List --}}
                    <h3 class="pb-4">{{ __('Elective Subject Available - ') . $countSubjects }}</h3>

                    @foreach ($categories as $subjects)
                        <h4 class="text-xl font-semibold">{{ $subjects->first()->family->name }}</h4>
                        <h5 class="text-gray-400">{{ $subjects->first()->family->excerpt ?: "description is not available." }}</h5>
                        
                        <div class="grid xl:grid-cols-4 grid-cols-1 xl:mx-0 mx-10 mb-10 mt-4 gap-6">
                            @foreach ($subjects as $subject)
                                <a class="transition-all hover:border rounded-xl hover:scale-105 hover:shadow-sm shadow-md p-4 flex flex-col gap-2"  href="{{ route('subject.show', $subject->family_id . '#' . $subject->name) }}">
                                    {{-- Subject --}}
                                    <div class="flex justify-between items-center">
                                        <h2 class="text-lg font-semibold">{{ $subject->name }}</h2>
                                        @if (array_search($subject->name, $takenSubjects))
                                            <label class="inline-block px-4 py-1 rounded-l-full rounded-r-full text-sm bg-green-100 text-green-600">Taken</label>
                                        @endif
                                    </div>
    
                                    <div class="flex items-center gap-4">
                                        {{-- Major --}}
                                        <div class="w-11 p-2 rounded-xl border border-gray-300"><img src="{{ asset("assets/images/berita-5.webp") }}" alt="logo SI"></div>
                                        
                                        {{-- People --}}
                                        @if (count($subject->users) > 3)
                                            <i class="fa-solid fa-arrow-right-arrow-left"></i>
                                            <div class="flex">
                                                @for ($i = 0; $i < 2; $i++)
                                                <div class="overflow-hidden rounded-full -mr-3 border-4 border-white bg-gray-500 w-8 h-8 flex justify-center items-center text-white"><img src="{{ asset("assets/images/Profile_avatar_placeholder_large.webp") }}" alt=""></div>
                                                @endfor
                                                <div class="overflow-hidden rounded-full -mr-3 border-4 border-white bg-gray-500 px-2 h-8 flex justify-center items-center text-white text-sm">{{ '+' . ((int)count($subject->users) - 2) }}</div>
                                            </div>
                                        @elseif(count($subject->users) > 0)
                                            <i class="fa-solid fa-arrow-right-arrow-left"></i>
                                            <div class="flex">
                                                @foreach ($subject->users as $user)
                                                <div class="overflow-hidden rounded-full -mr-3 border-4 border-white bg-gray-500 w-8 h-8 flex justify-center items-center text-white"><img src="{{ asset("assets/images/Profile_avatar_placeholder_large.webp") }}" alt=""></div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
