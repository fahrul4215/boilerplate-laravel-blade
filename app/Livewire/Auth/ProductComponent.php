<?php

namespace App\Livewire\Auth;

use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductImage;
use Cache;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Storage;
use Str;

class ProductComponent extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;

    protected $products;
    protected $paginationTheme = 'tailwind';

    public $p_id, $name, $slug, $stock = 0, $price = 0, $discount = 0, $weight = 0, $description = '', $composition = '', $status = 1, $category_id;
    public $images = []; // This will hold the uploaded images
    public $existingImages = [];
    public $isModalOpen = false;
    public $query = '';
    public $totalCount = 0;

    public function render()
    {
        $this->refreshData();

        $categories = CategoryProduct::all();

        return view('livewire.auth.product-component', [
            'data' => $this->products,
            'categories' => $categories
        ]);
    }

    public function search()
    {
        $this->resetPage();
    }

    #[On('refresh-product')]
    function refreshData()
    {
        $this->products = Product::where('name', 'like', "%{$this->query}%")
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    #[On('set-description')]
    public function setDescription($description)
    {
        $this->description = $description;
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
        $this->reset([
            'p_id',
            'name',
            'stock',
            'price',
            'discount',
            'composition',
            'weight',
            'status',
            'description',
            'category_id',
            'images',
            'existingImages'
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'discount' => 'numeric',
            'composition' => '',
            'weight' => 'numeric',
            'status' => '',
            'description' => '',
            'category_id' => 'required',
            'images.*' => 'image|max:2048', // Each image should be max 2MB
        ]);

        $product = Product::updateOrCreate(
            ['id' => $this->p_id],
            [
                'name' => $this->name,
                'slug' => $this->p_id ? $this->slug : Str::slug($this->name) . '-' . uniqid($this->p_id, false),
                'stock' => $this->stock,
                'price' => $this->price,
                'discount' => $this->discount,
                'composition' => $this->composition,
                'weight' => $this->weight,
                'status' => $this->status,
                'description' => $this->description,
                'category_id' => $this->category_id
            ]
        );
        Cache::flush();

        // Handle image uploads
        foreach ($this->images as $image) {
            $imagePath = $image->store('products', 'public');

            ProductImage::create([
                'product_id' => $product->id,
                'path' => $imagePath,
            ]);
        }

        session()->flash('message', $this->p_id ? 'Product Updated Successfully.' : 'Product Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->p_id = $id;
        $this->slug = $product->slug;
        $this->name = $product->name;
        $this->stock = $product->stock;
        $this->price = $product->price;
        $this->discount = $product->discount;
        $this->composition = $product->composition;
        $this->weight = $product->weight;
        $this->description = $product->description;
        $this->category_id = $product->category_id;
        $this->existingImages = $product->images()->pluck('path', 'id')->toArray();

        $this->openModal();
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Product Deleted Successfully.');
    }

    public function removeImage($imageId)
    {
        $image = ProductImage::findOrFail($imageId);

        $product = Product::findOrFail($this->p_id);

        // Delete the image file from storage
        Storage::disk('public')->delete($image->path);

        // Delete the image record from the database
        $image->delete();

        // Refresh the existing images list
        $this->existingImages = array_filter($this->existingImages, function ($id) use ($imageId) {
            return $id !== $imageId;
        });

        session()->flash('image-remove', 'Image removed successfully.');

        // Reload the existing images after update
        $this->existingImages = $product->images()->pluck('path', 'id')->toArray();
    }
}
