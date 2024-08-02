@php
    //contoh data
    $mhss = [(object)[
        'nama'=>'Asep Kopling',
        'nim'=>'0001',],
        (object)[
        'nama'=>'Ujang Knalpot',
        'nim'=>'0010',],
        (object)[
        'nama'=>'Riski Tromol',
        'nim'=>'0011',],
        (object)[
        'nama'=>'Dimas Kastrol',
        'nim'=>'0100',],
        (object)[
        'nama'=>'Putra Minang',
        'nim'=>'0101',],
        (object)[
        'nama'=>'Supri Spakbor',
        'nim'=>'0110',],];
    $i=1;
    $jmlh_mhs=6;
@endphp

@extends('layout.master')

@section('title', 'Kaprodi Dashboard')

@section('content')


<div class="flex flex-col items-center gap-10 md:flex-row sm:mx-10">
    <div class="flex-1 p-6 bg-white border-2 border-indigo-700 rounded-lg shadow-md">
        <h3 class="mt-1 text-xl font-semibold text-center text-indigo-600">Data Kelas</h3>
        <h1 class="mb-3 text-3xl font-bold">Kelas 1-A</h1>
        <div class="flex flex-row mb-3">
            <h2 class="mr-1 text-xl font-normal">Dosen Wali: </h2>
            <a href="{{ route('kaprodi.dosen.index') }}" class="text-xl font-medium hover:underline">Jumanto</a>
        </div>
        <h3 class="text-lg font-medium">Jumlah Mahasiswa: {{ $jmlh_mhs }}/10</h3>
        <table class="w-full mb-5 border-collapse table-auto">
            <thead>
                <tr class="border">
                    <th class="px-1 py-2 border text-start">No.</th>
                    <th class="px-1 py-2 border text-start">Mahasiswa</th>
                    <th class="px-1 py-2 border text-start">NIM</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($mhss as $mhs)
            <tr class="border border-gray-300">
                <td class="px-1 py-2 border">{{ $i }}.</td>
                <td class="pl-2 border">{{ $mhs->nama }}</td>
                <td class="pl-2 border">{{ $mhs->nim }}</td>
            </tr>
            <?php $i++ ?>
            @endforeach
            </tbody>
        </table>
        <x-edit-del></x-edit-del>
    </div>
</div>
@endsection
