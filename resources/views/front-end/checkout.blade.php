<x-front-end-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full grid grid-cols-1 md:grid-cols-5 gap-4">
                    <div class="col-span-5 md:col-span-3">
                        <h2 class="text-xl font-bold">Checkout</h2>
                        <form action="{{ route('checkout.post') }}" method="POST">
                            @csrf
                            <div class="mt-4">
                                <label for="buyer_name" class="block text-sm font-medium text-gray-700">
                                    Full Name
                                </label>
                                <div class="mt-1">
                                    <input type="text" name="buyer_name" id="buyer_name"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        required>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label for="buyer_wa" class="block text-sm font-medium text-gray-700">
                                    WhatsApp Number
                                </label>
                                <div class="mt-1">
                                    <input type="tel" name="buyer_wa" id="buyer_wa"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        required>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label for="buyer_address" class="block text-sm font-medium text-gray-700">
                                    Address
                                </label>
                                <div class="mt-1">
                                    <input type="text" name="buyer_address" id="buyer_address"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        required>
                                </div>
                            </div>

                            <div class="mt-4 flex justify-end">
                                <button type="submit"
                                    class="bg-green-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-600">
                                    Proceed to Checkout
                                </button>
                            </div>

                        </form>
                    </div>
                    <ul class="col-span-5 md:col-span-2">
                        Order Summary
                        @foreach ($cart as $index => $item)
                            <li class="grid grid-cols-4 gap-1 border-black border-b border-solid py-2">
                                <div class="col-span-1 mx-auto">
                                    @php
                                        $imgSrc = Vite::asset('resources/images/logo-trans.png');
                                        if (count($item['images'] ?? []) > 0) {
                                            $imgSrc = Storage::url($item['images'][0]->path ?? '');
                                        }
                                    @endphp
                                    <img src="{{ $imgSrc }}" class="h-24 w-24 object-cover rounded">
                                </div>
                                <div class="text-left text-lg col-span-2">
                                    <span class="font-medium">{{ $item['name'] ?? '' }}</span><br>
                                    <span class="text-red-500">{{ config('app.currency', '$') }}
                                        {{ $item['discounted_price'] ?? '' }}</span><br>
                                    <span class="">Qty: {{ $item['quantity'] ?? '' }}</span>
                                </div>
                                <div class="col-span-1 flex justify-end">
                                    <span class="text-red-500">{{ config('app.currency', '$') }}
                                        {{ $item['sub_total'] ?? '' }}</span><br>
                                </div>
                            </li>
                        @endforeach
                        <li class="flex justify-end">
                            <div class="text-left text-lg col-span-2">
                                <span class="font-medium">Total</span><br>
                                <span class="text-red-500">{{ config('app.currency', '$') }}
                                    {{ array_sum(array_column($cart, 'sub_total')) }}</span><br>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-front-end-layout>
