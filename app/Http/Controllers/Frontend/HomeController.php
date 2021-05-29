<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
        return view('frontend.index', compact('sliders', 'discounted_products', 'products', 'categories', 'websites', 'total', 'carts', 'top_rated_cart', 'top_rated_wishlist'));
    }

    public function search()
    {
        $carts = ShoppingCart::where('user_id', auth()->id())->with('product', 'user')->get();
        $total = ShoppingCart::where('user_id', auth()->id())->sum('price');
        $products = Product::where('title', 'LIKE', '%' . request()->input('query') . '%')->with('category')->take(50)->get();
//        $products = (new Search())
//            ->registerModel(Product::class, function(ModelSearchAspect $modelSearchAspect) {
//                $modelSearchAspect
//                    ->addSearchableAttribute('title') // return results for partial matches on usernames                 return results that exactly match the e-mail address
//                    ->active()
//                    ->with('category');
//            })->registerModel(Category::class, function(ModelSearchAspect $modelSearchAspect) {
//                $modelSearchAspect
//                    ->addSearchableAttribute('name') // return results for partial matches on usernames                 return results that exactly match the e-mail address
//                    ->active()
//                    ->with('product');
//            });
//            dd($products);
        $product_max_price = Product::max('price');
        $product_min_price = Product::min('price');
        $brands = Product::groupBy('brand')->get();
        $categories = Category::withCount('products')->get();
        $websites = Website::withCount('products')->get();
        return view('frontend.search', compact('products', 'categories', 'websites', 'brands', 'product_max_price', 'product_min_price', 'carts', 'total'));
    }

    public function category($slug)
    {
        $carts = ShoppingCart::where('user_id', auth()->id())->with('product', 'user')->get();
        $total = ShoppingCart::where('user_id', auth()->id())->sum('price');
        $selected_category = Category::where('slug', $slug)->firstOrFail()->with('products')->withCount('products')->get();
        $product_max_price = Product::max('price');
        $product_min_price = Product::min('price');
        $brands = Product::groupBy('brand')->get();
        $categories = Category::withCount('products')->get();
        $websites = Website::withCount('products')->get();
        return view('frontend.category', compact('categories', 'websites', 'selected_category', 'brands', 'product_max_price', 'product_min_price', 'carts', 'total'));
    }

    public function bestPromotions()
    {
        $carts = ShoppingCart::where('user_id', auth()->id())->with('product', 'user')->get();
        $total = ShoppingCart::where('user_id', auth()->id())->sum('price');
        $products = Product::where('discount', '!=', '')->with('category')->take(50)->get();
        $product_max_price = Product::max('price');
        $product_min_price = Product::min('price');
        $brands = Product::groupBy('brand')->get();
        $categories = Category::withCount('products')->get();
        $websites = Website::withCount('products')->get();
        return view('frontend.promotions', compact('products', 'categories', 'websites', 'brands', 'product_max_price', 'product_min_price', 'carts', 'total'));
    }

    public function shoppingLists()
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
}
