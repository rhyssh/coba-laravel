<aside class="w-64 bg-white shadow-md h-screen hidden lg:block">
    <div class="p-6 lg:p-10">
        <h2 class="text-2xl font-semibold text-indigo-600 mb-6">Menu</h2>
        <nav class="space-y-4">
            @auth()
                @if( auth()->user()->role == 'kaprodi')
                    <a href="{{ route('kaprodi.index') }}" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Dashboard</a>
                    <a href="{{ route('kaprodi.dosen.index') }}" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Manage Dosen</a>
                    <a href="{{ route('kaprodi.class.index') }}" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Manage Classes</a>
                @elseif( auth()->user()->role == 'dosen wali')
                    <a href="{{ route('dosen.index') }}" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Dashboard</a>
                    <a href="{{ route('dosen.class.index') }}" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">My Class</a>
                    <a href="{{ route('dosen.mahasiswa.index') }}" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Manage Mahasiswa</a>
                    <a href="{{ route('dosen.requests') }}" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Pengajuan</a>
                @elseif( auth()->user()->role == 'mahasiswa')
                    <a href="{{ route('mahasiswa.index') }}" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Dashboard</a>
                    <a href="{{ route('mahasiswa.show') }}" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">My Profile</a>
                    <a href="{{ route('mahasiswa.request.edit') }}" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Request Edit Data</a>
                @endif
            @endauth
        </nav>
    </div>
</aside>
