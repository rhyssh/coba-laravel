@extends('layout.master')

@section('title', 'Mahasiswa Dashboard')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
        <h2 class="mb-8 text-3xl font-bold text-center text-indigo-700">Edit Data Mahasiswa</h2>
        <form action="{{ route('dosen.mahasiswa.update', $student->id) }}" method="POST">
            @csrf
            <div class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Mahasiswa</label>
                    <input type="text" id="name" name="name" value="{{ $student->name }}" class="block w-full px-4 py-2 mt-1 transition duration-150 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                    <input type="text" id="nim" name="nim" value="{{ $student->nim }}" class="block w-full px-4 py-2 mt-1 transition duration-150 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ $student->tempat_lahir }}" class="block w-full px-4 py-2 mt-1 transition duration-150 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ $student->tanggal_lahir }}" class="block w-full px-4 py-2 mt-1 transition duration-150 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
            </div>
            <div class="mt-8">
                <button type="submit" class="w-full py-2 font-semibold text-white transition duration-200 ease-in-out bg-indigo-700 rounded-lg hover:bg-indigo-800">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
