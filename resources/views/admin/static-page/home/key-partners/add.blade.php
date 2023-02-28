@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Key Partners</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                    <li class="breadcrumb-item active">Key Partners</li>
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
                                @if(session('crudMsg'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('crudMsg') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>

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



                    <form method="POST" action="{{ route('airlinePartners.insert') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">

                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Add Key Partners Info</h4>

                                    </div><!-- end card header -->

                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="NAME" class="form-label">Name<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('NAME') is-invalid @enderror" value="{{ old('NAME') }}" name="NAME">
                                                    @if ($errors->has('NAME'))
                                                        <span class="text-danger">{{ $errors->first('NAME') }}</span>
                                                    @endif
                                                </div>

                                            </div><!--end col-->

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="Thumbnail_Image" class="form-label">Logo (120*100)</label>
                                                    <input type="file" class="form-control" id="singleImageFile" name="singleFile" >
                                                </div>
                                                <div class="preview-image-before-upload"> </div>
                                            </div><!--end col-->

                                        </div>

                                    </div>
                                </div>
                                <!-- end card -->


                                <div class="text-end mb-3">
                                    <button type="submit" class="btn btn-success w-sm">Add</button>
                                </div>
                            </div>
                            <!-- end col -->


                        </div>
                        <!-- end row -->

                    </form>

                    <div class="row">

                        <div class="card">

                            <div class="card-header">
                                <h5 class="card-title mb-0">Key Airlines Data</h5>
                            </div>

                            <div class="card-body">
                                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Logo</th>
                                            <th>Create Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach($keyPartnerData as $key => $keyPartner)

                                            <tr data-id="{{ $keyPartner->id }}" class="package-{{ $keyPartner->id }}">
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $keyPartner->NAME }}</td>

                                                <td><img src="{!! asset($keyPartner->FILE_PATH) !!}" alt=""></td>
                                                <td>{{ Carbon\Carbon::parse($keyPartner->created_at)->diffForHumans() }}</td>
                                                <td>
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>

                                                        <ul class="dropdown-menu dropdown-menu-end">


                                                            <li>
                                                                <a href="{{ route('load.airlinePartners.editpage',['id' => $keyPartner->id, 'slug' => $keyPartner->SLUG]) }}" class="dropdown-item edit-item-btn">
                                                                    <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                    Edit
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="{{ route('airlinePartners.delete',$keyPartner->SLUG) }}" class="dropdown-item edit-item-btn" onclick="return confirm('Are you sure you want to delete this?');">
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

        @include('admin.tours.ajax.single-image')



    @endsection
