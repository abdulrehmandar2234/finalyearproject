<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\WebsiteRequest;
use App\Http\Requests\Website\WebsiteUpdateRequest;
use App\Models\Currency;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class WebsiteController extends Controller
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
            return view('backend.websites.index', compact('websites'));
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
            $currencies = Currency::all();
            return view('backend.websites.create', compact('currencies'));
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
    public function store(WebsiteRequest $request)
    {
        try {
            $website = Website::create($request->except('logo'));
            if (isset($request['logo'])) {
                $website->addMediaFromRequest('logo')->withResponsiveImages()->toMediaCollection('logos');
            }
            return redirect()->route('websites.index')->with('success', 'Website added successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Website $website)
    {
        try {
            $currencies = Currency::all();
            return view('backend.websites.edit', compact('website', 'currencies'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(WebsiteUpdateRequest $request, Website $website)
    {
        try {
            $website->update($request->except('logo'));
            if (isset($request['logo'])) {
                if($website->getFirstMedia('logos')){
                    $website->getFirstMedia('logos')->delete();
                }
                $website->addMediaFromRequest('logo')->toMediaCollection('logos');
            }
            return redirect()->route('websites.index')->with('success', 'Website updated successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $website)
    {
        try {
            $website->delete();
            return redirect()->route('websites.index')->with('success', 'Website deleted successfully');
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
