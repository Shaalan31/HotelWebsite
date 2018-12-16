<?php
namespace App\Http\Controllers;

class AboutUsController extends Controller
{
    /**
     * Get the hotel's info
     * @return mixed
     */
    public function getInfo()
    {
        return \View::make('aboutus');
    }

}
