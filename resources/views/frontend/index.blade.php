@section('styles')
    <style>
        .wishlist-btn {
            border: none;
            background-color: white;
        }

        .list-result {
            position: absolute;
            z-index: 99;
            background: #fff;
            margin: 15px !important;
            border: 1px solid #f1f1f1;
        }

        .list-result ul {
            list-style: none;
            padding: 15px;
            margin: 0;
        }

        .ser-txt-clr {
            font-weight: 600;
            border: none;
            background: transparent;
        }

        .list-result ul li {
            padding: 5px 10px;
        }

        .list-result ul li:hover {
            background-color: #f7f7f7;
        }

        .sear-field {
            position: relative;
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
                        @livewire('product-lists',['products' => $products, 'discounted_products' =>
                        $discounted_products ])
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
