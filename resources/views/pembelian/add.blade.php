@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Pembelian</h4>
            <form class="forms-sample" action="{{ route('pembelian.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="idpenjual">Penjual</label>
                    <br>

                    <select class = " form-control"name="idpenjual" id=" ">
                        @foreach ($penjual as $item)
                        <option value="{{$item->id }}">
                        {{$item->nama}}
                        </option>
                        @endforeach
                    </select>
                    @error('idpenjual')
                        <span class="text-danger"idpenjual>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" placeholder="Masukkan Tanggal"
                        value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="idnota">No.Nota</label>
                    <input type="text" class="form-control" name="idnota" placeholder="Masukkan Nomor Nota"
                        value="{{ old('idnota') }}">
                    @error('idnota')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ongkir">Ongkir</label>
                    <input type="number" class="form-control" name="ongkir" placeholder="Masukkan harga ongkir"
                        value="{{ old('ongkir') }}">
                    @error('ongkir')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="potongan">Potongan</label>
                    <input type="number" class="form-control" name="potongan" placeholder="Masukkan potongan"
                        value="{{ old('potongan') }}">
                    @error('potongan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="button" onclick="addrow()">
                        Tambah
                    </button>
                    <table id="tableform">
                        <thead>
                            <tr>
                                <th>
                                    Barang Mentah
                                </th>
                                <th>
                                    Jumlah
                                </th>
                                <th>
                                    Harga Beli
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select class="form-control" name="idbarang[]" id="">
                                        @foreach ($barang as $item)
                                            <option value="{{$item->id}}">
                                            {{$item->nama}}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="jumlah[]" id="" placeholder="Masukkan Jumlah Dibeli">
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="hargabeli[]" id="" placeholder="Masukkan Harga Beli"> 
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <button type="submit" class="btn btn-rounded btn-primary mr-2">Simpan</button>
                <a href="{{ route('pembelian.index') }}" class="btn btn-rounded btn-light">Batal</a>
            </form>
        </div>
    </div>
    <script>
        const table = document.querySelector("#tableform");
        const tbody = table.querySelector("tbody");
        const tableRow =tbody.querySelector("tr").cloneNode(true);
        function addrow (){
            tbody.insertAdjacentHTML("beforeend",tableRow.outerHTML)     

        }
    </script>

@endsection
