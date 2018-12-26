<?php
namespace App\Http\Controllers;
use App\Branches;
use App\Rooms;
use App\RoomsBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Bookings;

class BookController extends Controller
{
    /**
     * Get the booking form
     * @return mixed
     */
    public function getBooking()
    {
        // If the user has logged out
        if(!Auth::check())
            return redirect('/login');

        $allRooms = DB::table('rooms')->select('name', 'id', 'no_of_guests', 'no_of_beds')->get();
        return \View::make('book', compact('allRooms'));
    }

    /**
     * Add a booking
     * @param Request $request
     * @return redirect to view booking status
     */
    public function book(Request $request)
    {
        // If the user has logged out
        if(!Auth::check() || Auth::user()->is_admin == true)
            return redirect('/login');

        // The request parameters
        $credit_card = trim($request->credit_card);
        $start_date = trim($request->start_date);
        $end_date = trim($request->end_date);
        $hotel = trim($request->hotel);
        $room = trim($request->room);
        $chosenRooms = Input::get('chosenRooms');
        $quantities = Input::get('quantities');


        // Validate the request
        $data['credit_card'] = $credit_card;
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['hotel'] = $hotel;
        $data['room'] = $room;
        $v = Validator::make($data , [
            'credit_card' => 'required|string|regex:/^(?:4[0-9]{12}(?:[0-9]{3})?)$/',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'hotel' => 'required|string|max:255',
            'room'  => 'required|string',
        ]);
        if($v->fails())
            return redirect()->back()->withErrors($v->errors());

        // Check if the start date is before the end date
        if($start_date > $end_date)
            return redirect()->back()->withErrors(['end_date' => 'Please choose a correct end date!']);

        // Check if there is an empty room entered by user
        $data['chosenRooms'] = $chosenRooms;
        $vRooms = Validator::make($data, [
           'chosenRooms.*' => 'required|string',
        ]);

        // Check if the user has removed the name of the room
        if($vRooms->fails())
            return redirect()->back()->withErrors(['room' => 'Please add your rooms correctly to proceed your booking!']);

        // Check if the user didn't choose any room
        if(sizeof($chosenRooms) == 0 || sizeof($quantities) == 0)
            return redirect()->back()->withErrors(['room' => 'Please add a room to proceed your booking!']);


        // To lower case all rooms name and trim them
        $chosenRooms = array_map('strtolower', $chosenRooms);
        $chosenRooms = array_map('trim', $chosenRooms);

        // if the user has entered duplicate inputs
        if(count($chosenRooms) != count(array_unique($chosenRooms)))
            return redirect()->back()->withErrors(['room' => 'Please add your rooms correctly without duplicated to proceed your booking!']);

        // Check if the entered hotel is valid
        $hotel = Branches::where('name', $hotel)->first();
        if($hotel == null)
            return redirect()->back()->withErrors(['hotel' => 'Please choose an hotel correctly!']);

        // Add the booking
        $booking = new Bookings();
        $booking->destination = $hotel->name;
        $booking->location = $hotel->location;
        $booking->status_description = "Waiting for the admin to accept your booking";
        $booking->user_id = auth()->user()->id;
        $booking->start_date = $start_date;
        $booking->end_date = $end_date;
        $today = today();
        $booking->setCreatedAt($today);
        $booking->setUpdatedAt($today);
        $booking->credit_card = $credit_card;
        $bookingTemp = Bookings::orderBy('id', 'desc')->first();
        if($bookingTemp == null)
            $bookingId = 1;
        else $bookingId = $bookingTemp->id + 1;

        // Validate rooms and their quantities
        $i = 0;
        foreach($chosenRooms as $chosenRoom){
            $roomsBooking = new RoomsBooking();
            $roomsBooking->booking_id = $bookingId;
            $room = Rooms::where('name', $chosenRoom)->first();
            if($room != null){
                $roomsBooking->room_id = $room->id;
                if($quantities[$i] > 10)
                    return redirect()->back()->withErrors(['room' => 'Number of rooms cannot exceed 10 rooms!']);
                $roomsBooking->no_of_rooms = $quantities[$i];
            } else {
                return redirect()->back()->withErrors(['room' => 'Please choose a room correctly!']);
            }

            $roomsBooking->save();
            $i++;
        }
        $booking->save();

        return redirect('/accommodations');
    }
}
