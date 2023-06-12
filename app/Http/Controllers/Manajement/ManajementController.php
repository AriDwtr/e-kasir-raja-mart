<?php

namespace App\Http\Controllers\Manajement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManajementController extends Controller
{
    public function index()
    {
        return view('theme.manajemen');
    }
}
