<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MitraShippingRate extends Model
{
    use HasFactory;

    protected $fillable = ['mitra_shipping_id','destination','cost','is_active'];

    public function shipping()
    {
        return $this->belongsTo(MitraShipping::class, 'mitra_shipping_id');
    }
}
