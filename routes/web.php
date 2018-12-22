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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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