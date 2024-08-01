<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kaprodi;

class KaprodiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kaprodi::create([
            'user_id' => 1,
            'kode_dosen' => '101',
            'nip' => '123456789',
            'name' => 'Alamsyah',
        ]);
    }
}
