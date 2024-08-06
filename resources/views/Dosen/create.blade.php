@extends('layout.master')

@section('title', 'Tambah Dosen Baru')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Tambah Dosen Baru</h1>

    @if(session('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('kaprodi.dosen.store') }}" method="POST" class="max-w-lg mx-auto">
        @csrf
        
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
            <input type="text" name="name" id="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <input type="email" name="email" id="email" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            @error('email')
                is-invalid
            @enderror
                class="form-control mt-1 block w-full rounded-lg border border-gray-300 focus:border-indigo-600 focus:ring-indigo-600 
                shadow-sm transition duration-200 ease-in-out focus:outline-none focus:shadow-outline px-4 py-2">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
            <div class="relative">
                <input type="password" name="password" id="password" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline pr-10">
                <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 px-3 py-2 text-gray-500 focus:outline-none">
                    <svg id="eyeIcon" class="h-2 w-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h.01M19.07 4.93a10.015 10.015 0 01-2.14-1.27m-.44-.32A9.957 9.957 0 0112 2C7.06 2 3 5.96 3 10s4.06 8 9 8c1.38 0 2.68-.2 3.87-.56m.53-1.12a10.015 10.015 0 01-2.14 1.27m.44.32A9.957 9.957 0 0112 22c-4.94 0-9-3.96-9-8s4.06-8 9-8c1.38 0 2.68.2 3.87.56m.53 1.12A10.015 10.015 0 0112 6m3 0a9.958 9.958 0 01-2.68 2.64M15 12h.01M19.07 4.93a10.015 10.015 0 01-2.14-1.27m-.44-.32A9.957 9.957 0 0112 2C7.06 2 3 5.96 3 10s4.06 8 9 8c1.38 0 2.68-.2 3.87-.56m.53-1.12a10.015 10.015 0 01-2.14 1.27m.44.32A9.957 9.957 0 0112 22c-4.94 0-9-3.96-9-8s4.06-8 9-8c1.38 0 2.68.2 3.87.56m.53 1.12A10.015 10.015 0 0112 6m3 0a9.958 9.958 0 01-2.68 2.64" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="mb-4">
            <label for="kode_dosen" class="block text-gray-700 text-sm font-bold mb-2">Kode Dosen:</label>
            <input type="text" name="kode_dosen" id="kode_dosen" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="nip" class="block text-gray-700 text-sm font-bold mb-2">NIP:</label>
            <input type="text" name="nip" id="nip" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        
        <div class="mb-4">
            <label for="kelas_id" class="block text-gray-700 text-sm font-bold mb-2">Kelas:</label>
            <select name="kelas_id" id="kelas_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Tidak Ada Kelas</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Tambah Dosen
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const togglePasswordButton = document.getElementById('togglePassword');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePasswordButton.addEventListener('click', function () {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.setAttribute('stroke', 'none');
            eyeIcon.setAttribute('fill', 'currentColor');
        } else {
            passwordInput.type = 'password';
            eyeIcon.setAttribute('stroke', 'currentColor');
            eyeIcon.setAttribute('fill', 'none');
        }
    });
});
</script>

@endsection

