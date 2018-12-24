<?php
namespace App\Http\Controllers;
use App\Bookings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;

class AdminController extends Controller
{
    /**
     * Get Bookings
     * @return mixed
     */
    public function getBookings()
    {
        $allBookings = Bookings::all();
        return \View::make('bookings', compact('allBookings'));
    }
}
