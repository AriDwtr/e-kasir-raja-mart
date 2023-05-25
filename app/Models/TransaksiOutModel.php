<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiOutModel extends Model
{
    use HasFactory;

    protected $table = 't_transaksi_out';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kd_brg',
        'jml_brg',
        'user',
    ];
}
