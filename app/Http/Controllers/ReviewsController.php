<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $allReviews = DB::table('reviews')->get();
        return \View::make('reviews', compact('allReviews'));
    }

    /**
     * Add Review
     * @param Request $request
     * @return redirect to view reviews
     */
    public function addReview(Request $request)
    {
        if(!Auth::check())  //if logout
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
        DB::table('reviews')->insert(
            [ ['name' => @auth()->user()->name, 'review' => $userReview, 'rating' => $userRating ]]
        );
        return redirect('/reviews');
    }
}
