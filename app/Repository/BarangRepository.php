<?php

namespace App\Repository;

use App\Models\BarangModel;

class BarangRepository {


    protected $model;

    public function __construct(BarangModel $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();

    }

}

?>
