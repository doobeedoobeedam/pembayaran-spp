<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        return view('admin/user/index', [
            'users' => User::all()
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nama' => 'required',
            'username' => 'required|min:5|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect('/user')->with('status', 'User baru berhasil ditambahkan!');
    }

    public function edit(User $user) {
        return view('admin/user/edit', [
            'user' => $user
        ]);
    }

    public function destroy($id) {
        User::destroy($id);
        return redirect('/user')->with('status', 'Data berhasil dihapus!');
    }
}
