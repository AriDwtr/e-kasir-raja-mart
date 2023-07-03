<?php

namespace App\Http\Controllers\Kategori;

use App\Http\Controllers\Controller;
use App\Repository\KategoriRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    private $kategoriRepo;
    protected $request;
    public function __construct(Request $request, KategoriRepository $kategoriRepo)
    {
        $this->request = $request;
        $this->kategoriRepo = $kategoriRepo;
    }

    public function katBarangIndex() {
        $data = [];
        $data['act']="add";
        return view('kategori.produk.produk_kategori', compact('data'));
    }

    public function getAllKatBarang() {
        $data = $this->kategoriRepo->getKatBarang();
        return response()->json($data);
    }

    public function postKatBarang(){
        $data = $this->request->all();
        if ($data['type'] == "add") {
            $validate = Validator::make($data, [
                'jenis_kategori'=>'required|unique:t_kategori_barang,jenis_kategori'
            ]);
            if ($validate->fails()) {
            return response()->json(['errors'=> $validate->errors()], 422);
            }
            $this->kategoriRepo->setKatBarang($data);
            return response()->json(['success'=>['message'=>'Sukses Menambahkan Kategori Baru']], 200);
        }elseif ($data['type'] == "update") {
            $validate = Validator::make($data, [
                'jenis_kategori'=>'required'
            ]);
            if ($validate->fails()) {
                return response()->json(['errors'=> $validate->errors()], 422);
            }
            $this->kategoriRepo->setKatBarang($data);
            return response()->json(['success'=>['message'=>'Sukses Memperbaharui Kategori']], 200);
        }
    }

    public function delKatBarang($id){
        $this->kategoriRepo->delKatBarang($id);
        return response()->json(['message' => 'Berhasil Menghapus Kategori']);
    }

    public function settingAkun(){
        $data = $this->kategoriRepo->getTipeAkun();
        return view('kategori.akun.setting_akun', compact('data'));
    }

    public function postNewAkun(){
        // dd($this->request->all());
        $data = $this->request->all();
        $validate = Validator::make($data, [
            'tipe_akun' => 'unique:t_tipe_akun,tipe_akun|required',
        ]);

        if ($validate->fails()) {
            return response()->json(['errors'=>['message'=> $validate->errors()]], 422);
        }

        $this->kategoriRepo->postTipeAkun($data);
        return response()->json(['success'=>['message'=>'Sukses Menambahkan Tipe Akun Baru']], 200);
    }

    public function SettingNewAkun($type, $id=''){
        // dd($id);
        $data = [];
        $data['type'] = $type;
        if ($data['type'] == 'update') {
            $data['id'] = $this->request->id_akun;
            $data['m_super_admin'] = $this->request->has('m_super_admin') ? 1 : 0;
            $data['m_admin'] = $this->request->has('m_admin') ? 1 : 0;
            $data['m_pegawai'] = $this->request->has('m_pegawai') ? 1 : 0;
            $this->kategoriRepo->updateTipeAkun($data);
            return response()->json(['success'=>['message'=>'Sukses Memperbaharui Status Akun']], 200);
        }elseif ($data['type'] == 'delete') {
            $data['id'] = $id;
            $this->kategoriRepo->updateTipeAkun($data);
            return response()->json(['success'=>['message'=>'Sukses Menghapus Status Akun']], 200);
        }

    }

    public function SettingSite(){
        $data = $this->kategoriRepo->getSettingSite();
        return view('kategori.site.setting_site', compact('data'));
    }

    public function SettingSiteUpdate(){
        // dd($this->request->all());
        $this->kategoriRepo->postSettingSite($this->request->all());
        return response()->json(['success'=>['message'=>'Sukses Memperbaharui Data Sistem']], 200);
    }

}
