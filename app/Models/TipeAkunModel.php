<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeAkunModel extends Model
{
    use HasFactory;
    protected $table = 't_tipe_akun';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tipe_akun',
        'm_super_admin',
        'm_admin',
        'm_pegawai',
    ];
}
