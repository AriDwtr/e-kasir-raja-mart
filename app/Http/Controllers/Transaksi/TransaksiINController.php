<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Repository\BarangRepository;
use App\Repository\KategoriRepository;
use App\Repository\TransaksiINRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransaksiINController extends Controller
{

    protected $request;
    protected $kateBrg;
    protected $transaksiIN;
    protected $barang;

    public function __construct(Request $request, KategoriRepository $kateBrg, TransaksiINRepository $transaksiIN, BarangRepository $barang)
    {
        $this->request = $request;
        $this->kateBrg = $kateBrg;
        $this->transaksiIN = $transaksiIN;
        $this->barang = $barang;
    }

    public function index()
    {
        $data = [];
        $data['KateBrg'] = $this->kateBrg->getKatBarang();
        return view('transaksi_in.transaksi_in', $data);
    }

    public function getTransaksiIN(){
        $data = $this->transaksiIN->listTransaksiIN();
        return response()->json($data);
    }

    public function getDataBarang()
    {
        $kd_brg = $this->request->kd_brg;
        $getBarang = $this->barang->getBarang($kd_brg);
        // dd($getBarang);
        if ($getBarang) {
            return response()->json(['success' => ['message' => 'Barang Berhasil Di Temukan', 'data' => $getBarang]], 200);
        } else {
            return response()->json(['errors' => ['message' => 'Barang Tidak Di Temukan']], 422);
        }
    }

    public function transaksiBaru()
    {
        $data = $this->request->all();
        $data['id_user'] = Auth::user()->id;
        $data['hrg_brg_beli'] = str_replace(',', '', $data['hrg_brg_beli']);
        $data['hrg_brg_jual'] = str_replace(',', '', $data['hrg_brg_jual']);

        if ($data['action'] == 'create') {
            $validator = Validator::make($data, [
                'kd_brg' => 'required|unique:t_barang,kd_brg',
                'nm_brg' => 'required',
                'stok_in' => 'required',
                'hrg_brg_beli' => 'required',
                'hrg_brg_jual' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            $this->transaksiIN->post($data);
            $this->barang->add($data);
            return response()->json(['success' => ['message' => 'Berhasil Menambahkan Barang & Transaksi Masuk Baru']], 200);
        } else {
            // dd($data);
            if ($data['stok_in'] < 1 || $data['stok_in'] == NULL) {
                return response()->json(['errors' => ['message' => 'Proses Gagal Nilai Stok Tidak Boleh 0 ( Nol )']], 422);
            } else {
                $this->transaksiIN->post($data);
                return response()->json(['success' => ['message' => 'Berhasil Menambahkan Transaksi Masuk Baru']], 200);
            }
        }
    }
}
