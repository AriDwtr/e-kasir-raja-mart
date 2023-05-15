<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function LoginForm()
    {
        return view('auth.login');
    }

    public function Login()
    {
        // dd($this->request);
        $credit = $this->request->only('email_user','password');
        $cek_email = UserModel::Where('email_user', $this->request->email_user)->first();
        if ($cek_email) {
            if (Auth::attempt($credit)) {
                return response()->json(['success' => true, 'message'=>'Berhasil Login']);
            } else {
                return response()->json(['success' => false, 'message'=>'Password Salah.']);
            }
        };
        return response()->json(['resemail', 'message'=>'Email Tidak Terdaftar']);
    }

    public function Logout()
    {
        Auth::logout();
        $this->request->session()->invalidate();
        $this->request->session()->regenerateToken();

        return response()->json(['message' => 'Berhasil Logout'], 200);
    }
}
