@extends('layout.master')

@section('title', 'Edit Dosen')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Edit Dosen</h1>

    <form action="{{ route('kaprodi.dosen.update', $dosen->id) }}" method="POST" class="max-w-lg mx-auto">
        @csrf

        <div class="mb-4">
            <input type="hidden" name="user_id" id="user_id" value="{{ $dosen->user_id }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
            <input type="text" name="name" id="name" value="{{ $dosen->name }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="kode_dosen" class="block text-gray-700 text-sm font-bold mb-2">Kode Dosen:</label>
            <input type="text" name="kode_dosen" id="kode_dosen" value="{{ $dosen->kode_dosen }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="nip" class="block text-gray-700 text-sm font-bold mb-2">NIP:</label>
            <input type="text" name="nip" id="nip" value="{{ $dosen->nip }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="kelas_id" class="block text-gray-700 text-sm font-bold mb-2">Kelas:</label>
            <select name="kelas_id" id="kelas_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" {{ $dosen->kelas_id == $k->id ? 'selected' : '' }}>
                        {{ $k->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Dosen
            </button>
        </div>
    </form>
</div>
@endsection
