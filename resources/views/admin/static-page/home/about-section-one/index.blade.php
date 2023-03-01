@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">About Section 01</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                    <li class="breadcrumb-item active">About Section 01</li>
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



                    <form method="POST" action="{{ route('aboutSectionOne.update') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">

                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Edit About Section 01 Info</h4>

                                    </div><!-- end card header -->

                                    <div class="card-body">

                                        <div class="row">

                                            @foreach ($aboutSectionOneData as $aboutSectionOne)

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="TITLE" class="form-label">Title<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control @error('TITLE') is-invalid @enderror" value="{{ $aboutSectionOne->TITLE }}" name="TITLE">
                                                        @if ($errors->has('TITLE'))
                                                            <span class="text-danger">{{ $errors->first('TITLE') }}</span>
                                                        @endif
                                                    </div>

                                                </div><!--end col-->

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="SUBTITLE" class="form-label">Sub Title <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control @error('SUBTITLE') is-invalid @enderror" value="{{ $aboutSectionOne->SUBTITLE }}" name="SUBTITLE">
                                                        @if ($errors->has('SUBTITLE'))
                                                            <span class="text-danger">{{ $errors->first('SUBTITLE') }}</span>
                                                        @endif
                                                    </div>

                                                </div><!--end col-->


                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="TITLE_BODY" class="form-label">Body Text<span class="text-danger">*</span></label>
                                                        <textarea class="form-control" name="TITLE_BODY" id="ckeditor-classic" rows="3">{{$aboutSectionOne->TITLE_BODY}}</textarea>
                                                        @if ($errors->has('TITLE_BODY'))
                                                            <span class="text-danger">{{ $errors->first('TITLE_BODY') }}</span>
                                                        @endif
                                                    </div>
                                                </div><!--end col-->


                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="Thumbnail_Image" class="form-label">Image (600*557)</label>
                                                        <input type="file" class="form-control" id="singleImageFile" name="singleFile">
                                                    </div>

                                                    <div class="preview-image-before-upload mb-3">
                                                        <a href="javascript:void(0)">
                                                            <img src="{{ asset($aboutSectionOne->FILE_PATH) }}" height="150px" width="200px" alt="">
                                                        </a>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="DISCOUNT" class="form-label">Discount Amount<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control @error('DISCOUNT') is-invalid @enderror" value="{{ $aboutSectionOne->DISCOUNT }}" name="DISCOUNT" placeholder="Ex: 20%">
                                                        @if ($errors->has('DISCOUNT'))
                                                            <span class="text-danger">{{ $errors->first('DISCOUNT') }}</span>
                                                        @endif
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
