@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Detail Pembelian</h4>
            <div class="form-group">
                <label for="idpenjual">Penjual : </label>
                {{ $pembelian->penjual->nama }}
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal : </label>
                {{ $pembelian->tanggal }}
            </div>
            <div class="form-group">
                <label for="idnota">No.Nota : </label>
                {{ $pembelian->idnota }}
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan : </label>
                {{ $pembelian->keterangan }}
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
                            {{-- <th>
                                Harga Satuan
                            </th> --}}
                            {{-- <th>
                                Potongan
                            </th> --}}
                            {{-- <th>
                                Harga
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalqty=0;
                        @endphp
                        @foreach ($pembelian->detailpembelian as $item)
                            <tr>
                                <td>
                                    {{ $item->barangmentah->nama }}
                                </td>
                                <td>
                                    {{number_format ($item->jumlah),0 }}
                                </td>
                                @php
                                    $totalqty +=$item->jumlah;
                                @endphp
                                {{-- <td>
                                    {{number_format($item->barangmentah->harga),0}}
                                </td> --}}
                                {{-- <td>
                                    {{number_format(($item->barangmentah->harga*$item->jumlah)-$item->hargabeli,0)}}
                                </td> --}}
                                {{-- <td>
                                    {{number_format ($item->hargabeli),0 }}
                                </td> --}}
                            </tr>
                        @endforeach
                     
                        {{-- <tr>
                            <td></td>
                            <td></td>
                            <td>
                               Sub Total 
                            </td>
                            <td>
                                
                            </td>
                            <td>{{number_format($pembelian->totalharga-$pembelian->ongkir,0)}}</td>
                        </tr> --}}
                        {{-- <tr>
                            
                            <td >Ongkir</td>
                            <td></td>
                            <td>{{number_format($pembelian->ongkir)}} </td>
                        </tr> --}}
                     
                        <tr>
                            {{-- <td></td>
                            <td></td>
                            <td></td> --}}
                            <td >
                                Total 
                            </td>
                            <td>{{$totalqty}}</td>
                            {{-- <td >{{number_format($pembelian->totalharga),0}}</td> --}}
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
