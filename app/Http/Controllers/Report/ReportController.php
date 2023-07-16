<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\SettingSiteModel;
use App\Models\TransaksiINModel;
use App\Models\TransaksiOutModel;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class ReportController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        return view('laporan.laporanTransaksi');
    }

    public function print()
    {
        $jenisTransaksi = $this->request->query('jenis_transaksi');
        $tanggalMin = $this->request->query('tanggal_min');
        $tanggalMax = $this->request->query('tanggal_max');
        $header = SettingSiteModel::where('id', 1)->first();
        $dompdf = new Dompdf();
        $options = new Options();
        $options->setIsRemoteEnabled(true);
        $dompdf->setOptions($options);
        switch ($jenisTransaksi) {
            case 'transaksi-in':
                $fileName = "transaksi_in - " . date("Ymd_His") . '.pdf';
                $data = TransaksiINModel::join('t_user', 't_user.id', '=', 't_transaksi_in.id_user')->select('t_transaksi_in.*', 't_user.nm_user')->whereBetween('t_transaksi_in.created_at', [$tanggalMin, $tanggalMax])->get();
                $html = view('laporan.tmpLaporanIN', compact(['data','tanggalMin','tanggalMax', 'header']))->render();
                break;
            case 'transaksi-out':
                $fileName = "transaksi_out - " . date("Ymd_His") . '.pdf';
                $data = TransaksiOutModel::join('t_user', 't_user.id', '=', 't_transaksi_out.user')->join('t_barang', 't_barang.kd_brg', '=', 't_transaksi_out.kd_brg')->select('t_transaksi_out.*', 't_user.nm_user', 't_barang.nm_brg')->whereBetween('t_transaksi_out.created_at', [$tanggalMin, $tanggalMax])->get();
                $html = view('laporan.tmpLaporanOUT', compact(['data','tanggalMin','tanggalMax', 'header']))->render();
                break;
            default:
                # code...
                break;
        }
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream($fileName);
    }
}
