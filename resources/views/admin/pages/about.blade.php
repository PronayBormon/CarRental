@extends('admin.master')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">About</h4>
            <p class="mg-b-0">Welcome to Admin Control panel.</p>
        </div>

        <div class="br-pagebody mg-t-5 pd-x-30">

            <div class="br-section-wrapper">
                <form method="post" action="{{ url('admin/update_about') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="">Description</label>
                                <textarea name="desc" id="summernote" cols="30" rows="4" class="form-control">{{$about->desc}}</textarea>
                            </div>
                            @error('desc')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <input type="text" hidden name="id" value="{{$about->id}}">
                        <button type="submit" class="btn btn-success">
                            Update
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
{{-- <div id="summernote"></div> --}}    
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    
<script>

  $('#summernote').summernote({
    placeholder: 'Enter Your Description',
    // tabsize: 2,
    height: 120,
    // // width: 100,
    // toolbar: [
    //   ['style', ['style']],
    //   ['font', ['bold', 'underline', 'clear']],
    //   ['color', ['color']],
    //   ['para', ['ul', 'ol', 'paragraph']],
    //   ['table', ['table']],
    //   ['insert', ['link', 'picture', 'video']],
    //   ['view', ['fullscreen', 'codeview', 'help']]
    // ]
  });
</script>
@endsection
