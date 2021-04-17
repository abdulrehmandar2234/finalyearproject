<?php

namespace App\Http\Controllers\Admin;

use App\Models\Website;
use App\Models\Category;
use App\Models\CategoryLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryLink\CategoryLinkRequest;
use App\Http\Requests\CategoryLink\CategoryLinkUpdateRequest;

class CategoryLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryLink::with('category', 'website')->get();
        return view('backend.category-link.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $websites = Website::all();
        $categories = Category::all();
        return view('backend.category-link.create', compact('websites', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryLinkRequest $request)
    {
        CategoryLink::create($request->validated());
        return redirect()->route('category-links.index')->with('success', 'Category Link Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryLink $categoryLink)
    {
        $websites = Website::all();
        $categories = Category::all();
        return view('backEnd.category-link.edit', compact('websites', 'categories', 'categoryLink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryLinkUpdateRequest $request, CategoryLink $category)
    {
        $category->update($request->validated());
        return redirect()->route('category-links.index')->with('success', 'Category Link updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryLink $categoryLink)
    {
        $categoryLink->delete();
        return redirect()->route('category-links.index')->with('success', 'Category Link deleted successfully');
    }
}
