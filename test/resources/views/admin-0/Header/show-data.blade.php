@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Header Information</h4>
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

                    @foreach($headerSection as $data)
                    
                        <form method="POST" action="{{ route('header.section.update', $data->SLUG) }}" enctype="multipart/form-data">

                            @csrf

                            <div class="row">
                                <div class="col-lg-12">

                                    

                                    <div class="card">
                                        <div class="card-body">

                                            <div class="row">

                                                <div class="col-md-6 col-sm-6">
                                                    <div>
                                                        <label for="" class="form-label">Logo(151*52)</label>
                                                        
                                                        <input type="file" class="form-control" id="logoFile" name="logoFile" accept="image/png">
                                                        @if ($errors->has('logoFile'))
                                                            <span class="text-danger">{{ $errors->first('logoFile') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="previewLogo"> 
                                                        <img src="{{ asset($data->LOGO_PATH) }}" alt="Logo" height="50px" >
                                                    </div>
                                                </div><!--end col-->


                                                <div class="col-md-6 col-sm-6">
                                                    <div>
                                                        <label for="" class="form-label">Favicon(16*16)</label>
                                                        
                                                        <input type="file" class="form-control" id="favIconFile" name="favIconFile" accept="image/png">
                                                        @if ($errors->has('favIconFile'))
                                                            <span class="text-danger">{{ $errors->first('favIconFile') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="previewFavIcon"> 
                                                        <img src="{{ asset($data->FAVICON_PATH) }}" alt="FavIcon" height="32px" >
                                                    </div>
                                                </div><!--end col-->

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

                    @endforeach

                </div>



            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <script type="text/javascript">

            $(document).ready(function () {

                $('#logoFile').on('change', function() {
                    previewLogo(this, 'div.previewLogo');
                });

                // Single file preview with JavaScript
                var previewLogo = function(input, imgPreviewPlaceholder) {
                    if (input.files) {
                        
                        var filesAmount = input.files.length;
                        for (i = 0; i < filesAmount; i++) {
                            var reader = new FileReader();
                            reader.onload = function(event) {
                                var content = $($.parseHTML('<img>')).attr({src:event.target.result,height:"50px"});
                                $(imgPreviewPlaceholder).html(content);
                            }
                            reader.readAsDataURL(input.files[i]);
                        }
                    }
                };  


                $('#favIconFile').on('change', function() {
                    previewFavIcon(this, 'div.previewFavIcon');
                });

                // Single file preview with JavaScript
                var previewFavIcon = function(input, imgPreviewPlaceholder) {
                    if (input.files) {
                        
                        var filesAmount = input.files.length;
                        for (i = 0; i < filesAmount; i++) {
                            var reader = new FileReader();
                            reader.onload = function(event) {
                                var content = $($.parseHTML('<img>')).attr({src:event.target.result,height:"32px"});
                                $(imgPreviewPlaceholder).html(content);
                            }
                            reader.readAsDataURL(input.files[i]);
                        }
                    }
                };  

            });

        </script>

    @endsection