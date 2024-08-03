@extends('layout.master')

@section('title', 'Mahasiswa Dashboard')
@section('content')

    <h1 class="text-2xl font-semibold mb-6">Welcome, {{ $student->name }}</h1>

    <div class="flex flex-col items-center gap-10 md:flex-row sm:mx-10">
        <img class="inline-block h-40 w-40 rounded-full ring-2 ring-white"
            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
            alt="foto">
        <div class="flex-1 bg-white p-6 rounded-lg border-2 border-indigo-700 shadow-md">
            <table class="table-auto w-full border-collapse">
                <tbody>
                    <tr class="border-b border-gray-300">
                        <td class="font-bold py-2">Nama</td>
                        <td class="pl-2">: {{ $student->name }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <td class="font-bold py-2">NIM</td>
                        <td class="pl-2">: {{ $student->nim }}</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <td class="font-bold py-2">Tempat, Tanggal Lahir</td>
                        <td class="pl-2">: {{ $student->tempat_lahir }}, {{ $student->tanggal_lahir }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="#">
                <button
                    class="bg-red-600 mt-8 text-white px-6 py-2 rounded-md hover:bg-red-700 transition duration-200 ease-in-out">
                    Edit data
                </button>
            </a>

            <a href="#" class="2md:hidden">
                <button
                    class="bg-indigo-700 mt-8 text-white px-6 py-2 rounded-md hover:bg-indigo-800 transition duration-200 ease-in-out">
                    Lihat Kelas
                </button>
            </a>

        </div>
    </div>

@endsection