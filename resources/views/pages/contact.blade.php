@extends('master')
@section('content')
    <div class="page_barccard" style="background-image: url({{ url('frontend/images/about_us_banner.png') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page_title">Contact Us </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- about us sction start here  -->



    <section class="ab_us">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="sec_title text-start" bis_skin_checked="1">
                        {{-- <p>ABOUT US</p> --}}
                        <h1>Address</h1>
                        <span>{{$contact->address}} </span>

                        <div class="address" bis_skin_checked="1">
                            <ul class="d-flex justify-content-start mt-2 align-items-center"
                                style="list-style: none; padding: 0;">
                                <li class="me-2">
                                    <a href="{{$contact->instagram}}"><i
                                            class="fa-solid fa-brands fa-instagram"></i></a>
                                </li>
                                <li class="me-2"><a href="{{$contact->facebook}}"><i
                                            class="fa-solid fa-brands fa-facebook"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact_box">
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="35"
                                    viewBox="0 0 34 35" fill="none">
                                    <path
                                        d="M14.5047 6.50824C15.8121 7.81908 15.8121 10.1495 14.5047 11.4603L12.0353 13.7907C13.9237 17.5775 17.41 21.0731 21.1867 22.9665L23.5109 20.4905C24.8183 19.1797 27.1424 19.1797 28.4498 20.4905L32.2266 24.2774C33.5339 25.5882 33.5339 27.7729 32.0813 29.2294L28.4498 32.8706C21.1867 40.153 -5.10553 13.645 2.15753 6.50824L5.78906 2.86703C7.24167 1.41054 9.42059 1.41054 10.7279 2.86703L14.5047 6.50824ZM20.0246 2.86703C18.8626 2.57573 19.2983 0.682302 20.6057 0.973599C27.1424 2.72138 32.2266 7.81908 33.9697 14.3733C34.2602 15.6841 32.3718 16.121 32.0813 14.9559C30.4835 9.12991 25.9804 4.46916 20.0246 2.86703ZM18.8626 7.38213C17.5552 7.09084 18.1363 5.19741 19.2983 5.4887C24.2372 6.79954 28.1593 10.732 29.4666 15.6841C29.7571 16.8493 27.8688 17.4319 27.5782 16.121C26.4161 11.8972 23.0751 8.54732 18.8626 7.38213ZM13.0521 7.81908L9.42059 4.17787C8.83954 3.59527 7.82271 3.59527 7.24167 4.17787L3.61014 7.81908C-1.76452 13.2081 21.7678 36.8031 27.1424 31.4141L30.774 27.7729C31.355 27.1903 31.355 26.1708 30.774 25.5882L27.1424 21.947C26.5614 21.2187 25.5446 21.2187 24.8183 21.947L22.0583 24.7143C21.7678 25.0056 21.332 25.1513 20.8962 25.0056C16.3931 22.9665 12.0353 18.5971 10.0016 14.082C9.85637 13.7907 9.85637 13.2081 10.2922 12.9168L13.0521 10.1495C13.7784 9.42121 13.7784 8.40167 13.0521 7.81908Z"
                                        fill="#C2A56B"></path>
                                </svg>

                                <h6><a href="tel:{{$contact->phone}}">Phone</a></h6>
                                <p>{{$contact->phone}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact_box">
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="28"
                                    viewBox="0 0 33 28" fill="none">
                                    <path
                                        d="M30.2858 25.5813H30.3358V25.5313V10.6588V10.5762L30.2626 10.6145L16.4806 17.8395L16.4805 17.8395C16.3532 17.9065 16.2135 17.9399 16.0743 17.9399C15.935 17.9399 15.7953 17.9065 15.668 17.8395L15.668 17.8395L1.88742 10.6145L1.8142 10.5761V10.6588V25.5313V25.5813H1.8642H30.2858ZM30.309 8.58346L30.3358 8.56942V8.53917V2.76979V2.71979H30.2858H1.8642H1.8142V2.76979V8.53917V8.56941L1.84098 8.58346L16.051 16.0334L16.0743 16.0456L16.0975 16.0334L30.309 8.58346ZM0.9321 0.938672H31.2179C31.7048 0.938672 32.1 1.33685 32.1 1.82923V26.4719C32.1 26.9642 31.7048 27.3624 31.2179 27.3624H0.9321C0.445247 27.3624 0.05 26.9642 0.05 26.4719V1.82923C0.05 1.33685 0.445247 0.938672 0.9321 0.938672ZM17.4891 10.8548C17.4891 11.6422 16.8542 12.2823 16.075 12.2823C15.2958 12.2823 14.6609 11.6422 14.6609 10.8548C14.6609 10.0675 15.2958 9.4274 16.075 9.4274C16.8542 9.4274 17.4891 10.0671 17.4891 10.8548Z"
                                        fill="#C2A56B" stroke="#12181A" stroke-width="0.1"></path>
                                </svg>
                                <h6><a href="mailto:{{$contact->email}}">Email</a></h6>
                                <p>{{$contact->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1063.8234300297354!2d-80.22697163289031!3d26.25318369512054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d904ddc9592b3d%3A0x3db65c93db620176!2s7444%20Royal%20Palm%20Blvd%2C%20Margate%2C%20FL%2033063%2C%20USA!5e0!3m2!1sen!2sbd!4v1713644693779!5m2!1sen!2sbd"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
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
