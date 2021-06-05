<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\Website;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class ShoppingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = ShoppingCart::where('user_id', auth()->id())->with('product', 'user')->get();
        $total = ShoppingCart::where('user_id', auth()->id())->sum('price');
        $top_rated_cart = ShoppingCart::with('product.website', 'product.category', 'user')->inRandomOrder()->take(25)->get();
        $top_rated_wishlist = Wishlist::with('product.website', 'product.category', 'user')->inRandomOrder()->take(25)->get();
        $product_max_price = Product::max('price');
        $product_min_price = Product::min('price');
        $brands = Product::groupBy('brand')->get();
        $categories = Category::withCount('products')->get();
        $websites = Website::withCount('products')->get();
        return view('frontend.shopping_lists', compact('categories', 'websites', 'brands', 'product_max_price', 'product_min_price', 'carts', 'total', 'top_rated_cart', 'top_rated_wishlist'));
    }

    public function priceFilter(Request $request)
    {
        $carts = ShoppingCart::where('user_id', auth()->id())->with('product', 'user')->get();
        $total = ShoppingCart::where('user_id', auth()->id())->sum('price');
        $products = Product::whereBetween('price', [$request->min, $request->max])->with('category')->take(50)->get();
        $product_max_price = Product::max('price');
        $product_min_price = Product::min('price');
        $brands = Product::groupBy('brand')->get();
        $categories = Category::withCount('products')->get();
        $websites = Website::withCount('products')->get();
        return view('frontend.shopping_lists', compact('products', 'categories', 'websites', 'brands', 'product_max_price', 'product_min_price', 'carts', 'total'));

    }
}
