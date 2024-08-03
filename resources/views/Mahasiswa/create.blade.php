@extends('layout.master')

@section('title', 'Tambah Data Mahasiswa')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
        <h2 class="mb-8 text-3xl font-bold text-center text-indigo-700">Tambah Data Mahasiswa</h2>

        <!-- Tampilkan pesan sukses jika ada -->
        @if (session('success'))
            <div class="p-4 mb-6 text-green-700 bg-green-100 border border-green-400 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tampilkan pesan kesalahan jika ada -->
        @if ($errors->any())
            <div class="p-4 mb-4 text-red-700 bg-red-100 border border-red-400 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form tambah data mahasiswa -->
        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf
            <div class="space-y-6">
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700">User ID</label>
                    <input type="number" id="user_id" name="user_id" class="block w-full px-4 py-2 mt-1 transition duration-150 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="kelas_id" class="block text-sm font-medium text-gray-700">Kelas ID</label>
                    <input type="number" id="kelas_id" name="kelas_id" class="block w-full px-4 py-2 mt-1 transition duration-150 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                    <input type="text" id="nim" name="nim" class="block w-full px-4 py-2 mt-1 transition duration-150 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Mahasiswa</label>
                    <input type="text" id="name" name="name" class="block w-full px-4 py-2 mt-1 transition duration-150 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="block w-full px-4 py-2 mt-1 transition duration-150 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="block w-full px-4 py-2 mt-1 transition duration-150 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
            </div>
            <div class="mt-8">
                <button type="submit" class="w-full py-2 font-semibold text-white transition duration-200 ease-in-out bg-indigo-700 rounded-lg hover:bg-indigo-800">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
