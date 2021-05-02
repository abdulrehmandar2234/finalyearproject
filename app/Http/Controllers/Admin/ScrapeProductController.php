<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Controller;
use App\Models\CategoryLink;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ScrapeProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $category_links = CategoryLink::where('last_updated', null)->with('website.product_node')->get();
        // dd($category_links);
        $req = new RequestController();
        $pro_results = [];
        // $store_results = [];

        foreach ($category_links as $category_link) {

            $node = $category_link->website->product_node;
            if ($category_link->scrape_method == 'HTML') {
                ini_set('max_execution_time', 0);
                $pro_results = $req->category_url_scrapper($category_link['request_type'],
                    $category_link['website']['source'], $node['main_listing_node'], $category_link['category_link'], $node['title'],
                    $node['brand'], $node['description'], $node['price'], $node['unit_price'], $node['discount'], $node['image'],
                    $node['image_url'], $node['rating'], $node['product_link'], $node['product_url'], $node['substr'],
                    $node['explode'], $node['substr_strpos'],$node['str_replace'],$node['replace_with'],$node['append_str']);
            }
             if ($category_link->scrape_method == 'API') {
                ini_set('max_execution_time', 0);
                $pro_results = $req->category_api_scrapper($category_link['request_type'],
                $node['main_listing_node'], $category_link['category_link'], $node['title'],
                $node['brand'], $node['description'], $node['price'], $node['unit_price'], $node['discount'], $node['image'],
                $node['image_url'], $node['rating'], $node['product_link'], $node['product_url'], $node['substr'],
                $node['explode'], $node['substr_strpos'],$node['str_replace'],$node['replace_with'],$node['append_str']);
            }
            foreach ($pro_results as $pro_result) {
                ini_set('max_execution_time', 0);
                $product = new Product;
                $product->title = isset($pro_result['title']) ? $pro_result['title'] : '';
                $product->description = isset($pro_result['description']) ? $pro_result['description'] : '';
                $product->brand = isset($pro_result['brand']) ? $pro_result['brand'] : '';
                $product->price = isset($pro_result['price']) ? $pro_result['price'] : '';
                $product->unit_price = isset($pro_result['unit_price']) ? $pro_result['unit_price'] : '';
                $product->discount = isset($pro_result['discount']) ? $pro_result['discount'] : '';
                $product->rating = isset($pro_result['rating']) ? $pro_result['rating'] : '';
                $product->product_link = isset($pro_result['product_link']) ? $pro_result['product_link'] : '';
                $product->last_updated = now();
                $product->category_id = $category_link['category_id'];
                $product->website_id = $category_link['website_id'];
                $product->save();
                if (isset($pro_result['image']) && !empty($pro_result['image'])) {
                    $product->addMediaFromUrl($pro_result['image'])->toMediaCollection('products');
                }
                DB::table('category_links')->where('id', $category_link['id'])->update(['last_updated' => now()]);
            }
        }
        return redirect(route('products.index'))->with('success', 'Category Scraped successfully');
    }
}
// $store_results[] = ['title' => isset($pro_result['title']) ? $pro_result['title'] : '',
//                     'description' => isset($pro_result['description']) ? $pro_result['description'] : '',
//                     'brand' => isset($pro_result['brand']) ? $pro_result['brand'] : '',
//                     'price' => isset($pro_result['price']) ? $pro_result['price'] : '',
//                     'unit_price' => isset($pro_result['unit_price']) ? $pro_result['unit_price'] : '',
//                     'discount' => isset($pro_result['discount']) ? $pro_result['discount'] : '',
//                     'rating' => isset($pro_result['rating']) ? $pro_result['rating'] : '',
//                     'product_link' => isset($pro_result['product_link']) ? $pro_result['product_link'] : '',
//                     'last_updated' => now(), 'category_id' => $category_link['category_id'], 'website_id' => $category_link['website_id']];

// Product::insert($store_results);
// $product = Product::latest()->first();
// if (isset($pro_result['image'])) {
//     $product->addMediaFromUrl($pro_result['image'])->toMediaCollection('products');
// }
// DB::table('category_links')->where('id', $category_link->id)->update(['last_updated' => now()]);
