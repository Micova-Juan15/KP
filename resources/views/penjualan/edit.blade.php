@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Penjualan</h4>
            <form class="forms-sample" action="{{ route('penjualan.update', ['penjualan' => $penjualan]) }}" method="POST">
                @csrf
                @method('patch')
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
                        value="{{ $penjualan->idnota }}">
                    @error('idnota')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @if ($penjualan->pengantaran != null)
                    <div>
                        {{-- <div class="form-group">
                        <label for="ongkir">Ongkir</label>
                        <input type="number" class="form-control" name="ongkir" placeholder="Masukkan biaya pengantaran"
                            value="{{ $penjualan->pengantaran->ongkir }}">
                        @error('ongkir')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}
                        <div class="form-group">
                            <label for="tanggalpengantaran">Tanggal Pengataran</label>
                            <input type="date" class="form-control" name="tanggalpengantaran"
                                placeholder="Masukkan Tanggal " value="{{ old('tanggalpengantaran') }}">
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
                @endif
                <div class="form-group">
                    <table id="tableform">
                        <thead>
                            <tr>
                                <th>
                                    Barang Jadi
                                </th>
                                <th>
                                    Jumlah
                                </th>
                                {{-- <th>
                                    Harga Jual
                                </th> --}}
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjualan->detailpenjualan as $item)
                                <tr>
                                    <input type="hidden" name="iddetail[]" value="{{ $item->id }}">

                                    <td>
                                        <select name="idbarang[]" id="" class="form-control">
                                            @foreach ($barang as $items)
                                                <option value="{{ $items->id }}"
                                                    {{ $items->id == $item->idbarang ? '' : 'selected' }}>
                                                    {{ $items->nama }}
                                                    ({{ $items->ukuran }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="jumlah[] " min="1" id=""
                                            placeholder="Masukkan Jumlah Dibeli " class="form-control"
                                            value="{{ $item->jumlah }}">
                                    </td>
                                    {{-- <td>
                                        <input type="number" name="hargajual[]" min="1" id=""
                                            placeholder="Masukkan Harga Jual" class="form-control"
                                            value="{{ $item->hargajual }}">
                                    </td> --}}
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>


                <button type="submit" class="btn btn-rounded btn-primary mr-2">Simpan</button>
                <a href="{{ route('penjualan.index') }}" class="btn btn-rounded btn-light">Batal</a>
            </form>
        </div>
    </div>
@endsection
