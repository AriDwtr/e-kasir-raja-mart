<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use App\Repository\BarangRepository;
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
}
