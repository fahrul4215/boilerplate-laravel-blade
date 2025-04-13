<?php

namespace App\Livewire\Auth;

use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;

    protected $trx;
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

        return view('livewire.auth.dashboard', [
            'data' => $this->trx,
        ]);
    }

    public function search()
    {
        $this->resetPage();
    }

    #[On('refresh-product')]
    function refreshData()
    {
        $this->trx = Transaction::where('trx_number', 'like', "%{$this->query}%")
            ->orderBy('id', 'desc')
            ->paginate(10);
    }
}
