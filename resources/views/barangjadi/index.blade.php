@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Produk Jadi</h4>
            <div class="table-responsive">
                    <!-- The current user can create new posts... -->
                    <div style="margin-bottom: 10px">
                        @can('create', App\Models\Barangjadi::class)
                        <a href="{{ route('barangjadi.create') }}" >
                            <button  type="button" class="btn btn-primary btn-rounded btn-fw" >
                                Tambah Barang
                            </button>
                        </a>
                        @endcan
                        <a href="{{ route('barangjadi.convert') }}">
                            <button class="btn btn-primary btn-rounded" type="button">
                                Tambah Jumlah
                            </button>
                        </a>
                    </div>
                @if (Session::get('success'))
                    <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
                @endif
                @if (Session::get('warning'))
                    <div class="alert alert-warning mt-3">{{ Session::get('warning') }}</div>
                @endif
                <table id ="datatable"class="table table-striped ">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Nama
                            </th>
                            <th>
                                Ukuran
                            </th>
                            <th>
                                Stock
                            </th>
                            {{-- <th>
                                Harga Satuan
                            </th> --}}
                            <th>

                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangjadi as $item)
                            <tr>
                                
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->ukuran }}</td>
                                <td>{{ number_format($item->jumlah, 0) }}</td>
                                {{-- <td>{{ number_format($item->harga, 0) }}</td> --}}
                                <td>

                                    <div class="d-flex gap-10">
                                        {{-- @can('update', App\Models\Barangjadi::class) --}}
                                            <a href="{{ route('barangjadi.edit', ['barangjadi' => $item]) }}" type="button"
                                                class="btn btn-primary btn-rounded btn-fw mr-3">Edit</a>
                                        {{-- @endcan --}}
                                        @can('delete', App\Models\Barangjadi::class)
                                            <form action="{{ route('barangjadi.destroy', ['barangjadi' => $item]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-primary btn-rounded btn-fw">Delete</button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('barangjadi.show', ['barangjadi' => $item]) }}">
                                        <button class="btn btn-primary btn-rounded" type="button">
                                            Spesifikasi Barang
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
