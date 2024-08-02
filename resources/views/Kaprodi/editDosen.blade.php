@extends('layout.master')

@section('title', 'Kaprodi Dashboard')

@section('content')
<div class="py-3 pb-5 px-3 mx-1 min-[360px]:mx-3 my-4 mb-5 bg-white rounded-xl shadow-lg">
    <h3 class="text-indigo-600 mt-5 font-semibold text-xl text-center">Data Dosen</h3>
    <form class="space-y-3 " action="">
        <div class="flex flex-col">
            <label for="nama">Nama</label>
            <input class="border border-gray-300 h-10 rounded-md px-2" type="text" name="nama" id="nama"
                value="Jumanto">
        </div>
        <div class="flex flex-col">
            <label for="ttl">NIP</label>
            <input class="border border-gray-300 h-10 rounded-md px-2" type="text" name="nip" id="nip">
        </div>
        <div class="flex flex-col">
            <label for="jurusan">Kode Dosen</label>
            <input class="border border-gray-300 h-10 rounded-md px-2" type="text" name="kode" id="kode"
                value="jur">
        </div>
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
    </form>
</div>
@endsection