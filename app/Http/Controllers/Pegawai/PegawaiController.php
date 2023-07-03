<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{

    protected $request;
    protected $pegawai;

    public function __construct(Request $request, UserRepository $pegawai)
    {
        $this->request = $request;
        $this->pegawai = $pegawai;
    }

    public function listPegawai()
    {
        return view('pegawai.pegawai');
    }

    public function getPegawai()
    {
        $data = $this->pegawai->getUser();
        return response()->json($data);
    }

    public function formPegawai($type, $id=''){
        $data = [];
        if ($type == 'add') {
            $data['type'] = $type;
        }elseif ($type == 'update') {
            $data['type'] = $type;
            $data['id']=$id;
        }

        return view('pegawai.frmpagawai', compact('data'));
    }

    public function setPegawai(){
        $data = $this->request->all();
        $validator = Validator::make($data, [
            'nm_user'=>'required',
            'email_user'=>'required|unique:t_user,email_user'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($data['type']=='add') {
            unset($data['type']);
            unset($data['id']);
            $data['password'] = Hash::make('123456');
            if ($this->request->hasFile('ft_user')) {
                $file = $this->request->file('ft_user');
                $fileName = $data['nm_user'].'.'.$file->getClientOriginalExtension();
                if (Storage::exists('public/img/foto'. $fileName)) {
                    Storage::delete('public/img/foto/'. $fileName);
                }
                $file->storeAs('public/img/foto/', $fileName);
                $data['ft_user'] = $fileName;
                $this->pegawai->Post($data);
                return response()->json(['success'=> ['message'=>'Menambahkan Pengguna Baru']], 200);
            }

            $this->pegawai->Post($data);
            return response()->json(['success'=>['message'=>'Menambahkan Pengguna Baru']], 200);
        }
        // dd();
    }

    public function deletePegawai($id){
        $this->pegawai->delete($id);
        return response()->json(['message' => 'Berhasil Menghapus Pegawai']);
    }
}
