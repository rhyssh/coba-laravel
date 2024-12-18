@extends('layout.master')

@section('title', 'Detail Kelas')

@section('content')
    <h1 class="mb-6 text-2xl font-semibold">Detail {{ $kelas->nama }}</h1> {{-- UNTUK MENDAPATKAN NAMA KELAS --}}

<div class="flex flex-col items-center gap-10 md:flex-row sm:mx-10">
    <div class="flex-1 p-6 bg-white border-2 border-indigo-700 rounded-lg shadow-md">
        <div class="flex flex-row mb-3">
            <h2 class="mr-1 text-xl font-normal">Dosen Wali: {{ is_null($kelas->dosen?->name) ? 'Belum Ada' : $kelas->dosen->name }}</h2>
        </div>
        <h3 class="mb-5 text-lg font-medium">Jumlah Mahasiswa: {{ $mahasiswas->count() }}/{{ $capacity }}</h3>
        <table class="w-full mb-5 border-collapse table-auto">
            <thead>
                <tr class="border">
                    <th class="px-1 py-2 border text-start">No.</th>
                    <th class="px-1 py-2 border text-start">Mahasiswa</th>
                    <th class="px-1 py-2 border text-start">NIM</th>
                </tr>
            </thead>
            <tbody>
                @if($mahasiswas->isEmpty())
                    <tr class="border border-gray-300">
                        <td colspan="3" class="py-2 text-center">Tidak ada data mahasasiswa di kelas ini</td>
                    </tr>
                @else
                    @foreach ($mahasiswas as $mhs)
                        <tr class="border border-gray-300">
                            <td class="px-1 py-2 border">{{ $loop->iteration }}.</td>
                            <td class="pl-2 border">{{ $mhs->name }}</td>
                            <td class="pl-2 border">{{ $mhs->nim }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{-- <x-edit-del></x-edit-del> --}}
    </div>
<div>
@endsection
