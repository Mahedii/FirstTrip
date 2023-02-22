@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Edit Social Media Data</h4>
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
                                <h4 class="card-title mb-0 flex-grow-1">Edit Social Media Data</h4>
                                
                            </div><!-- end card header -->

                            <div class="card-body">
                                
                                <div class="live-preview">
                                    @foreach($socialMediaData as $data)

                                        <form method="POST" action="{{ route('social.media.list.update',$data->SLUG) }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                                

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="NAME" class="form-label">Name</label>
                                                        <input type="text" class="form-control @error('NAME') is-invalid @enderror" value="{{ $data->NAME }}" name="NAME">
                                                        @if ($errors->has('NAME'))
                                                            <span class="text-danger">{{ $errors->first('NAME') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div><!--end col-->


                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ICON_CLASS" class="form-label">Icon Class (Font Awesome)</label>
                                                        <input type="text" class="form-control @error('ICON_CLASS') is-invalid @enderror" value="{{ $data->ICON_CLASS }}" name="ICON_CLASS">
                                                        @if ($errors->has('ICON_CLASS'))
                                                            <span class="text-danger">{{ $errors->first('ICON_CLASS') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div><!--end col-->


                                                <div class="col-md-6">

                                                    <div class="mb-3">
                                                        <label for="URL" class="form-label">URL</label>
                                                        <input type="text" class="form-control @error('URL') is-invalid @enderror" value="{{ $data->URL }}" name="URL" placeholder="Ex: https://www.google.com">
                                                        @if ($errors->has('URL'))
                                                            <span class="text-danger">{{ $errors->first('URL') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div><!--end col-->

                                                
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div><!--end col-->

                                            </div><!--end row-->

                                        </form>

                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->

                </div><!--end row-->
                

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

                
    @endsection