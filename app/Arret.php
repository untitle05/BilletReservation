<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arret extends Model
{
    protected $table = 'arrets';
    public $timestamps = true;
    protected $fillable = [
        'nom_arret',
        'destination_id'
    ];

    public function destination()
    {
        return $this->belongsTo('App\Destination');
    }
}
