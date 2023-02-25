@extends('admin.include.master')
    @section('content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">View Tender Info</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tender Info List</a></li>
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

                            @foreach($tenderInfoData as $tenderInfo)

                                <form>

                                    <div class="row">

                                        <div class="col-lg-12">

                                            <div class="card">

                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">View Tender Info</h4>
                                                    
                                                </div><!-- end card header -->

                                                <div class="card-body">

                                                    <div class="row">


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="TENDER_ID" class="form-label">Tender ID <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $tenderInfo->TENDER_ID }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="ORGANIZATION" class="form-label">Organization <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $tenderInfo->ORGANIZATION }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="AMOUNT" class="form-label">Amount <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $tenderInfo->AMOUNT }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="YEAR" class="form-label">Year <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $tenderInfo->YEAR }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="PURCHASE_DEADLINE" class="form-label">Delivery Deadline <span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control" value="{{ $tenderInfo->PURCHASE_DEADLINE }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="TOTAL_PURCHASE_AMOUNT" class="form-label">Total Purchase Amount (৳) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $tenderInfo->TOTAL_PURCHASE_AMOUNT }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="TOTAL_ITEMS" class="form-label">Total Items <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $tenderInfo->TOTAL_ITEMS }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="PURCHASE_QUANTITY" class="form-label">Purchase Quantity <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $tenderInfo->PURCHASE_QUANTITY }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="PURCHASE_DUE_ITEMS" class="form-label">Purchase Due Items <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $tenderInfo->PURCHASE_DUE_ITEMS }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="DELIVERY_ITEMS" class="form-label">Delivery Items <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $tenderInfo->DELIVERY_ITEMS }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="ITEMS_DELIVERY_DUE" class="form-label">Items Delivery Due <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $tenderInfo->ITEMS_DELIVERY_DUE }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        

                                                        <div class="col-md-6">
                                                            <div>
                                                                <label for="DESCRIPTION" class="form-label">Description <span class="text-danger">*</span></label>
                                                                
                                                                <textarea class="form-control" name="DESCRIPTION" rows="5" readonly>
                                                                    {{ $tenderInfo->DESCRIPTION }}
                                                                </textarea>
                                                                
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