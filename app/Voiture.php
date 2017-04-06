<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voiture extends Model {

    protected $fillable = [
        
    ];

    public function posseder() {
        return $this->belongsTo('App\User');
    }
public $timestamps = false;
}
