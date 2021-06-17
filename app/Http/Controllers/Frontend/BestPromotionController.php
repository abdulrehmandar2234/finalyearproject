<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\Website;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class BestPromotionController extends Controller
{
    public function index()
    {
        $carts = ShoppingCart::where('user_id', auth()->id())->with('product', 'user')->get();
        $total = ShoppingCart::where('user_id', auth()->id())->sum('price');
        $products = Product::where('discount', '!=', '')->with('category')->take(50)->get();
        $product_max_price = Product::max('price');
        $product_min_price = Product::min('price');
        $brands = Product::groupBy('brand')->get();
        $categories = Category::withCount('products')->get();
        $websites = Website::withCount('products')->get();

        if (request()->sort == 'low_high') {
            $products = $products->sortBy('price');
        } elseif (request()->sort == 'high_low') {
            $products = $products->sortByDesc('price');
        } elseif (request()->sort == 'lastest') {
            $products = $products->latest();
        }

        if (request()->paginate == '100') {
            $products = Product::where('discount', '!=', '')->with('category')->take(100)->get();
        } elseif (request()->paginate == 'all') {
            $products = Product::where('discount', '!=', '')->with('category')->get();
        }
        return view('frontend.promotions', compact('products', 'categories', 'websites', 'brands', 'product_max_price', 'product_min_price', 'carts', 'total'));
    }

    public function priceFilter(Request $request)
    {
        $carts = ShoppingCart::where('user_id', auth()->id())->with('product', 'user')->get();
        $total = ShoppingCart::where('user_id', auth()->id())->sum('price');
        $products = Product::whereBetween('price',[$request->min,$request->max])->with('category')->take(50)->get();
        $product_max_price = Product::max('price');
        $product_min_price = Product::min('price');
        $brands = Product::groupBy('brand')->get();
        $categories = Category::withCount('products')->get();
        $websites = Website::withCount('products')->get();
        return view('frontend.promotions', compact('products', 'categories', 'websites', 'brands', 'product_max_price', 'product_min_price', 'carts', 'total'));
    }
}
