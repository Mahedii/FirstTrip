@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Activity Logs</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Logs</a></li>
                                    <li class="breadcrumb-item active">Activity Logs</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row g-4 mb-3">
                                            
                    <div class="col-sm">
                        <div class="d-flex justify-content-sm-end gap-2">
                            
                            <div class="search-box ms-2">
                                <input type="text" class="form-control" placeholder="Search..." id="searchText">
                                <i class="ri-search-line search-icon"></i>
                            </div>

                            <!-- <div class="ms-2">
                                <select class="form-control w-md" data-choices data-choices-search-false id="duration">
                                    <option value="All" >All</option>
                                    <option value="Today" selected>Today</option>
                                    <option value="Yesterday">Yesterday</option>
                                    <option value="Last 7 Days">Last 7 Days</option>
                                    <option value="Last 30 Days">Last 30 Days</option>
                                    <option value="This Month">This Month</option>
                                    <option value="Last Year">Last Year</option>
                                </select>
                            </div> -->

                        </div>
                    </div>
                </div>


                <div class="row" id="searchedResult">

                </div>

                <div class="row orginial" id="results">

                    
                </div>
                

                <div class="ajax-load text-center" style="display:none">
                    <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                        <path fill="#000"
                            d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                            <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                        </path>
                    </svg>
                </div>



            </div>

        </div>

        @include('admin.activity-log.ajax')

    @endsection