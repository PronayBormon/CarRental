@extends('admin.master')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">Add Location</h4>
            <p class="mg-b-0">Welcome to Admin Control panel.</p>
        </div>

        <div class="br-pagebody mg-t-5 pd-x-30">

            <div class="br-section-wrapper">
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
                    <div class="col-md-6 m-auto">
                        <form method="post" action="{{ url('admin/update-location') }}">
                            @csrf
                            @method('PUT') <!-- Specify the method as PUT for updating -->
                            <input type="hidden" name="id" value="{{ $location->id }}"> <!-- Add a hidden input field for ID -->
                            <div class="form-group mb-2">
                                <label for="">Location</label>
                                <input type="text" name="location" value="{{ $location->location }}" placeholder="Location" class="form-control">
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Update Location</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection

@section('script')
@endsection
