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

                    @foreach($tourPackageImageData as $key => $imageList)
                        <div class="swiper-slide">
                            <div class="image-layer"
                                style="background-image: url('{{ asset('/frontend/assets/images/tour_packages/'.$imageList->SLUG.'/' .$imageList->FILE_NAME) }}')">
                            </div>
                            <div class="container">
                                <div class="swiper-slide-inner">
                                    {{-- <div class="tour-details-slider_icon">
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                    </div> --}}
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
        <!--Tour Details Slider End-->

        @foreach($tourPackageData as $tpData)

            <!--Tour Details End-->
            <section class="tour-details">
                <div class="tour-details__top">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="tour-details__top-inner">
                                    <div class="tour-details__top-left">
                                        <h2 class="tour-details__top-title">{{$tpData->PACKAGE_NAME}}</h2>
                                        <p class="tour-details__top-rate"><span>{{$tpData->COST}}</span> / Per Person</p>
                                    </div>
                                    <div class="tour-details__top-right">
                                        <ul class="list-unstyled tour-details__top-list">
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-clock"></span>
                                                </div>
                                                <div class="text">
                                                    <p>Duration</p>
                                                    <h6>{{$tpData->DURATION}}</h6>
                                                </div>
                                            </li>
                                            {{-- <li>
                                                <div class="icon">
                                                    <span class="icon-user"></span>
                                                </div>
                                                <div class="text">
                                                    <p>Min Age</p>
                                                    <h6>12 +</h6>
                                                </div>
                                            </li> --}}
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-plane"></span>
                                                </div>
                                                <div class="text">
                                                    <p>Tour Type</p>
                                                    <h6>{{$tpData->TOUR_TYPE}}</h6>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-place"></span>
                                                </div>
                                                <div class="text">
                                                    <p>Location</p>
                                                    <h6>{{$tpData->DESTINATION}}</h6>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="tour-details__bottom">
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
                </div> --}}
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
                                    <p class="tour-details-two__overview-text">{!! html_entity_decode($tpData->OVERVIEW, ENT_QUOTES, 'UTF-8') !!}</p>

                                    <div class="tour-details-two__overview-bottom">
                                        <h3 class="tour-details-two-overview__title">Included/Exclude</h3>
                                        <div class="tour-details-two__overview-bottom-inner">
                                            <div class="tour-details-two__overview-bottom-left">
                                                <ul class="list-unstyled tour-details-two__overview-bottom-list">
                                                    @foreach($tourPackageIncludedServiceData as $tourPackageIncludedService)
                                                        <li>
                                                            <div class="icon">
                                                                <i class="fa fa-check"></i>
                                                            </div>
                                                            <div class="text">
                                                                <p>{{$tourPackageIncludedService->INCLUDED_SERVICE}}</p>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="tour-details-two__overview-bottom-right">
                                                <ul class="list-unstyled tour-details-two__overview-bottom-right-list">
                                                    @foreach($tourPackageExcludedServiceData as $tourPackageExcludedService)
                                                        <li>
                                                            <div class="icon">
                                                                <i class="fa fa-times"></i>
                                                            </div>
                                                            <div class="text">
                                                                <p>{{$tourPackageExcludedService->EXCLUDED_SERVICE}}</p>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tour-details-two__tour-plan">
                                    <h3 class="tour-details-two__title">Tour Plan</h3>
                                    <div class="accrodion-grp" data-grp-name="faq-one-accrodion">

                                        @foreach($tourPackageInfoData as $tourPackageInfo)

                                            <div class="accrodion custom-accrodion">
                                                <div class="accrodion-title">
                                                    <h4>{{$tourPackageInfo->TOUR_PLAN_TITLE_TEXT}}</h4>
                                                </div>
                                                <div class="accrodion-content">
                                                    <div class="inner">
                                                        {!! html_entity_decode($tourPackageInfo->TOUR_PLAN_TITLE_BODY, ENT_QUOTES, 'UTF-8') !!}
                                                        {{-- {{$tourPackageInfo->TOUR_PLAN_TITLE_BODY}} --}}
                                                    </div><!-- /.inner -->
                                                </div>
                                            </div>

                                        @endforeach


                                    </div>
                                </div>

                                <div class="tour-details-two__related-tours">
                                    <h3 class="tour-details-two__title">Similar Packages</h3>
                                    <div class="row">

                                        @foreach($similarPackageData as $similarPackages)
                                            <div class="col-xl-6">
                                                <!--Popular Tours Two Single-->
                                                <div class="popular-tours__single">
                                                    <div class="popular-tours__img">
                                                        <a href="{{ route('tour.details',['id' => $similarPackages->id, 'slug' => $similarPackages->SLUG]) }}">
                                                            <img src="{!! asset($similarPackages->FILE_PATH) !!}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="popular-tours__content">
                                                        <h3 class="popular-tours__title"><a href="{{ route('tour.details',['id' => $similarPackages->id, 'slug' => $similarPackages->SLUG]) }}">{{$similarPackages->PACKAGE_NAME}}</a></h3>
                                                        <p class="popular-tours__rate"><span>{{$similarPackages->COST}}</span> / Per Person</p>
                                                        <ul class="popular-tours__meta list-unstyled">
                                                            <li><a href="{{ route('tour.details',['id' => $similarPackages->id, 'slug' => $similarPackages->SLUG]) }}">{{$similarPackages->DURATION}}</a></li>
                                                            <li><a href="{{ route('tour.details',['id' => $similarPackages->id, 'slug' => $similarPackages->SLUG]) }}">{{$similarPackages->DESTINATION}}</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="tour-details-two__sidebar">
                                <div class="tour-details-two__book-tours">
                                    <h3 class="tour-details-two__sidebar-title">Book Tours</h3>

                                    <div class="col-sm" style="margin-bottom: 1rem;">
                                        @if(session('crudMsg'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>{{ session('crudMsg') }}</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif
                                    </div>

                                    <form method="POST" action="{{route('tour-package.booking.insert')}}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="PACKAGE_ID" value="{{$tpData->id}}">
                                        <div class="tour-details-two__sidebar-form-input">
                                            <input type="text" class="@error('NAME') is-invalid @enderror" value="{{ old('NAME') }}" placeholder="Your Name" name="NAME">
                                            @if ($errors->has('NAME'))
                                                <span class="text-danger">{{ $errors->first('NAME') }}</span>
                                            @endif
                                        </div>
                                        <div class="tour-details-two__sidebar-form-input">
                                            <input type="text" class="@error('CONTACT_NO') is-invalid @enderror" value="{{ old('CONTACT_NO') }}" placeholder="Contact No" name="CONTACT_NO">
                                            @if ($errors->has('CONTACT_NO'))
                                                <span class="text-danger">{{ $errors->first('CONTACT_NO') }}</span>
                                            @endif
                                        </div>
                                        <div class="tour-details-two__sidebar-form-input">
                                            <input type="text" class="@error('EMAIL') is-invalid @enderror" value="{{ old('EMAIL') }}" placeholder="Email" name="EMAIL">
                                            @if ($errors->has('EMAIL'))
                                                <span class="text-danger">{{ $errors->first('EMAIL') }}</span>
                                            @endif
                                        </div>

                                        <div class="tour-details-two__sidebar-form-input">
                                            <input type="text" class="@error('START_DATE') is-invalid @enderror" value="{{ old('START_DATE') }}" name="START_DATE" placeholder="Select date" id="datepicker">
                                            <div class="tour-details-two__sidebar-form-icon">
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                            @if ($errors->has('START_DATE'))
                                                <span class="text-danger">{{ $errors->first('START_DATE') }}</span>
                                            @endif
                                        </div>

                                        <div class="tour-details-two__sidebar-form-input">
                                            <input type="text" class="@error('TOTAL_PAX') is-invalid @enderror" value="{{ old('TOTAL_PAX') }}" placeholder="Number of Pax" name="TOTAL_PAX">
                                            @if ($errors->has('TOTAL_PAX'))
                                                <span class="text-danger">{{ $errors->first('TOTAL_PAX') }}</span>
                                            @endif
                                        </div>

                                        <div class="tour-details-two__sidebar-form-input">
                                            <input type="text" class="@error('TOTAL_ADULT') is-invalid @enderror" value="{{ old('TOTAL_ADULT') }}" placeholder="Number of adult" name="TOTAL_ADULT">
                                            @if ($errors->has('TOTAL_ADULT'))
                                                <span class="text-danger">{{ $errors->first('TOTAL_ADULT') }}</span>
                                            @endif
                                        </div>

                                        <div class="tour-details-two__sidebar-form-input">
                                            <input type="text" class="@error('TOTAL_CHILD') is-invalid @enderror" value="{{ old('TOTAL_CHILD') }}" placeholder="Number of child" name="TOTAL_CHILD">
                                            @if ($errors->has('TOTAL_CHILD'))
                                                <span class="text-danger">{{ $errors->first('TOTAL_CHILD') }}</span>
                                            @endif
                                        </div>

                                        <div class="tour-details-two__sidebar-form-input">
                                            <input type="text" class="@error('TOTAL_INFANT') is-invalid @enderror" value="{{ old('TOTAL_INFANT') }}" placeholder="Number of infant" name="TOTAL_INFANT">
                                            @if ($errors->has('TOTAL_INFANT'))
                                                <span class="text-danger">{{ $errors->first('TOTAL_INFANT') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input @error('checkbox') is-invalid @enderror" type="checkbox" name="checkbox">I agree to all <a target="_blank" href='{{route("terms-condition-page")}}' style="color:#703F98">terms & conditions</a>
                                            @if ($errors->has('checkbox'))
                                                <span class="text-danger">{{ $errors->first('checkbox') }}</span>
                                            @endif
                                        </div>

                                        <button type="submit" class="thm-btn tour-details-two__sidebar-btn">Book Now</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Tour Details Two End-->

        @endforeach

        <script type="text/javascript">
            // $(document).ready(function () {
            //     $(document).on('click','.custom-accrodion',function() {
            //     // $('.custom-accrodion').click(function() {
            //         // alert("H");
            //         // $(this).toggleClass( "active" );
            //         if($(this).hasClass('active')) {
            //             $(this).removeClass('active');
            //             $(this).closest('accrodion-content').style('display:none');
            //         } else {
            //             $(this).addClass('active');
            //             $(this).closest('accrodion-content').style('display:block');
            //         }

            //     });
            // });
        </script>

    @endsection
