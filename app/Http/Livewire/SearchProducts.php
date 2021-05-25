<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchProducts extends Component
{
    public $products;
    public $product;

    public function getProduct($id)
    {
        $this->product = Product::with('category', 'website')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.search-products');
    }
}
