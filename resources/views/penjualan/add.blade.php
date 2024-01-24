@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Penjualan</h4>
            <form class="forms-sample" action="{{ route('penjualan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="idpembeli">Pembeli</label>
                    <br>
                    <select class="form-control" name="idpembeli" id=" ">
                        @foreach ($pembeli as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('idbarang')
                        <span class="text-danger">{{ $message }}</span>
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
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan"
                        value="{{ old('keterangan') }}">
                    @error('keterangan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input type="checkbox"onclick="ShowHideDiv(this)" name="checkpengantaran">
                <label for="checkbox">
                    Apakah anda ingin menambah pengantaran ?
                </label>
                <div id="checkbox" style="display: none">
                    <div class="form-group">
                        <label for="ongkir">Ongkir</label>
                        <input type="number" class="form-control" name="ongkir" placeholder="Masukkan biaya pengantaran"
                            value="{{ old('ongkir') }}">
                        @error('ongkir')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggalpengantaran">Tanggal Pengataran</label>
                        <input type="date" class="form-control" name="tanggalpengantaran" placeholder="Masukkan Tanggal "
                            value="{{ old('tanggalpengantaran') }}">
                        @error('tanggalpengantaran')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="idsopir">Nama Sopir</label>
                        <br>
                        <select class="form-control" name="idsopir" id=" ">
                            @foreach ($sopir as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="idtruk">Plat Kendaraan</label>
                        <br>
                        <select class="form-control" name="idtruk" id=" ">
                            @foreach ($truk as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->plat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="button" onclick="addrow()">
                        Tambah
                    </button>
                    <table id="tableform">
                        <thead>
                            <tr>
                                <th>
                                    Barang Jadi
                                </th>
                                <th>
                                    Jumlah
                                </th>
                                <th style="padding-right: 15px">Harga per item</th>

                                <th>
                                    Harga Jual
                                </th>
                                <th>

                                </th>
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="idbarang[]" id="" class="form-control" onchange="setHarga(this)">
                                        @foreach ($barang as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nama }}
                                                {{ $item->ukuran }}
                                                
                                            </option>
                                        @endforeach
                                    </select>
                                </td>

                                <td>
                                    <input type="number" name="jumlah[] " min="1" id=""
                                        placeholder="Masukkan Jumlah Dibeli " class="form-control">
                                </td>
                                <td class="col-harga-per-item">
                                    1,000,0000
                                </td>
                                <td>
                                    <input type="number" name="hargajual[]" min="1" id=""
                                        placeholder="Masukkan Harga Jual" class="form-control">
                                </td>
                                <td>
                                    <button class="btn btn-danger" type="button" onclick="this.closest('tr').remove( )">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>


                <button type="submit" class="btn btn-rounded btn-primary mr-2">Simpan</button>
                <a href="{{ route('penjualan.index') }}" class="btn btn-rounded btn-light">Batal</a>
            </form>
        </div>
    </div>
    <script>
        const table = document.querySelector("#tableform");
        const tbody = table.querySelector("tbody");
        const tableRow = tbody.querySelector("tr").cloneNode(true);

        function addrow() {
            tbody.insertAdjacentHTML("beforeend", tableRow.outerHTML)

        }

        async function getHarga(element) {
            const idBarang = element.value;
            const response = await fetch(window.location.origin+"/api/barangmentah/show/"+idBarang+"/");
            const data = await response.json();
            return data.data;
        }

        function setHarga(element) {
            const data = getHarga(element)
            element.closest('.col-harga-per-item').innerHTML = `${data.harga}`
        }

        function ShowHideDiv(chkPassport) {
            var dvPassport = document.getElementById("checkbox");
            
            dvPassport.style.display = chkPassport.checked ? "block" : "none";
        }
    </script>
@endsection
