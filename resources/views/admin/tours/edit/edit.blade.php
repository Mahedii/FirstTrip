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



                    @foreach($tourPackageData as $tourPackage)

                        <form method="POST" action="{{ route('tour.package.update', $tourPackage->SLUG) }}" enctype="multipart/form-data" id="tourPackageForm">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="card">

                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Edit Package</h4>

                                        </div><!-- end card header -->

                                        <div class="card-body">

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="PACKAGE_NAME" class="form-label">Package Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control @error('PACKAGE_NAME') is-invalid @enderror"  value="{{ $tourPackage->PACKAGE_NAME }}" name="PACKAGE_NAME">
                                                        @if ($errors->has('PACKAGE_NAME'))
                                                            <span class="text-danger">{{ $errors->first('PACKAGE_NAME') }}</span>
                                                        @endif
                                                    </div>

                                                </div><!--end col-->

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="TOUR_TYPE" class="form-label">Flight Type <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control @error('TOUR_TYPE') is-invalid @enderror" value="{{ $tourPackage->TOUR_TYPE }}" name="TOUR_TYPE" placeholder="oneway/round trip..">
                                                        @if ($errors->has('TOUR_TYPE'))
                                                            <span class="text-danger">{{ $errors->first('TOUR_TYPE') }}</span>
                                                        @endif
                                                    </div>

                                                </div><!--end col-->

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="DURATION" class="form-label">Duration <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control @error('DURATION') is-invalid @enderror" value="{{ $tourPackage->DURATION }}" name="DURATION">
                                                        @if ($errors->has('DURATION'))
                                                            <span class="text-danger">{{ $errors->first('DURATION') }}</span>
                                                        @endif
                                                    </div>

                                                </div><!--end col-->


                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="DESTINATION" class="form-label">Destination<span class="text-danger">*</span></label>
                                                        <select class="js-example-basic-single" id="select-destination" name="DESTINATION">

                                                            <option value="{{ $tourPackage->DESTINATION }}" selected>{{ $tourPackage->DESTINATION }}</option>
                                                            <option>Select Destination</option>
                                                            <option value="Dubai-UAE">Dubai-UAE</option>
                                                            <option value="Bangkok">Bangkok</option>
                                                            <option value="Malaysia">Malaysia</option>
                                                            <option value="Kolkata">Kolkata</option>
                                                            <option value="Singapore">Singapore</option>
                                                            <option value="Sylhet">Sylhet</option>
                                                            <option value="Cox's Bazar">Cox's Bazar</option>

                                                        </select>
                                                        @if ($errors->has('DESTINATION'))
                                                            <span class="text-danger">{{ $errors->first('DESTINATION') }}</span>
                                                        @endif
                                                    </div>

                                                </div><!--end col-->

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="INVOICE_ADDRESS" class="form-label">Cost (per Person) <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control @error('COST') is-invalid @enderror" value="{{ $tourPackage->COST }}" name="COST">
                                                        @if ($errors->has('COST'))
                                                            <span class="text-danger">{{ $errors->first('COST') }}</span>
                                                        @endif
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="OVERVIEW" class="form-label">Overview <span class="text-danger">*</span></label>
                                                        <p class="text-muted mb-2">Add tour overview</p>
                                                        <textarea class="form-control" name="OVERVIEW" rows="5">{{ $tourPackage->OVERVIEW }}</textarea>
                                                        @if ($errors->has('OVERVIEW'))
                                                            <span class="text-danger">{{ $errors->first('OVERVIEW') }}</span>
                                                        @endif
                                                    </div>
                                                </div><!--end col-->




                                            </div>


                                        </div>
                                    </div>
                                    <!-- end card -->

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
                                                    <h4 class="card-title mb-0 flex-grow-1">Image Section</h4>
                                                </div><!-- end card header -->

                                                <div class="card-body">

                                                    <div class="row mb-3">

                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="Thumbnail_Image" class="form-label">Thumbnail Image (370*259)</label>
                                                                <p class="text-muted">Add tour package thumbnail image.</p>
                                                                <input type="file" class="form-control" id="singleImageFile" name="singleFile" >
                                                            </div>

                                                            <div class="preview-image-before-upload mb-3">
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{ asset($tourPackage->FILE_PATH) }}" height="150px" width="200px" alt="">
                                                                </a>
                                                            </div>
                                                        </div><!--end col-->

                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Slider Image (1894*580)</label>
                                                                <p class="text-muted">Add tour package details slider images.</p>
                                                                <input type="file" class="form-control" id="multipleImageFile" name="multipleImageFile[]" multiple="multiple">
                                                            </div>
                                                            <div class="images-preview-div">
                                                                @foreach($tourPackageImageData as $imageList)
                                                                    <a href="javascript:void(0)" class="package-image-{{ $imageList->id }}" style="margin:5px 0">
                                                                        <img class="mb-3" src="{{ asset($imageList->FILE_PATH) }}" height="150px" width="190px" alt="">
                                                                        <span>
                                                                            <i data-id="{{ $imageList->id }}" class="ri-delete-bin-fill package-image-delete-btn" style="position: relative; top: -55px; right: 25px; color: red;"></i>
                                                                        </span>
                                                                    </a>
                                                                    {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
                                                                @endforeach
                                                            </div>

                                                            <button type="button" class="btn btn-danger multipleImageResetBtn w-sm" style="display: none;">Reset</button>
                                                        </div><!--end col-->

                                                    </div>

                                                </div>
                                            </div>
                                            <!-- end card -->

                                        </div>
                                        <!-- end col -->

                                    </div>


                                    <div class="text-end mb-3">
                                        <button type="submit" class="btn btn-success w-sm">Update Package</button>
                                    </div>
                                </div>
                                <!-- end col -->


                            </div>
                            <!-- end row -->

                        </form>

                    @endforeach


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
                                    <h4 class="card-title mb-0 flex-grow-1">Included/Excluded Service</h4>
                                </div><!-- end card header -->

                                <div class="card-body">

                                    <div class="row mb-3">

                                        <div class="col-md-6">

                                            @foreach ($tourPackageIncludedServiceData as $includedServiceData)

                                                <form method="POST" action="{{ route('incServiceUpdate') }}" enctype="multipart/form-data" id="incServiceForm-{{$includedServiceData->id}}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$includedServiceData->id}}">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="mb-3">
                                                                <label for="INCLUDED_SERVICE" class="form-label">Included Service<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="INCLUDED_SERVICE-{{$includedServiceData->id}}" value="{{$includedServiceData->INCLUDED_SERVICE}}" name="INCLUDED_SERVICE">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4"></div>
                                                    </div>
                                                    <div class="text-start mb-3">
                                                        <button type="submit" class="btn btn-soft-secondary w-sm edit-included-item" data-id="{{$includedServiceData->id}}"><i class="ri-pencil-fill me-1 align-bottom"></i> Update</button>
                                                        <a href="javascript:void()" class="btn btn-soft-danger w-sm delete-included-item" data-id="{{$includedServiceData->id}}" onclick="return confirm('Are you sure you want to delete this?');"><i class="ri-delete-bin-fill me-1 align-bottom"></i> Delete</a>
                                                    </div>
                                                </form>

                                            @endforeach

                                        </div><!--end col-->

                                        <div class="col-md-6">

                                            @foreach ($tourPackageExcludedServiceData as $excludedServiceData)

                                                <form method="POST" action="{{ route('excServiceUpdate') }}" id="excServiceForm-{{$excludedServiceData->id}}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$excludedServiceData->id}}">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="mb-3">
                                                                <label for="EXCLUDED_SERVICE" class="form-label">Excluded Service<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="EXCLUDED_SERVICE-{{$excludedServiceData->id}}" value="{{$excludedServiceData->EXCLUDED_SERVICE}}" name="EXCLUDED_SERVICE">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4"></div>
                                                    </div>
                                                    <div class="text-start mb-3">
                                                        <button type="submit" class="btn btn-soft-secondary w-sm"><i class="ri-pencil-fill me-1 align-bottom"></i> Update</button>
                                                        <a href="javascript:void()" class="btn btn-soft-danger w-sm delete-excluded-item" data-id="{{$excludedServiceData->id}}" onclick="return confirm('Are you sure you want to delete this?');"><i class="ri-delete-bin-fill me-1 align-bottom"></i> Delete</a>
                                                    </div>

                                                </form>

                                            @endforeach

                                        </div><!--end col-->

                                    </div>

                                </div>
                            </div>


                            <div class="card">

                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Tour Package Information</h4>
                                </div><!-- end card header -->

                                <div class="card-body">

                                    @foreach ($tourPackageInfoData as $tourPackageInfo)

                                        <form method="POST" action="{{ route('tourPackagePlanUpdate') }}" id="tourPlanForm-{{$tourPackageInfo->id}}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$tourPackageInfo->id}}">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="TOUR_PLAN_TITLE_TEXT" class="form-label">Tour Plan Title Text<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="TOUR_PLAN_TITLE_TEXT" value="{{$tourPackageInfo->TOUR_PLAN_TITLE_TEXT}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="TOUR_PLAN_TITLE_BODY" class="form-label">Tour Plan Title Body<span class="text-danger">*</span></label>
                                                        <textarea class="form-control" name="TOUR_PLAN_TITLE_BODY" rows="3">{{$tourPackageInfo->TOUR_PLAN_TITLE_BODY}}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-start mb-5">
                                                <button type="submit" class="btn btn-soft-secondary w-sm"><i class="ri-pencil-fill me-1 align-bottom"></i> Update</button>
                                                <a href="javascript:void()" data-id="{{$tourPackageInfo->id}}" class="btn btn-soft-danger w-sm delete-packageinfo-item" onclick="return confirm('Are you sure you want to delete this?');"><i class="ri-delete-bin-fill me-1 align-bottom"></i> Delete</a>
                                            </div>

                                        </form>

                                    @endforeach

                                </div>
                            </div>


                        </div>
                        <!-- end col -->


                    </div>
                    <!-- end row -->

                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        @include('admin.tours.ajax.single-image')
        @include('admin.tours.ajax.multiple-image')
        @include('admin.tours.ajax.included-service')
        @include('admin.tours.ajax.excluded-service')
        @include('admin.tours.ajax.tour-plan')


    @endsection
