@extends('admin.include.master')
    @section('content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">SubCategory Lists</h4>
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
                                                    <a href="{{ route('product.subcategory.add') }}" class="btn btn-success" id="addproduct-btn">
                                                        <i class="ri-add-line align-bottom me-1"></i>
                                                        Add SubCategory
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <h5 class="card-title mb-0">SubCategory Lists</h5>
                                    </div>

                                    <div class="card-body">
                                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>SubCategory Name</th>
                                                    <th>Category Name</th>
                                                    <th>Create Time</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                
                                                @foreach($productSubCategory as $key => $psc)

                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $psc->SUBCATEGORY_NAME }}</td>
                                                        <td>{{ $psc->CATEGORY_NAME }}</td>
                                                        <td>{{ Carbon\Carbon::parse($psc->created_at)->diffForHumans() }}</td>
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
                                                                        <a href="javascript:void(0)" data-slug="{{ $psc->SLUG }}" class="dropdown-item edit-subcategory-btn">
                                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                            Edit
                                                                        </a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="{{ route('subcategory.delete',$psc->SLUG) }}" class="dropdown-item edit-item-btn">
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


                <div class="modal zoomIn" id="subcategoryEditModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalgridLabel">Edit SubCategory</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="Content">

                                <form method="post" id="subcategoryAjaxForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">

                                        <input type="hidden" name="SLUG" id="SLUG" value="">

                                        <div class="col-xxl-12">
                                            <div>
                                                <label for="" class="form-label">SubCategory Name</label>
                                                <input type="text" class="form-control" id="subcategoryNameInput" name="subcategoryNameInput" value="">
                                            </div>
                                        </div><!--end col-->


                                        <div class="col-xxl-12">
                                            <div>
                                                <label for="" class="form-label">Category Name</label>
                                                
                                                <select class="form-select mb-3" id="select-subcategory" aria-label="Default select example" name="categoryNameInput">
                                                    
                                                    <option value="" selected ></option>
                                                    <option>Select Category</option>


                                                    @foreach($productCategory as $mpc)
                                                        <option value="{{ $mpc->CATEGORY_ID }}">{{ $mpc->CATEGORY_NAME }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div><!--end col-->


                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="updateBtn" data-slug="" class="btn btn-primary update-subcategory">Update</button>
                                            </div>
                                        </div><!--end col-->

                                    </div><!--end row-->
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>

                
            @include('admin.Product-Page.ajax.subcategoryAjax');

    @endsection