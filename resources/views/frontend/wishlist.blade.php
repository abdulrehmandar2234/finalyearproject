@section('styles')
    <style>
        .remove_cart {
            border: none;
            background-color: white;
        }
    </style>
@endsection
@extends('layouts.shop')
@section('content')
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Wishlist
                        </li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="my-6">
            <h1 class="text-center">My wishlist on Electro</h1>
        </div>
        <div class="mb-16 wishlist-table">
            <form class="mb-4" action="#" method="post">
                <div class="table-responsive">
                    <table class="table" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Unit Price</th>
                            <th class="product-Stock w-lg-15">Stock Status</th>
                            <th class="product-subtotal min-width-200-md-lg">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse(\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->content() as $wishlist)
                        <tr>
                            <td class="text-center">
                                <form action="{{route('wishlist.destroy',$wishlist->rowId)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-32 font-size-26 remove_cart">×</button>
                                </form>
                            </td>

                            <td class="d-none d-md-table-cell">
                                <a href="#"><img class="img-fluid max-width-100 p-1 border border-color-1"
                                                 src="{{$wishlist->model->getFirstMediaUrl('products')}}" alt="Image Description"></a>
                            </td>

                            <td data-title="Product">
                                <a href="#" class="text-gray-90">{{$wishlist->model->title}}</a>
                            </td>

                            <td data-title="Unit Price">
                                <span class="">${{$wishlist->model->price}}</span>
                            </td>

                            <td data-title="Stock Status">
                                <!-- Stock Status -->
                                <span>In stock</span>
                                <!-- End Stock Status -->
                            </td>

                            <td>
                                <form action="{{route('switch_to_cart',$wishlist->rowId)}}" method="POST">
                                    @csrf
                                <button type="submit"
                                        class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">
                                    Add to Cart
                                </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <h4>No Product in Wishlist</h4>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
@endsection
