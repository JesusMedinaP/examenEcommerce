<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProducts2 extends Component
{
    use WithPagination;

    public $search;
    public $pagination = 10;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPagination()
    {
        $this->resetPage();
    }

    public function render()
    {
        $pagination = $this->pagination;
        $products = Product::where('name', 'LIKE', "%{$this->search}%")->paginate($pagination);

        return view('livewire.admin.show-products2', compact('products', 'pagination'))->layout('layouts.admin');
    }
}
