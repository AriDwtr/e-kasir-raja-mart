<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

        if ($type == 'profile') {
            $validatorRules = [
                'nm_user' => 'required',
                'email_user' => 'required'
            ];
        } else {
            $validatorRules = [
                'password' => 'required|min:6',
                'passwordretype' => 'required|same:password'
            ];
        }

        $validator = Validator::make($data, $validatorRules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($type == 'profile') {
            if ($this->request->hasFile('ft_user')) {
                $file = $this->request->file('ft_user');
                $fileName = $data['nm_user'] . '.' . $file->getClientOriginalExtension();
                if (Storage::exists('public/img/foto' . $fileName)) {
                    Storage::delete('public/img/foto/' . $fileName);
                }
                $file->storeAs('public/img/foto/', $fileName);
                $data['ft_user'] = $fileName;
                $this->userRepo->Update($data, $id);
                return response()->json(['success' => ['message' => 'Profile Berhasil Di Perbaharui']], 200);
            }
            $this->userRepo->update($data, $id);
            return response()->json(['success' => ['message' => 'Profile Berhasil Di Perbaharui']], 200);
        } else {
            $data['password'] = Hash::make($data['password']);
            unset($data['passwordretype']);
            $this->userRepo->update($data, $id);
            return response()->json(['success' => ['message' => 'Berhasil Perbaharui Password']], 200);
        }
    }
}
