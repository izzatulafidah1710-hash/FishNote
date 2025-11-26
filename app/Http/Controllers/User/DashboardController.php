<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pencatatan;
use App\Models\DataPanen;
use App\Models\Promosi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Sementara menggunakan user_id = 1
        $userId = 1;

        // Bulan ini
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        // Summary Cards
        $totalAktivitasBulanIni = Pencatatan::where('user_id', $userId)
            ->whereMonth('tanggal', $bulanIni)
            ->whereYear('tanggal', $tahunIni)
            ->count();

        $totalPanenBulanIni = DataPanen::where('user_id', $userId)
            ->whereMonth('tanggal_panen', $bulanIni)
            ->whereYear('tanggal_panen', $tahunIni)
            ->count();

        $promosiAktif = Promosi::where('user_id', $userId)
            ->where('status', 'Aktif')
            ->count();

        // Keuangan Bulan Ini
        $pendapatanBulanIni = DataPanen::where('user_id', $userId)
            ->whereMonth('tanggal_panen', $bulanIni)
            ->whereYear('tanggal_panen', $tahunIni)
            ->sum('total_pendapatan') ?? 0;

        $pengeluaranBulanIni = Pencatatan::where('user_id', $userId)
            ->whereMonth('tanggal', $bulanIni)
            ->whereYear('tanggal', $tahunIni)
            ->sum('biaya') ?? 0;

        $labaRugiBulanIni = $pendapatanBulanIni - $pengeluaranBulanIni;

        // Aktivitas Terbaru
        $pencatatanTerbaru = Pencatatan::where('user_id', $userId)
            ->orderBy('tanggal', 'desc')
            ->limit(5)
            ->get();

        $panenTerbaru = DataPanen::where('user_id', $userId)
            ->orderBy('tanggal_panen', 'desc')
            ->limit(5)
            ->get();

        // Promosi Performance
        $promosiPerformance = Promosi::where('user_id', $userId)
            ->where('status', 'Aktif')
            ->orderBy('views', 'desc')
            ->limit(5)
            ->get();

        // Chart Data - 6 Bulan Terakhir
        $chartData = $this->getChartData($userId);

        // Statistik Panen per Jenis Ikan
        $panenPerJenis = DataPanen::where('user_id', $userId)
            ->whereYear('tanggal_panen', $tahunIni)
            ->select('jenis_ikan', DB::raw('SUM(berat_total) as total_berat'))
            ->groupBy('jenis_ikan')
            ->orderBy('total_berat', 'desc')
            ->get();

        // Quick Stats
        $totalPakan = Pencatatan::where('user_id', $userId)
            ->whereYear('tanggal', $tahunIni)
            ->sum('jumlah_pakan') ?? 0;

        $totalBeratPanen = DataPanen::where('user_id', $userId)
            ->whereYear('tanggal_panen', $tahunIni)
            ->sum('berat_total') ?? 0;

        $totalViews = Promosi::where('user_id', $userId)
            ->sum('views') ?? 0;

        return view('user.dashboarduser', compact(
            'totalAktivitasBulanIni',
            'totalPanenBulanIni',
            'promosiAktif',
            'pendapatanBulanIni',
            'pengeluaranBulanIni',
            'labaRugiBulanIni',
            'pencatatanTerbaru',
            'panenTerbaru',
            'promosiPerformance',
            'chartData',
            'panenPerJenis',
            'totalPakan',
            'totalBeratPanen',
            'totalViews'
        ));
    }

    private function getChartData($userId)
    {
        $months = [];
        $pendapatan = [];
        $pengeluaran = [];

        // 6 Bulan Terakhir
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $months[] = $date->format('M Y');

            $pendapatan[] = DataPanen::where('user_id', $userId)
                ->whereMonth('tanggal_panen', $date->month)
                ->whereYear('tanggal_panen', $date->year)
                ->sum('total_pendapatan') ?? 0;

            $pengeluaran[] = Pencatatan::where('user_id', $userId)
                ->whereMonth('tanggal', $date->month)
                ->whereYear('tanggal', $date->year)
                ->sum('biaya') ?? 0;
        }

        return [
            'months' => $months,
            'pendapatan' => $pendapatan,
            'pengeluaran' => $pengeluaran,
        ];
    }
}