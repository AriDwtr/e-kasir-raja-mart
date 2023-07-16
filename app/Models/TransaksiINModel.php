<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiINModel extends Model
{
    use HasFactory;

    protected $table = 't_transaksi_in';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kd_brg',
        'nm_brg',
        'ktg_brg',
        'stok_in',
        'hrg_brg_beli',
        'hrg_brg_jual',
        'expired_brg',
        'action',
        'id_user',
    ];
}
