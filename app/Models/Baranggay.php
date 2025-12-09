<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baranggay extends Model
{
    protected $fillable = [
        'barangay_name',
    ];
    protected $table = 'barangays';

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
