<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Contatti') }}
            </h2>
            <div>
                <x-secondary-button>
                    Nuovo contatto
                </x-secondary-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div> --}}

            <table class="table-auto w-full md:px-16">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Nome</div>
                        </th>
                        <th class="p-2 ">
                            <div class="font-semibold text-left">Email</div>
                        </th>
                        <th class="p-2 hidden md:table-cell">
                            <div class="font-semibold text-left">Telefono</div>
                        </th>
                        <th class="p-2 hidden md:table-cell">
                            <div class="font-semibold text-left">Note</div>
                        </th>
                        <th></th>
                    </tr>
                </thead>

                <tbody class="text-sm divide-y divide-gray-200 dark:divide-gray-800">

                    @foreach ($contacts as $contact)
                        <tr class="">
                            <td>
                                <div class="text-gray-800 font-semibold dark:text-gray-200 py-2 text-md">
                                    {{ $contact->name }}
                                </div>
                            </td>
                            <td>
                                <div class="text-gray-600 font-semibold dark:text-gray-400">
                                    {{ $contact->email }}
                                </div>
                            </td>
                            <td>
                                <div class="text-gray-600 font-semibold dark:text-gray-400">
                                {{ $contact->phone }}
                                </div>
                            </td>
                            <th class="p-2 md:table-cell">
                                <div class="text-gray-600 font-semibold dark:text-gray-400">
                                    {{ $contact->note }}
                                </div>
                            </th>
                            <td class="">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                  </svg>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
