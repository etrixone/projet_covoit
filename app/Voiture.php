<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voiture extends Model {

    protected $fillable = [
        'MRQ_NOM', 'USR_ID', 'CLR_NOM', 'VTR_FUMEUR', 'VTR_ANIMAUX'
    ];

    public function posseder() {
        return $this->belongsTo('App\User');
    }
public $timestamps = false;
}
