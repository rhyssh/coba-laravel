@extends('layout.master')

@section('title', 'Data Mahasiswa')

@section('content')
    <h1 class="text-2xl font-semibold mb-6">Data Mahasiswa</h1>

    @php
        // Contoh data mahasiswa
        $students = [
            (object)[
                'id' => 1,
                'nama' => 'Alice',
                'nim' => '123456'
            ],
            (object)[
                'id' => 2,
                'nama' => 'Bob',
                'nim' => '123457'
            ],
            (object)[
                'id' => 3,
                'nama' => 'Charlie',
                'nim' => '123458'
            ]
        ];
    @endphp

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
                        <td class="py-3 px-4 border-b border-gray-200">{{ $student->nama }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">{{ $student->nim }}</td>
                        <td class="py-3 px-4 border-b border-gray-200">
                            <button onclick="window.location.href='{{ route('detailmhs') }}'" class="bg-indigo-700  text-white px-6 py-2 rounded-md hover:bg-indigo-800 transition duration-200 ease-in-out">
                                Lihat Detail
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
