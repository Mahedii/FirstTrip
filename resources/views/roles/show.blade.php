@include('admin.include.header')

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
                                <li class="breadcrumb-item active">Role Permission</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Role Permission</h4>
                            
                        </div><!-- end card header -->

                        <div class="card-body">
                            
                            <div class="live-preview">
                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="nameInput" class="form-label">Name</label>
                                                
                                                <button type="button" class="btn btn-primary position-relative">
                                                    {{ $role->name }}
                                                </button>
                                            </div>
                                            
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="Permission" class="form-label">Permission</label>
                                                @if(!empty($rolePermissions))
                                                    @foreach($rolePermissions as $v)
                                                        
                                                        <span class="badge text-bg-success my-2" style="font-size:13px">{{ $v->name }}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                            
                                        </div><!--end col-->
                                        
                                        
                                        <div class="col-lg-12">
                                            <div class="text-end">
                                                <a href="{{ url()->previous() }}" class="btn btn-primary" id="addproduct-btn">
                                                    <i class="ri-arrow-left-line align-bottom me-1"></i>
                                                    Back
                                                </a>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                
                                

                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->

            </div><!--end row-->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

                
@include('admin.include.footer')