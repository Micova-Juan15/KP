@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Pembeli</h4>
            <form class="forms-sample" action="{{ route('pembeli.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Pembeli</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Pembeli"
                        value="{{ old('nama') }}">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat"
                        value="{{ old('alamat') }}">
                    @error('alamat')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hp">HP</label>
                    <input type="tel" class="form-control" name="hp" placeholder="Masukkan Nomor HP" 
                        value="{{ old('hp') }}">
                    @error('hp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-rounded btn-primary mr-2">Simpan</button>
                <a href="{{ route('pembeli.index') }}" class="btn btn-rounded btn-light">Batal</a>
            </form>
        </div>
    </div>
@endsection
