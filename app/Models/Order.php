<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'order_type', 'status', 'total_food', 'delivery_fee', 'admin_profit', 'grand_total', 'payment_method', 'payment_status', 'bank_id'];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function orderVendors()
    {
        return $this->hasMany(OrderVendor::class);
    }
}
