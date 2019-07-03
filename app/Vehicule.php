<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model 
{

    protected $table = 'vehicule';
    public $timestamps = true;
    protected $fillable = [
        'immat_vehi', 
        'marque_vehi', 
        'model', 
        'nbrPlace_vehi', 
        'vitesseMax'
    ];

    public function voyages()
    {
        return $this->hasMany('App\Voyage');
    }

}