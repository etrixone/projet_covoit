<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model {

    protected $fillable = [
        'USR_ID', 'TRJ_DEPART', 'TRJ_DESTINATION', 'trj_info', 'trj_date', 'trj_heure', 'trj_duree', 'trj_flexible', 'trj_bagage', 'trj_prix'
    ];
    public $timestamps = false;

    //relation n1
    public function proposer() {
        return $this->belongsTo('App\User');
    }
    
    //relation nn
    public function reserver() {
        return $this->belongsToMany('App\User', 'trajets_users', 'TRJ_ID', 'USR_ID');
    }
    
    //public $key = 'ID';

}
