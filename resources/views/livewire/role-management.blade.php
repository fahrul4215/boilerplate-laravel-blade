<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="space-y-6">
        <!-- Title -->
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Role Management') }}
            </h2>
        </x-slot>

        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded-md">
                {{ session('message') }}
            </div>
        @endif

        <!-- Form -->
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">
                {{ $isEditing ? 'Edit Role' : 'Create New Role' }}
            </h3>

            <form wire:submit.prevent="save" class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Role Name</label>
                    <input type="text" id="name" wire:model.defer="name"
                        class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="e.g. admin, editor, viewer">
                    @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="flex gap-2">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-md hover:bg-indigo-700 transition">
                        {{ $isEditing ? 'Update' : 'Create' }}
                    </button>
                    @if($isEditing)
                        <button type="button" wire:click="resetInput"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 text-sm font-semibold rounded-md hover:bg-gray-300 transition">
                            Cancel
                        </button>
                    @endif
                </div>
            </form>
        </div>

        <!-- Table -->
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Roles</h3>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left font-medium text-gray-600">Name</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($roles as $role)
                            <tr>
                                <td class="px-4 py-2 text-gray-800">{{ $role->name }}</td>
                                <td class="px-4 py-2 flex gap-2">
                                    <button wire:click="edit({{ $role->id }})"
                                        class="inline-flex items-center px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white font-medium rounded-md transition">
                                        Edit
                                    </button>
                                    <button wire:click="delete({{ $role->id }})"
                                        class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white font-medium rounded-md transition"
                                        onclick="return confirm('Are you sure you want to delete this role?')">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-4 py-4 text-center text-gray-500">
                                    No roles available.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>