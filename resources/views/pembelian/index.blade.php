@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Pembelian</h4>
            <div class="table-responsive">
                <a href="{{ route('pembelian.create') }}" type="button" class="btn btn-primary btn-rounded btn-fw" style="margin-bottom: 10px">Tambah</a>
                @if (Session::get('success'))
                    <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
                @endif
                <table id ="datatable" class="table table-striped" >
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
                                Ongkir
                            </th>
                            <th>
                                Potongan
                            </th>
                            <th>
                                Harga Beli
                            </th>
                            <th>

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
                                <td>{{ number_format($item->ongkir),0 }}</td>
                                <td>{{ number_format($item->potongan),0 }}</td>
                                <td>{{ number_format($item->totalharga),0 }}</td>
                                <td>
                                    <div class="d-flex gap-10">
                                        @can('update', App\Models\Pembelian::class)
                                    <a href="{{ route('pembelian.edit',['pembelian'=>$item])}}" type="button" class="btn btn-primary btn-rounded btn-fw mr-3">Edit</a>
                                    @endcan
                                    @can('delete', App\Models\Pembelian::class)
                                    <form action="{{ route('pembelian.destroy',['pembelian'=>$item])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary btn-rounded btn-fw">Delete</button>
                                    </form>
                                    @endcan
                                    </div>
                                </td>
                                <td>
                                    <a href="{{route('pembelian.show',['pembelian'=>$item])}}">
                                        <button class="btn btn-primary btn-rounded btn-fw" type="button" >
                                            Detail
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
