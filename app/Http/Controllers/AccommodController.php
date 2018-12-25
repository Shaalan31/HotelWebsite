<?php
namespace App\Http\Controllers;

use App\Bookings;
use App\RoomsBooking;
use App\Rooms;
use Auth;

class AccommodController extends Controller
{
    /**
     * Get Accommodations of the user
     * @return mixed
     */
    public function getAccomod()
    {
        // If the user has logged out or not auth.
        if(!Auth::check() || Auth::user()->is_admin == true)
            return redirect('/login');

        $bookings = Bookings::where('user_id', auth()->user()->id)->get();
        $pending = [];
        $accepted = [];
        $rejected = [];
        $finished = [];

        // Get the rooms' name and quantities
        foreach ($bookings as $booking){
            $roomsArr = [];
            $rooms = RoomsBooking::where('booking_id', $booking->id)->get();

            foreach ($rooms as $room){
                $roomTemp = Rooms::where('id', $room->room_id)->first();
                array_push($roomsArr, array('room' => $roomTemp->name, 'quantity' => $room->no_of_rooms));
            }

            if(($booking->end_date  < date_format(today(), "Y-m-d") && $booking->start_date  < date_format(today(), "Y-m-d")  && $booking->status == 2) || $booking->status == 4){
                // Update the booking status
                Bookings::where('id', $booking->id)->update(['status' => 4, 'status_description' => 'Thank you for visiting us. Your booking is finished']);

                array_push($finished, array('destination' => $booking->destination, 'location' => $booking->location, 'status' => $booking->status,
                    'status_description' => 'Thank you for visiting us. Your booking is finished.', 'start_date' => $booking->start_date,
                    'end_date' => $booking->end_date, 'rooms' => $roomsArr));
            }
            elseif($booking->status == 1)
                array_push($pending, array('destination' => $booking->destination, 'location' => $booking->location, 'status' => $booking->status,
                            'status_description' => $booking->status_description, 'start_date' => $booking->start_date,
                            'end_date' => $booking->end_date, 'rooms' => $roomsArr));
            elseif ($booking->status == 2)
                array_push($accepted, array('destination' => $booking->destination, 'location' => $booking->location, 'status' => $booking->status,
                    'status_description' => $booking->status_description, 'start_date' => $booking->start_date,
                    'end_date' => $booking->end_date, 'rooms' => $roomsArr));
            elseif($booking->status == 3)
                array_push($rejected, array('destination' => $booking->destination, 'location' => $booking->location, 'status' => $booking->status,
                    'status_description' => $booking->status_description, 'start_date' => $booking->start_date,
                    'end_date' => $booking->end_date, 'rooms' => $roomsArr));
        }

        $allBookings = ['pending' => $pending, 'accepted' => $accepted, 'rejected' => $rejected, 'finished' => $finished ];

        return \View::make('accomod', compact('allBookings'));
    }
}
