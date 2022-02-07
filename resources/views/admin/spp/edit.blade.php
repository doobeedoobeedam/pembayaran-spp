@extends('../../template/dashboard')
@section('main')

<div class="content bg-white p-4">
    <div class="row">
        <div class="col-7">
            <form action="/spp/{{ $spp->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun"
                        value="{{ old('tahun', $spp->tahun) }}" required>
                    @error('tahun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nominal" class="form-label">Nominal</label>
                    <input type="text" class="form-control @error('nominal') is-invalid @enderror" id="nominal"
                        name="nominal" value="{{ old('nominal', $spp->nominal) }}" required>
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
@endsection