<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\TransaksiOutModel;
use App\Repository\TransaksiOutRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        // $kdbrg = $this->request->input('kd_brg');
        // $jmlbrg = $this->request->input('jml_brg');
        // $user = Auth::user()->nm_user;

        // $data = [];
        // foreach ($kdbrg as $index => $barang) {
        //     $data[] = [
        //         'kd_brg' => $barang,
        //         'jml_brg' => $jmlbrg[$index],
        //         'user' => $user,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ];
        // }

        // TransaksiOutModel::insert($data);

        // return response()->json(['success', 'message'=>'Transaksi Berhasil'], 200);

    }
}
