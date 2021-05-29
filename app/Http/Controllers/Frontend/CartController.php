<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\Website;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $carts = ShoppingCart::where('user_id', auth()->id())->with('product', 'user')->get();
            $total = ShoppingCart::where('user_id', auth()->id())->sum('price');
            $websites = Website::all();
            $products = Product::with('category')->take(6)->get();
            $categories = Category::with('products')->get();
            return view('frontend.cart', compact('products', 'categories', 'websites', 'carts', 'total'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartRequest $request)
    {
        try {
            if (auth()->check()) {
                if (ShoppingCart::where(['product_id' => $request->product_id, 'user_id' => auth()->id()])->exists()) {
                    return back()->with('error', 'Item is already in your cart!');
                } else {
                    ShoppingCart::create($request->validated() + ['user_id' => auth()->id()]);
                }
            } else {
                $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($request) {
                    return $cartItem->id === $request->product_id;
                });

                if ($duplicates->isNotEmpty()) {
                    return back()->with('error', 'Item is already in your cart!');
                }
                Cart::instance('default')->add($request->product_id, $request->title, $request->quantity, $request->price)->associate(Product::class);
            }
            return back()->with('success', 'Product added to cart successfully.');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->check()) {
            ShoppingCart::findOrFail($id)->delete();
        } else {
            Cart::instance('default')->remove($id);
        }
        return back()->with('success', 'Product remove from cart successfully.');
    }
}
