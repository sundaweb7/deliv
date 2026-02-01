<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['mitra_id', 'category_id', 'name', 'description', 'price', 'stock', 'is_active', 'image'];

    protected $appends = ['image_url', 'thumb_url'];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) return null;
        // Prefer configured app URL (production host), fallback to request host or url('/').
        $host = config('app.url') ?: (function_exists('request') && request() ? request()->getSchemeAndHttpHost() : url('/'));
        return rtrim($host, '/') . '/products/image/'.rawurlencode($this->image);
    }

    public function getThumbUrlAttribute()
    {
        if (!$this->image) return null;
        $host = config('app.url') ?: (function_exists('request') && request() ? request()->getSchemeAndHttpHost() : url('/'));
        return rtrim($host, '/') . '/products/image/thumb/'.rawurlencode($this->image);
    }
}
