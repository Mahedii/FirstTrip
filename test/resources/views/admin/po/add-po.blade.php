@extends('admin.include.master')
    @section('content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Add PO</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">PO</a></li>
                                            <li class="breadcrumb-item active">Add PO</li>
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

                            

                            <form method="POST" action="{{ route('po.insert') }}" enctype="multipart/form-data">

                                @csrf

                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="card">

                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Add PO</h4>
                                                
                                            </div><!-- end card header -->

                                            <div class="card-body">

                                                <div class="row">


                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="CUSTOMER_ID" class="form-label">Customer Name <span class="text-danger">*</span></label>
                                                            <select class="form-select mb-3" id="select-customer" name="CUSTOMER_ID">
                                                                
                                                                <option>Select Customer</option>

                                                                @foreach($customers as $customer)
                                                                    <option @if(old('CUSTOMER_ID') == $customer->CUSTOMER_ID) selected @endif value="{{ $customer->CUSTOMER_ID }}">{{ $customer->CUSTOMER_NAME }}</option>
                                                                @endforeach

                                                            </select>
                                                            @if ($errors->has('CUSTOMER_ID'))
                                                                <span class="text-danger">{{ $errors->first('CUSTOMER_ID') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="PO_NO" class="form-label">PO No <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control @error('PO_NO') is-invalid @enderror" value="{{ old('PO_NO') }}" name="PO_NO">
                                                            @if ($errors->has('PO_NO'))
                                                                <span class="text-danger">{{ $errors->first('PO_NO') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="PO_DATE" class="form-label">PO Date <span class="text-danger">*</span></label>
                                                            <input type="date" class="form-control @error('PO_DATE') is-invalid @enderror" value="{{ old('PO_DATE') }}" id="exampleInputdate" name="PO_DATE">
                                                            @if ($errors->has('PO_DATE'))
                                                                <span class="text-danger">{{ $errors->first('PO_DATE') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="REF_NO" class="form-label">Ref No <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control @error('REF_NO') is-invalid @enderror" value="{{ old('REF_NO') }}" name="REF_NO">
                                                            @if ($errors->has('REF_NO'))
                                                                <span class="text-danger">{{ $errors->first('REF_NO') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div>
                                                            <label for="INVOICE_ADDRESS" class="form-label">Invoice Address <span class="text-danger">*</span></label>
                                                            <p class="text-muted mb-2">Add customer office address</p>
                                                            <textarea class="form-control" name="INVOICE_ADDRESS" rows="3"></textarea>
                                                            @if ($errors->has('INVOICE_ADDRESS'))
                                                                <span class="text-danger">{{ $errors->first('INVOICE_ADDRESS') }}</span>
                                                            @endif
                                                        </div>
                                                    </div><!--end col-->


                                                    <div class="col-md-6">
                                                        <div>
                                                            <label for="DELIVERY_ADDRESS" class="form-label">Delivery Address <span class="text-danger">*</span></label>
                                                            <p class="text-muted mb-2">Add customer shipping address</p>
                                                            <textarea class="form-control" name="DELIVERY_ADDRESS" rows="3"></textarea>
                                                            @if ($errors->has('DELIVERY_ADDRESS'))
                                                                <span class="text-danger">{{ $errors->first('DELIVERY_ADDRESS') }}</span>
                                                            @endif
                                                        </div>
                                                    </div><!--end col-->

                                                    
                                                </div>

                                                
                                            </div>
                                        </div>
                                        <!-- end card -->

                                        <div class="card">

                                            <div class="card-body">

                                                <div class="row mb-3">

                                                    <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label for="VAT" class="form-label">VAT<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('VAT') is-invalid @enderror" value="7.5" name="VAT">
                                                                @if ($errors->has('VAT'))
                                                                    <span class="text-danger">{{ $errors->first('VAT') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label for="AIT" class="form-label">AIT<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('AIT') is-invalid @enderror" value="3" name="AIT">
                                                                @if ($errors->has('AIT'))
                                                                    <span class="text-danger">{{ $errors->first('AIT') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        

                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label for="NOTE" class="form-label">Note<span class="text-danger">*</span></label>
                                                                <select class="form-select mb-3" id="select-note" name="NOTE">
                                                                    
                                                                    <option>Select Note</option>
                                                                    <option value="Including VAT & AIT" selected>Including VAT & AIT</option>
                                                                    <option value="Including VAT & Excluding AIT">Including VAT & Excluding AIT</option>
                                                                    <option value="Including AIT & Excluding VAT">Including AIT & Excluding VAT</option>
                                                                    <option value="Excluding VAT & AIT">Excluding VAT & AIT</option>
                                                                    
                                                                </select>
                                                                @if ($errors->has('NOTE'))
                                                                    <span class="text-danger">{{ $errors->first('NOTE') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label for="inputFile" class="form-label">Attached File <span class="fileErrMsg" style="color:red"></span> <span class="fileSizeErrMsg" style="color:red"></span></label>
                                                                <input type="file" class="form-control @error('inputFile') is-invalid @enderror" name="inputFile" id="inputFile">
                                                                @if ($errors->has('inputFile'))
                                                                    <span class="text-danger">{{ $errors->first('inputFile') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                    
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="text-end mb-3">
                                            <button type="submit" class="btn btn-success w-sm">Add PO</button>
                                        </div>
                                    </div>
                                    <!-- end col -->


                                </div>
                                <!-- end row -->

                            </form>


                            <form method="POST" action="{{ route('po.list.insert') }}" enctype="multipart/form-data" id="poListForm">

                                @csrf

                                <div class="row">
                                    <div class="col-lg-12">

                                        @if(session('crudMsgPO'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>{{ session('crudMsgPO') }}</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif

                                        <div class="alert alert-danger" style="display:none"></div>
                                            
                                        <div class="card">

                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Add PO List</h4>
                                            </div><!-- end card header -->

                                            <div class="card-body">

                                                <div class="row mb-3">


                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="PO_NO" class="form-label">PO<span class="text-danger">*</span></label>
                                                            <select class="js-example-basic-single mb-3" id="select-po-no" name="PO_NO">
                                                                
                                                                <option value="" disabled selected>Select PO</option>

                                                                @foreach($purchaseOrder as $purchaseOrder)
                                                                    <option @if(old('PO_NO') == $purchaseOrder->PO_NO) selected @endif value="{{ $purchaseOrder->PO_NO }}">{{ $purchaseOrder->PO_NO }}</option>
                                                                @endforeach

                                                            </select>
                                                            @if ($errors->has('PO_NO'))
                                                                <span class="text-danger">{{ $errors->first('PO_NO') }}</span>
                                                            @endif
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="VAT" class="form-label">VAT<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" value="0" id="VAT" readonly>
                                                            
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="AIT" class="form-label">AIT<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" value="0" id="AIT" readonly>
                                                            
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- end card -->
                                        
                                        <div id="dynamic_field">

                                            <div class="card">

                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">Item #0</h4>
                                                </div><!-- end card header -->

                                                <div class="card-body">

                                                    <input type="hidden" id="counter" value="1">

                                                    <div class="row mb-3">

                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label for="SL" class="form-label">SL<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('SL.*') is-invalid @enderror" value="1" name="SL[]">
                                                                @if ($errors->has('SL.*'))
                                                                    <span class="text-danger">{{ $errors->first('SL.*') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label for="ITEM_CODE" class="form-label">Item Code<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('ITEM_CODE.*') is-invalid @enderror" value="{{ old('ITEM_CODE.*') }}" name="ITEM_CODE[]">
                                                                @if ($errors->has('ITEM_CODE.*'))
                                                                    <span class="text-danger">{{ $errors->first('ITEM_CODE.*') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label for="DELIVERY_DATE" class="form-label">Delivery Deadline<span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control @error('DELIVERY_DATE.*') is-invalid @enderror" value="{{ old('DELIVERY_DATE.*') }}" name="DELIVERY_DATE[]">
                                                                @if ($errors->has('DELIVERY_DATE.*'))
                                                                    <span class="text-danger">{{ $errors->first('DELIVERY_DATE.*') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-3">
                                                            <div>
                                                                <label for="PRODUCT_DESCRIPTION" class="form-label">Product Description</label>
                                                                
                                                                <textarea class="form-control" name="PRODUCT_DESCRIPTION[]"></textarea>
                                                                @if ($errors->has('PRODUCT_DESCRIPTION.*'))
                                                                    <span class="text-danger">{{ $errors->first('PRODUCT_DESCRIPTION.*') }}</span>
                                                                @endif
                                                            </div>
                                                        </div><!--end col-->
                                                        
                                                    </div>


                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label for="UNIT" class="form-label">Unit<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('UNIT.*') is-invalid @enderror" value="{{ old('UNIT.*') }}" name="UNIT[]">
                                                                @if ($errors->has('UNIT.*'))
                                                                    <span class="text-danger">{{ $errors->first('UNIT.*') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label for="UNIT_PRICE" class="form-label">Unit Price<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control UNIT_PRICE @error('UNIT_PRICE.*') is-invalid @enderror" value="{{ old('UNIT_PRICE.*') }}" data-id="0" id="UNIT_PRICE0" name="UNIT_PRICE[]">
                                                                @if ($errors->has('UNIT_PRICE.*'))
                                                                    <span class="text-danger">{{ $errors->first('UNIT_PRICE.*') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label for="QUANTITY" class="form-label">Quantity<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control QUANTITY @error('QUANTITY.*') is-invalid @enderror" value="{{ old('QUANTITY.*') }}" data-id="0" id="QUANTITY0" name="QUANTITY[]">
                                                                @if ($errors->has('QUANTITY.*'))
                                                                    <span class="text-danger">{{ $errors->first('QUANTITY.*') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label for="TOTAL_PRICE" class="form-label">Total Price</label>
                                                                <input type="text" class="form-control" placeholder="0" data-id="0" id="TOTAL_PRICE0" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->

 
                                                    </div>

                                                    
                                                </div>
                                            </div>
                                            <!-- end card -->

                                        </div>

                                        <div class="text-start mb-3">
                                            <a href="javascript:new_link()" id="add-item" class="btn btn-soft-secondary w-sm"><i class="ri-add-fill me-1 align-bottom"></i> Add Item</a>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                            
                                                <div class="table-responsive">
                                                    <table class="invoice-table table table-borderless table-nowrap mb-0">
                                                        
                                                        <tbody> 
                                                            <tr class="mt-2">
                                                                <td colspan="3"></td>
                                                                <td colspan="2" class="p-0">
                                                                    <table class="table table-borderless table-sm table-nowrap align-middle mb-0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">Price with VAT, AIT (Excluded)</th>
                                                                                <td>
                                                                                    <input type="text" class="form-control bg-light border-0" id="VAT_AIT_EXCLUDED_PRICE" placeholder="৳0.00" readonly />
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Net Price (Without VAT, AIT)</th>
                                                                                <td style="width:150px;">
                                                                                    <input type="text" class="form-control bg-light border-0" id="PRICE_WITHOUT_VAT_AIT" placeholder="৳0.00" readonly />
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Total VAT</th>
                                                                                <td>
                                                                                    <input type="text" class="form-control bg-light border-0" id="TOTAL_VAT" placeholder="৳0.00" readonly />
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Total AIT</th>
                                                                                <td>
                                                                                    <input type="text" class="form-control bg-light border-0" id="TOTAL_AIT" placeholder="৳0.00" readonly />
                                                                                </td>
                                                                            </tr>
                                                                            <tr class="border-top border-top-dashed">
                                                                                <th scope="row">Total Amount (VAT,AIT Included)</th>
                                                                                <td>
                                                                                    <input type="text" class="form-control bg-light border-0" id="vat_ait_included_price" placeholder="৳0.00" readonly />
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!--end table-->
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    
                                                </div>

                                            </div>
                                        </div>

                                        
                                        

                                        <div class="text-end mb-3">
                                            <button type="submit" class="btn btn-success w-sm po-list-add-btn">Add PO List</button>
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


                @include('admin.po.ajax.poAjax');
          

    @endsection