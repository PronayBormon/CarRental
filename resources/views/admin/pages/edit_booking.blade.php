@extends('admin.master')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">Edit Booking</h4>
            <p class="mg-b-0">Welcome to Admin Control panel.</p>
        </div>

        <div class="br-pagebody mg-t-5 pd-x-30">

            <div class="br-section-wrapper">
                <form method="post" action="{{url('admin/update_rent')}}" enctype="multipart/form-data">
                    @csrf
                    @method("POST")
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="carid" class="col-form-label text-md-right">Select Car</label>
                                <select id="carid" class="form-control" name="carid" required>
                                    <option value="" selected disabled>Select Car</option>
                                    @foreach ($cars as $car)
                                        <option value="{{ $car->id }}" {{ $car->id == $rent->carid ? 'selected' : '' }}>{{ $car->carname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="pickup_date" class="col-form-label text-md-right">Pickup Date</label>
                                <input id="pickup_date" type="date" class="form-control" name="pickup_date" value="{{ $rent->pickup_date }}" required autofocus>
                            </div>
                            <div class="form-group mb-2">
                                <label for="pickup_time" class="col-form-label text-md-right">Pickup Time</label>
                                <input id="pickup_time" type="time" class="form-control" name="pickup_time" value="{{ $rent->pickup_time }}" required autofocus>
                            </div>
                            <div class="form-group mb-2">
                                <label for="pickup_location" class="col-form-label text-md-right">Pickup Location</label>
                                <select id="pickup_location" class="form-control" name="pickup_location" required>
                                    <option value="" selected disabled>Select Pickup Location</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->location }}" {{ $location->location == $rent->pickup_location ? 'selected' : '' }}>{{ $location->location }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="drop_location" class="col-form-label text-md-right">Drop Location</label>
                                <select id="drop_location" class="form-control" name="drop_location" required>
                                    <option value="" selected disabled>Select Drop Location</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->location }}" {{ $location->location == $rent->drop_location ? 'selected' : '' }}>{{ $location->location }}</option>
                                    @endforeach
                                </select>
                            </div>                            
                            <div class="form-group mb-2">
                                <label for="return_date" class="col-form-label text-md-right">Return Date</label>
                                <input id="return_date" type="date" class="form-control" name="return_date" value="{{ $rent->return_date }}" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="drop_time" class="col-form-label text-md-right">Drop Time</label>
                                <input id="drop_time" type="time" class="form-control" name="drop_time" value="{{ $rent->drop_time }}" required autofocus>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="rent_type" class="col-form-label text-md-right">Rent type</label>
                                <select id="rent_type" class="form-control" name="rent_type" required>
                                    <option value="" selected disabled>Select Rent Type</option>
                                    <option value="1" {{ $rent->rent_type == 1 ? 'selected' : '' }}>By hour</option>
                                    <option value="2" {{ $rent->rent_type == 2 ? 'selected' : '' }}>By day</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="customer_name" class="col-form-label text-md-right">Customer name</label>
                                <input id="customer_name" type="text" class="form-control" name="customer_name" value="{{ $rent->customer_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="contact_number" class="col-form-label text-md-right">Contact Number</label>
                                <input id="contact_number" type="text" class="form-control" name="contact_number" value="{{ $rent->contact_number }}" required>
                            </div>
                            <div class="form-group">
                                <label for="approval_status" class="col-form-label text-md-right">Approval Status</label>
                                <select id="approval_status" class="form-control" name="approval_status" required>
                                    <option value="" selected disabled>Select Approval Status</option>
                                    <option value="1" {{ $rent->approval_status == 1 ? 'selected' : '' }}>Approved</option>
                                    <option value="0" {{ $rent->approval_status == 0 ? 'selected' : '' }}>Not Approved</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="payment_status" class="col-form-label text-md-right">Payment Status</label>
                                <select id="payment_status" class="form-control" name="payment_status" required>
                                    <option value="" selected disabled>Select Approval Status</option>
                                    <option value="1" {{ $rent->payment_status == 1 ? 'selected' : '' }}>Paid</option>
                                    <option value="0" {{ $rent->payment_status == 0 ? 'selected' : '' }}>Pending</option>
                                </select>
                            </div>
                            <input type="text" value="{{$rent->id}}" name="rent_id" hidden>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">Update Booking</button>
                    </div>
                </form>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection

@section('script')
@endsection
