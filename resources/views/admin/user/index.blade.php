@extends('../../template/dashboard')
@section('main')
<nav>
    <div class="nav nav-tabs mt-4" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-semua-user" data-bs-toggle="tab" data-bs-target="#semua-user" type="button"
            role="tab" aria-controls="semua-user" aria-selected="true">
            <span data-feather="inbox" class="me-2"></span>Semua User
        </button>
        <button class="nav-link" id="nav-tambah-user-baru" data-bs-toggle="tab" data-bs-target="#tambah-user-baru" type="button"
            role="tab" aria-controls="tambah-user-baru" aria-selected="false">
            <span data-feather="plus-circle" class="me-2"></span>Tambah User Baru
        </button>
    </div>
</nav>
<div class="tab-content bg-white" id="nav-tabContent">
    <div class="tab-pane fade show active" id="semua-user" role="tabpanel" aria-labelledby="nav-semua-user">
        <div class="content pt-3">
            <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Role</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->count())
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->password }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href="/user/{{ $user->id }}/edit" class="badge bg-warning">
                                        <span data-feather="edit-2"></span>
                                    </a>
                                    <form action="/user/{{ $user->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <span data-feather="trash-2"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="9" class="text-center">Data belum tersedia.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    <div class="tab-pane fade" id="tambah-user-baru" role="tabpanel" aria-labelledby="nav-tambah-user-baru">
        <div class="content bg-white pt-3">
            <div class="row">
                <div class="col-7">
                    <form action="/user" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama User</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                                name="username" value="{{ old('username') }}" required>
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                name="password" value="{{ old('password') }}" required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role">
                                <option value="">Pilih Role...</option>
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
    </div>
</div>
@endsection