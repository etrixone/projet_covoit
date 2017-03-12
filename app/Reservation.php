<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
     protected $fillable = [
        'USR_ID', 'TRJ_ID'
    ];
    public $timestamps = false;
    
    
}
