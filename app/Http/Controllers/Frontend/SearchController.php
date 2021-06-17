<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\Website;
use Illuminate\Http\Request;

class SearchController extends Controller
{
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

        if (request()->sort == 'low_high') {
            $products = $products->sortBy('price');
        } elseif (request()->sort == 'high_low') {
            $products = $products->sortByDesc('price');
        } elseif (request()->sort == 'lastest') {
            $products = $products->lastest();
        }

        if (request()->paginate == '100') {
            $products = $products->take(100);
        } elseif (request()->paginate == 'all') {
            $products = Product::where('title', 'LIKE', '%' . request()->input('query') . '%')->with('category')->get();
        }

        return view('frontend.search', compact('products', 'categories', 'websites', 'brands', 'product_max_price', 'product_min_price', 'carts', 'total'));
    }

    public function priceFilter(Request $request){
        $carts = ShoppingCart::where('user_id', auth()->id())->with('product', 'user')->get();
        $total = ShoppingCart::where('user_id', auth()->id())->sum('price');
        $products = Product::whereBetween('price',[$request->min,$request->max])->with('category')->take(50)->get();
        $product_max_price = Product::max('price');
        $product_min_price = Product::min('price');
        $brands = Product::groupBy('brand')->get();
        $categories = Category::withCount('products')->get();
        $websites = Website::withCount('products')->get();
        return view('frontend.search', compact('products', 'categories', 'websites', 'brands', 'product_max_price', 'product_min_price', 'carts', 'total'));
    }
}
