<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  crocodicstudio\crudbooster\helpers\CRUDBooster;

class ReviewsController extends Controller
{
    /**
     * Get Reviews
     * @return mixed
     */
    public function getReviews()
    {
        $allReviews = DB::table('reviews')->get();
        return \View::make('Reviews', compact('allReviews'));
    }

    /**
     * Add Review
     * @param Request $request
     */
    public function addReview(Request $request)
    {
        $userReview = $request->userReview;
        $userRating = $request->userRating;
        DB::table('reviews')->insert(
            [ ['name' => @auth()->user()->name, 'Review' => $userReview, 'Rating' => $userRating ]]
        );
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
}
