<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="space-y-6">
        <!-- Title -->
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users Management') }}
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
                {{ $isEditing ? 'Edit User' : 'Create New User' }}
            </h3>

            <form wire:submit.prevent="save" class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" wire:model.defer="name"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" wire:model.defer="email"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('email') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" wire:model.defer="password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        @if($isEditing) placeholder="Leave blank to keep current password" @endif>
                    @error('password') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                        Password</label>
                    <input type="password" id="password_confirmation" wire:model.defer="password_confirmation"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        @if($isEditing) placeholder="Leave blank to keep current password" @endif>
                    @error('password_confirmation') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                </div>

                <div class="flex gap-2">
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-md hover:bg-indigo-700 transition">
                        {{ $isEditing ? 'Update' : 'Create' }}
                    </button>
                    @if($isEditing)
                        <button type="button" wire:click="resetInput"
                            class="px-4 py-2 bg-gray-200 text-sm rounded-md hover:bg-gray-300">
                            Cancel
                        </button>
                    @endif
                </div>
            </form>
        </div>

        <!-- User Table -->
        <div class="bg-white shadow rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">User List</h3>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Role</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($users as $user)
                            <tr>
                                <td class="px-4 py-2">{{ $user->name }}</td>
                                <td class="px-4 py-2">{{ $user->email }}</td>
                                <td class="px-4 py-2">{{ $user->role }}</td>
                                <td class="px-4 py-2 flex gap-2">
                                    <button wire:click="edit({{ $user->id }})"
                                        class="px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white rounded-md">
                                        Edit
                                    </button>
                                    <button wire:click="delete({{ $user->id }})"
                                        class="px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white rounded-md"
                                        onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-4 text-center text-gray-500">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>