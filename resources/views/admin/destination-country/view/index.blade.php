@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Destination Countries</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Countries</a></li>
                                    <li class="breadcrumb-item active">Lists</li>
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
                                            <a href="{{ route('load.destination.country.storepage') }}" class="btn btn-success" id="addproduct-btn">
                                                <i class="ri-add-line align-bottom me-1"></i>
                                                Add Destination Country
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-header">
                                <h5 class="card-title mb-0">Tour Packages</h5>
                            </div>

                            <div class="card-body">
                                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Country Name</th>
                                            <th>Create Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach($packageCountries as $key => $packageCountry)

                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $packageCountry->COUNTRY_NAME }}</td>
                                                <td>{{ Carbon\Carbon::parse($packageCountry->created_at)->diffForHumans() }}</td>
                                                <td>
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>

                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li>
                                                                <a href="{{ route('load.destination.country.editpage',$packageCountry->SLUG) }}" class="dropdown-item edit-item-btn">
                                                                    <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    Edit
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="{{ route('destination.country.delete',$packageCountry->SLUG) }}" class="dropdown-item edit-item-btn" onclick="return confirm('Are you sure you want to delete this?');">
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
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    @endsection
