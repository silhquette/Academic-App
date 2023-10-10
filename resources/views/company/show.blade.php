<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Internship on ') . $company->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Company Detail --}}
                    <h3 class="pb-4 font-bold text-3xl">{{ $company->name }}</h3>
                    <div class="grid xl:grid-cols-3 grid-cols-2 gap-4 max-w-2xl mb-4">
                        <div class="xl:col-span-3 col-span-2">
                            <h4 class="text-gray-500">Address</h4>
                            <p class="text-xl text-gray-800">{{ $company->address ?: "address is not available."  }}</p>
                        </div>
                        <div>
                            <h4 class="text-gray-500">Contact</h4>
                            <p class="text-xl text-gray-800">{{ $company->contact ?: "-"  }}</p>
                        </div>
                        <div>
                            <h4 class="text-gray-500">Person</h4>
                            <p class="text-xl text-gray-800">{{ $company->person ?: "-"  }}</p>
                        </div>
                        <div>
                            <h4 class="text-gray-500">Email</h4>
                            <p class="text-xl text-gray-800">{{ $company->email ?: "-"  }}</p>
                        </div>
                        <div>
                            <h4 class="text-gray-500">Website</h4>
                            <a class="text-xl text-sky-700" href="https://{{ $company->website ?: "#"  }}">{{ $company->website ?: "-"  }}</a>
                        </div>
                        <div>
                            <h4 class="text-gray-500">Students</h4>
                            <p class="text-xl text-gray-800">{{ count($company->users) }}</p>
                        </div>
                    </div>

                    <table class="w-full min-w-[700px] text-sm text-left text-gray-500 dark:text-gray-400 xl:table-fixed table-auto">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NIM
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Type
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Started
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Graduated
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Proposal</span>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">laporan</span>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Show</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($company->users()->orderBy('entry_year', 'DESC')->get() as $colleague)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $colleague->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $colleague->nim }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $colleague->pivot->type }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ date("d M Y", strtotime($colleague->pivot->started_at)) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ date("d M Y", strtotime($colleague->pivot->ended_at)) }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ $colleague->proposal ?: "#" }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Proposal KP</a>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ $colleague->laporan }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Laporan KP</a>
                                </td>
                                <td class="px-6 py-4 text-center">
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
            </div>
        </div>
    </div>
</x-app-layout>
