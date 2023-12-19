@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Nama</h4>
            <form class="forms-sample" action="{{ route('sopir.update',['sopir'=>$sopir]) }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="nama">Nama </label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Sopir"
                        value="{{$sopir->nama}}">
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
