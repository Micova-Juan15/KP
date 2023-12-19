@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Penjualan</h4>
            <form class="forms-sample" action="{{ route('penjualan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="idbarang">Barang</label>
                    <input type="text" class="form-control" name="idbarang" placeholder="Masukkan Barang"
                        value="{{ old('idbarang') }}">
                    @error('idbarang')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="idpenjual">id penjual</label>
                    <input type="text" class="form-control" name="idpenjual" placeholder="Masukkan Penjual"
                        value="{{ old('idpenjual') }}">
                    @error('idpenjual')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="idpenjualan">Penjualan</label>
                    <input type="text" class="form-control" name="idpenjualan" placeholder="Masukkan Penjualan"
                        value="{{ old('idpenjualan') }}">
                    @error('idpenjualan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" placeholder="Masukkan Jumlah"
                        value="{{ old('jumlah') }}">
                    @error('jumlah')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hargajual">Harga Jual</label>
                    <input type="number" class="form-control" name="hargajual" placeholder="Masukkan Harga Jual"
                        value="{{ old('hargajual') }}">
                    @error('hargajual')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-rounded btn-primary mr-2">Simpan</button>
                <a href="{{ route('penjualan.index') }}" class="btn btn-rounded btn-light">Batal</a>
            </form>
        </div>
    </div>
@endsection
