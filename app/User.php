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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function orders() {
        return $this->hasMany(Order::class);
    }

    function paid_orders() {
        return $this->hasMany(Order::class)->where('paid', 1);
    }

    function payments() {
        return $this->hasMany(Payment::class);
    }
    function successful_payments() {
        return $this->hasMany(Payment::class)->where('successful', 1);
    }
    function isAdmin() {
        if ($this->admin === 1) {
            return true;
        }
        return false;
    }
}
