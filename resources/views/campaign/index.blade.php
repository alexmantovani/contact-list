<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Campagne') }}
            </h2>
            <div>
                <a href="{{ route('campaign.create') }}">
                    <x-secondary-button>
                        Nuova campagna
                    </x-secondary-button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-1 md:py-12">
        <div class="max-w-7xl mx-auto px-1 sm:px-6 lg:px-8">
            <div>
                @if (session()->has('message'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 my-3 rounded relative"
                        role="alert">
                        <span class="block sm:inline">
                            {{ session('message') }}
                        </span>
                    </div>
                @endif
            </div>

            <table class="table-auto w-full md:px-16">
                <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-200 dark:bg-gray-800">
                    <tr>
                        <th class="p-1 whitespace-nowrap">
                            <div class="font-semibold text-left">Nome</div>
                        </th>
                        <th class="p-1 ">
                            <div class="font-semibold text-right">Contatti</div>
                        </th>
                        <th class="p-1 ">
                            <div class="font-semibold text-right">Spedita</div>
                        </th>
                        <th></th>
                    </tr>
                </thead>

                <tbody class="text-sm divide-y divide-gray-200 dark:divide-gray-800">

                    @foreach ($campaigns as $campaign)
                        <tr class="">
                            <td>
                                <a class="text-gray-800 font-semibold dark:text-gray-200 py-2 text-md md:text-lg"
                                    href="{{ route('campaign.edit', $campaign) }}">
                                    {{ $campaign->name }}
                                </a>
                            </td>
                            <td class="p-2 md:table-cell">
                                <div class="text-gray-600 dark:text-gray-400 text-md md:text-lg text-right">
                                    {{ $campaign->mailingList->contacts->count() }}
                                </div>
                            </td>
                            <td class="p-2 md:table-cell">
                                <div class="text-gray-600 dark:text-gray-400 text-md md:text-lg text-right">
                                    {{ $campaign->sent_at->translatedFormat('d M Y') }}
                                </div>
                            </td>
                            <td class="w-8 px-3">
                                <a href="{{ route('campaign.send', $campaign) }}"
                                    onclick="return confirm('Vuoi davvero inviare la mail di questa campagna?');">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                    </svg>
                                </a>
                            </td>
                            {{-- <td class="w-8">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </td> --}}
                            <td class="w-6">
                                <form method="POST" action="{{ route('campaign.destroy', $campaign) }}" class="pt-1"
                                    onclick="return confirm('Vuoi davvero eliminare questa campagna?');">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </form>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
