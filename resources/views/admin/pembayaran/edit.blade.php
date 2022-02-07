@extends('../../template/dashboard')
@section('main')
<div class="content bg-white p-4">
    <div class="row">
        <div class="col-7">
            <form action="/pembayaran/{{ $pembayaran->id }}" method="POST">
                @method('put')
                @csrf
            
                <button type="submit" class="btn btn-primary">
                    <span data-feather="save" class="me-2"></span>Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection