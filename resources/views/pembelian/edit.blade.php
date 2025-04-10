@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Pembelian</h4>
            <form class="forms-sample" action="{{ route('pembelian.update', ['pembelian' => $pembelian]) }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="idpenjual">Penjual</label>
                    <select name="idpenjual" id="" class="form-control">
                        @foreach ($penjual as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" placeholder="Masukkan Tanggal"
                        value="{{ $pembelian->tanggal }}">
                    @error('tanggal')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="idnota">No.Nota</label>
                    <input type="text" class="form-control" name="idnota" placeholder="Masukkan Nomor Nota"
                        value="{{ $pembelian->idnota }}">
                    @error('idnota')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="ongkir">Ongkir</label>
                    <input type="number" class="form-control" name="ongkir" placeholder="Masukkan harga ongkir"
                        value="{{ $pembelian->ongkir }}">
                    @error('ongkir')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Masukkan keterangan"
                        value="{{ $pembelian->keterangan }}">
                    @error('keterangan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <table id="tableform">
                        <thead>
                            <tr>
                                <th>
                                    Barang Mentah
                                </th>
                                <th>
                                    Jumlah
                                </th>
                                {{-- <th>
                                    Harga Beli
                                </th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembelian->detailpembelian as $item)
                                <tr>
                                    <input type="hidden" name="iddetail[]" value="{{ $item->id }}">
                                    <td>
                                        <select class="form-control" name="idbarang[]" id="">
                                            @foreach ($barang as $items)
                                                <option value="{{ $items->id }}"
                                                    {{ $items->id == $item->idbarang ? '' : 'selected' }}>
                                                    {{ $items->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" name="jumlah[]" id=""
                                            placeholder="Masukkan Jumlah Dibeli" value="{{ $item->jumlah }}">
                                    </td>
                                    {{-- <td>
                                        <input class="form-control" type="number" name="hargabeli[]" id=""
                                            placeholder="Masukkan Harga Beli" value="{{ $item->hargabeli }}">
                                    </td> --}}
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
                <button type="submit" class="btn btn-rounded btn-primary mr-2">Simpan</button>
                <a href="{{ route('pembelian.index') }}" class="btn btn-rounded btn-light">Batal</a>
            </form>
        </div>
    </div>
@endsection
