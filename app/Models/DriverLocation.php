<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DriverLocation extends Model
{
    use HasFactory;

    protected $fillable = ['driver_id','lat','lng','speed','heading','reported_at'];

    protected $dates = ['reported_at'];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}