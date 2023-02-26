@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Add Addon Services</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                    <li class="breadcrumb-item active">Form Layout</li>
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
                                <div class="d-flex justify-content-sm-end">
                                    <a href="{{ url()->previous() }}" class="btn btn-success">
                                        <i class="ri-arrow-left-line align-bottom me-1"></i>
                                        Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-12">


                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Add Addon Services</h4>
                                
                            </div><!-- end card header -->

                            <div class="card-body">
                                
                                <div class="live-preview">
                                    <form method="POST" action="{{ route('addon.services.insert') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="TITLE" class="form-label">Title</label>
                                                    <input type="text" class="form-control @error('TITLE') is-invalid @enderror" value="{{ old('TITLE') }}" name="TITLE">
                                                    @if ($errors->has('TITLE'))
                                                        <span class="text-danger">{{ $errors->first('TITLE') }}</span>
                                                    @endif
                                                </div>
                                                
                                            </div><!--end col-->



                                            <div class="col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="ICON" class="form-label">Icon Class (Font Awesome)</label>
                                                    <input type="text" class="form-control @error('ICON') is-invalid @enderror" placeholder="Ex: fas fa-star" value="{{ old('ICON') }}" name="ICON">
                                                    @if ($errors->has('ICON'))
                                                        <span class="text-danger">{{ $errors->first('ICON') }}</span>
                                                    @endif
                                                </div>
                                            </div><!--end col-->



                                            <!-- <div class="col-md-6">

                                                <div class="mb-3">
                                                    <label for="DESCRIPTION" class="form-label">Description</label>
                                                    <textarea class="form-control" name="DESCRIPTION" rows="3">{{ old('DESCRIPTION') }}</textarea>
                                                    @if ($errors->has('DESCRIPTION'))
                                                        <span class="text-danger">{{ $errors->first('DESCRIPTION') }}</span>
                                                    @endif
                                                </div>
                                                
                                            </div> -->
                                            
                                            
                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->

                </div><!--end row-->
                

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

                
    @endsection