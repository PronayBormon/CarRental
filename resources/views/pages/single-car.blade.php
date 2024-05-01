@extends('master')
@section('content')
    <div class="page_barccard">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page_title">{{$cars->carname}} </h1>
                </div>
            </div>
        </div>
    </div>

    <section class="car_details">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="car_imgs">
                        <img src="{{ asset('/images/'.$cars->image) }}" alt="car-image" class="img-fluid w-100">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="car_detail">
                        <h2>{{$cars->carname}} </h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="car_item">
                                    <h1>{{$cars->cartransmission}}</h1>
                                    <p>TRANSMISSION</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="car_item">
                                    <h1>{{$cars->carseat}} Seats</h1>
                                    <p>SEAT</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="car_item">
                                    <h1>{{$cars->carinterior}}</h1>
                                    <p>INTERIOR</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="car_item">
                                    <h1>{{$cars->carcategory}}</h1>
                                    <p>Category</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="car_item">
                                    <h1>{{$cars->cartype}}</h1>
                                    <p>TYPE</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="car_item">
                                    <h1>{{$cars->carmake}}</h1>
                                    <p>Make</p>
                                </div>
                            </div>
                        </div>
                        <p>{{$cars->short_desc}}</p>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="car_item border-0">
                                    <h1>${{$cars->perhour}}/per hour</h1>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="car_item price_  border-0">
                                    <h1>${{$cars->perday}}/per Day</h1>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('booking') }}" class="btn_sc">Book Now <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="car_descriptions">
                        {!!$cars->desc!!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
