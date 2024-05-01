<?php

use Illuminate\Support\Facades\DB;
use App\Models\Contact;

$contact = DB::table('contacts')->first();

?>
<section class="head_top  d-none  d-md-block bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="address head_i">
                    <ul class="d-flex  justify-content-center justify-content-md-start mt-2 align-items-center"
                        style="list-style: none; padding: 0;">

                        <li class="me-2"><a href="tel:{{ $contact->phone }}"><i
                                    class="fa-solid fa-phone "></i>{{ $contact->phone }}</a>
                        </li>

                        <li class="me-2"><a href="mailto:{{ $contact->email }}"><i
                                    class="fa-regular fa-envelope"></i>{{ $contact->email }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6">

                <div class="address">
                    <ul class="d-flex  justify-content-center justify-content-md-end mt-2 align-items-center"
                        style="list-style: none; padding: 0;">
                        <li class="me-2"><a href="{{ $contact->instagram }}"><i
                                    class="fa-solid fa-brands fa-instagram"></i></a>
                        </li>

                        <li class="me-2"><a href="{{ $contact->facebook }}"><i
                                    class="fa-solid fa-brands fa-facebook"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<nav class="navbar navbar-expand-lg bg_color position-sticky top-0 z-3" style="background: #0a0b0f">
    <div class="container">

        <a class="navbar-brand m-0 me-auto d- d-lg-none" href="{{ url('/') }}">
            <img src="{{ url('frontend/images/logo.png') }}" alt="" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-con"></span>
            <i class="fa-solid fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" style="background: #0a0b0f" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/cars') }}">Our Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('booking') }}">Booking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/about-us') }}">About us</a>
                </li>
            </ul>
            <a class="navbar-brand d-none d-lg-block" href="{{ url('/') }}">
                <img src="{{ url('frontend/images/logo.png') }}" alt="" class="img-fluid">
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/contact-us') }}">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active btn_sc px-1" href="tel:{{ $contact->phone }}">Call: {{ $contact->phone }}</a>
                </li>
                <li class="nav-item px-0">
                    <a class="nav-link active px-0" href="https://wa.link/nbp8un">
                        <img src="{{ url('/frontend/images/whatsapp.png') }}" width="20px" alt="" class="img-fluid">
                    </a>
                </li>
                <li class="nav-item px-0">
                    <a class="nav-link active px-0" href="https://t.me/+Uvd-Uy_VKjkwNDdh">
                        <img src="{{ url('/frontend/images/telegram.png') }}" width="20px" alt="" class="img-fluid">
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
