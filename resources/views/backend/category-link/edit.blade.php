@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category-links.index') }}">Category Link</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Category Link</li>
        </ol>
    </nav>
</div>

<div class="row">    
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Category Link Update Form</h6>
                <form class="forms-sample" method="POST" action="{{ route('category-links.update',$categoryLink->id) }}"  >
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="category_link">Category Link</label>
                        <input type="url" class="form-control" id="category_link" autocomplete="off" placeholder="Category Link" name="category_link" value="{{ $categoryLink->category_link }}"> 
                    </div>
                    <div class="form-group">
                        <label for="category_id">Select Category</label>
                        <select class="js-example-basic-single w-100" name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option
                                    value="{{$category->id}}" {{$categoryLink->website_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="website_id">Select Website</label>
                        <select class="js-example-basic-single w-100" name="website_id" id="website_id">
                            @foreach($websites as $website)
                                <option
                                    value="{{$website->id}}" {{$categoryLink->website_id == $website->id ? 'selected' : ''}}>{{$website->name}}</option>
                            @endforeach
                        </select>
                    </div>                                        
                    <div class="form-group">
                        <label for="request_type">Request Type</label>
                        <select class="form-control" name="request_type">                           
                                <option value="GET">GET</option>       
                                <option value="POST">POST</option>                               
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="request_type">Scrape Method</label>
                        <select class="form-control" name="scrape_method">                           
                            <option value="HTML">HTML</option>                                   
                            <option value="API">API</option>       
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{route('category-links.index')}}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection