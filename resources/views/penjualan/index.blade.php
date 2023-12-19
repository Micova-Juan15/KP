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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                idbarang
                            </th>
                            <th>
                                idpenjual
                            </th>
                            <th>
                                idpenjualan
                            </th>
                            <th>
                                jumlah
                            </th>
                            <th>
                                hargajual
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan as $item)
                            <tr>
                                <td>{{ $item->idbarang }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->hargajual }}</td>
                                <td>{{ $item->idpenjualan }}</td>
                                <td>{{ $item->idpenjual }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
