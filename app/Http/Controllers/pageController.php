<?php

namespace App\Http\Controllers;

use App\Models\About;
use Stripe\Stripe;
use App\Models\Car;
use App\Models\Contact;
use App\Models\Location;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class pageController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('pages.index', compact('cars'));
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
        return view('pages.about', compact('cars','about'));
    }
    public function contact()
    {
        $cars = Car::all();
        $contact = Contact::first();
        return view('pages.contact', compact('cars','contact'));
    }
    public function booking()
    {

        $location = Location::where("status", 1)->get();
        $cars = Car::where("status", 1)->get();

        return view('pages.addBooking', compact('location', 'cars'));
    }
    public function bookingid($bid)
    {

        $location = Location::where("status", 1)->get();
        $cars = Car::where("status", 1)->get();

        return view('pages.bookingid', compact('location', 'cars','bid'));
    }
    public function add_booking(request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'carid' => 'required|numeric',
            'pickup_date' => 'required|date',
            'pickup_time' => 'required|date_format:H:i',
            'pickup_location' => 'required|string',
            'drop_location' => 'required|string',
            'return_date' => 'required|date|after_or_equal:pickup_date',
            'drop_time' => 'required|date_format:H:i',
            'rent_type' => 'required|numeric',
            'customer_name' => 'required|string',
            'contact_number' => 'required|numeric',
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

        $requestData = $request->all();
        $requestData['carid'] = (int)$requestData['carid']; // Convert to integer
        $requestData['pickup_date'] = date('Y-m-d', strtotime($requestData['pickup_date'])); // Format date
        $requestData['pickup_time'] = date('H:i', strtotime($requestData['pickup_time'])); // Format time
        $requestData['drop_time'] = date('H:i', strtotime($requestData['drop_time'])); // Format time
        $requestData['rent_type'] = (int)$requestData['rent_type']; // Convert to integer
        $requestData['customer_name'] = trim($requestData['customer_name']); // Remove leading and trailing spaces
        $requestData['contact_number'] = (int)$requestData['contact_number']; // Convert to integer
        $requestData['order_id'] = $order_id; // Convert to integer
        $requestData['totalCost'] = $totalCost;

        $saveBooking = Rental::create($requestData);




        // dd($requestData);
        // return false;

        try {

            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            // Create a Payment Intent with Stripe
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $totalAmountCents, // Amount is in cents
                'currency' => 'usd',
                'description' => 'Booking payment for ' . $carDetail->carname . ',Order Id:' . $order_id,
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
    public function paymentDone(request $request){
        $order_id = $request->input('order_id');
        $rental = Rental::where('order_id', $order_id)->first();

        if ($rental) {
            $rental->update(['payment_status' => 1]);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => 'Rental not found'], 404);
        }
    }
    public function success(){
            // $cars = Car::all();
            return view('orderSuccess');
        
    }
}
