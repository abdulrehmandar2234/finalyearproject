<div class="mb-5">
    @if(isset($sliders))
        <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($sliders as $slider)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                        class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>

            <div class="carousel-inner">
                @foreach($sliders as $slider)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="bg-img-hero"
                             style="background-image: url({{$slider->getFirstMediaUrl('slider-banner','slider-resize')}});">
                            <div class="container min-height-420 overflow-hidden">
                                <div class="js-slide bg-img-hero-center">
                                    <div class="row min-height-420 py-7 py-md-0">
                                        <div class="offset-xl-3 col-xl-4 col-6 mt-md-8">
                                            @if(isset($slider->title))
                                                <h1 class="font-size-64 text-lh-57 font-weight-light"
                                                    data-scs-animation-in="fadeInUp">
                                                    {{--THE NEW <span class="d-block font-size-55">STANDARD</span>--}}
                                                    {{$slider->title}} <span class="d-block font-size-55"></span>
                                                </h1>
                                            @endif
                                            @if(isset($slider->sub_title))
                                                <h6 class="font-size-15 font-weight-bold mb-3"
                                                    data-scs-animation-in="fadeInUp"
                                                    data-scs-animation-delay="200">{{$slider->sub_title}}
                                                </h6>
                                            @endif
                                            @if(isset($slider->price))
                                                <div class="mb-4"
                                                     data-scs-animation-in="fadeInUp"
                                                     data-scs-animation-delay="300">
                                                    <span class="font-size-13">FROM</span>
                                                    <div class="font-size-50 font-weight-bold text-lh-45">
                                                        <sup class="">$</sup>{{$slider->price}}
                                                        {{--<sup class="">$</sup>749<sup class="">99</sup>--}}
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!empty($slider->link))
                                                <a href="{{$slider->link}}"
                                                   class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16"
                                                   data-scs-animation-in="fadeInUp"
                                                   data-scs-animation-delay="400">
                                                    {{--                                    Start Buying--}}
                                                    {{$slider->btn_text}}
                                                </a>
                                                @endif
                                        </div>
                                        @if(!empty($slider->getFirstMedia('slider-image', 'slider-resize')))
                                            <div class="col-xl-5 col-6  d-flex align-items-center"
                                                 data-scs-animation-in="zoomIn"
                                                 data-scs-animation-delay="500">
                                                 {{ $slider->getFirstMedia('slider-image', 'slider-resize')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    @endif
</div>
