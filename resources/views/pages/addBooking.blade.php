@extends('master')
@section('content')
    <style>
        .book_section {
            padding: 30px 0px;
        }

        .book_section label {
            color: #fff;
        }
    </style>
    <div class="page_barccard" style="background-image: url({{ url('frontend/images/about_us_banner.png') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page_title">Booking</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="book_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <form method="post" action="{{ url('add_booking') }}" enctype="multipart/form-data">
                        @method('post')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="pickup_date" class="col-form-label text-md-right">Pickup Date</label>
                                    <input id="pickup_date" type="date" value="{{ session('booking.pickup_date') }}"
                                        class="form-control rounded-0 @error('pickup_date') is-invalid @enderror"
                                        name="pickup_date" value="{{ old('pickup_date') }}" required autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="pickup_time" class="col-form-label text-md-right">Pickup Time</label>
                                    <input id="pickup_time" value="{{ session('booking.pickup_date') }}" type="time"
                                        class="form-control rounded-0" name="pickup_time" value="{{ old('pickup_time') }}"
                                        required autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="return_date" class=" col-form-label text-md-right">Return Date</label>
                                    <input id="return_date" type="date" value="{{ session('booking.pickup_date') }}"
                                        class="form-control rounded-0 @error('return_date') is-invalid @enderror"
                                        name="return_date" value="{{ old('return_date') }}" required>

                                    @error('return_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group mb-2">
                                    <label for="drop_time" class="col-form-label text-md-right">Return Time</label>
                                    <input id="drop_time" value="{{ session('booking.pickup_date') }}" type="time"
                                        class="form-control rounded-0" name="drop_time" value="{{ old('drop_time') }}"
                                        required autofocus>
                                </div>
                            </div>
                            <div class="col-md-12">

                                <div class="form-group mb-2">
                                    <label for="pickup_location" class="col-form-label text-md-right">Pickup
                                        Location</label>
                                    <select id="pickup_location"
                                        class="form-control rounded-0 @error('pickup_location') is-invalid @enderror"
                                        name="pickup_location" required>
                                        <option value="" selected disabled>Select Pickup Location</option>
                                        @foreach ($location as $loc)
                                            <option value="{{ $loc->location }}"
                                                {{ session('booking.pickup_location') == $loc->location ? 'selected' : '' }}>
                                                {{ $loc->location }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="drop_location" class=" col-form-label text-md-right">Return
                                        Location</label>

                                    <select id="drop_location"
                                        class="form-control rounded-0 @error('drop_location') is-invalid @enderror"
                                        name="drop_location" required>
                                        <option value="" selected disabled>Select Drop Location</option>
                                        @foreach ($location as $location)
                                            <option value="{{ $location->location }}"
                                                {{ session('booking.drop_location') == $loc->location ? 'selected' : '' }}>
                                                {{ $location->location }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary border-0 rounded-0 w-100">
                                Book Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
