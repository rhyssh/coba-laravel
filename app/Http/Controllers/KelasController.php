<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function kelasIndex()
    {
        return view('class.index');
    }

    public function showKelas()
    {
        $kelas = Kelas::all();
        return view('class.index', compact('kelas'));
    }

    public function kelasCreate()
    {  
        return view('class.create');
    }

    public function kelasStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Kelas::create($request->all());
        return redirect()->route('class.index');
    }

    public function kelasEdit($id){
        $kelas = Kelas::findOrFail($id);
        return view('class.kelasEdit', compact('kelas'));
    }

    public function kelasUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());
        return redirect()->route('class.index');
    }

    public function kelasDelete($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('class.index');
    }


}
