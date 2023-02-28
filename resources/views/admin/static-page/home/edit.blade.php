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
                                    <li class="breadcrumb-item active">Hero Section</li>
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



                    <form method="POST" action="{{ route('heroSection.update') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">

                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Edit Hero Section Info</h4>

                                    </div><!-- end card header -->

                                    <div class="card-body">

                                        <div class="row">

                                            @foreach ($heroSectionData as $heroSection)

                                                <input type="hidden" name="SLUG" value="{{ $heroSection->SLUG }}">

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="TITLE" class="form-label">Title<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control @error('TITLE') is-invalid @enderror" value="{{ $heroSection->TITLE }}" name="TITLE">
                                                        @if ($errors->has('TITLE'))
                                                            <span class="text-danger">{{ $errors->first('TITLE') }}</span>
                                                        @endif
                                                    </div>

                                                </div><!--end col-->

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="SUBTITLE" class="form-label">Sub Title <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control @error('SUBTITLE') is-invalid @enderror" value="{{ $heroSection->SUBTITLE }}" name="SUBTITLE">
                                                        @if ($errors->has('SUBTITLE'))
                                                            <span class="text-danger">{{ $errors->first('SUBTITLE') }}</span>
                                                        @endif
                                                    </div>

                                                </div><!--end col-->


                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="Thumbnail_Image" class="form-label">Slider Image (1894*694)</label>
                                                        <p class="text-muted">Add hero slider image.</p>
                                                        <input type="file" class="form-control" id="singleImageFile" name="singleFile" >
                                                    </div>

                                                    <div class="preview-image-before-upload mb-3">
                                                        <a href="javascript:void(0)">
                                                            <img src="{{ asset($heroSection->FILE_PATH) }}" height="150px" width="200px" alt="">
                                                        </a>
                                                    </div>
                                                </div><!--end col-->

                                            @endforeach


                                        </div>


                                    </div>
                                </div>
                                <!-- end card -->


                                <div class="text-end mb-3">
                                    <button type="submit" class="btn btn-success w-sm">Update</button>
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



    @endsection
