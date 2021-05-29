<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ShoppingList extends Component
{
    public $top_rated_cart, $top_rated_wishlist;
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
        return view('livewire.shopping-list');
    }
}
