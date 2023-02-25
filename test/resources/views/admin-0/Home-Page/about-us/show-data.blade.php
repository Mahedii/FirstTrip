@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Update About Us Section</h4>
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

                    @foreach($aboutUs as $data)
                    
                        <form method="POST" action="{{ route('about.us.section.update', $data->SLUG) }}" enctype="multipart/form-data">

                            @csrf

                            <div class="row">
                                <div class="col-lg-12">

                                    

                                    <div class="card">
                                        <div class="card-body">

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="TITLE" class="form-label">Title</label>
                                                    <input type="text" class="form-control @error('TITLE') is-invalid @enderror" value="{{ $data->TITLE }}" name="TITLE">
                                                    @if ($errors->has('TITLE'))
                                                        <span class="text-danger">{{ $errors->first('TITLE') }}</span>
                                                    @endif
                                                </div>
                                                
                                            </div><!--end col-->


                                            


                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="descriptionInput" class="form-label">Description</label>
                                                    <p class="text-muted mb-2">Add short description for about us section</p>
                                                    <textarea id="ckeditor-classic" class="form-control" name="DESCRIPTION" rows="3">{{ $data->DESCRIPTION }}</textarea>
                                                    @if ($errors->has('DESCRIPTION'))
                                                        <span class="text-danger">{{ $errors->first('DESCRIPTION') }}</span>
                                                    @endif
                                                </div>
                                                
                                            </div><!--end col-->

                                            

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="BUTTON_TEXT" class="form-label">Button Text</label>
                                                    <input type="text" class="form-control @error('BUTTON_TEXT') is-invalid @enderror" value="{{ $data->BUTTON_TEXT }}" name="BUTTON_TEXT">
                                                    @if ($errors->has('BUTTON_TEXT'))
                                                        <span class="text-danger">{{ $errors->first('BUTTON_TEXT') }}</span>
                                                    @endif
                                                </div>
                                                
                                            </div><!--end col-->


                                            <div class="col-md-6 col-sm-12">
                                                <div>
                                                    <label for="" class="form-label">Image(1104*1280)</label>
                                                    <p class="text-muted">Add statistics section background image.</p>
                                                    <input type="file" class="form-control" id="singleFile" name="singleFile" accept="image/png, image/gif, image/jpeg">
                                                    @if ($errors->has('singleFile'))
                                                        <span class="text-danger">{{ $errors->first('singleFile') }}</span>
                                                    @endif
                                                </div>
                                                
                                                <div class="previewFile"> 
                                                    <img src="{{ asset($data->FILE_PATH) }}" alt="$data->TITLE" height="500px">
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

        <script type="text/javascript">

            $(document).ready(function () {

                $('#singleFile').on('change', function() {
                    previewFile(this, 'div.previewFile');
                });

                // Single file preview with JavaScript
                var previewFile = function(input, imgPreviewPlaceholder) {
                    if (input.files) {
                        
                        var filesAmount = input.files.length;
                        for (i = 0; i < filesAmount; i++) {
                            var reader = new FileReader();
                            reader.onload = function(event) {
                                var content = $($.parseHTML('<img>')).attr({src:event.target.result,width:"400px",height:"400px"});
                                $(imgPreviewPlaceholder).html(content);
                            }
                            reader.readAsDataURL(input.files[i]);
                        }
                    }
                };  

            });

        </script>

    @endsection