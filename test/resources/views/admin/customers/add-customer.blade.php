@extends('admin.include.master')
    @section('content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Add Customer</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Customer</a></li>
                                            <li class="breadcrumb-item active">Add Customer</li>
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

                            <form method="POST" action="{{ route('customer.insert') }}" enctype="multipart/form-data">

                                @csrf

                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="card">
                                            <div class="card-body">

                                                <div class="row">


                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="CUSTOMER_NAME" class="form-label">Customer Name <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control @error('CUSTOMER_NAME') is-invalid @enderror" placeholder="Customer name" value="{{ old('CUSTOMER_NAME') }}" name="CUSTOMER_NAME">
                                                            @if ($errors->has('CUSTOMER_NAME'))
                                                                <span class="text-danger">{{ $errors->first('CUSTOMER_NAME') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="MOBILE" class="form-label">Mobile</label>
                                                            <input type="text" class="form-control @error('MOBILE') is-invalid @enderror" placeholder="01321156678" value="{{ old('MOBILE') }}" name="MOBILE">
                                                            @if ($errors->has('MOBILE'))
                                                                <span class="text-danger">{{ $errors->first('MOBILE') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="EMAIL" class="form-label">Email</label>
                                                            <input type="email" class="form-control @error('EMAIL') is-invalid @enderror" placeholder="sample@mail.com" value="{{ old('EMAIL') }}" name="EMAIL">
                                                            @if ($errors->has('EMAIL'))
                                                                <span class="text-danger">{{ $errors->first('EMAIL') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="PHONE" class="form-label">Telephone</label>
                                                            <input type="text" class="form-control @error('PHONE') is-invalid @enderror" value="{{ old('PHONE') }}" name="PHONE">
                                                            @if ($errors->has('PHONE'))
                                                                <span class="text-danger">{{ $errors->first('PHONE') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="GST_NUMBER" class="form-label">GST Number</label>
                                                            <input type="text" class="form-control @error('GST_NUMBER') is-invalid @enderror" value="{{ old('GST_NUMBER') }}" name="GST_NUMBER">
                                                            @if ($errors->has('GST_NUMBER'))
                                                                <span class="text-danger">{{ $errors->first('GST_NUMBER') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="TAX_NUMBER" class="form-label">TAX Number</label>
                                                            <input type="text" class="form-control @error('TAX_NUMBER') is-invalid @enderror" value="{{ old('TAX_NUMBER') }}" name="TAX_NUMBER">
                                                            @if ($errors->has('TAX_NUMBER'))
                                                                <span class="text-danger">{{ $errors->first('TAX_NUMBER') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="PREVIOUS_DUE" class="form-label">Previous Due</label>
                                                            <input type="text" class="form-control @error('PREVIOUS_DUE') is-invalid @enderror" placeholder="0" value="{{ old('PREVIOUS_DUE') }}" name="PREVIOUS_DUE">
                                                            @if ($errors->has('PREVIOUS_DUE'))
                                                                <span class="text-danger">{{ $errors->first('PREVIOUS_DUE') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->
                                                    
                                                </div>

                                                
                                            </div>
                                        </div>
                                        <!-- end card -->


                                        <div class="card">
                                            <div class="card-body">

                                                <div class="row">


                                                    <div class="col-md-6">
                                                        <div>
                                                            <label for="OFFICE_ADDRESS" class="form-label">Office Address</label>
                                                            <p class="text-muted mb-2">Add customer office address</p>
                                                            <textarea class="form-control" name="OFFICE_ADDRESS" rows="3"></textarea>
                                                            @if ($errors->has('OFFICE_ADDRESS'))
                                                                <span class="text-danger">{{ $errors->first('OFFICE_ADDRESS') }}</span>
                                                            @endif
                                                        </div>
                                                    </div><!--end col-->


                                                    <div class="col-md-6">
                                                        <div>
                                                            <label for="SHIPPING_ADDRESS" class="form-label">Shipping Address</label>
                                                            <p class="text-muted mb-2">Add customer shipping address</p>
                                                            <textarea class="form-control" name="SHIPPING_ADDRESS" rows="3"></textarea>
                                                            @if ($errors->has('SHIPPING_ADDRESS'))
                                                                <span class="text-danger">{{ $errors->first('SHIPPING_ADDRESS') }}</span>
                                                            @endif
                                                        </div>
                                                    </div><!--end col-->

                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- end card -->



                                        <div class="text-end mb-3">
                                            <button type="submit" class="btn btn-success w-sm">Submit</button>
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