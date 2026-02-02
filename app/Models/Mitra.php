<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mitra extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'delivery_type', 'lat', 'lng', 'is_active', 'is_open', 'business_name', 'wa_number', 'address_desa', 'address_kecamatan', 'address_regency', 'address_province', 'address', 'profile_photo', 'store_photo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orderVendors()
    {
        return $this->hasMany(OrderVendor::class);
    }

    public function couriers()
    {
        return $this->hasMany(MitraCourier::class);
    }

    public function couriersMany()
    {
        return $this->belongsToMany(MitraCourier::class, 'courier_mitra', 'mitra_id', 'mitra_courier_id');
    }

    public function hasActiveCourier()
    {
        $hasDirect = $this->couriers()->where('is_active', true)->exists();
        $hasMany = $this->couriersMany()->where('is_active', true)->exists();
        return $hasDirect || $hasMany;
    }

    public function shippingModels()
    {
        return $this->hasMany(\App\Models\MitraShipping::class);
    }
}
