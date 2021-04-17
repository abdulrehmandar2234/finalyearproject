@extends('layouts.backend')

@section('content')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product-nodes.index') }}">Product Nodes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Product Node</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Product Node Update Form</h6>
                    <form class="forms-sample" method="POST" action="{{ route('product-nodes.update', $productNode->id) }}"
                          enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="website_id">Select Website</label>
                            <select class="js-example-basic-single w-100" name="website_id" id="website_id">
                                @foreach($websites as $website)
                                    <option
                                        value="{{$website->id}}" {{$productNode->website_id == $website->id ? 'selected' : ''}}>{{$website->name}}</option>
                                @endforeach
                            </select>
                        </div>                  
                        <div class="form-group">
                            <label for="main_listing_node">Main Listing Node</label>
                            <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Main Listing Node"
                                   name="main_listing_node" value="{{ $productNode->main_listing_node }}">
                        </div>                              
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Title"
                                   name="title" value="{{$productNode->title}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" autocomplete="off" placeholder="Description"
                                   name="description" value="{{ $productNode->description }}">
                        </div>
                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <input type="text" class="form-control" id="brand" autocomplete="off" placeholder="Brand"
                                   name="brand" value="{{ $productNode->brand }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" autocomplete="off" placeholder="Price"
                                   name="price" value="{{$productNode->price}}">
                        </div>
                        <div class="form-group">
                            <label for="unit_price">Unit Price</label>
                            <input type="text" class="form-control" id="unit_price" autocomplete="off" placeholder="Unit Price"
                                   name="unit_price" value="{{$productNode->unit_price}}">
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="text" class="form-control" id="discount" autocomplete="off"
                                   placeholder="Discount"
                                   name="discount" value="{{$productNode->discount}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="text" class="form-control" id="image" autocomplete="off"
                                   placeholder="Image"
                                   name="image" value="{{ $productNode->image }}">
                        </div> 
                        <div class="form-group">
                            <label for="image_url">Image URL</label>
                            <input type="text" class="form-control" id="image_url" autocomplete="off"
                                   placeholder="Image URL"
                                   name="image_url" value="{{ $productNode->image_url }}">
                        </div>                        
                       
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="text" class="form-control" id="rating" autocomplete="off"
                                   placeholder="Rating"
                                   name="rating" value="{{$productNode->rating}}">
                        </div>
                        <div class="form-group">
                            <label for="product_link">Product Link</label>
                            <input type="text" class="form-control" id="product_link" autocomplete="off"
                                   placeholder="Product Link"
                                   name="product_link" value="{{$productNode->product_link}}">
                        </div>                        
                        <div class="form-group">
                            <label for="product_url">Product URL</label>
                            <input type="text" class="form-control" id="product_url" autocomplete="off"
                                   placeholder="Product URL"
                                   name="product_url" value="{{$productNode->product_url}}">
                        </div> 
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('product-nodes.index') }}" class="btn btn-light">Cancel</a>
                        <hr>
                        <h3 class="text-center">Apply String Functions</h3>
                        <div class="form-group">
                            <label for="substr">Subtract String</label>
                            <input type="number" class="form-control" id="substr" autocomplete="off"
                                   placeholder="Subtract String"
                                   name="substr" value="{{$productNode->substr}}">
                        </div>  
                        <div class="form-group">
                            <label for="explode">Explode String</label>
                            <input type="text" class="form-control" id="explode" autocomplete="off"
                                   placeholder="Explode String"
                                   name="explode" value="{{$productNode->explode}}">
                        </div>    
                        <div class="form-group">
                            <label for="substr_strpos">Subtract String From Position</label>
                            <input type="text" class="form-control" id="substr_strpos" autocomplete="off"
                                   placeholder="Subtract String From Position"
                                   name="substr_strpos" value="{{$productNode->substr_strpos}}">
                        </div>                   
                        <div class="form-group">
                            <label for="str_replace">String Replace</label>
                            <input type="text" class="form-control" id="str_replace" autocomplete="off"
                                   placeholder="String Replace"
                                   name="str_replace" value="{{ $productNode->str_replace }}">
                        </div>     
                        <div class="form-group">
                            <label for="replace_with">String Replace With</label>
                            <input type="text" class="form-control" id="replace_with" autocomplete="off"
                                   placeholder="String Replace With"
                                   name="replace_with" value="{{ $productNode->replace_with }}">
                        </div>            
                        <div class="form-group">
                            <label for="append_str">Append String</label>
                            <input type="text" class="form-control" id="append_str" autocomplete="off"
                                   placeholder="Append String"
                                   name="append_str" value="{{ $productNode->append_str }}">
                        </div>                 
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('product-nodes.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
