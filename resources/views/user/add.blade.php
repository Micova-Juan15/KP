@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Nama</h4>
            <form class="forms-sample" action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="" for="nama"> Nama</label>
                    <br>
                    <input type="text" name="nama" id="">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" placeholder="Masukkan Tanggal"
                        value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <br>
                    <input type="email" name="email" id="">
                    <input type="password" name="password" id="">
                </div>
                <div class="form-group">
                    <select name="jabatan" id=""></select>
                    <br>
                </div>
                <button type="submit" class="btn btn-rounded btn-primary mr-2">Simpan</button>
                <a href="{{ route('user.index') }}" class="btn btn-rounded btn-light">Batal</a>
            </form>
        </div>
    </div>
@endsection
