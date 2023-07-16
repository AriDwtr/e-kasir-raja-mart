<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\TransaksiINModel;
use App\Models\TransaksiOutModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index()
    {
        $month = date('m');

        // Transaksi Masuk
        $transaksiMasuk = TransaksiINModel::select(DB::raw('MONTH(t_transaksi_in.created_at) as month'), 't_transaksi_in.kd_brg', DB::raw('SUM(t_transaksi_in.stok_in) as total_stok_masuk'), 't_barang.nm_brg')
            ->join('t_barang', 't_transaksi_in.kd_brg', '=', 't_barang.kd_brg')
            ->whereMonth('t_transaksi_in.created_at', $month)
            ->groupBy('month', 't_transaksi_in.kd_brg', 't_barang.nm_brg')
            ->orderBy('month')
            ->get();

        // Transaksi Keluar
        $transaksiOut = TransaksiOutModel::select(DB::raw('MONTH(t_transaksi_out.created_at) as month'), 't_transaksi_out.kd_brg', DB::raw('SUM(t_transaksi_out.jml_brg) as total_stok_out'), 't_barang.nm_brg')
            ->join('t_barang', 't_transaksi_out.kd_brg', '=', 't_barang.kd_brg')
            ->whereMonth('t_transaksi_out.created_at', $month)
            ->groupBy('month', 't_transaksi_out.kd_brg', 't_barang.nm_brg')
            ->orderBy('month')
            ->get();

        // Mengumpulkan data yang diperlukan untuk chart
        $labelsMasuk = $transaksiMasuk->pluck('nm_brg');
        $dataMasuk = $transaksiMasuk->pluck('total_stok_masuk');

        $labelsKeluar = $transaksiOut->pluck('nm_brg');
        $dataKeluar = $transaksiOut->pluck('total_stok_out');

        // Mengirim data ke view
        View::share('chartDataMasuk', [
            'labels' => $labelsMasuk,
            'data' => $dataMasuk,
            'title' => 'Grafik Transaksi Masuk pada Bulan ' . date('F'),
        ]);

        View::share('chartDataKeluar', [
            'labels' => $labelsKeluar,
            'data' => $dataKeluar,
            'title' => 'Grafik Transaksi Keluar pada Bulan ' . date('F'),
        ]);

        return view('dashboard.dashboard', compact('transaksiMasuk', 'transaksiOut'));
    }
}
