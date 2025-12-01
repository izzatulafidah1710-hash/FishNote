<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $table = 'residents';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'farm_location',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->hasOne(User::class);
    }

    // Relasi ke Promosi (melalui user)
    public function promosi()
    {
        return $this->hasManyThrough(Promosi::class, User::class, 'resident_id', 'user_id');
    }
}