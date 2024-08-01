<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Kaprodi;

class KaprodiController extends Controller
{
    //DOSEN MANAGEMENT CRUD
    public function index()
    {
        return view('Kaprodi.index');
    }

    // public function dosenIndex()
    // {
    //     $dosen = Dosen::all();
    //     return view('Kaprodi.dosenIndex', compact('dosen'));
    // }

    // public function dosenCreate(Kaprodi $kaprodi)
    // {
    //     return view('Kaprodi.dosen.create', compact('kaprodi'));
    // }

    // public function dosenStore(Request $request, Kaprodi $kaprodi)
    // {
    //     $validated = $request->validate([
    //         'user_id' => 'required|unique:dosen',
    //         'kelas_id' => 'nullable|exists:kelas,id',
    //         'kode_dosen' => 'required|unique:dosen',
    //         'nip' => 'required|unique:dosen',
    //         'name' => 'required',
    //     ]);

    //     $kaprodi->dosen()->create($validated);

    //     return redirect()->route('kaprodi.dosen.index', $kaprodi);
    // }

    // public function dosenEdit(Kaprodi $kaprodi, Dosen $dosen)
    // {
    //     return view('Kaprodi.dosenEdit', compact('kaprodi', 'dosen'));
    // }

    // public function dosenUpdate(Request $request, Kaprodi $kaprodi, Dosen $dosen)
    // { 
    //     $validated = $request->validate([
    //         'user_id' => 'required|unique:dosens,user_id,' . $dosen->id,
    //         'kelas_id' => 'nullable|exists:kelas,id',
    //         'kode_dosen' => "required|unique:dosens,kode_dosen,{$dosen->id}",
    //         'nip' => 'required|unique:dosens,nip,' . $dosen->id,
    //         'name' => 'required',
    //     ]);

    //     $dosen->update($validated);
    //     return redirect()->route('kaprodi.dosen.index', $kaprodi);
    // }

    // public function dosenDelete(Kaprodi $kaprodi, Dosen $dosen)
    // {
    //     $dosen->delete();
    //     return redirect()->route('kaprodi.dosen.index', $kaprodi);
    // }

    // //CLASS MANAGEMENT CRUD

    // public function classIndex()
    // {
    //     return view('kaprodi.class.index');
    // }

    // public function classCreate()
    // {
    //     return view('kaprodi.class.create');
    // }

    // public function classStore(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'string|required',
    //         'jumlah' => 'integer|required',
    //     ]);

    //     Kaprodi::create($validated);
    //     return redirect()->route('kaprodi.class.index');
    // }

    // public function classEdit(Kaprodi $kaprodi)
    // {
    //     return view('kaprodi.class.edit', compact('kaprodi'));
    // }

    // public function classUpdate(Request $request, Kaprodi $kaprodi)
    // {
    //     $validated = $request->validate([
    //         'name' => 'string|required',
    //         'jumlah' => 'integer|required',
    //     ]);
    //     $kaprodi->update($validated);
    //     return redirect()->route('kaprodi.class.index');
    // }

    // public function classDelete(Kaprodi $kaprodi)
    // {
    //     $kaprodi->delete();
    //     return redirect()->route('kaprodi.class.index');
    // }


}
