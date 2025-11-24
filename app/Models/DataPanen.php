<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPanen extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'data_panen';

    protected $fillable = [
        'user_id',
        'tanggal_panen',
        'jenis_ikan',
        'kolam',
        'jumlah_ikan',
        'berat_total',
        'berat_rata_rata',
        'harga_per_kg',
        'total_pendapatan',
        'pembeli',
        'keterangan',
        'status',
        'foto',
    ];

    protected $casts = [
        'tanggal_panen' => 'date',
        'jumlah_ikan' => 'integer',
        'berat_total' => 'decimal:2',
        'berat_rata_rata' => 'decimal:2',
        'harga_per_kg' => 'decimal:2',
        'total_pendapatan' => 'decimal:2',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor untuk format tanggal
    public function getTanggalPanenFormatAttribute()
    {
        return $this->tanggal_panen->format('d/m/Y');
    }

    // Scope untuk filter berdasarkan bulan
    public function scopeByMonth($query, $month, $year)
    {
        return $query->whereMonth('tanggal_panen', $month)
                    ->whereYear('tanggal_panen', $year);
    }

    // Scope untuk filter berdasarkan status
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Accessor untuk badge status
    public function getStatusBadgeAttribute()
    {
        $badges = [
            'Sudah Terjual' => 'success',
            'Belum Terjual' => 'warning',
            'Sebagian Terjual' => 'info',
        ];

        return $badges[$this->status] ?? 'secondary';
    }
}