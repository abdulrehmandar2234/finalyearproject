<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\SliderRequest;
use App\Http\Requests\Slider\SliderUpdateRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $sliders = Slider::all();

            return view('backend.sliders.index', compact('sliders'));
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
            return view('backend.sliders.create');
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
    public function store(SliderRequest $request)
    {
        try {
            $slider = Slider::create($request->except('image', 'banner'));
            if (isset($request['image'])) {
                $slider->addMediaFromRequest('image')->toMediaCollection('slider-image');
            }
            if (isset($request['banner'])) {
                $slider->addMediaFromRequest('banner')->toMediaCollection('slider-banner');
            }
            return redirect()->route('sliders.index')->with('success', 'Slider created successfully');
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
    public function edit(Slider $slider)
    {
        try {
            return view('backend.sliders.edit', compact('slider'));
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
    public function update(SliderUpdateRequest $request, Slider $slider)
    {
        try {
            $slider->update($request->except('image', 'banner'));
            if (isset($request['image'])) {
                $slider->getFirstMedia('slider-image')->delete();
                $slider->addMediaFromRequest('image')->toMediaCollection('slider-image');
            }
            if (isset($request['banner'])) {
                $slider->getFirstMedia('slider-banner')->delete();
                $slider->addMediaFromRequest('banner')->toMediaCollection('slider-banner');
            }
            return redirect()->route('sliders.index')->with('success', 'Slider updated successfully');
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
    public function destroy(Slider $slider)
    {
        try {
            $slider->delete();
            return redirect()->route('sliders.index')->with('success', 'Slider deleted successfully');
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
