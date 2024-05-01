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
                    <div class="text-center d-flex justify-content-center">
                        <a href="{{ url('booking') }}">Booking</a>
                        &nbsp;>> &nbsp; <a href="{{ url('selectcars') }}">Select Car</a>
                        <p class="page_title">&nbsp;>> &nbsp;Customer information</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="book_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 order-md-last">
                    <div class="card rounded-0 m-1 p-4">
                        @if ('booking')
                            <h4>Pickup <a href="{{ url('booking') }}" style="font-size:12px; color:#000;"><i
                                        class="fa-solid fa-pen"></i></a></h4>
                            <p class="m-0">{{ session('booking.pickup_date') }} @
                                {{ session('booking.pickup_time') }}</p>
                            <p>Location: {{ session('booking.pickup_location') }}</p>
                            <br>

                            <h4>Return <a href="{{ url('booking') }}" style="font-size:12px; color:#000;"><i
                                        class="fa-solid fa-pen"></i></a></h4>
                            <p class="m-0">{{ session('booking.return_date') }} @
                                {{ session('booking.drop_time') }}</p>
                            <p>Location: {{ session('booking.drop_location') }}</p>
                        @else
                            <p>No booking data found!</p>
                        @endif

                        @if (session()->has('car'))
                            <h4>Car information <a href="{{ url('selectcars') }}" style="font-size:12px; color:#000;"><i
                                        class="fa-solid fa-pen"></i></a></h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <h6>Car Name: {{ session('car.carname') }}</h6>
                                        <td>{{ session('car.duration') }}</td>
                                        <td>${{ session('car.singleamt') }}</td>
                                        <td class="text-end">${{ session('car.amount') }}</td>
                                    </tr>
                                </thead>
                            </table>
                            <h6 class="text-end">${{ session('car.amount') }}</h6>
                        @else
                            <p>No booking data found!</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div id="cars-container" class="row">
                        <form id="payment-form" class="needs-validation" method="POST" action="{{ url('orderSubmit') }}"
                            novalidate="">
                            @csrf
                            <input type="hidden" name="carid" value="{{ session('car.carid') }}">
                            <input type="hidden" name="pickup_date" value="{{ session('booking.pickup_date') }}">
                            <input type="hidden" name="pickup_time" value="{{ session('booking.pickup_time') }}">
                            <input type="hidden" name="pickup_location" value="{{ session('booking.pickup_location') }}">
                            <input type="hidden" name="drop_location" value="{{ session('booking.drop_location') }}">
                            <input type="hidden" name="return_date" value="{{ session('booking.return_date') }}">
                            <input type="hidden" name="drop_time" value="{{ session('booking.drop_time') }}">
                            <input type="hidden" name="rent_type" value="{{ session('car.rent_type') }}">
                            <input type="hidden" name="totalCost" value="{{ session('car.amount') }}">


                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">First name</label>
                                    <input type="text" name="name" class="form-control" id="firstName" placeholder=""
                                        value="" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="col-sm-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder=""
                                        value="" required>
                                    <div class="invalid-feedback">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email <span
                                            class="text-muted text-danger">(Optional)</span></label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="you@example.com">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="1234 Main St" required>
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                                {{-- <div class="col-12">
                                    <label for="address2" class="form-label">Address 2 <span
                                            class="text-muted text-danger">(Optional)</span></label>
                                    <input type="text" class="form-control" id="address2" name="address2"
                                        placeholder="Apartment or suite">
                                        @error('address2')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div> --}}

                                <div class="col-md-12">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" class="form-control" id="country" name="country"
                                        placeholder="Apartment or suite">
                                        @error('country')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                            </div>

                            <hr class="my-4">
                            <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
