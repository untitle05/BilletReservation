<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model 
{

    protected $table = 'reservation';
    public $timestamps = true;
    protected $fillable = array('date_reserv', 'nbrPlace_reserv', 'etat_reserv');

    public function voyage()
    {
        return $this->belongsTo('App\Voyage');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}