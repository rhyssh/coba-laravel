@extends('layout.master')

@section('title', 'Tambah Kelas')

@section('content')
<div class="flex flex-col">
    <div class="py-3 pb-5 px-3 mx-1 min-[360px]:mx-3 my-4 mb-5 bg-white rounded-xl shadow-lg">
        <h3 class="text-indigo-600 mt-5 font-semibold text-xl text-center">Tambah Kelas</h3>
        <form method="POST" action="{{ route('kaprodi.class.store') }}" class="space-y-3">
            @csrf

            <!-- Nama Kelas -->
            <div class="mb-4">
                <label for="kelas_name" class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                <input type="text" id="kelas_name" name="nama" value="{{ old('nama') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('nama') border-red-500 @enderror">
                @error('nama')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kapasitas -->
            <div class="mb-4">
                <label for="kelas_capacity" class="block text-sm font-medium text-gray-700">Kapasitas Kelas</label>
                <input type="number" id="kelas_capacity" name="jumlah" value="{{ old('jumlah') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('jumlah') border-red-500 @enderror">
                @error('jumlah')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Dosen Wali -->
            <div class="mb-4">
                <label for="dosen_id" class="block text-sm font-medium text-gray-700">Dosen Wali</label>
                <select id="dosen_id" name="dosen_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('dosen_id') border-red-500 @enderror">
                    <option value="">Pilih Dosen</option>
                    @foreach ($dosens as $dosen)
                        <option value="{{ $dosen->id }}">{{ $dosen->name }}</option>
                    @endforeach
                </select>
                @error('dosen_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Daftar Mahasiswa -->
            <div class="mb-4">
                <h4 class="text-lg font-semibold">Daftar Mahasiswa</h4>
                <div class="space-y-2">
                    @foreach ($mahasiswas as $mahasiswa)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input type="checkbox" id="mahasiswa_{{ $mahasiswa->id }}" name="mahasiswas[]" value="{{ $mahasiswa->id }}" class="mahasiswa-checkbox" data-mahasiswa-id="{{ $mahasiswa->id }}">
                                <label for="mahasiswa_{{ $mahasiswa->id }}" class="ml-2 text-sm font-medium text-gray-700">{{ $mahasiswa->name }} ({{ $mahasiswa->nim }})</label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <p id="selected-count" class="mt-2 text-sm font-medium text-gray-700">0/{{ old('jumlah', 10) }}</p>
            </div>

            <!-- Submit Button -->
            <div class="flex gap-3 mt-8">
                <a href="{{ route('kaprodi.class.index') }}" class="border border-indigo-700 text-indigo-700 font-semibold px-6 py-2 rounded-md hover:text-white hover:bg-indigo-800 transition duration-200 ease-in-out cursor-pointer">
                    Kembali
                </a>
                <button type="submit" class="bg-indigo-700 text-white px-6 py-2 rounded-md hover:bg-indigo-800 transition duration-200 ease-in-out cursor-pointer">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const checkboxes = document.querySelectorAll('.mahasiswa-checkbox');
                const selectedCountElement = document.getElementById('selected-count');
                const kapasitasInput = document.getElementById('kelas_capacity');
                let kapasitas = kapasitasInput ? parseInt(kapasitasInput.value) : 10;
        
                function updateCount() {
                    const selectedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;
                    selectedCountElement.textContent = `${selectedCount}/${kapasitas}`;
                }
        
                // Update count on checkbox change
                checkboxes.forEach(checkbox => checkbox.addEventListener('change', updateCount));
        
                // Update kapasitas on input change
                kapasitasInput.addEventListener('input', function () {
                    kapasitas = parseInt(kapasitasInput.value) || 10;
                    updateCount();
                });
        
                // Initialize count
                updateCount();
            });
        </script>

@endsection
