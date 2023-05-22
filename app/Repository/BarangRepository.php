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
        $post['hrg_brg'] = str_replace(',', '', $post['hrg_brg']);
        $post['id'] = Str::uuid();
        return $this->barang::create($post);
    }

    public function update(array $post)
    {
        $post['hrg_brg'] = str_replace(',', '', $post['hrg_brg']);
        return $this->barang::where('kd_brg', $post['kd_brg'])->update(['nm_brg'=>$post['nm_brg'],'ktg_brg'=>$post['ktg_brg'],'hrg_brg'=>$post['hrg_brg']]);
    }

    public function delete($kd_brg)
    {
        return $this->barang::where('kd_brg', $kd_brg)->delete();
    }

}

?>
