<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    public $timestamps = false;
    protected $fillable = ['vil_id', 'vil_nom', 'vil_code', 'vil_departement', 'vil_longitude', 'vil_latitude'];
    

}
