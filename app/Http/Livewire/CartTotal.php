<?php

namespace App\Http\Livewire;

use App\Models\ShoppingCart;
use Livewire\Component;

class CartTotal extends Component
{
    public $total, $carts;

    protected $listeners = ['refreshProductLists' => 'getTotal'];

    public function getTotal()
    {
        $this->total = ShoppingCart::where('user_id', auth()->id())->sum('price');
    }

    public function render()
    {
        return view('livewire.cart-total');
    }
}
