@extends('layouts.backend')

@section('content')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('websites.index') }}">Websites</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Website</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Website Form</h6>
                    <form class="forms-sample" method="POST" action="{{ route('websites.store') }}" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" autocomplete="off" placeholder="Name"
                                   name="name">
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="url" class="form-control" id="link" autocomplete="off"
                                   placeholder="Url" name="link">
                        </div>
                        <div class="form-group">
                            <label for="currency_id">Select Currency</label>
                            <select class="js-example-basic-single w-100" name="currency_id" id="currency_id">
                                @foreach($currencies as $currency)
                                <option value="{{$currency->id}}">{{$currency->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image_url">Image URL</label>
                            <input type="text" class="form-control" id="image_url" autocomplete="off"
                                   placeholder="Image URL"
                                   name="image_url" value="">
                        </div>                        
                        <div class="form-group">
                            <label for="source">Source</label>
                            <input type="text" class="form-control" id="source" autocomplete="off"
                                   placeholder="Source"
                                   name="source" value="">
                        </div>                  
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" id="logo" class="form-control file-upload-info" disabled=""
                                       placeholder="Logo">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('websites.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

