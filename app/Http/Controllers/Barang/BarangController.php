<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use App\Repository\BarangRepository;
use COM;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    protected $request;
    private $barangRepo;
    public function __construct(Request $request, BarangRepository $barangRepo)
    {
        $this->request = $request;
        $this->barangRepo = $barangRepo;
    }

    public function listBarang()
    {
        return view('barang.barang');
    }

    public function getBarang()
    {
        $data = $this->barangRepo->all();

        return response()->json($data);
    }

    public function formBarang($type, $id = null)
    {
        if ($type == 'add') {
            $data = [];
            $data['header'] = 'FORM BARANG MASUK';
            $data['type'] = 'add';
            return view('barang.frmbarang', compact('data'));
        }
        $data = [];
        $data['header'] = 'FORM BARANG MASUK';
        return view('barang.frmbarang', compact('data'));
    }

    // public function postBarang()
    // {
    //     $validasi = Valida
    // }
}
