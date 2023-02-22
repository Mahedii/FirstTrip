@extends('admin.include.master')
    @section('content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Add Product</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">Add Product</li>
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
                                            <a href="{{ url()->previous() }}" class="btn btn-success" id="addproduct-btn">
                                                <i class="ri-arrow-left-line align-bottom me-1"></i>
                                                Back
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('product.insert') }}" enctype="multipart/form-data">

                                @csrf

                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="card">
                                            <div class="card-body">

                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="productNameInput" class="form-label">Product Name</label>
                                                        <input type="text" class="form-control @error('productNameInput') is-invalid @enderror" placeholder="Product name" value="{{ old('productNameInput') }}" name="productNameInput">
                                                        @if ($errors->has('productNameInput'))
                                                            <span class="text-danger">{{ $errors->first('productNameInput') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div><!--end col-->

                                                
                                            </div>
                                        </div>
                                        <!-- end card -->


                                        <div class="card">
                                            <div class="card-body">

                                                <div class="row">


                                                    <div class="col-md-6">
                                                        <div>
                                                            <label for="" class="form-label">Category Name</label>
                                                            
                                                            <select class="form-select mb-3" id="select-category" name="categoryNameInput">
                                                                
                                                                <option>Select Category</option>

                                                                @foreach($productCategory as $spc)
                                                                    <option @if(old('categoryNameInput') == $spc->CATEGORY_ID) selected @endif value="{{ $spc->CATEGORY_ID }}">{{ $spc->CATEGORY_NAME }}</option>
                                                                @endforeach

                                                            </select>
                                                            @if ($errors->has('categoryNameInput'))
                                                                <span class="text-danger">{{ $errors->first('categoryNameInput') }}</span>
                                                            @endif
                                                        </div>
                                                    </div><!--end col-->


                                                    <div class="col-md-6">
                                                        <div>
                                                            <label for="" class="form-label">SubCategory Name</label>
                                                            
                                                            <select class="form-select mb-3" id="select-subcategory" data-placeholder="Choose One" name="subcategoryNameInput">
                                                                

                                                            </select>
                                                            @if ($errors->has('subcategoryNameInput'))
                                                                <span class="text-danger">{{ $errors->first('subcategoryNameInput') }}</span>
                                                            @endif
                                                        </div>
                                                    </div><!--end col-->

                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- end card -->

                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Product Gallery</h5>
                                            </div>
                                            <div class="card-body">

                                            <div class="row">

                                                    <div class="col-md-6 col-sm-12">
                                                        <div>
                                                            <label for="" class="form-label">Product Image</label>
                                                            <p class="text-muted">Add Product main Image.</p>
                                                            <input type="file" class="form-control" id="singleImageFile" name="singleFile" accept="image/png, image/gif, image/jpeg">
                                                            
                                                        </div>
                                                        <div class="preview-image-before-upload"> </div>
                                                    </div><!--end col-->


                                                    
                                                </div>


                                            </div>
                                        </div>
                                        <!-- end card -->



                                        <div class="text-end mb-3">
                                            <button type="submit" class="btn btn-success w-sm">Submit</button>
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


                
        @include('admin.Product-Page.ajax.productAjax');

    @endsection