    <!-- footer links  -->
    <?php
    // use Illuminate\Support\Facades\DB;
    
    // $contacts = DB::table('contacts')->first();
    // ?>

    <section class="footer_top py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center log_ab">
                    <a href="javascript:" style="text-decoration: none;">
                        <img src="{{ url('frontend/images/logo.png') }}" class="img-fluid" style="max-width: 200px;"
                            alt="">
                    </a>
                    <p>We provided Rental services in all three counties. PALM BEACH COUNTY, BROWARD COUNTY, DADE COUNTY.
                    </p>

                </div>
                <div class="col-md-3 tab_hide">
                    <div class="qcLink">
                        <h2>Important links</h2>
                        <ul>
                            {{-- <li><a href="wedo.html#core">Core Service Areas</a></li>
                            <li><a href="wedo.html#consult_model">Our Consulting Model</a></li> --}}
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('booking') }}">Booking </a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 tab_hide">
                    <div class="qcLink">
                        <h2>Who We Are </h2>
                        <ul>
                            <li><a href="{{ url('/about-us') }}">About us</a></li>
                            <li><a href="{{ url('contact-us') }}">Contact Us </a></li>
                            {{-- <li><a href="team.html">Our Team</a></li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="address">
                        <p class="fw-bold mb-0">Address </p>
                        
                    
                        <a href="#" style="list-style: none;text-decoration: none;">7444 Royal Palm blvd Coral Springs FL 34953.</a>
                        <ul class="d-flex justify-content-center mt-2 align-items-center"
                            style="list-style: none; padding: 0;">
                            <li class="me-2"><a href="https://www.instagram.com/cloud9luxcars/"><i
                                        class="fa-solid fa-brands fa-instagram"></i></a>
                            </li>
                            <li class="me-2"><a href="#"><i class="fa-solid fa-brands fa-facebook"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer  -->
    <footer class="footer_bottom py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        <p class="text-center">© 2024 Cloud9luxcars.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
