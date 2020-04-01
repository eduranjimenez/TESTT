<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipantRepresentation extends Model
{
    protected $fillable = [
        'participant_id', 'commissionrepresentation_id'
    ];

    public function participant()
    {
        return $this->belongsTo('App\Participant');
    }

    public function commissionrepresentation()
    {
        return $this->belongsTo('App\CommissionRepresentation');
    }
}
