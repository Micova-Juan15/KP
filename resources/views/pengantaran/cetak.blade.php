<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ url('vendors/mdi/css/materialdesignicons.min.css') }}">

    <link rel="stylesheet" href="{{ url('vendors/css/vendor.bundle.base.css') }}">

    <link rel="stylesheet" href="{{ url('css/style.css') }}">

    <link rel="shortcut icon" href="{{ url('images/favicon.png') }}" />


    <style>
        table,
        th,
        td {
            border: 3px solid black;
        }
        tr{
            height: 30px;
        }
    </style>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="card">
        <div class="card-body">

            <div style="display:flex ;justify-content:space-between">
                <div style="font-weight: 900; font-size:40px">
                    <img src="{{ asset('images/foto/logoremovebg.png') }}" alt="" style="font-weight:900">
                    PT. Selekta Prima Sukses
                </div>
                <div style="margin-top:40px">
                    Palembang,
                    {{date('d-m-y',strtotime($pengantaran->tanggal)) }}
                    <div style="margin-top:40px">
                        {{$pengantaran->penjualan->pembeli->nama}} /
                        {{$pengantaran->penjualan->pembeli->hp}}
                    </div>
                    <div>
                        {{$pengantaran->penjualan->pembeli->alamat}}

                    </div>
                </div>

            </div>
            {{-- <div class="form-group">
                <label for="idpembeli">Pembeli : </label>
                {{ $pengantaran->penjualan->nama }}
            </div> --}}
            {{-- <div class="form-group">
                <label for="tanggal">Alamat : </label>
                {{ $pengantaran->penjualan->pembeli->alamat }}
            </div> --}}
            {{-- 
            <div class="form-group">
                <label for="hp">Telepon : </label>
                {{ $pengantaran->penjualan->pembeli->hp }}
            </div> --}}



            <div style="display: flex ;flex-direction: column;">
                <div class="form-group;" style="font-weight:bold">
                    <label for="idnota ">SURAT JALAN No.____________________ </label>

                </div>
                <div>
                    Sopir: {{$pengantaran->sopir->nama}} ({{$pengantaran->truk->plat}})
                </div>

            </div>

            <div class="form-group">
                <hr style="font-weight:bold; border-color: black">
                <table id="tableform" style="width:100% ;">
                    <thead>
                        <tr>
                            <th>
                                Nama Barang
                            </th>
                            <th>
                                Jumlah Barang
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengantaran->penjualan->detailpenjualan as $item)
                        <tr>
                            <td>
                                {{ $item->barangjadi->nama ??' '}}
                                {{ $item->barangjadi->ukuran ??' '}}
                            </td>
                            <td>
                                {{ $item->jumlah??' ' }}
                            </td>
                        </tr>
                        @endforeach                        
                        {{-- @for ($i = 0; $i < 5; $i++) --}}
 
                            
                        {{-- @endfor --}}
                    </tbody>
                </table>
            </div>
            <div style="display:flex ;justify-content: space-around;">
                <div>
                    Tanda Terima,
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    {{$pengantaran->penjualan->pembeli->nama}}
                </div>
                <div>
                    Hormat kami, 
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    PT. Selekta Prima Sukses
                </div>
            </div>

        </div>
    </div>

</body>

</html>
