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

                    @foreach($tourPackages as $key => $tourPackage)

                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{++$key*100}}ms">

                            <div class="popular-tours__single">
                                <div class="popular-tours__img">
                                    <img src="{!! asset($tourPackage->FILE_PATH) !!}" alt="">
                                    <div class="popular-tours__icon">
                                        <a href="{{ route('tour.details',['id' => $tourPackage->id, 'slug' => $tourPackage->SLUG]) }}">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
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
                        </div>

                    @endforeach

                    {{-- <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
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
                    </div> --}}

                </div>
            </div>
        </section>
        <!--Popular Tours Two End-->

    @endsection
