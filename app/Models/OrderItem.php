<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_vendor_id', 'product_id', 'qty', 'price'];

    public function orderVendor()
    {
        return $this->belongsTo(OrderVendor::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
