<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model {

    protected $fillable = [
        'usr_id', 'vil_id_depart', 'vil_id_arriver', 'vil_id_etape1', 'vil_id_etape2', 'vil_id_etape3', 'trj_info', 'trj_date', 'trj_heure', 'trj_duree', 'trj_flexible', 'trj_bagage', 'trj_prix'
    ];
    public $timestamps = false;

    //relation n1
    public function creer() {
        return $this->belongsTo('App\User');
    }
    
    //relation nn
    public function reserver() {
        return $this->belongsToMany('App\User');
    }

}
