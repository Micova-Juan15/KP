@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Pembelian</h4>
            <div class="table-responsive">
                <a href="{{ route('pembelian.create') }}" type="button" class="btn btn-primary btn-rounded btn-fw">Tambah</a>

                @if (Session::get('success'))
                    <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Nama PT
                            </th>
                            <th>
                                Tanggal
                            </th>
                            <th>
                                No.Nota
                            </th>
                            <th>
                                harga beli
                            </th>
                            <th>
                                Total Harga
                            </th>
                            <th>
                                Potongan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembelian as $item)
                            <tr>
                                <td>{{ $item->idpembeli }}</td>
                                <td>{{ $item->idpembelian }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->hargabeli }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
