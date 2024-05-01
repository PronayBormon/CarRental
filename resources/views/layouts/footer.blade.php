    <!-- footer links  -->
    <?php
    
    use Illuminate\Support\Facades\DB;
    use App\Models\Contact;
    
    $contact = DB::table('contacts')->first();
    
    ?>

    <section class="footer_top py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center log_ab">
                    <a href="javascript:" style="text-decoration: none;">
                        <img src="{{ url('frontend/images/logo.png') }}" class="img-fluid" style="max-width: 200px;"
                            alt="">
                    </a>
                    <p>{!!$contact->desc!!}
                    </p>

                </div>
                <div class="col-md-3 col-6">
                    <div class="qcLink">
                        <h2>Important links</h2>
                        <ul>
                            {{-- <li><a href="wedo.html#consult_model">Our Consulting Model</a></li> --}}
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('booking') }}">Booking </a></li>
                            <li><a href="{{url('terms&condition')}}">Terms & Conditions</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-6">
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
                        <p class="fw-bold mb-0"><strong>Address</strong>
                        </p>

                        <a href="#" style="list-style: none;text-decoration: none;">
                                {{ $contact->address }}
                        </a>
                        <ul class="d-flex justify-content-center mt-2 align-items-center"
                            style="list-style: none; padding: 0;">
                            
                            <li class="me-2"><a href="{{ $contact->instagram }}"><i
                                        class="fa-solid fa-brands fa-instagram"></i></a>
                            </li>
                            
                            <li class="me-2"><a href="{{ $contact->facebook }}"><i class="fa-solid fa-brands fa-facebook"></i></a>
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

 
