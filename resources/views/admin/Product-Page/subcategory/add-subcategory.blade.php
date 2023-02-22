@extends('admin.include.master')
    @section('content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Add SubCategory</h4>
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
                                            <a href="{{ url()->previous() }}" class="btn btn-success" id="addproduct-btn">
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
                                        <h4 class="card-title mb-0 flex-grow-1">Add SubCategory</h4>
                                        
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        
                                        <div class="live-preview">
                                            <form method="POST" action="{{ route('subcategory.insert') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="subcategoryNameInput" class="form-label">SubCategory Name</label>
                                                            <input type="text" class="form-control @error('subcategoryNameInput') is-invalid @enderror" placeholder="Category name" value="{{ old('subcategoryNameInput') }}" name="subcategoryNameInput">
                                                            @if ($errors->has('subcategoryNameInput'))
                                                                <span class="text-danger">{{ $errors->first('subcategoryNameInput') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->


                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="categoryNameInput" class="form-label">Category Name</label>
                                                            
                                                            <select class="form-select mb-3" aria-label="Default select example" name="categoryNameInput">
                                                                <option>Select Category</option>

                                                                @foreach($productCategory as $pc)
                                                                    <option @if(old('categoryNameInput') == $pc->CATEGORY_ID) selected @endif value="{{ $pc->CATEGORY_ID }}">{{ $pc->CATEGORY_NAME }}</option>
                                                                @endforeach

                                                            </select>

                                                            @if ($errors->has('categoryNameInput'))
                                                                <span class="text-danger">{{ $errors->first('categoryNameInput') }}</span>
                                                            @endif
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

                
            @include('admin.Product-Page.ajax.subcategoryAjax');

    @endsection