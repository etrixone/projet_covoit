<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //Relation user plusieurs trajets 1n
    public function proposer() 
    {
        return $this->hasMany('App\Trajet' ,'USR_ID' , 'id');
    }
    
    //relation nn
    public function reserver() {
        return $this->belongsToMany('App\Trajet', 'trajets_users', 'USR_ID', 'TRJ_ID');
    }
    
    public function posseder() {
        return $this->hasOne('App\Voiture', 'USR_ID', 'id');
    }
    
    public $timestamps = false;
}
