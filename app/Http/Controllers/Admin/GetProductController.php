<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductNode;
use Goutte\Client;
use Illuminate\Http\Request;

class GetProductController extends Controller
{
    public function get_products()
    {
//        $nodes = ProductNode::all();
//        $req = new RequestController();
//        $pro_result = array();
//        foreach ($nodes as $node) {
//            $pro_result[] = $req->get_products($node->category_link, $node->title, $node->description,
//                $node->price, $node->discount_price, $node->discount_percentage,
//                $node->image, $node->rating, $node->product_link, $node->availability);
////
////            $product = new Product();
////            $product->title = $pro_result[0][0]['title'];
////            $product->description = $pro_result[0][0]['description'];
////            $product->title = $pro_result->title;
////            $product->price = $pro_result->price;
////            $product->discount_price = $pro_result->discount_price;
////            $product->discount_percentage = $pro_result->discount_percentage;
////            $product->image = $pro_result->image;
////            $product->rating = $pro_result->rating;
////            $product->product_link = $pro_result->product_link;
////            $product->availability = $pro_result->availability;
////            $product->save();
//        }
//        dd($pro_result);

        $client = new Client(); // Goutte Client
        $request = $client->getClient()->createRequest('GET', 'https://www.daraz.pk/catalog/?q=laptop&_keyori=ss&from=input&spm=a2a0e.home.search.go.35e34937tMQDsr');
        /* getClient() for taking Guzzle Client */

        $response = $request->send(); // Send created request to server
        $data = $response->json(); // Returns PHP Array
    }
}
