@extends('admin.master')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">Edit Car</h4>
            <p class="mg-b-0">Welcome to the Admin Control Panel. </p>
        </div>

        <div class="br-pagebody mg-t-5 pd-x-30">
            <div class="br-section-wrapper">
                <form action="{{ route('update.car', $car->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="">Car name</label>
                                <input type="text" name="carname" value="{{ $car->carname }}" placeholder="Enter car name...." class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Car Transmission</label>
                                <input type="text" name="cartransmission" value="{{ $car->cartransmission }}" placeholder="Enter car transmission...." class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Car Seat</label>
                                <input type="number" name="carseat" value="{{ $car->carseat }}" placeholder="0" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Car Interior</label>
                                <input type="text" name="carinterior" value="{{ $car->carinterior }}" placeholder="Enter car interior...." class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Car Category</label>
                                <input type="text" name="carcategory" value="{{ $car->carcategory }}" placeholder="Enter car category...." class="form-control">
                            </div>
                            <div class="from-group mb-2">
                                <label for="">Car Type</label>
                                <input type="text" name="cartype" value="{{ $car->cartype }}" placeholder="Enter car type...." class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Car Make</label>
                                <input type="text" name="carmake" value="{{ $car->carmake }}" placeholder="Enter car make...." class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Fear per hour</label>
                                <input type="text" name="perhour" value="{{ $car->perhour }}" placeholder="00.00" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Fear per Day</label>
                                <input type="text" name="perday" value="{{ $car->perday }}" placeholder="00.00" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Short description</label>
                                <textarea name="short_desc" id="" cols="30" rows="3" class="form-control">{{ $car->short_desc }}</textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Description</label>
                                <textarea name="desc" id="" cols="30" rows="3" class="form-control">{{ $car->desc }}</textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control">
                                <img src="{{ asset('images/' . $car->image) }}" alt="{{ $car->carname }}" style="max-width: 100px;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>
@endsection

@section('script')
@endsection
