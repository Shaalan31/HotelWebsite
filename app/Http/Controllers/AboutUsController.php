<?php
namespace App\Http\Controllers;
use App\Branches;
use Auth;

class AboutUsController extends Controller
{
    /**
     * Get the hotel's info
     * @return mixed
     */
    public function getInfo()
    {
        // if the user is authenticated ana he is an admin then forbid him
        if(Auth::check() && Auth::user()->is_admin == true){
            return redirect('/');
        }

        $branches = Branches::all();
        return \View::make('aboutus', compact('branches'));
    }
}
