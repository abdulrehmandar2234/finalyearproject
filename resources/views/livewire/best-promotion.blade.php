<div>
    @include('frontend.partials.modal')
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel"
             aria-labelledby="pills-one-example1-tab" data-target-group="groups">
            <ul class="row list-unstyled products-group no-gutters">
                @forelse ($products as $product)
                    <li class="col-6 col-md-3 col-wd-2gdot4 product-item" wire:click="getProduct({{$product->id}})">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-xl-4 p-3">
                                <div class="product-item__body pb-xl-2" data-toggle="modal"
                                     data-target=".bd-example-modal-lg">
                                    <div class="mb-2"><a href="#"
                                                         class="font-size-12 text-gray-5">{{ $product->category->name }}</a>
                                    </div>
                                    <h5 class="mb-1 product-item__title"><a href="#"
                                                                            class="text-blue font-weight-bold">{{ $product->title }}</a>
                                    </h5>
                                    <div class="mb-2">
                                        <a href="#" class="d-block text-center"><img class="img-fluid"
                                                                                     src="{{ $product->getFirstMediaUrl('products') }}"
                                                                                     alt="Image Description"></a>
                                    </div>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price">
                                        <div class="text-gray-100">${{ $product->price }}</div>
                                    </div>
                                    <div class="d-none d-xl-block prodcut-add-cart">
                                        <div class="prodcut-add-cart">
                                            @include('frontend.partials.cart_form')
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="#" class="text-gray-6 font-size-13"><i
                                                class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        @include('frontend.partials.wishlist_form')
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
             aria-labelledby="pills-three-example1-tab" data-target-group="groups">
            <ul class="d-block list-unstyled products-group prodcut-list-view">
                @forelse ($products as $product)
                    <li class="product-item remove-divider" wire:click="getProduct({{$product->id}})">
                        <div class="product-item__outer w-100">
                            <div class="product-item__inner remove-prodcut-hover py-4 row">
                                <div class="product-item__header col-6 col-md-4" data-toggle="modal"
                                     data-target=".bd-example-modal-lg">
                                    <div class="mb-2">
                                        <a href="#"
                                           class="d-block text-center"><img class="img-fluid"
                                                                            src="{{ $product->getFirstMediaUrl('products') }}"
                                                                            alt="Image Description"></a>
                                    </div>
                                </div>
                                <div class="product-item__body col-6 col-md-5">
                                    <div class="pr-lg-10">
                                        <div class="mb-2"><a
                                                href="{{ route('specific_category', $product->category->slug) }}"
                                                class="font-size-12 text-gray-5">{{ $product->category->name }}</a>
                                        </div>
                                        <h5 class="mb-2 product-item__title"><a
                                                href="#"
                                                class="text-blue font-weight-bold">{{ $product->title }}</a>
                                        </h5>
                                        <div class="prodcut-price mb-2 d-md-none">
                                            <div class="text-gray-100">${{ $product->price }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer col-md-3 d-md-block">
                                    <div class="mb-3">
                                        <div class="prodcut-price mb-2">
                                            <div class="text-gray-100">${{ $product->price }}</div>
                                        </div>
                                        <div class="prodcut-add-cart">
                                            @include('frontend.partials.cart_form')
                                        </div>
                                    </div>
                                    <div
                                        class="flex-horizontal-center justify-content-between justify-content-wd-center flex-wrap">
                                        <a href="#" class="text-gray-6 font-size-13 mx-wd-3"><i
                                                class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        @include('frontend.partials.wishlist_form')
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
        <div class="tab-pane fade pt-2" id="pills-four-example1" role="tabpanel"
             aria-labelledby="pills-four-example1-tab" data-target-group="groups">
            <ul class="d-block list-unstyled products-group prodcut-list-view-small">
                @forelse ($products as $product)
                    <li class="product-item remove-divider" wire:click="getProduct({{$product->id}})">
                        <div class="product-item__outer w-100">
                            <div class="product-item__inner remove-prodcut-hover py-4 row">
                                <div class="product-item__header col-6 col-md-2" data-toggle="modal"
                                     data-target=".bd-example-modal-lg">
                                    <div class="mb-2">
                                        <a href="#" class="d-block text-center"><img class="img-fluid"
                                                                                     src="{{ $product->getFirstMediaUrl('products') }}"
                                                                                     alt="Image Description"></a>
                                    </div>
                                </div>
                                <div class="product-item__body col-6 col-md-7">
                                    <div class="pr-lg-10">
                                        <div class="mb-2"><a
                                                href="{{ route('specific_category', $product->category->slug) }}"
                                                class="font-size-12 text-gray-5">{{ $product->category->name }}</a>
                                        </div>
                                        <h5 class="mb-2 product-item__title"><a href="#"
                                                                                class="text-blue font-weight-bold">{{ $product->title }}</a>
                                        </h5>
                                        <div class="prodcut-price d-md-none">
                                            <div class="text-gray-100">${{ $product->price }}</div>
                                        </div>
                                        {{-- <ul class="font-size-12 p-0 text-gray-110 mb-4 d-none d-md-block">
                                            <li class="line-clamp-1 mb-1 list-bullet">Brand new and high quality
                                            </li>
                                            <li class="line-clamp-1 mb-1 list-bullet">Made of supreme quality,
                                                durable EVA crush resistant, anti-shock material.</li>
                                            <li class="line-clamp-1 mb-1 list-bullet">20 MP Electro and 28
                                                megapixel
                                                CMOS rear camera</li>
                                        </ul>
                                        <div class="mb-3 d-none d-md-block">
                                            <a class="d-inline-flex align-items-center small font-size-14"
                                                href="#">
                                                <div class="text-warning mr-2">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                                <span class="text-secondary">(40)</span>
                                            </a>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="product-item__footer col-md-3 d-md-block">
                                    <div class="mb-2 flex-center-between">
                                        <div class="prodcut-price">
                                            <div class="text-gray-100">${{ $product->price }}</div>
                                        </div>
                                        <div class="prodcut-add-cart">
                                            @include('frontend.partials.cart_form')
                                        </div>
                                    </div>
                                    <div
                                        class="flex-horizontal-center justify-content-between justify-content-wd-center flex-wrap border-top pt-3">
                                        <a href="#" class="text-gray-6 font-size-13 mx-wd-3"><i
                                                class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                            @include('frontend.partials.wishlist_form')
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
    {{ $products->links('custom-pagination') }}
</div>
