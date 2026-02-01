<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = ['code','type','value','usage_limit','used_count','min_order_amount','starts_at','expires_at','is_active'];

    protected $casts = [
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
        'is_active' => 'boolean',
        'value' => 'decimal:2',
        'min_order_amount' => 'decimal:2',
    ];

    public function isValidForAmount(float $amount): bool
    {
        if (!$this->is_active) return false;
        if ($this->starts_at && Carbon::now()->lt($this->starts_at)) return false;
        if ($this->expires_at && Carbon::now()->gt($this->expires_at)) return false;
        if ($this->usage_limit !== null && $this->used_count >= $this->usage_limit) return false;
        if ($amount < (float)$this->min_order_amount) return false;
        return true;
    }

    public function calculateDiscount(float $amount): float
    {
        if (!$this->isValidForAmount($amount)) return 0.0;
        if ($this->type === 'percent') {
            return round($amount * ($this->value / 100.0), 2);
        }
        return min((float)$this->value, $amount);
    }

    public function incrementUsed(): void
    {
        $this->increment('used_count');
    }
}
