<?php

namespace App\Http\Controllers\Kategori;

use App\Http\Controllers\Controller;
use App\Repository\KategoriRepository;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    private $katBarangRepo;
    protected $request;
    public function __construct(Request $request, KategoriRepository $katBarangRepo)
    {
        $this->request = $request;
        $this->katBarangRepo = $katBarangRepo;
    }

    public function katBarangIndex() {
        return view('kategori.produk.produk_kategori');
    }

    public function getAllKatBarang() {
        $data = $this->katBarangRepo->getKatBarang();
        return response()->json($data);
    }
}
