<?php

namespace App\Livewire\FrontEnd;

use App\Models\CategoryProduct;
use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductComponent extends Component
{
    public $cartItems = [];
    public $product;

    public $c_id, $p_id;
    public $isModalOpen = false;
    public $query = '', $orderBy = 'created_at', $orderDir = 'desc';
    public $send_qty = 0;

    public function mount()
    {
        $this->refreshData();
    }

    public function updating()
    {
        $this->refreshData();
    }

    public function render()
    {
        $this->refreshData();

        return view('livewire.front-end.product-component', [
            'product' => $this->product,
        ]);
    }

    public function search()
    {
        $this->resetPage();
    }

    #[On('refresh-product')]
    function refreshData()
    {
        $this->product = Product::find($this->p_id);
    }

    private function resetInputFields()
    {
        $this->reset([
            'query'
        ]);
    }

    public function SendQtyPlus()
    {
        $this->send_qty += 1;
        if ($this->send_qty > $this->product->stock) {
            $this->send_qty = $this->product->stock;
        }
    }

    public function SendQtyMinus()
    {
        $this->send_qty -= 1;
        if ($this->send_qty < 0) {
            $this->send_qty = 0;
        }
    }

    public function AddToCart()
    {
        if ($this->send_qty > 0) {
            $cart = session()->get('cart', []);

            // Searching for "id" in the "product_id" column
            $column = array_column($cart, 'product_id');
            $key = array_search($this->product->id, $column);

            if ($key !== false) {
                if (array_key_exists($key, $cart)) {
                    $cart[$key]['quantity'] += $this->send_qty;
                    $cart[$key]['sub_total'] = $this->product->discounted_price * $cart[$key]['quantity'];
                }
            } else {
                array_push($cart, [
                    'product_id' => $this->product->id,
                    'name' => $this->product->name,
                    'price' => $this->product->price,
                    'discount' => $this->product->discount,
                    'discounted_price' => $this->product->discounted_price,
                    'stock' => $this->product->stock,
                    'quantity' => $this->send_qty,
                    'images' => $this->product->images,
                    'sub_total' => $this->product->discounted_price * $this->send_qty
                ]);
            }

            session()->put('cart', $cart);
            $this->dispatch('cartUpdated');
        }
    }
}
