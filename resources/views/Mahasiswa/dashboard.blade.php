@extends('layout.master')
@php
    // Contoh data mahasiswa
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
        'semester' => '20 (dua puluh)',
    ];
@endphp
@section('title', 'Mahasiswa Dashboard')
@section('content')

    <h1 class="text-2xl font-semibold mb-6">Welcome, {{ $data->nama }}</h1>

    <div class="flex flex-col items-center gap-10 md:flex-row sm:mx-10">
        <img class="inline-block h-40 w-40 rounded-full ring-2 ring-white"
            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
            alt="foto">
        <div class="flex-1 bg-white p-6 rounded-lg border-2 border-indigo-700 shadow-md">
            <table class="table-auto w-full border-collapse">
                <tbody>
                    <tr class="border-b border-gray-300">
                        <td class="font-bold py-2">NIM</td>
                        <td class="pl-2">: {{ $data->nim }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <td class="font-bold py-2">Tempat, Tanggal Lahir</td>
                        <td class="pl-2">: {{ $data->tempat_lahir }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <td class="font-bold py-2">Jurusan</td>
                        <td class="pl-2">: {{ $data->jurusan }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold py-2">Tanggal Masuk</td>
                        <td class="pl-2">: {{ $data->tanggal_masuk }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold py-2">Semester</td>
                        <td class="pl-2">: {{ $data->semester }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('mhs.edit-data') }}" >
                <button
                    class="bg-red-600 mt-8 text-white px-6 py-2 rounded-md hover:bg-red-700 transition duration-200 ease-in-out">
                    Edit data
                </button>
            </a>

            <a href="{{ route('mhs.kelas') }}" class="2md:hidden">
                <button
                    class="bg-indigo-700 mt-8 text-white px-6 py-2 rounded-md hover:bg-indigo-800 transition duration-200 ease-in-out">
                    Lihat Kelas
                </button>
            </a>

        </div>
    </div>


@endsection
