@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">User</h4>
            <div class="table-responsive">
                <a href="{{ route('user.create') }}" type="button" class="btn btn-primary btn-rounded btn-fw">Tambah</a>

                @if (Session::get('success'))
                    <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
                @endif
                <table id ="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Nama
                            </th>
                            <th>
                                Jabatan
                            </th>
                            <th>
                                Email
                            </th>
                            <th>

                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <div class="d-flex gap-10">
                                    <a href="{{ route('user.edit',['user'=>$item])}}" type="button" class="btn btn-primary btn-rounded btn-fw mr-3">Edit</a>
                                    <form action="{{ route('user.destroy',['user'=>$item])}}" method="post">
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
