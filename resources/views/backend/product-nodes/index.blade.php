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
                <li class="breadcrumb-item active" aria-current="page">Product Node</li>
            </ol>
        </nav>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{ route('product-nodes.create') }}" class="btn btn-primary btn-icon-text">
                <i class="btn-icon-prepend" data-feather="plus"></i>
                Create Product Node
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Product Node Form</h6>
                    <p class="card-description">All the product nodes are listed here.</p>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Website
                                </th>
                                <th>
                                    Listing Node
                                </th>                                                                 
                                <th>
                                    Title
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Brand
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Unit Price
                                </th>
                                <th>
                                    Discount
                                </th>                                                            
                                <th>
                                    Image
                                </th>
                                <th>
                                    Rating
                                </th>
                                <th>
                                    Product Link
                                </th>                              
                                <th>
                                    Last Updated
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
                            @foreach($nodes as $key=> $node)
                                <tr>
                                    <td>
                                        {{ ++$key }}
                                    </td>
                                    <td>
                                        {{$node->website->name}}
                                    </td>                                   
                                    <td>
                                        {{$node->main_listing_node}}
                                    </td>                                                                           
                                    <td>
                                        {{$node->title}}
                                    </td>
                                    <td>
                                        {{$node->description}}
                                    </td>
                                    <td>
                                        {{$node->brand}}
                                    </td>
                                    <td>
                                        {{$node->price}}
                                    </td>
                                    <td>
                                        {{$node->unit_price}}
                                    </td>
                                    <td>
                                        {{$node->discount}}
                                    </td>                                
                                    <td>
                                        <img src="{{asset('images/products/'. $node->image)}}" alt="product image">
                                    </td>
                                    <td>
                                        {{$node->rating}}
                                    </td>
                                    <td>
                                        {{$node->product_link}}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($node->last_updated)->diffForhumans() }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($node->created_at)->diffForhumans() }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($node->updated_at)->diffForhumans() }}
                                    </td>
                                    <td>
                                        <form class="d-inline-block" action="{{ route('product-nodes.destroy',$node->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-icon-text">
                                                <i class="btn-icon-prepend" data-feather="trash"></i> Delete
                                            </button>
                                        </form>
                                        <a href="{{ route('product-nodes.edit',$node->id) }}"
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
