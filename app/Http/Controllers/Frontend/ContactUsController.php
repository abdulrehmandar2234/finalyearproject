<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUs\ContactUsRequest;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\ShoppingCart;
use App\Models\Website;

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
            $carts = ShoppingCart::where('user_id', auth()->id())->with('product', 'user')->get();
            $total = ShoppingCart::where('user_id', auth()->id())->sum('price');
            $websites = Website::all();
            $categories = Category::all();
            return view('frontend.contact', compact('categories', 'websites', 'carts', 'total'));
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
