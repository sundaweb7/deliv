<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MitraStatusLog extends Model
{
    use HasFactory;

    protected $fillable = ['mitra_id', 'user_id', 'old_is_open', 'new_is_open', 'reason'];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
