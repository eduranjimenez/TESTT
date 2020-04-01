<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'language_id'
    ];

    public function institutioncommissions()
    {
        return $this->hasMany('App\InstitutionCommission');
    }

    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    public function getLanguage()
    {
        return $this->language->name;
    }
}
