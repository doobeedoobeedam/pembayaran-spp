<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index() {
        $kelass = Kelas::latest()->paginate(30);
        return view('admin/kelas/index', compact('kelass'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required'
        ]);

        Kelas::create($data);
        return redirect('/kelas')->with('status', 'Kelas baru berhasil ditambahkan!');
    }

    public function edit($id) {
        return view('admin/kelas/edit', [
            'kelas' => Kelas::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required'
        ]);

        Kelas::where('id', $id)->update($data);
        return redirect('/kelas')->with('status', 'Data berhasil diubah!');
    }

    public function destroy($id) {
        Kelas::destroy($id);
        return redirect('/kelas')->with('status', 'Data berhasil dihapus!');
    }
}
