<?php
namespace App\Http\Controllers;
use App\Rooms;

class RoomsController extends Controller
{
    /**
     * Get Rooms
     * @return mixed
     */
    public function getRooms()
    {
        $allRooms = Rooms::all();
        return \View::make('rooms', compact('allRooms'));
    }

}
