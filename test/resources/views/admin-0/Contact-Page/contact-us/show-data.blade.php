@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Update Contact Page</h4>
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
                    
                    <form method="POST" action="{{ route('contact.page.section.update', 'contact-page') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col-lg-12">

                                @foreach($contactPageData as $data)

                                    <div class="card">
                                        <div class="card-body">

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="FORM_TITLE" class="form-label">Form Title</label>
                                                        <input type="text" class="form-control @error('FORM_TITLE') is-invalid @enderror" value="{{ $data->FORM_TITLE }}" name="FORM_TITLE">
                                                        @if ($errors->has('FORM_TITLE'))
                                                            <span class="text-danger">{{ $errors->first('FORM_TITLE') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="MAP_LINK" class="form-label">Map Link</label>
                                                        <p class="text-muted mb-2">
                                                            Go at https://www.google.com/maps/ and search your location. Then go to the share option and select <b>"Embed a map"</b>.
                                                            There will be a iframe like &lt;iframe src="<b style="color:red">some link</b>"&gt;&lt;/iframe&gt;. Copy that link from src="" and paste it here
                                                        </p>
                                                        <textarea class="form-control" name="MAP_LINK" rows="3">{{ $data->MAP_LINK }}</textarea>
                                                        @if ($errors->has('MAP_LINK'))
                                                            <span class="text-danger">{{ $errors->first('MAP_LINK') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="NAME_1" class="form-label">Widget Name</label>
                                                        <input type="text" class="form-control @error('NAME_1') is-invalid @enderror" value="{{ $data->NAME_1 }}" name="NAME_1">
                                                        @if ($errors->has('NAME_1'))
                                                            <span class="text-danger">{{ $errors->first('NAME_1') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                                

                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="DESCRIPTION_1" class="form-label">Description</label>
                                                        <input type="text" class="form-control @error('DESCRIPTION_1') is-invalid @enderror" value="{{ $data->DESCRIPTION_1 }}" name="DESCRIPTION_1">
                                                        @if ($errors->has('DESCRIPTION_1'))
                                                            <span class="text-danger">{{ $errors->first('DESCRIPTION_1') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>


                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="ICON_1" class="form-label">Icon Class (Font Awesome)</label>
                                                        <input type="text" class="form-control @error('ICON_1') is-invalid @enderror" value="{{ $data->ICON_1 }}" name="ICON_1">
                                                        @if ($errors->has('ICON_1'))
                                                            <span class="text-danger">{{ $errors->first('ICON_1') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="NAME_2" class="form-label">Widget Name</label>
                                                        <input type="text" class="form-control @error('NAME_2') is-invalid @enderror" value="{{ $data->NAME_2 }}" name="NAME_2">
                                                        @if ($errors->has('NAME_2'))
                                                            <span class="text-danger">{{ $errors->first('NAME_2') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                                

                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="DESCRIPTION_2" class="form-label">Description</label>
                                                        <input type="text" class="form-control @error('DESCRIPTION_2') is-invalid @enderror" value="{{ $data->DESCRIPTION_2 }}" name="DESCRIPTION_2">
                                                        @if ($errors->has('DESCRIPTION_2'))
                                                            <span class="text-danger">{{ $errors->first('DESCRIPTION_2') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>


                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="ICON_2" class="form-label">Icon Class (Font Awesome)</label>
                                                        <input type="text" class="form-control @error('ICON_2') is-invalid @enderror" value="{{ $data->ICON_2 }}" name="ICON_2">
                                                        @if ($errors->has('ICON_2'))
                                                            <span class="text-danger">{{ $errors->first('ICON_2') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="NAME_3" class="form-label">Widget Name</label>
                                                        <input type="text" class="form-control @error('NAME_3') is-invalid @enderror" value="{{ $data->NAME_3 }}" name="NAME_3">
                                                        @if ($errors->has('NAME_3'))
                                                            <span class="text-danger">{{ $errors->first('NAME_3') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                                

                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="DESCRIPTION_3" class="form-label">Description</label>
                                                        <input type="text" class="form-control @error('DESCRIPTION_3') is-invalid @enderror" value="{{ $data->DESCRIPTION_3 }}" name="DESCRIPTION_3">
                                                        @if ($errors->has('DESCRIPTION_3'))
                                                            <span class="text-danger">{{ $errors->first('DESCRIPTION_3') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>


                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="ICON_3" class="form-label">Icon Class (Font Awesome)</label>
                                                        <input type="text" class="form-control @error('ICON_3') is-invalid @enderror" value="{{ $data->ICON_3 }}" name="ICON_3">
                                                        @if ($errors->has('ICON_3'))
                                                            <span class="text-danger">{{ $errors->first('ICON_3') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                            </div>


                                            
                                        </div>
                                    </div>
                                    <!-- end card -->


                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Hero Image</h5>
                                        </div>
                                        <div class="card-body">

                                        <div class="row">

                                                <div class="col-md-6 col-sm-12">
                                                    <div>
                                                        <label for="" class="form-label">Hero Image(1920*516)</label>
                                                        <p class="text-muted">Add contact section hero image.</p>
                                                        <input type="file" class="form-control" id="singleFile" name="singleFile" accept="image/png, image/gif, image/jpeg">
                                                        
                                                    </div>
                                                    
                                                    <div class="previewFile"> 

                                                        <a href="">
                                                            <img src="{{ asset($data->FILE_PATH) }}" height="250px" alt="">
                                                        </a>

                                                    </div>
                                                </div><!--end col-->
                                                
                                            </div>

                                        </div>
                                    </div>


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
                    previewFile(this, 'div.previewFile');
                });

                // Single file preview with JavaScript
                var previewFile = function(input, imgPreviewPlaceholder) {
                    if (input.files) {
                        
                        var filesAmount = input.files.length;
                        for (i = 0; i < filesAmount; i++) {
                            var reader = new FileReader();
                            reader.onload = function(event) {
                                var content = $($.parseHTML('<img>')).attr({src:event.target.result,height:"250px"});
                                $(imgPreviewPlaceholder).html(content);
                            }
                            reader.readAsDataURL(input.files[i]);
                        }
                    }
                };  

            });

        </script>

    @endsection