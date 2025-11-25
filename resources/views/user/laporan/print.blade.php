<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan {{ $monthNames[$bulan] ?? 'Bulanan' }} {{ $tahun }}</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            font-size: 12px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #333;
            padding-bottom: 20px;
        }
        
        .header h1 {
            color: #333;
            margin-bottom: 5px;
        }
        
        .header p {
            color: #666;
            font-size: 14px;
        }
        
        .periode {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }
        
        .section {
            margin-bottom: 30px;
            page-break-inside: avoid;
        }
        
        .section-title {
            background: #333;
            color: white;
            padding: 10px 15px;
            margin-bottom: 15px;
            font-weight: bold;
            border-radius: 3px;
        }
        
        .keuangan-box {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        
        .keuangan-item {
            flex: 1;
            border: 2px solid #ddd;
            padding: 15px;
            text-align: center;
            margin: 0 5px;
            border-radius: 5px;
        }
        
        .keuangan-item.pemasukan {
            border-color: #28a745;
        }
        
        .keuangan-item.pengeluaran {
            border-color: #dc3545;
        }
        
        .keuangan-item.laba {
            border-color: #007bff;
        }
        
        .keuangan-item.rugi {
            border-color: #ffc107;
        }
        
        .keuangan-item h3 {
            color: #666;
            font-size: 11px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        
        .keuangan-item .nilai {
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        
        table th {
            background: #f8f9fa;
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
            font-weight: bold;
        }
        
        table td {
            padding: 8px 10px;
            border: 1px solid #ddd;
        }
        
        table tr:nth-child(even) {
            background: #f8f9fa;
        }
        
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
        
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: bold;
        }
        
        .badge-success {
            background: #28a745;
            color: white;
        }
        
        .badge-info {
            background: #17a2b8;
            color: white;
        }
        
        .summary-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .summary-box {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
        }
        
        @media print {
            body {
                padding: 0;
            }
            
            .no-print {
                display: none;
            }
            
            .section {
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<body>
    <!-- Print Button -->
    <div class="no-print" style="text-align: right; margin-bottom: 20px;">
        <button onclick="window.print()" style="padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Print Laporan
        </button>
    </div>

    <!-- Header -->
    <div class="header">
        <h1>FISHNOTE</h1>
        <p>Laporan Keuangan & Aktivitas Peternakan Ikan</p>
    </div>

    <!-- Periode -->
    <div class="periode">
        @php
            $monthNames = [
                1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
            ];
        @endphp
        Periode: {{ $monthNames[$bulan] }} {{ $tahun }}
    </div>

    <!-- Ringkasan Keuangan -->
    <div class="section">
        <div class="section-title">RINGKASAN KEUANGAN</div>
        <div class="keuangan-box">
            <div class="keuangan-item pemasukan">
                <h3>Total Pemasukan</h3>
                <div class="nilai">Rp {{ number_format($laporanKeuangan['total_pemasukan'], 0, ',', '.') }}</div>
            </div>
            <div class="keuangan-item pengeluaran">
                <h3>Total Pengeluaran</h3>
                <div class="nilai">Rp {{ number_format($laporanKeuangan['total_pengeluaran'], 0, ',', '.') }}</div>
            </div>
            <div class="keuangan-item {{ $laporanKeuangan['laba_rugi'] >= 0 ? 'laba' : 'rugi' }}">
                <h3>{{ $laporanKeuangan['laba_rugi'] >= 0 ? 'Laba' : 'Rugi' }}</h3>
                <div class="nilai">Rp {{ number_format(abs($laporanKeuangan['laba_rugi']), 0, ',', '.') }}</div>
            </div>
        </div>
    </div>

    <!-- Laporan Pencatatan & Panen -->
    <div class="summary-grid">
        <!-- Laporan Pencatatan -->
        <div class="summary-box">
            <h3 style="margin-bottom: 15px; color: #17a2b8;">📋 Laporan Pencatatan</h3>
            <table>
                <tr>
                    <td><strong>Total Pencatatan</strong></td>
                    <td style="text-align: right;">{{ $laporanPencatatan['total_pencatatan'] }} kali</td>
                </tr>
                <tr>
                    <td><strong>Total Biaya</strong></td>
                    <td style="text-align: right; color: #dc3545; font-weight: bold;">
                        Rp {{ number_format($laporanPencatatan['total_biaya'], 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td><strong>Total Pakan</strong></td>
                    <td style="text-align: right;">{{ number_format($laporanPencatatan['total_pakan'], 2) }} Kg</td>
                </tr>
            </table>

            @if($laporanPencatatan['by_jenis_kegiatan']->count() > 0)
            <p style="font-weight: bold; margin: 15px 0 10px;">Berdasarkan Jenis Kegiatan:</p>
            <table>
                <thead>
                    <tr>
                        <th>Jenis Kegiatan</th>
                        <th style="text-align: right;">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporanPencatatan['by_jenis_kegiatan'] as $kegiatan)
                    <tr>
                        <td>{{ $kegiatan->jenis_kegiatan }}</td>
                        <td style="text-align: right;"><strong>{{ $kegiatan->total }} kali</strong></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>

        <!-- Laporan Panen -->
        <div class="summary-box">
            <h3 style="margin-bottom: 15px; color: #28a745;">📦 Laporan Panen</h3>
            <table>
                <tr>
                    <td><strong>Total Panen</strong></td>
                    <td style="text-align: right;">{{ $laporanPanen['total_panen'] }} kali</td>
                </tr>
                <tr>
                    <td><strong>Total Berat</strong></td>
                    <td style="text-align: right;">{{ number_format($laporanPanen['total_berat'], 2) }} Kg</td>
                </tr>
                <tr>
                    <td><strong>Total Pendapatan</strong></td>
                    <td style="text-align: right; color: #28a745; font-weight: bold;">
                        Rp {{ number_format($laporanPanen['total_pendapatan'], 0, ',', '.') }}
                    </td>
                </tr>
            </table>

            @if($laporanPanen['by_jenis_ikan']->count() > 0)
            <p style="font-weight: bold; margin: 15px 0 10px;">Berdasarkan Jenis Ikan:</p>
            <table>
                <thead>
                    <tr>
                        <th>Jenis Ikan</th>
                        <th style="text-align: right;">Berat (Kg)</th>
                        <th style="text-align: right;">Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporanPanen['by_jenis_ikan'] as $ikan)
                    <tr>
                        <td>{{ $ikan->jenis_ikan }}</td>
                        <td style="text-align: right;">{{ number_format($ikan->total_berat, 2) }}</td>
                        <td style="text-align: right;">Rp {{ number_format($ikan->total_pendapatan, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

    <!-- Laporan Promosi -->
    <div class="section">
        <div class="section-title">LAPORAN PROMOSI</div>
        <table>
            <tr>
                <td><strong>Total Promosi Dibuat</strong></td>
                <td style="text-align: right;">{{ $laporanPromosi['total_promosi'] }}</td>
            </tr>
            <tr>
                <td><strong>Promosi Aktif</strong></td>
                <td style="text-align: right;">{{ $laporanPromosi['promosi_aktif'] }}</td>
            </tr>
            <tr>
                <td><strong>Total Dilihat</strong></td>
                <td style="text-align: right;">{{ number_format($laporanPromosi['total_views']) }} kali</td>
            </tr>
        </table>
    </div>

    <!-- Kesimpulan -->
    <div class="section">
        <div class="section-title">KESIMPULAN</div>
        <div style="padding: 15px; background: #f8f9fa; border-radius: 5px;">
            <p style="margin-bottom: 10px;">
                <strong>Performa Keuangan:</strong> 
                @if($laporanKeuangan['laba_rugi'] >= 0)
                <span style="color: #28a745;">✓ Menguntungkan</span> dengan laba sebesar <strong>Rp {{ number_format($laporanKeuangan['laba_rugi'], 0, ',', '.') }}</strong>
                @else
                <span style="color: #dc3545;">⚠ Rugi</span> sebesar <strong>Rp {{ number_format(abs($laporanKeuangan['laba_rugi']), 0, ',', '.') }}</strong>
                @endif
            </p>
            <p style="margin-bottom: 10px;">
                <strong>Produktivitas:</strong> {{ $laporanPanen['total_panen'] }} kali panen dengan total {{ number_format($laporanPanen['total_berat'], 2) }} Kg
            </p>
            <p>
                <strong>Aktivitas:</strong> {{ $laporanPencatatan['total_pencatatan'] }} pencatatan dan {{ $laporanPromosi['total_promosi'] }} promosi dibuat
            </p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Laporan ini dibuat secara otomatis oleh sistem FISHNOTE</p>
        <p>Dicetak pada: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</p>
    </div>
</body>
</html>