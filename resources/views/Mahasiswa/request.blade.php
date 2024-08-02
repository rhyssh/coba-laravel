@extends('layout.master')

@section('title', 'Pengajuan Perubahan Data Mahasiswa')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold text-indigo-700 mb-6">Pengajuan Perubahan Data Mahasiswa</h2>
    @php
        // Contoh data mahasiswa
        $students = [
            (object)[
                'id' => 1,
                'nama' => 'Alice',
                'nim' => '123456',
                'keterangan' => 'Perubahan alamat'
            ],
            (object)[
                'id' => 2,
                'nama' => 'Bob',
                'nim' => '123457',
                'keterangan' => 'Perubahan nomor telepon'
            ],
            (object)[
                'id' => 3,
                'nama' => 'Charlie',
                'nim' => '123458',
                'keterangan' => 'Perubahan email'
            ]
        ];
    @endphp

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-3 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">NIM</th>
                <th class="py-3 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">Nama Mahasiswa</th>
                <th class="py-3 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">Keterangan</th>
                <th class="py-3 px-4 border-b border-gray-200 bg-indigo-100 text-left text-sm leading-4 text-indigo-700 tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td class="py-3 px-4 border-b border-gray-200 text-sm text-gray-700">{{ $student->nim }}</td>
                <td class="py-3 px-4 border-b border-gray-200 text-sm text-gray-700">{{ $student->nama }}</td>
                <td class="py-3 px-4 border-b border-gray-200 text-sm text-gray-700">{{ $student->keterangan }}</td>
                <td class="py-3 px-4 border-b border-gray-200 text-sm text-gray-700 ">
                    <button onclick="showPopup('terima')" class="bg-indigo-700 text-white px-4 py-2 rounded-md hover:bg-indigo-800 transition duration-200 ease-in-out">Terima</button>
                    <button onclick="showPopup('tolak')" class="bg-black text-white px-6 py-2 rounded-md hover:bg-black transition duration-200 ease-in-out ml-4">Tolak</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div id="popup" class="fixed bottom-4 right-4 bg-white rounded-lg shadow-lg max-w-sm w-full p-6 border-l-4 border-indigo-700 hidden">
        <div id="popupContent" class="text-gray-800"></div>
        <button onclick="closePopup()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
            &times;
        </button>
    </div>
</div>

<script>
    function showPopup(action) {
        const popup = document.getElementById('popup');
        const popupContent = document.getElementById('popupContent');
        if (action === 'terima') {
            popupContent.innerHTML = "Data perubahan mahasiswa diterima";
        } else if (action === 'tolak') {
            popupContent.innerHTML = "Data perubahan mahasiswa ditolak";
        }
        popup.classList.remove('hidden');
    }

    function closePopup() {
        const popup = document.getElementById('popup');
        popup.classList.add('hidden');
    }
</script>
@endsection
