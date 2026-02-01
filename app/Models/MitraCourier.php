<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MitraCourier extends Model
{
    use HasFactory;

    protected $fillable = ['mitra_id','name','phone','vehicle','is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }
}