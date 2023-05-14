<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function Transaksi()
    {
        dd($this->request);
    }
}
