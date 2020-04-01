<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Participant extends Model implements HasMedia
{
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'institution_id',
        'category',
        'gender',
        'academic_level',
        'address',
        'cellphone',
        'date_birth',
        'phone',
        'blood_type',
        'emergency_contact_name',
        'emergency_contact_cellphone',
        'emergency_contact_phone',
        'emergency_contact_email',
        'emergency_contact_relation',
        'notes',
        'is_completed'
    ];

    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }

    public function participantcommission()
    {
        return $this->hasOne('App\ParticipantRepresentation');
    }

    public function getFullName()
    {
        return "{$this->name} {$this->lastname}";
    }

    public function getRepresentation()
    {
        if (!$this->participantcommission) {
            return null;
        }

        if ($this->getCommissionLang() === \App\Enums\Lang::SPANISH) {
            return $this->participantcommission->commissionrepresentation->representation->spanish_name;
        }

        if ($this->getCommissionLang() === \App\Enums\Lang::ENGLISH) {
            return $this->participantcommission->commissionrepresentation->representation->english_name;
        }

        if ($this->getCommissionLang() === \App\Enums\Lang::FRENCH) {
            return $this->participantcommission->commissionrepresentation->representation->french_name;
        }

    }

    public function getRepresentationId()
    {
        if (!$this->participantcommission) {
            return null;
        }
        return $this->participantcommission->commissionrepresentation->id;
    }

    public function getCommissionLang()
    {
        if (!$this->participantcommission) {
            return null;
        }
        return $this->participantcommission->commissionrepresentation->institutioncommission->commission->language_id;
    }

    public function getCommission()
    {
        if (!$this->participantcommission) {
            return null;
        }
        return $this->participantcommission->commissionrepresentation->institutioncommission->commission->name;
    }

    public function getImage()
    {
        $photo = $this->getMedia('photos')->first();
        if ($photo !== null) {
            return $this->getMedia('photos')->first()->getFullUrl();
        } else {
            return asset('media/avatar0.jpg');
        }
    }

    public function getImagePath()
    {
        $photo = $this->getMedia('photos')->first();
        if ($photo !== null) {
            return $this->getMedia('photos')->first()->getPath();
        } else {
            return public_path() . '/media/avatar0.jpg';
        }
    }

    public function getConductFile()
    {
        if ($this->getMedia('conduct_codes')->first()) {
            return $this->getMedia('conduct_codes')->first()->getFullUrl();
        } else {
            return '#';
        }
    }

    public function getFpaymentFile()
    {
        if ($this->getMedia('first_payments')->first()) {
            return $this->getMedia('first_payments')->first()->getFullUrl();
        } else {
            return '#';
        }
    }

    public function getLpaymentFile()
    {
        if ($this->getMedia('last_payments')->first()) {
            return $this->getMedia('last_payments')->first()->getFullUrl();
        } else {
            return '#';
        }
    }

    public function countMedia()
    {
        $photo = $this->getMedia('photos')->count();
        $conducCode = $this->getMedia('conduct_codes')->count();
        $firstPayment = $this->getMedia('first_payments')->count();
        $lastPayment = $this->getMedia('last_payments')->count();

        return $count = $photo + $conducCode + $firstPayment + $lastPayment;
    }
}
