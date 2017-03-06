<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    public $timestamps = false;
    protected $fillable = ['vil_id', 'vil_nom', 'vil_code', 'vil_departement', 'vil_longitude', 'vil_latitude'];
    
        //relation 1:1
    public function depart() {
        return $this->hasMany('App\Trajet','VIL_ID_DEPART', 'ID')->select(array('VIL_NOM'));
    }
    
        public function destination() {
        return $this->hasMany('App\Trajet', 'VIL_ID_DESTINATION', 'ID');
    }
}
