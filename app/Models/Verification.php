<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $fillable = [
        'user_id',
        'verification_photo',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
