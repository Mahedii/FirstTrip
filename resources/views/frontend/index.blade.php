@extends('frontend.layouts.master')
    @section('content')

        <!--Main Slider Start-->
        <section class="main-slider">
            <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
                "pagination": {
                    "el": "#main-slider-pagination",
                    "type": "bullets",
                    "clickable": true
                },
                "navigation": {
                    "nextEl": ".main-slider-button-next",
                    "prevEl": ".main-slider-button-prev",
                    "clickable": true
                },
                "autoplay": {
                    "delay": 5000
                }}'>

                <div class="swiper-wrapper">
                    @foreach ($heroSectionData as $heroSection)

                        <div class="swiper-slide">
                            <div class="image-layer"
                                style="background-image: url('{{ asset($heroSection->FILE_PATH) }}');"></div>
                            <div class="image-layer-overlay"></div>
                            <div class="container">
                                <div class="swiper-slide-inner">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <h2> {{$heroSection->TITLE}}</h2>
                                            <p>{{$heroSection->SUBTITLE}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>

                <div class="main-slider-nav">
                    <div class="main-slider-button-prev"><span class="icon-right-arrow"></span></div>
                    <div class="main-slider-button-next"><span class="icon-right-arrow"></span> </div>
                </div>
            </div>
        </section>


        <!--Destinations One Start-->
        <section class="destinations-one">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Destination lists</span>
                    <h2 class="section-title__title">Go Exotic Places</h2>
                </div>
                <div class="row masonary-layout">
                    @foreach ($destinationData as $key => $destination)
                        <div class="col-xl-4 col-lg-4">
                            <div class="destinations-one__img">
                                <a href="{{ route('destination.detail',['id' => $destination->id, 'slug' => $destination->SLUG]) }}">
                                    <img src="{!! asset($destination->FILE_PATH) !!}" alt="">
                                </a>
                                <div class="destinations-one__content">
                                    <h2 class="destinations-one__title"><a href="{{ route('destination.detail',['id' => $destination->id, 'slug' => $destination->SLUG]) }}">{{$destination->COUNTRY_NAME}}</a></h2>
                                </div>
                                {{-- <div class="destinations-one__button">
                                    <a href="#">6 tours</a>
                                </div> --}}
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!--Destinations One End-->

        <!--About One Start-->
        <section class="about-one">
            <!-- <div class="about-one-shape-1 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                <img src="{{asset('frontend/assets/images/shapes/about-one-shape-1.png')}}" alt="">
            </div>
            <div class="about-one-shape-2 float-bob-y"><img src="{{asset('frontend/assets/images/shapes/about-one-shape-2.png')}}" alt="">
            </div> -->
            <div class="container">
                <div class="row">
                    @foreach($aboutSectionOneData as $aboutSectionOne)
                        <div class="col-xl-6 wow fadeInLeft" data-wow-duration="1500ms">
                            <div class="about-one__left">
                                <div class="about-one__img-box">
                                    <div class="about-one__img">
                                        <img src="{!! asset($aboutSectionOne->FILE_PATH) !!}" alt="">
                                    </div>
                                    <!-- <div class="about-one__call">
                                        <div class="about-one__call-icon">
                                            <span class="icon-phone-call"></span>
                                        </div>
                                        <div class="about-one__call-number">
                                            <p>Book Tour Now</p>
                                            <h4><a href="tel:666-888-0000">666 888 0000</a></h4>
                                        </div>
                                    </div> -->
                                    @if($aboutSectionOne->DISCOUNT)
                                        <div class="about-one__discount">
                                            <h2>{{ $aboutSectionOne->DISCOUNT }}</h2>
                                            <h3>Discount</h3>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="about-one__right">
                                <div class="section-title text-left">
                                    <span class="section-title__tagline">{{ $aboutSectionOne->TITLE }}</span>
                                    <h2 class="section-title__title">{{ $aboutSectionOne->SUBTITLE }}</h2>
                                </div>
                                <p class="about-one__right-text">{!! html_entity_decode($aboutSectionOne->TITLE_BODY, ENT_QUOTES, 'UTF-8') !!}</p>
                                <!-- <a href="#" class="about-one__btn thm-btn">Book with us now</a> -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--About One End-->

        <!--Popular Tours Start-->
        <section class="popular-tours">
            <div class="popular-tours__container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Featured tours</span>
                    <h2 class="section-title__title">Most Popular Tours</h2>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="popular-tours__carousel owl-theme owl-carousel">
                            @foreach($tourPackages as $key => $tourPackage)
                                <div class="popular-tours__single">
                                    <div class="popular-tours__img">
                                        <a href="{{ route('tour.details',['id' => $tourPackage->id, 'slug' => $tourPackage->SLUG]) }}">
                                            <img src="{!! asset($tourPackage->FILE_PATH) !!}" alt="">
                                        </a>
                                        {{-- <div class="popular-tours__icon">
                                            <a href="{{ route('tour.details',['id' => $tourPackage->id, 'slug' => $tourPackage->SLUG]) }}">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </div> --}}
                                    </div>
                                    <div class="popular-tours__content">
                                        {{-- <div class="popular-tours__stars">
                                            <i class="fa fa-star"></i> 8.0 Superb
                                        </div> --}}
                                        <h3 class="popular-tours__title"><a href="{{ route('tour.details',['id' => $tourPackage->id, 'slug' => $tourPackage->SLUG]) }}">{{$tourPackage->PACKAGE_NAME}}</a></h3>
                                        <p class="popular-tours__rate"><span>{{$tourPackage->COST}}</span> / Per Person</p>
                                        <ul class="popular-tours__meta list-unstyled">
                                            <li><a href="{{ route('tour.details',['id' => $tourPackage->id, 'slug' => $tourPackage->SLUG]) }}">{{$tourPackage->DURATION}}</a></li>
                                            {{-- <li><a href="{{ route('tour.details') }}">{{$tourPackage->TOUR_TYPE}}</a></li> --}}
                                            <li><a href="{{ route('tour.details',['id' => $tourPackage->id, 'slug' => $tourPackage->SLUG]) }}">{{$tourPackage->DESTINATION}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Popular Tours End-->

        <!--About Two Start-->
        <section class="video-one">
            @foreach($aboutSectionTwoData as $aboutSectionTwo)
                <div class="video-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                    style="background-image: url('{{ asset($aboutSectionTwo->FILE_PATH) }}')">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="video-one__left">
                                <div class="video-one__video-link">
                                    <a href="{{$aboutSectionTwo->VIDEO_PATH}}" class="video-popup">
                                        <div class="video-one__video-icon">
                                            <span class="icon-play-button"></span>
                                            <i class="ripple"></i>
                                        </div>
                                    </a>
                                </div>
                                <p class="video-one__tagline">{{$aboutSectionTwo->TITLE}}</p>
                                <h2 class="video-one__title">{{$aboutSectionTwo->SUBTITLE}}</h2>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="video-one__right">
                                <ul class="list-unstyled video-one__four-icon-boxes" style="margin-top:100px">
                                    <li>
                                        <!-- <div class="video-one__icon-box">
                                            <span class="icon-deer"></span>
                                        </div> -->
                                        <h4 class="video-one__icon-box-title"><a href="#">{{$aboutSectionTwo->TEXT_1}}</a></h4>
                                    </li>
                                    <li>
                                        <!-- <div class="video-one__icon-box">
                                            <span class="icon-paragliding"></span>
                                        </div> -->
                                        <h4 class="video-one__icon-box-title"><a href="#">{{$aboutSectionTwo->TEXT_2}}</a></h4>
                                    </li>
                                    <li>
                                        <!-- <div class="video-one__icon-box">
                                            <span class="icon-flag"></span>
                                        </div> -->
                                        <h4 class="video-one__icon-box-title"><a href="#">{{$aboutSectionTwo->TEXT_3}}</a></h4>
                                    </li>
                                    <li>
                                        <!-- <div class="video-one__icon-box">
                                            <span class="icon-hang-gliding"></span>
                                        </div> -->
                                        <h4 class="video-one__icon-box-title"><a href="#">{{$aboutSectionTwo->TEXT_4}}</a></h4>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
        <!--About Two End-->

        <!--Partner Start-->
        <section class="brand-two">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Key Airline Partners</span>
                    {{-- <h2 class="section-title__title">Most Popular Tours</h2> --}}
                </div>
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                        "0": {
                            "spaceBetween": 30,
                            "slidesPerView": 2
                        },
                        "375": {
                            "spaceBetween": 30,
                            "slidesPerView": 2
                        },
                        "575": {
                            "spaceBetween": 30,
                            "slidesPerView": 3
                        },
                        "767": {
                            "spaceBetween": 50,
                            "slidesPerView": 4
                        },
                        "991": {
                            "spaceBetween": 50,
                            "slidesPerView": 5
                        },
                        "1199": {
                            "spaceBetween": 100,
                            "slidesPerView": 5
                        }
                    }}'>
                    <div class="swiper-wrapper">
                        @foreach ($keyPartnerData as $keyPartner)

                            <div class="swiper-slide">
                                <img src="{!! asset($keyPartner->FILE_PATH) !!}" alt="">
                            </div><!-- /.swiper-slide -->

                        @endforeach

                        {{-- <div class="swiper-slide">
                            <img src="{{asset('frontend/assets/images/partner/partner-5.png')}}" alt="">
                        </div><!-- /.swiper-slide --> --}}

                    </div>
                </div>
            </div>
        </section>
        <!--Partner End-->

    @endsection
