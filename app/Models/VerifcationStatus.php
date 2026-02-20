<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifcationStatus extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'reason',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
