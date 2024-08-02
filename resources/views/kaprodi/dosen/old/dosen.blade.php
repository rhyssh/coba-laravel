@php
    //contoh data
    $dosens = [(object)[
        'nama'=>'Jumanto',
        'nip'=>'123',
        'kode'=>'234',
        'kelas'=>'1-A'],
        (object)[
        'nama'=>'Kholiq',
        'nip'=>'456',
        'kode'=>'567',
        'kelas'=>'1-B']]
@endphp

@extends('layout.master')

@section('title', 'Kaprodi Dashboard')

@section('content')
    <h1 class="mb-5 text-2xl font-semibold">Welcome, Kaprodi</h1>
    <p class="mb-5">This is your dosen list :</p>
    <div class="flex flex-wrap items-center">
        @foreach ($dosens as $dosen)   
        <div class="mb-4 mr-4 shadow-xl card bg-base-100 bg-slate-50 w-96 rounded-xl">
            <div class="px-4 py-2 bg-blue-500 card-header rounded-t-xl">
                <a href="{{ route('kaprodi.dosen.index') }}" class="font-mono text-2xl font-semibold card-title text-slate-50 hover:underline" href>{{ $dosen->nama }}</a>
            </div>
            <div class="p-2 m-2 font-mono text-xl card-body">
                <ul class="mb-3">
                    <li>NIP: {{ $dosen->nip }}</li>
                    <li>Kode dosen: {{ $dosen->kode }}</li>
                    <li>Kelas: {{ $dosen->kelas }}</li>
                </ul>
                <x-edit-del></x-edit-del>
            </div>
        </div>
        @endforeach
        <x-create></x-create>
    </div>
@endsection