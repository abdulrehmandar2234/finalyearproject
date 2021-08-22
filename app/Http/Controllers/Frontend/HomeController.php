<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\Slider;
use App\Models\Website;
use App\Models\Wishlist;

class HomeController extends Controller
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
        $sliders = Slider::all();
        $websites = Website::all();
        $products = Product::with('category', 'website')->take(50)->get();
        $discounted_products = Product::where('discount', '!=', '')->with('category')->take(50)->get();
        $top_rated_cart = ShoppingCart::with('product.website', 'user')->inRandomOrder()->take(25)->get();
        $top_rated_wishlist = Wishlist::with('product.website', 'user')->inRandomOrder()->take(25)->get();
        $categories = Category::all();
        $advertisements = Advertising::all();
        $banner = Banner::first();
        return view('frontend.index', compact('sliders', 'discounted_products', 'products', 'categories', 'websites', 'total', 'carts', 'top_rated_cart', 'top_rated_wishlist', 'advertisements', 'banner'));
    }
}
