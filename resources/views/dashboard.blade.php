@extends('layout.main')

@section('content')
<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
    </p>
</figure>
    <div style="grid-container ; display: grid; grid-template-columns: auto auto auto; grid-row-gap: 30px; ">
        <a href="pembelian" style="text-decoration: none">
            <div style="display: flex">
                <div style="background-color:  rgb(72, 104, 209);; width: 150px ; height:150px; position: relative;">
                    <i class="fas fa-shopping-cart menu-icon "
                        style="font-size: 60px ;color:white;position:absolute; top: 50%; border:1px ;transform: translate(0, -50%); left:35px"></i>
                </div>
                <div style="background-color: white; width:150px; padding :10px ;color:black; font-size:24px">
                    Pembelian
                    <br>
                    {{ count($pembelian) }}

                </div>
            </div>
        </a>
        <a href="penjualan" style="text-decoration: none">
            <div style="display: flex">
                <div style="background-color:  rgb(72, 104, 209); width: 150px ; height:150px; position: relative;">
                    <i class="fas fa-money-check menu-icon"
                        style="font-size: 60px ;color:white;position:absolute; top: 50%; border:1px ;transform: translate(0, -50%); left:40px"></i>
                </div>
                <div style="background-color: white; width:150px; padding :10px ;color:black; font-size:24px">
                    Penjualan
                    <br>
                    {{ count($penjualan) }}

                </div>
            </div>


        </a>
        <a href="pengantaran" style=" text-decoration: none ">
            <div style="display: flex">
                <div style="background-color:  rgb(72, 104, 209); width: 150px ; height:150px; position: relative;">
                    <i class="fas fa-truck-loading menu-icon "
                        style="font-size: 60px ; color:white; position:absolute; top: 50%; border:1px ;transform: translate(0, -50%); left:40px;"></i>
                </div>
                <div style="background-color: white; width:150px; padding :10px; color:black ;font-size:24px">
                    Pengantaran
                    <br>
                    {{ count($pengantaran) }}


                </div>
            </div>
        </a>
        <a href="pengantaran" style=" text-decoration: none ">
            <div style="display: flex">
                <div style="background-color:  rgb(72, 104, 209); width: 150px ; height:150px; position: relative;">
                    <i class="fas fa-truck-loading menu-icon "
                        style="font-size: 60px ; color:white; position:absolute; top: 50%; border:1px ;transform: translate(0, -50%); left:40px;"></i>
                </div>
                <div style="background-color: white; width:150px; padding :10px; color:black; font-size:24px">
                    Pengantaran Belum
                    <br>
                    {{ count($pengantaranbelumselesai) }}


                </div>
            </div>
        </a> <a href="pengantaran" style=" text-decoration: none ">
            <div style="display: flex">
                <div style="background-color:  rgb(72, 104, 209); width: 150px ; height:150px; position: relative;">
                    <i class="fas fa-truck-loading menu-icon "
                        style="font-size: 60px ; color:white; position:absolute; top: 50%; border:1px ;transform: translate(0, -50%); left:40px;"></i>
                </div>
                <div style="background-color: white; width:150px; padding :10px; color:black; font-size:24px">
                    Pengantaran Selesai
                    <br>
                    {{ count($pengantaransudahselesai) }}


                </div>
            </div>
        </a>
        <a href="barangmentah" style=" text-decoration: none ">
            <div style="display: flex">
                <div style="background-color:  rgb(72, 104, 209); width: 150px ; height:150px; position: relative;">
                    <i class="fas fa-hand-holding menu-icon "
                        style="font-size: 65px ;color:white;position:absolute; top: 50%; border:1px ;transform: translate(0, -50%); left:40px;"></i>
                </div>
                <div style="background-color: white; width:150px; padding :10px; color:black; font-size:24px">
                    Barang Mentah
                    <br>
                    {{ count($barangmentah) }}

                </div>
            </div>
        </a>
        <a href="barangjadi" style=" text-decoration: none ">
            <div style="display: flex">
                <div style="background-color:  rgb(72, 104, 209); width: 150px ; height:150px; position: relative;">
                    <i class="fas fa-hand-holding menu-icon "
                        style="font-size: 65px ;color:white;position:absolute; top: 50%; border:1px ;transform: translate(0, -50%); left:40px;"></i>
                </div>
                <div style="background-color: white; width:150px; padding :10px; color:black; font-size:24px">
                    Barang Jadi
                    <br>
                    {{ count($barangjadi) }}

                </div>
            </div>
        </a> <a href="truk" style=" text-decoration: none ">
            <div style="display: flex">
                <div style="background-color:  rgb(72, 104, 209); width: 150px ; height:150px; position: relative;">
                    <i class="fas fa-truck menu-icon "
                        style="font-size: 60px ;color:white; position:absolute; top: 50%; border:1px ;transform: translate(0, -50%); left:38px;"></i>
                </div>
                <div style="background-color: white; width:150px; padding :10px; color:black; font-size:24px">
                    Truk
                    <br>
                    {{ count($truk) }}

                </div>
            </div>
        </a> <a href="sopir" style=" text-decoration: none ">
            <div style="display: flex">
                <div style="background-color: rgb(72, 104, 209); width: 150px ; height:150px; position: relative;">
                    <i class="fas fa-tachometer-alt menu-icon "
                        style="font-size: 60px ;color:white;position:absolute; top: 50%; border:1px ;transform: translate(0, -50%); left:40px;"></i>
                </div>
                <div style="background-color: white; width:150px; padding :10px; color:black; font-size:24px">
                    Sopir
                    <br>
                    {{ count($sopir) }}

                </div>
            </div>
        </a> <a href="penjual" style=" text-decoration: none ">
            <div style="display: flex">
                <div style="background-color: rgb(72, 104, 209); width: 150px ; height:150px; position: relative;">
                    <i class="fas fa-user-friends menu-icon "
                        style="font-size: 60px ;color:white;position:absolute; top: 50%; border:1px ;transform: translate(0, -50%); left:40px;"></i>
                </div>
                <div style="background-color: white; width:150px; padding :10px; color:black; font-size:24px">
                    Penjual
                    <br>
                    {{ count($penjual) }}

                </div>
            </div>
        </a>
        <a href="pembeli" style=" text-decoration: none ">
            <div style="display: flex">
                <div style="background-color:  rgb(72, 104, 209); width: 150px ; height:150px; position: relative;">
                    <i class="fas fa-user menu-icon "
                        style="font-size: 60px ;color:white;position:absolute; top: 50%; border:1px ;transform: translate(0, -50%); left:50px;"></i>
                </div>
                <div style="background-color: white; width:150px; padding :10px; color:black; font-size:24px">
                    Pembeli
                    <br>
                    {{ count($pembeli) }}

                </div>
            </div>
        </a>
        {{-- <a href="user" style=" text-decoration: none ">
            <div style="display: flex">
                <div style="background-color:  rgb(72, 104, 209); width: 150px ; height:150px; position: relative;">
                    <i class="mdi mdi-account-multiple-plus menu-icon "
                        style="font-size: 60px ;color:white;position:absolute; top: 50%; border:1px ;transform: translate(0, -50%); left:42px; "></i>
                </div>
                    <div style="background-color: white; width:150px; padding :10px; color:black; display:flex ;flex-direction: column;">
                        <div>
                            User
                        </div>
                        <div style="flex-grow: 1 ;display: flex; justify-content:center;align-items:center; font-size:40px ">
                            {{ count($user) }}

                        </div>

                    </div>
                </div>
        </a> --}}
        @can('view', App\Models\User::class)
            <a href="user" style=" text-decoration: none ">
                <div style="display: flex">
                    <div style="background-color:  rgb(72, 104, 209); width: 150px ; height:150px; position: relative;">
                        <i class="mdi mdi-account-multiple-plus menu-icon "
                            style="font-size: 60px ;color:white;position:absolute; top: 50%; border:1px ;transform: translate(0, -50%); left:42px;"></i>
                    </div>
                    <div style="background-color: white; width:150px; padding :10px; color:black; font-size:24px">
                        User
                        <br>
                        {{ count($user) }}

                    </div>
                </div>
            </a>
        @endcan
    </div>
 {{-- <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>


    <style>
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 360px;
            max-width: 100%;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>
    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Data Penjualan per Tahun'
            },
            subtitle: {
                text: 'PT. Selekta Prima Sukses'
            },
            xAxis: {
                categories: [

                    @foreach ($grafik as $item)
                        '{{ $item->bulan }}',
                    @endforeach
                ]
            },
            yAxis: {
                title: {
                    text: 'Pendapatan'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                    name: 'Penjualan Tahun ini',
                    data: [
                        @foreach ($grafik as $item)
                            {{ $item->totalharga }},
                        @endforeach
                    ]
                }
                
            ]
        });
    </script>--}}
@endsection  
