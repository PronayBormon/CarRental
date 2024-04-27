<nav class="navbar navbar-expand-lg bg_color position-sticky top-0 z-3" style="background: #0a0b0f">
    <div class="container">

      <a class="navbar-brand m-0 me-auto d- d-lg-none" href="{{url('/')}}">
        <img src="{{ url('frontend/images/logo.png') }}" alt="" class="img-fluid">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{url('/cars')}}">Our Cars</a>
          </li>
        </ul>
        <a class="navbar-brand d-none d-lg-block" href="{{url('/')}}">
          <img src="{{ url('frontend/images/logo.png') }}" alt="" class="img-fluid">
        </a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="{{url('/about-us')}}">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{url('/contact-us')}}">Contact us</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
