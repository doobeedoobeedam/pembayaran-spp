<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Spp;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function index() {
        $siswas = Siswa::all();
        return view('admin/siswa/index', [
            'siswas' => $siswas,
            'kelases' => Kelas::all()
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nisn' => 'required|unique:siswas|max:10',
            'nis' => 'required|max:8',
            'nama' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'kelas_id' => 'required'
        ]);

        Siswa::create($data);
        return redirect('/siswa')->with('status', 'Siswa baru berhasil ditambahkan!');
    }

    public function edit(Siswa $siswa) {
        return view('admin/siswa/edit', [
            'siswa' => $siswa,
            'kelases' => Kelas::all(),
            'spps' => Spp::all()
        ]);
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'nisn' => 'required|max:10',
            'nis' => 'required|max:8',
            'nama' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'kelas_id' => 'required'
        ]);

        Siswa::where('id', $id)->update($data);
        return redirect('/siswa')->with('status', 'Data berhasil diubah!');
    }

    public function destroy($id) {
        Siswa::destroy($id);
        return redirect('/siswa')->with('status', 'Data berhasil dihapus!');
    }
}