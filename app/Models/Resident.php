<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resident extends Model
{
    protected $table = 'residents';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'farm_location',
        'jenis_usaha',
        'luas_lahan',
        'status',
    ];

    protected $casts = [
        'luas_lahan' => 'decimal:2',
    ];

    /**
     * Relasi ke User (One to One)
     * Satu resident dimiliki oleh satu user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope untuk filter peternak aktif
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'aktif');
    }

    /**
     * Scope untuk filter peternak non-aktif
     */
    public function scopeInactive($query)
    {
        return $query->where('status', 'nonaktif');
    }
}