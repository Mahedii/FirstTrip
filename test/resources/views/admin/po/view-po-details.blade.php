@extends('admin.include.master')
    @section('content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">View PO</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>
                                            <li class="breadcrumb-item active">View PO</li>
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

                            @foreach($purchaseOrderData as $purchaseOrder)

                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="card">

                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">View PO</h4>
                                                
                                            </div><!-- end card header -->

                                            <div class="card-body">

                                                <div class="row">


                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="CUSTOMER_ID" class="form-label">Customer Name <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" value="{{ $purchaseOrder->CUSTOMER_NAME }}" readonly>
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="PO_NO" class="form-label">PO No <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" value="{{ $purchaseOrder->PO_NO }}" readonly>
                                                            
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="PO_DATE" class="form-label">PO Date <span class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" value="{{ $purchaseOrder->PO_DATE }}" readonly>
                                                            
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="REF_NO" class="form-label">Ref No <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" value="{{ $purchaseOrder->REF_NO }}" readonly>
                                                            
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-6">
                                                        <div>
                                                            <label for="INVOICE_ADDRESS" class="form-label">Invoice Address <span class="text-danger">*</span></label>
                                                            <p class="text-muted mb-2">Add customer office address</p>
                                                            <textarea class="form-control" name="INVOICE_ADDRESS" readonly>
                                                                {{ trim($purchaseOrder->INVOICE_ADDRESS) }}
                                                            </textarea>
                                                            
                                                        </div>
                                                    </div><!--end col-->


                                                    <div class="col-md-6">
                                                        <div>
                                                            <label for="DELIVERY_ADDRESS" class="form-label">Delivery Address <span class="text-danger">*</span></label>
                                                            <p class="text-muted mb-2">Add customer shipping address</p>
                                                            <textarea class="form-control" name="DELIVERY_ADDRESS" readonly>
                                                                {{ $purchaseOrder->DELIVERY_ADDRESS }}
                                                            </textarea>
                                                            
                                                        </div>
                                                    </div><!--end col-->

                                                    
                                                </div>

                                                
                                            </div>
                                        </div>
                                        <!-- end card -->


                                        <div class="card">

                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">PO List</h4>
                                            </div><!-- end card header -->

                                            <div class="card-body">

                                                <div class="row mb-3">

                                                    <div class="col-md-3">
                                                        <div class="mb-3">
                                                            <label for="VAT" class="form-label">VAT<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" value="{{ $purchaseOrder->VAT }}" readonly>
                                                            
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-3">
                                                        <div class="mb-3">
                                                            <label for="AIT" class="form-label">AIT<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" value="{{ $purchaseOrder->AIT }}" readonly>
                                                            
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="NOTE" class="form-label">Note<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" value="{{ $purchaseOrder->NOTE }}" readonly>
                                                            
                                                        </div>
                                                        
                                                    </div><!--end col-->

                                                    <div class="col-md-2">
                                                        

                                                            <div class="col-9">
                                                                <div class="mb-3">
                                                                    <label for="inputFile" class="form-label">Attached File</label>
                                                                    
                                                                    @if($purchaseOrder->FILE_PATH != "")
                                                                        <div>
                                                                            <!-- <a href="{{ route('po.download.file',['fileName' => $purchaseOrder->FILE_NAME, 'filePath' => $purchaseOrder->FILE_PATH]) }}" data-toggle="tooltip" data-placement="top" title="Download File"> -->
                                                                            <a href="{{ asset($purchaseOrder->FILE_PATH) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Download File">
                                                                                <i class="ri-file-line align-bottom me-2" style="font-size: 28px; color: red;"></i>
                                                                            </a>
                                                                        </div>

                                                                    @else
                                                                        <div>
                                                                            <p class="mt-2"><b>N/A</b></p>
                                                                        </div>  
                                                                    @endif
                                                                    
                                                                </div>
                                                            </div>

                                                    </div><!--end col-->
                                                    
                                                </div>
                                                
                                            </div>

                                        </div>
                                        <!-- end card -->

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
                                                                <input type="text" class="form-control " value="{{ $pol->SL }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label for="ITEM_CODE" class="form-label">Item Code<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $pol->ITEM_CODE }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label for="DELIVERY_DATE" class="form-label">Delivery Deadline<span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control" value="{{ $pol->DELIVERY_DATE }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-3">
                                                            <div>
                                                                <label for="PRODUCT_DESCRIPTION" class="form-label">Product Description</label>
                                                                
                                                                <textarea class="form-control" readonly>{{ $pol->PRODUCT_DESCRIPTION }}</textarea>
                                                                
                                                            </div>
                                                        </div><!--end col-->
                                                        
                                                    </div>


                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label for="UNIT" class="form-label">Unit<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{ $pol->UNIT }}" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label for="UNIT_PRICE" class="form-label">Unit Price<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control UNIT_PRICE" value="{{ $pol->UNIT_PRICE }}" data-id="0" id="UNIT_PRICE0" readonly>
                                                                
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-3">
                                                            <div class="mb-3">
                                                                <label for="QUANTITY" class="form-label">Quantity<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control QUANTITY" value="{{ $pol->QUANTITY }}" data-id="0" id="QUANTITY0" readonly>
                                                                
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

                                        @endforeach

                                        
                                    </div>
                                    <!-- end col -->


                                </div>
                                <!-- end row -->

                            @endforeach


                        </div>


                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">

                                    <div class="card-header">
                                        <h5 class="card-title mb-0">PO Details for Print</h5>
                                    </div>

                                    <div class="card-body">

                                        <form method="POST" action="{{ route('po.print.view') }}" enctype="multipart/form-data">

                                            @csrf

                                            <table id="buttons-datatables" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>No</th>
                                                        <th>PO No</th>
                                                        <th>Item Code</th>
                                                        <th>Unit</th>
                                                        <th>Unit Price</th>
                                                        <th>Quantity</th>
                                                        <th>Delivery Time</th>
                                                        <th>Create Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                
                                                    @foreach($purchaseOrderList as $key => $purchaseOrderList)

                                                        <tr>
                                                            <td><input type="checkbox" name="checkbox[]" value="{{ $purchaseOrderList->PURCHASE_ORDER_LIST_ID }}"></td>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $purchaseOrderList->PO_NO }}</td>
                                                            <td>{{ $purchaseOrderList->ITEM_CODE }}</td>
                                                            <td>{{ $purchaseOrderList->UNIT }}</td>
                                                            <td>{{ $purchaseOrderList->UNIT_PRICE }}</td>
                                                            <td>{{ $purchaseOrderList->QUANTITY }}</td>
                                                            <td>{{ $purchaseOrderList->DELIVERY_DATE }}</td>
                                                            <td>{{ Carbon\Carbon::parse($purchaseOrderList->created_at)->diffForHumans() }}</td>
                                                        </tr>

                                                    @endforeach

                                                </tbody>
                                            </table>

                                            <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                                <button type="submit" class="btn btn-success w-sm">
                                                    <i class="ri-printer-line align-bottom me-1"></i> Print
                                                </button>
                                            </div>

                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
   

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <script>
                    $(document).ready(function(){
                        $("form").submit(function(){
                            if ($('input:checkbox').filter(':checked').length < 1){
                                
                                swal.fire({
                                    title:"Error!",
                                    text:"You need to select at least one PO!",
                                    icon:"error",
                                    button:"Aww yiss!"
                                });

                                return false;
                            }
                        });
                    });
                </script>


    @endsection