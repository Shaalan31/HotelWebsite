<?php
namespace App\Http\Controllers;
use App\Rooms;
use Auth;

class RoomsController extends Controller
{
    /**
     * Get Rooms
     * @return mixed
     */
    public function getRooms()
    {
        // if the user is authenticated ana he is an admin then forbid him
        if(Auth::check() && Auth::user()->is_admin == true){
            return redirect('/');
        }

        $allRooms = Rooms::all();
        return \View::make('rooms', compact('allRooms'));
    }

}
