<?php

namespace App\Repository;

use App\Models\KatBarangModel;

class KategoriRepository {


    protected $katBarang;

    public function __construct(KatBarangModel $katBarang)
    {
        $this->katBarang = $katBarang;
    }

    // kategori barang

    public function getKatBarang(){
        return $this->katBarang->all();
    }
}

?>
