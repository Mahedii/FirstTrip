@extends('admin.include.master')
    @section('content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Edit PO</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>
                                            <li class="breadcrumb-item active">Edit PO</li>
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

                            @foreach($purchaseOrderData as $purchaseOrder)

                                <form method="POST" action="{{ route('po.update', $purchaseOrder->SLUG) }}" enctype="multipart/form-data">

                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="card">

                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">Edit PO</h4>
                                                    
                                                </div><!-- end card header -->

                                                <div class="card-body">

                                                    <div class="row">


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="CUSTOMER_ID" class="form-label">Customer Name <span class="text-danger">*</span></label>
                                                                <select class="form-select mb-3" id="select-customer" name="CUSTOMER_ID">
                                                                    
                                                                    <option value="{{ $purchaseOrder->CUSTOMER_ID }}" selected>{{ $purchaseOrder->CUSTOMER_NAME }}</option>
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
                                                                <input type="text" class="form-control @error('PO_NO') is-invalid @enderror" value="{{ $purchaseOrder->PO_NO }}" name="PO_NO" disabled>
                                                                @if ($errors->has('PO_NO'))
                                                                    <span class="text-danger">{{ $errors->first('PO_NO') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="PO_DATE" class="form-label">PO Date <span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control @error('PO_DATE') is-invalid @enderror" value="{{ $purchaseOrder->PO_DATE }}" id="exampleInputdate" name="PO_DATE">
                                                                @if ($errors->has('PO_DATE'))
                                                                    <span class="text-danger">{{ $errors->first('PO_DATE') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="REF_NO" class="form-label">Ref No <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('REF_NO') is-invalid @enderror" value="{{ $purchaseOrder->REF_NO }}" name="REF_NO">
                                                                @if ($errors->has('REF_NO'))
                                                                    <span class="text-danger">{{ $errors->first('REF_NO') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-6">
                                                            <div>
                                                                <label for="INVOICE_ADDRESS" class="form-label">Invoice Address <span class="text-danger">*</span></label>
                                                                <p class="text-muted mb-2">Add customer office address</p>
                                                                <textarea class="form-control" name="INVOICE_ADDRESS">
                                                                    {{ trim($purchaseOrder->INVOICE_ADDRESS) }}
                                                                </textarea>
                                                                @if ($errors->has('INVOICE_ADDRESS'))
                                                                    <span class="text-danger">{{ $errors->first('INVOICE_ADDRESS') }}</span>
                                                                @endif
                                                            </div>
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div>
                                                                <label for="DELIVERY_ADDRESS" class="form-label">Delivery Address <span class="text-danger">*</span></label>
                                                                <p class="text-muted mb-2">Add customer shipping address</p>
                                                                <textarea class="form-control" name="DELIVERY_ADDRESS">
                                                                    {{ $purchaseOrder->DELIVERY_ADDRESS }}
                                                                </textarea>
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

                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1"></h4>
                                                </div><!-- end card header -->

                                                <div class="card-body">

                                                    <div class="row mb-3">

                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <label for="VAT" class="form-label">VAT<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('VAT') is-invalid @enderror" value="{{ $purchaseOrder->VAT }}" id="VAT" name="VAT">
                                                                @if ($errors->has('VAT'))
                                                                    <span class="text-danger">{{ $errors->first('VAT') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <label for="AIT" class="form-label">AIT<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('AIT') is-invalid @enderror" value="{{ $purchaseOrder->AIT }}" id="AIT" name="AIT">
                                                                @if ($errors->has('AIT'))
                                                                    <span class="text-danger">{{ $errors->first('AIT') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label for="NOTE" class="form-label">Note<span class="text-danger">*</span></label>
                                                                <select class="form-select mb-3" id="select-note" name="NOTE">
                                                                    <option value="{{ $purchaseOrder->NOTE }}" selected>{{ $purchaseOrder->NOTE }}</option>
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

                                                        <div class="col-md-5">
                                                            <div class="row">

                                                                <div class="col-9">
                                                                    <div class="mb-3">
                                                                        <label for="inputFile" class="form-label">Attached File <span class="fileErrMsg" style="color:red"></span> <span class="fileSizeErrMsg" style="color:red"></span></label>
                                                                        <input type="file" class="form-control @error('inputFile') is-invalid @enderror" name="inputFile" id="inputFile">
                                                                        @if ($errors->has('inputFile'))
                                                                            <span class="text-danger">{{ $errors->first('inputFile') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                @if($purchaseOrder->FILE_PATH != "")
                                                                    <div class="col-3">
                                                                        <div class="mt-4">
                                                                            <!-- <a href="{{ route('po.download.file',['fileName' => $purchaseOrder->FILE_NAME, 'filePath' => $purchaseOrder->FILE_PATH]) }}" data-toggle="tooltip" data-placement="top" title="Download File"> -->
                                                                            <a href="{{ asset($purchaseOrder->FILE_PATH) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Download File">
                                                                                <i class="ri-file-line align-bottom me-2" style="font-size: 28px; color: red;"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                            </div>
                                                            
                                                            
                                                        </div><!--end col-->
                                                        
                                                    </div>
                                                    
                                                </div>

                                            </div>
                                            <!-- end card -->

                                            <div class="text-end mb-3">
                                                <button type="submit" class="btn btn-success w-sm">Update PO</button>
                                            </div>

                                            @foreach($purchaseOrderList as $key => $pol)

                                                <div class="card">

                                                    <div class="card-header align-items-center d-flex">
                                                        <h4 class="card-title mb-0 flex-grow-1">Item #{{ $key }}</h4>
                                                    </div><!-- end card header -->

                                                    <div class="card-body">

                                                        <input type="hidden" id="counter" value="1">

                                                        <div class="row mb-3">

                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label for="SL" class="form-label">SL<span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control @error('SL.*') is-invalid @enderror" value="{{ $pol->SL }}" readonly>
                                                                    @if ($errors->has('SL.*'))
                                                                        <span class="text-danger">{{ $errors->first('SL.*') }}</span>
                                                                    @endif
                                                                </div>
                                                                
                                                            </div><!--end col-->


                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label for="ITEM_CODE" class="form-label">Item Code<span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control @error('ITEM_CODE.*') is-invalid @enderror" value="{{ $pol->ITEM_CODE }}" readonly>
                                                                    @if ($errors->has('ITEM_CODE.*'))
                                                                        <span class="text-danger">{{ $errors->first('ITEM_CODE.*') }}</span>
                                                                    @endif
                                                                </div>
                                                                
                                                            </div><!--end col-->


                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label for="DELIVERY_DATE" class="form-label">Delivery Deadline<span class="text-danger">*</span></label>
                                                                    <input type="date" class="form-control @error('DELIVERY_DATE.*') is-invalid @enderror" value="{{ $pol->DELIVERY_DATE }}" readonly>
                                                                    @if ($errors->has('DELIVERY_DATE.*'))
                                                                        <span class="text-danger">{{ $errors->first('DELIVERY_DATE.*') }}</span>
                                                                    @endif
                                                                </div>
                                                                
                                                            </div><!--end col-->


                                                            <div class="col-md-3">
                                                                <div>
                                                                    <label for="PRODUCT_DESCRIPTION" class="form-label">Product Description</label>
                                                                    
                                                                    <textarea class="form-control" name="PRODUCT_DESCRIPTION[]" readonly>{{ $pol->PRODUCT_DESCRIPTION }}</textarea>
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
                                                                    <input type="text" class="form-control @error('UNIT.*') is-invalid @enderror" value="{{ $pol->UNIT }}" readonly>
                                                                    @if ($errors->has('UNIT.*'))
                                                                        <span class="text-danger">{{ $errors->first('UNIT.*') }}</span>
                                                                    @endif
                                                                </div>
                                                                
                                                            </div><!--end col-->

                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label for="UNIT_PRICE" class="form-label">Unit Price<span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control UNIT_PRICE @error('UNIT_PRICE.*') is-invalid @enderror" value="{{ $pol->UNIT_PRICE }}" data-id="0" id="UNIT_PRICE0" readonly>
                                                                    @if ($errors->has('UNIT_PRICE.*'))
                                                                        <span class="text-danger">{{ $errors->first('UNIT_PRICE.*') }}</span>
                                                                    @endif
                                                                </div>
                                                                
                                                            </div><!--end col-->

                                                            <div class="col-md-3">
                                                                <div class="mb-3">
                                                                    <label for="QUANTITY" class="form-label">Quantity<span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control QUANTITY @error('QUANTITY.*') is-invalid @enderror" value="{{ $pol->QUANTITY }}" data-id="0" id="QUANTITY0" readonly>
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

                                                        <div class="text-start mb-3">
                                                            <a href="{{ route('po.list.editpage.load',$pol->PURCHASE_ORDER_LIST_ID) }}" id="add-item" class="btn btn-secondary w-sm"><i class="ri-pencil-fill me-1 align-bottom"></i> Edit</a>
                                                            <a href="{{ route('po.list.delete',$pol->PURCHASE_ORDER_LIST_ID) }}" id="add-item" class="btn btn-danger w-sm" onclick="return confirm('Are you sure you want to delete this?');"><i class="ri-delete-bin-fill me-1 align-bottom"></i> Delete</a>
                                                        </div>
                                                        
                                                    </div>
                                                </div>

                                            @endforeach


                                            <!-- <div class="card">
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
                                                                        
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        
                                                    </div>

                                                </div>
                                            </div> -->

                                            
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