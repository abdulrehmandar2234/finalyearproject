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
        $selected_category = Category::with(['products' => function ($query) {
            $query->take(50);
        }])->withCount('products')->where('slug', $slug)->firstOrFail();
        $product_max_price = Product::max('price');
        $product_min_price = Product::min('price');
        $brands = Product::groupBy('brand')->get();
        $categories = Category::withCount('products')->get();
        $websites = Website::withCount('products')->get();

        if (request()->sort == 'low_high') {
            $selected_category = Category::with(['products' => function ($query) {
                $query->OrderBy('price');
            }])->withCount('products')->where('slug', $slug)->firstOrFail();
        } elseif (request()->sort == 'high_low') {
            $selected_category = Category::with(['products' => function ($query) {
                $query->OrderBy('price','desc');
            }])->withCount('products')->where('slug', $slug)->firstOrFail();
        } elseif (request()->sort == 'lastest') {
            $selected_category = Category::with(['products' => function ($query) {
                $query->latest();
            }])->withCount('products')->where('slug', $slug)->firstOrFail();
        }

        if (request()->paginate == '100') {
            $selected_category = Category::with(['products' => function ($query) {
                $query->take(100);
            }])->withCount('products')->where('slug', $slug)->firstOrFail();
        } elseif (request()->paginate == 'all') {
            $selected_category = Category::with('products')->withCount('products')->where('slug', $slug)->firstOrFail();
        }
        return view('frontend.category', compact('categories', 'websites', 'selected_category', 'brands', 'product_max_price', 'product_min_price', 'carts', 'total'));
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
