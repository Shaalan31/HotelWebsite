<?php
namespace App\Http\Controllers;
use App\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class ReviewsController extends Controller
{
    /**
     * Get Reviews
     * @return mixed
     */
    public function getReviews()
    {
        // if the user is authenticated ana he is an admin then forbid him
        if(Auth::check() && Auth::user()->is_admin == true){
            return redirect('/');
        }
        $allReviews = Reviews::all();
        return \View::make('reviews', compact('allReviews'));
    }

    /**
     * Add Review
     * @param Request $request
     * @return redirect to view reviews
     */
    public function addReview(Request $request)
    {
        if(!Auth::check() || Auth::user()->is_admin == true)  //if logout
            return redirect('/login');

        $userReview = $request->userReview;
        $userRating = $request->userRating;

        // Validate the request
        $data['userReview'] = $userReview;
        $data['userRating'] = $userRating;
        $v = Validator::make($data , [
            'userReview' => 'required|string|max:255',
            'userRating' => 'required|numeric',
        ]);

        if($v->fails()){
            return redirect()->back()->withErrors($v->errors());
        }

        // Insert in the database
        $review = new Reviews();
        $review->name = auth()->user()->name;
        $review->review = $userReview;
        $review->rating = $userRating;
        $review->save();

        return redirect('/reviews');
    }
}
