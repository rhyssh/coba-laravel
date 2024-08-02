@php
    $sample =(object)[
        "role" => "kaprodi",
    ]
@endphp

<aside class="hidden w-64 h-screen bg-white shadow-md lg:block">
    <div class="p-6 lg:p-10">
        <h2 class="mb-6 text-2xl font-semibold text-indigo-600">Menu</h2>
        <nav class="space-y-4">
            @if( $sample ->role == 'kaprodi')
                <a href="#" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">Dashboard</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">Manage Classes</a>
            @elseif( $sample ->role == 'dosen')
                <a href="#" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">Dashboard</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">Data Mahasiswa</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">Pengajuan</a>
            @elseif( $sample ->role == 'mahasiswa')
                <a href="#" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">Dashboard</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">My Classes</a>
            @endif
        </nav>
    </div>
</aside>
