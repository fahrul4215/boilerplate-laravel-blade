<div class="container mx-auto px-2 max-w-full">
    <div class="py-2">
        @if (session()->has('message'))
            <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3" role="alert">
                <p class="font-bold">{{ session('message') }}</p>
            </div>
        @endif
        <div class="my-2 flex sm:flex-row flex-col space-x-1">
            <button wire:click="create()"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-0.5">
                ADD
            </button>
            <form wire:submit="search" class="m-0.5">
                <div class="block relative">
                    <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg class="h-4 w-4 fill-current text-gray-500" viewBox="0 0 24 24">
                            <path d="M10 20a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12z"></path>
                            <path
                                d="M16.32 15.9l5.38 5.38-1.42 1.42-5.38-5.38a8.06 8.06 0 01-4.72 1.56A8 8 0 1120 12a7.94 7.94 0 01-1.56 4.72z">
                            </path>
                        </svg>
                    </span>
                    <input placeholder="Search"
                        class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none"
                        wire:model="query" />
                </div>
            </form>
        </div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full bg-white shadow-md rounded-lg">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600 w-10">No.</th>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">Name</th>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">Category</th>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">Stock</th>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">
                                Price ({{ config('app.currency', '$') }})
                            </th>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">Discount</th>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">Composition</th>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">
                                Weight ({{ config('app.weight', 'g') }})
                            </th>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">Images</th>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">Status</th>
                            <th class="py-2 px-4 bg-gray-200 font-bold uppercase text-sm text-gray-600">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $value)
                            <tr>
                                <td class="py-2 px-4 border-b text-center">
                                    {{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}
                                </td>
                                <td class="py-2 px-4 border-b">
                                    {{ $value->name ?? '' }}
                                </td>
                                <td class="py-2 px-4 border-b">
                                    {{ $value->category->name ?? '' }}
                                </td>
                                <td class="py-2 px-4 border-b text-center">
                                    {{ $value->stock ?? 0 }}
                                </td>
                                <td class="py-2 px-4 border-b text-center">
                                    {{ $value->price ?? 0 }}
                                </td>
                                <td class="py-2 px-4 border-b text-center">
                                    {{ $value->discount ?? 0 }}%
                                </td>
                                <td class="py-2 px-4 border-b">
                                    {{ $value->composition ?? '' }}
                                </td>
                                <td class="py-2 px-4 border-b text-center">
                                    {{ $value->weight ?? 0 }}
                                </td>
                                <td class="py-2 px-4 border-b text-center">
                                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">
                                        @foreach ($value->images ?? [] as $image)
                                            <a href="{{ Storage::url($image->path) }}" class="image-popup">
                                                <img src="{{ Storage::url($image->path) }}"
                                                    class="h-16 w-16 object-cover rounded">
                                            </a>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b text-center uppercase">
                                    @if ($value->status ?? 0 == 1)
                                        <span
                                            class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                            Active
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">
                                            Inactive
                                        </span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b text-center">
                                    <button wire:click="edit({{ $value->id ?? '' }})"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 m-0.5 rounded w-20">
                                        Edit
                                    </button>
                                    <button wire:click="delete({{ $value->id ?? '' }})"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 m-0.5 rounded w-20">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div
                    class="px-5 py-5 bg-white border-t flex flex-col items-end xs:flex-row xs:items-center xs:justify-between">
                    <div class="inline-flex mt-2 xs:mt-0">
                        {{ $data->links() }}
                    </div>
                </div>

                @if ($isModalOpen)
                    @include('livewire.auth.product-upsert')
                @endif
            </div>
        </div>
    </div>
</div>
