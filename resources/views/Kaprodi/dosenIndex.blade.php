@extends('layout.master')

@section('title', 'Kaprodi Manage Dosen')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Daftar Dosen</h1>
    <a href="{{ route('kaprodi.dosen.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Tambah Dosen</a>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700">ID</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700">User ID</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700">Kelas ID</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700">Kode Dosen</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700">NIP</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700">Nama</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dosen as $d)
                <tr>
                    <td class="py-2 px-4 border-b border-gray-300">{{ $d->id }}</td>
                    <td class="py-2 px-4 border-b border-gray-300">{{ $d->user_id }}</td>
                    <td class="py-2 px-4 border-b border-gray-300">{{ $d->kelas_id }}</td>
                    <td class="py-2 px-4 border-b border-gray-300">{{ $d->kode_dosen }}</td>
                    <td class="py-2 px-4 border-b border-gray-300">{{ $d->nip }}</td>
                    <td class="py-2 px-4 border-b border-gray-300">{{ $d->name }}</td>
                    <td class="py-2 px-4 border-b border-gray-300">
                        <a href="{{ route('kaprodi.dosen.edit', $d->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('kaprodi.dosen.delete', $d->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
