@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Booked Package</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Bookings</a></li>
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

                    @foreach ($bookedPackageData as $bookedPackage)

                    <form method="POST" action="{{ route('bookings.update') }}" enctype="multipart/form-data" id="tourPackageForm">

                        @csrf

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card">

                                    <div class="card-body">

                                        <div class="row">

                                            <input type="hidden" name="id" value="{{$bookedPackage->id}}">

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="NAME" class="form-label">Name<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('NAME') is-invalid @enderror" value="{{ $bookedPackage->NAME }}" name="NAME">
                                                    @if ($errors->has('NAME'))
                                                        <span class="text-danger">{{ $errors->first('NAME') }}</span>
                                                    @endif
                                                </div>

                                            </div><!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="Booked PAckage" class="form-label">Booked Package<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" value="{{ $bookedPackage->PACKAGE_NAME }}" disabled>

                                                </div>

                                            </div><!--end col-->


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="Date" class="form-label">Booked Date<span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control @error('START_DATE') is-invalid @enderror" value="{{ $bookedPackage->START_DATE }}" name="START_DATE">
                                                    @if ($errors->has('START_DATE'))
                                                        <span class="text-danger">{{ $errors->first('START_DATE') }}</span>
                                                    @endif
                                                </div>

                                            </div><!--end col-->


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="CONTACT_NO" class="form-label">Phone<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('CONTACT_NO') is-invalid @enderror" value="{{ $bookedPackage->CONTACT_NO }}" name="CONTACT_NO">
                                                    @if ($errors->has('CONTACT_NO'))
                                                        <span class="text-danger">{{ $errors->first('CONTACT_NO') }}</span>
                                                    @endif
                                                </div>

                                            </div><!--end col-->


                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="EMAIL" class="form-label">Email<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('EMAIL') is-invalid @enderror" value="{{ $bookedPackage->EMAIL }}" name="EMAIL">
                                                    @if ($errors->has('EMAIL'))
                                                        <span class="text-danger">{{ $errors->first('EMAIL') }}</span>
                                                    @endif
                                                </div>

                                            </div><!--end col-->

                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="TOTAL_PAX" class="form-label">Total Pax<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('TOTAL_PAX') is-invalid @enderror" value="{{ $bookedPackage->TOTAL_PAX }}" name="TOTAL_PAX">
                                                    @if ($errors->has('TOTAL_PAX'))
                                                        <span class="text-danger">{{ $errors->first('TOTAL_PAX') }}</span>
                                                    @endif
                                                </div>

                                            </div><!--end col-->

                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="TOTAL_ADULT" class="form-label">Total Adult<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('TOTAL_ADULT') is-invalid @enderror" value="{{ $bookedPackage->TOTAL_ADULT }}" name="TOTAL_ADULT">
                                                    @if ($errors->has('TOTAL_ADULT'))
                                                        <span class="text-danger">{{ $errors->first('TOTAL_ADULT') }}</span>
                                                    @endif
                                                </div>

                                            </div><!--end col-->

                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="TOTAL_CHILD" class="form-label">Total Child<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('TOTAL_CHILD') is-invalid @enderror" value="{{ $bookedPackage->TOTAL_CHILD }}" name="TOTAL_CHILD">
                                                    @if ($errors->has('TOTAL_CHILD'))
                                                        <span class="text-danger">{{ $errors->first('TOTAL_CHILD') }}</span>
                                                    @endif
                                                </div>

                                            </div><!--end col-->

                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="TOTAL_INFANT" class="form-label">Total Infant<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('TOTAL_INFANT') is-invalid @enderror" value="{{ $bookedPackage->TOTAL_INFANT }}" name="TOTAL_INFANT">
                                                    @if ($errors->has('TOTAL_INFANT'))
                                                        <span class="text-danger">{{ $errors->first('TOTAL_INFANT') }}</span>
                                                    @endif
                                                </div>

                                            </div><!--end col-->


                                        </div>


                                    </div>
                                </div>
                                <!-- end card -->


                                <div class="text-end mb-3">
                                    <button type="submit" class="btn btn-success w-sm">Update</button>
                                </div>
                            </div>
                            <!-- end col -->


                        </div>
                        <!-- end row -->

                    </form>

                    @endforeach


                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    @endsection
