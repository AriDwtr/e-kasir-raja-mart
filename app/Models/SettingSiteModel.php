<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingSiteModel extends Model
{
    use HasFactory;

    protected $table = 't_setting_site';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_site',
    ];
}
