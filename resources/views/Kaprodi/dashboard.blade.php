@php
    //contoh data
    $classes = [(object)[
        'nama'=>'1-A',
        'wali'=>'Jumanto',
        'mhs'=>'10',],
        (object)[
        'nama'=>'1-B',
        'wali'=>'Kholiq',
        'mhs'=>'10',]]
@endphp

@extends('layout.master')

@section('title', 'Kaprodi Dashboard')

@section('content')
    <h1 class="text-2xl font-semibold mb-6">Welcome, Kaprodi</h1>
    <p class="mb-5"> This is your classes</p>
    <div class="flex flex-wrap items-center">
        @foreach ($classes as $class)   
        <div class="card bg-base-100 bg-slate-50 w-96 shadow-xl rounded-xl mr-4 mb-4">
            <div class="card-header rounded-t-xl bg-blue-500 px-4 py-2">
                <a href="{{ route('kaprodi.class') }}" class="card-title text-slate-50 font-mono font-semibold text-2xl hover:underline" href>{{ $class->nama }}</a>
            </div>
            <div class="card-body m-2 p-2 font-mono text-xl">
                <ul class="mb-3">
                    <li>Dosen Wali: {{ $class->wali }}</li>
                    <li>Jumlah Mahasiswa: {{ $class->mhs }}/10</li>
                </ul>
                <x-edit-del></x-edit-del>
              </div>
        </div>
        @endforeach
            <x-create></x-create>
    </div>
@endsection
