<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MitraWithdrawal extends Model
{
    protected $fillable = ['mitra_id','user_id','amount','status','note','processed_by','processed_at'];

    protected $casts = ['amount' => 'float', 'processed_at' => 'datetime'];

    public function mitra() { return $this->belongsTo(\App\Models\Mitra::class); }
    public function user() { return $this->belongsTo(\App\Models\User::class); }
    public function processor() { return $this->belongsTo(\App\Models\User::class, 'processed_by'); }
}
