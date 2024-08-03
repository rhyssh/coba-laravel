@extends('layout.master')

@section('title', 'Detail Kelas')

@section('content')
    <div class="container mx-auto px-4 py-8 flex justify-between">
        <h1 class="text-2xl font-semibold mb-6">Detail Kelas</h1>

        <a href="{{ route('kaprodi.class.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Tambah Kelas
        </a>
    </div>

    <div class="bg-white p-6 rounded-lg border-2 border-indigo-700 shadow-md">
        <h2 class="text-xl font-semibold mb-4 text-indigo-700">Daftar Kelas</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">No</th>
                        <th class="py-2 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">Nama Kelas</th>
                        <th class="py-2 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">Kapasitas</th>
                        <th class="py-2 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">Dosen Wali</th>
                        <th class="py-2 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $index => $kelasItem)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $kelasItem->nama }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $kelasItem->jumlah }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            @if ($kelasItem->dosen)
                                {{ $kelasItem->dosen->name }}
                            @else
                                Belum ada
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200">
                            <a href="{{ route('kaprodi.class.detail', $kelasItem->id) }}" class="text-indigo-600 hover:text-indigo-900 font-bold">Detail</a>
                            <a href="{{ route('kaprodi.class.edit', $kelasItem->id) }}" class="text-indigo-600 hover:text-indigo-900 ml-4 font-bold">Edit</a>
                            <form action="{{ route('kaprodi.class.destroy', $kelasItem->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 ml-4 font-bold">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
