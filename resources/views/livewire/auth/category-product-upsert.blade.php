<div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class="bg-white p-4">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    {{ $p_id ? 'Edit' : 'Create' }} Category Product
                </h3>
            </div>
            <div class="bg-gray-50 p-4">
                <form id="modalForm">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" id="name" wire:model="name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('name')
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="bg-gray-50 p-4 flex justify-end space-x-1">
                <button wire:click="closeModal"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Close</button>
                <button wire:click="store"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save changes</button>
            </div>
        </div>
    </div>
</div>
