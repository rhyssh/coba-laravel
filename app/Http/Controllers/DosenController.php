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
        $dosens = Dosen::all();
        return view('kaprodi.dosenIndex', compact('dosens'));
    }

    public function dosenCreate()
    {
        return view('kaprodi.dosenCreate');
    }

    public function dosenStore(Request $request)
    {
        $request->validate([
            'kelas_id' => 'nullable|unique:dosens,kelas_id|exists:kelas,id',
            'kode_dosen' => 'required|unique:dosens,kode_dosen',
            'nip' => 'required|unique:dosens,nip',
            'name' => 'required',
        ]);

        // Create new user with role 'dosen wali'
        $user = User::create([
            'username' => $request->name,
            'email' => $request->name . '@example.com', // Replace with actual email logic
            'password' => Hash::make('password'), // Replace with actual password logic
            'role' => 'dosen wali',
        ]);

        // Create new dosen with the created user's ID
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
        $dosen = Dosen::findOrFail($id);
        return view('kaprodi.dosenEdit', compact('dosen'));
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
