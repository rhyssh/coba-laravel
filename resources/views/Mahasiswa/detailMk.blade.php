@php
    $index = 1; // Inisialisasi variabel untuk penomoran
@endphp
@extends('layout.master')
@section('title', 'Mahasiswa Dashboard')
@section('content')
    <h2 class="text-2xl font-semibold text-indigo-600 mb-6">Detail Mata Kuliah</h2>
    <div class="py-3 pb-5 px-3 mx-1 min-[360px]:mx-3 my-4 mb-5 bg-white rounded-xl shadow-lg">
        <h3 class="text-indigo-600 mt-5 font-semibold text-xl text-center">{{ $data->nama_mk }}</h3>
        <div class="flex flex-col justify-between">
            <p class="text-sm xs:text-base"><span class="font-semibold">Dosen Pengampu :</span> {{ $data->nama_dosen }}</p>
            <p class="text-sm xs:text-base"><span class="font-semibold">Jumlah SKS :</span> {{ $data->sks }} sks</p>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 my-4 shadow-md">
            <thead class="text-xs text-gray-700 uppercase bg-indigo-400  dark:bg-gray-700 dark:text-gray-400 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            No
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Mahasiswa
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            NIM
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->mahasiswa as $mhs)
                    <tr class="bg-white border-b dark:bg-[#CAFCFB] dark:border-primary-300 ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $index++ }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $mhs->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $mhs->nim }}
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
