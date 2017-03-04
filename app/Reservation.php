<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
     protected $fillable = [
        'usr_id', 'trj_id'
    ];
    public $timestamps = false;
    
    
}
