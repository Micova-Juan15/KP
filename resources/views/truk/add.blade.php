@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Truk</h4>
            <form class="forms-sample" action="{{ route('truk.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="plat">Plat Kendaraan</label>
                    <input type="text" class="form-control" name="plat" placeholder="Plat kendaraan "
                        value="{{ old('plat') }}">
                    @error('plat')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-rounded btn-primary mr-2">Simpan</button>
                <a href="{{ route('truk.index') }}" class="btn btn-rounded btn-light">Batal</a>
            </form>
        </div>
    </div>
@endsection
