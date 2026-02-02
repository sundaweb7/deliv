<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_commission_percent',
        'admin_delivery_cut',
        'courier_share_percent',
        'fcm_server_key',
        'wa_provider',
        'wa_api_key',
        'wa_device_id',
        'wa_api_url',
        'wa_enabled',
        'wa_send_to_mitra',
        'wa_send_to_customer',
    ];
}
