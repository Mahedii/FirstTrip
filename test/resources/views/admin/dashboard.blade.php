@include('admin.include.header')

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Moon LTD ERP</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <div class="flex-grow-1">
                                                <h4 class="fs-16 mb-1">Hello, {{ Auth::user()->name }}!</h4>
                                                <p class="text-muted mb-0">Here's what's happening with your company.</p>
                                            </div>
                                            
                                        </div><!-- end card header -->
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->

                                <div class="row">

                                    
                                    @php($totalPo = App\Http\Controllers\Admin\Dashboard\DashboardController::totalPo())

                                    <div class="col-xl-3 col-md-6">
                                        
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">

                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total PO Amount</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                            <span class="counter-value" data-target="{{ $totalPo }}">0</span>
                                                        </h4>
                                                        
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-danger rounded fs-3">
                                                            <i class="bx bx-wallet"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @php($totalVat = App\Http\Controllers\Admin\Dashboard\DashboardController::totalVat())

                                    <div class="col-xl-3 col-md-6">
                                        
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">

                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total VAT</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                            <span class="counter-value" data-target="{{ $totalVat }}">0</span>
                                                        </h4>
                                                        
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-danger rounded fs-3">
                                                            <i class="bx bx-wallet"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @php($totalAit = App\Http\Controllers\Admin\Dashboard\DashboardController::totalAit())

                                    <div class="col-xl-3 col-md-6">
                                        
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">

                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total AIT</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                            <span class="counter-value" data-target="{{ $totalAit }}">0</span>
                                                        </h4>
                                                        
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-danger rounded fs-3">
                                                            <i class="bx bx-wallet"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @php($dueBill = App\Http\Controllers\Admin\Dashboard\DashboardController::dueBill())

                                    <div class="col-xl-3 col-md-6">
                                        
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">

                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">DUE</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                            <span class="counter-value" data-target="{{ $dueBill }}">0</span>
                                                        </h4>
                                                        
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-danger rounded fs-3">
                                                            <i class="bx bx-wallet"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @php($paidBill = App\Http\Controllers\Admin\Dashboard\DashboardController::paidBill())

                                    <div class="col-xl-3 col-md-6">
                                        
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">

                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">PAID</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                            <span class="counter-value" data-target="{{ $paidBill }}">0</span>
                                                        </h4>
                                                        
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-danger rounded fs-3">
                                                            <i class="bx bx-wallet"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div> <!-- end .h-100-->

                        </div> <!-- end col -->


                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

@include('admin.include.footer')

            