@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Update Hero Section</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                    <li class="breadcrumb-item active">Update Hero Section</li>
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
                    
                    <form method="POST" action="{{ route('hero.section.update', '1') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col-lg-12">

                                @foreach($heroSection as $data)

                                    <div class="card">
                                        <div class="card-body">

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="headingInput" class="form-label">Heading</label>
                                                    <input type="text" class="form-control @error('headingInput') is-invalid @enderror" value="{{ $data->HEADING }}" name="HEADING">
                                                    @if ($errors->has('HEADING'))
                                                        <span class="text-danger">{{ $errors->first('HEADING') }}</span>
                                                    @endif
                                                </div>
                                                
                                            </div><!--end col-->


                                            


                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="descriptionInput" class="form-label">Description</label>
                                                    <p class="text-muted mb-2">Add short description for hero section</p>
                                                    <textarea class="form-control" name="DESCRIPTION" rows="3">{{ $data->DESCRIPTION }}</textarea>
                                                    @if ($errors->has('DESCRIPTION'))
                                                        <span class="text-danger">{{ $errors->first('DESCRIPTION') }}</span>
                                                    @endif
                                                </div>
                                                
                                            </div><!--end col-->
                                            
                                        </div>
                                    </div>
                                    <!-- end card -->


                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Video</h5>
                                        </div>
                                        <div class="card-body">

                                        <div class="row">

                                                <div class="col-md-6 col-sm-12">
                                                    <div>
                                                        <label for="" class="form-label">Background Video</label>
                                                        <p class="text-muted">Add hero section background video.</p>
                                                        <input type="file" class="form-control" id="singleFile" name="singleFile" accept="video/*">
                                                        
                                                    </div>
                                                    
                                                    <div class="previewVideoFile"> 

                                                        <a href="">
                                                            <video src="{{ asset($data->FILE_PATH) }}" height="250px" autoplay="true" muted="" loop="true" type="video/mp4"></video>
                                                        </a>

                                                    </div>
                                                </div><!--end col-->
                                                
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end card -->

                                @endforeach
                                

                                <div class="text-end mb-3">
                                    <button type="submit" class="btn btn-success w-sm">Update</button>
                                </div>
                            </div>
                            <!-- end col -->


                        </div>
                        <!-- end row -->

                    </form>

                </div>


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <script type="text/javascript">

            $(document).ready(function () {

                $('#singleFile').on('change', function() {
                    previewFile(this, 'div.previewVideoFile');
                });

                // Single file preview with JavaScript
                var previewFile = function(input, imgPreviewPlaceholder) {
                    if (input.files) {
                        
                        var filesAmount = input.files.length;
                        for (i = 0; i < filesAmount; i++) {
                            var reader = new FileReader();
                            reader.onload = function(event) {
                                $('.previewVideoFile a video').attr('src', event.target.result);
                                $(".previewVideoFile a video")[0].load();
                            }
                            reader.readAsDataURL(input.files[i]);
                        }
                    }
                };  

            });

        </script>

    @endsection