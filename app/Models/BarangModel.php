<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;
    protected $table = 't_barang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'kd_brg',
        'nm_brg',
        'stok',
        'ktg_brg',
        'hrg_brg',
        'foto_brg'
    ];
}
