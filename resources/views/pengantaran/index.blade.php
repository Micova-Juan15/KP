@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Pengantaran</h4>
            <div class="table-responsive">
                    <a href="{{ route('pengantaran.create') }}" type="button" class="btn btn-primary btn-rounded btn-fw">Tambah</a>
                @if (Session::get('success'))
                    <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
                @endif
                <table id ="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                idpenjualan
                            </th>
                            <th>
                                Tanggal
                            </th>
                            <th>
                                Nama Sopir
                            </th>
                            <th>
                                Plat kendaraan
                            </th>
                            <th>
                                Alamat
                            </th>
                    </thead>
                    <tbody>
                        @foreach ($pengantaran as $item)
                            <tr>
                                <td>{{ $item->penjualan->idnota }}</td>

                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->sopir->nama }}</td>
                                <td>{{ $item->truk->plat}}</td>
                                <td>{{ $item->penjualan->pembeli->alamat}}</td>
                                
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
