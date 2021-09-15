<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\Website;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $carts = ShoppingCart::where('user_id', auth()->id())->with('product', 'user')->get();
        $total = ShoppingCart::where('user_id', auth()->id())->sum('price');
        $products = Product::with('category')->whereHas( 'category' , function ($query) use($slug) {
            $query->where('slug', $slug);
        })->take(50)->get();
        $product_max_price = Product::max('price');
        $product_min_price = Product::min('price');
        $brands = Product::groupBy('brand')->get();
        $categories = Category::withCount('products')->get();
        $websites = Website::withCount('products')->get();

        return view('frontend.category', compact('categories', 'websites', 'products', 'brands', 'product_max_price', 'product_min_price', 'carts', 'total', 'slug'));
    }

    public function priceFilter()
    {
        $carts = ShoppingCart::where('user_id', auth()->id())->with('product', 'user')->get();
        $total = ShoppingCart::where('user_id', auth()->id())->sum('price');
        $selected_category = Category::with('products')->whereHas('products', function ($q) {
            $q->whereBetween('price', [request()->min, request()->max]);
        })->findOrFail(request()->category_id);

        $product_max_price = Product::max('price');
        $product_min_price = Product::min('price');
        $brands = Product::groupBy('brand')->get();
        $categories = Category::withCount('products')->get();
        $websites = Website::withCount('products')->get();
        return view('frontend.category', compact('selected_category', 'categories', 'websites', 'brands', 'product_max_price', 'product_min_price', 'carts', 'total'));
    }
}
