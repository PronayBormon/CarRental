@extends('admin.master')
@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-30">
            <h4 class="tx-gray-800 mg-b-5">Car list </h4>
            <p class="mg-b-0">Welcome to Admin Control panel. </p>
        </div>

        <div class="br-pagebody mg-t-5 pd-x-30">
            {{-- <input type="text" id="searchInput" placeholder="Search..."> --}}
            <table id="" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p">Car Name</th>
                        <th class="wd-15p">Transmission</th>
                        <th class="wd-20p">Seat</th>
                        <th class="wd-15p">Interior</th>
                        <th class="wd-10p">Category</th>
                        <th class="wd-25p">Type</th>
                        <th class="wd-25p">Make</th>
                        <th class="wd-25p">Hour</th>
                        <th class="wd-25p">Day</th>
                        <th class="wd-25p">Short Description</th>
                        <th class="wd-25p">Description</th>
                        <th class="wd-25p">Image</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carlist as $car)
                        <tr>
                            <td>{{ $car->carname }}</td>
                            <td>{{ $car->cartransmission }}</td>
                            <td>{{ $car->carseat }}</td>
                            <td>{{ $car->carinterior }}</td>
                            <td>{{ $car->carcategory }}</td>
                            <td>{{ $car->cartype }}</td>
                            <td>{{ $car->carmake }}</td>
                            <td>{{ $car->perhour }}</td>
                            <td>{{ $car->perday }}</td>
                            <td>{{ $car->short_desc }}</td>
                            <td>{{ $car->desc }}</td>
                            <td>
                                <img src="{{ asset('images/' . $car->image) }}" alt="{{ $car->carname }}"
                                    style="max-width: 40px;">
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ url('admin/edit_car/' . $car->slug) }}" class="btn btn-warning"><i
                                            class="fas fa-pencil-alt"></i></a> <!-- Edit button -->
                                    <a href="{{ url('admin/delete-car/' . $car->slug) }}"
                                        class="btn btn-danger delete-car"><i class="fas fa-trash-alt"></i></a>
                                    <!-- Delete button -->
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $carlist->links() }}  --}}

            <!-- Pagination links -->
            <div class="d-flex justify-content-between align-items-center">
                <ul class="pagination">
                    @if ($carlist->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">&lsaquo;</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $carlist->previousPageUrl() }}">&lsaquo;</a>
                        </li>
                    @endif

                    @for ($i = 1; $i <= $carlist->lastPage(); $i++)
                        <li class="page-item {{ $carlist->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $carlist->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    @if ($carlist->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $carlist->nextPageUrl() }}">&rsaquo;</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">&rsaquo;</span></li>
                    @endif
                </ul>
                <span>Page {{ $carlist->currentPage() }} of {{ $carlist->lastPage() }}</span>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable1').DataTable({
                "paging": true, // Enable pagination
                "searching": true // Enable search
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.delete-car').click(function(e) {
                e.preventDefault();
                var slug = $(this).data('slug');
                if (confirm("Are you sure you want to delete this car?")) {
                    window.location.href = "{{ url('admin/delete-car') }}/" + slug;
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var searchText = $(this).val()
            .toLowerCase(); // Get the value of the search input and convert it to lowercase

                $('#carTableBody tr').each(function() { // Iterate through each row in the table body
                    var rowText = $(this).text()
                .toLowerCase(); // Get the text content of the row and convert it to lowercase

                    if (rowText.indexOf(searchText) !== -
                        1) { // Check if the search term is found in the row
                        $(this).show(); // If the search term is found, show the row
                    } else {
                        $(this).hide(); // If the search term is not found, hide the row
                    }
                });
            });
        });
    </script>
@endsection