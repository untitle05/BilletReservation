<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model 
{

    protected $table = 'destination';
    public $timestamps = true;
    protected $fillable = [
        'destination_name'
];

    public function arrets()
    {
        return $this->hasMany('App\Arret');
    }

    public function voyages()
    {
        return $this->hasMany('App\Voyage');
    }

}