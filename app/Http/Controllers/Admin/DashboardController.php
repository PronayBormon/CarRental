<?php

namespace App\Http\Controllers\Admin;

use App\Contacts;
use App\Models\Car;
use App\Models\Rental;
use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contact;
use App\Models\Contact_us;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        $booking = Rental::latest()->take(5)->get();
        $bookingCount = $booking->count();
        $cars  = Car::all()->count();
        $location  = Location::all()->count();
        return view('admin.pages.index', compact('booking','bookingCount','cars','location'));
    }

    public function addLocation()
    {
        return view('admin.pages.addLocation');
    }
    public function saveLocation(Request $request)
    {
        $rules = [
            'location' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $location = new Location();
        $location->location = $request->input('location');
        $location->status = 1;
        $location->save();


        return redirect()->back()->with('success', 'Location saved successfully!');
    }
    public function locationlist()
    {
        $locationlist = Location::where('status', 1)->paginate(10); // Fetch paginated data
        return view('admin.pages.locationlist', compact('locationlist'));
    }
    public function editlocation($id)
    {
        $location = Location::where('id', $id)->firstOrFail();
        return view('admin.pages.editlocation', compact('location'));
    }
    public function updatelocation(Request $request) //deletelocation
    {
        $id = $request->id;

        $location = Location::where('id', $id)->firstOrFail();
        $rules = [
            'location' => 'required|string',
        ];
        $validatedData = $request->validate($rules);
        $location->update([
            'location' => $validatedData['location'],
        ]);
        return redirect()->back()->with('success', 'Location updated successfully!');
    }
    public function deletelocation($id)
    {
        $Location = Location::where('id', $id)->firstOrFail();

        // Update the car's status to 0 (inactive)
        $Location->update(['status' => 0]);

        return redirect()->back()->with('success', 'Car deleted successfully!');
    }





    public function addcar()
    {
        return view('admin.pages.addcar');
    }
    public function carlist()
    {
        $carlist = Car::where('status', 1)->paginate(10); // Fetch paginated data
        return view('admin.pages.carlist', compact('carlist'));
    }
    public function saveCar(Request $request)
    {
        // Define validation rules including image validation
        $rules = [
            'carname' => 'required|string',
            'cartransmission' => 'required|string',
            'carseat' => 'required|integer|min:1',
            'carinterior' => 'required|string',
            'carcategory' => 'required|string',
            'cartype' => 'required|string',
            'carmake' => 'required|string',
            'perhour' => 'required|numeric|min:0',
            'perday' => 'required|numeric|min:0',
            'short_desc' => 'required|string',
            'desc' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['status'] = 1;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }
        $validatedData['slug'] = Str::slug($validatedData['carname']);
        Car::create($validatedData);
        return redirect()->back()->with('success', 'Car data saved successfully!');
    }
    public function editCar($slug)
    {
        $car = Car::where('slug', $slug)->firstOrFail();
        return view('admin.pages.editCar', compact('car'));
    }
    public function updateCar(Request $request, $slug)
    {
        // Fetch the car based on the provided slug
        $car = Car::where('slug', $slug)->firstOrFail();

        // Define validation rules
        $rules = [
            'carname' => 'required|string',
            'cartransmission' => 'required|string',
            'carseat' => 'required|integer|min:1',
            'carinterior' => 'required|string',
            'carcategory' => 'required|string',
            'cartype' => 'required|string',
            'carmake' => 'required|string',
            'perhour' => 'required|numeric|min:0',
            'perday' => 'required|numeric|min:0',
            'short_desc' => 'required|string',
            'desc' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];

        // Validate the request data
        $validatedData = $request->validate($rules);

        // Update the car details
        $car->update([
            'carname' => $validatedData['carname'],
            'cartransmission' => $validatedData['cartransmission'],
            'carseat' => $validatedData['carseat'],
            'carinterior' => $validatedData['carinterior'],
            'carcategory' => $validatedData['carcategory'],
            'cartype' => $validatedData['cartype'],
            'carmake' => $validatedData['carmake'],
            'perhour' => $validatedData['perhour'],
            'perday' => $validatedData['perday'],
            'short_desc' => $validatedData['short_desc'],
            'desc' => $validatedData['desc'],
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $car->image = $imageName;
            $car->save();
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Car data updated successfully!');
    }
    public function deleteCar($slug)
    {
        $car = Car::where('slug', $slug)->firstOrFail();
        $car->update(['status' => 0]);
        return redirect()->back()->with('success', 'Car deleted successfully!');
    }

    public function bookinglist()
    {
        $rentals = Rental::orderBy('id', 'desc')->paginate(10);

        foreach ($rentals as $rental) {
            $car = Car::find($rental->carid);
            $carName = $car ? $car->carname : 'N/A'; // Use 'N/A' if car is not found
            $rental->car_name = $carName;
        }
        return view('admin.pages.bookinglist', compact('rentals'));
    }
    public function addbooking()
    {
        $location = Location::where("status", 1)->get();
        $cars = Car::where("status", 1)->get();
        return view('admin.pages.addbooking', compact("location"), compact('cars'));
    }
    public function savebooking(request $request)
    {

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

        // $totalAmountCents = intval($totalCost * 100);
        $order_id = time() . rand(100000, 999999);

        $requestData = $request->all();
        $requestData['carid'] = (int)$requestData['carid']; 
        $requestData['pickup_date'] = date('Y-m-d', strtotime($requestData['pickup_date'])); 
        $requestData['pickup_time'] = date('H:i', strtotime($requestData['pickup_time']));
        $requestData['drop_time'] = date('H:i', strtotime($requestData['drop_time'])); 
        $requestData['rent_type'] = (int)$requestData['rent_type']; 

        $requestData['customer_name'] = trim($requestData['customer_name']);
        $requestData['contact_number'] = (int)$requestData['phone']; 
        $requestData['email'] = $requestData['email'];
        $requestData['address'] = $requestData['address']; 
        $requestData['address2'] = $requestData['address2'];
        $requestData['country'] = $requestData['country']; 

        $requestData['order_id'] = $order_id; 
        $requestData['totalCost'] = $totalCost;


        // dd($requestData);
        // return false;

        $saveBooking = Rental::create($requestData);

        return redirect('admin/booking-list')->with('success', 'Booking saved successfully');
    }
    public function rentals_edit($id)
    {
        $rent = Rental::findOrFail($id);
        $cars = Car::all(); // Fetch all cars
        $locations = Location::all();
        return view('admin.pages.edit_booking', compact("rent", "cars", "locations"));
    }
    public function update_rent(request $request)
    {
        $rent_id = $request->rent_id;
        Rental::where('id', $rent_id)->update([
            'carid' => $request->carid,
            'pickup_date' => $request->pickup_date,
            'pickup_time' => $request->pickup_time,
            'pickup_location' => $request->pickup_location,
            'drop_location' => $request->drop_location,
            'return_date' => $request->return_date,
            'drop_time' => $request->drop_time,
            'rent_type' => $request->rent_type,
            'customer_name' => $request->customer_name,
            'contact_number' => $request->contact_number,
            'approval_status' => $request->approval_status,
            'payment_status' => $request->payment_status,
        ]);

        return redirect('admin/booking-list')->with('success', 'Booking saved successfully');
    }
    public function contact()
    {
        $contact = Contact::first(); 
        return view('admin.pages.contact', compact('contact'));
    }
    public function update_contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'phone' => 'required',
            'facebook' => 'required|url',
            'instagram' => 'required|url',
            'address' => 'required|string',
            'desc' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = $request->id;

        $data = $request->except('_token');
        $record = Contact::findOrFail($id);
        $record->update($data);
        return redirect()->back()->with('success', 'Record updated successfully');
    }

    public function about()
    {
        $about = About::first(); // Retrieve the first contact record
        return view('admin.pages.about', compact('about'));
    }
    public function update_about(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'desc' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = $request->id;

        $data = $request->except('_token');

        $record = About::findOrFail($id);

        $record->update($data);

        return redirect()->back()->with('success', 'Record updated successfully');
    }
    public function getRentalDetails(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);
        $car = Car::find($rental->carid);
        $carName = $car ? $car->carname : 'N/A'; // Use 'N/A' if car is not found
        $rental->car_name = $carName;
        
        return view('admin.pages.rental_details', compact('rental'))->render();
    }
}
