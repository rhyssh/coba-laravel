@extends('layout.master')

@section('title', 'Request Edit Data Mahasiswa')

@section('content')
<div class="container p-6 mx-auto bg-white rounded-lg shadow-md">
    <h2 class="mb-6 text-2xl font-bold text-indigo-700">Request Edit Data Mahasiswa</h2>
    <form action="{{ route('mahasiswa.submit.request.edit') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
            <input type="text" id="keterangan" name="keterangan" class="block w-full px-4 py-2 mt-1 transition duration-150 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            @error('keterangan')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="px-4 py-2 text-white transition duration-200 ease-in-out bg-indigo-700 rounded-md hover:bg-indigo-800">Submit</button>
    </form>
</div>
@endsection
