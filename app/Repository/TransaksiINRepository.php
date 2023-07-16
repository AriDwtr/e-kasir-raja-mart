<?php

namespace App\Repository;

use App\Models\BarangModel;
use App\Models\TransaksiINModel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransaksiINRepository
{

    protected $transaksi;
    protected $barang;

    public function __construct(TransaksiINModel $transaksi, BarangModel $barang)
    {
        $this->transaksi = $transaksi;
        $this->barang = $barang;
    }

    public function listTransaksiIN(){
        $data = $this->transaksi->join('t_user', 't_user.id', '=', 't_transaksi_in.id_user')
        ->select('t_transaksi_in.*', 't_user.nm_user')
        ->get();

        return $data;
    }

    public function post(array $post)
    {
        if ($post['action'] == 'create') {
            return $this->transaksi->create($post);
        } else {
            $this->transaksi->create($post);
            $kd_brg = $post['kd_brg'];
            $stok = $post['stok_in'];
            $expired = $post['expired_brg'];
            $hrg_brg_beli = $post['hrg_brg_beli'];
            $hrg_brg_jual = $post['hrg_brg_jual'];
            $data = $this->barang->where('kd_brg', $kd_brg)->update(
                [
                    'stok' => DB::raw("stok + $stok"),
                    'expired_brg' => $expired,
                    'hrg_brg_beli' => $hrg_brg_beli,
                    'hrg_brg_jual' => $hrg_brg_jual]
            );
            return $data;
        }
    }
}
