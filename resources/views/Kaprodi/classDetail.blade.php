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
<h1 class="text-2xl font-semibold mb-6">Welcome, Kaprodi</h1>
<p class="mb-5"> This is your classes</p>

<div class="flex flex-col items-center gap-10 md:flex-row sm:mx-10">
    <div class="flex-1 bg-white p-6 rounded-lg border-2 border-indigo-700 shadow-md">
        <h1 class="text-4xl font-bold mb-3">Kelas 1-A</h1>
        <div class="flex flex-row mb-3">
            <h2 class="text-xl font-normal mr-1">Dosen Wali: </h2>
            <a href="{{ route('kaprodi.dosen') }}" class="text-xl font-medium hover:underline">Jumanto</a>
        </div>
        <h3 class="text-lg font-medium">Jumlah Mahasiswa: {{ $jmlh_mhs }}/10</h3>
        <table class="table-auto w-full border-collapse mb-5">
            <thead>
                <tr class="border">
                    <th class="text-start border py-2 px-1">No.</th>
                    <th class="text-start border py-2 px-1">Mahasiswa</th>
                    <th class="text-start border py-2 px-1">NIM</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($mhss as $mhs)
            <tr class="border border-gray-300">
                <td class="border py-2 px-1">{{ $i }}.</td>
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
