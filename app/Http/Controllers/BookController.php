<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Get the booking form
     * @return mixed
     */
    public function getBooking()
    {
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
//        if(auth()->user()->id == null)  //if logout
//            return redirect('/login');
//
//        $userReview = $request->userReview;
//        $userRating = $request->userRating;
//
//        // Validate the request
//        $data['userReview'] = $userReview;
//        $data['userRating'] = $userRating;
//        $v = Validator::make($data , [
//            'userReview' => 'required|string|max:255',
//            'userRating' => 'required|numeric',
//        ]);
//
//        if($v->fails()){
//            return redirect()->back()->withErrors($v->errors());
//        }
//
//        // Insert in the database
//        DB::table('reviews')->insert(
//            [ ['name' => @auth()->user()->name, 'review' => $userReview, 'rating' => $userRating ]]
//        );
//        return redirect('/reviews');
    }
}
