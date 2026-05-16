<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingAnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setting_anggotas')->insert([
            'kondisi_daftar' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}