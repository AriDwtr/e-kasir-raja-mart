<?php

namespace App\Repository;

use App\Models\BarangModel;
use Illuminate\Support\Str;

class BarangRepository {


    protected $barang;

    public function __construct(BarangModel $barang)
    {
        $this->barang = $barang;
    }

    public function all()
    {
        return $this->barang->all();

    }

    public function getBarang($kd_brg)
    {
        return $this->barang::where('kd_brg', $kd_brg)->first();
    }

    public function add(array $post)
    {
        unset($post['action']);
        $post['stok'] = $post['stok_in'];
        $post['id'] = Str::uuid();
        return $this->barang::create($post);
    }

    public function update(array $post)
    {
        $post['hrg_brg_beli'] = str_replace(',', '', $post['hrg_brg_beli']);
        $post['hrg_brg_jual'] = str_replace(',', '', $post['hrg_brg_jual']);
        return $this->barang::where('kd_brg', $post['kd_brg'])->update(['nm_brg'=>$post['nm_brg'],'ktg_brg'=>$post['ktg_brg'],'hrg_brg_beli'=>$post['hrg_brg_beli'], 'hrg_brg_jual'=>$post['hrg_brg_jual'], 'expired_brg'=>$post['expired_brg']]);
    }

    public function delete($kd_brg)
    {
        return $this->barang::where('kd_brg', $kd_brg)->delete();
    }

}
