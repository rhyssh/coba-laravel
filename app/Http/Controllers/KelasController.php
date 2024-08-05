<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{

    public function kelasIndex()
    {
        // Ambil semua kelas beserta mahasiswa yang terdaftar di masing-masing kelas
        $kelas = Kelas::with('dosen')->get();
        $mahasiswas = Mahasiswa::whereNull( 'kelas_id' )->get();
        $dosens = Dosen::doesntHave( 'kelas' )->get();

        // Kembalikan view dengan data kelas dan mahasiswas
        return view('class.index', compact('kelas', 'mahasiswas', 'dosens'));
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
        $kelas = Kelas::all();
        $dosens = Dosen::doesntHave('kelas')->get();
        $mahasiswas = Mahasiswa::whereNull('kelas_id')->get();
        $selectedMahasiswa = session('selectedMahasiswa', []);

        return view('class.create', compact('kelas', 'dosens', 'mahasiswas', 'selectedMahasiswa'));
    }

    public function kelasStore(Request $request)
    {
        // Validate request data
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'dosen_id' => 'nullable|exists:dosens,id',
            'mahasiswas' => 'array',
            'mahasiswas.*' => 'exists:mahasiswas,id',
        ]);

        // Get the number of mahasiswa to be added
        $mahasiswaIds = $request->input('mahasiswas', []);
        $numberOfMahasiswa = count($mahasiswaIds);

        // Check if the number of mahasiswa exceeds the class capacity
        if ($numberOfMahasiswa > $request->input('jumlah')) {
            return redirect()->back()->withErrors([
                'mahasiswas' => 'Jumlah mahasiswa yang didaftarkan tidak boleh melebihi kapasitas kelas.'
            ])->withInput();
        }

        // Create Kelas
        $kelas = Kelas::create([
            'nama' => $request->input('nama'),
            'jumlah' => $request->input('jumlah'),
            'dosen_id' => $request->input('dosen_id') ?: null,
        ]);

        // Assign Mahasiswa to Kelas
        if ($numberOfMahasiswa > 0) {
            Mahasiswa::whereIn('id', $mahasiswaIds)->update(['kelas_id' => $kelas->id]);
        }

        return redirect()->route('class.index')->with('success', 'Kelas berhasil dibuat!');
    }

    // public function addStudent(Request $request)
    // {
    //     $mahasiswaId = $request->input('mahasiswa_id');
    //     $selectedMahasiswa = session('selectedMahasiswa', []);
        
    //     if (!in_array($mahasiswaId, $selectedMahasiswa)) {
    //         $selectedMahasiswa[] = $mahasiswaId;
    //         session(['selectedMahasiswa' => $selectedMahasiswa]);
    //     }

    //     return redirect()->route('kaprodi.class.create');
    // }

    // public function removeStudent($mahasiswaId)
    // {   
    //     $selectedMahasiswa = session('selectedMahasiswa', []);
    //     if (($key = array_search($mahasiswaId, $selectedMahasiswa)) !== false) {
    //         unset($selectedMahasiswa[$key]);
    //         session(['selectedMahasiswa' => $selectedMahasiswa]);
    //     }

    //     return redirect()->route('kaprodi.class.create');
    // }

    public function kelasEdit($id)
    {
        $kelas = Kelas::with('mahasiswa')->findOrFail($id);
        $dosens = Dosen::all();
        $kelasList = Kelas::all(); // For dropdown options
        $mahasiswas = Mahasiswa::whereNull('kelas_id')->get();
        $capacity = $kelas->jumlah;
        $mahasiswas = Mahasiswa::whereNull('kelas_id')
            ->orWhere('kelas_id', $kelas->id)
            ->get();

        return view('class.edit', compact('kelas', 'dosens', 'kelasList', 'capacity', 'mahasiswas'));
    }

    public function kelasUpdate(Request $request, $id)
    {
            // Validate request data
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'dosen_id' => 'nullable|exists:dosens,id',
            'mahasiswas' => 'array',
            'mahasiswas.*' => 'exists:mahasiswas,id',
        ]);

        // Get the number of mahasiswa to be added
        $mahasiswaIds = $request->input('mahasiswas', []);
        $numberOfMahasiswa = count($mahasiswaIds);

        // Check if the number of mahasiswa exceeds the class capacity
        if ($numberOfMahasiswa > $request->input('jumlah')) {
            return redirect()->back()->withErrors([
                'mahasiswas' => 'Jumlah mahasiswa yang didaftarkan tidak boleh melebihi kapasitas kelas.'
            ])->withInput();
        }

        // Update Kelas
        $kelas = Kelas::findOrFail($id);
        $kelas->update([
            'nama' => $request->input('nama'),
            'jumlah' => $request->input('jumlah'),
            'dosen_id' => $request->input('dosen_id') ?: null,
        ]);

        // Assign Mahasiswa to Kelas
        Mahasiswa::whereIn('id', $mahasiswaIds)->update(['kelas_id' => $kelas->id]);

        // Remove mahasiswa not selected
        Mahasiswa::where('kelas_id', $kelas->id)
                ->whereNotIn('id', $mahasiswaIds)
                ->update(['kelas_id' => null]);

        return redirect()->route('class.index')->with('success', 'Kelas updated successfully.');
    }

    public function kelasDelete($id)
    {
        // Find the Kelas record or fail
        $kelas = Kelas::findOrFail($id);

        // Update related Dosen records to nullify the kelas_id
        Dosen::where('kelas_id', $id)->update(['kelas_id' => null]);
        Mahasiswa::where('kelas_id', $id)->update(['kelas_id' => null]);

        // Optionally, delete the Kelas record
        $kelas->delete();

        return redirect()->route('class.index');
    }

}

