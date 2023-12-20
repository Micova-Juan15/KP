@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Barang Mentah</h4>
            <form class="forms-sample" action="{{ route('user.update',['user'=>$user]) }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="nama">Nama Barang </label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Barang"
                        value="{{$user->nama}}">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <input type="text" class="form-control" name="satuan" placeholder="Masukkan Satuan"
                        value="{{$user->satuan}}">
                    @error('satuan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" placeholder="Tambah Jumlah"
                        value="{{$user->jumlah}}">
                    @error('jumlah')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" placeholder="Tambah Harga"
                        value="{{$user->harga}}">
                    @error('harga')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        <button type="submit" class="btn btn-rounded btn-primary mr-2">Simpan</button>
        <a href="{{ route('user.index') }}" class="btn btn-rounded btn-light">Batal</a>
        </form>
    </div>
    </div>
@endsection
