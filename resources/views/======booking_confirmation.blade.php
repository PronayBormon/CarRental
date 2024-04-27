<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                {{-- 'booking'       => $requestData,
                'Order_id'      => $order_id,
                'duration'      => $duration,
                'carDetail'     => $carDetail,
                'totalCost'     => $totalCost,
                'clientSecret'  => $clientSecret, --}}

                <h1 class="mt-5 mb-4">Rental Confirmation</h1>
                <p>Order id: {{ $order_id }} </p>
                <input type="hidden" id="order-id" value="{{ $order_id }}">

                <p>Car Name: {{ $carDetail->carname }}</p>
                {{-- <p>Phone: {{$booking->customer_phone}}</p> --}}
                <p>Duration: {{ $duration }}</p>
                <p>Total Cost: ${{ number_format($totalCost, 2) }}</p>
                <!-- Form to collect payment details -->
                <form id="payment-form" method="post">
                    <div id="card-element" class="mb-3">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display form errors. -->
                    <div id="card-errors" class="text-danger mb-3" role="alert"></div>

                    <input type="hidden" id="client-secret" value="{{ $clientSecret }}">

                    <button id="submit" class="btn btn-primary">Submit Payment</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Stripe.js -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

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
    

</body>

</html>
