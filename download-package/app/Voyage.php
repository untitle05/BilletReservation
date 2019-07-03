<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{

    protected $table = 'voyage';
    public $timestamps = true;
    protected $fillable = array('dateDep_voy', 'dateArrv_voy', 'frais', 'nbrPlace_voy');

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function vehicule()
    {
        return $this->belongsTo('App\Vehicule');
    }

    public function destination()
    {
        return $this->belongsTo('App\Destination');
    }
}
