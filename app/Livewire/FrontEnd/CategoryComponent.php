<?php

namespace App\Livewire\FrontEnd;

use App\Models\CategoryProduct;
use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $category;
    protected $products;

    public $c_id;
    public $isModalOpen = false;
    public $query = '', $orderBy = 'created_at', $orderDir = 'desc';

    public function mount()
    {
        $this->category = CategoryProduct::find($this->c_id);
    }

    public function render()
    {
        $this->refreshData();

        return view('livewire.front-end.category-component', [
            'products' => $this->products,
        ]);
    }

    public function search()
    {
        $this->resetPage();
    }

    #[On('refresh-category-product')]
    function refreshData()
    {
        $this->products = Product::where('category_id', $this->c_id)
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
