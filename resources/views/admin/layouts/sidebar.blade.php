<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo"><a href="{{ url('admin/dashboard') }}" style="font-size: 16px"><span>[</span >CLOUD9LUXCARS<span>]</span></a></div>

<div class="br-sideleft overflow-y-auto">
    <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
    <div class="br-sideleft-menu">
        <a href="{{ url('admin/dashboard') }}" class="br-menu-link active">
            <div class="br-menu-item">
                <ion-icon class="menu-item-icon icon  tx-22" name="home-outline"></ion-icon>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        <a href="#" class="br-menu-link">
            <div class="br-menu-item">
                <ion-icon class="menu-item-icon icon tx-24" name="file-tray-outline"></ion-icon>
                <span class="menu-item-label">Cars</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ url('admin/car-list') }}" class="nav-link">Cars list</a></li>
            <li class="nav-item"><a href="{{ url('admin/add-car') }}" class="nav-link">Add new Car </a></li>
        </ul>
        <a href="#" class="br-menu-link">
            <div class="br-menu-item">
                <ion-icon class="menu-item-icon icon tx-24" name="file-tray-outline"></ion-icon>
                <span class="menu-item-label">Locations</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ url('admin/location-list') }}" class="nav-link">Location list</a></li>
            <li class="nav-item"><a href="{{ url('admin/add-location') }}" class="nav-link">Add new Location </a></li>
        </ul>

        <a href="#" class="br-menu-link">
            <div class="br-menu-item">
                <ion-icon class="menu-item-icon icon tx-24" name="file-tray-outline"></ion-icon>
                <span class="menu-item-label">Bookings</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ url('admin/booking-list') }}" class="nav-link">Booking list</a></li>
            <li class="nav-item"><a href="{{ url('admin/add-booking') }}" class="nav-link">Add new booking </a></li>
        </ul>
        <a href="{{url('admin/about_us')}}" class="br-menu-link">
            <div class="br-menu-item">
                <ion-icon class="menu-item-icon icon tx-24" name="file-tray-outline"></ion-icon>
                <span class="menu-item-label">About us</span>
            </div><!-- menu-item -->
        </a>
        <a href="{{url('admin/contact_us')}}" class="br-menu-link">
            <div class="br-menu-item">
                <ion-icon class="menu-item-icon icon tx-24" name="file-tray-outline"></ion-icon>
                <span class="menu-item-label">Contact us </span>
            </div><!-- menu-item -->
        </a>
        {{-- <a href="{{url('admin/privay&policy')}}" class="br-menu-link">
            <div class="br-menu-item">
                <ion-icon class="menu-item-icon icon tx-24" name="file-tray-outline"></ion-icon>
                <span class="menu-item-label">Privay & Policy</span>
            </div><!-- menu-item -->
        </a>
        <a href="{{url('admin/terms&conditions')}}" class="br-menu-link">
            <div class="br-menu-item">
                <ion-icon class="menu-item-icon icon tx-24" name="file-tray-outline"></ion-icon>
                <span class="menu-item-label">Terms & conditions</span>
            </div><!-- menu-item -->
        </a>
        <a href="{{url('admin/site_settings')}}" class="br-menu-link">
            <div class="br-menu-item">
                <ion-icon name="settings-outline"></ion-icon>
                <span class="menu-item-label">Settings</span>
            </div><!-- menu-item -->
        </a> --}}

    </div><!-- br-sideleft-menu -->

</div>
