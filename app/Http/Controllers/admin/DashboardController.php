<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Resident;
use App\Models\Promosi;
use App\Models\Pencatatan;
use App\Models\DataPanen;
use App\Models\PeternakActivity;
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

        $aktivitasHariIni = PeternakActivity::whereDate('created_at', Carbon::today())->count();

        // Data Terbaru
        $recentPeternak = Resident::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $recentPromosi = Promosi::with(['resident', 'user'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $recentActivities = PeternakActivity::with('peternak')
            ->orderBy('created_at', 'desc')
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
            'aktivitasHariIni',
            'recentPeternak',
            'recentPromosi',
            'recentActivities'
        ));
    }
}
