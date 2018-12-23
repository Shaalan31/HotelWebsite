<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'branches';

    /**
     * Indicates if the model should be timestamped.
     * @var bool
     */
    public $timestamps = false;
}
