<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voiture extends Model {

    public function posseder() {
        return $this->belongsTo('App\User');
    }

}
