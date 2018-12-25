<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'reviews';

    /**
     * Indicates if the model should be timestamped.
     * @var bool
     */
    public $timestamps = false;
}
