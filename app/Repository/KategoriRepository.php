<?php

namespace App\Repository;

use App\Models\KatBarangModel;
use App\Models\SettingSiteModel;
use App\Models\TipeAkunModel;

class KategoriRepository {


    protected $katBarang;
    protected $tipeAkun;
    protected $settingSite;

    public function __construct(KatBarangModel $katBarang, TipeAkunModel $tipeAkun, SettingSiteModel $settingSite)
    {
        $this->katBarang = $katBarang;
        $this->tipeAkun = $tipeAkun;
        $this->settingSite = $settingSite;
    }

    // kategori barang

    public function getKatBarang(){
        return $this->katBarang->all();
    }

    public function setKatBarang(array $post){
        if($post['type']=="add"){
            unset($post['id']);
            unset($post['type']);
            return $this->katBarang->create($post);
        }elseif ($post['type']=="update"){
            unset($post['type']);
            return $this->katBarang->where('id', $post['id'])->update($post);
        }
    }

    public function delKatBarang($id){
        return $this->katBarang->where('id',$id)->delete();
    }

    //Tipe Akun Setting
    public function getTipeAkun(){
        return $this->tipeAkun->get();
    }

    public function postTipeAkun(array $post){
        // dd($post);
        return  $this->tipeAkun->create($post);
    }

    public function updateTipeAkun(array $post){
        // dd($post['type']);
        if ($post['type']=="update") {
            unset($post['type']);
            return $this->tipeAkun->find($post['id'])->update($post);
        }elseif ($post['type']=="delete") {
            unset($post['type']);
            return $this->tipeAkun->find($post['id'])->delete();
        }

    }

    // Setting Site

    public function getSettingSite(){
        return $this->settingSite->where('id', 1)->first();
    }

    public function postSettingSite(array $post){
        // dd($post);
        $post['id'] = 1;
        return $this->settingSite->find($post['id'])->update($post);
    }
}

?>
