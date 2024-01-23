@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Barang</h4>
            <form class="forms-sample" action="{{ route('barangjadi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama barang :</label>
                    {{$barangjadi->nama}}
                </div>
                <div class="form-group">
                    <label for="ukuran">Ukuran :</label>
                    {{$barangjadi->ukuran}}
                </div>
                <div class="form-group">
                    <label for="jumlahbarang">Jumlah :</label>
                    {{$barangjadi->jumlah}}
                </div>
                <div class="form-group">
                    <label for="harga">Harga :</label>
                    {{$barangjadi->harga}}
                </div>
                <div class="form-group">
                    <table id="tableform" class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Barang Mentah
                                </th>
                                <th>
                                    Jumlah
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangjadi->resep as $item)
                            <tr>
                                <td>
                                    {{$item->barangmentah->nama}}
                                </td>
                                
                                <td>
                                    {{$item->jumlah}}
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
@endsection
