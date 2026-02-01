<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MitraTopup extends Model
{
    use HasFactory;

    protected $fillable = ['mitra_id','user_id','amount','status','proof','admin_id','notes'];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function admin()
    {
        return $this->belongsTo(\App\Models\User::class,'admin_id');
    }
}