@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Produk Baru</h4>
            <form class="forms-sample" action="{{ route('barangjadi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    {{-- <input type="text" class="form-control" name="nama" placeholder="Tambah Barang"
                        value="{{ old('barang') }}"> --}}
                    <input type="text" class="form-control" name="nama" placeholder="Tambah Produk Baru"
                        value="{{ old('nama') }}">

                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ukuran">Ukuran</label>
                    <input type="text" class="form-control" name="ukuran" placeholder="Tambah Ukuran"
                        value="{{ old('ukuran') }}">
                    @error('ukuran')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlahbarang">Stock</label>
                    <input type="number" class="form-control" name="jumlahbarang" placeholder="Tambah Stock"
                        value="{{ old('jumlahbarang') }}">
                    {{-- @error('jumlah') --}}
                    @error('jumlahbarang')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" placeholder="Tambah Harga"
                        value="{{ old('harga') }}">
                    @error('harga')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <button class="btn btn-success" type="button" onclick="addrow( )">
                        Tambah
                    </button>
                    <table id="tableform" width="100%">
                        <thead>
                            <tr>
                                <th>
                                    Bahan Mentah
                                </th>
                                <th>
                                    Jumlah
                                </th>
                                <th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select class="form-control" name="idbarang[]" id="">
                                        @foreach ($barangmentah as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nama }}
                                                ({{ $item->satuan }})
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" type="number" name="jumlah[]" id="" required
                                        step="any" placeholder="Masukkan Jumlah ">
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
                <a href="{{ route('barangjadi.index') }}" class="btn btn-rounded btn-light">Batal</a>
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
    </script>
@endsection
