@extends('layout.master')

@section('title', 'Detail Mahasiswa')

@section('content')
    @php
        // Contoh detail data mahasiswa
        $student = (object)[
            'id' => 1,
            'nama' => 'Alice',
            'nim' => '123456',
            'email' => 'alice@example.com',
            'alamat' => 'Jl. Mawar No. 123',
            'telepon' => '081234567890'
        ];
    @endphp

    <h1 class="text-2xl font-semibold mb-6">Detail Mahasiswa: {{ $student->nama }}</h1>

    <div class="bg-white p-8 rounded-lg border-2 border-indigo-700 shadow-md">
        <h2 class="text-xl font-semibold mb-6 text-indigo-700">Data Diri</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="bg-indigo-50 p-4 rounded-lg">
                <p class="font-semibold text-indigo-700">Nama</p>
                <p>{{ $student->nama }}</p>
            </div>
            <div class="bg-indigo-50 p-4 rounded-lg">
                <p class="font-semibold text-indigo-700">NIM</p>
                <p>{{ $student->nim }}</p>
            </div>
            <div class="bg-indigo-50 p-4 rounded-lg">
                <p class="font-semibold text-indigo-700">Email</p>
                <p>{{ $student->email }}</p>
            </div>
            <div class="bg-indigo-50 p-4 rounded-lg">
                <p class="font-semibold text-indigo-700">Alamat</p>
                <p>{{ $student->alamat }}</p>
            </div>
            <div class="bg-indigo-50 p-4 rounded-lg">
                <p class="font-semibold text-indigo-700">Telepon</p>
                <p>{{ $student->telepon }}</p>
            </div>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('editmhs') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition duration-200">Edit Data</a>
        </div>
    </div>
@endsection
