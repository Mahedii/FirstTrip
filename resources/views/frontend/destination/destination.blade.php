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

                    @foreach ($destinationData as $key => $destination)

                        @if (++$key%2 != 0)

                            <div class="col-xl-3 col-lg-3">
                                <div class="destinations-one__single">
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
                            </div>

                        @else

                            <div class="col-xl-6 col-lg-6">
                                <div class="destinations-one__single">
                                    <div class="destinations-one__img">
                                        <a href="{{ route('destination.detail',['id' => $destination->id, 'slug' => $destination->SLUG]) }}">
                                            <img src="{!! asset($destination->FILE_PATH) !!}" alt="">
                                        </a>
                                        <div class="destinations-one__content">
                                            {{-- <p class="destinations-one__sub-title">{{$destination->COUNTRY_NAME}}</p> --}}
                                            <h2 class="destinations-one__title"><a href="{{ route('destination.detail',['id' => $destination->id, 'slug' => $destination->SLUG]) }}">{{$destination->COUNTRY_NAME}}</a></h2>
                                        </div>
                                        {{-- <div class="destinations-one__button">
                                            <a href="#">6 tours</a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                        @endif

                    @endforeach

                    
                </div>
            </div>
        </section>
        <!--Destinations One End-->

    @endsection
