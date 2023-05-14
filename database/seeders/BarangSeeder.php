<?php

namespace Database\Seeders;

use App\Models\BarangModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BarangModel::create([
            'id'=>Str::uuid(),
            'kd_brg'=>'123456',
            'nm_brg'=>'mie kuah',
            'stok'=>'1',
            'hrg_brg'=>'3000',
        ]);
    }
}
