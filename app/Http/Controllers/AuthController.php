<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    public function login() {
        return view('auth/login');
    }

    public function autentikasi(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(auth()->user()->role == 'siswa') {
                return redirect()->intended('/dashboard/siswa');
            } else {
                return redirect()->intended('/dashboard');
            }
        }

        return back()->withErrors([
            'username' => 'Username tidak tersedia pada sistem kami.',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register() {
        return view('auth/register');
    }

    public function registrasi(Request $request) {
        $data = $request->validate([
            'nama' => 'required',
            'username' => 'required|min:5|unique:users',
            'password' => 'required'
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);
        $request->session()->flash('status', 'Registrasi berhasil, silahkan login!');

        return redirect('/login');
    }
}
