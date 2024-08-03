@extends('layout.master')

@section('title', 'Request Edit Data Mahasiswa')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold text-indigo-700 mb-6">Request Edit Data Mahasiswa</h2>
    <form action="{{ route('mahasiswa.submit.request.edit') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="kelas_id" class="block text-gray-700">Kelas ID</label>
            <input type="text" id="kelas_id" name="kelas_id" class="mt-1 block w-full" value="{{ old('kelas_id') }}">
            @error('kelas_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="keterangan" class="block text-gray-700">Keterangan</label>
            <textarea id="keterangan" name="keterangan" class="mt-1 block w-full">{{ old('keterangan') }}</textarea>
            @error('keterangan')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="bg-indigo-700 text-white px-4 py-2 rounded-md hover:bg-indigo-800 transition duration-200 ease-in-out">Submit</button>
    </form>
</div>
@endsection
