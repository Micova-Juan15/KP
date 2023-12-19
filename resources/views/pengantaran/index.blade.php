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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                idpenjualan
                            </th>
                            <th>
                                tanggal
                            </th>
                            <th>
                                Nama Sopir
                            </th>
                            <th>
                                Plat kendaraa
                            </th>
                    </thead>
                    <tbody>
                        @foreach ($pengantaran as $item)
                            <tr>
                                <td>{{ $item->idpenjualan }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->idsopir }}</td>
                                <td>{{ $item->idmobil }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
