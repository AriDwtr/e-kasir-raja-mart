<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use App\Repository\BarangRepository;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function getBarangKasir($kode_barang)
    {
        $barang = $this->barangRepo->getBarang($kode_barang);

        return [
          'nama_barang' => $barang->nm_brg,
          'harga_barang' => $barang->hrg_brg,
        ];
    }

    public function formBarang($type, $id=null)
    {
        if ($type == 'add') {
            $data = [];
            $data['header'] = 'FORM BARANG MASUK';
            $data['type'] = 'add';
            $data['id'] = null;
            $data['detail']['ktg_brg'] = null;
            return view('barang.frmbarang', compact('data'));
        }
        $data = [];
        $data['header'] = 'FORM VIEW BARANG';
        $data['type'] = 'view';
        $data['id'] = $id;
        $data['detail'] = $this->barangRepo->getBarang($data['id']);
        // dd($data);
        return view('barang.frmbarang', compact('data'));
    }

    public function postBarang()
    {
        $type = $this->request->type;
        $validator = Validator::make($this->request->all(), [
            'kd_brg' => 'required',
            'nm_brg' => 'required',
            'stok' => 'required',
            'hrg_brg' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        if ($type === 'add') {
            $cekDataBarang = $this->barangRepo->getBarang( $this->request->kd_brg);
            if ($cekDataBarang) {
                return response()->json(['errors' => ['message' => 'Kode Barang Telah Di Gunakan'], 'status' => 'validasi'], 422);
            }
            $this->barangRepo->add($this->request->all());
            return response()->json(['success' => ['message' => 'Barang Berhasil Di Simpan'], 'status' => 'add'], 200);
        }else if ($type === 'view'){
            $this->barangRepo->update($this->request->all());
            return response()->json(['success' => ['message' => 'Barang Berhasil Di Simpan'], 'status' => 'update'], 200);
        }
    }

    public function deleteBarang($kd_brg)
    {
        $this->barangRepo->delete($kd_brg);
        return response()->json(['message' => 'Berhasil Menghapus Barang']);
    }
}
