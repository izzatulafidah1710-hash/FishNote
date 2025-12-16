<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeternakActivity extends Model
{
    protected $table = 'peternak_activities';
    
    protected $fillable = [
        'peternak_id',
        'activity_type',
        'description',
        'related_module',
        'related_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    /**
     * Relasi ke Resident (Peternak)
     * TAMBAHKAN INI - PENTING!
     */
    public function peternak()
    {
        return $this->belongsTo(Resident::class, 'peternak_id');
    }

    /**
     * Relasi polymorphic ke data terkait (pencatatan/panen/promosi)
     */
    public function relatedData()
    {
        // Mapping module ke model
        $models = [
            'pencatatan' => Pencatatan::class,
            'panen' => DataPanen::class,
            'promosi' => Promosi::class,
        ];

        if (isset($models[$this->related_module])) {
            $modelClass = $models[$this->related_module];
            return $modelClass::find($this->related_id);
        }

        return null;
    }

    /**
     * Accessor untuk icon berdasarkan activity_type
     */
    public function getIconAttribute()
    {
        $icons = [
            'Pencatatan' => 'fa-clipboard-list',
            'Panen' => 'fa-fish',
            'Promosi' => 'fa-bullhorn',
            'Login' => 'fa-sign-in-alt',
            'Update' => 'fa-edit',
            'Delete' => 'fa-trash',
        ];

        return $icons[$this->activity_type] ?? 'fa-circle';
    }

    /**
     * Accessor untuk badge color
     */
    public function getBadgeColorAttribute()
    {
        $colors = [
            'Pencatatan' => 'primary',
            'Panen' => 'success',
            'Promosi' => 'warning',
            'Login' => 'info',
            'Update' => 'secondary',
            'Delete' => 'danger',
        ];

        return $colors[$this->activity_type] ?? 'secondary';
    }

    /**
     * Scope untuk filter berdasarkan peternak
     */
    public function scopeByPeternak($query, $peternakId)
    {
        return $query->where('peternak_id', $peternakId);
    }

    /**
     * Scope untuk filter berdasarkan jenis aktivitas
     */
    public function scopeByType($query, $type)
    {
        return $query->where('activity_type', $type);
    }

    /**
     * Scope untuk aktivitas hari ini
     */
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    /**
     * Scope untuk aktivitas minggu ini
     */
    public function scopeThisWeek($query)
    {
        return $query->whereBetween('created_at', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ]);
    }
}