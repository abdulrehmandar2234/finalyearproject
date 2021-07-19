<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SearchProducts extends Component
{
    use WithPagination;

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
        if (request()->sort == 'low_high') {
            return view('livewire.search-products', ['products' => Product::where('title', 'LIKE', '%' . request()->input('query') . '%')->with('category')->orderBy('price')->paginate(100)]);
        } elseif (request()->sort == 'high_low') {
            return view('livewire.search-products', ['products' => Product::where('title', 'LIKE', '%' . request()->input('query') . '%')->with('category')->orderBy('price','DESC')->paginate(100)]);
        } elseif (request()->sort == 'lastest') {
            return view('livewire.search-products', ['products' => Product::where('title', 'LIKE', '%' . request()->input('query') . '%')->with('category')->paginate(100)->latest()]);
        }

        if (request()->paginate == '100') {
            return view('livewire.search-products', ['products' => Product::where('title', 'LIKE', '%' . request()->input('query') . '%')->with('category')->paginate(100)]);
        } elseif (request()->paginate == 'all') {
            return view('livewire.search-products', ['products' => Product::where('title', 'LIKE', '%' . request()->input('query') . '%')->with('category')->paginate()]);
        }
        return view('livewire.search-products', ['products' => Product::where('title', 'LIKE', '%' . request()->input('query') . '%')->with('category')->paginate()]);
    }
}
