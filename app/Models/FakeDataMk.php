<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakeDataMk extends Model
{
    // Menyimpan data mata kuliah sebagai properti statis
    // Konstruktor statis untuk menginisialisasi data
    private static $data_mk = [];
    private static function init()
    {
        self::$data_mk = [
            (object) [
                'id' => 1,
                'mk_id' => '1',
                'dosen_id' => '1',
                'nama_mk' => 'Pemrogramman Web',
                'nama_dosen' => 'Dirandra Arya Aditya',
                'jml_mhs' => '20',
                'sks' => 5,
                'mahasiswa' => [
                    (object) ['nama' => 'Andi', 'nim' => '1234567890'],
                    (object) ['nama' => 'Budi', 'nim' => '9876543210'],
                    (object) ['nama' => 'Caca', 'nim' => '1112131415'],
                    (object) ['nama' => 'Dodi', 'nim' => '2223242526'],
                    (object) ['nama' => 'Efe', 'nim' => '3334353637'],
                    (object) ['nama' => 'Fani', 'nim' => '4445464748'],
                ]
            ],
            (object) [
                'id' => 2,
                'mk_id' => '2',
                'dosen_id' => '2',
                'nama_mk' => 'Logika Pemrogram',
                'nama_dosen' => 'Laras Setya Wati ',
                'jml_mhs' => '25',
                'sks' => 6,
                'mahasiswa' => [
                    (object) ['nama' => 'Andi', 'nim' => '1234567890'],
                    (object) ['nama' => 'Budi', 'nim' => '9876543210'],
                    (object) ['nama' => 'Caca', 'nim' => '1112131415'],
                    (object) ['nama' => 'Dodi', 'nim' => '2223242526'],
                    (object) ['nama' => 'Efe', 'nim' => '3334353637'],
                    (object) ['nama' => 'Fani', 'nim' => '4445464748'],
                ]
            ],
        ];
    }

    public static function getById($id)
    {
        if (empty(self::$data_mk)) {
            self::init();
        }

        foreach (self::$data_mk as $mk) {
            if ($mk->id == $id) {
                return $mk;
            }
        }
        return null; // Jika ID tidak ditemukan
    }
}
