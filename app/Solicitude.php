<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
    protected $table = 'solicitudes';

    public function occupant()
    {
        return $this->hasOne('App\Occupant', 'solicitudid');
    }

    public function institution()
    {
        return $this->belongsTo('App\Institution', 'institucionid', 'id');
    }
}
