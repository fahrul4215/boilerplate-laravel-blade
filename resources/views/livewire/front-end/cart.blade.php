<div class="select-none">
    <a wire:click="toggleModal" class="pl-3 inline-block no-underline hover:text-black" href="#">
        <svg class="inline-block fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24">
            <path
                d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
            <circle cx="10.5" cy="18.5" r="1.5" />
            <circle cx="17.5" cy="18.5" r="1.5" />
        </svg>
        ({{ count($cartItems) }})
    </a>

    <!-- Cart Modal -->
    @if ($showModal)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">Shopping Cart</h2>
                    <button wire:click="toggleModal" class="text-red-500 hover:text-red-700">&times;</button>
                </div>

                <!-- Cart items -->
                @if (empty($cartItems))
                    <p class="text-gray-500">Your cart is empty</p>
                @else
                    <ul class="space-y-4">
                        @foreach ($cartItems as $index => $item)
                            <li class="flex justify-between items-center border-b py-2">
                                @php
                                    $imgSrc = Vite::asset('resources/images/logo-trans.png');
                                    if (count($item['images'] ?? []) > 0) {
                                        $imgSrc = Storage::url($item['images'][0]->path ?? '');
                                    }
                                @endphp
                                <img src="{{ $imgSrc }}" class="h-16 w-16 object-cover rounded">
                                <div class="text-left text-lg">
                                    <span class="font-medium">{{ $item['name'] ?? '' }}</span><br>
                                    <span class="text-red-500">{{ config('app.currency', '$') }}
                                        {{ $item['discounted_price'] ?? '' }}</span><br>
                                    <i class="text-xs cursor-pointer fa-solid fa-circle-minus"
                                        wire:click="productDecrease({{ $index }})"></i>
                                    <span class="">{{ $item['quantity'] ?? '' }}</span>
                                    <i class="text-xs cursor-pointer fa-solid fa-circle-plus"
                                        wire:click="productIncrease({{ $index }})"></i>
                                </div>
                                <button wire:click="removeFromCart({{ $index }})"
                                    class="text-red-500 hover:text-red-700">
                                    {{-- Remove --}}
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-4 text-lg font-semibold">
                        Total: {{ config('app.currency', '$') }} {{ array_sum(array_column($cartItems, 'sub_total')) }}
                    </div>
                @endif

                <!-- Buttons -->
                <div class="mt-6 flex justify-end">
                    <button wire:click="toggleModal"
                        class="px-4 py-2 bg-gray-500 text-white rounded-lg mr-2 hover:bg-gray-700">
                        Close
                    </button>
                    <button class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700"
                        wire:click="checkout">
                        Checkout
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
