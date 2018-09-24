<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstitutionCommission extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'capacity', 'commission_id', 'countries'
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'countries' => 'array',
    ];

}
