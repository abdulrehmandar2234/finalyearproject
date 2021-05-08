@section('styles')
    <style>
        .wishlist-btn {
            border: none;
            background-color: white;
        }
    </style>
@endsection
@extends('layouts.frontend')
@section('content')
    <!-- Slider Section -->
    @include('frontend.partials.slider')
    <!-- End Slider Section -->
    <div class="container">
        <!-- Banner -->
        <div class="mb-5">
            <div class="row">
                <div class="col-md-6 mb-4 mb-xl-0 col-xl-3">
                    <a href="../shop/shop.html" class="d-black text-gray-90">
                        <div class="min-height-132 py-1 d-flex bg-gray-1 align-items-center">
                            <div class="col-6 col-xl-5 col-wd-6 pr-0">
                                <img class="img-fluid" src="{{ 'assets/img/190X150/img1.png' }}"
                                     alt="Image Description">
                            </div>
                            <div class="col-6 col-xl-7 col-wd-6">
                                <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                    CATCH BIG <strong>DEALS</strong> ON THE CAMERAS
                                </div>
                                <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
                                    Shop now
                                    <span class="link__icon ml-1">
                                        <span class="link__icon-inner"><i
                                                class="ec ec-arrow-right-categproes"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 mb-4 mb-xl-0 col-xl-3">
                    <a href="../shop/shop.html" class="d-black text-gray-90">
                        <div class="min-height-132 py-1 d-flex bg-gray-1 align-items-center">
                            <div class="col-6 col-xl-5 col-wd-6 pr-0">
                                <img class="img-fluid" src="{{ 'assets/img/190X150/img2.jpg' }}"
                                     alt="Image Description">
                            </div>
                            <div class="col-6 col-xl-7 col-wd-6">
                                <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                    CATCH BIG <strong>DEALS</strong> ON THE CAMERAS
                                </div>
                                <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
                                    Shop now
                                    <span class="link__icon ml-1">
                                        <span class="link__icon-inner"><i
                                                class="ec ec-arrow-right-categproes"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 mb-4 mb-xl-0 col-xl-3">
                    <a href="../shop/shop.html" class="d-black text-gray-90">
                        <div class="min-height-132 py-1 d-flex bg-gray-1 align-items-center">
                            <div class="col-6 col-xl-5 col-wd-6 pr-0">
                                <img class="img-fluid" src="{{ 'assets/img/190X150/img3.jpg' }}"
                                     alt="Image Description">
                            </div>
                            <div class="col-6 col-xl-7 col-wd-6">
                                <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                    CATCH BIG <strong>DEALS</strong> ON THE CAMERAS
                                </div>
                                <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
                                    Shop now
                                    <span class="link__icon ml-1">
                                        <span class="link__icon-inner"><i
                                                class="ec ec-arrow-right-categproes"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 mb-4 mb-xl-0 col-xl-3">
                    <a href="../shop/shop.html" class="d-black text-gray-90">
                        <div class="min-height-132 py-1 d-flex bg-gray-1 align-items-center">
                            <div class="col-6 col-xl-5 col-wd-6 pr-0">
                                <img class="img-fluid" src="{{ 'assets/img/190X150/img4.png' }}"
                                     alt="Image Description">
                            </div>
                            <div class="col-6 col-xl-7 col-wd-6">
                                <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                    CATCH BIG <strong>DEALS</strong> ON THE CAMERAS
                                </div>
                                <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
                                    Shop now
                                    <span class="link__icon ml-1">
                                        <span class="link__icon-inner"><i
                                                class="ec ec-arrow-right-categproes"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Banner -->
        <!-- Deals-and-tabs -->
        <div class="mb-5">
            <div class="row">
                <!-- Deal -->
            {{-- <div class="col-md-auto mb-6 mb-md-0">
            <div class="p-3 border border-width-2 border-primary borders-radius-20 bg-white min-width-370">
                <div class="d-flex justify-content-between align-items-center m-1 ml-2">
                    <h3 class="font-size-22 mb-0 font-weight-normal text-lh-28 max-width-120">Special Offer</h3>
                    <div class="d-flex align-items-center flex-column justify-content-center bg-primary rounded-pill height-75 width-75 text-lh-1">
                        <span class="font-size-12">Save</span>
                        <div class="font-size-20 font-weight-bold">$120</div>
                    </div>
                </div>
                <div class="mb-4">
                    <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img class="img-fluid" src="{{('assets/img/320X300/img1.jpg')}}" alt="Image Description"></a>
                </div>
                <h5 class="mb-2 font-size-14 text-center mx-auto max-width-180 text-lh-18"><a href="../shop/single-product-fullwidth.html" class="text-blue font-weight-bold">Game Console Controller + USB 3.0 Cable</a></h5>
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <del class="font-size-18 mr-2 text-gray-2">$99,00</del>
                    <ins class="font-size-30 text-red text-decoration-none">$79,00</ins>
                </div>
                <div class="mb-3 mx-2">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="">Availavle: <strong>6</strong></span>
                        <span class="">Already Sold: <strong>28</strong></span>
                    </div>
                    <div class="rounded-pill bg-gray-3 height-20 position-relative">
                        <span class="position-absolute left-0 top-0 bottom-0 rounded-pill w-30 bg-primary"></span>
                    </div>
                </div>
                <div class="mb-2">
                    <h6 class="font-size-15 text-gray-2 text-center mb-3">Hurry Up! Offer ends in:</h6>
                    <div class="js-countdown d-flex justify-content-center"
                        data-end-date="2020/11/30"
                        data-hours-format="%H"
                        data-minutes-format="%M"
                        data-seconds-format="%S">
                        <div class="text-lh-1">
                            <div class="text-gray-2 font-size-30 bg-gray-4 py-2 px-2 rounded-sm mb-2">
                                <span class="js-cd-hours"></span>
                            </div>
                            <div class="text-gray-2 font-size-12 text-center">HOURS</div>
                        </div>
                        <div class="mx-1 pt-1 text-gray-2 font-size-24">:</div>
                        <div class="text-lh-1">
                            <div class="text-gray-2 font-size-30 bg-gray-4 py-2 px-2 rounded-sm mb-2">
                                <span class="js-cd-minutes"></span>
                            </div>
                            <div class="text-gray-2 font-size-12 text-center">MINS</div>
                        </div>
                        <div class="mx-1 pt-1 text-gray-2 font-size-24">:</div>
                        <div class="text-lh-1">
                            <div class="text-gray-2 font-size-30 bg-gray-4 py-2 px-2 rounded-sm mb-2">
                                <span class="js-cd-seconds"></span>
                            </div>
                            <div class="text-gray-2 font-size-12 text-center">SECS</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
            <!-- End Deal -->
                <!-- Tab Prodcut -->
                <div class="col">
                    <!-- Features Section -->
                    <div class="">
                        <!-- Nav Classic -->
                        <div class="position-relative bg-white text-center z-index-2">
                            <ul class="nav nav-classic nav-tab justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active " id="pills-one-example1-tab" data-toggle="pill"
                                       href="#pills-one-example1" role="tab" aria-controls="pills-one-example1"
                                       aria-selected="true">
                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                            Featured
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="pills-two-example1-tab" data-toggle="pill"
                                       href="#pills-two-example1" role="tab" aria-controls="pills-two-example1"
                                       aria-selected="false">
                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                            On Sale
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="pills-three-example1-tab" data-toggle="pill"
                                       href="#pills-three-example1" role="tab" aria-controls="pills-three-example1"
                                       aria-selected="false">
                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                            Top Rated
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Nav Classic -->

                        <!-- Tab Content -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel"
                                 aria-labelledby="pills-one-example1-tab">
                                <ul class="row list-unstyled products-group no-gutters">
                                    @forelse ($products as $product)
                                        <li class="col-6 col-wd-3 col-md-3 product-item">
                                            <div class="product-item__outer h-100">
                                                <div class="product-item__inner px-xl-4 p-3">
                                                    <div class="product-item__body pb-xl-2">
                                                        <div class="mb-2"><a href="#"
                                                                             class="font-size-12 text-gray-5">{{ $product->category->name }}</a>
                                                        </div>
                                                        <h5 class="mb-1 product-item__title"><a href="#"
                                                                                                class="text-blue font-weight-bold">{{ $product->title }}</a>
                                                        </h5>
                                                        <div class="mb-2">
                                                            <a href="#" class="d-block text-center"><img
                                                                    class="img-fluid"
                                                                    src="{{ $product->getFirstMediaUrl('products') }}"
                                                                    alt="Image Description"></a>
                                                        </div>
                                                        <div class="flex-center-between mb-1">
                                                            <div
                                                                class="prodcut-price d-flex align-items-center flex-wrap position-relative">
                                                                <ins
                                                                    class="font-size-20 text-red text-decoration-none mr-2">
                                                                    ${{ $product->price }}</ins>
                                                                <del
                                                                    class="font-size-12 tex-gray-6 position-absolute bottom-100">
                                                                    $2
                                                                    299,00
                                                                </del>
                                                            </div>
                                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                                <form action="{{route('cart.store')}}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                           value="{{$product->id}}">
                                                                    <input type="hidden" name="title"
                                                                           value="{{$product->title}}">
                                                                    <input type="hidden" name="price"
                                                                           value="{{$product->price}}">
                                                                    <button type="submit"
                                                                            class="btn-add-cart btn-primary transition-3d-hover">
                                                                        <i class="ec ec-add-to-cart"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="#" class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                            <form action="{{route('wishlist.store')}}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                       value="{{$product->id}}">
                                                                <input type="hidden" name="title"
                                                                       value="{{$product->title}}">
                                                                <input type="hidden" name="price"
                                                                       value="{{$product->price}}">
                                                                <button class="text-gray-6 font-size-13 wishlist-btn"><i
                                                                        class="ec ec-favorites mr-1 font-size-15"></i>
                                                                    Add
                                                                    to
                                                                    Wishlist
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <h4>No Product Found</h4>
                                    @endforelse
                                </ul>
                            </div>
                            <div class="tab-pane fade pt-2" id="pills-two-example1" role="tabpanel"
                                 aria-labelledby="pills-two-example1-tab">
                                <ul class="row list-unstyled products-group no-gutters">
                                    @forelse ($products as $product)
                                        <li class="col-6 col-wd-3 col-md-3 product-item">
                                            <div class="product-item__outer h-100">
                                                <div class="product-item__inner px-xl-4 p-3">
                                                    <div class="product-item__body pb-xl-2">
                                                        <div class="mb-2"><a href="#"
                                                                             class="font-size-12 text-gray-5">{{ $product->category->name }}</a>
                                                        </div>
                                                        <h5 class="mb-1 product-item__title"><a href="#"
                                                                                                class="text-blue font-weight-bold">{{ $product->title }}</a>
                                                        </h5>
                                                        <div class="mb-2">
                                                            <a href="#" class="d-block text-center"><img
                                                                    class="img-fluid"
                                                                    src="{{ $product->getFirstMediaUrl('products') }}"
                                                                    alt="Image Description"></a>
                                                        </div>
                                                        <div class="flex-center-between mb-1">
                                                            <div
                                                                class="prodcut-price d-flex align-items-center flex-wrap position-relative">
                                                                <ins
                                                                    class="font-size-20 text-red text-decoration-none mr-2">
                                                                    ${{ $product->price }}</ins>
                                                                <del
                                                                    class="font-size-12 tex-gray-6 position-absolute bottom-100">
                                                                    $2
                                                                    299,00
                                                                </del>
                                                            </div>
                                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                                <a href="#"
                                                                   class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                        class="ec ec-add-to-cart"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="#" class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                            <a href="#" class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i> Add
                                                                to
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <h4>No Product Found</h4>
                                    @endforelse
                                </ul>
                            </div>
                            <div class="tab-pane fade pt-2" id="pills-three-example1" role="tabpanel"
                                 aria-labelledby="pills-three-example1-tab">
                                <ul class="row list-unstyled products-group no-gutters">
                                    @forelse ($products as $product)
                                        <li class="col-6 col-wd-3 col-md-3 product-item">
                                            <div class="product-item__outer h-100">
                                                <div class="product-item__inner px-xl-4 p-3">
                                                    <div class="product-item__body pb-xl-2">
                                                        <div class="mb-2"><a href="#"
                                                                             class="font-size-12 text-gray-5">{{ $product->category->name }}</a>
                                                        </div>
                                                        <h5 class="mb-1 product-item__title"><a href="#"
                                                                                                class="text-blue font-weight-bold">{{ $product->title }}</a>
                                                        </h5>
                                                        <div class="mb-2">
                                                            <a href="#" class="d-block text-center"><img
                                                                    class="img-fluid"
                                                                    src="{{ $product->getFirstMediaUrl('products') }}"
                                                                    alt="Image Description"></a>
                                                        </div>
                                                        <div class="flex-center-between mb-1">
                                                            <div
                                                                class="prodcut-price d-flex align-items-center flex-wrap position-relative">
                                                                <ins
                                                                    class="font-size-20 text-red text-decoration-none mr-2">
                                                                    ${{ $product->price }}</ins>
                                                                <del
                                                                    class="font-size-12 tex-gray-6 position-absolute bottom-100">
                                                                    $2
                                                                    299,00
                                                                </del>
                                                            </div>
                                                            <div class="d-none d-xl-block prodcut-add-cart">
                                                                <a href="#"
                                                                   class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                        class="ec ec-add-to-cart"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="#" class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                            <a href="#" class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i> Add
                                                                to
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <h4>No Product Found</h4>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!-- End Tab Content -->
                    </div>
                    <!-- End Features Section -->
                </div>
                <!-- End Tab Prodcut -->
            </div>
        </div>
        <!-- End Deals-and-tabs -->
    </div>

    <div class="container">
        <!-- Full banner -->
        <div class="mb-6">
            <a href="../shop/shop.html" class="d-block text-gray-90">
                <div class="" style="background-image: url({{ 'assets/img/1400X206/img1.jpg' }});">
                    <div class="space-top-2-md p-4 pt-6 pt-md-8 pt-lg-6 pt-xl-8 pb-lg-4 px-xl-8 px-lg-6">
                        <div class="flex-horizontal-center mt-lg-3 mt-xl-0 overflow-auto overflow-md-visble">
                            <h1 class="text-lh-38 font-size-32 font-weight-light mb-0 flex-shrink-0 flex-md-shrink-1">
                                SHOP
                                AND <strong>SAVE BIG</strong> ON HOTTEST TABLETS</h1>
                            <div class="ml-5 flex-content-center flex-shrink-0">
                                <div class="bg-primary rounded-lg px-6 py-2">
                                    <em class="font-size-14 font-weight-light">STARTING AT</em>
                                    <div class="font-size-30 font-weight-bold text-lh-1">
                                        <sup class="">$</sup>79<sup class="">99</sup>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- End Full banner -->
        <!-- Brand Carousel -->
    @include('frontend.partials.brand_carousel')
    <!-- End Brand Carousel -->
    </div>
@endsection
