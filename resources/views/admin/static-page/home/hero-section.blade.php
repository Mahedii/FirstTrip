@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Hero Section</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                    <li class="breadcrumb-item active">Edit</li>
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

                                <div class="card-body">

                                    <div class="row mb-3">

                                        @foreach ($heroSectionData as $heroSection)

                                            <form method="POST" action="{{ route('incServiceUpdate') }}" enctype="multipart/form-data" id="incServiceForm-{{$heroSection->id}}">
                                                @csrf

                                                <input type="hidden" name="id" value="{{$heroSection->id}}">

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="Thumbnail_Image" class="form-label">Hero Image (1894*694)</label>
                                                        <p class="text-muted">Add hero section slider image.</p>
                                                        <input type="file" class="form-control" id="singleImageFile" name="singleFile[]" >
                                                    </div>

                                                    <div class="preview-image-before-upload mb-3">
                                                        <a href="javascript:void(0)">
                                                            <img src="{{ asset($heroSection->FILE_PATH) }}" height="150px" width="200px" alt="">
                                                        </a>
                                                    </div>

                                                </div><!--end col-->

                                                <div class="col-md-12">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="TITLE" class="form-label">Title<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="TITLE-{{$heroSection->id}}" value="{{$heroSection->TITLE}}" name="TITLE">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="SUBTITLE" class="form-label">Sub Title<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="SUBTITLE-{{$heroSection->id}}" value="{{$heroSection->SUBTITLE}}" name="SUBTITLE">
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div><!--end col-->

                                                <div class="text-start mb-3">
                                                    <button type="submit" class="btn btn-soft-secondary w-sm edit-included-item" data-id="{{$heroSection->id}}"><i class="ri-pencil-fill me-1 align-bottom"></i> Update</button>
                                                    <a href="javascript:void()" class="btn btn-soft-danger w-sm delete-included-item" data-id="{{$heroSection->id}}" onclick="return confirm('Are you sure you want to delete this?');"><i class="ri-delete-bin-fill me-1 align-bottom"></i> Delete</a>
                                                </div>

                                            </form>

                                        @endforeach



                                    </div>

                                </div>
                            </div>

                            <form method="POST" action="{{ route('incServiceUpdate') }}" enctype="multipart/form-data">

                                <input type="hidden" id="hero-section-counter" value="1">

                                @csrf

                                <div id="hero_section_dynamic_field">

                                </div>

                            </form>

                            <div class="text-end mb-3">
                                <button class="btn btn-success w-sm" id="add-hero-section-item">Add Content</button>
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

        @include('admin.static-page.ajax.single-image')
        @include('admin.static-page.ajax.tour-plan')


    @endsection
