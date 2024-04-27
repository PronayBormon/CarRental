@extends('admin.master')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">Booking list </h4>
            <p class="mg-b-0">Welcome to Admin Control panel. </p>
        </div>

        <div class="br-pagebody mg-t-5 pd-x-30 ">
            <table id="" class="table display responsive nowrap bg-white">
                <thead>
                    <tr>
                        {{-- <th class="wd-10p">ID</th> --}}
                        <th class="wd-10p">Order ID</th>
                        <th class="wd-10p">Car ID</th>
                        <th class="wd-10p">Pickup Date</th>
                        <th class="wd-10p">Pickup Time</th>
                        <th class="wd-15p">Pickup Location</th>
                        <th class="wd-15p">Amount</th>
                        <th class="wd-10p">Payment Status</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rentals as $rental)
                        <tr>
                            <td>{{ $rental->order_id }}</td>
                            <td>{{ $rental->car_name }}</td>
                            <td>{{ $rental->pickup_date }}</td>
                            <td>{{ $rental->pickup_time }}</td>
                            <td>{{ $rental->pickup_location }}</td>
                            <td>{{ $rental->totalCost }}</td>
                            <td>
                                @if ($rental->payment_status == 1)
                                    Paid
                                @else
                                    unpaid
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ url('admin/rentals_edit', $rental->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{url('admin/rental_details/'.$rental->id )}}" class="btn btn-secondary view-rental" >View</a>
            

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Modal -->




            <!-- Custom pagination controls -->
            <div class="custom-pagination">
                @if ($rentals->onFirstPage())
                    <span> &lt; </span>
                @else
                    <a href="{{ $rentals->previousPageUrl() }}"> &lt; </a>
                @endif

                @for ($i = 1; $i <= $rentals->lastPage(); $i++)
                    <a href="{{ $rentals->url($i) }}"
                        class="{{ $rentals->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                @endfor

                @if ($rentals->hasMorePages())
                    <a href="{{ $rentals->nextPageUrl() }}"> &gt; </a>
                @else
                    <span> &gt; </span>
                @endif
            </div>

        </div>
        @include('admin.layouts.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection

@section('script')
    <script>
        $(function() {
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });

            $('#datatable2').DataTable({
                bLengthChange: false,
                searching: false,
                responsive: true
            });

            // Select2
            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('.view-rental').click(function() {
                var rentalId = $(this).data('rental-id');

                $.ajax({
                    url: '{{ url('admin/rental/details') }}',
                    type: 'GET',
                    data: {
                        rental_id: rentalId
                    },
                    success: function(response) {
                        $('.modal-body .tbody').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', error);
                    }
                });
            });
        });
    </script>
@endsection
