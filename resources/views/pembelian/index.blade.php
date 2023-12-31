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
                <table id ="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Penjual
                            </th>
                            <th>
                                Tanggal
                            </th>
                            <th>
                                No.Nota
                            </th>
                            <th>
                                Harga Beli
                            </th>
                            <th>
                                Ongkir
                            </th>
                            <th>
                                Potongan
                            </th>
                            <th>

                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembelian as $item)
                            <tr>
                                <td>{{ $item->penjual->nama }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->idnota }}</td>
                                <td>{{ $item->totalharga }}</td>
                                <td>{{ $item->ongkir }}</td>
                                <td>{{ $item->potongan }}</td>
                                <td>
                                    <div class="d-flex gap-10">
                                    <a href="{{ route('pembelian.edit',['pembelian'=>$item])}}" type="button" class="btn btn-primary btn-rounded btn-fw mr-3">Edit</a>
                                    <form action="{{ route('pembelian.destroy',['pembelian'=>$item])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary btn-rounded btn-fw">Delete</button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
