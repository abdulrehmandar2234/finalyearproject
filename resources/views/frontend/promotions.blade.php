@extends('layouts.shop')
@section('content')
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{url('/')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Products
                        </li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="row mb-8">
            <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                <div class="mb-6 border border-width-2 border-color-3 borders-radius-6">
                    <!-- List -->
                    <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all">
                        <li>
                            <div class="dropdown-title">Browse Categories</div>
                        </li>
                        @foreach ($categories as $category)
                            <li>
                            <li><a class="dropdown-item"
                                   href="{{ route('specific_category', $category->slug) }}">{{ $category->name }}
                                    <span class="text-gray-25 font-size-12 font-weight-normal"> ({{ $category->products_count }})</span></a>
                            </li>
                            </li>
                        @endforeach
                    </ul>
                    <!-- End List -->
                </div>
                <div class="mb-6">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filters</h3>
                    </div>
                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="font-size-14 mb-3 font-weight-bold">Brands</h4>

                        <!-- Checkboxes -->
                        @foreach ($brands->take(7) as $brand)
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="brandAdidas">
                                    <label class="custom-control-label" for="brandAdidas">{{ $brand->brand }}
                                        <span class="text-gray-25 font-size-12 font-weight-normal"> (0)</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    <!-- End Checkboxes -->

                        <!-- View More - Collapse -->
                        @foreach ($brands as $brand)
                            @if ($loop->iteration >= 8)
                                <div class="collapse" id="collapseBrand">
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brandGucci">
                                            <label class="custom-control-label" for="brandGucci">{{ $brand->brand }}
                                                <span class="text-gray-25 font-size-12 font-weight-normal"> (0)</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                        @endif
                    @endforeach
                    <!-- End View More - Collapse -->

                        <!-- Link -->
                        <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2"
                           data-toggle="collapse" href="#collapseBrand" role="button" aria-expanded="false"
                           aria-controls="collapseBrand">
                                    <span class="link__icon text-gray-27 bg-white">
                                        <span class="link__icon-inner">+</span>
                                    </span>
                            <span class="link-collapse__default">Show more</span>
                            <span class="link-collapse__active">Show less</span>
                        </a>
                        <!-- End Link -->
                    </div>
                    <div class="border-bottom pb-4 mb-4">
                        <h4 class="font-size-14 mb-3 font-weight-bold">Websites</h4>

                        <!-- Checkboxes -->
                        @foreach ($websites->take(7) as $website)
                            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="categoryTshirt">
                                    <label class="custom-control-label" for="categoryTshirt">{{ $website->name }}
                                        <span class="text-gray-25 font-size-12 font-weight-normal">
                                            ({{ $website->products_count }})</span></label>
                                </div>
                            </div>
                        @endforeach
                    <!-- End Checkboxes -->

                        <!-- View More - Collapse -->
                        @foreach ($websites as $website)
                            @if ($loop->iteration >= 8)
                                <div class="collapse" id="collapseColor">
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="categoryShorts">
                                            <label class="custom-control-label"
                                                   for="categoryShorts">{{ $website->name }}
                                                <span class="text-gray-25 font-size-12 font-weight-normal">
                                                    ({{ $website->products_count }})</span></label>
                                        </div>
                                    </div>
                                </div>
                        @endif
                    @endforeach
                    <!-- End View More - Collapse -->

                        <!-- Link -->
                        <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2"
                           data-toggle="collapse" href="#collapseColor" role="button" aria-expanded="false"
                           aria-controls="collapseColor">
                                    <span class="link__icon text-gray-27 bg-white">
                                        <span class="link__icon-inner">+</span>
                                    </span>
                            <span class="link-collapse__default">Show more</span>
                            <span class="link-collapse__active">Show less</span>
                        </a>
                        <!-- End Link -->
                    </div>
                    @include('frontend.partials.price_filter',['route'=>'best_promotions.priceFilter'])
                </div>
            </div>
            <div class="col-xl-9 col-wd-9gdot5">
                <!-- Shop-control-bar Title -->
                <div class="flex-center-between mb-3">
                    <h3 class="font-size-25 mb-0">Best Promotions</h3>
                    <p class="font-size-14 text-gray-90 mb-0">Showing 1–25 of 56 results</p>
                </div>
                <!-- End shop-control-bar Title -->
                <!-- Shop-control-bar -->
                <div class="bg-gray-1 flex-center-between borders-radius-9 py-1">
                    <div class="d-xl-none">
                        <!-- Account Sidebar Toggle Button -->
                        <a id="sidebarNavToggler1" class="btn btn-sm py-1 font-weight-normal" href="javascript:;"
                           role="button"
                           aria-controls="sidebarContent1"
                           aria-haspopup="true"
                           aria-expanded="false"
                           data-unfold-event="click"
                           data-unfold-hide-on-scroll="false"
                           data-unfold-target="#sidebarContent1"
                           data-unfold-type="css-animation"
                           data-unfold-animation-in="fadeInLeft"
                           data-unfold-animation-out="fadeOutLeft"
                           data-unfold-duration="500">
                            <i class="fas fa-sliders-h"></i> <span class="ml-1">Filters</span>
                        </a>
                        <!-- End Account Sidebar Toggle Button -->
                    </div>
                    <div class="px-3 d-none d-xl-block">
                        <ul class="nav nav-tab-shop" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-one-example1-tab" data-toggle="pill"
                                   href="#pills-one-example1" role="tab" aria-controls="pills-one-example1"
                                   aria-selected="false">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <i class="fa fa-th"></i>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="pills-three-example1-tab" data-toggle="pill"
                                   href="#pills-three-example1" role="tab" aria-controls="pills-three-example1"
                                   aria-selected="true">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <i class="fa fa-list"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-four-example1-tab" data-toggle="pill"
                                   href="#pills-four-example1" role="tab" aria-controls="pills-four-example1"
                                   aria-selected="true">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <i class="fa fa-th-list"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex">
                        <!-- Select -->
                        <select onChange="window.location.href=this.value"
                                class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                                data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                            <option>Sort By</option>
                            <option value="{{route('best_promotions', ['sort'=>'latest'])}}">Sort by latest</option>
                            <option value="{{route('best_promotions', ['sort'=>'low_high'])}}">Sort by price: low to high</option>
                            <option value="{{route('best_promotions', ['sort'=>'high_low'])}}">Sort by price: high to low</option>
                        </select>
                        <!-- End Select -->
                        <!-- Select -->
                        <select onChange="window.location.href=this.value" class="js-select selectpicker dropdown-select max-width-120"
                                data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                            <option>Show</option>
                            <option value="{{route('best_promotions')}}">Show 50</option>
                            <option value="{{route('best_promotions', ['paginate'=>'100'])}}">Show 100</option>
                            <option value="{{route('best_promotions', ['paginate'=>'all'])}}">Show All</option>
                        </select>
                        <!-- End Select -->
                    </div>
                </div>
                <!-- End Shop-control-bar -->
                <!-- Shop Body -->
                <!-- Tab Content -->
                @livewire('best-promotion',['products' => $products])
                <!-- End Tab Content -->
                <!-- End Shop Body -->
            </div>
        </div>
        <!-- Brand Carousel -->
    @include('frontend.partials.brand_carousel')
    <!-- End Brand Carousel -->
    </div>
@endsection
