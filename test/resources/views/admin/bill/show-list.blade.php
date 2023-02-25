@extends('admin.include.master')
    @section('content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Bill Lists</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bill</a></li>
                                            <li class="breadcrumb-item active">Lists</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-lg-12">

                                @if(session('crudMsg'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('crudMsg') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <div class="card">

                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Bill</h5>
                                    </div>

                                    <div class="card-body">
                                        <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>PO No</th>
                                                    <th>Item Code</th>
                                                    <th>Customer</th>
                                                    <th>Status</th>
                                                    <th>Unit Price</th>
                                                    <th>Qty</th>
                                                    <th>VAT, AIT</th>
                                                    <th>Creator</th>
                                                    <th>Create Time</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                               
                                                @foreach($billList as $key => $billList)

                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $billList->PO_NO }}</td>
                                                        <td>{{ $billList->ITEM_CODE }}</td>
                                                        <td>{{ $billList->CUSTOMER_NAME }}</td>
                                                        <td>
                                                            @if($billList->STATUS == 'DUE')
                                                                <span class="badge text-bg-danger">{{ $billList->STATUS }}</span>
                                                            @else
                                                                <span class="badge text-bg-success">{{ $billList->STATUS }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $billList->UNIT_PRICE }}</td>
                                                        <td>{{ $billList->QUANTITY }}</td>
                                                        <td>{{ $billList->VAT }}%, {{ $billList->AIT }}%</td>
                                                        <td>{{ $billList->name }}</td>
                                                        <td>{{ Carbon\Carbon::parse($billList->created_at)->diffForHumans() }}</td>
                                                        <td>
                                                            <div class="dropdown d-inline-block">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill align-middle"></i>
                                                                </button>

                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li>
                                                                        <a href="{{ route('bill.print.view',$billList->PURCHASE_ORDER_LIST_ID) }}" target="_blank" class="dropdown-item">
                                                                            <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                            View
                                                                        </a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="javascript:void(0)" data-id="{{$billList->BILL_LIST_ID}}" data-url="{{ route('bill.editpage.load',$billList->BILL_LIST_ID) }}" class="dropdown-item edit-item-btn edit-modal">
                                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                            Edit
                                                                        </a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="{{ route('bill.delete',$billList->BILL_LIST_ID) }}" class="dropdown-item edit-item-btn" onclick="return confirm('Are you sure you want to delete this?');">
                                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                            Delete
                                                                        </a>
                                                                    </li>

                                                                </ul>

                                                            </div>
                                                        </td>
                                                    </tr>

                                                @endforeach

                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                <!-- Edit Modal -->
                <div class="modal fade" id="editModalShow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Bill Status</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form class="mt-3" id="billEditForm" method="POST" action="{{ route('bill.update') }}" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="BILL_LIST_ID" id="BILL_LIST_ID">

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">PO No</label>
                                        <input type="text" class="form-control" name="PO_NO" id="PO_NO" readonly>
                                        @error('PO_NO')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Item Code</label>
                                        <input type="text" class="form-control" name="ITEM_CODE" id="ITEM_CODE" readonly>
                                        @error('ITEM_CODE')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Status<span class="text-danger">*</span></label>
                                        <select class="form-select" name="STATUS" aria-label="Disabled select example" id="select-status">
                                            <option selected value=""></option>
                                            <option>Select Status</option>
                                            <option value="DUE">DUE</option>
                                            <option value="PAID">PAID</option>
                                        </select>
                                        @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-success btn-submit" style="background:blue;">Update</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>


                <script type="text/javascript">

                    $(document).ready(function () {

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });


                        $('.table').on('click', '.edit-modal', function () {

                            // var url = $(this).data('url');
                            var billID = $(this).data('id');
                            var url = '/bill/load/'+billID;
                            // alert(billID);


                            $.get(url, function (data) {
                                $('#editModalShow').modal('show');
                                $('#BILL_LIST_ID').val(data.BILL_LIST_ID);
                                $('#PO_NO').val(data.PO_NO);
                                $('#ITEM_CODE').val(data.ITEM_CODE);

                                $("#select-status option").first().attr("value",data.STATUS);
                                $("#select-status option").first().html(data.STATUS);
                            
                            })


                            // $.ajax({
                            //     type:'get',
                            //     url:url,
                            //     success:function(data){

                            //         $('#editModalShow').modal('show');

                            //         $('#BILL_LIST_ID').val(data.BILL_LIST_ID);
                            //         $('#PO_NO').val(data.PO_NO);
                            //         $('#ITEM_CODE').val(data.ITEM_CODE);

                            //         $("#select-status option").first().attr("value",data.STATUS);
                            //         $("#select-status option").first().html(data.STATUS);

                            //     }
                            // });

                        });


                    });

                </script>



    @endsection