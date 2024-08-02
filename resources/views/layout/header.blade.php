<header class="py-4 text-white bg-black shadow-md">
    <div class="container flex items-center justify-between px-6 lg:px-10">
        <h1 class="font-semibold sm:text-xl">
            @if ( auth()->user()->role == 'kaprodi' )
                Dashboard Kaprodi </h1>
            @elseif ( auth()->user()->role == 'dosen-wali' )
                Dashboard Dosen Wali </h1>
            @elseif ( auth()->user()->role == 'mahasiswa' )
                Dashboard Mahasiswa </h1>
            @endif
        <nav class="flex items-center ml-auto space-x-4 ">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="px-3 py-2 rounded hover:bg-indigo-700">Logout</button>
            </form>
        </nav>
    </div>
</header>
