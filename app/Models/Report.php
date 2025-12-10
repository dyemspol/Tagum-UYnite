<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'barangay_id',
        'department_id',
        'Street_Purok',
        'address_details',
        'latitude',
        'longitude',
        'report_status',
        'post_status',
        'rejection_reason',
        'priority_level',
        'reviewed_by',
    ];
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
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function barangay()
    {
        return $this->belongsTo(Baranggay::class);
    }
    public function scopePopular($query)
{
    return $query->withCount([
        'reactions as likes_count' => function ($query) {
            $query->where('reaction_type', 'like');
        }
    ])->orderByDesc('likes_count');
}
}
