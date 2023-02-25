@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Role Permission</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Role</a></li>
                                    <li class="breadcrumb-item active">Edit Role</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xxl-12">

                        @if(session('cus-user-add-msg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('cus-user-add-msg') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Edit Role</h4>

                            </div><!-- end card header -->

                            <div class="card-body">

                                <div class="live-preview">
                                    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="nameInput" class="form-label">Name</label>
                                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                                </div>

                                            </div><!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="Permission" class="form-label">Permission</label>
                                                    <br/>
                                                    @foreach($permission as $value)
                                                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                        {{ $value->name }}</label>
                                                    <br/>
                                                    @endforeach
                                                </div>

                                            </div><!--end col-->


                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->

                                    {!! Form::close() !!}

                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->

                </div><!--end row-->


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    @endsection
