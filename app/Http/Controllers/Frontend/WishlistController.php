<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Wishlist\WishlistRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\Website;
use App\Models\Wishlist;
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
            $carts = ShoppingCart::where('user_id', auth()->id())->with('product', 'user')->get();
            $total = ShoppingCart::where('user_id', auth()->id())->sum('price');
            $wishlists = Wishlist::where('user_id', auth()->id())->with('product', 'user')->get();
            $websites = Website::all();
            $products = Product::with('category')->take(6)->get();
            $categories = Category::with('products')->get();
            return view('frontend.wishlist', compact('products', 'categories', 'websites', 'wishlists', 'total', 'carts'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(WishlistRequest $request)
    {
        try {
            if (auth()->check()) {
                if (Wishlist::where(['product_id' => $request->product_id, 'user_id' => auth()->id()])->exists()) {
                    return back()->with('error', 'Item is already in your wishlist!');
                } else {
                    Wishlist::create(['user_id' => auth()->id(), 'product_id' => $request->product_id]);
                }
            } else {
                $duplicates = Cart::instance('wishlist')->search(function ($wishlist, $rowId) use ($request) {
                    return $wishlist->id === $request->product_id;
                });

                if ($duplicates->isNotEmpty()) {
                    return back()->with('error', 'Item is already in your wishlist!');
                }
                Cart::instance('wishlist')->add($request->product_id, $request->title, $request->quantity, $request->price)->associate(Product::class);
            }
            return back()->with('success', 'Product added to wishlist successfully.');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            Wishlist::findOrFail($id)->delete();
        } else {
            Cart::instance('wishlist')->remove($id);
        }
        return back()->with('success', 'Product remove from wishlist successfully.');
    }

    public function switch_to_cart($id)
    {
        if (auth()->check()) {
            if (ShoppingCart::where(['product_id' => $id, 'user_id' => auth()->id()])->exists()) {
                return back()->with('error', 'Item is already in your cart!');
            } else {
                $product = Product::findOrFail($id);
                Wishlist::findOrFail($id)->delete();
                ShoppingCart::create(['quantity' => 1, 'product_id' => $id, 'price' => $product->price, 'user_id' => auth()->id()]);
            }
        } else {
            $item = Cart::instance('wishlist')->get($id);
            Cart::instance('wishlist')->remove($id);
            $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) {
                return $rowId === $id;
            });
            if ($duplicates->isNotEmpty()) {
                return back()->with('error', 'Item is already in your cart!');
            }
            Cart::instance('default')->add($item->id, $item->name, 1, $item->price)->associate(Product::class);
        }

        return back()->with('success', 'Product has been move to cart successfully.');
    }
}
