<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Website;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $websites = Website::all();
            $products = Product::with('category')->take(6)->get();
            $categories = Category::with('products')->get();
            return view('frontend.wishlist', compact('products', 'categories', 'websites'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicates = Cart::instance('wishlist')->search(function ($wishlist, $rowId) use ($request) {
            return $wishlist->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            return back()->with('error', 'Item is already in your wishlist!');
        }
        Cart::instance('wishlist')->add($request->id, $request->title, 1, $request->price)->associate(Product::class);
        return back()->with('success', 'Product added to wishlist successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        dd($cart);
        Cart::instance('wishlist')->remove($id);
        return back()->with('success', 'Product remove from wishlist successfully.');
    }

    public function switch_to_cart($id)
    {
        $item = Cart::instance('wishlist')->get($id);
        Cart::instance('wishlist')->remove($id);
        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });
        if ($duplicates->isNotEmpty()) {
            return back()->with('error', 'Item is already in your cart!');
        }
        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)->associate(Product::class);
        return back()->with('success', 'Product has been move to cart successfully.');
    }
}
