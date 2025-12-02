<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }

    public function postImages()
    {
        return $this->hasMany(PostImages::class);
    }
}
