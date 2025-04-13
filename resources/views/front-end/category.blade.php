<x-front-end-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="bg-white container mx-auto flex items-center flex-wrap pt-4 pb-12">
            <livewire:front-end.category-component :c_id="$category->id" />
        </div>
    </div>
</x-front-end-layout>
