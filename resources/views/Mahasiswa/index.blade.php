@extends('layout.master')

@section('title', 'Data Mahasiswa')

@section('content')
    <h1 class="text-2xl font-semibold mb-6">Data Mahasiswa</h1>

    <div class="mb-4">
        <a href="{{ route('mahasiswa.create') }}" class="bg-indigo-700 text-white px-6 py-2 rounded-md hover:bg-indigo-800 transition duration-200 ease-in-out">
            Tambah Mahasiswa
        </a>
    </div>
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Sukses!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif


    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-3 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">No</th>
                    <th class="py-3 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">Nama Mahasiswa</th>
                    <th class="py-3 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">NIM</th>
                    <th class="py-3 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $index => $student)
                    <tr>
                        <td class="py-3 px-4 border-b border-gray-200">{{ $index + 1 }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">{{ $student->name }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">{{ $student->nim }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">
                            <a href="{{ route('mahasiswa.detail', $student->id) }}" class="bg-green-700 text-white px-6 py-2 rounded-md hover:bg-green-800 transition duration-200 ease-in-out">
                                Show
                            </a>
                            <a href="{{ route('mahasiswa.edit', $student->id) }}" class="bg-indigo-700 text-white px-6 py-2 rounded-md hover:bg-indigo-800 transition duration-200 ease-in-out">
                                Edit
                            </a>
                            <form action="{{ route('mahasiswa.delete', $student->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-700 text-white px-6 py-2 rounded-md hover:bg-red-800 transition duration-200 ease-in-out">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
