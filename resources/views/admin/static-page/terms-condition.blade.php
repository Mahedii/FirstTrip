@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Static Page</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Terms & Condition</a></li>
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

                    <form method="POST" action="{{ route('terms-condition.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">

                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Edit Terms & Condition</h4>

                                    </div><!-- end card header -->

                                    <div class="card-body">

                                        <div class="row">

                                            @foreach($pageData as $page)

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="TERMS_CONDITION_PAGE" class="form-label">Page Contents <span class="text-danger">*</span></label>
                                                        <p class="text-muted mb-2">Edit page contents</p>
                                                        <textarea class="form-control" id="ckeditor-classic" name="TERMS_CONDITION_PAGE" rows="5">{{ $page->TERMS_CONDITION_PAGE }}</textarea>
                                                        @if ($errors->has('TERMS_CONDITION_PAGE'))
                                                            <span class="text-danger">{{ $errors->first('TERMS_CONDITION_PAGE') }}</span>
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


    @endsection
