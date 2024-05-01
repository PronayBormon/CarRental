@extends('admin.master')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">Add Booking</h4>
            <p class="mg-b-0">Welcome to Admin Control panel.</p>
        </div>

        <div class="br-pagebody mg-t-5 pd-x-30">

            <div class="br-section-wrapper">
                <form method="post" action="{{ url('admin/add_booking') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="carid" class="col-form-label text-md-right">Selct Car</label>
                                <select id="carid" class="form-control @error('pickup_location') is-invalid @enderror"
                                    name="carid" required>
                                    <option value="" selected disabled>Select Car</option>
                                    @foreach ($cars as $car)
                                        <option value="{{ $car->id }}">{{ $car->carname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="pickup_date" class="col-form-label text-md-right">Pickup Date</label>
                                <input id="pickup_date" type="date"
                                    class="form-control @error('pickup_date') is-invalid @enderror" name="pickup_date"
                                    value="{{ old('pickup_date') }}" required autofocus>
                            </div>
                            <div class="form-group mb-2">
                                <label for="pickup_time" class="col-form-label text-md-right">Pickup Time</label>
                                <input id="pickup_time" type="time" class="form-control" name="pickup_time"
                                    value="{{ old('pickup_time') }}" required autofocus>
                            </div>
                            <div class="form-group mb-2">
                                <label for="pickup_location" class="col-form-label text-md-right">Pickup
                                    Location</label>
                                <select id="pickup_location"
                                    class="form-control @error('pickup_location') is-invalid @enderror"
                                    name="pickup_location" required>
                                    <option value="" selected disabled>Select Pickup Location</option>
                                    @foreach ($location as $loc)
                                        <option value="{{ $loc->location }}">{{ $loc->location }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="drop_location" class="col-form-label text-md-right">Drop Location</label>
                                <select id="drop_location" class="form-control @error('drop_location') is-invalid @enderror"
                                    name="drop_location" required>
                                    <option value="" selected disabled>Select Drop Location</option>
                                    @foreach ($location as $location)
                                        <option value="{{ $location->location }}">{{ $location->location }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="return_date" class=" col-form-label text-md-right">Return Date</label>
                                <input id="return_date" type="date"
                                    class="form-control @error('return_date') is-invalid @enderror" name="return_date"
                                    value="{{ old('return_date') }}" required>

                                @error('return_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="drop_time" class="col-form-label text-md-right">Drop Time</label>
                                <input id="drop_time" type="time" class="form-control" name="drop_time"
                                    value="{{ old('drop_time') }}" required autofocus>
                            </div>
                            <div class="form-group mb-2">
                                <label for="rent_type" class=" col-form-label text-md-right">Rent type</label>

                                <select id="rent_type" class="form-control @error('rent_type') is-invalid @enderror"
                                    name="rent_type" required>
                                    <option value="" selected disabled>Select rent type </option>
                                    <option value="1">By hour</option>
                                    <option value="2">By day</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="customer_name" class=" col-form-label text-md-right">Customer name</label>
                                <input id="customer_name" required type="text"
                                    class="form-control @error('customer_name') is-invalid @enderror" name="customer_name"
                                    value="{{ old('customer_name') }}" required>
                            </div>
                            <div class="form-group ">
                                <label for="phone" class=" col-form-label text-md-right">Phone</label>
                                <input id="phone" required type="text"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" required>
                            </div>
                            <div class="form-group ">
                                <label for="email" class=" col-form-label text-md-right">Email</label>
                                <input id="email" required type="text"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group ">
                                <label for="address" class=" col-form-label text-md-right">Address 1</label>
                                <input id="address" required type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" required>
                            </div>
                            <div class="form-group ">
                                <label for="address2" class=" col-form-label text-md-right">Address 2</label>
                                <input id="address2" required type="text"
                                    class="form-control @error('address2') is-invalid @enderror" name="address2"
                                    value="{{ old('address2') }}" required>
                            </div>
                            <div class="form-group ">
                                <label for="country" class=" col-form-label text-md-right">Country</label>
                                <input id="country" required type="text"
                                    class="form-control @error('country') is-invalid @enderror" name="country"
                                    value="{{ old('country') }}" required>
                            </div>
                        </div>
                    </div>



                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">
                            Book Now
                        </button>
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
