@extends('../../template/dashboard')
@section('main')
<nav>
    <div class="nav nav-tabs mt-4" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-semua-kelas" data-bs-toggle="tab" data-bs-target="#semua-kelas" type="button"
            role="tab" aria-controls="semua-kelas" aria-selected="true">
            <span data-feather="inbox" class="me-2"></span>Semua Kelas
        </button>
        <button class="nav-link" id="nav-tambah-kelas-baru" data-bs-toggle="tab" data-bs-target="#tambah-kelas-baru" type="button"
            role="tab" aria-controls="tambah-kelas-baru" aria-selected="false">
            <span data-feather="plus-circle" class="me-2"></span>Tambah Kelas Baru
        </button>
    </div>
</nav>
<div class="tab-content bg-white" id="nav-tabContent">
    <div class="tab-pane fade show active" id="semua-kelas" role="tabpanel" aria-labelledby="nav-semua-kelas">
        <div class="content pt-3">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Kompetensi Keahlian</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($kelass->count())
                        @foreach ($kelass as $kelas)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $kelas->nama_kelas }}</td>
                            <td>{{ $kelas->kompetensi_keahlian }}</td>
                            <td>
                                <a href="/kelas/{{ $kelas->id }}/edit" class="badge bg-warning">
                                    <span data-feather="edit-2"></span>
                                </a>
                                <form action="/kelas/{{ $kelas->id }}" method="post" class="d-inline">
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
    <div class="tab-pane fade" id="tambah-kelas-baru" role="tabpanel" aria-labelledby="nav-tambah-kelas-baru">
        <div class="content bg-white pt-3">
            <div class="row">
                <div class="col-7">
                    <form action="/kelas" method="POST">
                        @csrf                              
                        <div class="mb-3">
                            <label for="nama_kelas" class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas"
                                name="nama_kelas" value="{{ old('nama_kelas') }}" required>
                            @error('nama_kelas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kompetensi_keahlian" class="form-label">Kompetensi Keahlian</label>
                            <input type="text" class="form-control @error('kompetensi_keahlian') is-invalid @enderror"
                                id="kompetensi_keahlian" name="kompetensi_keahlian" value="{{ old('kompetensi_keahlian') }}" required>
                            @error('kompetensi_keahlian')
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