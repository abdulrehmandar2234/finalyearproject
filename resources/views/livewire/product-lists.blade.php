<div>
    <div wire:ignore.self class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="d-flex justify-content-center">
                            <div wire:loading>
                                <img src="{{asset('media/loader.gif')}}" alt="loader">
                            </div>
                        </div>

                        <div wire:loading.remove>
                            <div class="row">
                                <div class="col-sm">
                                    @if(isset($product))
                                        {{$product->getFirstMedia('products')}}
                                    @endif
                                </div>
                                <div class="col-sm">
                                    <div>
                                        @if(isset($product))
                                            <h4>{{$product->title}}</h4>
                                        @endif
                                    </div>
                                    @if(isset($product))
                                        <b>Category</b> : &nbsp<span>{{$product->category->name}}</span>
                                    @endif
                                    <div style="color:#FC4A1A">
                                        @if(isset($product))
                                            <h5>${{$product->price}}</h5>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="widget-column">
                                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18"> Other
                                            Stores</h3>
                                        <ul class="list-unstyled products-group"
                                            id="modal_related_products" style="max-height: 200px;">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel"
             aria-labelledby="pills-one-example1-tab">
            <ul class="row list-unstyled products-group no-gutters">
                @forelse ($products as $product)
                    <li class="col-6 col-wd-3 col-md-3 product-item" wire:click="getProduct({{$product->id}})">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-xl-4 p-3">
                                <div class="product-item__body pb-xl-2" data-toggle="modal"
                                     data-target=".bd-example-modal-lg">
                                    <img src="{{$product->website->getFirstMediaUrl('logos','logo-resize')}}" alt="">
                                    @if($product->discount > 0)
                                        <span
                                            class="bg-lg-down-black width-49 height-50 bg-primary  d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 float-right text-white"
                                            style="height: 40px; width: 40px;">{{$product->discount}}%</span>
                                    @endif
                                    {{--                                    <div class="mb-2"><a href="#"--}}
                                    {{--                                                         class="font-size-12 text-gray-5">{{ $product->category->name }}</a>--}}
                                    {{--                                    </div>--}}
                                    <h5 class="mb-1 product-item__title"><a href="#"
                                                                            class="text-blue font-weight-bold">{{ $product->title }}</a>
                                    </h5>
                                    <div class="mb-2">
                                        <a href="#" class="d-block text-center"><img
                                                class="img-fluid"
                                                src="{{ $product->getFirstMediaUrl('products') }}"
                                                alt="Image Description"></a>
                                    </div>
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
                @forelse ($discounted_products as $product)
                    <li class="col-6 col-wd-3 col-md-3 product-item" wire:click="getProduct({{$product->id}})">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-xl-4 p-3">
                                <div class="product-item__body pb-xl-2" data-toggle="modal"
                                     data-target=".bd-example-modal-lg">
                                    <img src="{{$product->website->getFirstMediaUrl('logos','logo-resize')}}" alt="">
                                    @if($product->discount > 0)
                                        <span
                                            class="bg-lg-down-black width-49 height-50 bg-primary  d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 float-right text-white"
                                            style="height: 40px; width: 40px;">{{$product->discount}}%</span>
                                    @endif
                                    {{--                                    <div class="mb-2"><a href="#"--}}
                                    {{--                                                         class="font-size-12 text-gray-5">{{ $product->category->name }}</a>--}}
                                    {{--                                    </div>--}}
                                    <h5 class="mb-1 product-item__title"><a href="#"
                                                                            class="text-blue font-weight-bold">{{ $product->title }}</a>
                                    </h5>
                                    <div class="mb-2">
                                        <a href="#" class="d-block text-center"><img
                                                class="img-fluid"
                                                src="{{ $product->getFirstMediaUrl('products') }}"
                                                alt="Image Description"></a>
                                    </div>
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
                                                Add to
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
        <div class="tab-pane fade pt-2" id="pills-three-example1" role="tabpanel"
             aria-labelledby="pills-three-example1-tab">
            <ul class="row list-unstyled products-group no-gutters">
                @forelse ($products as $product)
                    <li class="col-6 col-wd-3 col-md-3 product-item" wire:click="getProduct({{$product->id}})">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-xl-4 p-3">
                                <div class="product-item__body pb-xl-2" data-toggle="modal"
                                     data-target=".bd-example-modal-lg">
                                    <img src="{{$product->website->getFirstMediaUrl('logos','logo-resize')}}" alt="">
                                    @if($product->discount > 0)
                                        <span
                                            class="bg-lg-down-black width-49 height-50 bg-primary  d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12 float-right text-white"
                                            style="height: 40px; width: 40px;">{{$product->discount}}%</span>
                                    @endif
                                    {{--                                    <div class="mb-2"><a href="#"--}}
                                    {{--                                                         class="font-size-12 text-gray-5">{{ $product->category->name }}</a>--}}
                                    {{--                                    </div>--}}
                                    <h5 class="mb-1 product-item__title"><a href="#"
                                                                            class="text-blue font-weight-bold">{{ $product->title }}</a>
                                    </h5>
                                    <div class="mb-2">
                                        <a href="#" class="d-block text-center"><img
                                                class="img-fluid"
                                                src="{{ $product->getFirstMediaUrl('products') }}"
                                                alt="Image Description"></a>
                                    </div>
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
                                            <button class="text-gray-6 font-size-13 mx-wd-3 wishlist-btn"><i
                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                Add to
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
    </div>
</div>
