@php
    $sample = (object) [
        'role' => 'mahasiswa',
    ];
@endphp

<aside class="w-64 bg-white shadow-md h-screen hidden 2md:block">
    <div class="p-6 lg:p-10">
        <h2 class="text-2xl font-semibold text-indigo-600 mb-6">Menu</h2>
        <nav class="space-y-4">
            @if ($sample->role == 'kaprodi')
                <a href="#" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Dashboard</a>
                <a href="#" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Manage Classes</a>
            @elseif($sample->role == 'dosen')
                <a href="#" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Dashboard</a>
                <a href="#" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Data
                    Mahasiswa</a>
                <a href="#" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Pengajuan</a>
            @elseif($sample->role == 'mahasiswa')
                <a href="{{ route('mhs.dashboard') }}"
                    class="{{ request()->is('dashboardmahasiswa') || request()->is('edit-data') ? 'bg-indigo-400' : '' }} block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Dashboard</a>
                <a href="{{ route('mhs.kelas') }}"
                    class="{{ request()->is('kelas') ? 'bg-indigo-400' : '' }} block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">My
                    Classes</a>
            @endif
        </nav>
    </div>
</aside>
