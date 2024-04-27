<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'nickname', 'last_name', 'first_name',
    ];

    protected $hidden = [
        'password', 'remember_token', 'is_admin'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function carts()
    {
        return $this->hasMany(Product::all());
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
