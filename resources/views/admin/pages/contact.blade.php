@extends('admin.master')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">Update Contacts </h4>
            <p class="mg-b-0">Welcome to Admin Control panel.</p>
        </div>

        <div class="br-pagebody mg-t-5 pd-x-30">

            <div class="br-section-wrapper">
                <form method="post" action="{{ url('admin/update_contact') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="">Email address</label>
                                <input type="email" name="email" value="{{$contact->email}}" class="form-control">
                            </div>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="">Phone</label>
                                <input type="text" name="phone" value="{{$contact->phone}}" class="form-control">
                            </div>
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="">Facebook</label>
                                <input type="text" name="facebook" value="{{$contact->facebook}}" class="form-control">
                            </div>
                            @error('facebook')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="">Instagrame</label>
                                <input type="text" name="instagram" value="{{$contact->instagram}}"  class="form-control">
                            </div>
                            @error('instagram')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="">Address</label>
                                <input type="text" name="address"  value="{{$contact->address}}" class="form-control">
                            </div>
                            @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="">Description</label>
                                <textarea name="desc" id="summernote" cols="30" rows="4" class="form-control">{{$contact->desc}}</textarea>
                            </div>
                            @error('desc')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <input type="text" hidden name="id" value="{{$contact->id}}">
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
