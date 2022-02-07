@extends('../../template/dashboard')
@section('main')

<div class="content bg-white p-4">
    <div class="row">
        <div class="col-7">
            <form action="/siswa/{{ $siswa->id }}" method="POST">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                            name="nisn" value="{{ old('nisn', $siswa->nisn) }}" required>
                        @error('nisn')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis"
                            value="{{ old('nis', $siswa->nis) }}" required>
                        @error('nis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                            value="{{ old('nama', $siswa->nama) }}" required>
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="kelas" class="form-label">Nama Lengkap</label>
                        <select class="form-select" id="kelas" name="kelas_id">
                            <option value="">Pilih Kelas...</option>
                            @foreach ($kelases as $kelas)
                            @if (old('kelas_id', $siswa->kelas_id) == $kelas->id)                                
                                <option value="{{ $kelas->id }}" selected>{{ $kelas->nama_kelas . ' '. $kelas->kompetensi_keahlian }}</option>
                            @endif
                                <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas . ' '. $kelas->kompetensi_keahlian }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon"
                        name="no_telepon" value="{{ old('no_telepon', $siswa->no_telepon) }}" required>
                    @error('no_telepon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                        required>{{ $siswa->alamat }}</textarea>
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
@endsection