<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(!Auth::check()){
        return view('welcome');
    }
    elseif(Auth::user()->is_admin == 0)
        return view('welcome');
    else
        return view('dashboard');
});

Auth::routes();


// Routes to reviews page
Route::get('/reviews', 'ReviewsController@getReviews');
Route::post('/reviews', 'ReviewsController@addReview');

// Routes to rooms page
Route::get('/rooms', 'RoomsController@getRooms');

// Routes to about us page
Route::get('/aboutus', 'AboutUsController@getInfo');

// Routes to Book Now page
Route::get('/book', 'BookController@getBooking');
Route::post('/book', 'BookController@book');

// Routes to accommodations' status
Route::get('/accommodations', 'AccommodController@getAccomod');

// Routes for trip advisor
Route::get('/tripadv/{location}', 'TripAdvController@getTripAdv');

// Admin Tool
// Routes to Bookings
Route::get('/admin/bookings', 'AdminController@getBookings');

// Routes to accept or reject the booking
Route::post('/accept', 'AdminController@acceptBooking');
Route::post('/reject', 'AdminController@rejectBooking');