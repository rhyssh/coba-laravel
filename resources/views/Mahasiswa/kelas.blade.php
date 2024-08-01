@extends('layout.master')
@php
    // Contoh data kelas yang diampu oleh dosen
    $data_mk = [
        (object) [
            'id' => 1,
            'mk_id' => '1',
            'dosen_id' => '1',
            'nama_mk' => 'Pemrogramnan Web',
            'nama_dosen' => 'Dirandra Arya Aditya',
            'jml_mhs' => '20',
        ],
        (object) [
            'id' => 2,
            'mk_id' => '2',
            'dosen_id' => '2',
            'nama_mk' => 'Logika Pemrogram',
            'nama_dosen' => 'Laras Setya Wati ',
            'jml_mhs' => '25',
        ],
    ];
@endphp
@section('title', 'Mahasiswa Dashboard')
@section('content')
    <h2 class="text-2xl font-semibold text-indigo-600 mb-6">Kelasku</h2>
    <div class="py-3 pb-5 px-3 mx-1 min-[360px]:mx-3 my-4 mb-5 bg-white rounded-xl shadow-lg">
        <div class="flex flex-wrap">
            @foreach ($data_mk as $mk)
                <div class="card bg-base-100 bg-slate-50  shadow-xl rounded-xl mr-4 mb-4">
                    <div class="card-header rounded-t-xl bg-indigo-500 px-4 py-2">
                        <a href="{{ route('mhs.detailMk',$mk->mk_id) }}"
                            class="card-title text-slate-50 font-mono font-semibold text-xl hover:underline">{{ $mk->nama_mk }}
                        </a>
                    </div>
                    <div class="card-body m-2 p-2 font-mono text-lg">
                        <ul class="mb-3">
                            <li>Dosen : {{ $mk->nama_dosen }}</li>
                            <li>Jumlah Mahasiswa : {{ $mk->jml_mhs }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
