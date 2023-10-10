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

                    {{-- Family Detail --}}
                    <h3 class="pb-4 font-bold text-3xl">{{ $family->name }}</h3>
                    <div class="grid xl:grid-cols-3 grid-cols-2 gap-4 max-w-2xl mb-4">
                        <div class="xl:col-span-3 col-span-2">
                            <h4 class="text-gray-500">Description</h4>
                            <p class="text-xl text-gray-800">{{ $family->desc ?: "description is not available."  }}</p>
                        </div>
                        <div  class="xl:col-span-1 col-span-2">
                            <h4 class="text-gray-500">Major</h4>
                            <p class="text-xl text-gray-800">Sistem Informasi</p>
                        </div>
                        <div>
                            <h4 class="text-gray-500">Elective Subjects</h4>
                            <p class="text-xl text-gray-800">{{ count($subjects) }}</p>
                        </div>
                        <div>
                            <h4 class="text-gray-500">Students</h4>
                            <p class="text-xl text-gray-800">{{ $students }}</p>
                        </div>
                    </div>

                    
                    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                        <ul class="flex flex-wrap xl:justify-start justify-evenly -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                            @foreach ($subjects as $subject)
                            <li class="mr-2" role="presentation">
                                <button class="inline-block py-4 px-8 border-b-2 rounded-t-lg" id="{{ $subject->name . "-tab" }}" data-tabs-target="{{ "#" . $subject->name }}" type="button" role="tab" aria-controls="{{ $subject->name }}" aria-selected="false">{{ $subject->name }}</button>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="myTabContent">
                        @foreach ($subjects as $subject)
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg" id="{{ $subject->name }}" role="tabpanel" aria-labelledby="{{ $subject->name . "-tab" }}">
                            <table class="w-full min-w-[700px] text-sm text-left text-gray-500 dark:text-gray-400 xl:table-fixed table-auto">
                                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    {{ $subject->name }}
                                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
                                </caption>
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            NIM
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Major
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Entry Year
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Subjects
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Show</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($subject->users()->orderBy('entry_year', 'DESC')->get() as $colleague)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $colleague->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $colleague->nim }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $colleague->major }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $colleague->entry_year }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ count($colleague->subjects) . " Elective Subjects" }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="{{ route('colleague.show', $colleague->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" colspan="6" class="text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            no collague available.
                                        </th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
