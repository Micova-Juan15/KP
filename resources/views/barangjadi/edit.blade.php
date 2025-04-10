@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Barang Jadi</h4>
            <form class="forms-sample" action="{{ route('barangjadi.update',['barangjadi'=>$barangjadi]) }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="nama">Nama barang</label>
                    <input type="text" class="form-control" name="nama" placeholder="Tambah Barang"
                        value="{{$barangjadi->nama }}">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ukuran">Ukuran</label>
                    <input type="text" class="form-control" name="ukuran" placeholder="Tambah Ukuran"
                        value="{{$barangjadi->ukuran}}">
                    @error('ukuran')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" placeholder="Tambah Jumlah"
                        value="{{$barangjadi->jumlah}}">
                    @error('jumlah')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" placeholder="Tambah Harga"
                        value="{{$barangjadi->harga}}">
                    @error('harga')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}
                <button type="submit" class="btn btn-rounded btn-primary mr-2">Simpan</button>
                <a href="{{ route('barangjadi.index') }}" class="btn btn-rounded btn-light">Batal</a>
            </form>
        </div>
    </div>
@endsection
