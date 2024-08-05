@extends('layout.master')

@section('title', 'Kaprodi Manage Dosen')

@section('content')
<div class="container px-4 py-8 mx-auto">
    <h1 class="mb-6 text-2xl font-semibold text-gray-900">Daftar Dosen</h1>
    <a href="{{ route('kaprodi.dosen.create') }}" class="px-4 py-2 mb-4 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Tambah Dosen</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-sm leading-4 text-left text-gray-700 border-b-2 border-gray-300">ID</th>
                    <th class="px-4 py-2 text-sm leading-4 text-left text-gray-700 border-b-2 border-gray-300">User ID</th>
                    <th class="px-4 py-2 text-sm leading-4 text-left text-gray-700 border-b-2 border-gray-300">Nama Kelas</th>
                    <th class="px-4 py-2 text-sm leading-4 text-left text-gray-700 border-b-2 border-gray-300">Kode Dosen</th>
                    <th class="px-4 py-2 text-sm leading-4 text-left text-gray-700 border-b-2 border-gray-300">NIP</th>
                    <th class="px-4 py-2 text-sm leading-4 text-left text-gray-700 border-b-2 border-gray-300">Nama</th>
                    <th class="px-4 py-2 text-sm leading-4 text-left text-gray-700 border-b-2 border-gray-300">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dosen as $d)
                <tr>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $d->id }}</td>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $d->user_id }}</td>
                    <td class="px-4 py-2 border-b border-gray-300">
                        {{ $d->kelas ? $d->kelas->nama : 'Belum ada kelas' }}
                    </td>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $d->kode_dosen }}</td>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $d->nip }}</td>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $d->name }}</td>
                    <td class="px-4 py-2 border-b border-gray-300">
                        <a href="{{ route('kaprodi.dosen.edit', $d->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('kaprodi.dosen.delete', $d->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ml-2 text-red-600 hover:text-red-900">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
