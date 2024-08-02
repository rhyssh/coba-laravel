<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Dosen::create([
                'user_id' => 1 + $i,
                'kelas_id' => $i <= 2 ? $i : null,
                'kode_dosen' => '10' . $i,
                'nip' => '12345000' . $i,
                'name' => 'Dosen Wali -' . $i,
            ]);
        }

        // Dosen::create([
        //     'user_id' => 1,
        //     'kelas_id' => 1,
        //     'kode_dosen' => '101',
        //     'nip' => '123450001',
        //     'name' => 'Dosen Wali 1',
        // ]);
    }
}
