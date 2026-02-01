<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderVendor extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'mitra_id', 'subtotal_food', 'delivery_type', 'status', 'payout_processed', 'delivery_fee_share', 'shipping_model_id', 'shipping_rate_id'];

    protected $casts = ['payout_processed' => 'boolean'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
