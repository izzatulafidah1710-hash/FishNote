<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Promosi extends Model
{
    use HasFactory;

    protected $table = 'promosi';

    protected $fillable = [
        'user_id',
        'resident_id', 
        'judul_promosi',
        'jenis_ikan',
        'deskripsi',
        'harga',
        'satuan',
        'stok_tersedia',
        'lokasi',
        'kontak',
        'tanggal_mulai',
        'tanggal_berakhir',
        'status',
        'foto',
        'views',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_berakhir' => 'date',
        'harga' => 'decimal:2',
        'stok_tersedia' => 'integer',
        'views' => 'integer',
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Resident (Peternak)
     * TAMBAHKAN INI - PENTING!
     */
    public function resident()
    {
        return $this->belongsTo(Resident::class, 'resident_id');
    }

    /**
     * Accessor untuk status badge
     */
    public function getStatusBadgeAttribute()
    {
        $badges = [
            'Aktif' => 'success',
            'Tidak Aktif' => 'secondary',
            'Habis' => 'danger',
        ];

        return $badges[$this->status] ?? 'secondary';
    }

    /**
     * Cek apakah promosi masih aktif berdasarkan tanggal
     */
    public function getIsActiveAttribute()
    {
        $now = Carbon::now();
        return $this->status === 'Aktif' 
            && $this->tanggal_mulai <= $now 
            && $this->tanggal_berakhir >= $now
            && $this->stok_tersedia > 0;
    }

    /**
     * Hitung sisa hari promosi
     */
    public function getSisaHariAttribute()
    {
        $now = Carbon::now();
        if ($this->tanggal_berakhir < $now) {
            return 0;
        }
        return $now->diffInDays($this->tanggal_berakhir);
    }

    /**
     * Scope untuk promosi aktif
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'Aktif')
                    ->where('tanggal_mulai', '<=', Carbon::now())
                    ->where('tanggal_berakhir', '>=', Carbon::now())
                    ->where('stok_tersedia', '>', 0);
    }

    /**
     * Scope untuk filter berdasarkan jenis ikan
     */
    public function scopeByJenisIkan($query, $jenisIkan)
    {
        return $query->where('jenis_ikan', $jenisIkan);
    }

    /**
     * Increment views
     */
    public function incrementViews()
    {
        $this->increment('views');
    }

    /**
     * Accessor untuk format harga
     */
    public function getFormattedHargaAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }
}