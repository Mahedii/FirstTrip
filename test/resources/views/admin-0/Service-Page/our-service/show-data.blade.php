@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Update Service Page Data</h4>
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

                    @foreach($servicePageData as $data)
                    
                        <form method="POST" action="{{ route('service.page.section.update', $data->SLUG) }}" enctype="multipart/form-data">

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
                                                    <label for="descriptionInput" class="form-label">Short Description</label>
                                                    <p class="text-muted mb-2">Add short description for our service section</p>
                                                    <textarea id="ckeditor-classic" class="form-control" name="DESCRIPTION" rows="3">{{ $data->DESCRIPTION }}</textarea>
                                                    @if ($errors->has('DESCRIPTION'))
                                                        <span class="text-danger">{{ $errors->first('DESCRIPTION') }}</span>
                                                    @endif
                                                </div>
                                                
                                            </div><!--end col-->



                                            <div class="col-md-6 col-sm-12">
                                                <div>
                                                    <label for="" class="form-label">Background Image(1920*516)</label>
                                                    <p class="text-muted">Add Hero section background image.</p>
                                                    <input type="file" class="form-control" id="singleFile" name="singleFile" accept="image/png, image/gif, image/jpeg">
                                                    @if ($errors->has('singleFile'))
                                                        <span class="text-danger">{{ $errors->first('singleFile') }}</span>
                                                    @endif
                                                </div>
                                                
                                                <div class="previewFile"> 
                                                    <img src="{{ asset($data->FILE_PATH) }}" alt="$data->TITLE" width="100%" height="250px">
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



                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">

                            <div class="card-header border-0">
                                <div class="row g-4">
                                    
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <a href="{{ route('service.page.tab.addPage') }}" class="btn btn-success">
                                                <i class="ri-add-line align-bottom me-1"></i>
                                                Add Service Lists
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-header">
                                <h5 class="card-title mb-0">Service Lists</h5>
                            </div>
                            
                            <div class="card-body">
                                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($servicePageDataList as $key => $data)

                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $data->TITLE }}</td>
                                                <td>
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>

                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <!-- <li>
                                                                <a href="#!" class="dropdown-item">
                                                                    <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                    View
                                                                </a>
                                                            </li> -->

                                                            <li>
                                                                <a href="{{ route('service.page.tab.editpage.load',$data->SLUG) }}" class="dropdown-item edit-item-btn">
                                                                    <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    Edit
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="{{ route('service.page.tab.delete',$data->SLUG) }}" class="dropdown-item edit-item-btn">
                                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                    Delete
                                                                </a>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach
                                       

                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
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
                                var content = $($.parseHTML('<img>')).attr({src:event.target.result,height:"400px"});
                                $(imgPreviewPlaceholder).html(content);
                            }
                            reader.readAsDataURL(input.files[i]);
                        }
                    }
                };  

            });

        </script>

    @endsection