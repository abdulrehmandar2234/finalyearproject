<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Advertising\AdvertisingRequest;
use App\Http\Requests\Advertising\AdvertisingUpdateRequest;
use App\Models\Advertising;
use Illuminate\Http\Request;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $advertisings = Advertising::all();
            return view('backend.advertising.index', compact('advertisings'));
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
            return view('backend.advertising.create');
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
    public function store(AdvertisingRequest $request)
    {
        try {
            $slider = Advertising::create($request->except('image'));
            if (isset($request['image'])) {
                $slider->addMediaFromRequest('image')->withResponsiveImages()->toMediaCollection('advertising-image');
            }
            return redirect()->route('advertising.index')->with('success', 'Advertisement created successfully');
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
    public function edit(Advertising $advertising)
    {
        try {
            return view('backend.advertising.edit', compact('advertising'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $advertising
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisingUpdateRequest $request, Advertising $advertising)
    {
        try {
            $advertising->update($request->except('image'));
            if (isset($request['image'])) {
                if ($advertising->getFirstMedia('advertising-image')) {
                    $advertising->getFirstMedia('advertising-image')->delete();
                }
                $advertising->addMediaFromRequest('image')->withResponsiveImages()->toMediaCollection('advertising-image');
            }
            return redirect()->route('advertising.index')->with('success', 'Advertisement updated successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $advertising
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertising $advertising)
    {
        try {
            $advertising->delete();
            return redirect()->route('advertising.index')->with('success', 'Advertisement deleted successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
