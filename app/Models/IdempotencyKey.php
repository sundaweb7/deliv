<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IdempotencyKey extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','key','route','response'];
}