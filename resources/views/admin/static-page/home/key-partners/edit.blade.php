@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Key Partners</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                    <li class="breadcrumb-item active">Key Partners</li>
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



                    <form method="POST" action="{{ route('airlinePartners.update') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">

                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Edit Key Partners Info</h4>

                                    </div><!-- end card header -->

                                    <div class="card-body">

                                        <div class="row">

                                            @foreach ($keyPartnerData as $keyPartner)

                                                <input type="hidden" name="SLUG" value="{{ $keyPartner->SLUG }}">

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="NAME" class="form-label">Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control @error('NAME') is-invalid @enderror" value="{{ $keyPartner->NAME }}" name="NAME">
                                                        @if ($errors->has('NAME'))
                                                            <span class="text-danger">{{ $errors->first('NAME') }}</span>
                                                        @endif
                                                    </div>

                                                </div><!--end col-->


                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="Thumbnail_Image" class="form-label">Logo (120*100)</label>
                                                        <input type="file" class="form-control" id="singleImageFile" name="singleFile" >
                                                    </div>

                                                    <div class="preview-image-before-upload mb-3">
                                                        <a href="javascript:void(0)">
                                                            <img src="{{ asset($keyPartner->FILE_PATH) }}" height="100px" width="120px" alt="">
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
