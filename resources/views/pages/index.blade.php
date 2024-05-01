@extends('master')
@section('content')

    {{-- banner part start here  --}}
    <section class="bannerPart position-relative">
        <video src="{{ url('frontend/video/car(1).mp4') }}" autoplay muted loop style="position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;"></video>
        <div class="container">
            <div class="row">
                <div class="col-md-4 ms-auto">
                    <div class="card border-0 rounded-0 p-4">
                        <form method="post" action="{{ url('add_booking') }}" enctype="multipart/form-data">
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
                                            class="form-control rounded-0" name="pickup_time"
                                            value="{{ old('pickup_time') }}" required autofocus>
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
        </div>
    </section>
    {{-- banner part end here  --}}

    <!-- Luxury Services part start here  -->
    <seciton class="service">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec_title text-start">
                        <p class="animate__fadeIn">OUR COLLECTION</p>
                        <h1 class="animate__fadeIn">Seamless Luxury Services</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 service_">
                    <div class="service_box">
                        <a href="{{ url('cars') }}">
                            <img src="{{ url('frontend/images/services1_chauffeur_services.png') }}" alt=""
                                class="img-fluid">
                            <p>View more <i class="fa-solid fa-arrow-right"></i></p>
                        </a>
                    </div>
                    <h1 class="animate__fadeIn">Luxury Vehicles</h1>
                    <p class="animate__fadeIn">CLOUD9LUXCARS provide a fleet of high-end vehicles from well-known luxury
                        brands. This may include
                        cars from
                        manufacturers like Mercedes-Benz, BMW, Audi, Jaguar, and more.</p>
                </div>
                <div class="col-md-6 service_">
                    <div class="service_box">
                        <a href="{{ url('cars') }}">
                            <img src="{{ url('frontend/images/services2_luxury_car.png') }}" alt=""
                                class="img-fluid">
                            <p>View more <i class="fa-solid fa-arrow-right"></i></p>
                        </a>
                    </div>
                    <h1 class="animate__fadeIn">Chauffeur Services</h1>
                    <p class="animate__fadeIn">We offer chauffeur services, allowing customers to relax and enjoy the ride
                        while a professional
                        driver
                        takes care of the transportation.</p>
                </div>

            </div>
        </div>
    </seciton>
    <!-- Luxury Services part end here  -->


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sec_title">
                    <p class="animate__fadeIn">EXCLUSIVE COLLECTION</p>
                    <h1 class="animate__fadeIn">Premier Brands</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="brands_section bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-3">
                    <img src="{{ url('frontend/images/brands/Bentley-Black-1.svg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-2 col-md-2 col-3">
                    <img src="{{ url('frontend/images/brands/BMW-Black-1.svg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-2 col-md-2 col-3">
                    <img src="{{ url('frontend/images/brands/Cadillac-Black-1.svg') }}" alt=""
                        class="img-fluid">
                </div>
                <div class="col-lg-2 col-md-2 col-3">
                    <img src="{{ url('frontend/images/brands/Chevrolet-Black-1.svg') }}" alt=""
                        class="img-fluid">
                </div>
                <div class="col-lg-2 col-md-2 col-3">
                    <img src="{{ url('frontend/images/brands/Ferrari-2-Black-1.svg') }}" alt=""
                        class="img-fluid">
                </div>
                <div class="col-lg-2 col-md-2 col-3">
                    <img src="{{ url('frontend/images/brands/Ford-Black.svg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-2 col-md-2 col-3">
                    <img src="{{ url('frontend/images/brands/Jeep-Black.svg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-2 col-md-2 col-3">
                    <img src="{{ url('frontend/images/brands/Lamborgini-2-Black.svg') }}" alt=""
                        class="img-fluid">
                </div>
                <div class="col-lg-2 col-md-2 col-3">
                    <img src="{{ url('frontend/images/brands/Land-Rover-Black.svg') }}" alt=""
                        class="img-fluid">
                </div>
                <div class="col-lg-2 col-md-2 col-3">
                    <img src="{{ url('frontend/images/brands/Maserati-Black-1.svg') }}" alt=""
                        class="img-fluid">
                </div>
                <div class="col-lg-2 col-md-2 col-3">
                    <img src="{{ url('frontend/images/brands/Mclaren-Black.svg') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>


    <!-- count about us part start here  -->
    <section class="cabout">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="sec_title text-start">
                        <p class="animate__fadeIn">ABOUT US</p>
                        <h1 class="animate__fadeIn">Explore Cloud9luxcars</h1>
                        <span class="animate__fadeIn">Cloud9luxcars rental offers the epitome of luxury transportation,
                            providing stylish and
                            spacious vehicles
                            for various occasions. Whether for weddings, corporate events, proms, or a night on the
                            town.</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="count_sec">
                        <div class="c_div">
                            <h1 class="animate__fadeIn">210+</h1>
                            <p class="animate__fadeIn">Luxury Cars</p>
                        </div>
                        <div class="c_div">
                            <h1 class="animate__fadeIn">15+</h1>
                            <p class="animate__fadeIn">Years of Experience</p>
                        </div>
                        <div class="c_div">
                            <h1 class="animate__fadeIn">14k</h1>
                            <p class="animate__fadeIn">Happy Clients</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- count about us part end here  -->

    <!-- video section start here  -->
    <section class="video_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec_title ">
                        <button type="button" class="btn btn-default-outline text-white" style="font-size: 26px"
                            data-bs-toggle="modal" data-bs-target="#videoModal">
                            <i class="fa-regular fa-circle-play"></i>
                        </button>
                        <p class="animate__fadeIn">TAKE A VIDEO TOUR</p>
                        <h1 class="animate__fadeIn">EFun and Adventure Awaits</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- video section end here  -->

    <!-- Video Trigger Button -->



    <section class="slider_part">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec_title">
                        <p class="animate__fadeIn">EXCLUSIVE COLLECTION</p>
                        <h1 class="animate__fadeIn">Premier Cloud9luxcars Rentals</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="proSlider pSlider owl-carousel">
                        @foreach ($cars as $car)
                            <div class="pro_slide">
                                <a href="{{ url('singleCar', ['slug' => $car->slug]) }}" class="d-block">
                                    <img src="{{ asset('/images/' . $car->image) }}" alt="" class="img-fluid">
                                    <h1 class="animate__fadeIn">${{ $car->perhour }}/<span>per hour</span> </h1>
                                    <h2 class="animate__fadeIn">{{ $car->carname }}</h2>
                                    <p class="animate__fadeIn">View More info <i class="fa-solid fa-arrow-right"></i></p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gaurantee section start here  -->
    <section class="gurrentee">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box_g">
                        <div class="sec_title text-start">
                            <p class="animate__fadeIn">TOP-NOTCH TREASURES</p>
                            <h1 class="animate__fadeIn">We guarantee an <br>
                                unparalleled experience</h1>
                            <a href="{{ url('booking') }}" class="btn_sc">Book now <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- gurruntee section end here  -->


    <!-- gallery part start here  -->
    <section class="image_gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec_title">
                        <p class="animate__fadeIn">EXCLUSIVE COLLECTION</p>
                        <h1 class="animate__fadeIn">Photo Gallery</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(1).jpg') }}"
                            alt="" class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(2).jpg') }}"
                            alt="" class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(3).jpg') }}"
                            alt="" class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(4).jpg') }}"
                            alt="" class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(5).jpg') }}"
                            alt="" class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(6).jpg') }}"
                            alt="" class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(7).jpg') }}"
                            alt="" class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(8).jpg') }}"
                            alt="" class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(9).jpg') }}"
                            alt="" class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(10).jpg') }}"
                            alt="" class="img-fluid"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- gallery part end here  -->


    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Videos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Embedded Video -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <video id="modalVideo" style="width: 100%" controls muted class="embed-responsive-item">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".carousel_container").owlCarousel({
                items: 1,
                loop: true,
                // margin: 10,
                dots: false,
                // dots: true,
                autoplay: true,
                autoplayTimeout: 3500,
            });
        });
        $(document).ready(function() {
            $(".pSlider").owlCarousel({
                items: 4,
                loop: true,
                // center: true, 
                // margin: 10,
                dots: false,
                // dots: true,
                autoplay: true,
                autoplayTimeout: 3000,
                // autoplayHoverPause: true
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        // nav: true
                    },
                    600: {
                        items: 3,
                        // nav: false
                    },
                    1000: {
                        items: 4,
                        nav: true,
                        // loop: false
                    }
                }
            });
        });
    </script>
    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function() {
            $('#videoModal').on('shown.bs.modal', function(e) {
                console.log('Modal shown.');
                playRandomVideo();
            });

            // Function to play a random video
            function playRandomVideo() {
                var videos = [
                    "{{ url('frontend/video/car(1).mp4') }}",
                    "{{ url('frontend/video/car(2).mp4') }}",
                    "{{ url('frontend/video/car(3).mp4') }}",
                    "{{ url('frontend/video/car(4).mp4') }}",
                    "{{ url('frontend/video/car(5).mp4') }}",
                ];
                var randomIndex = Math.floor(Math.random() * videos.length);
                var modalVideo = document.getElementById('modalVideo');
                modalVideo.src = videos[randomIndex];
                modalVideo.load();
                modalVideo.play();
            }
        });
    </script>
@endsection
