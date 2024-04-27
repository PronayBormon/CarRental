    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
        <div class="br-header-left">
            <div class="navicon-left hidden-md-down">
                <a id="btnLeftMenu" href="#">
                    <ion-icon name="menu-outline"></ion-icon>
                </a>
            </div>
            {{-- <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href="#"><i
                        class="icon ion-navicon-round"></i></a></div>
            <div class="input-group hidden-xs-down wd-170 transition">
                <input id="searchbox" type="text" class="form-control" placeholder="Search">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button"><i class="fa-solid fa-search"></i></button>
                </span>
            </div><!-- input-group --> --}}
        </div><!-- br-header-left -->
        <div class="br-header-right">
            <nav class="nav">
                
                <div class="dropdown">
                    <a href="#" class="nav-link nav-link-profile" data-toggle="dropdown">
                        <span class="logged-name hidden-md-down">Katherine</span>
                        <img src="{{ asset('backend/img/img1.jpg') }}" class="wd-32 rounded-circle" alt="">
                        <span class="square-10 bg-success"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-header wd-200">
                        <ul class="list-unstyled user-profile-nav">
                            {{-- <li><a href="#"><i class="fa-solid fa-user"></i> Edit Profile</a></li>
                            <li><a href="#"><i class="fa-solid fa-gear"></i> Settings</a></li>
                            <li><a href="#"><i class="fa-solid fa-arrow-down"></i> Downloads</a></li>
                            <li><a href="#"><i class="fa-regular fa-star"></i> Favorites</a></li>
                            <li><a href="#"><i class="fa-regular fa-folder"></i> Collections</a></li> --}}
                            <li>
                                {{-- <a href="{{ route('logout') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sign Out</a> --}}

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            
                            </li>
                        </ul>
                    </div><!-- dropdown-menu -->
                </div><!-- dropdown -->
            </nav>
            {{-- <div class="navicon-right">
                <a id="btnRightMenu" href="#" class="pos-relative">
                    <i class="fa-regular fa-comments"></i>
                    <!-- start: if statement -->
                    <span class="square-8 bg-danger pos-absolute t-10 r--5 rounded-circle"></span>
                    <!-- end: if statement -->
                </a>
            </div><!-- navicon-right --> --}}
        </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->
