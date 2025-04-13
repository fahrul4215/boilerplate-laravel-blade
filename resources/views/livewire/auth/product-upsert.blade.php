<div class="fixed z-10 inset-0 overflow-y-auto m-auto">
    <div class="flex items-center justify-center min-h-screen">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-4xl">
            <div class="bg-white p-4">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    {{ $p_id ? 'Edit' : 'Create' }} Product
                </h3>
            </div>
            <div class="bg-gray-50 p-4">
                <form id="modalForm">
                    <div class="grid grid-cols-2 gap-6 mb-4">
                        <div class="col-span-2">
                            <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">
                                Category
                            </label>
                            <select id="category_id" wire:model="category_id"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                Name
                            </label>
                            <input type="text" id="name" wire:model="name"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('name')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="">
                            <label for="stock" class="block text-gray-700 text-sm font-bold mb-2">
                                Stock
                            </label>
                            <input type="text" id="stock" wire:model="stock"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('stock')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="">
                            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">
                                Price ({{ config('app.currency', '$') }})
                            </label>
                            <input type="text" id="price" wire:model="price"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('price')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="">
                            <label for="discount" class="block text-gray-700 text-sm font-bold mb-2">
                                Discount (%)
                            </label>
                            <input type="text" id="discount" wire:model="discount"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('discount')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="composition" class="block text-gray-700 text-sm font-bold mb-2">
                                Composition
                            </label>
                            <input type="text" id="composition" wire:model="composition"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('composition')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="">
                            <label for="weight" class="block text-gray-700 text-sm font-bold mb-2">
                                Weight ({{ config('app.weight', 'g') }})
                            </label>
                            <input type="text" id="weight" wire:model="weight"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('weight')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="">
                            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">
                                Status
                            </label>
                            <select id="status" wire:model="status"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('status')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">
                                Description
                            </label>
                            <trix-editor class="trix-content" wire:model="description"></trix-editor>
                            @error('description')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <div class="">
                                <label for="images" class="block text-gray-700 text-sm font-bold mb-2">
                                    Product Images
                                </label>
                                <input type="file" id="images" wire:model="images" multiple
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    accept="image/*">
                                @error('images.*')
                                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                @enderror

                                @if ($images)
                                    <div class="mt-4">
                                        <p class="text-gray-700">New Images Preview:</p>
                                        <div class="grid grid-cols-3 gap-4">
                                            @foreach ($images as $image)
                                                <img src="{{ $image->temporaryUrl() }}" class="h-32 w-32 object-cover">
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>

                            @if ($existingImages)
                                @if (session()->has('image-remove'))
                                    <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3"
                                        role="alert">
                                        <p class="font-bold">{{ session('image-remove') }}</p>
                                    </div>
                                @endif
                                <div class="mb-4">
                                    <p class="text-gray-700">Existing Images:</p>
                                    <div class="grid grid-cols-3 gap-4">
                                        @foreach ($existingImages as $imageId => $imagePath)
                                            <div class="relative">
                                                <img src="{{ Storage::url($imagePath) }}"
                                                    class="h-32 w-32 object-cover">
                                                <button type="button" wire:click="removeImage({{ $imageId }})"
                                                    class="absolute top-0 right-0 bg-red-500 text-white px-2 py-1 text-xs">
                                                    Remove
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <div class="bg-gray-50 p-4 flex justify-end space-x-1">
                <button wire:click="closeModal"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Close</button>
                <button wire:click="store"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save changes</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let previousContent = '';

            $(document).on('trix-change', function(event) {
                let currentContent = $(event.target).closest('trix-editor')[0].editor.getDocument()
                    .toString();

                // Only update Livewire if the content has changed (either text or formatting)
                if (previousContent !== currentContent) {
                    @this.set('content', currentContent);
                    previousContent = currentContent; // Update the previous content
                }
            });
        });
    </script>
</div>
