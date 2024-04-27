@extends('master')
@section('content')
    <div class="page_barccard">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page_title">Our cars </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- cars container start here  -->
    <section class="cars">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec_title">
                        <h1 class="text-start">Browse Our Luxury Collection</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="cars-container" class="row">
                        @foreach ($cars as $car)
                            <div class="col-lg-3 col-md-4">
                                <div class="pro_slide">
                                    <a href="{{ url('singleCar', ['slug' => $car->slug]) }}" class="d-block">
                                        <img src="{{ asset('/images/' . $car->image) }}" alt="" class="img-fluid">
                                        <h1>${{ $car->perhour }}/<span>per hour</span> </h1>
                                        <h2>{{ $car->carname }}</h2>
                                        <p>View More info <i class="fa-solid fa-arrow-right"></i></p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cars containers part end here  -->
@endsection

@section('script')
    <script>
        $(document).on('click', '#pagination-links a', function(event) {
            event.preventDefault();
            var url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'get',
                success: function(response) {
                    $('#cars-container').html(response);
                }
            });
        });
    </script>
@endsection
