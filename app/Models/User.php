<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function mitra()
    {
        return $this->hasOne(Mitra::class);
    }

    public function driver()
    {
        return $this->hasOne(Driver::class);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'customer_id');
    }

    public function isRole(string $role)
    {
        return $this->role === $role;
    }
}
