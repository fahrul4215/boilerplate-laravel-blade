<?php

namespace App\Livewire\FrontEnd;

use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination, WithoutUrlPagination;

    protected $products;

    public $isModalOpen = false;
    public $query = '', $orderBy = 'created_at', $orderDir = 'desc';

    public function render()
    {
        $this->refreshData();

        return view('livewire.front-end.shop-component', [
            'products' => $this->products,
        ]);
    }

    public function search()
    {
        $this->resetPage();
    }

    #[On('refresh-products-product')]
    function refreshData()
    {
        $this->products = Product::active()
            ->orderBy($this->orderBy, $this->orderDir)
            ->paginate(12);
    }

    private function resetInputFields()
    {
        $this->reset([
            'query'
        ]);
    }
}
