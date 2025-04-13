<?php

namespace App\Livewire\Auth;

use App\Models\CategoryProduct;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Str;

class CategoryProductComponent extends Component
{
    use WithPagination, WithoutUrlPagination;

    protected $categoryProducts;

    public $p_id, $name;
    public $isModalOpen = false;
    public $query = '';
    public $totalCount = 0;

    public function render()
    {
        $this->refreshData();

        return view('livewire.auth.category-product-component', [
            'data' => $this->categoryProducts
        ]);
    }

    public function search()
    {
        $this->resetPage();
    }

    #[On('refresh-category-product')]
    function refreshData()
    {
        $this->categoryProducts = CategoryProduct::where('name', 'like', "%{$this->query}%")
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        CategoryProduct::updateOrCreate(['id' => $this->p_id], [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);

        session()->flash('message', $this->p_id ? 'Category Product Updated Successfully.' : 'Category Product Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $product = CategoryProduct::findOrFail($id);
        $this->p_id = $id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;

        $this->openModal();
    }

    public function delete($id)
    {
        CategoryProduct::find($id)->delete();
        session()->flash('message', 'Category Product Deleted Successfully.');
    }
}
