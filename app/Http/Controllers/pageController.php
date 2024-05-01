<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Car;
use App\Models\About;
use App\Models\Rental;
use App\Models\Contact;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class pageController extends Controller
{
    public function index()
    {
        $location = Location::where("status", 1)->get();
        $cars = Car::all();
        return view('pages.index', compact('cars', 'location'));
    }
    public function terms(){
        $location = Location::where("status", 1)->get();
        $cars = Car::all();
        $contact = contact::first();
        return view('pages.terms-conditions', compact('cars', 'location','contact'));
    }
    public function singleCar($slug)
    {
        $cars = Car::where('slug', $slug)->first();
        return view('pages.single-car', compact('cars'));
    }
    public function cars()
    {
        $cars = Car::all();
        return view('pages.our-cars', compact('cars'));
    }
    public function about()
    {
        $cars = Car::all();
        $about = About::first();
        return view('pages.about', compact('cars', 'about'));
    }
    public function contact()
    {
        $cars = Car::all();
        $contact = Contact::first();
        return view('pages.contact', compact('cars', 'contact'));
    }
    public function booking()
    {

        $location = Location::where("status", 1)->get();
        $cars = Car::where("status", 1)->get();
        return view('pages.addBooking', compact('location', 'cars'));
    }
    public function selectcars()
    {
        $bookingData = session('booking');
        $cars = Car::where("status", 1)->get();
        return view('pages.selectcar', compact('bookingData', 'cars'));
    }


    public function addCarsession(request $request)
    {

        // dd($request->all());
        // return false;

        $validator = Validator::make($request->all(), [
            'carid' => 'required|numeric',
            'carname' => 'required|string',
            'perhour' => 'required',
            'perday' => 'required',
            'rent_type' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $bookingData = session('booking');

        $pickupDate = session('booking.pickup_date');
        $pickupTime = session('booking.pickup_time');
        $pickupLocation = session('booking.pickup_location');
        $dropLocation = session('booking.drop_location');
        $returnDate = session('booking.return_date');
        $dropTime = session('booking.drop_time');

        // dd($pickupDate);
        // return false;


        $pickupDateTime = \Carbon\Carbon::parse($pickupDate . ' ' . $pickupTime);
        $returnDateTime = \Carbon\Carbon::parse($returnDate . ' ' . $dropTime);

        // Calculate the difference in days and hours
        $rentDurationDays = $pickupDateTime->diffInDays($returnDateTime);
        $rentDurationHours = max($pickupDateTime->diffInHours($returnDateTime) % 24, 1); // Ensure minimum of 1 hour

        // Total rent duration in days and hours
        $totalRentDays = $rentDurationDays;
        $totalRentHours = $rentDurationHours;


        if ($request->rent_type == 1) {
            $totalCost = $totalRentHours * $request->perhour;
            $duration = $totalRentHours . "Hour";
            $singleamt = $request->perhour;
        } elseif ($request->rent_type == 2) {
            $totalRentDays = max($totalRentDays, 1);
            $totalCost = $totalRentDays * $request->perday;
            $duration = $totalRentDays . 'Day';
            $singleamt = $request->perday;
        } else {
            $totalCost = 'Invalid Rent Type';
            $duration = '0';
        }


        $formattedAmount = number_format($totalCost, 2);
        $singleamount = number_format($singleamt, 2);

        $request->merge(['amount'   => $formattedAmount]);
        $request->merge(['duration' => $duration]);
        $request->merge(['singleamt' => $singleamount]);

        $car = $request->only([
            'carid',
            'carname',
            'perhour',
            'perday',
            'rent_type',
            'amount',
            'duration',
            'singleamt'
        ]);

        session()->put('car', $car);

        return redirect('customer');
    }
    public function customer_details()
    {
        $bookingData = session('booking');
        $car = session('car');

        return view('pages.customerinfo', compact('bookingData', 'car'));
    }



















    public function bookingid($bid)
    {

        $location = Location::where("status", 1)->get();
        $cars = Car::where("status", 1)->get();

        return view('pages.bookingid', compact('location', 'cars', 'bid'));
    }
    public function orderSubmit(request $request)
    {

        $validator = Validator::make($request->all(), [
            'carid'             => 'required|numeric',
            'pickup_date'       => 'required|date',
            'pickup_time'       => 'required|date_format:H:i',
            'pickup_location'   => 'required|string',
            'drop_location'     => 'required|string',
            'return_date'       => 'required|date|after_or_equal:pickup_date',
            'drop_time'         => 'required|date_format:H:i',
            'rent_type'         => 'required|numeric',
            'name'              => 'required',
            'phone'             => 'required',
            'email'             => 'required',
            'address'           => 'required',
            // 'address2'          => 'required',
            'country'           => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pickupDateTime = \Carbon\Carbon::parse($request->pickup_date . ' ' . $request->pickup_time);
        $returnDateTime = \Carbon\Carbon::parse($request->return_date . ' ' . $request->drop_time);

        // Calculate the difference in days and hours
        $rentDurationDays = $pickupDateTime->diffInDays($returnDateTime);
        $rentDurationHours = max($pickupDateTime->diffInHours($returnDateTime) % 24, 1); // Ensure minimum of 1 hour

        // Total rent duration in days and hours
        $totalRentDays = $rentDurationDays;
        $totalRentHours = $rentDurationHours;

        $carDetail = Car::where('id', $request->carid)->first();

        // dd($request->all());
        // return false;

        if ($request->rent_type == 1) {
            $totalCost = $totalRentHours * $carDetail->perhour;
        } elseif ($request->rent_type == 2) {
            $totalRentDays = max($totalRentDays, 1);
            $totalCost = $totalRentDays * $carDetail->perday;
        } else {
            $totalCost = 'Invalid Rent Type';
        }

        $totalAmountCents = intval($totalCost * 100);
        $order_id = time() . rand(100000, 999999);

        $requestData                    = $request->all();
        $requestData['carid']           = (int)$requestData['carid']; // Convert to integer
        $requestData['pickup_date']     = date('Y-m-d', strtotime($requestData['pickup_date'])); // Format date
        $requestData['pickup_time']     = date('H:i', strtotime($requestData['pickup_time'])); // Format time
        $requestData['drop_time']       = date('H:i', strtotime($requestData['drop_time'])); // Format time
        $requestData['rent_type']       = (int)$requestData['rent_type']; // Convert to integer
        $requestData['customer_name']   = trim($requestData['name']); // Remove leading and trailing spaces
        $requestData['contact_number']  = (int)$requestData['phone']; // Convert to integer
        $requestData['email']           = trim($requestData['email']); // Remove leading and trailing spaces
        $requestData['address']         = $requestData['address']; // Convert to integer
        // $requestData['address2']        = trim($requestData['address2']); // Remove leading and trailing spaces
        $requestData['country']         = $requestData['country']; // Convert to integer
        $requestData['order_id']        = $order_id; // Convert to integer
        $requestData['totalCost']       = $totalCost;

        $saveBooking = Rental::create($requestData);




        // dd($requestData);
        // return false;

        try {

            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            // Create a Payment Intent with Stripe
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount'        => $totalAmountCents, // Amount is in cents
                'currency'      => 'USD',
                'description'   => 'Booking payment for ' . $carDetail->carname . ',Order Id:' . $order_id,
            ]);

            // Pass client secret to frontend
            $clientSecret = $paymentIntent->client_secret;

            $totalRentDays;
            $totalRentHours;

            if ($request->rent_type == 1) {
                $duration = $totalRentHours . 'hours';
            } elseif ($request->rent_type == 2) {
                $duration = $totalRentDays . 'Day';
            }


            // Return client secret and other data to frontend
            return view('booking_confirmation', [
                'order_id' => $order_id,
                'duration'      => $duration,
                'carDetail'     => $carDetail,
                'totalCost'     => $totalCost,
                'clientSecret'  => $clientSecret,
            ]);
        } catch (\Exception $e) {
            // Handle Stripe errors
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function paymentDone(request $request)
    {
        $order_id = $request->input('order_id');
        $rental = Rental::where('order_id', $order_id)->first();

        if ($rental) {
            $rental->update(['payment_status' => 1]);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => 'Rental not found'], 404);
        }
    }
    public function success(request $request)
    {
        // $cars = Car::all();
        $request->session()->flush();

        return view('orderSuccess');
    }
    public function add_booking(request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'pickup_date' => 'required|date',
            'pickup_time' => 'required|date_format:H:i',
            'pickup_location' => 'required|string',
            'drop_location' => 'required|string',
            'return_date' => 'required|date|after_or_equal:pickup_date',
            'drop_time' => 'required|date_format:H:i',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $booking = $request->only([
            // 'carid',
            'pickup_date',
            'pickup_time',
            'pickup_location',
            'drop_location',
            'return_date',
            'drop_time',
            // 'rent_type',
            // 'customer_name',
            // 'contact_number',
        ]);

        session()->put('booking', $booking);

        return redirect('selectcars');
    }
    public function generateclientsecret(request $request){
        $carId = $request->input('carid');
        $pickupDate = $request->input('pickup_date');
        // Retrieve other form data as needed...
    
        // Process the form data, update database, etc.
    
        // Return response
        return response()->json(['success' => true]);
    }
    // public function orderSubmit(request $request)
    // {
   
    //     dd($request->all());


    //     // Validate the incoming request
    //     // $validatedData = $request->validate([
    //     //     'card_number' => 'required|numeric',
    //     //     // Add other validation rules for remaining form fields
    //     // ]);

    //     // // Set your Stripe secret key
    //     // Stripe::setApiKey(env('STRIPE_SECRET'));

    //     // try {
    //     //     // Charge the user's card
    //     //     $charge = Charge::create([
    //     //         'amount' => $request->totalCost * 100, // Amount in cents
    //     //         'currency' => 'usd',
    //     //         'source' => $request->card_number, // Card token or source ID
    //     //         // Add additional parameters as needed
    //     //     ]);

    //     //     // Payment successful, handle further actions (e.g., store order in database)

    //     //     return redirect()->route('success')->with('success_message', 'Payment successful!'); // Redirect to success page
    //     // } catch (\Exception $e) {
    //     //     // Payment failed, handle error
    //     //     return redirect()->back()->with('error_message', 'Payment failed: ' . $e->getMessage())->withInput();
    //     // }
    // }
}
