<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    protected $request;
    protected $userRepo;

    public function __construct(Request $request, UserRepository $userRepo)
    {
        $this->request = $request;
        $this->userRepo = $userRepo;
    }

    public function profile()
    {
        return view('profile.profile');
    }

    public function update($type)
    {
        $data = [];
        $data = $this->request->all();
        $id = Auth::user()->id;
        $validator = Validator::make($data, [
            'password'=>'required',
            'passwordretype'=>'required|same:password'
        ]);
        if ($type == 'profile') {
            if ($this->request->hasFile('ft_user')) {
                $file = $this->request->file('ft_user');
                $fileName = $data['nm_user'].'.'.$file->getClientOriginalExtension();
                if (Storage::exists('public/img/foto'. $fileName)) {
                    Storage::delete('public/img/foto/'. $fileName);
                }
                $file->storeAs('public/img/foto/', $fileName);
                $data['ft_user'] = $fileName;
                $this->userRepo->Update($data, $id);
                return response()->json(['success'=> ['message'=>'Profile Berhasil Di Perbaharui']], 200);
            }
            $this->userRepo->update($data, $id);
            return response()->json(['success'=>['message'=>'Profile Berhasil Di Perbaharui']], 200);
        }else{
            if ($validator->fails()) {
                return response()->json(['errors'=>$validator->errors()], 422);
            }
            // dd($data);
        }
    }
}
