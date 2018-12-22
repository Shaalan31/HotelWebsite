<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{
    /**
     * Get Reviews
     * @return mixed
     */
    public function getRooms()
    {
        $allRooms = DB::table('rooms')->get();
        return \View::make('rooms', compact('allRooms'));
    }

}
