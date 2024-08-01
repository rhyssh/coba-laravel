@extends('layout.master')

@section('title', 'Dosen Dashboard')

@section('content')
    <h1 class="text-2xl font-semibold mb-6">Welcome, Dosen</h1>

    @php
        // Contoh data kelas yang diampu oleh dosen
        $classes = [
            (object)[
                'id' => 1,
                'nama_kelas' => 'Pemrograman Web A',
                'jumlah_mahasiswa' => 3
],
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($classes as $class)
            <div class="bg-white p-6 rounded-lg border-2 border-indigo-700 shadow-md">
                <h2 class="text-xl font-semibold mb-2 text-indigo-700">{{ $class->nama_kelas }}</h2>
                <p class="mb-2"><strong>Jumlah Mahasiswa:</strong> {{ $class->jumlah_mahasiswa }}</p>
                <button onclick="window.location.href='{{ route('detail.class') }}'" class="bg-indigo-700 mt-8 text-white px-6 py-2 rounded-md hover:bg-indigo-800 transition duration-200 ease-in-out">
                    Lihat Detail
                </button>
            </div>
        @endforeach
    </div>
@endsection
