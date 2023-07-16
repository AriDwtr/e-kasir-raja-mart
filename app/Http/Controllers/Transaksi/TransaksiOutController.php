<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Repository\TransaksiOutRepository;
use Illuminate\Http\Request;


class TransaksiOutController extends Controller
{
    protected $request;
    protected $transaksiOutRepo;

    public function __construct(Request $request, TransaksiOutRepository $transaksiOutRepo)
    {
        $this->request = $request;
        $this->transaksiOutRepo = $transaksiOutRepo;
    }

    public function index(){
        return view('transaksi_out.transaksi_out');
    }

    public function getTransaksiOUT(){
        $data = $this->transaksiOutRepo->getTransaksiOut();
        return response()->json($data);
    }

    public function pushTransaksi()
    {
        $data = $this->request->all();
        $this->transaksiOutRepo->post($data);
        // dd($data);
        return response()->json(['success', 'message'=>'Transaksi Berhasil'], 200);

    }
}
