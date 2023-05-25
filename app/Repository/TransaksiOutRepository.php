<?php

namespace App\Repository;

use App\Models\TransaksiOutModel;

class TransaksiOutRepository {

    protected $transaksi;

    public function __construct(TransaksiOutModel $transaksi)
    {
        $this->transaksi = $transaksi;
    }

    public function post(array $post)
    {
        dd($post);
    }
}

?>
