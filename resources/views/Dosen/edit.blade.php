@extends('layout.master')

@section('title', 'Edit Dosen')

@section('content')
<div class="container px-4 py-8 mx-auto">
    <h1 class="mb-6 text-2xl font-semibold text-gray-900">Edit Dosen</h1>

    <form action="{{ route('kaprodi.dosen.update', $dosen->id) }}" method="POST" class="max-w-lg mx-auto">
        @csrf

        <div class="mb-4">
            <input type="hidden" name="user_id" id="user_id" value="{{ $dosen->user_id }}" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
        </div>
        
        <div class="mb-4">
            <label for="name" class="block mb-2 text-sm font-bold text-gray-700">Nama:</label>
            <input type="text" name="name" id="name" value="{{ $dosen->name }}" required class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="kode_dosen" class="block mb-2 text-sm font-bold text-gray-700">Kode Dosen:</label>
            <input type="text" name="kode_dosen" id="kode_dosen" value="{{ $dosen->kode_dosen }}" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="nip" class="block mb-2 text-sm font-bold text-gray-700">NIP:</label>
            <input type="text" name="nip" id="nip" value="{{ $dosen->nip }}" required class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="kelas_id" class="block mb-2 text-sm font-bold text-gray-700">Kelas:</label>
            <select name="kelas_id" id="kelas_id" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                <option value="" {{ is_null($dosen->kelas_id) ? 'selected' : '' }}>Belum Ada Kelas</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" {{ $dosen->kelas_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                Update Dosen
            </button>
        </div>
    </form>
</div>
@endsection
