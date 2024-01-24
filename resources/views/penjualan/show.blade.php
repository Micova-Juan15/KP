@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Detail Penjualan</h4>
            <div class="form-group">
                <label for="idpembeli">Pembeli : </label>
                {{ $penjualan->pembeli->nama }}
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal : </label>
                {{ $penjualan->tanggal }}
            </div>
            <div class="form-group">
                <label for="idnota">No.Nota : </label>
                {{ $penjualan->idnota }}
            </div>
            {{-- <div class="form-group">
                <label for="potongan">Potongan : </label>
                {{ $penjualan->potongan }}
            </div>  --}}
            <div class="form-group">
                <label for="keterangan">Keterangan : </label>
                {{ $penjualan->keterangan }}
            </div>
            <div class="form-group">
                <table id="tableform" class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Barang Jadi
                            </th>
                            <th>
                                Jumlah
                            </th>
                            <th>
                                Harga Satuan
                            </th>
                            <th>
                                Potongan
                            </th>
                            <th>
                                Total Harga Nego
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan->detailpenjualan as $item)
                            <tr>
                                <td>
                                    {{ $item->barangjadi->nama }}
                                    ({{ $item->barangjadi->ukuran }})
                                    
                                </td>
                                <td>
                                    {{number_format ($item->jumlah, 0) }}
                                </td>
                                <td>
                                    {{number_format($item->barangjadi->harga, 0)}}
                                </td>
                                <td>
                                    {{number_format (($item->barangjadi->harga*$item->jumlah)-$item->hargajual, 0)}}
                                </td>
                                <td>
                                    {{number_format ($item->hargajual, 0) }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                Sub Total 
                            </td>
                            <td>{{number_format($penjualan->totalharga-$penjualan->ongkir,0)}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td >Ongkir</td>
                            <td>{{number_format($penjualan->pengantaran->ongkir?? 0)}} </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td >
                                Total 
                            </td>
                            <td >{{number_format($penjualan->totalharga+$penjualan->pengantaran->ongkir?? 0 ,0)}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
