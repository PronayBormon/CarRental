<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta http-equiv="Content-Security-Policy" content="script-src 'self' 'unsafe-inline';"> --}}

    <!-- title  -->
    <title>Welcome To Cloud9luxcars Carrental service</title>

    <link rel="icon" href="{{ url('frontend/images/logo.png') }}">

    <!-- bootstrap 5.3    -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- fontawsome cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ url('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/owl.theme.default.min.css') }}">

    <style>
        /* Style for back to top button */
        #backToTopBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 99;
            font-size: 16px;
            cursor: pointer;
            padding: 10px;
            border-radius: 50%;
            background-color: #101718;
            color: #fff;
            box-shadow: 0 0 10px #000;
            height: 50px;
            width: 50px;
        }
    </style>
    <!-- style css  -->
    <link rel="stylesheet" href="{{ url('frontend/css/styles.css') }}"> <!--Styles-->

</head>

<body>

    @include('layouts.navbar')

    @yield('content')

    @include('layouts.footer')

    <div class="loader" id="loader">
        <img src="{{ url('frontend/images/loader.gif') }}" alt="" class="img-fluid">
    </div>

    <a href="https://wa.link/nbp8un" target="blank" class="position-fixed bottom-0 p-4 start-0">
        <img src="{{ url('/frontend/images/whatsapp.png') }}" style="height: 50px; width: 50px;" alt=""
            class="img-fluid">
    </a>

    <button id="backToTopBtn" title="Go to top">↑</button>


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script> <!--Jquery Cdn-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script> <!--Bootstrap-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.counterup/1.0.4/jquery.counterup.min.js"></script>
    <script src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>
    <script>
        // Wait for the page to load
        window.addEventListener('load', function() {
            // Hide the loader
            var loader = document.getElementById('loader');
            loader.style.display = 'none';
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.counter').counterUp({
                delay: 10, // Delay in milliseconds
                time: 1000 // Duration of animation in milliseconds
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Show or hide the back to top button based on scroll position
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('#backToTopBtn').fadeIn();
                } else {
                    $('#backToTopBtn').fadeOut();
                }
            });

            // Scroll to the top of the page when the back to top button is clicked
            $('#backToTopBtn').click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        });
    </script>
    @yield('script')
</body>

</html>
