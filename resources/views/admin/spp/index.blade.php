@extends('../../template/dashboard')
@section('main')
<nav>
    <div class="nav nav-tabs mt-4" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-semua-spp" data-bs-toggle="tab" data-bs-target="#semua-spp" type="button"
            role="tab" aria-controls="semua-spp" aria-selected="true">
            <span data-feather="inbox" class="me-2"></span>Semua SPP
        </button>
        <button class="nav-link" id="nav-tambah-spp-baru" data-bs-toggle="tab" data-bs-target="#tambah-spp-baru" type="button"
            role="tab" aria-controls="tambah-spp-baru" aria-selected="false">
            <span data-feather="plus-circle" class="me-2"></span>Tambah SPP Baru
        </button>
    </div>
</nav>
<div class="tab-content bg-white" id="nav-tabContent">
    <div class="tab-pane fade show active" id="semua-spp" role="tabpanel" aria-labelledby="nav-semua-spp">
        <div class="content pt-3">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($spps->count())
                        @foreach ($spps as $spp)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $spp->tahun }}</td>
                            <td>{{ $spp->nominal }}</td>
                            <td>
                                <a href="/spp/{{ $spp->id }}/edit" class="badge bg-warning">
                                    <span data-feather="edit-2"></span>
                                </a>
                                <form action="/spp/{{ $spp->id }}" method="post" class="d-inline">
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
    <div class="tab-pane fade" id="tambah-spp-baru" role="tabpanel" aria-labelledby="nav-tambah-spp-baru">
        <div class="content bg-white pt-3">
            <div class="row">
                <div class="col-7">
                    <form action="/spp" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun"
                                name="tahun" value="{{ old('tahun') }}" required>
                            @error('tahun')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="text" class="form-control @error('nominal') is-invalid @enderror"
                                id="nominal" name="nominal" value="{{ old('nominal') }}" required>
                            @error('nominal')
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