@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Bahan Mentah</h4>
            <div class="table-responsive">
                @can('create', App\Models\Barangmentah::class)
                    <a href="{{ route('barangmentah.create') }}" type="button"
                        class="btn btn-primary btn-rounded btn-fw">Tambah List Item Baru</a>
                @endcan
                @if (Session::get('success'))
                    <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
                @endif
                <table id="datatable" class="table table-striped">
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
                                Harga Satuan
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangmentah as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td>{{ number_format( $item->jumlah,1) }}</td>
                                <td>{{ number_format( $item->harga,0) }}</td>
                                <td>
                                    <div class="d-flex gap-10">
                                        @can('update', App\Models\Barangmentah::class)
                                            <a href="{{ route('barangmentah.edit', ['barangmentah' => $item]) }}" type="button"
                                                class="btn btn-primary btn-rounded btn-fw mr-3">Edit</a>
                                        @endcan
                                        @can('delete', App\Models\Barangmentah::class)
                                            <form action="{{ route('barangmentah.destroy', ['barangmentah' => $item]) }}"
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
