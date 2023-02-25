@extends('admin.include.master')
    @section('content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Product List</h4>
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

                            @if(session('bgImgCrudMsg'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('bgImgCrudMsg') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            
                            
                            <form method="POST" action="{{ route('product.bg-image.update') }}" enctype="multipart/form-data">

                                @csrf

                                <div class="row">
                                    <div class="col-lg-12">

                                        
                                        <div class="card">
                                            <div class="card-body">


                                                <div class="col-md-6 col-sm-12">
                                                    <div>
                                                        <label for="" class="form-label">Background Image(1920*516)</label>
                                                        <p class="text-muted">Add Hero section background image.</p>
                                                        <input type="file" class="form-control" id="singleFile" name="singleFile" accept="image/jpg">
                                                        @if ($errors->has('singleFile'))
                                                            <span class="text-danger">{{ $errors->first('singleFile') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="previewFile"> 
                                                        <img src="{!! asset('frontend/assets/img/products/Background-image/bg-img.jpg') !!}" alt="Background Image" width="100%" height="250px">
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

                            

                        </div>



                        <div class="row">
                            <div class="col-lg-12">

                                @if(session('crudMsg'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('crudMsg') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <div class="card">

                                    <div class="card-header border-0">
                                        <div class="row g-4">
                                            
                                            <div class="col-sm">
                                                <div class="d-flex justify-content-sm-end">
                                                    <a href="{{ route('product.add.page') }}" class="btn btn-success" id="addproduct-btn">
                                                        <i class="ri-add-line align-bottom me-1"></i>
                                                        Add Product
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Product Lists</h5>
                                    </div>
                                    
                                    <div class="card-body">
                                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Category Name</th>
                                                    <th>SubCategory Name</th>
                                                    <th>Image</th>
                                                    <th>Create Time</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                               
                                                @foreach($product as $key => $p)

                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $p->PRODUCT_NAME }}</td>
                                                        <td>{{ $p->CATEGORY_NAME }}</td>
                                                        <td>{{ $p->SUBCATEGORY_NAME }}</td>
                                                        <td><img src="{{ asset($p->FILE_PATH) }}" alt="{{ $p->PRODUCT_NAME }}" height="150px"></td>
                                                        <td>{{ Carbon\Carbon::parse($p->created_at)->diffForHumans() }}</td>
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
                                                                        <a href="{{ route('product.edit',$p->SLUG) }}" class="dropdown-item edit-item-btn">
                                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                            Edit
                                                                        </a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="{{ route('product.delete',$p->SLUG) }}" class="dropdown-item edit-item-btn">
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