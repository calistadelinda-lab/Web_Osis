<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingVotingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\SettingVoting::create([
            'is_open' => false,
            'start_date' => null,
            'end_date' => null,
            'message' => 'Voting belum dibuka. Silakan tunggu pengumuman dari OSIS.',
        ]);
    }
}
