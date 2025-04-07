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
                            <th></th>
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
                        @php
                            $totalqty = 0;
                        @endphp
                        @foreach ($penjualan->detailpenjualan as $item)
                            <tr>
                                <td></td>
                                <td>
                                    {{ $item->barangjadi->nama }}
                                    ({{ $item->barangjadi->ukuran }})
                                </td>
                                <td>
                                    {{ number_format($item->jumlah), 0 }}
                                </td>
                                @php
                                    $totalqty += $item->jumlah;
                                @endphp
                                <td>
                                    {{ number_format($item->barangjadi->harga), 0 }}
                                </td>
                                <td>
                                    {{ number_format($item->barangjadi->harga * $item->jumlah - $item->hargajual), 0 }}
                                </td>
                                <td>
                                    {{ number_format($item->hargajual), 0 }}
                                </td>
                            </tr>
                        @endforeach

                        {{-- <tr><td></td></tr> --}}
                        <tr>
                            <td>
                                Sub Total
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            {{-- <td>{{ number_format($penjualan->totalharga - $penjualan->ongkir ?? 0) }}</td> --}}
                            <td>{{ number_format($penjualan->totalharga) }}
                            </td>
                        </tr>
                        <tr>
                            <td>Ongkir</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            {{-- <td>{{ number_format($penjualan->pengantaran->ongkir ?? 0) }} </td> --}}
                            <td>{{ number_format(optional($penjualan->pengantaran)->ongkir ?? 0) }}
                            </td>
                        </tr>
                        <tr>
                            <td>Total </td>
                            <td></td>
                            <td>
                                {{ $totalqty }}
                            </td>
                            <td></td>
                            <td></td>
                            {{-- <td>{{ number_format($penjualan->totalharga + $penjualan->pengantaran->ongkir ?? 0), 0 }}</td> --}}
                            <td>{{ number_format(($penjualan->totalharga + optional($penjualan->pengantaran)->ongkir), 0) }}

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
