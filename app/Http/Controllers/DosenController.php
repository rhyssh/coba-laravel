<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function dashboard() 
    {
        return view('dosen._dashboard');
    }

    public function dosenIndex()
    {
        $dosen = Dosen::with('kelas')->get();
        return view('dosen.index', compact('dosen'));
    }

    public function dosenCreate()
    {
        $kelas = Kelas::doesntHave('dosen')->get();
        return view('dosen.create', compact('kelas'));
    }

    public function dosenStore(Request $request)
    {
        $request->validate([
            'kelas_id' => 'nullable|exists:kelas,id', // Boleh null dan mengecek yang sudah ada
            'kode_dosen' => 'required|unique:dosens,kode_dosen',
            'nip' => 'required|unique:dosens,nip',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Check if the selected kelas already has a dosen
        if ($request->kelas_id) {
            $existingDosen = Dosen::where('kelas_id', $request->kelas_id)->first();
            
            if ($existingDosen) {
                return redirect()->back()->with('error', 'Kelas sudah punya dosen wali')->withInput();
            }
        }
    
        // otomatis rolenya dosen wali
        $user = User::create([
            'username' => $request->name,
            'email' => $request->name , // Replace with actual email logic
            'password' => Hash::make($request->password), // Replace with actual password logic
            'role' => 'dosen-wali',
        ]);
    
        // Buat dosen baru
        $dosen = Dosen::create([
            'user_id' => $user->id,
            'kelas_id' => $request->kelas_id,
            'kode_dosen' => $request->kode_dosen,
            'nip' => $request->nip,
            'name' => $request->name,
        ]);

        $user->save();
        $dosen->save();

        return redirect()->route('kaprodi.dosen.index');
    }

    public function dosenEdit($id)
    {
        // fetch kelas buat ngambil data semua kelas yg ada di db
        $kelas = Kelas::all();
        
        $dosen = Dosen::findOrFail($id);
        return view('dosen.edit', compact('dosen', 'kelas'));
    }

    public function dosenUpdate(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);

        $request->validate([
            'user_id' => 'required|unique:dosens,user_id,' . $dosen->id,
            'kelas_id' => 'nullable|unique:dosens,kelas_id,' . $dosen->id . '|exists:kelas,id',
            'kode_dosen' => 'required|unique:dosens,kode_dosen,' . $dosen->id,
            'nip' => 'required|unique:dosens,nip,' . $dosen->id,
            'name' => 'required',
        ]);

        $dosen->update($request->all());

        return redirect()->route('kaprodi.dosen.index');
    }

    public function dosenDelete($id)
    {
        $dosen = Dosen::findOrFail($id);
        $user = User::findOrFail($dosen->user_id);

        $user->delete();
        $dosen->delete();
        
        return redirect()->route('kaprodi.dosen.index');
    }

    public function myclass() 
    {
        $user = Auth::user();

        $dosen  = $user->dosen;

        $kelas = $dosen->kelas;
        $kelas_id = $dosen->kelas_id;
        $mahasiswas = Mahasiswa::where('kelas_id', $kelas_id)->get();

        return view('dosen.myclass', compact('kelas', 'mahasiswas'));

    }

    public function indexRequest() 
    {
        $requests = Request::with('mahasiswa', 'kelas')->get();
        // dd($requests);
        // $students = Mahasiswa::all();
        return view('dosen.request', compact('requests'));
    }

    public function approveRequest($id)
    {
        $request = Request::findOrFail($id);

        $mahasiswa = $request->mahasiswa;

        $mahasiswa->edit = 1; // approve given
        $mahasiswa->save();

        $request->delete();

        return redirect()->back()->with('success', 'Request approved successfully.');
    }

    public function rejectRequest($id)
    {
        $request = Request::findOrFail($id);

        $mahasiswa = $request->mahasiswa;

        $mahasiswa->edit = 0; // rejected
        $mahasiswa->save();

        $request->delete();

        return redirect()->back()->with('success', 'Request rejected successfully.');
    }
}
