@extends('admin.master')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">Add new car</h4>
            <p class="mg-b-0">Welcome to Admin Control panel. </p>
        </div>

        <div class="br-pagebody mg-t-5 pd-x-30">
            <div class="br-section-wrapper">
                <form action="{{ url('admin/saveCar') }}" method="post" enctype="multipart/form-data">
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
                                <input type="text" name="carname" value="{{ old('carname') }}"
                                    placeholder="Enter car name...." class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Car Transmission</label>
                                <input type="text" name="cartransmission" value="{{ old('cartransmission') }}"
                                    placeholder="Enter car transmission...." class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Car Seat</label>
                                <input type="number" name="carseat" value="{{ old('carseat') }}" placeholder="0"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Car Interior</label>
                                <input type="text" name="carinterior" value="{{ old('carinterior') }}"
                                    placeholder="Enter car interior...." class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Car Category</label>
                                <input type="text" name="carcategory" value="{{ old('carcategory') }}"
                                    placeholder="Enter car category...." class="form-control">
                            </div>
                            <div class="from-group mb-2">
                                <label for="">Car Type</label>
                                <input type="text" name="cartype" value="{{ old('cartype') }}"
                                    placeholder="Enter car type...." class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Car Make</label>
                                <input type="text" name="carmake" value="{{ old('carmake') }}"
                                    placeholder="Enter car make...." class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Fear per hour</label>
                                <input type="text" name="perhour" value="{{ old('perhour') }}" placeholder="00.00"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Fear per Day</label>
                                <input type="text" name="perday" value="{{ old('perday') }}" placeholder="00.00"
                                    class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Short description</label>
                                <textarea name="short_desc" id="" cols="30" rows="3" class="form-control">{{ old('short_desc') }}</textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Description</label>
                                <textarea name="desc" id="summernote" cols="30" rows="3" class="form-control">{{ old('desc') }}</textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">image</label>
                                <input type="file" name="image" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>
@endsection

@section('script')
{{-- <div id="summernote"></div> --}}    
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    
<script>

  $('#summernote').summernote({
    placeholder: 'Enter Your Description',
    tabsize: 2,
    height: 120,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
</script>
@endsection
