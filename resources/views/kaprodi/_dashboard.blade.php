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
    <h1 class="mb-6 text-2xl font-semibold">Welcome, Kaprodi</h1>
    {{-- <p class="mb-5"> This is your classes</p>
    <div class="flex flex-wrap items-center">
        @foreach ($classes as $class)   
        <div class="mb-4 mr-4 shadow-xl card bg-base-100 bg-slate-50 w-96 rounded-xl">
            <div class="px-4 py-2 bg-blue-500 card-header rounded-t-xl">
                <a href="{{ route('kaprodi.class.index') }}" class="font-mono text-2xl font-semibold card-title text-slate-50 hover:underline" href>{{ $class->nama }}</a>
            </div>
            <div class="p-2 m-2 font-mono text-xl card-body">
                <ul class="mb-3">
                    <li>Dosen Wali: {{ $class->wali }}</li>
                    <li>Jumlah Mahasiswa: {{ $class->mhs }}/10</li>
                </ul>
                <x-edit-del></x-edit-del>
            </div>
        </div>
        @endforeach
        <x-create></x-create>
    </div> --}}
@endsection
