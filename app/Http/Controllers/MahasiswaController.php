<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $students = Mahasiswa::all();
        return view('mahasiswa.index', compact('students'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'user_id' => 'required|integer|exists:users,id',
        'kelas_id' => 'required|integer|exists:kelas,id',
        'nim' => 'required|string|max:20|unique:mahasiswas,nim',
        'name' => 'required|string|max:255',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
    ]);


    Mahasiswa::create($validatedData);

    return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa created successfully.');
}

    public function show($id)
    {
        $student = Mahasiswa::findOrFail($id);
        return view('mahasiswa.detail', compact('student'));
    }

    public function edit($id)
    {
        $student = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
    $validatedData = $request->validate([
        'nim' => 'required|string|max:20|unique:mahasiswas,nim,' . $id,
        'name' => 'required|string|max:255',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
    ]);

    $student = Mahasiswa::findOrFail($id);
    $student->update($validatedData);

    return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa updated successfully.');
    }


    public function delete($id)
    {
        $student = Mahasiswa::findOrFail($id);
        $student->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa deleted successfully.');
    }
}
