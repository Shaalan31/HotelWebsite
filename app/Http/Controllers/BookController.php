<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Auth;

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
        if(!Auth::check())
            return redirect('/login');

        // The request parameters
        $credit_card = trim($request->credit_card);
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $hotel = $request->hotel;
        $room = $request->room;
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
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors());
        }

        // Check if the user didn't choose any room
        if(sizeof($chosenRooms) == 0 || sizeof($quantities) == 0)
            return redirect()->back()->withErrors(['room' => 'Please add a room to proceed your booking!']);

//        // Insert in the database
//        DB::table('reviews')->insert(
//            [ ['name' => @auth()->user()->name, 'review' => $userReview, 'rating' => $userRating ]]
//        );
//        return redirect('/reviews');
    }
}
