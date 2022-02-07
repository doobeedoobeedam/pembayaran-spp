@extends('../../template/dashboard')
@section('main')

<div class="content bg-white p-4">
    <div class="row">
        <div class="col-7">
            <form action="/user/{{ $user->id }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama User</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                        value="{{ old('nama', $user->nama) }}" required>                        
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                        value="{{ old('username', $user->username) }}" required>                        
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                        value="{{ old('password', $user->password) }}" required>                        
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" id="role" name="role">
                        <option value="{{ old('role', $user->role) }}">{{ $user->role }}</option>
                        <option value="admin">admin</option>
                        <option value="petugas">petugas</option>
                        <option value="siswa">siswa</option>
                    </select>
                    <div class="invalid-feedback">Example invalid select feedback</div>
                </div>
                <button type="submit" class="btn btn-primary">
                    <span data-feather="save" class="me-2"></span>Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection