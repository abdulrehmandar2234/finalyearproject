<div>
    <li class="col pr-xl-0 px-2 px-sm-3 d-xl-none">
        <a href="{{route('cart.index')}}" class="text-gray-90 position-relative d-flex "
           data-toggle="tooltip" data-placement="top" title="Cart">
            <i class="font-size-22 ec ec-shopping-bag"></i>
            @guest
                @if(\Gloudemans\Shoppingcart\Facades\Cart::instance('default')->count() > 0)
                    <span
                        class="bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12">{{\Gloudemans\Shoppingcart\Facades\Cart::instance('default')->count()}}</span>
                @endif
                <span
                    class="d-none d-xl-block font-weight-bold font-size-16 text-gray-90 ml-3">${{\Gloudemans\Shoppingcart\Facades\Cart::instance('default')->total()}}</span>
            @else
                @if($carts->count() > 0)
                    <span
                        class="bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12">{{$carts->count()}}</span>
                @endif
                <span
                    class="d-none d-xl-block font-weight-bold font-size-16 text-gray-90 ml-3">${{($total==0)? '0.00' : $total }}</span>
            @endguest
        </a>
    </li>
    <li class="col pr-xl-0 px-2 px-sm-3 d-none d-xl-block">
        <div id="basicDropdownHoverInvoker" class="text-gray-90 position-relative d-flex "
             data-toggle="tooltip" data-placement="top" title="Cart"
             aria-controls="basicDropdownHover" aria-haspopup="true" aria-expanded="false"
             data-unfold-event="click" data-unfold-target="#basicDropdownHover"
             data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300"
             data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp"
             data-unfold-animation-out="fadeOut">
            <i class="font-size-22 ec ec-shopping-bag"></i>
            @guest
                @if(\Gloudemans\Shoppingcart\Facades\Cart::instance('default')->count() > 0)
                    <span
                        class="bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12">{{\Gloudemans\Shoppingcart\Facades\Cart::count()}}</span>
                @endif
                <span
                    class="d-none d-xl-block font-weight-bold font-size-16 text-gray-90 ml-3">${{\Gloudemans\Shoppingcart\Facades\Cart::instance('default')->total()}}</span>
            @else
                @if($carts->count() > 0)
                    <span
                        class="bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12">{{$carts->count()}}</span>
                @endif
                <span
                    class="d-none d-xl-block font-weight-bold font-size-16 text-gray-90 ml-3">${{($total==0)? '0.00' : $total }}</span>
            @endguest
        </div>
        <div id="basicDropdownHover"
             class="cart-dropdown dropdown-menu dropdown-unfold border-top border-top-primary mt-3 border-width-2 border-left-0 border-right-0 border-bottom-0 left-auto right-0"
             aria-labelledby="basicDropdownHoverInvoker">
            <ul class="list-unstyled px-3 pt-3">
                @guest
                    @forelse(\Gloudemans\Shoppingcart\Facades\Cart::instance('default')->content() as
                $cart)
                        <div class="">
                            <ul class="list-unstyled row mx-n2">
                                <li class="px-2 col-auto">
                                    @if ($cart->model->getFirstMediaUrl('products','thumb'))
                                        <img class="img-fluid"
                                             src="{{$cart->model->getFirstMediaUrl('products','thumb')}}"
                                             alt="Image Description">
                                    @endif
                                </li>
                                <li class="px-2 col">
                                    <h5 class="text-blue font-size-14 font-weight-bold">
                                        {{$cart->model->title}}</h5>
                                    <span class="font-size-14">1 × ${{$cart->model->price}}</span>
                                </li>
                                <li class="px-2 col-auto">
                                    <form action="{{route('cart.destroy',$cart->rowId)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn_remove"><i class="ec ec-close-remove"></i>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        </li>
                    @empty
                        No item in cart!
                    @endforelse
                @else
                    @forelse($carts as $cart)
                        <div class="">
                            <ul class="list-unstyled row mx-n2">
                                <li class="px-2 col-auto">
                                    @if ($cart->product->getFirstMediaUrl('products','thumb'))
                                        <img class="img-fluid"
                                             src="{{$cart->product->getFirstMediaUrl('products','thumb')}}"
                                             alt="Image Description">
                                    @endif
                                </li>
                                <li class="px-2 col">
                                    <h5 class="text-blue font-size-14 font-weight-bold">
                                        {{$cart->product->title}}</h5>
                                    <span class="font-size-14">1 × ${{$cart->product->price}}</span>
                                </li>
                                <li class="px-2 col-auto">
                                    <form action="{{route('cart.destroy',$cart->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-90 btn_remove"><i
                                                class="ec ec-close-remove"></i></button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        </li>
                    @empty
                        No item in cart!
                    @endforelse
                @endguest
            </ul>
            <div class="flex-center-between px-4 pt-2">
                <a href="{{route('cart.index')}}"
                   class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5">View
                    cart</a>
                <a href="../shop/checkout.html"
                   class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5">Checkout</a>
            </div>
        </div>
    </li>
</div>
