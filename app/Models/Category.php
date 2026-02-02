<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','icon','order'];

    // append friendly image URLs when serializing to JSON
    protected $appends = ['icon_url','thumb_url'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getIconUrlAttribute()
    {
        if (!$this->icon) return null;
        $host = config('app.url') ?: (function_exists('request') && request() ? request()->getSchemeAndHttpHost() : url('/'));
        return rtrim($host, '/') . '/categories/image/' . rawurlencode($this->icon);
    }

    public function getThumbUrlAttribute()
    {
        if (!$this->icon) return null;
        $host = config('app.url') ?: (function_exists('request') && request() ? request()->getSchemeAndHttpHost() : url('/'));
        return rtrim($host, '/') . '/categories/image/thumb/' . rawurlencode($this->icon);
    }
}