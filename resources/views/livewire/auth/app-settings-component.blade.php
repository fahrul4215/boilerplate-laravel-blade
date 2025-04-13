<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('App Settings') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Update your App Settings information.') }}
        </p>
    </header>

    <form wire:submit="updateAppSettings" class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('Store Name')" />
            <x-text-input wire:model="store_name" id="store_name" name="store_name" type="text" class="mt-1 block w-full"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('store_name')" />
        </div>

        <div>
            <x-input-label for="currency" :value="__('Currency Symbol')" />
            <x-text-input wire:model="currency" id="currency" name="currency" type="text" class="mt-1 block w-full"
                required autocomplete="currency" />
            <x-input-error class="mt-2" :messages="$errors->get('currency')" />
        </div>

        <div>
            <x-input-label for="weight" :value="__('Weight Unit')" />
            <x-text-input wire:model="weight" id="weight" name="weight" type="text" class="mt-1 block w-full"
                required autocomplete="weight" />
            <x-input-error class="mt-2" :messages="$errors->get('weight')" />
        </div>

        <div>
            <x-input-label for="wa_number" :value="__('WhatsApp Number')" />
            <x-text-input wire:model="wa_number" id="wa_number" name="wa_number" type="text"
                class="mt-1 block w-full" required autocomplete="wa_number" />
            <x-input-error class="mt-2" :messages="$errors->get('wa_number')" />
        </div>

        <div>
            <x-input-label for="instagram" :value="__('Instagram Link')" />
            <x-text-input wire:model="instagram" id="instagram" name="instagram" type="text"
                class="mt-1 block w-full" required autocomplete="instagram" />
            <x-input-error class="mt-2" :messages="$errors->get('instagram')" />
        </div>

        <div>
            <x-input-label for="facebook" :value="__('Facebook Link')" />
            <x-text-input wire:model="facebook" id="facebook" name="facebook" type="text" class="mt-1 block w-full"
                required autocomplete="facebook" />
            <x-input-error class="mt-2" :messages="$errors->get('facebook')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="app-settings-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
