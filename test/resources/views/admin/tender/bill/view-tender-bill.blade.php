@extends('admin.include.master')
    @section('content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">View Tender Bill</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tender Bill List</a></li>
                                            <li class="breadcrumb-item active">View</li>
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

                            @foreach($tenderBillData as $tenderBill)

                                <form>

                                    

                                    <div class="row">

                                        <div class="col-lg-12">

                                            <div class="card">

                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">View Tender Bill</h4>
                                                    
                                                </div><!-- end card header -->

                                                <div class="card-body">

                                                    <div class="row">


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="SL" class="form-label">SL <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $tenderBill->SL }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="TENDER_ID" class="form-label">Tender ID <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $tenderBill->TENDER_ID }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="COMPANY_NAME" class="form-label">Company Name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $tenderBill->COMPANY_NAME }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="DATE" class="form-label">Date <span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control" value="{{ $tenderBill->DATE }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="CHEQUE_NO" class="form-label">Cheque No <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $tenderBill->CHEQUE_NO }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="AMOUNT" class="form-label">Amount <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $tenderBill->AMOUNT }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        
                                                    </div>

                                                    
                                                </div>
                                            </div>
                                            <!-- end card -->

                                        </div>
                                        <!-- end col -->

                                    </div>
                                    <!-- end row -->

                                </form>

                            @endforeach


                        </div>
   

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


    @endsection