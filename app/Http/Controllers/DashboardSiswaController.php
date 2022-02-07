<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardSiswaController extends Controller {
    public function index() {
        return view('admin/dashboard-siswa/index', [
            'pembayarans' => Pembayaran::where('siswa_id', auth()->user()->username)->get(),
            'siswas' => Siswa::where('nisn',  auth()->user()->username)->get()
        ]);
    }
}
