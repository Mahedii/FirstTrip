@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Update Footer Section Data</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                    <li class="breadcrumb-item active">Update</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->



                <div class="row">

                    @if(session('crudMsg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('crudMsg') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @foreach($footerSection as $data)
                    
                        <form method="POST" action="{{ route('footer.section.update', $data->SLUG) }}" enctype="multipart/form-data">

                            @csrf

                            <div class="row">
                                <div class="col-lg-12">

                                    

                                    <div class="card">
                                        <div class="card-body">


                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="DESCRIPTION" class="form-label">Short Description</label>
                                                    <p class="text-muted mb-2">Add short description for footer section</p>
                                                    <textarea id="ckeditor-classic" class="form-control" name="DESCRIPTION" rows="3">{{ $data->DESCRIPTION }}</textarea>
                                                    @if ($errors->has('DESCRIPTION'))
                                                        <span class="text-danger">{{ $errors->first('DESCRIPTION') }}</span>
                                                    @endif
                                                </div>
                                                
                                            </div><!--end col-->


                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="COPYRIGHT_TEXT" class="form-label">Copyright Text</label>
                                                    <input type="text" class="form-control @error('COPYRIGHT_TEXT') is-invalid @enderror" value="{{ $data->COPYRIGHT_TEXT }}" name="COPYRIGHT_TEXT">
                                                    @if ($errors->has('TITLE'))
                                                        <span class="text-danger">{{ $errors->first('COPYRIGHT_TEXT') }}</span>
                                                    @endif
                                                </div>
                                                
                                            </div><!--end col-->


                                            
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

                    @endforeach

                </div>


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    @endsection