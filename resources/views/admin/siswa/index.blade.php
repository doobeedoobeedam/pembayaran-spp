@extends('../../template/dashboard')
@section('main')
<nav>
    <div class="nav nav-tabs mt-4" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-semua-siswa" data-bs-toggle="tab" data-bs-target="#semua-siswa" type="button"
            role="tab" aria-controls="semua-siswa" aria-selected="true">
            <span data-feather="inbox" class="me-2"></span>Semua Siswa
        </button>
        <button class="nav-link" id="nav-tambah-siswa-baru" data-bs-toggle="tab" data-bs-target="#tambah-siswa-baru" type="button"
            role="tab" aria-controls="tambah-siswa-baru" aria-selected="false">
            <span data-feather="plus-circle" class="me-2"></span>Tambah Siswa Baru
        </button>
    </div>
</nav>
<div class="tab-content bg-white" id="nav-tabContent">
    <div class="tab-pane fade show active" id="semua-siswa" role="tabpanel" aria-labelledby="nav-semua-siswa">
        <div class="content pt-3">
            <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NISN</th>
                                <th scope="col">NIS</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Telepon</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($siswas->count())
                            @foreach ($siswas as $siswa)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $siswa->nisn }}</td>
                                <td>{{ $siswa->nis }}</td>
                                <td>{{ $siswa->nama }}</td>
                                <td>{{ $siswa->kelas->nama_kelas . ' ' . $siswa->kelas->kompetensi_keahlian }}</td>
                                <td>{{ $siswa->no_telepon }}</td>
                                <td>{{ $siswa->alamat }}</td>
                                <td>
                                    <a href="/siswa/{{ $siswa->id }}/edit" class="badge bg-warning">
                                        <span data-feather="edit-2"></span>
                                    </a>
                                    <form action="/siswa/{{ $siswa->id }}" method="post" class="d-inline">
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
    <div class="tab-pane fade" id="tambah-siswa-baru" role="tabpanel" aria-labelledby="nav-tambah-siswa-baru">
        <div class="content bg-white pt-3">
            <div class="row">
                <div class="col-7">
                    <form action="/siswa" method="POST">
                        @csrf
                        <div class="row">    
                            <div class="col-6 mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                                    name="nisn" value="{{ old('nisn') }}" required>
                                @error('nisn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis"
                                    name="nis" value="{{ old('nis') }}" required>
                                @error('nis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="nama" class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    name="nama" value="{{ old('nama') }}" required>
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select class="form-select" id="kelas" name="kelas_id">
                                    <option value="">Pilih Kelas...</option>
                                    @foreach ($kelases as $kelas)
                                        <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas . ' '. $kelas->kompetensi_keahlian }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Example invalid select feedback</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="no_telepon" class="form-label">Telepon</label>
                            <input type="text" class="form-control @error('no_telepon') is-invalid @enderror"
                                id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}" required>
                            @error('no_telepon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                name="alamat" required></textarea>
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
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