<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProducts2 extends Component
{
    use WithPagination;

    public $search;
    public $pagination = 10;
    public $categories;
    public $category, $categoria, $marca;

    public $queryString = ['categoria', 'marca'];


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPagination()
    {
        $this->resetPage();
    }

    public function updatedSubcategoria()
    {
        $this->resetPage();
    }

    public function updatedMarca()
    {
        $this->resetPage();
    }

    public function limpiar()
    {
        $this->reset(['subcategoria', 'marca', 'page']);
    }


    public function render()
    {
        $pagination = $this->pagination;
        $categories = Category::all();
        $brands = Brand::all();
//        dd($categories, $brands);

//        $productsQuery = Product::query()->whereHas('subcategory.category', function(Builder $query){
//            $query->where('id', $this->category->id);
//        });
//        if ($this->subcategoria) {
//            $productsQuery = $productsQuery->whereHas('subcategory', function(Builder $query){
//                $query->where('slug', $this->subcategoria);
//            });
//        }
//        if ($this->marca) {
//            $productsQuery = $productsQuery->whereHas('brand', function(Builder $query){
//                $query->where('name', $this->marca);
//            });
//        }
        $products = Product::where('name', 'LIKE', "%{$this->search}%")->paginate($pagination);
//          $products = $productsQuery->paginate($pagination);


        return view('livewire.admin.show-products2', compact('products', 'pagination', 'categories', 'brands'))->layout('layouts.admin');
    }
}
