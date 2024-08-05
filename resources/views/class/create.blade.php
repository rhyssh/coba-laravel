@extends('layout.master')

@section('title', 'Tambah Kelas')

@section('content')
<div class="flex flex-col">
  <div class="py-3 pb-5 px-3 mx-1 min-[360px]:mx-3 my-4 mb-5 bg-white rounded-xl shadow-lg">
    <h3 class="mt-5 text-xl font-semibold text-center text-indigo-600">Tambah Kelas</h3>
      <form method="POST" action="{{ route('kaprodi.class.store') }}" class="space-y-3">
        @csrf
        <div class="flex flex-col">
            <label for="nama">Nama Kelas</label>
            <input class="h-10 px-2 border border-gray-300 rounded-md" type="text" name="nama" id="nama"
                value="">
        </div>
        <div class="flex flex-row items-center mb-4">
          <h2 class="mr-1 text-xl font-normal">Dosen Wali: </h2>
          <div class="relative inline-block text-left" x-data="{ isOpen: false }">
            <div>
              <button type="button" @click="isOpen = !isOpen" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-lg font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
                ...
                <svg class="w-5 h-5 -mr-1 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
          <div 
            x-show="isOpen"
            x-transition:enter="transition ease-out duration-100 transform"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75 transform"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute left-0 z-10 w-56 mt-2 origin-top-left bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
            <div class="py-1" role="none">
              <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-0">Jumanto</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-1">Kholiq</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-2">Flo</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-2">Yahya</a>
              </div>
            </div>
          </div>
        </div>
        <h3 class="text-lg font-medium">Jumlah Mahasiswa: {{ $jmlh_mhs }}/10</h3>
        <table class="w-full mb-5 border-collapse table-auto">
            <thead>
                <tr class="border">
                    <th class="px-1 py-2 border text-start">No.</th>
                    <th class="px-1 py-2 border text-start">Mahasiswa</th>
                    <th class="px-1 py-2 border text-start">NIM</th>
                    <th class="px-1 py-2 border">Opsi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($mhss as $mhs)
            <tr class="border border-gray-300">
                <td class="px-1 py-2 border">{{ $i }}.</td>
                <td class="pl-2 border">{{ $mhs->nama }}</td>
                <td class="pl-2 border">{{ $mhs->nim }}</td>
                <td class="text-center">
                  <div class="flex items-center justify-center">
                    <x-min></x-min>
                  </div>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
            </tbody>
        </table>
        <div class="flex gap-3">
          <a href="{{ route('kaprodi.class.index') }}"
              class="px-6 py-2 mt-8 font-semibold text-indigo-700 transition duration-200 ease-in-out border border-indigo-700 rounded-md cursor-pointer hover:text-white hover:bg-indigo-800">
              Kembali
          </a>
  
          <button
              class="px-6 py-2 mt-8 text-white transition duration-200 ease-in-out bg-indigo-700 rounded-md cursor-pointer hover:bg-indigo-800">
              Simpan Data
          </button>
  
        </div>
        </div>
      </form>    
  </div>
  
  <div class="py-3 pb-5 px-3 mx-1 min-[360px]:mx-3 my-4 mb-5 bg-white rounded-xl shadow-lg">
    <h3 class="mt-5 text-xl font-semibold text-center text-indigo-600">List Mahasiswa</h3>
    <form class="space-y-3 " action="">
      <table class="w-full mb-5 border-collapse table-auto">
          <thead>
              <tr class="border">
                  <th class="px-1 py-2 border text-start">No.</th>
                  <th class="px-1 py-2 border text-start">Mahasiswa</th>
                  <th class="px-1 py-2 border text-start">NIM</th>
                  <th class="px-1 py-2 border">Opsi</th>
              </tr>
          </thead>
          <tbody>
          @foreach ($mhss as $mhs)
          <tr class="border border-gray-300">
              <td class="px-1 py-2 border">{{ $j }}.</td>
              <td class="pl-2 border">{{ $mhs->nama }}</td>
              <td class="pl-2 border">{{ $mhs->nim }}</td>
              <td class="text-center">
                <div class="flex items-center justify-center">
                  <x-add></x-add>
                </div>
              </td>
          </tr>
          <?php $j++ ?>
          @endforeach
          </tbody>
      </table>
      </div>
    </form>
  </div>

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

            <!-- Submit Button -->
            <div class="flex gap-3 mt-8">
                <a href="{{ route('kaprodi.class.index') }}" class="px-6 py-2 font-semibold text-indigo-700 transition duration-200 ease-in-out border border-indigo-700 rounded-md cursor-pointer hover:text-white hover:bg-indigo-800">
                    Kembali
                </a>
                <button type="submit" class="px-6 py-2 text-white transition duration-200 ease-in-out bg-indigo-700 rounded-md cursor-pointer hover:bg-indigo-800">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
