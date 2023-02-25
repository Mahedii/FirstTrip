@extends('admin.include.master')
    @section('content')

                <div class="page-content">
                    <div class="container-fluid">

                       <!-- start page title -->
                       <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Add Bill</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tender Bill</a></li>
                                            <li class="breadcrumb-item active">Add</li>
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

                            

                            <form method="POST" action="{{ route('tender.bill.insert') }}" enctype="multipart/form-data">

                                @csrf

                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="card">

                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Add Tender Bill</h4>
                                                
                                            </div><!-- end card header -->

                                            <div class="card-body">

                                                <div class="row">


                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="SL" class="form-label">SL <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control @error('SL') is-invalid @enderror" value="{{ old('SL') }}" name="SL">
                                                            @if ($errors->has('SL'))
                                                                <span class="text-danger">{{ $errors->first('SL') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->


                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="TENDER_ID" class="form-label">Tender ID <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control @error('TENDER_ID') is-invalid @enderror" value="{{ old('TENDER_ID') }}" name="TENDER_ID">
                                                            @if ($errors->has('TENDER_ID'))
                                                                <span class="text-danger">{{ $errors->first('TENDER_ID') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->


                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="COMPANY_NAME" class="form-label">Company Name <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control @error('COMPANY_NAME') is-invalid @enderror" value="{{ old('COMPANY_NAME') }}" name="COMPANY_NAME">
                                                            @if ($errors->has('COMPANY_NAME'))
                                                                <span class="text-danger">{{ $errors->first('COMPANY_NAME') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="DATE" class="form-label">Date <span class="text-danger">*</span></label>
                                                            <input type="date" class="form-control @error('DATE') is-invalid @enderror" value="{{ old('DATE') }}" name="DATE">
                                                            @if ($errors->has('DATE'))
                                                                <span class="text-danger">{{ $errors->first('DATE') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->


                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="CHEQUE_NO" class="form-label">Cheque No <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control @error('CHEQUE_NO') is-invalid @enderror" value="{{ old('CHEQUE_NO') }}" name="CHEQUE_NO">
                                                            @if ($errors->has('CHEQUE_NO'))
                                                                <span class="text-danger">{{ $errors->first('CHEQUE_NO') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->


                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="AMOUNT" class="form-label">Amount <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control @error('AMOUNT') is-invalid @enderror" value="{{ old('AMOUNT') }}" name="AMOUNT">
                                                            @if ($errors->has('AMOUNT'))
                                                                <span class="text-danger">{{ $errors->first('AMOUNT') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    
                                                </div>

                                                
                                            </div>
                                        </div>
                                        <!-- end card -->

                                        <div class="text-end mb-3">
                                            <button type="submit" class="btn btn-success w-sm">Add Tender Bill</button>
                                        </div>
                                    </div>
                                    <!-- end col -->


                                </div>
                                <!-- end row -->

                            </form>


                        </div>
   

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

    @endsection