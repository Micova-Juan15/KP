@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Penjualan</h4>
            <div class="table-responsive">
                <a href="{{ route('penjualan.create') }}" type="button" class="btn btn-primary btn-rounded btn-fw"
                    style="margin-bottom: 10px">Tambah</a>
                @if (Session::get('success'))
                    <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
                @endif
                @if (Session::get('warning'))
                    <div class="alert alert-warning mt-3">{{ Session::get('warning') }}</div>
                @endif
                <table id ="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
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
                            <th>

                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $item->pembeli->nama }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->idnota }}</td>
                                <td>{{$item->pengantaran->ongkir?? '0'}} </td>
                                <td>{{ number_format($item->potongan,0) }}</td>
                                <td>{{ number_format($item->totalharga,0) }}</td>
                                <td>
                                    <div class="d-flex gap-10">
                                        @can('update', App\Models\Penjualan::class)
                                            <a href="{{ route('penjualan.edit', ['penjualan' => $item]) }}" type="button"
                                                class="btn btn-primary btn-rounded btn-fw mr-3">Edit</a>
                                        @endcan
                                        @can('delete', App\Models\Penjualan::class)
                                            <form action="{{ route('penjualan.destroy', ['penjualan' => $item]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-primary btn-rounded btn-fw">Delete</button>
                                            </form>
                                        @endcan
                                    </div>
                                <td>
                                    <a href="{{ route('penjualan.show', ['penjualan' => $item]) }}">
                                        <button class="btn btn-primary btn-rounded btn-fw" type="button">
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
