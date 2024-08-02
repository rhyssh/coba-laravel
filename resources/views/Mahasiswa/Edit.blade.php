@extends('layout.master')
@php
    // Contoh data kelas yang diampu oleh dosen
    $data = (object) [
        'id' => 1,
        'user_id' => '1',
        'kelas_id' => '1',
        'nim' => '4611422051',
        'nama' => 'Dirandra Arya Aditya',
        'tempat_lahir' => 'Medan, 20 January 2003',
        'jurusan' => 'Teknik Informatika',
        'email' => 'dirandra.arya@example.com',
        'tanggal_masuk' => '15 September 2021',
    ];
@endphp
@section('title', 'Mahasiswa Dashboard')
@section('content')
    <h2 class="text-2xl font-semibold text-indigo-600 mb-6">Edit Data</h2>
    <div class="py-3 pb-5 px-3 mx-1 min-[360px]:mx-3 my-4 mb-5 bg-white rounded-xl shadow-lg">
        <h3 class="text-indigo-600 mt-5 font-semibold text-xl text-center">Data Diri</h3>
        <form class="space-y-3 " action="">
            <div class="flex flex-col">
                <label for="nama">Nama</label>
                <input class="border border-gray-300 h-10 rounded-md px-2" type="text" name="nama" id="nama"
                    value="{{ $data->nama }}">
            </div>
            <div class="flex flex-col">
                <label for="ttl">Tempat, Tanggal Lahir</label>
                <input class="border border-gray-300 h-10 rounded-md px-2" type="date" name="ttl" id="ttl">
            </div>
            <div class="flex flex-col">
                <label for="jurusan">Jurusan</label>
                <input class="border border-gray-300 h-10 rounded-md px-2" type="text" name="jurusan" id="jurusan"
                    value="{{ $data->jurusan }}">
            </div>
            <div class="flex gap-3">
                <a href="{{ route('mhs.dashboard') }}"
                    class="border border-indigo-700 mt-8 text-indigo-700 font-semibold  px-6 py-2 rounded-md hover:text-white hover:bg-indigo-800 transition duration-200 ease-in-out cursor-pointer">
                    Kembali
                </a>

                <button
                    class="bg-indigo-700 mt-8 text-white px-6 py-2 rounded-md hover:bg-indigo-800 transition duration-200 ease-in-out cursor-pointer">
                    Ubah Data
                </button>

            </div>
        </form>
    </div>
@endsection
