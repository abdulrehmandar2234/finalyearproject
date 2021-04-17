@extends('layouts.backend')

@section('content')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sliders.index') }}">Sliders</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Slider</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Slider Update Form</h6>
                    <form class="forms-sample" method="POST" action="{{ route('sliders.update', $slider->id) }}"
                          enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="banner">Banner upload (1920x422)</label>
                            <input type="file" name="banner" class="file-upload-default" value="{{ $slider->getFirstMediaUrl('sliders') }}">
                            <div class="input-group col-xs-12">
                                <input type="text" id="banner" class="form-control file-upload-info" disabled=""
                                       placeholder="Upload Banner" name="banner" value="">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Image upload (416x420)</label>
                            <input type="file" name="image" class="file-upload-default" value="{{ $slider->getFirstMediaUrl('sliders') }}">
                            <div class="input-group col-xs-12">
                                <input type="text" id="image" class="form-control file-upload-info" disabled=""
                                       placeholder="Image" name="image" >
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Title"
                                   name="title" value="{{$slider->title}}">
                        </div>
                        <div class="form-group">
                            <label for="sub_title">Sub Title</label>
                            <input type="text" class="form-control" id="sub_title" autocomplete="off"
                                   placeholder="Sub Title" name="sub_title" value="{{$slider->sub_title}}">
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" autocomplete="off" placeholder="Price"
                                   name="price" value="{{$slider->price}}">
                        </div>

                        <div class="form-group">
                            <label for="btn_text">Button Text</label>
                            <input type="text" class="form-control" id="btn_text" autocomplete="off"
                                   placeholder="Button Text" name="btn_text" value="{{$slider->btn_text}}">
                        </div>

                        <div class="form-group">
                            <label for="link">Product Link</label>
                            <input type="url" class="form-control" id="link" autocomplete="off"
                                   placeholder="Product link" name="link" value="{{$slider->link}}">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('sliders.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
