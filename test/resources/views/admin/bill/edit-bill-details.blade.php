@extends('admin.include.master')
    @section('content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Edit PO List Details</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>
                                            <li class="breadcrumb-item active">Edit PO Details</li>
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

                            @foreach($purchaseOrderList as $pol)

                                <form method="POST" action="{{ route('po.list.update', $pol->PURCHASE_ORDER_LIST_ID) }}" enctype="multipart/form-data">

                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-12">

                                            @if(session('crudMsgPO'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <strong>{{ session('crudMsgPO') }}</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @endif

                                            <div class="card">

                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">Edit PO List Details</h4>
                                                </div><!-- end card header -->

                                                <div class="card-body">

                                                    <div class="row">


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="PO_NO" class="form-label">PO<span class="text-danger">*</span></label>
                                                                <select class="js-example-basic-single mb-3" id="select-customer" name="PO_NO">
                                                                    
                                                                    <option value="{{ $pol->PO_NO }}" selected>{{ $pol->PO_NO }}</option>
                                                                    <option value="">Select PO</option>

                                                                    @foreach($purchaseOrderData as $purchaseOrder)
                                                                        <option @if(old('PO_NO') == $purchaseOrder->PO_NO) selected @endif value="{{ $purchaseOrder->PO_NO }}">{{ $purchaseOrder->PO_NO }}</option>
                                                                    @endforeach

                                                                </select>
                                                                @if ($errors->has('PO_NO'))
                                                                    <span class="text-danger">{{ $errors->first('PO_NO') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="SL" class="form-label">SL<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('SL') is-invalid @enderror" value="{{ $pol->SL }}" name="SL">
                                                                @if ($errors->has('SL'))
                                                                    <span class="text-danger">{{ $errors->first('SL') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="ITEM_CODE" class="form-label">Item Code<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('ITEM_CODE') is-invalid @enderror" value="{{ $pol->ITEM_CODE }}" name="ITEM_CODE">
                                                                @if ($errors->has('ITEM_CODE'))
                                                                    <span class="text-danger">{{ $errors->first('ITEM_CODE') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="DELIVERY_DATE" class="form-label">Delivery Deadline<span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control @error('DELIVERY_DATE') is-invalid @enderror" value="{{ $pol->DELIVERY_DATE }}" name="DELIVERY_DATE">
                                                                @if ($errors->has('DELIVERY_DATE'))
                                                                    <span class="text-danger">{{ $errors->first('DELIVERY_DATE') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div>
                                                                <label for="PRODUCT_DESCRIPTION" class="form-label">Product Description</label>
                                                                <p class="text-muted mb-2">Add customer office address</p>
                                                                <textarea class="form-control" name="PRODUCT_DESCRIPTION" rows="3">
                                                                    {{ $pol->PRODUCT_DESCRIPTION }}
                                                                </textarea>
                                                                @if ($errors->has('PRODUCT_DESCRIPTION'))
                                                                    <span class="text-danger">{{ $errors->first('PRODUCT_DESCRIPTION') }}</span>
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
                                                            <div class="mb-3">
                                                                <label for="UNIT" class="form-label">Unit<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('UNIT') is-invalid @enderror" value="{{ $pol->UNIT }}" name="UNIT">
                                                                @if ($errors->has('UNIT'))
                                                                    <span class="text-danger">{{ $errors->first('UNIT') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="UNIT_PRICE" class="form-label">Unit Price<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('UNIT_PRICE') is-invalid @enderror" value="{{ $pol->UNIT_PRICE }}" id="UNIT_PRICE" name="UNIT_PRICE">
                                                                @if ($errors->has('UNIT_PRICE'))
                                                                    <span class="text-danger">{{ $errors->first('UNIT_PRICE') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="QUANTITY" class="form-label">Quantity<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('QUANTITY') is-invalid @enderror" value="{{ $pol->QUANTITY }}" id="QUANTITY" name="QUANTITY">
                                                                @if ($errors->has('QUANTITY'))
                                                                    <span class="text-danger">{{ $errors->first('QUANTITY') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="TOTAL_PRICE" class="form-label">Total Price</label>
                                                                <input type="text" class="form-control" placeholder="0" id="TOTAL_PRICE" name="TOTAL_PRICE" disabled>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="VAT" class="form-label">VAT<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('VAT') is-invalid @enderror" value="{{ $pol->VAT }}" id="VAT" name="VAT">
                                                                @if ($errors->has('VAT'))
                                                                    <span class="text-danger">{{ $errors->first('VAT') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="AIT" class="form-label">AIT<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('AIT') is-invalid @enderror" value="{{ $pol->AIT }}" id="AIT" name="AIT">
                                                                @if ($errors->has('AIT'))
                                                                    <span class="text-danger">{{ $errors->first('AIT') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="VAT_AIT_PRICE" class="form-label">Price with VAT, AIT</label>
                                                                <input type="text" class="form-control" placeholder="0" id="VAT_AIT_PRICE" disabled>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="NOTE" class="form-label">Note<span class="text-danger">*</span></label>
                                                                <select class="form-select mb-3" id="select-note" name="NOTE">
                                                                    
                                                                    <option value="{{ $pol->NOTE }}" selected>{{ $pol->NOTE }}</option>
                                                                    <option>Select Note</option>
                                                                    <option value="Including VAT & AIT">Including VAT & AIT</option>
                                                                    <option value="Including VAT & Excluding AIT">Including VAT & Excluding AIT</option>
                                                                    <option value="Including AIT & Excluding VAT">Including AIT & Excluding VAT</option>
                                                                    <option value="Excluding VAT & AIT">Excluding VAT & AIT</option>
                                                                    
                                                                </select>
                                                                @if ($errors->has('NOTE'))
                                                                    <span class="text-danger">{{ $errors->first('NOTE') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        
                                                        
                                                    </div>

                                                    
                                                </div>
                                            </div>
                                            <!-- end card -->



                                            <div class="text-end mb-3">
                                                <button type="submit" class="btn btn-success w-sm">Update PO List</button>
                                            </div>
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


                @include('admin.po.ajax.poAjax');

    @endsection