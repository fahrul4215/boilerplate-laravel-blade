<?php

namespace App\Livewire\FrontEnd;

use Livewire\Component;

class Cart extends Component
{
    public $cartItems = [];
    public $showModal = false;

    protected $listeners = ['cartUpdated' => 'render'];

    public function mount()
    {
        // Load the cart from session or database
        $this->cartItems = session()->get('cart', []);
    }

    public function addToCart($item)
    {
        // Add logic to add item to cart
        array_push($this->cartItems, $item);
        session()->put('cart', $this->cartItems);
        $this->dispatch('cartUpdated');
    }

    public function removeFromCart($index)
    {
        // Remove item from cart
        unset($this->cartItems[$index]);
        session()->put('cart', $this->cartItems);
        $this->dispatch('cartUpdated');
    }

    public function productIncrease($index)
    {
        if (array_key_exists($index, $this->cartItems)) {
            $this->cartItems[$index]['quantity'] += 1;
            if ($this->cartItems[$index]['quantity'] > $this->cartItems[$index]['stock']) {
                $this->cartItems[$index]['quantity'] = $this->cartItems[$index]['stock'];
            }
            $this->cartItems[$index]['sub_total'] = $this->cartItems[$index]['discounted_price'] * $this->cartItems[$index]['quantity'];
            session()->put('cart', $this->cartItems);
            $this->dispatch('cartUpdated');
        }
    }

    public function productDecrease($index)
    {
        if (array_key_exists($index, $this->cartItems)) {
            $this->cartItems[$index]['quantity'] -= 1;
            if ($this->cartItems[$index]['quantity'] < 0) {
                $this->cartItems[$index]['quantity'] = 0;
            }
            $this->cartItems[$index]['sub_total'] = $this->cartItems[$index]['discounted_price'] * $this->cartItems[$index]['quantity'];
            session()->put('cart', $this->cartItems);
            $this->dispatch('cartUpdated');
        }
    }

    public function checkout()
    {
        return redirect()->route('checkout');
    }

    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
    }

    public function render()
    {
        return view('livewire.front-end.cart');
    }
}
