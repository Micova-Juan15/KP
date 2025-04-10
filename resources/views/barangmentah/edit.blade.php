@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Barang Mentah</h4>
            <form class="forms-sample" action="{{ route('barangmentah.update',['barangmentah'=>$barangmentah]) }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="nama">Nama Barang </label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Barang"
                        value="{{$barangmentah->nama}}">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <input type="text" class="form-control" name="satuan" placeholder="Masukkan Satuan"
                        value="{{$barangmentah->satuan}}">
                    @error('satuan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" placeholder="Tambah Jumlah"
                        value="{{$barangmentah->jumlah}}">
                    @error('jumlah')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" placeholder="Tambah Harga"
                        value="{{$barangmentah->harga}}">
                    @error('harga')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}
        <button type="submit" class="btn btn-rounded btn-primary mr-2">Simpan</button>
        <a href="{{ route('barangmentah.index') }}" class="btn btn-rounded btn-light">Batal</a>
        </form>
    </div>
    </div>
@endsection
