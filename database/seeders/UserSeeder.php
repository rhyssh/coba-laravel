<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kaprodi
        User::create([
            'username' => 'alamsyah',
            'email' => 'kaprodi@example.com',
            'password' => Hash::make('kaprodi123'),
            'role' => 'kaprodi',
        ]);

        // // Dosen Wali
        // for ($i = 1; $i <= 5; $i++) {
        //     User::create([
        //         'username' => 'dosenwali0' . $i,
        //         'email' => 'dosenwali0' . $i . '@example.com',
        //         'password' => Hash::make('dosenwali').$i,
        //         'role' => 'dosen wali',
        //     ]);
        // }

        // // Mahasiswa
        // for ($i = 1; $i <= 20; $i++) {
        //     User::create([
        //         'username' => 'mahasiswa00' . $i,
        //         'email' => 'mahasiswa00' . $i . '@example.com',
        //         'password' => Hash::make('mahasiswa').$i,
        //         'role' => 'mahasiswa',
        //     ]);
        // }

        // Dosen Wali
        User::create([
            'username' => 'faris',
            'email' => 'doswal@example.com',
            'password' => Hash::make('doswal123'),
            'role' => 'dosen wali',
        ]);

        // Mahasiswa
        User::create([
            'username' => 'wowi',
            'email' => 'mahasiswa@example.com',
            'password' => Hash::make('mahasiswa123'),
            'role' => 'mahasiswa',
        ]);
    }
}
