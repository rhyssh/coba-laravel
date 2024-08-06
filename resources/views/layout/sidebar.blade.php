<aside class="hidden w-64 h-screen bg-white shadow-md lg:block">
    <div class="p-6 lg:p-10">
        <h2 class="mb-6 text-2xl font-semibold text-indigo-600">Menu</h2>
        <nav class="space-y-4">
            @auth()
                @if( auth()->user()->role == 'kaprodi')
                    <a href="/kaprodi" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">Dashboard</a>
                    <a href="{{ route('kaprodi.dosen.index') }}" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">Manage Dosen</a>
                    <a href="{{ route('kaprodi.kelas.index') }}" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">Manage Classes</a>
                @elseif( auth()->user()->role == 'dosen-wali')
                    {{-- <a href="{{ route('dosen.index') }}" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">Dashboard</a> --}}
                    <a href="{{ route('dosen.myclass') }}" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">My Class</a>
                    <a href="{{ route('dosen.mahasiswa.index') }}" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">Manage Mahasiswa</a>
                    <a href="{{ route('dosen.requests') }}" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">Pengajuan</a>
                @elseif( auth()->user()->role == 'mahasiswa')
                    <a href="{{ route('mahasiswa.dashboard') }}" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">My Profile</a>
                    <a href="{{ route('mahasiswa.myclass') }}" class="block px-4 py-2 rounded hover:bg-indigo-600 hover:text-white">My Class</a>
                @endif
            @endauth
        </nav>
    </div>
</aside>
