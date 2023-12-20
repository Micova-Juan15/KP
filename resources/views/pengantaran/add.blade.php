@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Pengantaran</h4>
            <form class="forms-sample" action="{{ route('pengantaran.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="" for="idpenjualan"> Nomor Penjualan</label>
                    <br>
                    <select class="form-control" name="idpenjualan" id=" ">
                        @foreach ($penjualan as $item)
                        <option value="{{$item->id }}">
                        {{$item->idnota}} ({{$item->tanggal}})
                        </option>
                        @endforeach
                    </select>

                    @error('idpenjualan')
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
                    <label for="idsopir">Nama Sopir</label>
                    <br>
                    <select class="form-control" name="idsopir" id=" ">
                        @foreach ($sopir as $item)
                        <option value="{{$item->id }}">
                        {{$item->nama}}
                        </option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="idtruk">Plat Kendaraan</label>
                    <br>
                    <select class="form-control" name="idtruk" id=" ">
                        @foreach ($truk as $item)
                        <option value="{{$item->id }}">
                        {{$item->plat}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-rounded btn-primary mr-2">Simpan</button>
                <a href="{{ route('pengantaran.index') }}" class="btn btn-rounded btn-light">Batal</a>
            </form>
        </div>
    </div>
@endsection
