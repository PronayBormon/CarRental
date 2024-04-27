@extends('master')
@section('content')
    <div class="page_barccard" style="background-image: url({{ url('frontend/images/about_us_banner.png') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page_title">Payment Confirmation</h1>
                </div>
            </div>
        </div>
    </div>


    <section class="ab_us">
        <div class="container">
            <div class="row">

                <div class="col-md-6 offset-md-3 bg-white">
                    <div class="p-5">
                        {{-- <h6 class="mt-5 mb-4">Payment Confirmation</h6> --}}
                        <p class="mb-2">Order id: <strong>{{ $order_id }}</strong> </p>
                        <input type="hidden" id="order-id" value="{{ $order_id }}">

                        <p class="mb-2">Car Name: <strong>{{ $carDetail->carname }}</strong></p>
                        {{-- <p>Phone: {{$booking->customer_phone}}</p> --}}
                        <p class="mb-2">Duration: <strong>{{ $duration }}</strong></p>
                        <p class="mb-2">Total Cost: <strong>${{ number_format($totalCost, 2) }}</strong></p>

                        <form id="payment-form" class="py-4" method="post">
                            <div id="card-element" class="mb-3">
                            </div>
                            <div id="card-errors" class="text-danger mb-3" role="alert"></div>
                            <input type="hidden" id="client-secret" value="{{ $clientSecret }}">
                            <button id="submit" class="btn btn-primary btn-flat">Submit Payment</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script>
        var stripe = Stripe('{{ env('STRIPE_PUBLIC_KEY') }}');
        var elements = stripe.elements();

        var card = elements.create('card');
        card.mount('#card-element');

        var form = document.getElementById('payment-form');
        var errorDiv = document.getElementById('card-errors');

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            var clientSecret = document.getElementById('client-secret').value;
            var order_id = document.getElementById('order-id').value;

            stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: card
                }
            }).then(function(result) {
                if (result.error) {
                    errorDiv.textContent = result.error.message;
                } else {
                    // Payment succeeded, make AJAX request to update payment status
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });

                    $.ajax({
                        url: '/payment/success',
                        method: 'POST',
                        data: {
                            order_id: order_id
                        },
                        success: function(response) {
                            if (response.success) {
                                // Payment status updated successfully, redirect to success page or perform other actions
                                window.location.href = "{{ url('/') }}";
                            } else {
                                // Handle errors or display a message to the user
                                console.error('Error updating payment status:', response.error);
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle AJAX errors
                            console.error('AJAX error:', error);
                        }
                    });
                }
            });
        });
    </script>
@endsection
