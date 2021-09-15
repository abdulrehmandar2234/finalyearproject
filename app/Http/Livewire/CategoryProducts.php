<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryProducts extends Component
{
    use withPagination;

    public $slug;
    public $product, $stores = [];

    public function getProduct($id)
    {
        $this->product = Product::with('category', 'website')->findOrFail($id);
        $this->stores = Product::where('id', '!=', $id)
            ->search($this->product->title)
            ->with('category', 'website')
            ->take(5)
            ->get();
    }

    public function render()
    {
        $slug = $this->slug;
        if (request()->sort == 'low_high') {
            return view('livewire.category-products', ['products' => Product::with('category')->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->OrderBy('price')->paginate(50)]);
        } elseif (request()->sort == 'high_low') {
            return view('livewire.category-products', ['products' => Product::with('category')->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->OrderBy('price', "DESC")->paginate(50)]);
        } elseif (request()->sort == 'lastest') {
            return view('livewire.category-products', ['products' => Product::with('category')->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->latest()->paginate(50)]);
        }
        if (request()->paginate == '100') {
            return view('livewire.category-products', ['products' => Product::with('category')->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->OrderBy('price')->paginate(100)]);
        } elseif (request()->paginate == 'all') {
            return view('livewire.category-products', ['products' => Product::with('category')->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->OrderBy('price')->get()]);
        }
        return view('livewire.category-products', ['products' => Product::with('category')->whereHas('category', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->paginate(50)]);
    }
}
