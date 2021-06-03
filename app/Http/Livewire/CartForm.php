<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ShoppingCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartForm extends Component
{
    public $quantity, $product_id, $title, $price, $products;
    protected $listeners = ['refreshProductLists' => 'getProductLists'];

    public function getProductLists()
    {
        $this->products = Product::with('category', 'website')->take(50)->get();
    }

    public function storeCart()
    {
        $product_id = $this->product_id;
        if (auth()->check()) {
            if (ShoppingCart::where(['product_id' => $product_id, 'user_id' => auth()->id()])->exists()) {
                return back()->with('error', 'Item is already in your cart!');
            } else {
                ShoppingCart::create(['user_id' => auth()->id(), 'quantity' => $this->quantity, 'price' => $this->price, 'product_id' => $product_id]);
            }
        } else {
            $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($product_id) {
                return $cartItem->id === $product_id;
            });

            if ($duplicates->isNotEmpty()) {
                session()->flash('error', 'Item is already in your cart!');
            }
            Cart::instance('default')->add($product_id, $this->title, $this->quantity, $this->price)->associate(Product::class);
        }
        session()->flash('success', 'Product added to cart successfully.');
        $this->emit('refreshProductLists');
    }

    public function render()
    {
        return view('livewire.cart-form');
    }
}
