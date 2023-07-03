<?php

namespace Database\Seeders;

use App\Models\SettingSiteModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SettingSiteModel::create([
            'nama_site'=>'Raja Mart'
        ]);
    }
}
