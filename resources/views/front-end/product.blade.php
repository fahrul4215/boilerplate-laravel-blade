<x-front-end-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="w-full">
        <div class="py-12 w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    <livewire:front-end.product-component :c_id="$product->category_id" :p_id="$product->id" @cartUpdated="$refresh" />
                </div>
            </div>
        </div>
    </div>
</x-front-end-layout>
