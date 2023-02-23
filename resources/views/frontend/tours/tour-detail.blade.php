@extends('frontend.layouts.master')
    @section('content')

        <!--Tour Details Slider Start-->
        <section class="main-slider tour-details-slider">
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
                            style="background-image: url(frontend/assets/images/backgrounds/tour-details-bg-1.jpg);"></div>
                        <div class="container">
                            <div class="swiper-slide-inner">
                                <div class="tour-details-slider_icon">
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image-layer"
                            style="background-image: url(frontend/assets/images/backgrounds/tour-details-bg-2.jpg);"></div>
                        <div class="container">
                            <div class="swiper-slide-inner">
                                <div class="tour-details-slider_icon">
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="image-layer"
                            style="background-image: url(frontend/assets/images/backgrounds/tour-details-bg-3.jpg);"></div>
                        <div class="container">
                            <div class="swiper-slide-inner">
                                <div class="tour-details-slider_icon">
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
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
        <!--Tour Details Slider End-->

        <!--Tour Details End-->
        <section class="tour-details">
            <div class="tour-details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="tour-details__top-inner">
                                <div class="tour-details__top-left">
                                    <h2 class="tour-details__top-title">National Park 2 Days Tour</h2>
                                    <p class="tour-details__top-rate"><span>$870</span> / Per Person</p>
                                </div>
                                <div class="tour-details__top-right">
                                    <ul class="list-unstyled tour-details__top-list">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-clock"></span>
                                            </div>
                                            <div class="text">
                                                <p>Duration</p>
                                                <h6>3 Days</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-user"></span>
                                            </div>
                                            <div class="text">
                                                <p>Min Age</p>
                                                <h6>12 +</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-plane"></span>
                                            </div>
                                            <div class="text">
                                                <p>Tour Type</p>
                                                <h6>Adventure, Fun</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <span class="icon-place"></span>
                                            </div>
                                            <div class="text">
                                                <p>Location</p>
                                                <h6>Los Angeles</h6>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tour-details__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="tour-details__bottom-inner">
                                <div class="tour-details__bottom-left">
                                    <ul class="list-unstyled tour-details__bottom-list">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-clock"></span>
                                            </div>
                                            <div class="text">
                                                <p>Posted 2 days ago</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="text">
                                                <p>8.0 Superb</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tour-details__bottom-right">
                                    <a href="#"><i class="fas fa-share"></i>share</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Tour Details End-->

        <!--Tour Details Two Start-->
        <section class="tour-details-two">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="tour-details-two__left">
                            <div class="tour-details-two__overview">
                                <h3 class="tour-details-two__title">Overview</h3>
                                <p class="tour-details-two__overview-text">Lorem ipsum available isn but the majority
                                    have suffered alteratin in some or form injected simply free text used by copytyping
                                    refreshing. Neque porro est qui dolorem ipsum quia quaed inventore veritatis et
                                    quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum is simply free text
                                    used by copytyping refreshing. Neque porro est qui dolorem ipsum quia quaed
                                    inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Aelltes
                                    port lacus quis enim var sed efficitur turpis gilla sed sit amet finibus eros.</p>
                                <div class="tour-details-two__overview-bottom">
                                    <h3 class="tour-details-two-overview__title">Included/Exclude</h3>
                                    <div class="tour-details-two__overview-bottom-inner">
                                        <div class="tour-details-two__overview-bottom-left">
                                            <ul class="list-unstyled tour-details-two__overview-bottom-list">
                                                <li>
                                                    <div class="icon">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="text">
                                                        <p>Pick and Drop Services</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="text">
                                                        <p>1 Meal Per Day</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="text">
                                                        <p>Cruise Dinner & Music Event</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    <div class="text">
                                                        <p>Visit 7 Best Places in the City With Group</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tour-details-two__overview-bottom-right">
                                            <ul class="list-unstyled tour-details-two__overview-bottom-right-list">
                                                <li>
                                                    <div class="icon">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                    <div class="text">
                                                        <p>Additional Services</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                    <div class="text">
                                                        <p>Insurance</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                    <div class="text">
                                                        <p>Food & Drinks</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="icon">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                    <div class="text">
                                                        <p>Tickets</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tour-details-two__tour-plan">
                                <h3 class="tour-details-two__title">Tour Plan</h3>
                                <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                    <div class="accrodion active">
                                        <div class="accrodion-title">
                                            <h4><span>Day 1</span> Arrive South Africa Forest</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>There are many variations of passages of available but majority have
                                                    alteration in some by inject humour or random words. Lorem ipsum
                                                    dolor sit amet, error insolens reprimique no quo, ea pri verterem
                                                    phaedr vel ea iisque aliquam.</p>
                                                <ul class="list-unstyled">
                                                    <li>Free Drinks</li>
                                                    <li>Awesome Breakfast</li>
                                                    <li>5 Star Accommodation</li>
                                                </ul>
                                            </div><!-- /.inner -->
                                        </div>
                                    </div>
                                    <div class="accrodion">
                                        <div class="accrodion-title">
                                            <h4><span>Day 2</span> Lunch Inside of Forest & Adventure</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>There are many variations of passages of available but majority have
                                                    alteration in some by inject humour or random words. Lorem ipsum
                                                    dolor sit amet, error insolens reprimique no quo, ea pri verterem
                                                    phaedr vel ea iisque aliquam.</p>
                                                <ul class="list-unstyled">
                                                    <li>Free Drinks</li>
                                                    <li>Awesome Breakfast</li>
                                                    <li>5 Star Accommodation</li>
                                                </ul>
                                            </div><!-- /.inner -->
                                        </div>
                                    </div>
                                    <div class="accrodion last-chiled">
                                        <div class="accrodion-title">
                                            <h4><span>Day 3</span> Depart from South Africa</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>There are many variations of passages of available but majority have
                                                    alteration in some by inject humour or random words. Lorem ipsum
                                                    dolor sit amet, error insolens reprimique no quo, ea pri verterem
                                                    phaedr vel ea iisque aliquam.</p>
                                                <ul class="list-unstyled">
                                                    <li>Free Drinks</li>
                                                    <li>Awesome Breakfast</li>
                                                    <li>5 Star Accommodation</li>
                                                </ul>
                                            </div><!-- /.inner -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tour-details-two__related-tours">
                                <h3 class="tour-details-two__title">Tour Plan</h3>
                                <div class="row">
                                    <div class="col-xl-6">
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
                                                <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">National
                                                        Park 2 Days Tour</a></h3>
                                                <p class="popular-tours__rate"><span>$1870</span> / Per Person</p>
                                                <ul class="popular-tours__meta list-unstyled">
                                                    <li><a href="{{ route('tour.details') }}">3 Days</a></li>
                                                    <li><a href="{{ route('tour.details') }}">12+</a></li>
                                                    <li><a href="{{ route('tour.details') }}">Los Angeles</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
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
                                                <h3 class="popular-tours__title"><a href="{{ route('tour.details') }}">National
                                                        Park 2 Days Tour</a></h3>
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
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="tour-details-two__sidebar">
                            <div class="tour-details-two__book-tours">
                                <h3 class="tour-details-two__sidebar-title">Book Tours</h3>
                                <form action="#" class="tour-details-two__sidebar-form">
                                    <div class="tour-details-two__sidebar-form-input">
                                        <input type="text" placeholder="Yur Name" name="name">
                                    </div>
                                    <div class="tour-details-two__sidebar-form-input">
                                        <input type="text" placeholder="Contact No" name="contact_no">
                                    </div>
                                    <div class="tour-details-two__sidebar-form-input">
                                        <input type="text" placeholder="Email" name="email">
                                    </div>

                                    <div class="tour-details-two__sidebar-form-input">
                                        <input type="text" name="date" placeholder="Select date" id="datepicker">
                                        <div class="tour-details-two__sidebar-form-icon">
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                    </div>

                                    <div class="tour-details-two__sidebar-form-input">
                                        <input type="text" placeholder="Number of Pax" name="pax">
                                    </div>

                                    <button type="submit" class="thm-btn tour-details-two__sidebar-btn">Book
                                        Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Tour Details Two End-->

    @endsection
