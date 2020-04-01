<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'lastname', 'phone', 'institution_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }

    public function isAdmin()
    {
        if($this->role === \App\Enums\Roles::ISADMIN) {
            return true;
        }
    }

    public function getRole()
    {
        if($this->role === 1) {
            return 'Administrador';
        }
        return 'Encargado';
    }
}
