<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomsBooking extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'rooms_booking';

    /**
     * Indicates if the model should be timestamped.
     * @var bool
     */
    public $timestamps = false;
}
