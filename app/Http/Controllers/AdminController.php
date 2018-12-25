<?php
namespace App\Http\Controllers;
use App\Bookings;
use App\Rooms;
use App\RoomsBooking;
use App\User;
use Illuminate\Http\Request;
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

            if(($booking->end_date < date_format(today(), "Y-m-d") && $booking->start_date < date_format(today(), "Y-m-d") && $booking->status == 2)) {
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
     * Accept Booking
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function acceptBooking(Request $request){
        // if the user is nor logged in or the user is not an admin
        if(!Auth::check() || Auth::user()->is_admin == false)
            return redirect('/login');

        $booking = Bookings::where('id', $request->id)->first();

        // check if the date of the booking has passed or running, so don't update the booking status
        $edit = true;
        if($booking != null){
            if($booking->start_date < date_format(today(), "Y-m-d") && $booking->end_date < date_format(today(), "Y-m-d"))
                $edit = false;
            elseif ($booking->start_date <= date_format(today(), "Y-m-d") && $booking->end_date >= date_format(today(), "Y-m-d"))
                $edit = false;
        }

        if($edit)
            Bookings::where('id', $request->id)->update(['status' => 2, 'status_description' => 'Your booking is accepted.']);

        return redirect('/admin/bookings');
    }

    /**
     * Reject Booking
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function rejectBooking(Request $request){
        // if the user is nor logged in or the user is not an admin
        if(!Auth::check() || Auth::user()->is_admin == false)
            return redirect('/login');

        $booking = Bookings::where('id', $request->id)->first();

        $edit = true;
        if($booking != null){
            if($booking->start_date < date_format(today(), "Y-m-d") && $booking->end_date < date_format(today(), "Y-m-d"))
                $edit = false;
            elseif ($booking->start_date <= date_format(today(), "Y-m-d") && $booking->end_date >= date_format(today(), "Y-m-d"))
                $edit = false;
        }

        if($edit)
            Bookings::where('id', $request->id)->update(['status' => 3, 'status_description' => 'We are very sorry! Your booking is rejected. Please contact us for more details.']);

        return redirect('/admin/bookings');
    }

    /**
     * Get rooms in Admin Tool
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getRooms(){
        // if the user is nor logged in or the user is not an admin
        if(!Auth::check() || Auth::user()->is_admin == false)
            return redirect('/login');

        $allRooms = Rooms::all();

        return \View::make('adminrooms', compact('allRooms'));
    }

    /**
     * Add a new type of room
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addRoom(Request $request){
        // if the user is nor logged in or the user is not an admin
        if(!Auth::check() || Auth::user()->is_admin == false)
            return redirect('/login');

        // Validation of inputs
        $name = $request->name;
        $no_of_guests = $request->no_of_guests;
        $no_of_beds = $request->no_of_beds;
        $size = $request->size;
        $description = $request->description;
        $price = $request->price;

        // Validate the request
        $data['name'] = $name;
        $data['no_of_guests'] = $no_of_guests;
        $data['no_of_beds'] = $no_of_beds;
        $data['size'] = $size;
        $data['description'] = $description;
        $data['price'] = $price;


        $v = Validator::make($data , [
            'name' => 'required|string|max:255',
            'no_of_guests' => 'required|numeric|min:1|max:4',
            'no_of_beds' => 'required|numeric|min:1|max:4',
            'size' => 'required|numeric',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
        ]);

        if($v->fails()){
            return redirect()->back()->withErrors($v->errors());
        }

        // Add the room in the database
        $room = new Rooms();

        $room->name = $name;
        $room->no_of_guests = $no_of_guests;
        $room->no_of_beds = $no_of_beds;
        $room->size = $size;
        $room->description = $description;
        $room->price = $price;

        $room->save();

        return redirect('/admin/rooms');
    }


    /**
     * View all customers in the system
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getCustomers(){
        // if the user is nor logged in or the user is not an admin
        if(!Auth::check() || Auth::user()->is_admin == false)
            return redirect('/login');

        $users = User::select('id', 'name', 'address', 'phone', 'email', 'blocked')->where('is_admin', 0)->get();

        return \View::make('admincustomers', compact('users'));

    }

    /**
     * Block a customer by the admin
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function blockCustomer($id){
        // if the user is nor logged in or the user is not an admin
        if(!Auth::check() || Auth::user()->is_admin == false)
            return redirect('/login');

        User::where('id', $id)->update(['blocked' => true]);

        return redirect('/admin/customers');
    }

    /**
     * Unblock a customer by admin
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function unblockCustomer($id){
        // if the user is nor logged in or the user is not an admin
        if(!Auth::check() || Auth::user()->is_admin == false)
            return redirect('/login');

        User::where('id', $id)->update(['blocked' => false]);

        return redirect('/admin/customers');
    }
}
