<header class="bg-black text-white shadow-md py-4">
    <div class="container flex justify-between items-center px-6 lg:px-10">
        <h1 class="text-xl font-bold ">Sistem Pendataan Mahasiswa</h1>
        <nav class="flex space-x-4 ml-auto items-center">
            <h1 class=" font-bold" >Nama Dosen</h1>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="hover:bg-indigo-700 px-3 py-2 rounded">Logout</button>
            </form>
        </nav>
    </div>
</header>
