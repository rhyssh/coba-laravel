<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        return view('Kelas.index');
    }

    public function showKelas()
    {
        $kelas = Kelas::all();
        return view('Kelas.kelasIndex', compact('kelas'));
    }

    public function kelasCreate()
    {  
        return view('Kelas.kelasCreate');
    }

    public function kelasStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Kelas::create($request->all());
        return redirect()->route('kelas.index');
    }

    public function kelasEdit($id){
        $kelas = Kelas::findOrFail($id);
        return view('Kelas.kelasEdit', compact('kelas'));
    }

    public function kelasUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());
        return redirect()->route('kelas.index');
    }

    public function kelasDelete($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas.index');
    }


}
