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
                        <p class="page_title">&nbsp;>> &nbsp;Select Car </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="book_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card rounded-0 m-1 p-4">
                        @if ('booking')
                            <h4>Pickup <a href="{{ url('booking') }}" style="font-size:12px; color:#000;"><i
                                        class="fa-solid fa-pen"></i></a></h4>
                            <ul>
                                <p class="m-0">{{ session('booking.pickup_date') }} @
                                    {{ session('booking.pickup_time') }}</p>
                                <p>Location: {{ session('booking.pickup_location') }}</p>
                            </ul>
                            <br>

                            <h4>Return <a href="{{ url('booking') }}" style="font-size:12px; color:#000;"><i
                                        class="fa-solid fa-pen"></i></a></h4>
                            <ul>
                                <p class="m-0">{{ session('booking.return_date') }} @
                                    {{ session('booking.drop_time') }}</p>
                                <p>Location: {{ session('booking.drop_location') }}</p>
                            </ul>
                        @else
                            <p>No booking data found!</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div id="cars-container" class="row">
                        @foreach ($cars as $car)
                            <div class="col-lg-4 col-md-6">
                                <form action="{{ url('addCar') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row bg-light prolist p-3">
                                        <div class="col-md-12">
                                            <img src="{{ asset('/images/' . $car->image) }}" alt=""
                                                class="w-100 img-fluid">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="hidden" name="carid" value="{{ $car->id }}">
                                            <input type="hidden" name="carname" value="{{ $car->carname }}">
                                            <input type="hidden" name="perhour" value="{{ $car->perhour }}">
                                            <input type="hidden" name="perday" value="{{ $car->perday }}">

                                            <h6 class="mt-2 mb-0"><strong>{{ $car->carname }}</strong></h6>
                                            <p>${{ $car->perhour }}/<span>per hour</span> &nbsp;
                                                ${{ $car->perday }}/<span>per hour</span> </p>
                                            <div class="form-group mb-2">
                                                <select id="rent_type"
                                                    class="form-control rounded-0 @error('rent_type') is-invalid @enderror"
                                                    name="rent_type" required>
                                                    <option value="" selected disabled>Select rent type </option>
                                                    <option value="1">By hour</option>
                                                    <option value="2">By day</option>

                                                </select>
                                            </div>
                                            <button type="submit"
                                                class="btn border-0 btn-primary w-100 text-center">Book</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
