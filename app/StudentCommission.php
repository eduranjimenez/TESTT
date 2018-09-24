<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCommission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'institutioncommission_id', 'student_id', 'country_id'
    ];
}
