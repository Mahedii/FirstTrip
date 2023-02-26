@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Tour Package</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Packages</a></li>
                                    <li class="breadcrumb-item active">Add</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <div class="border-0">
                        <div class="row g-4">

                            <div class="col-sm" style="margin-bottom: 1rem;">
                                @if(session('crudMsg'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('crudMsg') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>

                            <div class="col-sm" style="margin-bottom: 1rem;">
                                <div class="d-flex justify-content-sm-end">
                                    <a href="{{ url()->previous() }}" class="btn btn-success" id="addproduct-btn">
                                        <i class="ri-arrow-left-line align-bottom me-1"></i>
                                        Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>



                    <form method="POST" action="{{ route('tour.package.insert') }}" enctype="multipart/form-data" id="tourPackageForm">

                        @csrf

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">

                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Add Package</h4>

                                    </div><!-- end card header -->

                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="PACKAGE_NAME" class="form-label">Package Name<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('PACKAGE_NAME') is-invalid @enderror" value="{{ old('PACKAGE_NAME') }}" name="PACKAGE_NAME">
                                                    @if ($errors->has('PACKAGE_NAME'))
                                                        <span class="text-danger">{{ $errors->first('PACKAGE_NAME') }}</span>
                                                    @endif
                                                </div>

                                            </div><!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="TOUR_TYPE" class="form-label">Flight Type <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('TOUR_TYPE') is-invalid @enderror" value="{{ old('TOUR_TYPE') }}" name="TOUR_TYPE" placeholder="oneway/round trip..">
                                                    @if ($errors->has('TOUR_TYPE'))
                                                        <span class="text-danger">{{ $errors->first('TOUR_TYPE') }}</span>
                                                    @endif
                                                </div>

                                            </div><!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="DURATION" class="form-label">Duration <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('DURATION') is-invalid @enderror" value="{{ old('DURATION') }}" name="DURATION">
                                                    @if ($errors->has('DURATION'))
                                                        <span class="text-danger">{{ $errors->first('DURATION') }}</span>
                                                    @endif
                                                </div>

                                            </div><!--end col-->


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="Country" class="form-label">Country<span class="text-danger">*</span></label>
                                                    <select class="js-example-basic-single" id="select-country" name="COUNTRY_ID">
                                                        @php($def_val = 1)
                                                        <option>Select Country</option>
                                                        <option value="{{$def_val}}">India</option>
                                                        <option value="{{$def_val}}">Thailand</option>
                                                        <option value="{{$def_val}}">Bangladesh</option>
                                                        <option value="{{$def_val}}">Malaysia</option>
                                                        <option value="{{$def_val}}">Singapore</option>

                                                    </select>
                                                    @if ($errors->has('COUNTRY_ID'))
                                                        <span class="text-danger">{{ $errors->first('COUNTRY_ID') }}</span>
                                                    @endif
                                                </div>

                                            </div><!--end col-->


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="DESTINATION" class="form-label">Destination<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('DESTINATION') is-invalid @enderror" value="{{ old('DESTINATION') }}" name="DESTINATION">
                                                    @if ($errors->has('DESTINATION'))
                                                        <span class="text-danger">{{ $errors->first('DESTINATION') }}</span>
                                                    @endif
                                                </div>

                                            </div><!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="INVOICE_ADDRESS" class="form-label">Cost (per Person) <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('COST') is-invalid @enderror" value="{{ old('COST') }}" name="COST">
                                                    @if ($errors->has('COST'))
                                                        <span class="text-danger">{{ $errors->first('COST') }}</span>
                                                    @endif
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="OVERVIEW" class="form-label">Overview <span class="text-danger">*</span></label>
                                                    <p class="text-muted mb-2">Add tour overview</p>
                                                    <textarea class="form-control" name="OVERVIEW" rows="5"></textarea>
                                                    @if ($errors->has('OVERVIEW'))
                                                        <span class="text-danger">{{ $errors->first('OVERVIEW') }}</span>
                                                    @endif
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="Thumbnail_Image" class="form-label">Thumbnail Image (370*259)</label>
                                                    <p class="text-muted">Add tour package thumbnail image.</p>
                                                    <input type="file" class="form-control" id="singleImageFile" name="singleFile" >
                                                </div>
                                                <div class="preview-image-before-upload"> </div>
                                            </div><!--end col-->


                                        </div>


                                    </div>
                                </div>
                                <!-- end card -->


                                <div class="text-end mb-3">
                                    <button type="submit" class="btn btn-success w-sm">Add Package</button>
                                </div>
                            </div>
                            <!-- end col -->


                        </div>
                        <!-- end row -->

                    </form>


                    <form method="POST" action="{{ route('tour.package.details.insert') }}" enctype="multipart/form-data" id="packageDetailsForm">

                        @csrf

                        <div class="row">
                            <div class="col-lg-12">

                                @if(session('crudMsgPO'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('crudMsgPO') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <div class="alert alert-danger" style="display:none"></div>

                                <div class="card">

                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Add Package Details</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">

                                        <div class="row mb-3">


                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="PACKAGE_ID" class="form-label">Package<span class="text-danger">*</span></label>
                                                    <select class="js-example-basic-single mb-3" id="select-package-id" name="PACKAGE_ID">

                                                        <option value="" disabled selected>Select Package</option>

                                                        @foreach($tourPackages as $tourPackage)
                                                            <option @if(old('PACKAGE_ID') == $tourPackage->id) selected @endif value="{{ $tourPackage->id }}">{{ $tourPackage->PACKAGE_NAME }}</option>
                                                        @endforeach

                                                    </select>
                                                    @if ($errors->has('PACKAGE_ID'))
                                                        <span class="text-danger">{{ $errors->first('PACKAGE_ID') }}</span>
                                                    @endif
                                                </div>

                                            </div><!--end col-->



                                            <div class="col-md-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Slider Image (1894*580)</label>
                                                    <p class="text-muted">Add tour package details slider images.</p>
                                                    <input type="file" class="form-control" id="multipleImageFile" name="multipleImageFile[]" multiple="multiple">
                                                </div>
                                                <div class="images-preview-div"> </div>
                                                <button type="button" class="btn btn-danger multipleImageResetBtn w-sm" style="display: none;">Reset</button>
                                            </div><!--end col-->


                                        </div>

                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card">

                                    <div class="card-body">

                                        <div class="row mb-3">

                                            <input type="hidden" id="included-counter" value="1">
                                            <input type="hidden" id="excluded-counter" value="1">

                                            <div class="col-md-6">
                                                <div class="row" id="included_dynamic_field">
                                                    <div class="col-md-8">
                                                        <div class="mb-3">
                                                            <label for="INCLUDED_SERVICE" class="form-label">Included Service<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control @error('INCLUDED_SERVICE.*') is-invalid @enderror" name="INCLUDED_SERVICE[]">
                                                            @if ($errors->has('INCLUDED_SERVICE.*'))
                                                                <span class="text-danger">{{ $errors->first('INCLUDED_SERVICE.*') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>
                                                <div class="text-start mb-3">
                                                    <a href="javascript:new_link()" id="add-included-item" class="btn btn-soft-secondary w-sm"><i class="ri-add-fill me-1 align-bottom"></i> Add</a>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-md-6">
                                                <div class="row" id="excluded_dynamic_field">
                                                    <div class="col-md-8">
                                                        <div class="mb-3">
                                                            <label for="EXCLUDED_SERVICE" class="form-label">Excluded Service<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control @error('EXCLUDED_SERVICE.*') is-invalid @enderror" name="EXCLUDED_SERVICE[]">
                                                            @if ($errors->has('EXCLUDED_SERVICE.*'))
                                                                <span class="text-danger">{{ $errors->first('EXCLUDED_SERVICE.*') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>
                                                <div class="text-start mb-3">
                                                    <a href="javascript:new_link()" id="add-excluded-item" class="btn btn-soft-secondary w-sm"><i class="ri-add-fill me-1 align-bottom"></i> Add</a>
                                                </div>
                                            </div><!--end col-->

                                        </div>

                                    </div>
                                </div>

                                <div id="tour_plan_dynamic_field">

                                    <input type="hidden" id="tour-plan-counter" value="1">

                                    <div class="card">

                                        <div class="card-body">

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="TOUR_PLAN_TITLE_TEXT" class="form-label">Tour Plan Title Text<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control @error('TOUR_PLAN_TITLE_TEXT.*') is-invalid @enderror" name="TOUR_PLAN_TITLE_TEXT[]">
                                                        @if ($errors->has('TOUR_PLAN_TITLE_TEXT.*'))
                                                            <span class="text-danger">{{ $errors->first('TOUR_PLAN_TITLE_TEXT.*') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="TOUR_PLAN_TITLE_BODY" class="form-label">Tour Plan Title Body<span class="text-danger">*</span></label>
                                                        <textarea class="form-control @error('TOUR_PLAN_TITLE_BODY.*') is-invalid @enderror" name="TOUR_PLAN_TITLE_BODY[]" rows="3"></textarea>
                                                        @if ($errors->has('TOUR_PLAN_TITLE_BODY.*'))
                                                            <span class="text-danger">{{ $errors->first('TOUR_PLAN_TITLE_BODY.*') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>

                                <div class="text-start mb-3">
                                    <a href="javascript:new_link()" id="add-tour-plan-item" class="btn btn-soft-secondary w-sm"><i class="ri-add-fill me-1 align-bottom"></i> Add</a>
                                </div>


                                <div class="text-end mb-3">
                                    <button type="submit" class="btn btn-success w-sm package-details-add-btn">Add Package Details</button>
                                </div>
                            </div>
                            <!-- end col -->


                        </div>
                        <!-- end row -->

                    </form>

                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        @include('admin.tours.ajax.single-image')
        @include('admin.tours.ajax.multiple-image')
        @include('admin.tours.ajax.package-detail')
        @include('admin.tours.ajax.included-service')
        @include('admin.tours.ajax.excluded-service')
        @include('admin.tours.ajax.tour-plan')


    @endsection
