<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductLists extends Component
{
    public $products, $discounted_products, $top_rated_wishlist, $top_rated_cart;
    public $product, $stores = [];

    protected $listeners = ['refreshProductList' => 'getProductLists'];

    public function getProductLists()
    {
        $this->products = Product::with('category', 'website')->take(50)->get();
    }

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
        return view('livewire.product-lists');
    }
}
