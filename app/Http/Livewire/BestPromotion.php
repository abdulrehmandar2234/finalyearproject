<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class BestPromotion extends Component
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
            return view('livewire.best-promotion', ['products' => Product::where('discount', '!=', '')->with('category')->orderBy('price')->paginate(50)]);
        } elseif (request()->sort == 'high_low') {
            return view('livewire.best-promotion', ['products' => Product::where('discount', '!=', '')->with('category')->orderBy('price','DESC')->paginate(50)]);
        } elseif (request()->sort == 'lastest') {
            return view('livewire.best-promotion', ['products' => Product::where('discount', '!=', '')->with('category')->latest()->paginate(50)]);
        }

        if (request()->paginate == '100') {
            return view('livewire.best-promotion', ['products' => Product::where('discount', '!=', '')->with('category')->latest()->paginate(100)]);
        } elseif (request()->paginate == 'all') {
            return view('livewire.best-promotion', ['products' => Product::where('discount', '!=', '')->with('category')->get()]);
        }
        return view('livewire.best-promotion', ['products' => Product::where('discount', '!=', '')->with('category')->latest()->paginate(50)]);
    }
}
