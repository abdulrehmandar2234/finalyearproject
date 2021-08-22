<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\BannerRequest;
use App\Http\Requests\Banner\BannerStoreRequest;
use App\Http\Requests\Banner\BannerUpdateRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $banners = Banner::all();
            return view('backend.banners.index', compact('banners'));
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
            return view('backend.banners.create');
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
    public function store(BannerStoreRequest $request)
    {
        try {
            if (Banner::count() == 1) {
                return redirect()->route('banners.index')->with('error', 'Banner already exists.');
            }
            $banner = Banner::create($request->except('image'));
            if (isset($request['image'])) {
                $banner->addMediaFromRequest('image')->withResponsiveImages()->toMediaCollection('banner-image');
            }
            return redirect()->route('banners.index')->with('success', 'Banner created successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        try {
            return view('backend.banners.edit', compact('banner'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerUpdateRequest $request, Banner $banner)
    {
        try {
            $banner->update($request->except('image'));
            if (isset($request['image'])) {
                if ($banner->getFirstMedia('banner-image')) {
                    $banner->getFirstMedia('banner-image')->delete();
                }
                $banner->addMediaFromRequest('image')->withResponsiveImages()->toMediaCollection('banner-image');
            }
            return redirect()->route('banners.index')->with('success', 'Banner updated successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        try {
            $banner->delete();
            return redirect()->route('banners.index')->with('success', 'Banner deleted successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
