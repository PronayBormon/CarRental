@extends('admin.master')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">Booking Details </h4>
            <p class="mg-b-0">Welcome to Admin Control panel. </p>
        </div>

        <div class="br-pagebody mg-t-5 pd-x-30">
            <div class="modal-body bg-white">
                <a href="/admin/booking-list" class="mb-4 d-block">Back</a>
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="td">Order ID</td>
                            <td class="td">{{ $rental->order_id }}</td>
                        </tr>
                        <tr>
                            <td class="td">Car Name</td>
                            <td class="td">{{ $rental->car_name }}</td>
                        </tr>
                        <tr>
                            <td class="td">Customer Name</td>
                            <td class="td">{{ $rental->customer_name }}</td>
                        </tr>
                        <tr>
                            <td class="td">Contact Number</td>
                            <td class="td">{{ $rental->contact_number }}</td>
                        </tr>
                        <tr>
                            <td class="td">Rent Type</td>
                            <td class="td">{{ $rental->rent_type==1?"Hourly":"Day" }}</td>
                        </tr>
                        <tr>
                            <td class="td">Pickup Date</td>
                            <td class="td">{{ $rental->pickup_date }}</td>
                        </tr>
                        <tr>
                            <td class="td">Pickup Time</td>
                            <td class="td">{{ $rental->pickup_time }}</td>
                        </tr>
                        <tr>
                            <td class="td">Pickup Location</td>
                            <td class="td">{{ $rental->pickup_location }}</td>
                        </tr>
                        <tr>
                            <td class="td">Drop Location</td>
                            <td class="td">{{ $rental->drop_location }}</td>
                        </tr>
                        <tr>
                            <td class="td">Return Date</td>
                            <td class="td">{{ $rental->return_date }}</td>
                        </tr>
                        <tr>
                            <td class="td">Drop Time</td>
                            <td class="td">{{ $rental->drop_time }}</td>
                        </tr>
                        <tr>
                            <td class="td">Total Cost</td>
                            <td class="td">{{ $rental->totalCost }}</td>
                        </tr>
                        <tr>
                            <td class="td">Payment Status</td>
                            <td class="td">
                                @if ($rental->payment_status == 1)
                                    Paid
                                @else
                                    Unpaid
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Modal -->



        </div>
        @include('admin.layouts.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
