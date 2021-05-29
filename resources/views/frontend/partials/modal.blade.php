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
{{--                            <img src="{{asset('media/loader.gif')}}" alt="loader">--}}
                            <img src="{{asset('assets/svg/preloaders/circle-preloader.svg')}}" alt="loader">
                        </div>
                    </div>

                    <div wire:loading.remove>
                        <div class="row">
                            <div class="col-sm">
                                @if(isset($product))
                                    <img src="{{$product->getFirstMediaUrl('products')}}" alt="" height="200px"
                                         width="200px">
                                @endif
                            </div>
                            <div class="col-sm">
                                <div>
                                    @if(isset($product))
                                        <h5>{{$product->title}}</h5>
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
                                    <br>
                                    <ul class="list-unstyled products-group scroll">
                                        @if(isset($stores))
                                            @foreach($stores as $store)
                                                <li class="product-item product-item__list row no-gutters mb-6 remove-divider">
                                                    <div class="col-auto">
                                                        <a href="{{$store->product_link}}"
                                                           class="d-block width-75 text-center" target="_blank">
                                                            <img class="img-fluid"
                                                                 src="{{$store->website->getFirstMediaUrl('logos','logo-resize')}}"
                                                                 alt="Image Description"></a>
                                                    </div>
                                                    <div class="col pl-4 d-flex flex-column">
                                                        <div class="font-size-15">
                                                            ${{$store->price}}
                                                        </div>
                                                        <div class="font-size-15">

                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18"> Relevant Products</h3>
                        <br>
                        <div class="product-item">
                                @if(isset($stores))
                                    @foreach($stores as $store)
                                        <img src="{{$store->getFirstMediaUrl('products')}}" alt="" height="150px"
                                             width="150px">
                                    @endforeach
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
