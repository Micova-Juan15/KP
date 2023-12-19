@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Truk</h4>
            <div class="table-responsive">
                    <a href="{{ route('truk.create') }}" type="button" class="btn btn-primary btn-rounded btn-fw">Tambah</a>

                @if (Session::get('success'))
                    <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Plat Truk
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($truk as $item)
                        <tr>

                            <td>
                                {{$item->plat}}
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
