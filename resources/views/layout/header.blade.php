@php
    $sample = (object) [
        'role' => 'mahasiswa',
    ];
@endphp


<header class="bg-black text-white shadow-md py-4">
    <div class="container flex justify-between items-center px-6 lg:px-10">
        <h1 class=" sm:text-xl font-semibold ">
            {{ $sample->role == 'mahasiswa' ? 'Dashboard Mahasiswa' : 'Sistem Pendataan Mahasiswa' }}</h1>
        <nav class="flex space-x-4 ml-auto items-center ">
            <h1 class="hidden xs:inline-flex font-semibold">Nama {{ $sample->role == 'mahasiswa' ? 'Mahasiswa' : 'Dosen' }}</h1>
            <a href="#" class="hover:bg-indigo-700 px-3 py-2 rounded">Logout</a>
        </nav>
    </div>
</header>
