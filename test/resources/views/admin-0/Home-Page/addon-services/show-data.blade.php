@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Addon Service</h4>
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

                    @if(session('crudMsg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('crudMsg') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('addon-services.update', '1') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col-lg-12">

                                @foreach($addonService as $data)

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
                                                        <p class="text-muted mb-2">Add short description for Addon Service section</p>
                                                        <textarea class="form-control" name="DESCRIPTION" rows="3">{{ $data->DESCRIPTION }}</textarea>
                                                        @if ($errors->has('DESCRIPTION'))
                                                            <span class="text-danger">{{ $errors->first('DESCRIPTION') }}</span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>

                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- end card -->

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



                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">

                            <div class="card-header border-0">
                                <div class="row g-4">
                                    
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <a href="{{ route('addon.service.list.add') }}" class="btn btn-success">
                                                <i class="ri-add-line align-bottom me-1"></i>
                                                Add Addon Service
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-header">
                                <h5 class="card-title mb-0">Addon Service Lists</h5>
                            </div>
                            
                            <div class="card-body">
                                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Icon Class</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                       @foreach($addonServiceList as $key => $data)

                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $data->ICON }}</td>
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
                                                                <a href="{{ route('addon.service.list.editpage.load',$data->SLUG) }}" class="dropdown-item edit-item-btn">
                                                                    <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    Edit
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="{{ route('addon.service.list.delete',$data->SLUG) }}" class="dropdown-item edit-item-btn">
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
                

            </div>
        </div>
        <!-- End Page-content -->

    @endsection