@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Nama User</h4>
            <form class="forms-sample" action="{{ route('user.update',['user'=>$user]) }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label class="" for="name">Nama</label>
                    <br>
                    <input class="form-control" type="text" name="name" id="" placeholder="Masukkan Nama User"
                        value="{{$user->name}}">
                    
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <br>
                    <input class="form-control" type="email" name="email" id="" placeholder="Masukkan Email"
                        value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <br>
                    <input class="form-control" type="password" name="password" id="" placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                    <label  for="jabatan">Jabatan</label>
                    <br>
                    <select class="form-control" name="jabatan" id="">
                        <option {{($user->jabatan=='Manager') ?'selected' :''}} value="Manager">
                            Manager
                        </option>
                        <option {{($user->jabatan=='Karyawan') ?'selected' :''}} value="Karyawan">
                            Karyawan
                        </option>
                    </select>
                    <br>
                </div>
                <button type="submit" class="btn btn-rounded btn-primary mr-2">Simpan</button>
                <a href="{{ route('user.index') }}" class="btn btn-rounded btn-light">Batal</a>
            </form>
        </div>
    </div>
@endsection
