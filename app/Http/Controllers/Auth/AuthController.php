<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function Login()
    {
        $credit = $this->request->only('email_user','password');

        if (Auth::attempt($credit)) {

            return redirect()->route('dashboard');

        }else{
            $hasil = 'gagal';
        }
        dd($hasil);
    }
}
