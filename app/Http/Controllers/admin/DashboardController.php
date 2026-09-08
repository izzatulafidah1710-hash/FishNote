<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Resident;
use App\Models\Promosi;
use App\Models\Pencatatan;
use App\Models\DataPanen;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        // Stat Cards
        $totalPeternak = Resident::count();
        $peternakAktif = Resident::where('status', 'aktif')->count();

        $totalPromosi = Promosi::count();
        $promosiAktif = Promosi::where('status', 'Aktif')->count();

        $totalPanenBulanIni = DataPanen::whereMonth('tanggal_panen', $bulanIni)
            ->whereYear('tanggal_panen', $tahunIni)
            ->count();

        $totalBeratPanenBulanIni = DataPanen::whereMonth('tanggal_panen', $bulanIni)
            ->whereYear('tanggal_panen', $tahunIni)
            ->sum('berat_total') ?? 0;

        $totalPendapatanPanenBulanIni = DataPanen::whereMonth('tanggal_panen', $bulanIni)
            ->whereYear('tanggal_panen', $tahunIni)
            ->sum('total_pendapatan') ?? 0;

        // Data Terbaru (nama variabel sesuai dengan view)
        $peternakTerbaru = Resident::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $promosiTerbaru = Promosi::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboardadmin', compact(
            'totalPeternak',
            'peternakAktif',
            'totalPromosi',
            'promosiAktif',
            'totalPanenBulanIni',
            'totalBeratPanenBulanIni',
            'totalPendapatanPanenBulanIni',
            'peternakTerbaru',
            'promosiTerbaru'
        ));
    }
}
