<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'is_online', 'lat', 'lng'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function routes()
    {
        return $this->hasMany(DriverRoute::class);
    }
}
