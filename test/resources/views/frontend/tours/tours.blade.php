@extends('frontend.layouts.master')
    @section('content')

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header__top">
                <div class="page-header-bg" style="background-image: url(frontend/assets/images/backgrounds/page-header-bg.jpg)">
                </div>
                <div class="page-header-bg-overly"></div>
                <div class="container">
                    <div class="page-header__top-inner">
                        <h2>Popular Tours</h2>
                    </div>
                </div>
            </div>
            <div class="page-header__bottom">
                <div class="container">
                    <div class="page-header__bottom-inner">
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><span>.</span></li>
                            <li class="active">Tours</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Popular Tours Two Start-->
        <section class="popular-tours-two">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <!--Popular Tours Two Single-->
                        <div class="popular-tours__single">
                            <div class="popular-tours__img">
                                <img src="{{asset('frontend/assets/images/resources/popular-tours-two__img-1.jpg')}}" alt="">
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
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <!--Popular Tours Two Single-->
                        <div class="popular-tours__single">
                            <div class="popular-tours__img">
                                <img src="{{asset('frontend/assets/images/resources/popular-tours-two__img-2.jpg')}}" alt="">
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
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                        <!--Popular Tours Two Single-->
                        <div class="popular-tours__single">
                            <div class="popular-tours__img">
                                <img src="{{asset('frontend/assets/images/resources/popular-tours-two__img-3.jpg')}}" alt="">
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
                                <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">Discover Depth of Beach</a>
                                </h3>
                                <p class="popular-tours__rate"><span>$1870</span> / Per Person</p>
                                <ul class="popular-tours__meta list-unstyled">
                                    <li><a href="{{ route('tour.details') }}">3 Days</a></li>
                                    <li><a href="{{ route('tour.details') }}">12+</a></li>
                                    <li><a href="{{ route('tour.details') }}">Los Angeles</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <!--Popular Tours Two Single-->
                        <div class="popular-tours__single">
                            <div class="popular-tours__img">
                                <img src="{{asset('frontend/assets/images/resources/popular-tours-two__img-4.jpg')}}" alt="">
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
                                <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">Moscow Red City Land</a>
                                </h3>
                                <p class="popular-tours__rate"><span>$1870</span> / Per Person</p>
                                <ul class="popular-tours__meta list-unstyled">
                                    <li><a href="{{ route('tour.details') }}">3 Days</a></li>
                                    <li><a href="{{ route('tour.details') }}">12+</a></li>
                                    <li><a href="{{ route('tour.details') }}">Los Angeles</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="500ms">
                        <!--Popular Tours Two Single-->
                        <div class="popular-tours__single">
                            <div class="popular-tours__img">
                                <img src="{{asset('frontend/assets/images/resources/popular-tours-two__img-5.jpg')}}" alt="">
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
                                <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">Magic of Italy Tours</a>
                                </h3>
                                <p class="popular-tours__rate"><span>$1870</span> / Per Person</p>
                                <ul class="popular-tours__meta list-unstyled">
                                    <li><a href="{{ route('tour.details') }}">3 Days</a></li>
                                    <li><a href="{{ route('tour.details') }}">12+</a></li>
                                    <li><a href="{{ route('tour.details') }}">Los Angeles</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="600ms">
                        <!--Popular Tours Two Single-->
                        <div class="popular-tours__single">
                            <div class="popular-tours__img">
                                <img src="{{asset('frontend/assets/images/resources/popular-tours-two__img-6.jpg')}}" alt="">
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
                                <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">Discover Depth of Beach</a>
                                </h3>
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
        </section>
        <!--Popular Tours Two End-->

    @endsection
