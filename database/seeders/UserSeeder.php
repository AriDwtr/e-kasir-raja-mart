<?php

namespace Database\Seeders;

use App\Models\UserModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserModel::create([
            'id'=> Str::uuid(),
            'nm_user'=>'admin',
            'email_user'=>'admin@admin',
            'gender'=>'L',
            'password'=>Hash::make('123456'),
            'role'=>1,
        ]);
    }
}
