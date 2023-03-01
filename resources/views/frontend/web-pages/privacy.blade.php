@extends('frontend.layouts.master')
    @section('content')

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header__top">
                <div class="page-header-bg" style="background-image: url('{{ asset('/frontend/assets/images/backgrounds/page-header-bg.jpg') }}')">
                </div>
                <div class="page-header-bg-overly"></div>
                <div class="container">
                    <div class="page-header__top-inner">
                        <h2>Privacy Policy</h2>
                    </div>
                </div>
            </div>
            <div class="page-header__bottom">
                <div class="container">
                    <div class="page-header__bottom-inner">
                        <ul class="thm-breadcrumb list-unstyled">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><span>.</span></li>
                            <li>Pages</li>
                            <li><span>.</span></li>
                            <li class="active">Privacy Policy</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Page content Start-->
        <section class="about-page">
            <div class="container">
                {{-- <div class="section-title text-center">
                    <span class="section-title__tagline">Leran about us</span>
                    <h2 class="section-title__title">Meet the best airline</h2>
                </div> --}}
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        @foreach($pagesData as $pageData)
                            {!! html_entity_decode($pageData->PRIVACY_PAGE, ENT_QUOTES, 'UTF-8') !!}
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
        <!-- Page content End-->


    @endsection
