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
                <table id="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>
                                Plat Truk
                            </th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($truk as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>

                            <td>
                                {{$item->plat}}
                                
                            </td>
                            <td>{{$item->ketersediaan ?'Tersedia':'Tidak Tersedia'}} </td>

                            <td>
                                <div class="d-flex gap-10">
                                    <a href="{{ route('truk.edit',['truk'=>$item])}}" type="button" class="btn btn-primary btn-rounded btn-fw mr-3">Edit</a>
                                    @can('delete', App\Models\Truk::class)
                                    <form action="{{ route('truk.destroy',['truk'=>$item])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary btn-rounded btn-fw">Delete</button>
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
