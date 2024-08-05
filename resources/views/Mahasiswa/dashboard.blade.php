@extends('layout.master')

@section('title', 'Mahasiswa Dashboard')
@section('content')

    <!-- Display Success and Error Messages -->
    @if (session('success'))
        <div class="p-4 mb-4 text-white bg-green-500 rounded-lg">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="p-4 mb-4 text-white bg-red-500 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <h1 class="mb-6 text-2xl font-semibold">Welcome, {{ $student->name }}</h1>

    <div class="flex flex-col items-center gap-10 md:flex-row sm:mx-10">
        <img class="inline-block w-40 h-40 rounded-full ring-2 ring-white"
            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
            alt="foto">
        <div class="flex-1 p-6 bg-white border-2 border-indigo-700 rounded-lg shadow-md">
            <table class="w-full border-collapse table-auto">
                <tbody>
                    <tr class="border-b border-gray-300">
                        <td class="py-2 font-bold">Nama</td>
                        <td class="pl-2">: {{ $student->name }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <td class="py-2 font-bold">NIM</td>
                        <td class="pl-2">: {{ $student->nim }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <td class="py-2 font-bold">Tempat, Tanggal Lahir</td>
                        <td class="pl-2">: {{ $student->tempat_lahir }}, {{ $student->tanggal_lahir }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="#">
                <button
                    class="px-6 py-2 mt-8 text-white transition duration-200 ease-in-out bg-red-600 rounded-md hover:bg-red-700">
                    Edit data
                </button>
            </a>

            <a href="#" class="">
                <button
                    class="px-6 py-2 mt-8 text-white transition duration-200 ease-in-out bg-indigo-700 rounded-md hover:bg-indigo-800">
                    Lihat Kelas
                </button>
            </a>

        </div>
    </div>

@endsection
