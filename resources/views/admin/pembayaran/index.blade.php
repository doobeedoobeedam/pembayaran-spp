@extends('../../template/dashboard')
@section('main')

@if (auth()->user()->role == 'petugas')
    <nav>
        <div class="nav nav-tabs mt-4" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-semua-pembayaran" data-bs-toggle="tab"
                data-bs-target="#semua-pembayaran" type="button" role="tab" aria-controls="semua-pembayaran"
                aria-selected="true">
                <span data-feather="inbox" class="me-2"></span>Semua Pembayaran
            </button>
            <button class="nav-link" id="nav-tambah-pembayaran-baru" data-bs-toggle="tab"
                data-bs-target="#tambah-pembayaran-baru" type="button" role="tab" aria-controls="tambah-pembayaran-baru"
                aria-selected="false">
                <span data-feather="plus-circle" class="me-2"></span>Tambah Pembayaran Baru
            </button>
        </div>
    </nav>
@endif

@if (auth()->user()->role == 'admin')
    <a href="/pembayaran/download" target="_BLANK" class="btn btn-primary mt-4">Download Laporan</a>
@endif

<div class="tab-content bg-white" id="nav-tabContent">
    <div class="tab-pane fade show active" id="semua-pembayaran" role="tabpanel" aria-labelledby="nav-semua-pembayaran">
        <div class="content pt-3">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Bayar Untuk Bulan</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Waktu Dibayar</th>
                            @if (auth()->user()->role == 'petugas')
                                <th scope="col">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pembayarans->count())
                        @foreach ($pembayarans as $pembayaran)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $pembayaran->siswa_id }}</td>
                            {{-- <td>{{ !empty($pembayaran->siswa->nisn) ? $pembayaran->siswa->nama:'-' }}</td> --}}
                            <td>{{ $pembayaran->bulan }}</td>
                            <td>{{ $pembayaran->spp->tahun }}</td>
                            <td>{{ $pembayaran->spp->nominal }}</td>
                            <td>{{ $pembayaran->created_at->isoFormat('dddd, D MMMM Y') }}</td>
                            @if (auth()->user()->role == 'petugas')                            
                            <td>
                                <a href="/pembayaran/{{ $pembayaran->id }}/edit" class="badge bg-warning">
                                    <span data-feather="edit-2"></span>
                                </a>
                                <form action="/pembayaran/{{ $pembayaran->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge bg-danger border-0"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <span data-feather="trash-2"></span>
                                    </button>
                                </form>
                            </td>
                            @endif
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
    <div class="tab-pane fade" id="tambah-pembayaran-baru" role="tabpanel" aria-labelledby="nav-tambah-pembayaran-baru">
        <div class="content bg-white pt-3">
            <div class="row">
                <div class="col-7">
                    <form action="/pembayaran" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="siswa_id" class="form-label">Siswa</label>
                            <select class="form-select" id="siswa_id" name="siswa_id">
                                <option value="">Pilih Siswa...</option>
                                @foreach ($siswas as $siswa)
                                <option value="{{ $siswa->nisn }}">{{ $siswa->nisn . ' | '. $siswa->nama }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Example invalid select feedback</div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="bulan" class="form-label">Bayar Untuk Bulan :</label>
                                <select class="form-select" id="bulan" name="bulan">
                                    <option value="">Pilih Bulan...</option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                                <div class="invalid-feedback">Example invalid select feedback</div>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="spp_id" class="form-label">Tahun & Nominal</label>
                                <select class="form-select" id="spp_id" name="spp_id">
                                    <option value="">Pilih SPP...</option>
                                    @foreach ($spps as $spp)
                                    <option value="{{ $spp->id }}">{{ $spp->tahun }} - {{ $spp->nominal }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Example invalid select feedback</div>
                            </div>
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