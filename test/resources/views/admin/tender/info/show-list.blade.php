@extends('admin.include.master')
    @section('content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Info Lists</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tender</a></li>
                                            <li class="breadcrumb-item active">Info</li>
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
                                                    <a href="{{ route('tender.info.add') }}" class="btn btn-success" id="addproduct-btn">
                                                        <i class="ri-add-line align-bottom me-1"></i>
                                                        Add Tender Info
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Tender Info</h5>
                                    </div>

                                    <div class="card-body">
                                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tender ID</th>
                                                    <th>Year</th>
                                                    <th>Organization</th>
                                                    <th>Creator</th>
                                                    <th>Create Time</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                               
                                                @foreach($tenderInfo as $key => $tenderInfo)

                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $tenderInfo->TENDER_ID }}</td>
                                                        <td>{{ $tenderInfo->YEAR }}</td>
                                                        <td>{{ $tenderInfo->ORGANIZATION }}</td>
                                                        <td>{{ $tenderInfo->name }}</td>
                                                        <td>{{ Carbon\Carbon::parse($tenderInfo->created_at)->diffForHumans() }}</td>
                                                        <td>
                                                            <div class="dropdown d-inline-block">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill align-middle"></i>
                                                                </button>

                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li>
                                                                        <a href="{{ route('tender.info.viewpage.load',$tenderInfo->SLUG) }}" target="_blank" class="dropdown-item">
                                                                            <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                            View
                                                                        </a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="{{ route('tender.info.editpage.load',$tenderInfo->SLUG) }}" class="dropdown-item edit-item-btn">
                                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                            Edit
                                                                        </a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="{{ route('tender.info.delete',$tenderInfo->SLUG) }}" class="dropdown-item edit-item-btn" onclick="return confirm('Are you sure you want to delete this?');">
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

    @endsection