@extends('layout.master')

@section('title', 'Edit Data Mahasiswa')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-md rounded-lg p-8 max-w-md w-full">
        <h2 class="text-3xl font-bold text-indigo-700 mb-8 text-center">Edit Data Mahasiswa</h2>
        <form>
            <div class="space-y-6">
                <div>
                    <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                    <input type="text" id="nim" name="nim" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" required>
                </div>
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Mahasiswa</label>
                    <input type="text" id="nama" name="nama" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" required>
                </div>
                <div>
                    <label for="tempat-lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                    <input type="text" id="tempat-lahir" name="tempat-lahir" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" required>
                </div>
                <div>
                    <label for="tanggal-lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" id="tanggal-lahir" name="tanggal-lahir" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" required>
                </div>
            </div>
            <div class="mt-8">
                <button type="submit" class="w-full bg-indigo-700 text-white font-semibold py-2 rounded-lg hover:bg-indigo-800 transition duration-200 ease-in-out">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
