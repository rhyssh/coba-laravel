@extends('layout.master')

@section('title', 'Pengajuan Edit Data Mahasiswa')

@section('content')
    <h1 class="mb-6 text-2xl font-semibold">Pengajuan Edit Data Mahasiswa</h1>

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
                    <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left text-indigo-700 bg-indigo-100 border-b border-gray-200">Kelas</th>
                    <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left text-indigo-700 bg-indigo-100 border-b border-gray-200">Mahasiswa</th>
                    <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left text-indigo-700 bg-indigo-100 border-b border-gray-200">Keterangan</th>
                    <th class="px-4 py-3 text-sm leading-4 tracking-wider text-left text-indigo-700 bg-indigo-100 border-b border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $index => $request)
                    <tr>
                        <td class="px-4 py-3 border-b border-gray-200">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 border-b border-gray-200">{{ $request->kelas->nama }}</td>
                        <td class="px-4 py-3 border-b border-gray-200">{{ $request->mahasiswa->name }}</td>
                        <td class="px-4 py-3 border-b border-gray-200">{{ $request->keterangan }}</td>
                        <td class="px-4 py-3 border-b border-gray-200">
                            <form action="{{ route('dosen.requests.approve', $request->id) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="px-6 py-2 text-white transition duration-200 ease-in-out bg-green-700 rounded-md hover:bg-green-800">
                                    Approve
                                </button>
                            </form>
                            <form action="{{ route('dosen.requests.reject', $request->id) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="px-6 py-2 text-white transition duration-200 ease-in-out bg-red-700 rounded-md hover:bg-red-800">
                                    Reject
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
