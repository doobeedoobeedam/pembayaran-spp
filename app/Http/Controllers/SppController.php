<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index() {
        $spps = Spp::latest()->paginate(30);
        return view('admin/spp/index', compact('spps'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'tahun' => 'required',
            'nominal' => 'required'
        ]);

        Spp::create($data);
        return redirect('/spp')->with('status', 'SPP baru berhasil ditambahkan!');
    }

    public function edit($id) {
        return view('admin/spp/edit', [
            'spp' => Spp::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'tahun' => 'required',
            'nominal' => 'required'
        ]);

        Spp::where('id', $id)->update($data);
        return redirect('/spp')->with('status', 'Data berhasil diubah!');
    }

    public function destroy($id) {
        Spp::destroy($id);
        return redirect('/spp')->with('status', 'Data berhasil dihapus!');
    }
}
