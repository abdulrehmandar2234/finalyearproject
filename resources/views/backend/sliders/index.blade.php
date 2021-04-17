@extends('layouts.backend')
@section('styles')
    <style>
        .table td img {
            width: 75px;
            height: 75px;
            border-radius: 0%;
        }
    </style>
@endsection
@section('content')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sliders</li>
            </ol>
        </nav>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{ route('sliders.create') }}" class="btn btn-primary btn-icon-text">
                <i class="btn-icon-prepend" data-feather="plus"></i>
                Create Slider
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Sliders</h6>
                    <p class="card-description">All the sliders are listed here.</p>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Banner
                                </th>
                                <th>
                                    Image on Banner
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Sub Title
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Text on Button
                                </th>
                                <th>
                                    Created At
                                </th>
                                <th>
                                    Updated At
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $key=> $slider)                              
                                <tr>
                                    <td>
                                        {{ ++$key }}
                                    </td>                                    
                                    <td>                                        
                                        <img src="{{ asset($slider->getFirstMediaUrl('slider-banner')) }}" alt="banner image">
                                    </td>
                                    <td>
                                        <img src="{{ asset($slider->getFirstMediaUrl('slider-image')) }}" alt="image on banner">
                                    </td>
                                    <td>
                                        {{$slider->title}}
                                    </td>
                                    <td>
                                        {{$slider->sub_title}}
                                    </td>
                                    <td>
                                        {{$slider->price}}
                                    </td>
                                    <td>
                                        {{$slider->btn_text}}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($slider->created_at)->diffForhumans() }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($slider->updated_at)->diffForhumans() }}
                                    </td>
                                    <td>
                                        <form class="d-inline-block" action="{{ route('sliders.destroy',$slider->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-icon-text">
                                                <i class="btn-icon-prepend" data-feather="trash"></i> Delete
                                            </button>
                                        </form>
                                        <a href="{{ route('sliders.edit',$slider->id) }}"
                                           class="btn btn-warning btn-icon-text">
                                            <i class="btn-icon-prepend" data-feather="edit"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
