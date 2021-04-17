@extends('layouts.backend')

@section('content')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Product</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Product Form</h6>
                    <form class="forms-sample" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="website_id">Select Website</label>
                            <select class="js-example-basic-single w-100" name="website_id" id="website_id">
                                @foreach($websites as $website)
                                    <option
                                        value="{{$website->id}}" >{{$website->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Select Category</label>
                            <select class="js-example-basic-single w-100" name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Title"
                                   name="title" value="">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Description" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <input type="text" class="form-control" id="brand" autocomplete="off" placeholder="Brand"
                            name="brand" value="">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" autocomplete="off" placeholder="Price"
                                   name="price" value="">
                        </div>
                        <div class="form-group">
                            <label for="unit_price">Unit Price</label>
                            <input type="number" class="form-control" id="unit_price" autocomplete="off" placeholder="Unit Price"
                                   name="unit_price" value="">
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="number" class="form-control" id="discount" autocomplete="off"
                                   placeholder="Discount"
                                   name="discount" value="">
                        </div>
                        <div class="form-group">
                            <label for="image">Image upload</label>
                            <input type="file" name="image" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" id="image" class="form-control file-upload-info" disabled=""
                                       placeholder="Image" name="image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="number" class="form-control" id="rating" autocomplete="off"
                                   placeholder="Rating"
                                   name="rating" value="">
                        </div>
                        <div class="form-group">
                            <label for="product_link">Product Link</label>
                            <input type="url" class="form-control" id="product_link" autocomplete="off"
                                   placeholder="Product Link"
                                   name="product_link" value="">
                        </div>                      
                        <div class="form-group">
                            <label for="last_updated">Last Updated</label>
                            <div class="input-group date datepicker" id="datePickerExample">
                                <input type="text" name="last_updated" class="form-control"><span class="input-group-addon"><i data-feather="calendar"></i></span>
                            </div>
                        </div>                     

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('products.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

