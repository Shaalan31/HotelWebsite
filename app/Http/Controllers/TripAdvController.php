<?php
namespace App\Http\Controllers;

use App\Bookings;
use App\RoomsBooking;
use App\Rooms;
use Auth;

class TripAdvController extends Controller
{
    /**
     * Get Accommodations of the user
     * @return mixed
     */
    public function getTripAdv($location)
    {
        // If the user has logged out or not auth.
        if(!Auth::check() || Auth::user()->is_admin == 1)
            return redirect('/login');

        return \View::make('tripadv', compact('location'));
    }
}
