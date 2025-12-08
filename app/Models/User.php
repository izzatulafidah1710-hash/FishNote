<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        // HAPUS 'resident_id' karena tidak ada di tabel users!
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Laravel 11 & 12
    ];

    /**
     * ✅ BENAR: Relasi ke Resident (One to One)
     * Satu User memiliki satu Resident
     * Foreign key ada di tabel residents (residents.user_id)
     */
    public function resident(): HasOne
    {
        return $this->hasOne(Resident::class);
    }

    /**
     * Relasi ke Promosi (One to Many)
     * Satu User memiliki banyak Promosi
     */
    public function promosi(): HasMany
    {
        return $this->hasMany(Promosi::class);
    }

    /**
     * Relasi ke Pencatatan (One to Many)
     * Satu User memiliki banyak Pencatatan
     */
    public function pencatatan(): HasMany
    {
        return $this->hasMany(Pencatatan::class);
    }

    /**
     * Relasi ke DataPanen (One to Many)
     * Satu User memiliki banyak DataPanen
     */
    public function dataPanen(): HasMany
    {
        return $this->hasMany(DataPanen::class);
    }

    /**
     * Helper: Check apakah user adalah admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Helper: Check apakah user adalah peternak
     */
    public function isPeternak(): bool
    {
        return $this->role === 'peternak';
    }

    /**
     * Scope: Filter user berdasarkan role
     */
    public function scopeByRole($query, $role)
    {
        return $query->where('role', $role);
    }
}