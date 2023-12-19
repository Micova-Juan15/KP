@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Pengantaran</h4>
            <form class="forms-sample" action="{{ route('pengantaran.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" placeholder="Masukkan Tanggal"
                        value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="idpenjualan">id penjualan</label>
                    <input type="text" class="form-control" name="idpenjualan" placeholder="id penjualan"
                        value="{{ old('idpenjualan') }}">
                    @error('idpenjualan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="idsopir">id sopir</label>
                    <input type="text" class="form-control" name="idsopir" placeholder="id sopir"
                        value="{{ old('idsopir') }}">
                    @error('idsopir')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="idtruk">id truk</label>
                    <input type="text" class="form-control" name="idtruk" placeholder="id truk"
                        value="{{ old('idtruk') }}">
                    @error('idtruk')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-rounded btn-primary mr-2">Simpan</button>
                <a href="{{ route('pengantaran.index') }}" class="btn btn-rounded btn-light">Batal</a>
            </form>
        </div>
    </div>
@endsection
