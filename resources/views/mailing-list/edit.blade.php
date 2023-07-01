<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Nuova mailing list') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('mailing_list.update', $mailingList) }}">
            @csrf
            @method('put')

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="pb-8">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $mailingList->name)"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <x-input-label for="contacts" :value="__('Contatti')" />
                <div class="grid grid-cols-4 border border-spacing-3 px-3">
                    @foreach ($contacts as $contact)
                        <div class="flex items-center space-x-3 space-y-3">
                            <div class="pt-2  ">
                                <input type="checkbox" name="contacts[]" value="{{ $contact->id }}"
                                    {{  $mailingList->contacts->firstWhere('pivot.contact_id', $contact->id) ? "checked" : "" }}
                                    class="w-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            </div>
                            <div class="text-gray-800 dark:text-gray-200 text-md ">
                                {{ $contact->name }}
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- <div class="w-full max-w-7xl mx-auto p-6">
                    <?php echo $contacts->appends(['search' => $search ?? ''])->links(); ?>
                </div> --}}

                <div class="pt-4 text-right">
                    <x-primary-button>
                        Salva
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
