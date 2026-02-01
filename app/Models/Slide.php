<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slide extends Model
{
    use HasFactory;

    protected $fillable = ['image','order','is_active'];

    public function getImageUrlAttribute()
    {
        if (!$this->image) return null;
        // Prefer request host when available (ensures local dev returns local URLs instead of APP_URL)
        $host = null;
        if (function_exists('request') && request()) {
            $host = request()->getSchemeAndHttpHost();
        }
        return ($host ?: url('/')) . '/slides/image/'.rawurlencode($this->image);
    }

    public function getThumbUrlAttribute()
    {
        if (!$this->image) return null;
        $host = null;
        if (function_exists('request') && request()) {
            $host = request()->getSchemeAndHttpHost();
        }
        return ($host ?: url('/')) . '/slides/image/thumb/'.rawurlencode($this->image);
    }
}