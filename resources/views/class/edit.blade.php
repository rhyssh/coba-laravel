@php
    //contoh data
    $mhss = [(object)[
        'nama'=>'Asep Kopling',
        'nim'=>'0001',],
        (object)[
        'nama'=>'Ujang Knalpot',
        'nim'=>'0010',],
        (object)[
        'nama'=>'Riski Tromol',
        'nim'=>'0011',],
        (object)[
        'nama'=>'Dimas Kastrol',
        'nim'=>'0100',],
        (object)[
        'nama'=>'Putra Minang',
        'nim'=>'0101',],
        (object)[
        'nama'=>'Supri Spakbor',
        'nim'=>'0110',],];
    $i=1;
    $j=1;
    $jmlh_mhs=6;
@endphp

@extends('layout.master')

@section('title', 'Kaprodi Dashboard')

@section('content')
<div class="flex flex-col">
  <div class="py-3 pb-5 px-3 mx-1 min-[360px]:mx-3 my-4 mb-5 bg-white rounded-xl shadow-lg">
      <h3 class="text-indigo-600 mt-5 font-semibold text-xl text-center">Data Kelas</h3>
      <form class="space-y-3 " action="">
        <h1 class="text-3xl font-bold mb-3">Kelas 1-A</h1>
        <div class="flex flex-row items-center mb-4">
          <h2 class="text-xl font-normal mr-1">Dosen Wali: </h2>
          <div class="relative inline-block text-left" x-data="{ isOpen: false }">
            <div>
              <button type="button" @click="isOpen = !isOpen" class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-lg font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
                Jumanto S.kom
                <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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
            class="absolute left-0 z-10 mt-2 w-56 origin-top-left rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
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
        <table class="table-auto w-full border-collapse mb-5">
            <thead>
                <tr class="border">
                    <th class="text-start border py-2 px-1">No.</th>
                    <th class="text-start border py-2 px-1">Mahasiswa</th>
                    <th class="text-start border py-2 px-1">NIM</th>
                    <th class="border py-2 px-1">Opsi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($mhss as $mhs)
            <tr class="border border-gray-300">
                <td class="border py-2 px-1">{{ $i }}.</td>
                <td class="pl-2 border">{{ $mhs->nama }}</td>
                <td class="pl-2 border">{{ $mhs->nim }}</td>
                <td class="text-center">
                  <div class="flex justify-center items-center">
                    <x-min></x-min>
                  </div>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
            </tbody>
        </table>
        <div class="flex gap-3">
          <a href="{{ route('kaprodi.dashboard') }}"
              class="border border-indigo-700 mt-8 text-indigo-700 font-semibold  px-6 py-2 rounded-md hover:text-white hover:bg-indigo-800 transition duration-200 ease-in-out cursor-pointer">
              Kembali
          </a>
  
          <button
              class="bg-indigo-700 mt-8 text-white px-6 py-2 rounded-md hover:bg-indigo-800 transition duration-200 ease-in-out cursor-pointer">
              Ubah Data
          </button>
  
        </div>
        </div>
      </form>    
  </div>
  
  <div class="py-3 pb-5 px-3 mx-1 min-[360px]:mx-3 my-4 mb-5 bg-white rounded-xl shadow-lg">
    <h3 class="text-indigo-600 mt-5 font-semibold text-xl text-center">List Mahasiswa</h3>
    <form class="space-y-3 " action="">
      <table class="table-auto w-full border-collapse mb-5">
          <thead>
              <tr class="border">
                  <th class="text-start border py-2 px-1">No.</th>
                  <th class="text-start border py-2 px-1">Mahasiswa</th>
                  <th class="text-start border py-2 px-1">NIM</th>
                  <th class="border py-2 px-1">Opsi</th>
              </tr>
          </thead>
          <tbody>
          @foreach ($mhss as $mhs)
          <tr class="border border-gray-300">
              <td class="border py-2 px-1">{{ $j }}.</td>
              <td class="pl-2 border">{{ $mhs->nama }}</td>
              <td class="pl-2 border">{{ $mhs->nim }}</td>
              <td class="text-center">
                <div class="flex justify-center items-center">
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

</div>
@endsection