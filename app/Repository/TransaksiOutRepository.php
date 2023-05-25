<?php

namespace App\Repository;

use App\Models\TransaksiOutModel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TransaksiOutRepository {

    protected $transaksi;

    public function __construct(TransaksiOutModel $transaksi)
    {
        $this->transaksi = $transaksi;
    }

    public function post(array $post)
    {
        // dd($post['kd_brg']);

        $kdbrg = $post['kd_brg'];
        $jmlbrg = $post['jml_brg'];
        $user = Auth::user()->nm_user;

        $data = [];
        foreach ($kdbrg as $index => $barang) {
            $data[] = [
                'kd_brg' => $barang,
                'jml_brg' => $jmlbrg[$index],
                'user' => $user,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        return $this->transaksi::insert($data);
    }
}

?>
