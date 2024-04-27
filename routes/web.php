<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();
Route::get('/', function () { //about
    return view('pages.index');
});
// Route::get('/home', function () { //about
//     return view('welcome');
// });

Route::get("/", [pageController::class, "index"]);
Route::get("singleCar/{slug}", [pageController::class, "singleCar"])->name("single-car");
Route::get("cars", [pageController::class, "cars"]);
// booking 
Route::get("booking", [pageController::class, "booking"]);
Route::post("add_booking", [pageController::class, "add_booking"]);
Route::get("booking/{id}", [pageController::class, "bookingid"]);
Route::post("payment/success", [pageController::class, "paymentDone"]);
Route::get("success", [pageController::class, "success"]);

// pages 
Route::get("about-us", [pageController::class, "about"]);
Route::get("contact-us", [pageController::class, "contact"]);

// backend 
Route::prefix("admin")->middleware('auth')->group(function () { //add-booking
    Route::get("/dashboard", [DashboardController::class, "index"]);

    // pages     
    Route::get("/contact_us", [DashboardController::class, "contact"]);
    Route::post("/update_contact", [DashboardController::class, "update_contact"]);


    Route::get("/about_us", [DashboardController::class, "about"]);
    Route::post("/update_about", [DashboardController::class, "update_about"]);

    Route::get("/location-list", [DashboardController::class, "locationlist"]);
    Route::get("/add-location", [DashboardController::class, "addLocation"]);
    Route::post("/saveLocation", [DashboardController::class, "saveLocation"]);

    Route::get('/edit_location/{id}', [DashboardController::class, "editlocation"]);
    Route::PUT('/update-location', [DashboardController::class, "updatelocation"]);
    Route::get('/delete-location/{id}', [DashboardController::class, "deletelocation"]);

    Route::get("/car-list", [DashboardController::class, "carlist"]);
    Route::get("/add-car", [DashboardController::class, "addcar"]);
    Route::post("/saveCar", [DashboardController::class, "saveCar"]);
    Route::get('/edit_car/{slug}', [DashboardController::class, "editCar"])->name('edit.car');
    Route::post('/update-car/{slug}', [DashboardController::class, "updateCar"])->name('update.car');
    Route::get('/delete-car/{slug}', [DashboardController::class, "deleteCar"]);

    Route::get("/booking-list", [DashboardController::class, "bookinglist"]); //update_rent
    Route::get("/add-booking", [DashboardController::class, "addbooking"]);
    Route::post("/add_booking", [DashboardController::class, "savebooking"]);
    Route::get("/rentals_edit/{id}", [DashboardController::class, "rentals_edit"]);
    Route::post("/update_rent", [DashboardController::class, "update_rent"]);
    Route::get("/rental_details/{id}", [DashboardController::class, "getRentalDetails"]);
});

// v
// Route::get("/login", [LoginController::class, 'login'])->name('login');
// Route::post("/login", [LoginController::class, 'authenticate'])->name("login");
// Route::get("/register", [LoginController::class, 'register'])->name('register');
// Route::post("/register", [LoginController::class, 'registerPost']);
// Route::get("/logout", [LoginController::class, 'logout']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
