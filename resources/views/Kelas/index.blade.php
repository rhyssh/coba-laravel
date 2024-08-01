@extends('layout.master')

@section('title', 'Detail Kelas')

@php
        $class = (object)[
            'nama_kelas' => 'Pemrograman Web A',
            'mahasiswas' => [
                (object)['nama' => 'Alice', 'nim' => '123456'],
                (object)['nama' => 'Bob', 'nim' => '123457'],
                (object)['nama' => 'Charlie', 'nim' => '123458'],
            ]
        ];
@endphp

@section('content')
    <h1 class="text-2xl font-semibold mb-6">Detail Kelas: {{ $class->nama_kelas }}</h1>

    <div class="bg-white p-6 rounded-lg border-2 border-indigo-700 shadow-md">
        <h2 class="text-xl font-semibold mb-4 text-indigo-700">Daftar Mahasiswa</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">No</th>
                        <th class="py-2 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">Nama Mahasiswa</th>
                        <th class="py-2 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">NIM</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($class->mahasiswas as $index => $mahasiswa)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $mahasiswa->nama }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $mahasiswa->nim }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
