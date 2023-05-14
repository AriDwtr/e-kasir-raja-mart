<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 't_user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nm_user',
        'email_user',
        'gender',
        'tgl_lahir',
        'password',
        'ft_user',
        'fitur1',
        'fitur2',
        'role',
    ];

    protected $hidden = ['password'];
}
