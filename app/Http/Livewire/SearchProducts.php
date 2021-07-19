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
        $products = Product::where('title', 'LIKE', '%' . request()->input('query') . '%')->with('category')->paginate(50);
        if (request()->sort == 'low_high') {
            $products = $products->sortBy('price');
        } elseif (request()->sort == 'high_low') {
            $products = $products->sortByDesc('price');
        } elseif (request()->sort == 'lastest') {
            $products = $products->lastest();
        }

        if (request()->paginate == '100') {
            $products = Product::where('title', 'LIKE', '%' . request()->input('query') . '%')->with('category')->paginate(100);
        } elseif (request()->paginate == 'all') {
            $products = Product::where('title', 'LIKE', '%' . request()->input('query') . '%')->with('category')->get();
        }
        return view('livewire.search-products', ['products' => Product::paginate(10)]);
    }
}
