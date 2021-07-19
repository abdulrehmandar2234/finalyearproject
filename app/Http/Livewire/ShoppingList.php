<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\Wishlist;
use Livewire\Component;
use Livewire\WithPagination;

class ShoppingList extends Component
{
    use withPagination;

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
            return view('livewire.shopping-list', ['top_rated_cart' => ShoppingCart::with('product.website', 'product.category', 'user')->orderBy('price')->paginate(25)]);
        } elseif (request()->sort == 'high_low') {
            return view('livewire.shopping-list', ['top_rated_cart' => ShoppingCart::with('product.website', 'product.category', 'user')->orderBy('price', 'DESC')->paginate(25)]);
        } elseif (request()->sort == 'lastest') {
            return view('livewire.shopping-list', ['top_rated_cart' => ShoppingCart::with('product.website', 'product.category', 'user')->paginate(25)->latest()]);
        }

        if (request()->paginate == '100') {
            return view('livewire.shopping-list', ['top_rated_cart' => ShoppingCart::with('product.website', 'product.category', 'user')->inRandomOrder()->paginate(50)]);
        } elseif (request()->paginate == 'all') {
            return view('livewire.shopping-list', ['top_rated_cart' => ShoppingCart::with('product.website', 'product.category', 'user')->inRandomOrder()->paginate()]);
        }
        if (request()['min'] && request()['max']) {
            return view('livewire.shopping-list', ['top_rated_cart' => ShoppingCart::whereBetween('price', [request()->min, request()->max])->paginate(50)]);
        }

        return view('livewire.shopping-list', ['top_rated_cart' => ShoppingCart::with('product.website', 'product.category', 'user')->paginate(25)]);
    }
}
