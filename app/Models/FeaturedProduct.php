<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeaturedProduct extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','position'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}