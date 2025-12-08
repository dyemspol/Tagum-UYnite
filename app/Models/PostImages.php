<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostImages extends Model
{
    protected $fillable = [
        'report_id',
        'cdn_url',
        'public_id',
        'mime_type',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
