@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Jumlah Produk</h4>
            <form class="forms-sample" action="{{ route('barangjadi.tambahbarangjadi') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Produk :</label>
                    <select name="idbarangjadi" id="" class="form-control">
                        @foreach ($barangjadi as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->nama }}
                                ({{ $item->ukuran }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah :</label>
                    <input type="number" name="jumlah" placeholder="Masukkan Jumlah Yang Dibuat" class="form-control">
                </div>
                <button type="submit" class="btn btn-rounded btn-primary mr-2">Simpan</button>
                <a href="{{ route('barangjadi.index') }}" class="btn btn-rounded btn-light">Batal</a>

        </div>
    </div>
@endsection
