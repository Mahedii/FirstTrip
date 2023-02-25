@extends('admin.include.master')
    @section('content')

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

                <div class="row justify-content-center">
                    <div class="col-xxl-9">
                        <div class="card" id="demo">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-header border-bottom-dashed p-4">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h2>BILL</h2>
                                                <p class="text-muted mb-0">Customer copy</p>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!--end card-header-->
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="card-body p-4">
                                        <div class="row g-3">
                                            <div class="col-lg-3 col-6">
                                                <p class="text-muted mb-2 text-uppercase fw-semibold">Ref No</p>
                                                <h5 class="fs-14 mb-0">#VL<span id="invoice-no">25000355</span></h5>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-3 col-6">
                                                <p class="text-muted mb-2 text-uppercase fw-semibold">Date</p>
                                                <h5 class="fs-14 mb-0"><span id="invoice-date">23 Nov, 2021</span>
                                                    <small class="text-muted" id="invoice-time">02:36PM</small></h5>
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
                                            
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="card-body p-4 border-top border-top-dashed">
                                        <div class="row g-3">
                                            <div class="col-6">
                                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Billing Address
                                                </h6>
                                                <p class="fw-medium mb-2" id="billing-name">David Nichols</p>
                                                <p class="text-muted mb-1" id="billing-address-line-1">305 S San Gabriel
                                                    Blvd</p>
                                                <p class="text-muted mb-1"><span>Phone: +</span><span
                                                        id="billing-phone-no">(123) 456-7890</span></p>
                                                <p class="text-muted mb-0"><span>Tax: </span><span
                                                        id="billing-tax-no">12-3456789</span> </p>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6">
                                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Shipping Address
                                                </h6>
                                                <p class="fw-medium mb-2" id="shipping-name">David Nichols</p>
                                                <p class="text-muted mb-1" id="shipping-address-line-1">305 S San
                                                    Gabriel Blvd</p>
                                                <p class="text-muted mb-1"><span>Phone: +</span><span
                                                        id="shipping-phone-no">(123) 456-7890</span></p>
                                            </div>
                                            <!--end col-->
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
                                                class="table table-borderless text-center table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr class="table-active">
                                                        <th scope="col" style="width: 50px;">SL</th>
                                                        <th scope="col">Item Code</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col">Unit</th>
                                                        <th scope="col">Qty</th>
                                                        <th scope="col">Unit Price BDT</th>
                                                        <th scope="col" class="text-end">Total Price BDT</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="products-list">
                                                    <tr>
                                                        <th scope="row">01</th>
                                                        <td></td>
                                                        <td>
                                                            <span class="fw-medium">Sweatshirt for Men (Pink)</span>
                                                        </td>
                                                        <td>PC</td>
                                                        <td>02</td>
                                                        <td>119.99</td>
                                                        <td class="text-end">$239.98</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">02</th>
                                                        <td></td>
                                                        <td>
                                                            <span class="fw-medium">Noise NoiseFit Endure Smart Watch</span>  
                                                        </td>
                                                        <td>PC</td>
                                                        <td>01</td>
                                                        <td>94.99</td>
                                                        <td class="text-end">$94.99</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">03</th>
                                                        <td></td>
                                                        <td>
                                                            <span class="fw-medium">350 ml Glass Grocery Container</span>
                                                        </td>
                                                        <td>PC</td>
                                                        <td>01</td>
                                                        <td>24.99</td>
                                                        <td class="text-end">$24.99</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">04</th>
                                                        <td></td>
                                                        <td>
                                                            <span class="fw-medium">Fabric Dual Tone Living Room Chair</span>
                                                        </td>
                                                        <td>PC</td>
                                                        <td>01</td>
                                                        <td>340.00</td>
                                                        <td class="text-end">$340.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end table-->
                                        </div>
                                        <div class="border-top border-top-dashed mt-2">
                                            <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto"
                                                style="width:250px">
                                                <tbody>
                                                    <!-- <tr>
                                                        <td>Sub Total</td>
                                                        <td class="text-end">$699.96</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Estimated Tax (12.5%)</td>
                                                        <td class="text-end">$44.99</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Discount <small class="text-muted">(VELZON15)</small></td>
                                                        <td class="text-end">- $53.99</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shipping Charge</td>
                                                        <td class="text-end">$65.00</td>
                                                    </tr> -->
                                                    <tr class="border-top border-top-dashed fs-15">
                                                        <th scope="row">Total Amount</th>
                                                        <th class="text-end">$1234</th>
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
                                                        @php($getNumToWord = App\Http\Controllers\Admin\PO\PurchaseOrderController::numberToWord(1205550))
                                                        <th class="text-end">{{ Str::upper($getNumToWord) }} TAKA ONLY</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end table-->

                                            </table>
                                            <!--end table-->
                                        </div>

                                        

                                        <div class="mt-4">
                                            <div class="alert alert-info">
                                                <p class="mb-0"><span class="fw-semibold">NOTES:</span>
                                                    <span id="note">All accounts are to be paid within 7 days from
                                                        receipt of invoice. To be paid by cheque or
                                                        credit card or direct payment online. If account is not paid
                                                        within 7
                                                        days the credits details supplied as confirmation of work
                                                        undertaken
                                                        will be charged the agreed quoted fee noted above.
                                                    </span>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <h6 class="fw-semibold mb-3" style="padding-bottom:70px">Best Regards:</h6>
                                            <p class="mb-1">Md. Rafiqul Islam </p>
                                            <p class="mb-1">Assistant Engineer </p>
                                            <p class="mb-1">Moon International </p>
                                            <p class="">Mobile: 01321156673 </p>
                                        </div>

                                        <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                            <a href="javascript:window.print()" class="btn btn-success"><i
                                                    class="ri-printer-line align-bottom me-1"></i> Print</a>
                                            <a href="javascript:void(0);" class="btn btn-primary"><i
                                                    class="ri-download-2-line align-bottom me-1"></i> Download</a>
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

    @endsection