@extends('layout.master')

@section('title', 'Data Mahasiswa')

@section('content')
    <h1 class="mb-6 text-2xl font-semibold">Data Mahasiswa</h1>

    <div class="mb-4">
        <a href="{{ route('dosen.mahasiswa.create') }}" class="px-6 py-2 text-white transition duration-200 ease-in-out bg-indigo-700 rounded-md hover:bg-indigo-800">
            Tambah Mahasiswa
        </a>
    </div>
    @if (session('success'))
        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left text-indigo-700 bg-indigo-100 border-b border-gray-200">No</th>
                    <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left text-indigo-700 bg-indigo-100 border-b border-gray-200">Nama Mahasiswa</th>
                    <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left text-indigo-700 bg-indigo-100 border-b border-gray-200">NIM</th>
                    <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left text-indigo-700 bg-indigo-100 border-b border-gray-200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $index => $student)
                    <tr>
                        <td class="px-4 py-3 border-b border-gray-200">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 border-b border-gray-200">{{ $student->name }}</td>
                        <td class="px-4 py-3 border-b border-gray-200">{{ $student->nim }}</td>
                        <td class="px-4 py-3 border-b border-gray-200">
                            <a href="{{ route('dosen.mahasiswa.detail', $student->id) }}" class="px-6 py-2 text-white transition duration-200 ease-in-out bg-green-700 rounded-md hover:bg-green-800">
                                Show
                            </a>
                            <a href="{{ route('dosen.mahasiswa.edit', $student->id) }}" class="px-6 py-2 text-white transition duration-200 ease-in-out bg-indigo-700 rounded-md hover:bg-indigo-800">
                                Edit
                            </a>
                            <form action="{{ route('dosen.mahasiswa.delete', $student->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-6 py-2 text-white transition duration-200 ease-in-out bg-red-700 rounded-md hover:bg-red-800">
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
