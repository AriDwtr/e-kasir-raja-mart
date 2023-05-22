<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
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

    public function formBarang($type, $id=null)
    {
        if ($type == 'add') {
            $data = [];
            $data['header'] = 'FORM BARANG MASUK';
            $data['type'] = 'add';
            $data['id'] = null;
            return view('barang.frmbarang', compact('data'));
        }
        $data = [];
        $data['header'] = 'FORM VIEW BARANG';
        $data['type'] = 'view';
        $data['id'] = $id;
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
            $cekDataBarang = BarangModel::where('kd_brg', $this->request->kd_brg)->first();
            if ($cekDataBarang) {
                return response()->json(['errors' => ['message' => 'Kode Barang Telah Di Gunakan'], 'status' => 'validasi'], 422);
            }
            $this->barangRepo->add($this->request->all());
            return response()->json(['success' => ['message' => 'Barang Berhasil Di Simpan']], 200);
        } elseif ($type === 'update') {
            # code...
        }
    }

    public function deleteBarang($kd_brg)
    {
        $this->barangRepo->delete($kd_brg);
        return response()->json(['message' => 'Berhasil Menghapus Barang']);
    }
}
