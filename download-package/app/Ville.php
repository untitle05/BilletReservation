<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{

    protected $table = 'destination';
    public $timestamps = true;
    protected $fillable = array('destination_name');

    public function voyages()
    {
        return $this->hasMany('App\Voyage');
    }
}
