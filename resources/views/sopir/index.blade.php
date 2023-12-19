@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Sopir</h4>
            <div class="table-responsive">
                <a href="{{ route('sopir.create') }}" type="button" class="btn btn-primary btn-rounded btn-fw">Tambah</a>
                @if (Session::get('success'))
                    <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Nama 
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sopir as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
