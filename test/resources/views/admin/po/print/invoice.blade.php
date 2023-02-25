@extends('admin.include.master')
    @section('content')

    @inject('carbon', 'Carbon\Carbon')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Invoice Details</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                                    <li class="breadcrumb-item active">Invoice Details</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                
                <div class="row p-4 noprint">
                    
                    <div class="col-sm">
                        <div class="d-flex justify-content-center">

                            <form method="POST" action="{{ route('po.list.store.bill') }}" id="billForm">

                                @csrf

                                @foreach($checkboxes as $listID)
                                    <input type="hidden" value="{{ $listID }}" name="checkboxes[]">
                                @endforeach

                                <button type="submit" class="btn btn-success w-sm bill-add-btn">
                                    <i class="ri-add-line align-bottom me-1"></i>
                                    Add Bill to Database
                                </button>

                            </form>

                            
                        </div>
                    </div>

                    @if(session('crudMsg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('crudMsg') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                </div>


                <script>

                    $(document).ready(function () {
                        $(".bill-add-btn").click(function(e){

                            e.preventDefault();
                            var dataString = $('#billForm').serialize();

                            // alert(dataString);

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                type:'POST',
                                url:"{{ route('po.list.store.bill') }}",
                                data:dataString,
                                success:function(data){
                                    // alert(data.itemCodes);
                                    // $("#billForm")[0].reset();

                                    if(data.error == 1){
                                        swal.fire({
                                            title:"Duplicate Entry!",
                                            text:"Item Code: "+data.itemCodes+" has been already inserted into database.",
                                            icon:"error",
                                            button:"Aww yiss!"
                                        });
                                    }
                                    else{

                                        swal.fire({
                                            title:"Success!",
                                            text:"You have inserted this bill to database!",
                                            icon:"success",
                                            button:"Aww yiss!"
                                        });

                                    }
                                    
                                    

                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                    alert(xhr.status);
                                    alert(thrownError);
                                }
                            });
                        });
                    });

                </script>
                                    

                <div class="row justify-content-center" id="print-bill">
                    <div class="col-xxl-9">
                        <div class="card" id="demo">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-header border-bottom-dashed p-4">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h2>BILL</h2>
                                                <!-- <p class="text-muted mb-0">Customer copy</p> -->
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!--end card-header-->
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="card-body p-4">
                                        <div class="row g-3">

                                            @foreach($getPoDetail as $key => $poDetail)

                                                @php($VAT = $poDetail->VAT)

                                                <div class="col-lg-3 col-4">
                                                    <p class=" mb-2 text-uppercase fw-semibold">Ref No</p>
                                                    <h5 class="fs-14 mb-0">{{ $poDetail->REF_NO }}</h5>
                                                </div>

                                            
                                                <div class="col-lg-3 col-4">
                                                    <p class=" mb-2 text-uppercase fw-semibold">PO NO</p>
                                                    <h5 class="fs-14 mb-0">{{ $poDetail->PO_NO }}</h5>
                                                </div>

                                                

                                                
                                                <div class="col-lg-3 col-4">
                                                    <p class=" mb-2 text-uppercase fw-semibold">Date</p>
                                                    <h5 class="fs-14 mb-0"><span id="invoice-date">{{ $carbon::parse(now())->format('m/d/Y') }}</h5>
                                                </div>
                                                
                                                <!-- <div class="col-lg-3 col-6">
                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Payment Status</p>
                                                    <span class="badge badge-soft-success fs-11"
                                                        id="payment-status">Paid</span>
                                                </div>
                                                
                                                <div class="col-lg-3 col-6">
                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Total Amount</p>
                                                    <h5 class="fs-14 mb-0">$<span id="total-amount">755.96</span></h5>
                                                </div> -->

                                            @endforeach
                                            
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="card-body p-4 border-top border-top-dashed">
                                        <div class="row g-3">

                                            @foreach($getCustomerDetail as $key => $customerDetail)
                                            
                                                <div class="col-6">
                                                    <h6 class=" text-uppercase fw-semibold mb-3">Billing Address
                                                    </h6>
                                                    <p class="fw-medium mb-2" id="billing-name">{{ $customerDetail->CUSTOMER_NAME }}</p>
                                                    <p class=" mb-1" id="billing-address-line-1">{{ $customerDetail->OFFICE_ADDRESS }}</p>
                                                    <p class=" mb-1"><span>Email: </span><span
                                                            id="billing-phone-no">{{ $customerDetail->EMAIL }}</span></p>
                                                    
                                                </div>
                                                <!--end col-->
                                                <div class="col-6">
                                                    <h6 class=" text-uppercase fw-semibold mb-3">Shipping Address
                                                    </h6>
                                                    <p class="fw-medium mb-2" id="shipping-name">{{ $customerDetail->CUSTOMER_NAME }}</p>
                                                    <p class=" mb-1" id="shipping-address-line-1">{{ $customerDetail->SHIPPING_ADDRESS }}</p>
                                                    <p class=" mb-1"><span>Email: </span><span
                                                            id="billing-phone-no">{{ $customerDetail->EMAIL }}</span></p>
                                                </div>
                                                <!--end col-->

                                            @endforeach

                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="card-body p-4">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-borderless text-center align-middle mb-0 printableTable">
                                                <thead style="background: #fd7e14;">
                                                    <tr>
                                                        <th scope="col">SL</th>
                                                        <th scope="col">Item Code</th>
                                                        <th scope="col" style="width: 40%;">Description</th>
                                                        <th scope="col">Unit</th>
                                                        <th scope="col">Qty</th>
                                                        <th scope="col">Unit Price</th>
                                                        <th scope="col" class="text-end">Total Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="products-list">

                                                    @php($sum_of_subtotal_price = 0)
                                                    @php($sum_of_vat = 0)

                                                    @foreach($checkboxes as $key => $poListId)

                                                        @php($poListDetail = App\Http\Controllers\Admin\PO\PurchaseOrderController::poListDetail($poListId))

                                                        @if(++$key == 1)

                                                        @endif

                                                        @foreach($poListDetail as $key => $data)

                                                            @php($subtotal_price = ($data->UNIT_PRICE)*($data->QUANTITY))
                                                            @php($sum_of_subtotal_price += $subtotal_price)

                                                            
                                                            @php($total_vat = $subtotal_price*($VAT/100))
                                                            @php($sum_of_vat += $total_vat)
                                                            @php($sum_of_vat = sprintf('%0.2f', $sum_of_vat))

                                                            <tr>
                                                                <th scope="row">{{ $data->SL }}</th>
                                                                <td>{{ $data->ITEM_CODE }}</td>
                                                                <td><span class="fw-medium">{{ $data->PRODUCT_DESCRIPTION }}</span></td>
                                                                <td>{{ $data->UNIT }}</td>
                                                                <td>{{ $data->QUANTITY }}</td>
                                                                <td>{{ $data->UNIT_PRICE }}</td>
                                                                <td class="text-end">{{ $subtotal_price }}</td>
                                                            </tr>

                                                        @endforeach

                                                    @endforeach

                                                    @php($sum_of_total_price = ceil($sum_of_subtotal_price + $sum_of_vat))

                                                    
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                        <div class="border-top border-top-dashed mt-2">
                                            <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto"
                                                style="width:250px">
                                                <tbody>
                                                    <tr>
                                                        <td>Sub Total</td>
                                                        <td class="text-end">৳{{ $sum_of_subtotal_price }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>VAT ({{ $VAT }}%)</td>
                                                        <td class="text-end">৳{{ $sum_of_vat }}</td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td>Discount <small class="text-muted">(VELZON15)</small></td>
                                                        <td class="text-end">- $53.99</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shipping Charge</td>
                                                        <td class="text-end">$65.00</td>
                                                    </tr> -->
                                                    <tr class="border-top border-top-dashed fs-15">
                                                        <th scope="row">Total Amount</th>
                                                        <th class="text-end">৳{{ $sum_of_total_price }}</th>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <!--end table-->

                                            </table>
                                            <!--end table-->
                                        </div>

                                        <div class="border-top border-top-dashed mt-2">
                                            <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto"
                                                style="width:250px">
                                                <tbody>

                                                    <tr class="border-top border-top-dashed fs-15">
                                                        <th scope="row">In Words:</th>
                                                        @php($getNumToWord = App\Http\Controllers\Admin\PO\PurchaseOrderController::numberToWord($sum_of_total_price))
                                                        <th class="text-end">{{ Str::upper($getNumToWord) }} TAKA ONLY</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end table-->

                                            </table>
                                            <!--end table-->
                                        </div>

                                        

                                        <div class="mt-4">
                                            <div class="alert alert-danger" style="background: #fd7e1470;color: black;font-weight: 600;">
                                                <p class="mb-0"><span class="fw-semibold">NOTES:</span>
                                                    <span id="note">Warranty 1 Year, for any kinds of manufacturing defect from the date of delivery.
                                                        If you have further query, please don't feel any kinds of hesiattion to contact with me.
                                                    </span>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row g-3">

                                            <div class="col-6">

                                                <div class="mt-3">
                                                    
                                                    <h6 class="fw-semibold mb-3" style="padding-bottom:70px;visibility:hidden;">Thanks & Regards</h6>
                                                    <hr class="mt-3" style="border-top:1px solid black; width:35%; opacity:1">
                                                    <p class="fw-semibold mb-1">Moon International</p>
                                                    <!-- <p class="mb-1">Authorised</p>
                                                    <p class="">Mobile: 01762688602 </p> -->
                                                </div>

                                            </div>

                                            <div class="col-6">

                                                <div class="mt-3">
                                                    <h6 class="fw-semibold mb-3" style="padding-bottom:70px;visibility:hidden;">Thanks & Regards</h6>
                                                    <div class="lineHorizontal__container lineHorizontal__container--rightAligned ">
                                                        <div class="lineHorizontal lineHorizontal--short"></div>
                                                    </div>
                                                    <h6 class="fw-semibold mb-3 mt-3 text-end">Received By</h6>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                            <a href="javascript:window.print()" class="btn btn-success billPrintBtn">
                                                <i class="ri-printer-line align-bottom me-1"></i> Print
                                            </a>
                                            
                                        </div>
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->


                <div class="row justify-content-center" id="print-challan">
                    <div class="col-xxl-9">
                        <div class="card" id="demo">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-header border-bottom-dashed p-4">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h2>CHALLAN</h2>
                                                <!-- <p class="text-muted mb-0">Customer copy</p> -->
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!--end card-header-->
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="card-body p-4">
                                        <div class="row g-3">

                                            @foreach($getPoDetail as $key => $poDetail)

                                                <div class="col-lg-3 col-4">
                                                    <p class=" mb-2 text-uppercase fw-semibold">Ref No</p>
                                                    <h5 class="fs-14 mb-0">{{ $poDetail->REF_NO }}</h5>
                                                </div>

                                            
                                                <div class="col-lg-3 col-4">
                                                    <p class=" mb-2 text-uppercase fw-semibold">PO NO</p>
                                                    <h5 class="fs-14 mb-0">{{ $poDetail->PO_NO }}</h5>
                                                </div>

                                                

                                                
                                                <div class="col-lg-3 col-4">
                                                    <p class=" mb-2 text-uppercase fw-semibold">Date</p>
                                                    <h5 class="fs-14 mb-0"><span id="invoice-date">{{ $carbon::parse(now())->format('m/d/Y') }}</h5>
                                                </div>
                                                
                                                <!-- <div class="col-lg-3 col-6">
                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Payment Status</p>
                                                    <span class="badge badge-soft-success fs-11"
                                                        id="payment-status">Paid</span>
                                                </div>
                                                
                                                <div class="col-lg-3 col-6">
                                                    <p class="text-muted mb-2 text-uppercase fw-semibold">Total Amount</p>
                                                    <h5 class="fs-14 mb-0">$<span id="total-amount">755.96</span></h5>
                                                </div> -->

                                            @endforeach
                                            
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="card-body p-4 border-top border-top-dashed">
                                        <div class="row g-3">

                                            @foreach($getCustomerDetail as $key => $customerDetail)
                                            
                                                <div class="col-6">
                                                    <h6 class=" text-uppercase fw-semibold mb-3">Billing Address
                                                    </h6>
                                                    <p class="fw-medium mb-2" id="billing-name">{{ $customerDetail->CUSTOMER_NAME }}</p>
                                                    <p class=" mb-1" id="billing-address-line-1">{{ $customerDetail->OFFICE_ADDRESS }}</p>
                                                    <p class=" mb-1"><span>Email: </span><span
                                                            id="billing-phone-no">{{ $customerDetail->EMAIL }}</span></p>
                                                    
                                                </div>
                                                <!--end col-->
                                                <div class="col-6">
                                                    <h6 class=" text-uppercase fw-semibold mb-3">Shipping Address
                                                    </h6>
                                                    <p class="fw-medium mb-2" id="shipping-name">{{ $customerDetail->CUSTOMER_NAME }}</p>
                                                    <p class=" mb-1" id="shipping-address-line-1">{{ $customerDetail->SHIPPING_ADDRESS }}</p>
                                                    <p class=" mb-1"><span>Email: </span><span
                                                            id="billing-phone-no">{{ $customerDetail->EMAIL }}</span></p>
                                                </div>
                                                <!--end col-->

                                            @endforeach

                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="card-body p-4">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-borderless text-center align-middle mb-0 printableTable">
                                                <thead style="background: #fd7e14;">
                                                    <tr>
                                                        <th scope="col">SL</th>
                                                        <th scope="col">Item Code</th>
                                                        <th scope="col" style="width: 40%;">Description</th>
                                                        <th scope="col">Unit</th>
                                                        <th scope="col">Qty</th>
                                                        <th scope="col">Delivery</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody id="products-list">

                                                    @php($sum_of_total_price = 0)

                                                    @foreach($checkboxes as $key => $poListId)

                                                        @php($poListDetail = App\Http\Controllers\Admin\PO\PurchaseOrderController::poListDetail($poListId))

                                                        @if(++$key == 1)

                                                        @endif

                                                        @foreach($poListDetail as $key => $data)

                                                            @php($total_price = ($data->UNIT_PRICE)*($data->QUANTITY))
                                                            @php($sum_of_total_price += $total_price)

                                                            <tr>
                                                                <th scope="row">{{ $data->SL }}</th>
                                                                <td>{{ $data->ITEM_CODE }}</td>
                                                                <td><span class="fw-medium">{{ $data->PRODUCT_DESCRIPTION }}</span></td>
                                                                <td>{{ $data->UNIT }}</td>
                                                                <td>{{ $data->QUANTITY }}</td>
                                                                
                                                                <td>OK</td>
                                                            </tr>

                                                        @endforeach

                                                    @endforeach

                                                    
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                        

                                        

                                        <div class="mt-4">
                                            <div class="alert alert-danger" style="background: #fd7e1470;color: black;font-weight: 600;">
                                                <p class="mb-0"><span class="fw-semibold">NOTES:</span>
                                                    <span id="note">Warranty 1 Year, for any kinds of manufacturing defect from the date of delivery.
                                                        If you have further query, please don't feel any kinds of hesiattion to contact with me.
                                                    </span>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row g-3">

                                            <div class="col-6">

                                                <div class="mt-3">
                                                    
                                                    <h6 class="fw-semibold mb-3" style="padding-bottom:70px;visibility:hidden;">Thanks & Regards</h6>
                                                    <hr class="mt-3" style="border-top:1px solid black; width:35%; opacity:1">
                                                    <p class="fw-semibold mb-1">Moon International</p>
                                                    <!-- <p class="mb-1">Authorised</p>
                                                    <p class="">Mobile: 01762688602 </p> -->
                                                </div>

                                            </div>

                                            <div class="col-6">

                                                <div class="mt-3">
                                                    <h6 class="fw-semibold mb-3" style="padding-bottom:70px;visibility:hidden;">Thanks & Regards</h6>
                                                    <div class="lineHorizontal__container lineHorizontal__container--rightAligned ">
                                                        <div class="lineHorizontal lineHorizontal--short"></div>
                                                    </div>
                                                    <h6 class="fw-semibold mb-3 mt-3 text-end">Received By</h6>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                            <a href="javascript:window.print()" class="btn btn-success challanPrintBtn">
                                                <i class="ri-printer-line align-bottom me-1"></i> Print
                                            </a>
                                        </div>
                                        
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

            </div><!-- container-fluid -->
        </div><!-- End Page-content -->

        <script type="text/javascript">

            $(document).ready(function () {

                $('.billPrintBtn').on('click', function() {

                    $("#print-challan").addClass("noprint");
                    $("#print-bill").removeClass("noprint");
                    
                });

                $('.challanPrintBtn').on('click', function() {

                    $("#print-bill").addClass("noprint");
                    $("#print-challan").removeClass("noprint");

                });

            });

        </script>

    @endsection