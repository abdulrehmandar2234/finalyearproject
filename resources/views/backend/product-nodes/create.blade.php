@extends('layouts.backend')

@section('content')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product-nodes.index') }}">Product Nodes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Product Nodes</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Product Node Form</h6>
                    <form class="forms-sample" method="POST" action="{{ route('product-nodes.store') }}" enctype="multipart/form-data" >
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
                            <label for="main_listing_node">Main Listing Node</label>
                            <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Main Listing Node"
                                   name="main_listing_node" value="">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Title"
                                   name="title" value="">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" autocomplete="off" placeholder="Description"
                                   name="description" value="">
                        </div>
                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <input type="text" class="form-control" id="brand" autocomplete="off" placeholder="Brand"
                                   name="brand" value="">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" autocomplete="off" placeholder="Price"
                                   name="price" value="">
                        </div>
                        <div class="form-group">
                            <label for="unit_price">Unit Price</label>
                            <input type="text" class="form-control" id="unit_price" autocomplete="off" placeholder="Unit Price"
                                   name="unit_price" value="">
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="text" class="form-control" id="discount" autocomplete="off"
                                   placeholder="Discount"
                                   name="discount" value="">
                        </div>                        
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="text" class="form-control" id="image" autocomplete="off"
                                   placeholder="Image"
                                   name="image" value="">
                        </div>                        
                        <div class="form-group">
                            <label for="image_url">Image URL</label>
                            <input type="text" class="form-control" id="image_url" autocomplete="off"
                                   placeholder="Image URL"
                                   name="image_url" value="">
                        </div>                                                
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="text" class="form-control" id="rating" autocomplete="off"
                                   placeholder="Rating"
                                   name="rating" value="">
                        </div>
                        <div class="form-group">
                            <label for="product_link">Product Link</label>
                            <input type="text" class="form-control" id="product_link" autocomplete="off"
                                   placeholder="Product Link"
                                   name="product_link" value="">
                        </div>                        
                        <div class="form-group">
                            <label for="product_url">Product URL</label>
                            <input type="text" class="form-control" id="product_url" autocomplete="off"
                                   placeholder="Product URL"
                                   name="product_url" value="">
                        </div>      
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('product-nodes.index') }}" class="btn btn-light">Cancel</a>
                        <hr>
                        <h3 class="text-center">Apply String Functions</h3>
                        <div class="form-group">
                            <label for="substr">Subtract String</label>
                            <input type="number" class="form-control" id="substr" autocomplete="off"
                                   placeholder="Subtract String"
                                   name="substr" value="">
                        </div>                        
                        <div class="form-group">
                            <label for="explode">Explode String</label>
                            <input type="text" class="form-control" id="explode" autocomplete="off"
                                   placeholder="Explode String"
                                   name="explode" value="">
                        </div>                        
                        <div class="form-group">
                            <label for="substr_strpos">Subtract String From Position</label>
                            <input type="text" class="form-control" id="substr_strpos" autocomplete="off"
                                   placeholder="Subtract String From Position"
                                   name="substr_strpos" value="">
                        </div>                        
                        <div class="form-group">
                            <label for="str_replace">String Replace</label>
                            <input type="text" class="form-control" id="str_replace" autocomplete="off"
                                   placeholder="String Replace"
                                   name="str_replace" value="">
                        </div>  
                        <div class="form-group">
                            <label for="replace_with">String Replace With</label>
                            <input type="text" class="form-control" id="replace_with" autocomplete="off"
                                   placeholder="String Replace With"
                                   name="replace_with" value="">
                        </div>  
                        <div class="form-group">
                            <label for="append_str">Append String</label>
                            <input type="text" class="form-control" id="append_str" autocomplete="off"
                                   placeholder="Append String"
                                   name="append_str" value="">
                        </div>  
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('product-nodes.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

