@extends('layouts.backend')

@section('content')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('advertising.index') }}">Advertisements</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Advertisement</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Advertisement Form</h6>
                    <form class="forms-sample" method="POST" action="{{ route('advertising.store') }}" enctype="multipart/form-data" >
                        @csrf
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
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" autocomplete="off" placeholder="Title"
                                   name="title">
                        </div>

                        <div class="form-group">
                            <label for="link">Product Link</label>
                            <input type="url" class="form-control" id="link" autocomplete="off"
                                   placeholder="Product link" name="link">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('advertising.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

