<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourierRoute extends Model
{
    use HasFactory;

    protected $fillable = ['mitra_courier_id','order_vendor_id','pickup_sequence','pickup_status','courier_fee','courier_paid'];

    protected $casts = ['courier_paid' => 'boolean'];

    public function courier()
    {
        return $this->belongsTo(MitraCourier::class, 'mitra_courier_id');
    }

    public function orderVendor()
    {
        return $this->belongsTo(OrderVendor::class);
    }
}