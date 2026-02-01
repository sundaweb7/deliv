<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['vendor_commission_percent', 'admin_delivery_cut', 'courier_share_percent', 'fcm_server_key'];
}
