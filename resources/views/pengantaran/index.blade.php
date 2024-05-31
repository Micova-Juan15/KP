@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Pengantaran</h4>
            <div class="table-responsive">
                {{-- <a href="{{ route('pengantaran.create') }}" type="button" class="btn btn-primary btn-rounded btn-fw"
                    style="margin-bottom: 10px">Tambah</a> --}}
                @if (Session::get('success'))
                    <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
                @endif

                <table id ="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>
                                No. Nota
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
                            <th>
                                Status
                            </th>
                            <th></th>
                    </thead>
                    <tbody>
                        @foreach ($pengantaran as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $item->penjualan->idnota }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->sopir->nama }}</td>
                                <td>{{ $item->truk->plat }}</td>
                                <td>{{ $item->penjualan->pembeli->alamat }}</td>
                                <td>
                                    <form action="{{ route('pengantaran.selesaikan', ['pengantaran' => $item]) }}"
                                        method="post">
                                        @csrf
                                        @if ($item->status)
                                            <div>
                                                Selesai
                                            </div>
                                        @else
                                        <button class="btn btn-primary btn-rounded btn-fw mr-3">
                                            Selesaikan
                                        </button>
                                        @endif
                                    </form>
                                </td>
                                <td>
                                    <div class="d-flex gap-10">
                                        <a href="{{ route('pengantaran.cetak', ['pengantaran' => $item]) }}" type="button"
                                            class="btn btn-primary btn-rounded btn-fw mr-3">Print</a>
                                    @can('update', App\Models\Pengantaran::class)
                                            <a href="{{ route('pengantaran.edit', ['pengantaran' => $item]) }}" type="button"
                                                class="btn btn-primary btn-rounded btn-fw mr-3">Edit</a>
                                        @endcan
                                        @can('delete', App\Models\Pengantaran::class)
                                            <form action="{{ route('pengantaran.destroy', ['pengantaran' => $item]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-primary btn-rounded btn-fw">Delete</button>
                                            </form>
                                        @endcan
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
