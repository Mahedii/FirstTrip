@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Update Statistics</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                    <li class="breadcrumb-item active">Update Statistics</li>
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
                    
                    <form method="POST" action="{{ route('statistics.update', '1') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col-lg-12">

                                @foreach($statistics as $data)

                                    <div class="card">
                                        <div class="card-body">

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="HEADING" class="form-label">Heading</label>
                                                        <input type="text" class="form-control @error('HEADING') is-invalid @enderror" value="{{ $data->HEADING }}" name="HEADING">
                                                        @if ($errors->has('HEADING'))
                                                            <span class="text-danger">{{ $errors->first('HEADING') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="descriptionInput" class="form-label">Description</label>
                                                        <p class="text-muted mb-2">Add short description for Statistics section</p>
                                                        <textarea class="form-control" name="DESCRIPTION" rows="3">{{ $data->DESCRIPTION }}</textarea>
                                                        @if ($errors->has('DESCRIPTION'))
                                                            <span class="text-danger">{{ $errors->first('DESCRIPTION') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="NAME_1" class="form-label">Statistics Name</label>
                                                        <input type="text" class="form-control @error('NAME_1') is-invalid @enderror" value="{{ $data->NAME_1 }}" name="NAME_1">
                                                        @if ($errors->has('NAME_1'))
                                                            <span class="text-danger">{{ $errors->first('NAME_1') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                                

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="DATA_1" class="form-label">Data Count</label>
                                                        <input type="number" class="form-control @error('DATA_1') is-invalid @enderror" value="{{ $data->DATA_1 }}" name="DATA_1">
                                                        @if ($errors->has('DATA_1'))
                                                            <span class="text-danger">{{ $errors->first('DATA_1') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="NAME_2" class="form-label">Statistics Name</label>
                                                        <input type="text" class="form-control @error('NAME_2') is-invalid @enderror" value="{{ $data->NAME_2 }}" name="NAME_2">
                                                        @if ($errors->has('NAME_2'))
                                                            <span class="text-danger">{{ $errors->first('NAME_2') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                                

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="DATA_2" class="form-label">Data Count</label>
                                                        <input type="number" class="form-control @error('DATA_2') is-invalid @enderror" value="{{ $data->DATA_2 }}" name="DATA_2">
                                                        @if ($errors->has('DATA_2'))
                                                            <span class="text-danger">{{ $errors->first('DATA_2') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="NAME_3" class="form-label">Statistics Name</label>
                                                        <input type="text" class="form-control @error('NAME_3') is-invalid @enderror" value="{{ $data->NAME_3 }}" name="NAME_3">
                                                        @if ($errors->has('NAME_3'))
                                                            <span class="text-danger">{{ $errors->first('NAME_3') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                                

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="DATA_3" class="form-label">Data Count</label>
                                                        <input type="number" class="form-control @error('DATA_3') is-invalid @enderror" value="{{ $data->DATA_3 }}" name="DATA_3">
                                                        @if ($errors->has('DATA_3'))
                                                            <span class="text-danger">{{ $errors->first('DATA_3') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="NAME_4" class="form-label">Statistics Name</label>
                                                        <input type="text" class="form-control @error('NAME_4') is-invalid @enderror" value="{{ $data->NAME_4 }}" name="NAME_4">
                                                        @if ($errors->has('NAME_4'))
                                                            <span class="text-danger">{{ $errors->first('NAME_4') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                                

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="DATA_4" class="form-label">Data Count</label>
                                                        <input type="number" class="form-control @error('DATA_4') is-invalid @enderror" value="{{ $data->DATA_4 }}" name="DATA_4">
                                                        @if ($errors->has('DATA_4'))
                                                            <span class="text-danger">{{ $errors->first('DATA_4') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- end card -->


                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Background Image</h5>
                                        </div>
                                        <div class="card-body">

                                        <div class="row">

                                                <div class="col-md-6 col-sm-12">
                                                    <div>
                                                        <label for="" class="form-label">Background Image(1920*985)</label>
                                                        <p class="text-muted">Add statistics section background image.</p>
                                                        <input type="file" class="form-control" id="singleFile" name="singleFile" accept="image/png, image/gif, image/jpeg">
                                                        
                                                    </div>
                                                    
                                                    <div class="previewFile"> 

                                                        <a href="">
                                                            <img src="{{ asset($data->FILE_PATH) }}" height="150px" width="250px" alt="">
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
                                var content = $($.parseHTML('<img>')).attr({src:event.target.result,width:"250px",height:"150px"});
                                $(imgPreviewPlaceholder).html(content);
                            }
                            reader.readAsDataURL(input.files[i]);
                        }
                    }
                };  

            });

        </script>

    @endsection