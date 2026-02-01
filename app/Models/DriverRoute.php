<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DriverRoute extends Model
{
    use HasFactory;

    protected $fillable = ['driver_id', 'order_vendor_id', 'pickup_sequence', 'pickup_status'];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function orderVendor()
    {
        return $this->belongsTo(OrderVendor::class);
    }
}
