<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //Mahasiswa
        // for($i = 1; $i <= 20; $i++) {
        //     Mahasiswa::create([
        //         'user_id' => 6 + $i,
        //         'kelas_id' => ($i <= 10) ? 1 : 2,
        //         'nim' => '201900' . $i,
        //         'name' => 'Mahasiswa ' . $i,
        //         'tempat_lahir' => 'Tempat Lahir ' . $i,
        //         'tanggal_lahir' => now()->subYears(20)->format('Y-m-d'),
        //         'edit' => false,
        //     ]);
        // }

        Mahasiswa::create([
            'user_id' => 3,
            'kelas_id' => 1,
            'nim' => '201900',
            'name' => 'Mahasiswa 1',
            'tempat_lahir' => 'Tempat Lahir 1',
            'tanggal_lahir' => now()->subYears(20)->format('Y-m-d'),
            'edit' => false,
        ]);
    }
}
