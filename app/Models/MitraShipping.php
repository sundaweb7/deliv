<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MitraShipping extends Model
{
    use HasFactory;

    protected $fillable = ['mitra_id','name','description','is_active'];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }

    public function rates()
    {
        return $this->hasMany(MitraShippingRate::class);
    }
}
