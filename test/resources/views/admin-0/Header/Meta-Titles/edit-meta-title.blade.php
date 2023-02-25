@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Edit Meta Title Data</h4>
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
                                <h4 class="card-title mb-0 flex-grow-1">Edit Meta Title Data</h4>
                                
                            </div><!-- end card header -->

                            <div class="card-body">
                                
                                <div class="live-preview">
                                    @foreach($metaTitleData as $data)

                                        <form method="POST" action="{{ route('meta.title.list.update',$data->SLUG) }}" enctype="multipart/form-data">
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


                                                <div class="col-md-12">

                                                    <div class="mb-3">
                                                        <label for="CONTENT" class="form-label">Content</label>
                                                        <textarea class="form-control" name="CONTENT" rows="4">{{ $data->CONTENT }}</textarea>
                                                        @if ($errors->has('CONTENT'))
                                                            <span class="text-danger">{{ $errors->first('CONTENT') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>


                                                
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