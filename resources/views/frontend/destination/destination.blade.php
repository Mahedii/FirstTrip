@extends('frontend.layouts.master')
    @section('content')

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header__top">
               <div class="page-header-bg" style="background-image: url('{{ asset('/frontend/assets/images/backgrounds/page-header-bg.jpg') }}')"></div>
               <div class="page-header-bg-overly"></div>
                <div class="container">
                    <div class="page-header__top-inner">
                        <h2>Destinations</h2>
                    </div>
                </div>
            </div>
            <div class="page-header__bottom">
                <div class="container">
                    <div class="page-header__bottom-inner">
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><span>.</span></li>
                            <li class="active">Destinations</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Destinations One Start-->
        <section class="destinations-one destinations-page">
            <div class="container">
                <div class="row masonary-layout">
                    <div class="col-xl-3 col-lg-3">
                        <div class="destinations-one__single">
                            <div class="destinations-one__img">
                                <img src="{{asset('frontend/assets/images/destination/destination-1-1.png')}}" alt="">
                                <div class="destinations-one__content">
                                    <h2 class="destinations-one__title"><a href="{{ route('destination.detail') }}">Spain</a></h2>
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
                                    <h2 class="destinations-one__title"><a href="{{ route('destination.detail') }}">Thailand</a></h2>
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
                                    <h2 class="destinations-one__title"><a href="{{ route('destination.detail') }}">Africa</a></h2>
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
                                    <h2 class="destinations-one__title"><a href="{{ route('destination.detail') }}">Australia</a></h2>
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
                                    <h2 class="destinations-one__title"><a href="{{ route('destination.detail') }}">Switzerland</a></h2>
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
                                <img src="{{asset('frontend/assets/images/destination/destination-1-6.png')}}" alt="">
                                <div class="destinations-one__content">
                                    <p class="destinations-one__sub-title">Adventure</p>
                                    <h2 class="destinations-one__title"><a href="{{ route('destination.detail') }}">Europe</a></h2>
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
                                <img src="{{asset('frontend/assets/images/destination/destination-1-7.png')}}" alt="">
                                <div class="destinations-one__content">
                                    <h2 class="destinations-one__title"><a href="{{ route('destination.detail') }}">San Francisco</a></h2>
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
                                <img src="{{asset('frontend/assets/images/destination/destination-1-8.png')}}" alt="">
                                <div class="destinations-one__content">
                                    <p class="destinations-one__sub-title">Tours</p>
                                    <h2 class="destinations-one__title"><a href="{{ route('destination.detail') }}">China</a></h2>
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
                                <img src="{{asset('frontend/assets/images/destination/destination-1-9.png')}}" alt="">
                                <div class="destinations-one__content">
                                    <h2 class="destinations-one__title"><a href="{{ route('destination.detail') }}">Germany</a></h2>
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
                                <img src="{{asset('frontend/assets/images/destination/destination-1-10.png')}}" alt="">
                                <div class="destinations-one__content">
                                    <h2 class="destinations-one__title"><a href="{{ route('destination.detail') }}">Dubai</a></h2>
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

    @endsection
