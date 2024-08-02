<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    public function showDosen()
    {
        $dosen = Dosen::all();
        $dosen = Dosen::with('kelas')->get();
        return view('kaprodi.dosenIndex', compact('dosen'));
    }

    public function dosenCreate()
    {
        $kelas = Kelas::all();
        return view('kaprodi.dosenCreate', compact('kelas'));
    }

    public function dosenStore(Request $request)
    {
        $request->validate([
            'kelas_id' => 'nullable|exists:kelas,id', // Boleh null dan mengecek yang sudah ada
            'kode_dosen' => 'required|unique:dosens,kode_dosen',
            'nip' => 'required|unique:dosens,nip',
            'name' => 'required',
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
            'email' => $request->name . '@example.com', // EMAIL DUMMY UNTUK TESTING
            'password' => Hash::make('password'), // PASSWORD DUMMY UNTUK TESTING 
            'role' => 'dosen wali',
        ]);
    
        // Buat dosen baru
        Dosen::create([
            'user_id' => $user->id,
            'kelas_id' => $request->kelas_id,
            'kode_dosen' => $request->kode_dosen,
            'nip' => $request->nip,
            'name' => $request->name,
        ]);
    
        return redirect()->route('kaprodi.dosen.index')->with('success', 'Dosen berhasil ditambahkan');
    }    

    public function dosenEdit($id)
    {
        // fetch kelas buat ngambil data semua kelas yg ada di db
        $kelas = Kelas::all();

        $dosen = Dosen::findOrFail($id);
        return view('kaprodi.dosenEdit', compact('dosen', 'kelas'));
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
        $dosen->delete();
        return redirect()->route('kaprodi.dosen.index');
    }
}
