@extends('admin.include.master')
    @section('content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Edit Tender Info</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tender Info List</a></li>
                                            <li class="breadcrumb-item active">Edit</li>
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

                                <form method="POST" action="{{ route('tender.info.update', $tenderInfo->SLUG) }}" enctype="multipart/form-data">

                                    @csrf

                                    <div class="row">

                                        <div class="col-lg-12">

                                            <div class="card">

                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">Edit Tender Info</h4>
                                                    
                                                </div><!-- end card header -->

                                                <div class="card-body">

                                                    <div class="row">


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="TENDER_ID" class="form-label">Tender ID <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('TENDER_ID') is-invalid @enderror" value="{{ $tenderInfo->TENDER_ID }}" name="TENDER_ID">
                                                                @if ($errors->has('TENDER_ID'))
                                                                    <span class="text-danger">{{ $errors->first('TENDER_ID') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="ORGANIZATION" class="form-label">Organization <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('ORGANIZATION') is-invalid @enderror" value="{{ $tenderInfo->ORGANIZATION }}" name="ORGANIZATION">
                                                                @if ($errors->has('ORGANIZATION'))
                                                                    <span class="text-danger">{{ $errors->first('ORGANIZATION') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="AMOUNT" class="form-label">Amount <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('AMOUNT') is-invalid @enderror" value="{{ $tenderInfo->AMOUNT }}" name="AMOUNT">
                                                                @if ($errors->has('AMOUNT'))
                                                                    <span class="text-danger">{{ $errors->first('AMOUNT') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="YEAR" class="form-label">Year <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('YEAR') is-invalid @enderror" value="{{ $tenderInfo->YEAR }}" name="YEAR">
                                                                @if ($errors->has('YEAR'))
                                                                    <span class="text-danger">{{ $errors->first('YEAR') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="PURCHASE_DEADLINE" class="form-label">Delivery Deadline <span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control @error('PURCHASE_DEADLINE') is-invalid @enderror" value="{{ $tenderInfo->PURCHASE_DEADLINE }}" name="PURCHASE_DEADLINE">
                                                                @if ($errors->has('PURCHASE_DEADLINE'))
                                                                    <span class="text-danger">{{ $errors->first('PURCHASE_DEADLINE') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="TOTAL_PURCHASE_AMOUNT" class="form-label">Total Purchase Amount (৳) <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('TOTAL_PURCHASE_AMOUNT') is-invalid @enderror" value="{{ $tenderInfo->TOTAL_PURCHASE_AMOUNT }}" name="TOTAL_PURCHASE_AMOUNT">
                                                                @if ($errors->has('TOTAL_PURCHASE_AMOUNT'))
                                                                    <span class="text-danger">{{ $errors->first('TOTAL_PURCHASE_AMOUNT') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="TOTAL_ITEMS" class="form-label">Total Items <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('TOTAL_ITEMS') is-invalid @enderror" value="{{ $tenderInfo->TOTAL_ITEMS }}" name="TOTAL_ITEMS" id="TOTAL_ITEMS">
                                                                @if ($errors->has('TOTAL_ITEMS'))
                                                                    <span class="text-danger">{{ $errors->first('TOTAL_ITEMS') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="PURCHASE_QUANTITY" class="form-label">Purchase Quantity <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('PURCHASE_QUANTITY') is-invalid @enderror" value="{{ $tenderInfo->PURCHASE_QUANTITY }}" name="PURCHASE_QUANTITY" id="PURCHASE_QUANTITY">
                                                                @if ($errors->has('PURCHASE_QUANTITY'))
                                                                    <span class="text-danger">{{ $errors->first('PURCHASE_QUANTITY') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="PURCHASE_DUE_ITEMS" class="form-label">Purchase Due Items <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('PURCHASE_DUE_ITEMS') is-invalid @enderror" value="{{ $tenderInfo->PURCHASE_DUE_ITEMS }}" name="PURCHASE_DUE_ITEMS" id="PURCHASE_DUE_ITEMS">
                                                                @if ($errors->has('PURCHASE_DUE_ITEMS'))
                                                                    <span class="text-danger">{{ $errors->first('PURCHASE_DUE_ITEMS') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="DELIVERY_ITEMS" class="form-label">Delivery Items <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('DELIVERY_ITEMS') is-invalid @enderror" value="{{ $tenderInfo->DELIVERY_ITEMS }}" name="DELIVERY_ITEMS" id="DELIVERY_ITEMS">
                                                                @if ($errors->has('DELIVERY_ITEMS'))
                                                                    <span class="text-danger">{{ $errors->first('DELIVERY_ITEMS') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="ITEMS_DELIVERY_DUE" class="form-label">Items Delivery Due <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control @error('ITEMS_DELIVERY_DUE') is-invalid @enderror" value="{{ $tenderInfo->ITEMS_DELIVERY_DUE }}" name="ITEMS_DELIVERY_DUE" id="ITEMS_DELIVERY_DUE">
                                                                @if ($errors->has('ITEMS_DELIVERY_DUE'))
                                                                    <span class="text-danger">{{ $errors->first('ITEMS_DELIVERY_DUE') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        

                                                        <div class="col-md-6">
                                                            <div>
                                                                <label for="DESCRIPTION" class="form-label">Description <span class="text-danger">*</span></label>
                                                                
                                                                <textarea class="form-control" name="DESCRIPTION" rows="3">
                                                                    {{ $tenderInfo->DESCRIPTION }}
                                                                </textarea>
                                                                @if ($errors->has('DESCRIPTION'))
                                                                    <span class="text-danger">{{ $errors->first('DESCRIPTION') }}</span>
                                                                @endif
                                                            </div>
                                                        </div><!--end col-->

                                                        
                                                    </div>

                                                    
                                                </div>
                                            </div>
                                            <!-- end card -->

                                            <div class="text-end mb-3">
                                                <button type="submit" class="btn btn-success w-sm">Update Tender Info</button>
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


                <script type="text/javascript">

                    $(document).ready(function () {



                        $('#PURCHASE_QUANTITY').on('keyup', function() {

                            var PURCHASE_QUANTITY = $('#PURCHASE_QUANTITY').val();
                            var TOTAL_ITEMS = $('#TOTAL_ITEMS').val();

                            var PURCHASE_DUE_ITEMS = TOTAL_ITEMS-PURCHASE_QUANTITY;

                            $('#PURCHASE_DUE_ITEMS').val(PURCHASE_DUE_ITEMS);

                            
                        });


                        $('#DELIVERY_ITEMS').on('keyup', function() {

                            var DELIVERY_ITEMS = $('#DELIVERY_ITEMS').val();
                            var TOTAL_ITEMS = $('#TOTAL_ITEMS').val();

                            var ITEMS_DELIVERY_DUE = TOTAL_ITEMS-DELIVERY_ITEMS;

                            $('#ITEMS_DELIVERY_DUE').val(ITEMS_DELIVERY_DUE);


                        });




                    });

                </script>


    @endsection