<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Request as EditRequest;
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
            'kelas_id' => 'required|integer|exists:kelas,id',
            'nim' => 'required|string|max:20|unique:mahasiswas,nim',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',

        ]);

        $user = User::create([
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'role' => 'mahasiswa',
        ]);

        Mahasiswa::create([
            'user_id' => $user->id,
            'kelas_id' => $request->kelas_id,
            'nim' => $request->nim,
            'name' => $request->name,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('dosen.mahasiswa.index')->with('success', 'Mahasiswa created successfully.');
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

        return redirect()->route('dosen.mahasiswa.index')->with('success', 'Mahasiswa updated successfully.');
    }

    public function delete($id)
    {
        $student = Mahasiswa::findOrFail($id);
        $student->delete();

        return redirect()->route('dosen.mahasiswa.index')->with('success', 'Mahasiswa deleted successfully.');
    }

    public function show($id)
    {
        $student = Mahasiswa::findOrFail($id);
        return view('mahasiswa.detail', compact('student'));
    }

    public function dashboard()
    {
        // Misalkan Auth::user() mengembalikan pengguna yang login
        $user = Auth::user();
        
        // Cari data mahasiswa berdasarkan user ID
        $student = $user->mahasiswa;

        // Kirim data mahasiswa ke view
        return view('mahasiswa.dashboard', compact('student'));
    }

    public function requestEdit()
    {
        // Mengambil data mahasiswa yang login
        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->first();
        return view('mahasiswa.request', compact('mahasiswa'));
    }

    // Mengirimkan request edit data
    public function submitRequestEdit(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'kelas_id' => 'required|integer|exists:kelas,id',
            'keterangan' => 'required|string|max:255',
        ]);

        // Get the mahasiswa ID from the authenticated user
        $mahasiswaId = Mahasiswa::where('user_id', Auth::id())->first()->id;
    
        // Check if a request already exists for this mahasiswa
        $existingRequest = EditRequest::where('mahasiswa_id', $mahasiswaId)->first();
    
        if ($existingRequest) {
            // If a request already exists, handle rejection
            return redirect()->route('mahasiswa.dashboard')->with('error', 'A request already exists for this mahasiswa.');
        }
    
        // Create a new request if no existing request is found
        EditRequest::create([
            'kelas_id' => $validatedData['kelas_id'],
            'mahasiswa_id' => $mahasiswaId,
            'keterangan' => $validatedData['keterangan'],
        ]);

        // $user = Auth::user();
        // $student = $user->mahasiswa->edit;
        // $student->edit = 1; // pending
        // $student->save();
    
        return redirect()->route('mahasiswa.dashboard')->with('success', 'Request edit data telah dikirim.');
    }
    
}
