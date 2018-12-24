<?php
namespace App\Http\Controllers;
use App\Bookings;
use App\Rooms;
use App\RoomsBooking;
use App\User;
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
        // if the user is nor logged in or the user is not an admin
        if(!Auth::check() || Auth::user()->is_admin == false)
            return redirect('/login');

        $allBookings = Bookings::all();
        $bookings = [];
        foreach ($allBookings as $booking){
            // Get the user
            $user = User::select('name', 'phone')->where('id', $booking->user_id)->first();
            $userInfo['user_name'] = $user->name;
            $userInfo['user_phone'] = $user->phone;

            $roomsArr = [];
            $rooms = RoomsBooking::where('booking_id', $booking->id)->get();
            foreach ($rooms as $room){
                $roomTemp = Rooms::where('id', $room->room_id)->first();
                array_push($roomsArr, array('room' => $roomTemp->name, 'quantity' => $room->no_of_rooms));
            }

            if(($booking->end_date < today() && $booking->status == 2)) {
                // Update the booking status
                Bookings::where('id', $booking->id)->update(['status' => 4]);
                $booking->status = 4;
            }

            $bookingTemp = ['user' => $userInfo, 'rooms' => $roomsArr, 'booking' => $booking];
            array_push($bookings, $bookingTemp);
        }

        return \View::make('adminbookings', compact('bookings'));
    }

    /**
     * Accept a booking with id
     */
    public function acceptBooking(Request $request){
        // if the user is nor logged in or the user is not an admin
        if(!Auth::check() || Auth::user()->is_admin == false)
            return redirect('/login');

        Bookings::where('id', $request->id)->update(['status' => 2]);

        return redirect('/admin/bookings');
    }

    /**
     * Reject a booking with id
     */
    public function rejectBooking(Request $request){
        // if the user is nor logged in or the user is not an admin
        if(!Auth::check() || Auth::user()->is_admin == false)
            return redirect('/login');

        Bookings::where('id', $request->id)->update(['status' => 3]);

        return redirect('/admin/bookings');
    }

    public function getRooms(){
        // if the user is nor logged in or the user is not an admin
        if(!Auth::check() || Auth::user()->is_admin == false)
            return redirect('/login');

        $allRooms = Rooms::all();

        return \View::make('adminrooms', compact('allRooms'));
    }


}
