<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Dosen;

class KelasController extends Controller
{

    public function kelasIndex()
    {
        // Ambil semua kelas beserta mahasiswa yang terdaftar di masing-masing kelas
        $kelas = Kelas::with('dosen')->get();

        return view('class.index', compact('kelas'));
    }

    public function showKelas($id)
    {
        // $kelas = Kelas::find($id);
        // $mahasiswas = Mahasiswa::where('kelas_id', $id)->get();
        // $dosens = Dosen::where('kelas_id', $id)->get();

        // $mahasiswas = $kelas->mahasiswa;
        
        // dd($kelas->mahasiswas);        
        // return view('kaprodi.classDetail', compact('kelas', 'mahasiswas'));

        $kelas = Kelas::with('mahasiswa', 'dosen')->findOrFail($id);

        // Debugging to see what we get
        // dd($kelas->mahasiswas);
        $mahasiswas = Mahasiswa::where('kelas_id', $id)->get();
        $dosens = Dosen::where('kelas_id', $id)->get();
        $capacity = $kelas->jumlah;
        
        return view('kaprodi.classDetail', compact('kelas', 'mahasiswas', 'dosens', 'capacity'));
        
    }
    
    public function kelasCreate()
    {  
        $dosens = Dosen::all();
        return view('class.create', compact('dosens'));
    }

    public function kelasStore(Request $request)
    {
         // Validate the incoming request data
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'dosen_id' => 'nullable|exists:dosens,id',
        ]);

        // Create a new Kelas instance
        $kelas = Kelas::create([
            'nama' => $request->input('nama'),
            'jumlah' => $request->input('jumlah'),
        ]);

        // Assign dosen_id to the kelas
        if ($request->input('dosen_id')) {
            $dosen = Dosen::findOrFail($request->input('dosen_id'));
            $kelas->dosenWali()->associate($dosen);
            $kelas->save();
        }

        // Redirect back to the index route with a success message
        return redirect()->route('class.index')->with('success', 'Kelas created successfully!');
    }

    public function kelasEdit($id)
    {
        $kelas = Kelas::with('mahasiswa')->findOrFail($id);
        $dosens = Dosen::all();
        $kelasList = Kelas::all(); // For dropdown options
        $capacity = $kelas->jumlah;

        return view('class.edit', compact('kelas', 'dosens', 'kelasList', 'capacity'));
    }

    public function kelasUpdate(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'dosen_id' => 'nullable|exists:dosens,id',
        ]);

        // Find the Kelas model by ID
        $kelas = Kelas::findOrFail($id);

        // Update the Kelas model with validated data
        $kelas->update([
            'nama' => $request->input('nama'),
            'jumlah' => $request->input('jumlah'),
        ]);

        // Update the dosen's kelas_id
        if ($request->input('dosen_id')) {
            $dosen = Dosen::findOrFail($request->input('dosen_id'));

            // Unset the previous dosen's kelas_id if exists
            if ($kelas->dosen) {
                $kelas->dosen->update(['kelas_id' => null]);
            }

            // Set the new dosen's kelas_id
            $dosen->update(['kelas_id' => $kelas->id]);
        } else {
            // Set kelas_id to null for the current dosen of this class if no dosen_id is provided
            if ($kelas->dosen) {
                $kelas->dosen->update(['kelas_id' => null]);
            }
        }

        // Redirect back to the index route with a success message
        return redirect()->route('class.index')->with('success', 'Kelas updated successfully!');
    }

    public function kelasDelete($id)
    {
        // Find the Kelas record or fail
        $kelas = Kelas::findOrFail($id);

        // Update related Dosen records to nullify the kelas_id
        Dosen::where('kelas_id', $id)->update(['kelas_id' => null]);

        // Optionally, delete the Kelas record
        $kelas->delete();

        return redirect()->route('class.index');
    }

    // public function addStudent(Request $request, Kelas $kelas)
    // {
    //     $request->validate([
    //         'mahasiswa_id' => 'required|exists:mahasiswa,id',
    //     ]);

    //     if ($kelas->mahasiswa->count() < 10) {
    //         $kelas->mahasiswa()->attach($request->mahasiswa_id);
    //         return redirect()->route('kaprodi.class.show', $kelas)->with('success', 'Mahasiswa berhasil ditambahkan ke kelas');
    //     } else {
    //         return redirect()->route('kaprodi.class.show', $kelas)->with('error', 'Kelas sudah penuh');
    //     }
    // }

    // public function removeStudent(Kelas $kelas, $mahasiswaId)
    // {
    //     $kelas->mahasiswa()->detach($mahasiswaId);
    //     return redirect()->route('kaprodi.class.show', $kelas)->with('success', 'Mahasiswa berhasil dihapus dari kelas');
    // }
}

