@extends('layout.master')

@section('title', 'Detail Kelas')

@section('content')
    <div class="container flex justify-between px-4 py-8 mx-auto">
        <h1 class="mb-6 text-2xl font-semibold">Detail Kelas</h1>

        <a href="{{ route('kaprodi.kelas.create') }}" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
            Tambah Kelas
        </a>
    </div>

    <div class="p-6 bg-white border-2 border-indigo-700 rounded-lg shadow-md">
        <h2 class="mb-4 text-xl font-semibold text-indigo-700">Daftar Kelas</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-sm leading-4 tracking-wider text-left text-indigo-700 bg-indigo-100 border-b border-gray-200">No</th>
                        <th class="px-4 py-2 text-sm leading-4 tracking-wider text-center text-indigo-700 bg-indigo-100 border-b border-gray-200">Nama Kelas</th>
                        <th class="px-4 py-2 text-sm leading-4 tracking-wider text-center text-indigo-700 bg-indigo-100 border-b border-gray-200">Dosen Wali</th>
                        <th class="px-4 py-2 text-sm leading-4 tracking-wider text-center text-indigo-700 bg-indigo-100 border-b border-gray-200">Kapasitas</th>
                        <th class="px-4 py-2 text-sm leading-4 tracking-wider text-center text-indigo-700 bg-indigo-100 border-b border-gray-200">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $index => $kelasItem)
                    <tr>
                        <td class="px-4 py-2 border-b border-gray-200">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border-b border-gray-200 text-center">{{ $kelasItem->nama }}</td>
                        <td class="px-4 py-2 border-b border-gray-200 text-center">
                            @if ($kelasItem->dosen)
                                {{ $kelasItem->dosen->name }}
                            @else
                                Belum ada
                            @endif
                        </td>
                        <td class="px-4 py-2 border-b border-gray-200 text-center">{{ $kelasItem->jumlah }}</td>
                        <td class="px-4 py-2 border-b border-gray-200 text-center">
                            <a href="{{ route('kaprodi.kelas.show', $kelasItem->id) }}" class="font-bold text-indigo-600 hover:text-indigo-900">Detail</a>
                            <a href="{{ route('kaprodi.kelas.edit', $kelasItem->id) }}" class="ml-4 font-bold text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ route('kaprodi.kelas.delete', $kelasItem->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-4 font-bold text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
