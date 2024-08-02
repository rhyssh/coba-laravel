@extends('layout.master')

@section('title', 'Detail Kelas')

@section('content')
    <h1 class="text-2xl font-semibold mb-6">Detail Kelas: {{ $kelas->nama }}</h1> {{-- UNTUK MENDAPATKAN NAMA KELAS --}}

    @if($dosens->isNotEmpty())
        <h1 class="text-2xl font-semibold mb-6">Dosen Wali Kelas: {{ $dosens->first()->name }}</h1> {{-- DOSEN WALI --}}
    @else
        <h1 class="text-2xl font-semibold mb-6 text-red-700">Dosen Wali Kelas: Tidak Ada Dosen Wali Untuk Kelas Ini!</h1>
    @endif

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

                {{-- TABEL DAFTAR MAHASISWA --}}

                <tbody>
                    @forelse ($mahasiswas as $index => $mahasiswa)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $index + 1 }}</td> {{-- NOMOR INDEKS --}}
                            <td class="py-2 px-4 border-b border-gray-200">{{ $mahasiswa->name }}</td> {{-- NAMA MAHASISWA --}}
                            <td class="py-2 px-4 border-b border-gray-200">{{ $mahasiswa->nim }}</td> {{-- NIM MAHASISWA --}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-2 px-4 border-b border-gray-200 text-center">Tidak ada mahasiswa terdaftar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <p class="text-lg font-semibold">Jumlah Mahasiswa: {{ $mahasiswas->count() }} / {{ $capacity }}</p> {{-- Jumlah Mahasiswa dan Kapasitas Kelas --}}
        </div>
    </div>
@endsection
