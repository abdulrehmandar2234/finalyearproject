<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUs\ContactUsRequest;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Product;
use App\Models\Website;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $websites = Website::all();
            $products = Product::with('category')->take(6)->get();
            $categories = Category::with('products')->get();
            return view('frontend.contact', compact('products', 'categories', 'websites'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactUsRequest $request)
    {
        try {
            ContactUs::create($request->validated());
            return back()->with('success', 'Message send successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
