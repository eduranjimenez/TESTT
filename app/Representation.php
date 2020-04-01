<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representation extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'spanish_name', 'english_name', 'french_name'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function institutioncommissions()
    {
        return $this->hasMany('App\InstitutionCommission');
    }
}
