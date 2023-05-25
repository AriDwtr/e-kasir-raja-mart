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

    public function pushTransaksi()
    {
        $this->transaksiOutRepo->post($this->request->all());

        return response()->json(['success', 'message'=>'Transaksi Berhasil'], 200);

    }
}
