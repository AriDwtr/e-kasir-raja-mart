<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatBarangModel extends Model
{
    use HasFactory;
    protected $table = 't_kategori_barang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'jenis_kategori',
        'ket_kategori',
    ];
}
