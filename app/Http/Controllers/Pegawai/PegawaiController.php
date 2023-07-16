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
<<<<<<< HEAD
        }elseif ($type == 'update') {
            $data = $this->pegawai->getUser($type, $id);
=======
        }elseif ($type == 'view') {
            $data = $this->pegawai->getUser($id);
>>>>>>> cd2c9d08e97a00414f9f6b2bd9c65c86c4efefcf
            $data['type'] = $type;
            $data['id']=$id;
        }

        return view('pegawai.frmpagawai', compact('data'));
    }

    public function setPegawai(){
        $data = $this->request->all();
        unset($data['_token']);

        $validatorRules = [
            'nm_user' => 'required'
        ];

        if ($data['type']=='add') {
            $validatorRules['email_user']='required|unique:t_user,email_user';
        }elseif ($data['type']=='update') {
            $validatorRules['email_user']='required';
        }

        $validator = Validator::make($data, $validatorRules);

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
        }else{
            unset($data['type']);
            $id = $data['id'];
            if ($this->request->hasFile('ft_user')) {
                $file = $this->request->file('ft_user');
                $fileName = $data['nm_user'].'.'.$file->getClientOriginalExtension();
                if (Storage::exists('public/img/foto'. $fileName)) {
                    Storage::delete('public/img/foto/'. $fileName);
                }
                $file->storeAs('public/img/foto/', $fileName);
                $data['ft_user'] = $fileName;
                $this->pegawai->Update($data, $id);
                return response()->json(['success'=> ['message'=>'Memperbaharui Akun Pegawai']], 200);
            }

            $this->pegawai->Update($data, $id);
            return response()->json(['success'=>['message'=>'Memperbaharui Akun Pegawai']], 200);
        }
    }

    public function setPegawaiPassword($id){
        $data = $this->request->all();
        $validator = Validator::make($data, [
            'password'=>'required|min:6',
            'passwordretype'=>'required|same:password'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], 422);
        }

        $data['password'] = Hash::make($data['password']);
        unset($data['passwordretype']);
        $this->pegawai->update($data, $id);
        return response()->json(['success'=>['message'=>'Berhasil Perbaharui Password']], 200);
    }

    public function deletePegawai($id){
        $this->pegawai->delete($id);
        return response()->json(['message' => 'Berhasil Menghapus Pegawai']);
    }
}
