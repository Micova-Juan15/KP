@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Nama</h4>
            <form class="forms-sample" action="{{ route('sopir.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama </label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Sopir"
                        value="{{ old('nama') }}">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-rounded btn-primary mr-2">Simpan</button>
                <a href="{{ route('sopir.index') }}" class="btn btn-rounded btn-light">Batal</a>
            </form>
        </div>
    </div>
@endsection
