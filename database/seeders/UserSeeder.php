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
            'username' => 'kaprodi',
            'email' => 'kaprodi@example.com',
            'password' => 'kaprodi123',
            'role' => 'kaprodi',
        ]);

        // Dosen Wali
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'username' => 'dosenwali0' . $i,
                'email' => 'dosenwali0' . $i . '@example.com',
                'password' => 'dosenwali'.$i,
                'role' => 'dosen wali',
            ]);
        }

        // Mahasiswa
        for ($i = 1; $i <= 20; $i++) {
            User::create([
                'username' => 'mahasiswa00' . $i,
                'email' => 'mahasiswa00' . $i . '@example.com',
                'password' => 'mahasiswa'.$i,
                'role' => 'mahasiswa',
            ]);
        }
    }
}
