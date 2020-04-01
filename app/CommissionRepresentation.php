<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommissionRepresentation extends Model
{
    protected $fillable = [
        'representation_id', 'capacity', 'institutioncommission_id'
    ];

    public function representation()
    {
        return $this->belongsTo('App\Representation');
    }

    public function institutioncommission()
    {
        return $this->belongsTo('App\InstitutionCommission');
    }

    public function participantrepresentations()
    {
        return $this->hasMany('App\ParticipantRepresentation', 'commissionrepresentation_id');
    }
}
