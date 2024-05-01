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
                        <!--{{$rental}}-->
                        <tr>
                            <td class="td">Order ID</td>
                            <td class="td">{{ $rental->order_id }}</td>
                        </tr>
                        <tr>
                            <td class="td">Total Cost</td>
                            <td class="td"><strong>{{ $rental->totalCost }}</strong></td>
                        </tr>
                        <tr>
                            <td class="td">Car Name</td>
                            <td class="td">{{ $rental->car_name }}</td>
                        </tr>
                        <tr>
                            <td class="td">Rent Type</td>
                            <td class="td"><strong>{{ $rental->rent_type==1?"Hourly":"By Day" }}</strong></td>
                        </tr>
                        <tr>
                            <td class="td">Payment Status</td>
                            <td class="td">
                                @if ($rental->payment_status == 1)
                                    
                                    <span class="text-success" > Paid</span>
                                @else
                                    <span class="text-danger" > Unpaid</span>
                                @endif
                            </td>
                        </tr>
                        <th>Picup information</th>
                        <tr>
                            <td class="td">Pickup Location</td>
                            <td class="td">{{ $rental->pickup_location }}</td>
                        </tr>
                        <tr>
                            <td class="td">Pickup Date</td>
                            <td class="td">{{ $rental->pickup_date }}</td>
                        </tr>
                        <tr>
                            <td class="td">Pickup Time</td>
                            <td class="td">{{ $rental->pickup_time }}</td>
                        </tr>
                        <th>Drop information</th>
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
                        <th>Customer Details</th>
                        
                        <tr>
                            <td class="td">Customer Name</td>
                            <td class="td">{{ $rental->customer_name }}</td>
                        </tr>
                        <tr>
                            <td class="td">Contact Number</td>
                            <td class="td">{{ $rental->contact_number }}</td>
                        </tr>
                        <tr>
                            <td class="td">Email</td>
                            <td class="td">{{ $rental->email }}</td>
                        </tr>
                        <tr if="$rental->address != 0 || $rental->address != null">
                            <td class="td">Address 1</td>
                            <td class="td">{{ $rental->address }}</td>
                        </tr>
                        <tr if="$rental->address2 != 0 || $rental->address2 != null">
                            <td class="td">Address 2</td>
                            <td class="td">{{ $rental->address2 }}</td>
                        </tr>  
                        <tr if="$rental->country != 0 || $rental->country != null">
                            <td class="td">Country</td>
                            <td class="td">{{ $rental->country }}</td>
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
