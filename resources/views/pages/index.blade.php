@extends('master')
@section('content')
    <!-- slider part start here  -->
    <section class="carousel_part ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12 px-0">
                    <div class="carousel_container owl-carousel">
                        <div class="ads_slide">
                            <img src="{{ url('frontend/images/COVETTE.jpg') }}" alt="" class="img-fluid">
                            <div class="details">
                                <p>THE ULTIMATE RIDE</p>
                                <h2>RENT YOU FANTACY RIDE TODAY</h2>
                            </div>
                        </div>
                        <div class="ads_slide">
                            <img src="{{ url('frontend/images/BMW 2.jpg') }}" alt="" class="img-fluid">
                            <div class="details">
                                <p>BEYOND ORDINARY</p>
                                <h2>ELEVATE YOUR JOURNEY WIH CLOUD9LUXCARS</h2>
                            </div>
                        </div>
                        {{-- <div class="ads_slide">
                            <img src="{{ url('frontend/images/BMW TR.jpg') }}" alt="" class="img-fluid">
                            <div class="details">
                                <p>Lorem ipsum dolor sit amet.</p>
                                <h2>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum, nemo!</h2>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider part end here  -->

    <!-- Luxury Services part start here  -->
    <seciton class="service">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec_title text-start">
                        <p>OUR COLLECTION</p>
                        <h1>Seamless Luxury Services</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 service_">
                    <div class="service_box">
                        <a href="#">
                            <img src="{{ url('frontend/images/services1_chauffeur_services.png') }}" alt=""
                                class="img-fluid">
                            <p>View more <i class="fa-solid fa-arrow-right"></i></p>
                        </a>
                    </div>
                    <h1>Luxury Vehicles</h1>
                    <p>CLOUD9LUXCARS provide a fleet of high-end vehicles from well-known luxury brands. This may include
                        cars from
                        manufacturers like Mercedes-Benz, BMW, Audi, Jaguar, and more.</p>
                </div>
                <div class="col-md-6 service_">
                    <div class="service_box">
                        <a href="#">
                            <img src="{{ url('frontend/images/services2_luxury_car.png') }}" alt=""
                                class="img-fluid">
                            <p>View more <i class="fa-solid fa-arrow-right"></i></p>
                        </a>
                    </div>
                    <h1>Chauffeur Services</h1>
                    <p>We offer chauffeur services, allowing customers to relax and enjoy the ride while a professional
                        driver
                        takes care of the transportation.</p>
                </div>

            </div>
        </div>
    </seciton>
    <!-- Luxury Services part end here  -->

    <!-- count about us part start here  -->
    <section class="cabout">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="sec_title text-start">
                        <p>ABOUT US</p>
                        <h1>Explore Cloud9luxcars</h1>
                        <span>Cloud9luxcars rental offers the epitome of luxury transportation, providing stylish and
                            spacious vehicles
                            for various occasions. Whether for weddings, corporate events, proms, or a night on the
                            town.</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="count_sec">
                        <div class="c_div">
                            <h1>210+</h1>
                            <p>Luxury Cars</p>
                        </div>
                        <div class="c_div">
                            <h1>15+</h1>
                            <p>Years of Experience</p>
                        </div>
                        <div class="c_div">
                            <h1>14k</h1>
                            <p>Happy Clients</p>
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
                        <p>TAKE A VIDEO TOUR</p>
                        <h1>EFun and Adventure Awaits</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- video section end here  -->

    <section class="slider_part">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec_title">
                        <p>EXCLUSIVE COLLECTION</p>
                        <h1>Premier Cloud9luxcars Rentals</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="proSlider pSlider owl-carousel">
                        @foreach ($cars as $car)
                            <div class="pro_slide">
                                <a href="{{ url('singleCar', ['slug' => $car->slug]) }}" class="d-block">
                                    <img src="{{ asset('/images/'.$car->image) }}" alt="" class="img-fluid">
                                    <h1>${{ $car->perhour }}/<span>per hour</span> </h1>
                                    <h2>{{ $car->carname }}</h2>
                                    <p>View More info <i class="fa-solid fa-arrow-right"></i></p>
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
                            <p>TOP-NOTCH TREASURES</p>
                            <h1>We guarantee an <br>
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
                        <p>EXCLUSIVE COLLECTION</p>
                        <h1>Photo Gallery</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(1).jpg') }}" alt=""
                            class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(2).jpg') }}" alt=""
                            class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(3).jpg') }}" alt=""
                            class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(4).jpg') }}" alt=""
                            class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(5).jpg') }}" alt=""
                            class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(6).jpg') }}" alt=""
                            class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(7).jpg') }}" alt=""
                            class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(8).jpg') }}" alt=""
                            class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(9).jpg') }}" alt=""
                            class="img-fluid"></div>
                </div>
                <div class="col-md-3">
                    <div class="g_img"><img src="{{ url('frontend/images/gallery/gallary_image(10).jpg') }}" alt=""
                            class="img-fluid"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- gallery part end here  -->
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
@endsection
