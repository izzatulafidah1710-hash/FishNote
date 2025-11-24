<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pencatatan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pencatatan';

    protected $fillable = [
        'user_id',
        'tanggal',
        'jenis_kegiatan',
        'keterangan',
        'jumlah_pakan',
        'berat_ikan',
        'jumlah_ikan',
        'suhu_air',
        'ph_air',
        'oksigen',
        'kondisi_ikan',
        'biaya',
        'foto',
        'jenis_ikan',
        'kolam',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jumlah_pakan' => 'decimal:2',
        'berat_ikan' => 'decimal:2',
        'suhu_air' => 'decimal:2',
        'ph_air' => 'decimal:2',
        'oksigen' => 'decimal:2',
        'biaya' => 'decimal:2',
    ];

    // Relasi ke User (akan aktif setelah ada sistem login)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor untuk format tanggal Indonesia
    public function getTanggalFormatAttribute()
    {
        return $this->tanggal->format('d/m/Y');
    }

    // Scope untuk filter berdasarkan jenis kegiatan
    public function scopeByJenisKegiatan($query, $jenis)
    {
        return $query->where('jenis_kegiatan', $jenis);
    }

    // Scope untuk filter berdasarkan bulan
    public function scopeByMonth($query, $month, $year)
    {
        return $query->whereMonth('tanggal', $month)
                    ->whereYear('tanggal', $year);
    }
}