@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Barang</h4>
            <div class="table-responsive">
                <a href="{{ route('barangmentah.create') }}" type="button" class="btn btn-primary btn-rounded btn-fw">Tambah</a>

                @if (Session::get('success'))
                    <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Nama
                            </th>
                            <th>
                                Satuan 
                            </th>
                            <th>
                                Jumlah
                            </th>
                            <th> 
                                Harga
                            </th>
                            <th>
                                edit
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangmentah as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>
                                    <a href="{{ route('barangmentah.edit',['barangmentah'=>$item])}}" type="button" class="btn btn-primary btn-rounded btn-fw">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
