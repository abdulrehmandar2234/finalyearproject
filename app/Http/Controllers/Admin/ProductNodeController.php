<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductNode;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductNodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $nodes = ProductNode::with('website')->get();
            return view('backend.product-nodes.index', compact('nodes'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $websites = Website::all();
            return view('backend.product-nodes.create', compact('websites'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            ProductNode::create($request->all());
            return redirect()->route('product-nodes.index')->with('success', 'Product Node created successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
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
    public function edit(ProductNode $productNode)
    {
        try {
            $websites = Website::all();
            return view('backend.product-nodes.edit', compact('productNode', 'websites'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductNode $productNode)
    {
        try {
            $productNode->update($request->all());
            return redirect()->route('product-nodes.index')->with('success', 'Product Node created successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductNode $productNode)
    {
        try {
            $this->delete_image($productNode, 'products', 'image');
            $productNode->delete();
            return redirect()->route('product-nodes.index')->with('success', 'Product Node deleted successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function delete_image($obj, $image_path, $image_name)
    {
        try {
            $image = public_path('/images/' . $image_path . '/' . $obj->$image_name);
            if (File::exists($image)) {
                File::delete($image);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function save_image($request, $image, $obj, $image_path, $width = 300, $height = 300)
    {
        try {
            if ($request->hasFile($image)) {
                $file = $request->file($image);
                $filename = time() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->resize($width, $height)->save(public_path('/images/' . $image_path . '/' . $filename));
                $obj->$image = $filename;

                $obj->save();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function update_image($request, $image, $obj, $image_path, $width = 300, $height = 300)
    {
        try {
            if ($check = $request->hasFile($image)) {
                $this->delete_image($obj, $image_path, $image);
                $file = $request->file($image);
                $filename = time() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->resize($width, $height)->save(public_path('/images/' . $image_path . '/' . $filename));
                $obj->$image = $filename;
                $obj->save();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
