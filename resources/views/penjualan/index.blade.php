@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Penjualan</h4>
            <div class="table-responsive">
                <a href="{{ route('penjualan.create') }}" type="button" class="btn btn-primary btn-rounded btn-fw">Tambah</a>
                @if (Session::get('success'))
                    <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
                @endif
                <table id ="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Pembeli
                            </th>
                            <th>
                                Tanggal
                            </th>
                            <th>
                                No.Nota
                            </th>
                            <th>
                                Ongkir
                            </th>
                            <th>
                                Potongan
                            </th>
                            <th>
                                Total Harga
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan as $item)
                            <tr>
                                <td>{{ $item->pembeli->nama }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->idnota }}</td>
                                <td>{{ $item->ongkir }}</td>
                                <td>{{ $item->potongan }}</td>
                                <td>{{ $item->totalharga }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
