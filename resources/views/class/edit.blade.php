@extends('layout.master')

@section('title', 'Edit Kelas')

@section('content')
<div class="flex flex-col">
    <div class="py-3 pb-5 px-3 mx-1 min-[360px]:mx-3 my-4 mb-5 bg-white rounded-xl shadow-lg">
        <h3 class="mt-5 text-xl font-semibold text-center text-indigo-600">Edit Kelas</h3>
        <form method="POST" action="{{ route('kaprodi.kelas.update', $kelas->id) }}" class="space-y-3">
            @csrf
            @method('PUT') <!-- coba ini di hide kalo errornya karena ini -->
                            <!--- aman, masalahanya di parameter route -->

            <!-- Nama Kelas -->
            <div class="mb-4">
                <label for="kelas_name" class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                <input type="text" id="kelas_name" name="nama" value="{{ old('nama', $kelas->nama) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('nama') border-red-500 @enderror">
                @error('nama')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kapasitas -->
            <div class="mb-4">
                <label for="kelas_capacity" class="block text-sm font-medium text-gray-700">Kapasitas Kelas</label>
                <input type="number" id="kelas_capacity" name="jumlah" value="{{ old('jumlah', $kelas->jumlah) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('jumlah') border-red-500 @enderror">
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
                        <option value="{{ $dosen->id }}" {{ $kelas->dosen && $kelas->dosen->id == $dosen->id ? 'selected' : '' }}>
                            {{ $dosen->name }}
                        </option>
                    @endforeach
                </select>
                @error('dosen_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Daftar Mahasiswa -->
            <div class="p-6 bg-white border-2 border-indigo-700 rounded-lg shadow-md">
                <h2 class="mb-4 text-xl font-semibold text-indigo-700">Daftar Mahasiswa</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-sm leading-4 tracking-wider text-left text-indigo-700 bg-indigo-100 border-b border-gray-200">No</th>
                                <th class="px-4 py-2 text-sm leading-4 tracking-wider text-left text-indigo-700 bg-indigo-100 border-b border-gray-200">Nama Mahasiswa</th>
                                <th class="px-4 py-2 text-sm leading-4 tracking-wider text-left text-indigo-700 bg-indigo-100 border-b border-gray-200">NIM</th>
                                <th class="px-4 py-2 text-sm leading-4 tracking-wider text-left text-indigo-700 bg-indigo-100 border-b border-gray-200">Tambah/Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswas as $mahasiswa)
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-200">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 border-b border-gray-200">{{ $mahasiswa->name }}</td>
                                <td class="px-4 py-2 border-b border-gray-200">{{ $mahasiswa->nim }}</td>
                                <td class="px-4 py-2 border-b border-gray-200">
                                    <input type="checkbox" name="mahasiswas[]" value="{{ $mahasiswa->id }}" class="mahasiswa-checkbox" {{ $kelas->mahasiswa->contains($mahasiswa->id) ? 'checked' : '' }}>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <p id="selected-count" class="mt-2 text-sm font-medium text-gray-700">0/{{ old('jumlah', $kelas->jumlah) }}</p>
            </div>

            <!-- Submit Button -->
            <div class="flex gap-3 mt-8">
                <a href="{{ route('kaprodi.kelas.index') }}" class="px-6 py-2 font-semibold text-indigo-700 transition duration-200 ease-in-out border border-indigo-700 rounded-md cursor-pointer hover:text-white hover:bg-indigo-800">
                    Kembali
                </a>
                <button type="submit" class="px-6 py-2 text-white transition duration-200 ease-in-out bg-indigo-700 rounded-md cursor-pointer hover:bg-indigo-800">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.mahasiswa-checkbox');
    const selectedCount = document.getElementById('selected-count');
    const capacity = {{ $kelas->jumlah }};

    function updateSelectedCount() {
        const checkedCount = Array.from(checkboxes).filter(cb => cb.checked).length;
        selectedCount.textContent = `${checkedCount}/${capacity}`;
    }
    

    checkboxes.forEach(cb => cb.addEventListener('change', updateSelectedCount));

    // Initialize the count
    updateSelectedCount();
});
</script>
@endsection
