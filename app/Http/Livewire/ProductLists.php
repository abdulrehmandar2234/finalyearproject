<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductLists extends Component
{
    public $products, $discounted_products;
    public $product, $all;

    public function getProduct($id)
    {
        $this->product = Product::with('category', 'website')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.product-lists');
    }
}
