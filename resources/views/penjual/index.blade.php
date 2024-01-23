@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Penjual</h4>
            <div class="table-responsive">
                <a href="{{ route('penjual.create') }}" type="button" class="btn btn-primary btn-rounded btn-fw">Tambah</a>
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
                                Alamat
                            </th>
                            <th>
                                HP
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjual as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->hp }}</td>
                                <td>
                                    <div class="d-flex gap-10">
                                        <a href="{{ route('penjual.edit', ['penjual' => $item]) }}" type="button"
                                            class="btn btn-primary btn-rounded btn-fw mr-3">Edit</a>
                                        @can('delete', App\Models\Penjual::class)
                                            <form action="{{ route('penjual.destroy', ['penjual' => $item]) }}" method="post">
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
