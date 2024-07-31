@php
    $sample =(object)[
        "role" => "kaprodi",
];
@endphp
<aside class="w-64 bg-white shadow-md h-screen hidden lg:block">
    <div class="p-6 lg:p-10">
        <h2 class="text-2xl font-semibold text-indigo-600 mb-6">Menu</h2>
        <nav class="space-y-4">
            @if(auth()->user()->role == 'kaprodi')
                <a href="#" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Dashboard</a>
                <a href="#" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Manage Classes</a>
            @elseif(auth()->user()->role == 'dosen')
                <a href="#" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Dashboard</a>
                <a href="#" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">My Classes</a>
            @elseif(auth()->user()->role == 'mahasiswa')
                <a href="#" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">Dashboard</a>
                <a href="#" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white rounded">My Classes</a>
            @endif
        </nav>
    </div>
</aside>
