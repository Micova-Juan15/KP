<?php

namespace App\Http\Controllers;

use App\Models\Barangjadi;
use App\Models\Detail_penjualan;
use App\Models\Pembeli;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sopir;
use App\Models\Truk;
use App\Models\Pengantaran;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['penjualan'] = Penjualan::all();
        // dd($data['penjualan']);
        return view('penjualan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['penjualan'] = Penjualan::all();
        $data['sopir'] = Sopir::where('ketersediaan', '1')->get();
        $data['truk'] = Truk::where('ketersediaan', '1')->get();
        $data['pembeli'] = Pembeli::all();
        $data['barang'] = Barangjadi::all();
        // dd($data['penjualan']);

        return view('penjualan.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        DB::beginTransaction();

        // try {
        // Validasi input
        $request->validate([
            'tanggal' => 'required|date',
            'idpembeli' => 'required|numeric',
            'idnota' => 'required|numeric',
            'idbarang' => 'required|array',
            'jumlah' => 'required|array',
            'hargajual' => 'required|array',
            // 'ongkir' => 'required|numeric',
        ], [
            'tanggal.required' => 'Tanggal penjualan harus diisi.',
            // 'ongkir.required' => 'ongkir harus diisi harus diisi.',x
            'tanggal.date' => 'Format tanggal tidak valid.',
            'idpembeli.required' => 'Pilih pembeli.',
            'idpembeli.numeric' => 'ID pembeli harus berupa angka.',
            'idnota.required' => 'Masukkan nota.',
            'idnota.numeric' => 'ID nota harus berupa angka.',
            'idbarang.required' => 'Pilih setidaknya satu barang.',
            'jumlah.*.required' => 'Jumlah barang harus diisi.',
            'jumlah.*.numeric' => 'Jumlah barang harus berupa angka.',
            'jumlah.*.min' => 'Jumlah barang harus minimal 1.',
            'hargajual.*.required' => 'Harga jual barang harus diisi.',
            'hargajual.*.numeric' => 'Harga jual barang harus berupa angka.',
            'hargajual.*.min' => 'Harga jual barang harus minimal 0.',
            // Tambahkan pesan peringatan kustom lainnya sesuai kebutuhan
        ]);

        $penjualan = new Penjualan();
        $penjualan->tanggal = $request->tanggal;
        $penjualan->idpembeli = $request->idpembeli;
        $penjualan->idnota = $request->idnota;
        $penjualan->totalharga = 0;
        $penjualan->potongan = $request->potongan ?? 0;
        $penjualan->keterangan = $request->keterangan;
        $penjualan->save();

        $totalharga = 0;
        $totalhargaasli = 0;

        for ($i = 0; $i < count($request->idbarang); $i++) {
            // Validasi setiap item detail penjualan
            $request->validate([
                'idbarang.' . $i => 'required|numeric',
                'jumlah.' . $i => 'required|numeric|min:1',
                'hargajual.' . $i => 'required|numeric|min:0',
                // Tambahkan aturan validasi lainnya sesuai kebutuhan
            ]);

            $detailpenjualan = new Detail_penjualan();
            $detailpenjualan->idpenjualan = $penjualan->id;
            $detailpenjualan->idbarang = $request->idbarang[$i];
            $detailpenjualan->jumlah = $request->jumlah[$i];
            $detailpenjualan->hargajual = $request->hargajual[$i];
            $detailpenjualan->save();

            $barangjadi = Barangjadi::find($request->idbarang[$i]);
            $hasil = $barangjadi->jumlah - $request->jumlah[$i];

            if ($hasil < 0) {
                throw new \Exception($barangjadi->nama . ' kekurangan stock');
            }

            $barangjadi->jumlah = $hasil;
            $barangjadi->save();

            $totalharga += $request->hargajual[$i];
            $totalhargaasli += $barangjadi->harga * $request->jumlah[$i];
        }

        $penjualan->totalharga = $totalharga;
        $penjualan->potongan = $totalhargaasli - $totalharga;
        $penjualan->save();
        if ($request->checkpengantaran == 'on') {
            $pengantaran = new Pengantaran();
            $pengantaran->tanggal = $request->tanggalpengantaran;
            $pengantaran->idpenjualan = $penjualan->id;
            $pengantaran->idsopir = $request->idsopir;
            $pengantaran->idtruk = $request->idtruk;
            $pengantaran->ongkir = $request->ongkir;
            $pengantaran->status = 0;
            $pengantaran->save();

            $sopir = Sopir::find($request->idsopir);
            $sopir->ketersediaan = 0;
            // dd($sopir);
            $sopir->save();

            $truk = Truk::find($request->idtruk);
            $truk->ketersediaan = 0;
            $truk->save();
        }



        DB::commit();
        return redirect()->route('penjualan.index')->with('success', $request->nama_penjualan . ' berhasil disimpan.');
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     return redirect()->route('penjualan.index')->with('warning', $e->getMessage());
        // }
    }


    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {

        return view('penjualan.show', compact('penjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        $data['pembeli'] = Pembeli::all();
        $data['penjualan'] = $penjualan;
        $data['sopir'] = Sopir::all();
        $data['barang'] = Barangjadi::all();

        return view('penjualan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        // dd($request->ongkir);
        DB::beginTransaction();

        $request->validate([
            'tanggal' => 'required|date',
            'idpembeli' => 'required|numeric',
            'idnota' => 'required|numeric',
            'idbarang' => 'required|array',
            'jumlah' => 'required|array',
            'hargajual' => 'required|array',
        ], [
            'tanggal.required' => 'Tanggal penjualan harus diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',
            'idpembeli.required' => 'Pilih pembeli.',
            'idpembeli.numeric' => 'ID pembeli harus berupa angka.',
            'idnota.required' => 'Masukkan nota.',
            'idnota.numeric' => 'ID nota harus berupa angka.',
            'idbarang.required' => 'Pilih setidaknya satu barang.',
            'jumlah.*.required' => 'Jumlah barang harus diisi.',
            'jumlah.*.numeric' => 'Jumlah barang harus berupa angka.',
            'jumlah.*.min' => 'Jumlah barang harus minimal 1.',
            'hargajual.*.required' => 'Harga jual barang harus diisi.',
            'hargajual.*.numeric' => 'Harga jual barang harus berupa angka.',
            'hargajual.*.min' => 'Harga jual barang harus minimal 0.',
            // Tambahkan pesan peringatan kustom lainnya sesuai kebutuhan
        ]);
        $penjualan->tanggal = $request->tanggal;
        $penjualan->idpembeli = $request->idpembeli;
        $penjualan->idnota = $request->idnota;
        $penjualan->totalharga = 0;
        $penjualan->potongan = $request->potongan ?? 0;
        $penjualan->save();
        $pengantaran = Pengantaran::where('idpenjualan', $penjualan->id)->first();
        $pengantaran->ongkir = $request->ongkir;
        $pengantaran->save();
        $totalharga = 0;
        $totalhargaasli = 0;



        for ($i = 0; $i < count($request->idbarang); $i++) {
            // Validasi setiap item detail penjualan
            // $request->validate([
            //     'idbarang.' . $i => 'required|numeric',
            //     'jumlah.' . $i => 'required|numeric|min:1',
            //     'hargajual.' . $i => 'required|numeric|min:0',
            //     'tanggal' => 'required|date',

            //     // Tambahkan aturan validasi lainnya sesuai kebutuhan
            // ]);
            $request->validate([
                'tanggal' => 'required|date',
                'idpembeli' => 'required|numeric',
                'idnota' => 'required|numeric',
                'idbarang' => 'required|array',
                'jumlah' => 'required|array',
                'hargajual' => 'required|array',
            ], [
                'tanggal.required' => 'Tanggal penjualan harus diisi.',
                'tanggal.date' => 'Format tanggal tidak valid.',
                'idpembeli.required' => 'Pilih pembeli.',
                'idpembeli.numeric' => 'ID pembeli harus berupa angka.',
                'idnota.required' => 'Masukkan nota.',
                'idnota.numeric' => 'ID nota harus berupa angka.',
                'idbarang.required' => 'Pilih setidaknya satu barang.',
                'jumlah.*.required' => 'Jumlah barang harus diisi.',
                'jumlah.*.numeric' => 'Jumlah barang harus berupa angka.',
                'jumlah.*.min' => 'Jumlah barang harus minimal 1.',
                'hargajual.*.required' => 'Harga jual barang harus diisi.',
                'hargajual.*.numeric' => 'Harga jual barang harus berupa angka.',
                'hargajual.*.min' => 'Harga jual barang harus minimal 0.',
                // Tambahkan pesan peringatan kustom lainnya sesuai kebutuhan
            ]);

            $detailpenjualan = Detail_penjualan::find($request->iddetail[$i]);
            $detailpenjualan->idpenjualan = $penjualan->id;
            $detailpenjualan->idbarang = $request->idbarang[$i];
            $detailpenjualan->jumlah = $request->jumlah[$i];
            $detailpenjualan->hargajual = $request->hargajual[$i];
            $detailpenjualan->save();

            $barangjadi = Barangjadi::find($request->idbarang[$i]);
            $barangjadi->jumlah = $barangjadi->jumlah - $request->jumlah[$i];
            $hasil = $barangjadi->jumlah - ($request->jumlah[$i]);
            if ($hasil < 0) {
                DB::rollBack();
                return redirect()->route('barangjadi.index')->with('warning', $barangjadi->nama . ' kekurangan stock');
            }
            $barangjadi->jumlah = $barangjadi->jumlah - ($request->jumlah[$i]);
            $barangjadi->save();

            $totalharga += ($request->hargajual[$i]);
            $totalhargaasli += ($barangjadi->harga * $request->jumlah[$i]);
        }

        $penjualan->totalharga = $totalharga;
        $penjualan->potongan = $totalhargaasli - $totalharga;
        $penjualan->save();


        DB::commit();

        return redirect()->route('penjualan.index')->with('success', $request->nama_penjualan . ' berhasil disimpan.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', $penjualan->nama . ' berhasil dihapus.');
    }
}
