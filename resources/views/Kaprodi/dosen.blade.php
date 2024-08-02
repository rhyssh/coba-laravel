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
    <h1 class="text-2xl font-semibold mb-5">Welcome, Kaprodi</h1>
    <p class="mb-5">This is your dosen list :</p>
    <div class="flex flex-wrap items-center">
        @foreach ($dosens as $dosen)   
        <div class="card bg-base-100 bg-slate-50 w-96 shadow-xl rounded-xl mr-4 mb-4">
            <div class="card-header rounded-t-xl bg-blue-500 px-4 py-2">
                <a href="{{ route('kaprodi.dosen') }}" class="card-title text-slate-50 font-mono font-semibold text-2xl hover:underline" href>{{ $dosen->nama }}</a>
            </div>
            <div class="card-body m-2 p-2 font-mono text-xl">
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