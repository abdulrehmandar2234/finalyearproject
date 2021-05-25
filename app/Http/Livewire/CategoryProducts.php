<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CategoryProducts extends Component
{
    public $selected_category;
    public $product;

    public function getProduct($id)
    {
        $this->product = Product::with('category', 'website')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.category-products');
    }
}
