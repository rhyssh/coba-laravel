@extends('layout.master')

@section('title', 'Edit Kelas')

@section('content')
<div class="flex flex-col">
    <div class="py-3 pb-5 px-3 mx-1 min-[360px]:mx-3 my-4 mb-5 bg-white rounded-xl shadow-lg">
        <h3 class="text-indigo-600 mt-5 font-semibold text-xl text-center">Edit Kelas</h3>
        <form method="POST" action="{{ route('kaprodi.class.update', $kelas->id) }}" class="space-y-3">
            @csrf
            @method('PUT')

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


            <!-- Mahasiwa -->
            <div class="bg-white p-6 rounded-lg border-2 border-indigo-700 shadow-md">
              <h2 class="text-xl font-semibold mb-4 text-indigo-700">Daftar Mahasiswa</h2>
              <div class="overflow-x-auto">
                  <table class="min-w-full bg-white">
                      <thead>
                          <tr>
                              <th class="py-2 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">No</th>
                              <th class="py-2 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">Nama Mahasiswa</th>
                              <th class="py-2 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">NIM</th>
                              <th class="py-2 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">Hapus</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($kelas->mahasiswa as $index => $mahasiswa)
                          <tr>
                              <td class="py-2 px-4 border-b border-gray-200">{{ $index + 1 }}</td>
                              <td class="py-2 px-4 border-b border-gray-200">{{ $mahasiswa->name }}</td>
                              <td class="py-2 px-4 border-b border-gray-200">{{ $mahasiswa->nim }}</td>
                              <td class="py-2 px-4 border-b border-gray-200"></td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>

            <!-- Submit Button -->
            <div class="flex gap-3 mt-8">
                <a href="{{ route('kaprodi.class.index') }}" class="border border-indigo-700 text-indigo-700 font-semibold px-6 py-2 rounded-md hover:text-white hover:bg-indigo-800 transition duration-200 ease-in-out cursor-pointer">
                    Kembali
                </a>
                <button type="submit" class="bg-indigo-700 text-white px-6 py-2 rounded-md hover:bg-indigo-800 transition duration-200 ease-in-out cursor-pointer">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
