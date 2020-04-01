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
        'commission_id', 'institution_id'
    ];

    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }

    public function commission()
    {
        return $this->belongsTo('App\Commission');
    }

    public function commissionrepresentations()
    {
        return $this->hasMany('App\CommissionRepresentation','institutioncommission_id');
    }

    public function getCommisionName()
    {
        return $this->commission->name;
    }

    public function getCommissionLang()
    {
        return $this->commission->language->name;
    }

}
