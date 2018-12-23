<?php
namespace App\Http\Controllers;
use App\Branches;

class AboutUsController extends Controller
{
    /**
     * Get the hotel's info
     * @return mixed
     */
    public function getInfo()
    {
        $branches = Branches::all();
        return \View::make('aboutus', compact('branches'));
    }
}
