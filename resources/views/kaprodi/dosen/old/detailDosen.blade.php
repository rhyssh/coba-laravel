@extends('layout.master')

@section('title', 'Kaprodi Dashboard')

@section('content')
    <h1 class="text-2xl font-semibold mb-6">Welcome, Kaprodi</h1>
    <p class="mb-5"> This is your classes</p>

    <div class="flex flex-col items-center gap-10 md:flex-row sm:mx-10">
        <img class="inline-block h-40 w-40 rounded-full ring-2 ring-white"
            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
            alt="foto">
        <div class="flex-1 bg-white p-6 rounded-lg border-2 border-indigo-700 shadow-md">
            <table class="table-auto w-full border-collapse">
                <tbody>
                    <tr class="border-b border-gray-300">
                        <td class="font-bold py-2">Nama</td>
                        <td class="pl-2">: Jumanto</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <td class="font-bold py-2">NIP</td>
                        <td class="pl-2">: 123</td>
                    </tr>
                    <tr class="border-b border-gray-300">
                        <td class="font-bold py-2">Kode Dosen</td>
                        <td class="pl-2">: 234</td>
                    </tr>
                    <tr>
                        <td class="font-bold py-2">Kelas</td>
                        <td class="pl-2">: 1-A</td>
                    </tr>
                </tbody>
            </table>
            <x-edit-del></x-edit-del>
        </div>
    </div>
@endsection
