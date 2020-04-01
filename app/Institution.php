<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Institution extends Model implements HasMedia
{
    use HasMediaTrait;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'phone', 'country', 'ador_one_name', 'ador_one_phone', 'ador_one_email', 'ador_two_name', 'ador_two_phone', 'ador_two_email'
    ];

    public function participants()
    {
        return $this->hasMany('App\Participant');
    }

    public function institutioncommissions()
    {
        return $this->hasMany('App\InstitutionCommission');
    }
}
