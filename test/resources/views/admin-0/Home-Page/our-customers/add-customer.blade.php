@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Add Customer</h4>
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
                                <h4 class="card-title mb-0 flex-grow-1">Add Customer</h4>
                                
                            </div><!-- end card header -->

                            <div class="card-body">
                                
                                <div class="live-preview">
                                    <form method="POST" action="{{ route('customer.insert') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="customerNameInput" class="form-label">Customer Name</label>
                                                    <input type="text" class="form-control @error('customerNameInput') is-invalid @enderror" placeholder="Customer name" value="{{ old('customerNameInput') }}" name="customerNameInput">
                                                    @if ($errors->has('customerNameInput'))
                                                        <span class="text-danger">{{ $errors->first('customerNameInput') }}</span>
                                                    @endif
                                                </div>
                                                
                                            </div><!--end col-->

                                            

                                            

                                            <div class="col-md-6 col-sm-12">
                                                <div>
                                                    <label for="" class="form-label">Image(125*40)</label>
                                                    <p class="text-muted">Add statistics section background image.</p>
                                                    <input type="file" class="form-control" id="singleFile" name="singleFile" accept="image/png, image/gif, image/jpeg">
                                                    @if ($errors->has('singleFile'))
                                                        <span class="text-danger">{{ $errors->first('singleFile') }}</span>
                                                    @endif
                                                </div>
                                                
                                                <div class="previewFile"> 

                                                </div>
                                            </div><!--end col-->
                                            
                                            
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
                                var content = $($.parseHTML('<img>')).attr({src:event.target.result,width:"125px",height:"40px"});
                                $(imgPreviewPlaceholder).html(content);
                            }
                            reader.readAsDataURL(input.files[i]);
                        }
                    }
                };  

            });

        </script>

                
    @endsection