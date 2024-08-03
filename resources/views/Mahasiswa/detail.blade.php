@extends('layout.master')

@section('title', 'Detail Mahasiswa')

@section('content')
    <div class="p-8 bg-white border-2 border-indigo-700 rounded-lg shadow-md">
        <h2 class="mb-6 text-xl font-semibold text-indigo-700">Data Diri</h2>
        <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-2">
            <div class="p-4 rounded-lg bg-indigo-50">
                <p class="font-semibold text-indigo-700">Nama</p>
                <p>{{ $student->mahasiswa->name }}</p>
            </div>
            <div class="p-4 rounded-lg bg-indigo-50">
                <p class="font-semibold text-indigo-700">Kelas</p>
                <p>{{ $student->mahasiswa->kelas->nama }}</p>
            </div>
            <div class="p-4 rounded-lg bg-indigo-50">
                <p class="font-semibold text-indigo-700">NIM</p>
                <p>{{ $student->mahasiswa->nim }}</p>
            </div>
            <div class="p-4 rounded-lg bg-indigo-50">
                <p class="font-semibold text-indigo-700">Email</p>
                <p>{{ $student->email }}</p>
            </div>
            <div class="p-4 rounded-lg bg-indigo-50">
                <p class="font-semibold text-indigo-700">Tempat Lahir</p>
                <p>{{ $student->mahasiswa->tempat_lahir }}</p>
            </div>
            <div class="p-4 rounded-lg bg-indigo-50">
                <p class="font-semibold text-indigo-700">Tanggal Lahir</p>
                <p>{{ $student->mahasiswa->tanggal_lahir }}</p>
            </div>
        </div>
    </div>
@endsection
