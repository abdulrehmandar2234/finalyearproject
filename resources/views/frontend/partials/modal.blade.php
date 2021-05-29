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
