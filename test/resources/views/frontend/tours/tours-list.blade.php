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
                        <h2>Tours List</h2>
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

        <!--Tours List Start-->
        <section class="tours-list">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="tours-list__left">
                            <div class="tours-list__sidebar">
                                <div class="tours-list__sidebar-search">
                                    <h3 class="tours-list__sidebar-search-title">Search Tours</h3>
                                    <form class="tours-list__sidebar-form">
                                        <div class="tours-list__sidebar-input">
                                            <input type="text" placeholder="Where to" name="where to">
                                        </div>
                                        <div class="tours-list__sidebar-input">
                                            <input type="text" placeholder="When" name="when">
                                        </div>
                                        <div class="tours-list__sidebar-input">
                                            <select class="selectpicker" id="type">
                                                <option value="Adventure">Type</option>
                                                <option value="Adventure">Adventure</option>
                                                <option value="Wildlife">Wildlife</option>
                                                <option value="Sightseeing">Sightseeing</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="thm-btn tours-list__sidebar-btn">search</button>
                                    </form>
                                </div>
                                <div class="tour-sidebar__sorter-wrap">

                                    <div class="tour-sidebar__sorter-single">
                                        <div class="tour-sidebar__sorter-top">
                                            <h3>Price</h3>
                                            <button class="tour-sidebar__sorter-toggler"></button>

                                        </div>
                                        <div class="tour-sidebar__sorter-content">
                                            <div class="tour-sidebar__price-range">
                                                <div class="form-group">
                                                    <p>$<span id="min-value-rangeslider"></span></p>
                                                    <p>$<span id="max-value-rangeslider"></span></p>
                                                </div>
                                                <div class="range-slider-price" id="range-slider-price"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="tour-sidebar__sorter-single">
                                        <div class="tour-sidebar__sorter-top">
                                            <h3>Review Score</h3>
                                            <button class="tour-sidebar__sorter-toggler"></button>

                                        </div>
                                        <div class="tour-sidebar__sorter-content">
                                            <div class="tour-sidebar__sorter-inputs">
                                                <p>
                                                    <input type="checkbox" id="review-5" name="radio-group">
                                                    <label for="review-5">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                    </label>
                                                </p>
                                                <p>
                                                    <input type="checkbox" id="review-4" name="radio-group">
                                                    <label for="review-4">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star"></i>
                                                    </label>
                                                </p>
                                                <p>
                                                    <input type="checkbox" id="review-3" name="radio-group">
                                                    <label for="review-3">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </label>
                                                </p>
                                                <p>
                                                    <input type="checkbox" id="review-2" name="radio-group">
                                                    <label for="review-2">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star "></i>
                                                        <i class="fa fa-star "></i>
                                                        <i class="fa fa-star "></i>
                                                    </label>
                                                </p>
                                                <p>
                                                    <input type="checkbox" id="review-1" name="radio-group">
                                                    <label for="review-1">
                                                        <i class="fa fa-star active"></i>
                                                        <i class="fa fa-star "></i>
                                                        <i class="fa fa-star "></i>
                                                        <i class="fa fa-star "></i>
                                                        <i class="fa fa-star "></i>
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tour-sidebar__sorter-single">
                                        <div class="tour-sidebar__sorter-top">
                                            <h3>Categories</h3>
                                            <button class="tour-sidebar__sorter-toggler"></button>

                                        </div>
                                        <div class="tour-sidebar__sorter-content">

                                            <div class="tour-sidebar__sorter-inputs">
                                                <p>
                                                    <input type="checkbox" id="cat-5" name="radio-group">
                                                    <label for="cat-5">
                                                        City Tours
                                                    </label>
                                                </p>
                                                <p>
                                                    <input type="checkbox" id="cat-4" name="radio-group">
                                                    <label for="cat-4">HostedTours
                                                    </label>
                                                </p>
                                                <p>
                                                    <input type="checkbox" id="cat-3" name="radio-group">
                                                    <label for="cat-3">Adventure Tours
                                                    </label>
                                                </p>
                                                <p>
                                                    <input type="checkbox" id="cat-2" name="radio-group">
                                                    <label for="cat-2">Group Tours

                                                    </label>
                                                </p>
                                                <p>
                                                    <input type="checkbox" id="cat-1" name="radio-group">
                                                    <label for="cat-1">
                                                        Couple Tours
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tour-sidebar__sorter-single">
                                        <div class="tour-sidebar__sorter-top">
                                            <h3>Duration</h3>
                                            <button class="tour-sidebar__sorter-toggler"></button>

                                        </div>
                                        <div class="tour-sidebar__sorter-content">

                                            <div class="tour-sidebar__sorter-inputs">
                                                <p>
                                                    <input type="checkbox" id="duration-5" name="radio-group">
                                                    <label for="duration-5">
                                                        0 - 24 hours
                                                    </label>
                                                </p>
                                                <p>
                                                    <input type="checkbox" id="duration-4" name="radio-group">
                                                    <label for="duration-4">1 - 2 days

                                                    </label>
                                                </p>
                                                <p>
                                                    <input type="checkbox" id="duration-3" name="radio-group">
                                                    <label for="duration-3">2 - 3 days

                                                    </label>
                                                </p>
                                                <p>
                                                    <input type="checkbox" id="duration-2" name="radio-group">
                                                    <label for="duration-2">4 - 5 days


                                                    </label>
                                                </p>
                                                <p>
                                                    <input type="checkbox" id="duration-1" name="radio-group">
                                                    <label for="duration-1">
                                                        5 - 10 days
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="tours-list__right">
                            <div class="tours-list__inner">
                                <!--Tours List Single-->
                                <div class="tours-list__single">
                                    <div class="tours-list__img">
                                        <img src="{{asset('frontend/assets/images/resources/tours-list-img-1.jpg')}}" alt="">
                                        <div class="tours-list__icon">
                                            <a href="{{ route('tour.details') }}">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tours-list__content">
                                        <div class="tours-list__stars">
                                            <i class="fa fa-star"></i> 8.0 Superb
                                        </div>
                                        <h3 class="tours-list__title"><a href="{{ route('tour.details') }}">Moscow Red City
                                                Land</a></h3>
                                        <p class="tours-list__rate"><span>$870</span> / Per Person</p>
                                        <p class="tours-list__text">Lorem ipsum available isn but the majority have
                                            suffered alteratin in some or form injected semper fames.</p>
                                        <ul class="tours-list__meta list-unstyled">
                                            <li><a href="{{ route('tour.details') }}"><i class="far fa-calendar"></i>3 Days</a>
                                            </li>
                                            <li><a href="{{ route('tour.details') }}"><i class="far fa-user-circle"></i>12+</a>
                                            </li>
                                            <li><a href="{{ route('tour.details') }}"><i class="far fa-map"></i>Los Angeles</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--Tours List Single-->
                                <div class="tours-list__single">
                                    <div class="tours-list__img">
                                        <img src="{{asset('frontend/assets/images/resources/tours-list-img-2.jpg')}}" alt="">
                                        <div class="tours-list__icon">
                                            <a href="{{ route('tour.details') }}">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tours-list__content">
                                        <div class="tours-list__stars">
                                            <i class="fa fa-star"></i> 8.0 Superb
                                        </div>
                                        <h3 class="tours-list__title"><a href="{{ route('tour.details') }}">Discover Depth of
                                                Beach</a></h3>
                                        <p class="tours-list__rate"><span>$870</span> / Per Person</p>
                                        <p class="tours-list__text">Lorem ipsum available isn but the majority have
                                            suffered alteratin in some or form injected semper fames.</p>
                                        <ul class="tours-list__meta list-unstyled">
                                            <li><a href="{{ route('tour.details') }}"><i class="far fa-calendar"></i>3 Days</a>
                                            </li>
                                            <li><a href="{{ route('tour.details') }}"><i class="far fa-user-circle"></i>12+</a>
                                            </li>
                                            <li><a href="{{ route('tour.details') }}"><i class="far fa-map"></i>Los Angeles</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--Tours List Single-->
                                <div class="tours-list__single">
                                    <div class="tours-list__img">
                                        <img src="{{asset('frontend/assets/images/resources/tours-list-img-3.jpg')}}" alt="">
                                        <div class="tours-list__icon">
                                            <a href="{{ route('tour.details') }}">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tours-list__content">
                                        <div class="tours-list__stars">
                                            <i class="fa fa-star"></i> 8.0 Superb
                                        </div>
                                        <h3 class="tours-list__title"><a href="{{ route('tour.details') }}">Discover Depth of
                                                Beach</a></h3>
                                        <p class="tours-list__rate"><span>$870</span> / Per Person</p>
                                        <p class="tours-list__text">Lorem ipsum available isn but the majority have
                                            suffered alteratin in some or form injected semper fames.</p>
                                        <ul class="tours-list__meta list-unstyled">
                                            <li><a href="{{ route('tour.details') }}"><i class="far fa-calendar"></i>3 Days</a>
                                            </li>
                                            <li><a href="{{ route('tour.details') }}"><i class="far fa-user-circle"></i>12+</a>
                                            </li>
                                            <li><a href="{{ route('tour.details') }}"><i class="far fa-map"></i>Los Angeles</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--Tours List Single-->
                                <div class="tours-list__single">
                                    <div class="tours-list__img">
                                        <img src="{{asset('frontend/assets/images/resources/tours-list-img-4.jpg')}}" alt="">
                                        <div class="tours-list__icon">
                                            <a href="{{ route('tour.details') }}">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tours-list__content">
                                        <div class="tours-list__stars">
                                            <i class="fa fa-star"></i> 8.0 Superb
                                        </div>
                                        <h3 class="tours-list__title"><a href="{{ route('tour.details') }}">Moscow Red City
                                                Land</a></h3>
                                        <p class="tours-list__rate"><span>$870</span> / Per Person</p>
                                        <p class="tours-list__text">Lorem ipsum available isn but the majority have
                                            suffered alteratin in some or form injected semper fames.</p>
                                        <ul class="tours-list__meta list-unstyled">
                                            <li><a href="{{ route('tour.details') }}"><i class="far fa-calendar"></i>3 Days</a>
                                            </li>
                                            <li><a href="{{ route('tour.details') }}"><i class="far fa-user-circle"></i>12+</a>
                                            </li>
                                            <li><a href="{{ route('tour.details') }}"><i class="far fa-map"></i>Los Angeles</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--Tours List Single-->
                                <div class="tours-list__single">
                                    <div class="tours-list__img">
                                        <img src="{{asset('frontend/assets/images/resources/tours-list-img-5.jpg')}}" alt="">
                                        <div class="tours-list__icon">
                                            <a href="{{ route('tour.details') }}">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tours-list__content">
                                        <div class="tours-list__stars">
                                            <i class="fa fa-star"></i> 8.0 Superb
                                        </div>
                                        <h3 class="tours-list__title"><a href="{{ route('tour.details') }}">National Park 2 Days
                                                Tour</a></h3>
                                        <p class="tours-list__rate"><span>$870</span> / Per Person</p>
                                        <p class="tours-list__text">Lorem ipsum available isn but the majority have
                                            suffered alteratin in some or form injected semper fames.</p>
                                        <ul class="tours-list__meta list-unstyled">
                                            <li><a href="{{ route('tour.details') }}"><i class="far fa-calendar"></i>3 Days</a>
                                            </li>
                                            <li><a href="{{ route('tour.details') }}"><i class="far fa-user-circle"></i>12+</a>
                                            </li>
                                            <li><a href="{{ route('tour.details') }}"><i class="far fa-map"></i>Los Angeles</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Tours List End-->

    @endsection
