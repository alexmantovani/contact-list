<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Nuova campagna') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

            <form method="POST" action="{{ route('campaign.store') }}">
                @csrf

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="pb-8">
                        <x-input-label for="name" :value="__('Nome')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="pb-8">
                        <select name="mailing_list_id"
                            class="form-control w-full rounded bg-gray-50 dark:bg-gray-800 mt-1 dark:text-white">
                            <option value="0">
                                Seleziona la mailing list...
                            </option>
                            @foreach ($mailingLists as $mailingList)
                                <option value="{{ $mailingList->id }}"
                                    {{-- {{ $mailing_list_id == $mailingList->id ? 'selected' : '' }} --}}
                                    >
                                    {{ $mailingList->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="pb-8">
                        <x-input-label for="subject" :value="__('Oggetto')" />
                        <x-text-input id="subject" class="block mt-1 w-full" type="text" name="subject"
                            :value="old('subject')" required autocomplete="subject" />
                        <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                    </div>

                    <div class="pb-8">
                        <x-input-label for="body" :value="__('Corpo del messaggio')" />
                        <x-text-input id="body" class="block mt-1 w-full" type="text" name="body"
                            :value="old('body')" required autocomplete="note" />
                        <x-input-error :messages="$errors->get('body')" class="mt-2" />
                    </div>

                    <div class="pt-4 text-right">
                        <x-primary-button>
                            Salva
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
