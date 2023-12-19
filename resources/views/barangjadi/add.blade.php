@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Barang</h4>
            <form class="forms-sample" action="{{ route('barangjadi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama barang</label>
                    <input type="text" class="form-control" name="nama" placeholder="Tambah Barang"
                        value="{{ old('barang') }}">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ukuran">Ukuran</label>
                    <input type="text" class="form-control" name="ukuran" placeholder="Tambah Ukuran"
                        value="{{ old('ukuran') }}">
                    @error('ukuran')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" placeholder="Tambah Jumlah"
                        value="{{ old('jumlah') }}">
                    @error('jumlah')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" placeholder="Tambah Harga"
                        value="{{ old('harga') }}">
                    @error('harga')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-rounded btn-primary mr-2">Simpan</button>
                <a href="{{ route('barangjadi.index') }}" class="btn btn-rounded btn-light">Batal</a>
            </form>
        </div>
    </div>
@endsection
