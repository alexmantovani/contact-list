<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Nuovo contatto') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex sm:justify-center items-center sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

            <form method="POST" action="{{ route('contact.store') }}">
                @csrf

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="pb-8">
                        <x-input-label for="name" :value="__('Nome')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="pb-8">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                            :value="old('email')" required autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="pb-8">
                        <x-input-label for="phone" :value="__('Telefono')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                            :value="old('phone')" autocomplete="phone" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <div class="pb-8">
                        <x-input-label for="note" :value="__('Note')" />
                        <x-text-input id="note" class="block mt-1 w-full" type="text" name="note"
                            :value="old('note')" autocomplete="note" />
                        <x-input-error :messages="$errors->get('note')" class="mt-2" />
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
