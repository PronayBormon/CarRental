<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- title  -->
    <title>Welcome To Cloud9luxcars Carrental service</title>

    <link rel="icon" href="{{ url('frontend/image/logo.png') }}">

    <!-- bootstrap 5.3    -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- fontawsome cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ url('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/owl.theme.default.min.css') }}">

    <!-- style css  -->
    <link rel="stylesheet" href="{{ url('frontend/css/styles.css') }}"> <!--Styles-->

</head>

<body>

    @include("layouts.navbar")

    @yield('content')

    @include("layouts.footer")

    <div class="loader" id="loader">
        <img src="{{url('frontend/images/loader.gif')}}" alt="" class="img-fluid">
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script> <!--Jquery Cdn-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script> <!--Bootstrap-->
    <script src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>
    <script>
        // Wait for the page to load
        window.addEventListener('load', function() {
            // Hide the loader
            var loader = document.getElementById('loader');
            loader.style.display = 'none';
        });
    </script>
    @yield("script")
</body>

</html>
