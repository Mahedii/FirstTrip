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
                    <div class="swiper-slide">
                        <div class="image-layer"
                            style="background-image: url(frontend/assets/images/backgrounds/main-slider-1-1.jpg);"></div>
                        <div class="image-layer-overlay"></div>
                        <div class="container">
                            <div class="swiper-slide-inner">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <h2> Travel & Adventures</h2>
                                        <p>Where Would You Like To Go?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image-layer"
                            style="background-image: url(frontend/assets/images/backgrounds/main-slider-1-2.jpg);"></div>
                        <div class="image-layer-overlay"></div>
                        <div class="container">
                            <div class="swiper-slide-inner">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <h2> Travel & Adventures</h2>
                                        <p>Where Would You Like To Go?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image-layer"
                            style="background-image: url(frontend/assets/images/backgrounds/main-slider-1-3.jpg);"></div>
                        <div class="image-layer-overlay"></div>
                        <div class="container">
                            <div class="swiper-slide-inner">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <h2> Travel & Adventures</h2>
                                        <p>Where Would You Like To Go?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <div class="col-xl-3 col-lg-3">
                        <div class="destinations-one__single">
                            <div class="destinations-one__img">
                                <img src="{{asset('frontend/assets/images/destination/destination-1-1.png')}}" alt="">
                                <div class="destinations-one__content">
                                    <h2 class="destinations-one__title"><a href="{{ route('destination.detail') }}">Spain</a>
                                    </h2>
                                </div>
                                <div class="destinations-one__button">
                                    <a href="#">6 tours</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="destinations-one__single">
                            <div class="destinations-one__img">
                                <img src="{{asset('frontend/assets/images/destination/destination-1-2.png')}}" alt="">
                                <div class="destinations-one__content">
                                    <p class="destinations-one__sub-title">Wildlife</p>
                                    <h2 class="destinations-one__title"><a href="{{ route('destination.detail') }}">Thailand</a>
                                    </h2>
                                </div>
                                <div class="destinations-one__button">
                                    <a href="#">6 tours</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="destinations-one__single">
                            <div class="destinations-one__img">
                                <img src="{{asset('frontend/assets/images/destination/destination-1-3.png')}}" alt="">
                                <div class="destinations-one__content">
                                    <h2 class="destinations-one__title"><a href="{{ route('destination.detail') }}">Africa</a>
                                    </h2>
                                </div>
                                <div class="destinations-one__button">
                                    <a href="#">6 tours</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="destinations-one__single">
                            <div class="destinations-one__img">
                                <img src="{{asset('frontend/assets/images/destination/destination-1-4.png')}}" alt="">
                                <div class="destinations-one__content">
                                    <h2 class="destinations-one__title"><a
                                            href="{{ route('destination.detail') }}">Australia</a></h2>
                                </div>
                                <div class="destinations-one__button">
                                    <a href="#">6 tours</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="destinations-one__single">
                            <div class="destinations-one__img">
                                <img src="{{asset('frontend/assets/images/destination/destination-1-5.png')}}" alt="">
                                <div class="destinations-one__content">
                                    <p class="destinations-one__sub-title">Adventure</p>
                                    <h2 class="destinations-one__title"><a
                                            href="{{ route('destination.detail') }}">Switzerland</a></h2>
                                </div>
                                <div class="destinations-one__button">
                                    <a href="#">6 tours</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--Destinations One End-->

        <!--About One Start-->
        <section class="about-one">
            <div class="about-one-shape-1 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                <img src="{{asset('frontend/assets/images/shapes/about-one-shape-1.png')}}" alt="">
            </div>
            <div class="about-one-shape-2 float-bob-y"><img src="{{asset('frontend/assets/images/shapes/about-one-shape-2.png')}}" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 wow fadeInLeft" data-wow-duration="1500ms">
                        <div class="about-one__left">
                            <div class="about-one__img-box">
                                <div class="about-one__img">
                                    <img src="{{asset('frontend/assets/images/resources/about-one-img-1.png')}}" alt="">
                                </div>
                                <div class="about-one__call">
                                    <div class="about-one__call-icon">
                                        <span class="icon-phone-call"></span>
                                    </div>
                                    <div class="about-one__call-number">
                                        <p>Book Tour Now</p>
                                        <h4><a href="tel:666-888-0000">666 888 0000</a></h4>
                                    </div>
                                </div>
                                <div class="about-one__discount">
                                    <h2>30%</h2>
                                    <h3>Discount</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-one__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Get to know us</span>
                                <h2 class="section-title__title">Plan Your Trip with Trevily</h2>
                            </div>
                            <p class="about-one__right-text">There are many variations of passages of available but the
                                majority have suffered alteration in some form, by injected hum randomised words which
                                don't look even slightly.</p>
                            <ul class="list-unstyled about-one__points">
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p>Invest in your simply neighborhood</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p>Support people in free text extreme need</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="text">
                                        <p>Largest global industrial business community</p>
                                    </div>
                                </li>
                            </ul>
                            <a href="#" class="about-one__btn thm-btn">Book with us now</a>
                        </div>
                    </div>
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
                            <div class="popular-tours__single">
                                <div class="popular-tours__img">
                                    <img src="{{asset('frontend/assets/images/resources/popular-tours__img-1.jpg')}}" alt="">
                                    <div class="popular-tours__icon">
                                        <a href="{{ route('tour.details') }}">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="popular-tours__content">
                                    <div class="popular-tours__stars">
                                        <i class="fa fa-star"></i> 8.0 Superb
                                    </div>
                                    <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">National Park 2 Days
                                            Tour</a></h3>
                                    <p class="popular-tours__rate"><span>$1870</span> / Per Person</p>
                                    <ul class="popular-tours__meta list-unstyled">
                                        <li><a href="{{ route('tour.details') }}">3 Days</a></li>
                                        <li><a href="{{ route('tour.details') }}">12+</a></li>
                                        <li><a href="{{ route('tour.details') }}">Los Angeles</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="popular-tours__single">
                                <div class="popular-tours__img">
                                    <img src="{{asset('frontend/assets/images/resources/popular-tours__img-2.jpg')}}" alt="">
                                    <div class="popular-tours__icon">
                                        <a href="{{ route('tour.details') }}">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="popular-tours__content">
                                    <div class="popular-tours__stars">
                                        <i class="fa fa-star"></i> 8.0 Superb
                                    </div>
                                    <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">The Dark Forest
                                            Adventure</a></h3>
                                    <p class="popular-tours__rate"><span>$1870</span> / Per Person</p>
                                    <ul class="popular-tours__meta list-unstyled">
                                        <li><a href="{{ route('tour.details') }}">3 Days</a></li>
                                        <li><a href="{{ route('tour.details') }}">12+</a></li>
                                        <li><a href="{{ route('tour.details') }}">Los Angeles</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="popular-tours__single">
                                <div class="popular-tours__img">
                                    <img src="{{asset('frontend/assets/images/resources/popular-tours__img-3.jpg')}}" alt="">
                                    <div class="popular-tours__icon">
                                        <a href="{{ route('tour.details') }}">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="popular-tours__content">
                                    <div class="popular-tours__stars">
                                        <i class="fa fa-star"></i> 8.0 Superb
                                    </div>
                                    <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">Discover Depth of
                                            Beach</a></h3>
                                    <p class="popular-tours__rate"><span>$1870</span> / Per Person</p>
                                    <ul class="popular-tours__meta list-unstyled">
                                        <li><a href="{{ route('tour.details') }}">3 Days</a></li>
                                        <li><a href="{{ route('tour.details') }}">12+</a></li>
                                        <li><a href="{{ route('tour.details') }}">Los Angeles</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="popular-tours__single">
                                <div class="popular-tours__img">
                                    <img src="{{asset('frontend/assets/images/resources/popular-tours__img-4.jpg')}}" alt="">
                                    <div class="popular-tours__icon">
                                        <a href="{{ route('tour.details') }}">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="popular-tours__content">
                                    <div class="popular-tours__stars">
                                        <i class="fa fa-star"></i> 8.0 Superb
                                    </div>
                                    <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">Moscow Red City
                                            Land</a></h3>
                                    <p class="popular-tours__rate"><span>$1870</span> / Per Person</p>
                                    <ul class="popular-tours__meta list-unstyled">
                                        <li><a href="{{ route('tour.details') }}">3 Days</a></li>
                                        <li><a href="{{ route('tour.details') }}">12+</a></li>
                                        <li><a href="{{ route('tour.details') }}">Los Angeles</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="popular-tours__single">
                                <div class="popular-tours__img">
                                    <img src="{{asset('frontend/assets/images/resources/popular-tours__img-1.jpg')}}" alt="">
                                    <div class="popular-tours__icon">
                                        <a href="{{ route('tour.details') }}">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="popular-tours__content">
                                    <div class="popular-tours__stars">
                                        <i class="fa fa-star"></i> 8.0 Superb
                                    </div>
                                    <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">Magic of Italy
                                            Tours</a></h3>
                                    <p class="popular-tours__rate"><span>$1870</span> / Per Person</p>
                                    <ul class="popular-tours__meta list-unstyled">
                                        <li><a href="{{ route('tour.details') }}">3 Days</a></li>
                                        <li><a href="{{ route('tour.details') }}">12+</a></li>
                                        <li><a href="{{ route('tour.details') }}">Los Angeles</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="popular-tours__single">
                                <div class="popular-tours__img">
                                    <img src="{{asset('frontend/assets/images/resources/popular-tours__img-2.jpg')}}" alt="">
                                    <div class="popular-tours__icon">
                                        <a href="{{ route('tour.details') }}">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="popular-tours__content">
                                    <div class="popular-tours__stars">
                                        <i class="fa fa-star"></i> 8.0 Superb
                                    </div>
                                    <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">National Park 2 Days
                                            Tour</a></h3>
                                    <p class="popular-tours__rate"><span>$1870</span> / Per Person</p>
                                    <ul class="popular-tours__meta list-unstyled">
                                        <li><a href="{{ route('tour.details') }}">3 Days</a></li>
                                        <li><a href="{{ route('tour.details') }}">12+</a></li>
                                        <li><a href="{{ route('tour.details') }}">Los Angeles</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="popular-tours__single">
                                <div class="popular-tours__img">
                                    <img src="{{asset('frontend/assets/images/resources/popular-tours__img-3.jpg')}}" alt="">
                                    <div class="popular-tours__icon">
                                        <a href="{{ route('tour.details') }}">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="popular-tours__content">
                                    <div class="popular-tours__stars">
                                        <i class="fa fa-star"></i> 8.0 Superb
                                    </div>
                                    <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">Discover Depth of
                                            Beach</a></h3>
                                    <p class="popular-tours__rate"><span>$1870</span> / Per Person</p>
                                    <ul class="popular-tours__meta list-unstyled">
                                        <li><a href="{{ route('tour.details') }}">3 Days</a></li>
                                        <li><a href="{{ route('tour.details') }}">12+</a></li>
                                        <li><a href="{{ route('tour.details') }}">Los Angeles</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="popular-tours__single">
                                <div class="popular-tours__img">
                                    <img src="{{asset('frontend/assets/images/resources/popular-tours__img-4.jpg')}}" alt="">
                                    <div class="popular-tours__icon">
                                        <a href="{{ route('tour.details') }}">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="popular-tours__content">
                                    <div class="popular-tours__stars">
                                        <i class="fa fa-star"></i> 8.0 Superb
                                    </div>
                                    <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">National Park 2 Days
                                            Tour</a></h3>
                                    <p class="popular-tours__rate"><span>$1870</span> / Per Person</p>
                                    <ul class="popular-tours__meta list-unstyled">
                                        <li><a href="{{ route('tour.details') }}">3 Days</a></li>
                                        <li><a href="{{ route('tour.details') }}">12+</a></li>
                                        <li><a href="{{ route('tour.details') }}">Los Angeles</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="popular-tours__single">
                                <div class="popular-tours__img">
                                    <img src="{{asset('frontend/assets/images/resources/popular-tours__img-1.jpg')}}" alt="">
                                    <div class="popular-tours__icon">
                                        <a href="{{ route('tour.details') }}">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="popular-tours__content">
                                    <div class="popular-tours__stars">
                                        <i class="fa fa-star"></i> 8.0 Superb
                                    </div>
                                    <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">National Park 2 Days
                                            Tour</a></h3>
                                    <p class="popular-tours__rate"><span>$1870</span> / Per Person</p>
                                    <ul class="popular-tours__meta list-unstyled">
                                        <li><a href="{{ route('tour.details') }}">3 Days</a></li>
                                        <li><a href="{{ route('tour.details') }}">12+</a></li>
                                        <li><a href="{{ route('tour.details') }}">Los Angeles</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="popular-tours__single">
                                <div class="popular-tours__img">
                                    <img src="{{asset('frontend/assets/images/resources/popular-tours__img-2.jpg')}}" alt="">
                                    <div class="popular-tours__icon">
                                        <a href="{{ route('tour.details') }}">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="popular-tours__content">
                                    <div class="popular-tours__stars">
                                        <i class="fa fa-star"></i> 8.0 Superb
                                    </div>
                                    <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">National Park 2 Days
                                            Tour</a></h3>
                                    <p class="popular-tours__rate"><span>$1870</span> / Per Person</p>
                                    <ul class="popular-tours__meta list-unstyled">
                                        <li><a href="{{ route('tour.details') }}">3 Days</a></li>
                                        <li><a href="{{ route('tour.details') }}">12+</a></li>
                                        <li><a href="{{ route('tour.details') }}">Los Angeles</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="popular-tours__single">
                                <div class="popular-tours__img">
                                    <img src="{{asset('frontend/assets/images/resources/popular-tours__img-3.jpg')}}" alt="">
                                    <div class="popular-tours__icon">
                                        <a href="{{ route('tour.details') }}">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="popular-tours__content">
                                    <div class="popular-tours__stars">
                                        <i class="fa fa-star"></i> 8.0 Superb
                                    </div>
                                    <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">National Park 2 Days
                                            Tour</a></h3>
                                    <p class="popular-tours__rate"><span>$1870</span> / Per Person</p>
                                    <ul class="popular-tours__meta list-unstyled">
                                        <li><a href="{{ route('tour.details') }}">3 Days</a></li>
                                        <li><a href="{{ route('tour.details') }}">12+</a></li>
                                        <li><a href="{{ route('tour.details') }}">Los Angeles</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="popular-tours__single">
                                <div class="popular-tours__img">
                                    <img src="{{asset('frontend/assets/images/resources/popular-tours__img-4.jpg')}}" alt="">
                                    <div class="popular-tours__icon">
                                        <a href="{{ route('tour.details') }}">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="popular-tours__content">
                                    <div class="popular-tours__stars">
                                        <i class="fa fa-star"></i> 8.0 Superb
                                    </div>
                                    <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">National Park 2 Days
                                            Tour</a></h3>
                                    <p class="popular-tours__rate"><span>$1870</span> / Per Person</p>
                                    <ul class="popular-tours__meta list-unstyled">
                                        <li><a href="{{ route('tour.details') }}">3 Days</a></li>
                                        <li><a href="{{ route('tour.details') }}">12+</a></li>
                                        <li><a href="{{ route('tour.details') }}">Los Angeles</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Popular Tours End-->

        <!--Video One Start-->
        <section class="video-one">
            <div class="video-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url(frontend/assets/images/backgrounds/video-one-bg.jpg)"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="video-one__left">
                            <div class="video-one__video-link">
                                <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                                    <div class="video-one__video-icon">
                                        <span class="icon-play-button"></span>
                                        <i class="ripple"></i>
                                    </div>
                                </a>
                            </div>
                            <p class="video-one__tagline">Are you ready to travel?</p>
                            <h2 class="video-one__title">Tevily is a World Leading Online Tour Booking Platform</h2>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="video-one__right">
                            <ul class="list-unstyled video-one__four-icon-boxes">
                                <li>
                                    <div class="video-one__icon-box">
                                        <span class="icon-deer"></span>
                                    </div>
                                    <h4 class="video-one__icon-box-title"><a href="#">Wildlife <br> Tours</a></h4>
                                </li>
                                <li>
                                    <div class="video-one__icon-box">
                                        <span class="icon-paragliding"></span>
                                    </div>
                                    <h4 class="video-one__icon-box-title"><a href="#">Paragliding <br> Tours</a></h4>
                                </li>
                                <li>
                                    <div class="video-one__icon-box">
                                        <span class="icon-flag"></span>
                                    </div>
                                    <h4 class="video-one__icon-box-title"><a href="#">Adventure <br> Tours</a></h4>
                                </li>
                                <li>
                                    <div class="video-one__icon-box">
                                        <span class="icon-hang-gliding"></span>
                                    </div>
                                    <h4 class="video-one__icon-box-title"><a href="#">Hang Gliding <br> Tours</a></h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Video One End-->

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
                        <div class="swiper-slide">
                            <img src="{{asset('frontend/assets/images/partner/partner-1.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('frontend/assets/images/partner/partner-2.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('frontend/assets/images/partner/partner-3.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('frontend/assets/images/partner/partner-4.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('frontend/assets/images/partner/partner-5.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                    </div>
                </div>
            </div>
        </section>
        <!--Partner End-->

    @endsection