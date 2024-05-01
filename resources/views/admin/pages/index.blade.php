@extends('admin.master')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">Dashboard</h4>
            <p class="mg-b-0">Welcome to Admin Control panel. </p>
        </div><!-- d-flex -->

        <div class="br-pagebody mg-t-5 pd-x-30">
            <div class="row row-sm">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-teal rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <ion-icon class="ion  tx-60 lh-0 tx-white op-7" name="earth-outline"></ion-icon>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total
                                    Booking </p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $bookingCount }}</p>
                                {{-- <span class="tx-11 tx-roboto tx-white-6">24% higher yesterday</span> --}}
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-primary rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <ion-icon class="ion  tx-60 lh-0 tx-white op-7" name="earth-outline"></ion-icon>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total Cars
                                </p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $cars }}</p>
                                {{-- <span class="tx-11 tx-roboto tx-white-6">24% higher yesterday</span> --}}
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-br-primary rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                            <ion-icon class="ion  tx-60 lh-0 tx-white op-7" name="earth-outline"></ion-icon>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total
                                    Locations </p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $location }}</p>
                                {{-- <span class="tx-11 tx-roboto tx-white-6">24% higher yesterday</span> --}}
                            </div>
                        </div>
                    </div>
                </div><!-- col-3 -->


            </div><!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card bd-0 shadow-base pd-30 mg-t-20">
                        <div class="d-flex align-items-center justify-content-between mg-b-30">
                            <div>
                                <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Latest Booking
                                </h6>

                            </div>
                            <a href=" {{ url('/admin/booking-list') }} "
                                class="btn btn-outline-info btn-oblong tx-11 tx-uppercase tx-mont tx-medium tx-spacing-1 pd-x-30 bd-2">See
                                more</a>
                        </div><!-- d-flex -->

                        <table class="table table-valign-middle mg-b-0">
                            <thead>
                                <tr>
                                    <th class="wd-10p">Order ID</th>
                                    <th class="wd-10p">Pickup Date</th>
                                    <th class="wd-10p">Pickup Time</th>
                                    <th class="wd-15p">Pickup Location</th>
                                    <th class="wd-15p">Amount</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booking as $bookingItem)
                                    <tr>
                                        <td>
                                            <h6 class="tx-inverse tx-14 mg-b-0">{{ $bookingItem->order_id }}</h6>
                                        </td>
                                        <td>{{ $bookingItem->pickup_date }}</td>
                                        <td>{{ $bookingItem->pickup_time }}</td>
                                        <td>{{ $bookingItem->pickup_location }}</td>
                                        <td>${{ $bookingItem->totalCost }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ url('admin/rental_details/' . $bookingItem->id) }}"
                                                    class="btn btn-secondary view-rental">View</a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- br-pagebody -->
        @include('admin.layouts.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
@section('script')
    <script>
        $('#datatable1').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });
    </script>
@endsection
