@extends('layout.master')

@section('title', 'Detail Mahasiswa')

@section('content')
    <h1 class="mb-6 text-2xl font-semibold">Detail Mahasiswa: {{ $student->nama }}</h1>

    <div class="p-8 bg-white border-2 border-indigo-700 rounded-lg shadow-md">
        <h2 class="mb-6 text-xl font-semibold text-indigo-700">Data Diri</h2>
        <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-2">
            <div class="p-4 rounded-lg bg-indigo-50">
                <p class="font-semibold text-indigo-700">Nama</p>
                <p>{{ $student->name }}</p>
            </div>
            <div class="p-4 rounded-lg bg-indigo-50">
                <p class="font-semibold text-indigo-700">NIM</p>
                <p>{{ $student->nim }}</p>
            </div>
            <div class="p-4 rounded-lg bg-indigo-50">
                <p class="font-semibold text-indigo-700">Email</p>
                <p>{{ $student->email }}</p>
            </div>
            <div class="p-4 rounded-lg bg-indigo-50">
                <p class="font-semibold text-indigo-700">Alamat</p>
                <p>{{ $student->alamat }}</p>
            </div>
            <div class="p-4 rounded-lg bg-indigo-50">
                <p class="font-semibold text-indigo-700">Telepon</p>
                <p>{{ $student->telepon }}</p>
            </div>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('mahasiswa.index') }}" class="px-4 py-2 text-white transition duration-200 bg-indigo-600 rounded hover:bg-indigo-700">Kembali ke Indeks</a>
        </div>
    </div>
@endsection
